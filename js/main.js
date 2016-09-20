/**
 * Whack-A-Mole
 * Freely reused from the Cocos2d Whack-a-mole Tutorial 
 * http://maniacdev.com/2011/01/tutorial-cocos2d-example-whack-a-mole-game/
 * Original version by Ray Wenderlich, the creator of the Space Game Starter 
 * Kit and co-author of the Learning Cocos2D book, as part of an excellent set 
 * of iOS tutorials on how to create a whack-a-mole game using the open source 
 * iPhone game engine Cocos2D.
 **/
var padi_is_win = false;
var base_path = 'http://whack/';
/**
 * Game assets
 **/
var g_assets = [	
	// background
	{
		name: "background",	
		type: "image",	
		src:  base_path+"js/data/graphics/background/bg_dirt128.png"
	},
	// upper part of foreground
	{
		name: "grass_upper",	
		type: "image",	
		src:  base_path+"js/data/graphics/foreground/grass_upper128.png"
	},
	// lower part of foreground
	{
		name: "grass_lower",	
		type: "image",	
		src:  base_path+"js/data/graphics/foreground/grass_lower128.png"
	},
	// more sprites
	{
		name: "mole",			
		type: "image",	
		src:  base_path+"js/data/graphics/sprites/mole.png"
	},
	// main music track 
	{  
		name: "whack",
		type: "audio",
		src: base_path+"js/data/audio/"
	},
	// Laugh audio FX
	/*{  
		name: "laugh",
		type: "audio",
		src: "data/audio/",
		channel : 4
	},*/
	// ow audio FX
	{  
		name: "ow",
		type: "audio",
		src: base_path+"js/data/audio/",
		channel : 2
	}
];

/**
 * Game Main Class 
 **/
var jsApp	=
{
	
	/**
	 * some Initialization
	 */
	onload: function()
	{
		
		// enable dirtyRegion
		me.sys.dirtyRegion = true;
		
		// we don't need the default 60fps for a whack-a-mole !
		me.sys.fps = 30;
		
		// use requestAnimationFrame if available
		//me.sys.useNativeAnimFrame = true;
		
		// debug flags
		//me.debug.renderDirty = true;
		//me.debug.renderHitBox = true;
		
		// initialize the video
		if (!me.video.init('jsapp', 1024, 768, true ,'auto'))
		{
			alert("Sorry but your browser does not support html5 canvas. Please try with another one!");
			return;
		};
		
		// disable interpolation when scaling
		me.video.setImageSmoothing(false);
					
		// initialize the "sound engine"
		me.audio.init("mp3,ogg");
		
		// set all ressources to be loaded
		me.loader.onload = this.loaded.bind(this);
		// set all ressources to be loaded		
		me.loader.preload(g_assets);
		
		// load everything & display a loading screen
		me.state.change(me.state.LOADING);
	},
	
	
	/* ---
	
		callback when everything is loaded
		
		---										*/
	loaded: function ()
	{
		
		// set the "Play/Ingame" Screen Object
		me.state.set(me.state.PLAY, new PlayScreen());
      
		// set a fade transition effect
		me.state.transition("fade","#000000", 250);
		
		// start the game
		me.state.change(me.state.PLAY);
		
	}

}; // jsApp

/**
 * a mole entity
 * note : we don't use EntityObject, since we wont' use regular collision, etc..
 */
var MoleEntity = me.AnimationSheet.extend(
{	
	init:function (x, y)
	{
		
		// call the constructor
		this.parent(x, y , me.loader.getImage("mole"), 178, 140);
		
		// idle animation
		this.addAnimation ("idle",  [0]);
		// laugh animation
		this.addAnimation ("laugh",  [1,2,3,2,3,1]);
		// touch animation
		this.addAnimation ("touch",  [4,5,6,4,5,6]);
		
		this.addAnimation("jackpot", [12],0);
		this.addAnimation("padi_true",[8,9,8,9,0,0,0,8,9,8,9],0);
		this.addAnimation("padi_false",[10]);
		// set default one
		this.setCurrentAnimation("idle");
		
		// means fully hidden in the hole
		this.isVisible = false;
		this.isOut = false;
		this.timer = 0;
		
		this.initialPos = this.pos.y;
		
		// tween to display/hide the moles
		this.displayTween = null;
		this.hideTween = null;
		
		// register on mouse event
		me.input.registerMouseEvent('mousedown', this, this.onMouseDown.bind(this));

	},
	
	
	/**
	 * callback for mouse click
	 */
	onMouseDown : function() {
		if (this.isOut == true) {
			this.isOut = false;
			// set touch animation
			//this.setCurrentAnimation("sekarat", this.hide.bind(this));
			$('#mycursor').css('background','url("<?php echo base_url();?>media/hammer2.png") no-repeat');
			mymousedown();
			// make it flicker
			//this.flicker();
			// play ow FX
			me.audio.play("ow");
//			changecursor();
			padidialog(this);
//			answer = callquiz(this);
//			this.animationpause(true);
			// stop propagating the event
			return false;
		};
	},
	
	
	/**
	 * display the mole
	 * goes out of the hole
	 */
	display : function() {
		var finalpos = this.initialPos - 140;
		this.displayTween = new me.Tween(this.pos).to({y: finalpos }, 200);
		this.displayTween.easing(me.Tween.Easing.Quadratic.EaseOut);
		this.displayTween.onComplete(this.onDisplayed.bind(this));
		this.displayTween.start();
		// the mole is visible
		this.isVisible = true;
	},
	jackpot : function(){
		this.setCurrentAnimation('jackpot');
		var finalpos = this.initialPos - 140;
		this.displayTween = new me.Tween(this.pos).to({y: finalpos }, 200);
		this.displayTween.easing(me.Tween.Easing.Quadratic.EaseOut);
		this.displayTween.onComplete(this.onDisplayed.bind(this));
		this.displayTween.start();
		// the mole is visible
		this.isVisible = true;
		
	},
	/**
	 * callback when fully visible
	 */
	onDisplayed : function() {
		this.isOut = true;
		this.timer = me.timer.getTime();
	},
	
	/**
	 * hide the mole
	 * goes into the hole
	 */	
	hide : function() {
		var finalpos = this.initialPos;
		this.displayTween = new me.Tween(this.pos).to({y: finalpos }, 200);
		this.displayTween.easing(me.Tween.Easing.Quadratic.EaseIn);
		this.displayTween.onComplete(this.onHidden.bind(this));
		this.displayTween.start()
	},

	/**
	 * callback when fully visible
	 */
	onHidden : function() {
		this.isVisible = false;
		// set default one
		this.setCurrentAnimation("idle");
	},

	
	/**
	 * update the mole
	 */
	update : function ()
	{
		if (this.isVisible) {
			// call the parent function to manage animation
			this.parent();
		
			// hide the mode after 1/2 sec default 500
			if (this.isOut===true) {
				if ((me.timer.getTime() - this.timer) > 300){
					this.isOut = false;
					// set default one
					this.setCurrentAnimation("laugh");
					this.hide();
					// play laugh FX
					//me.audio.play("laugh");
				}
			}
		}
		return this.isVisible;
	}
});

/**
 * a mole manager (to manage movement, etc..)
 */
var MoleManager = me.InvisibleEntity.extend(
{	
	moles : [],
	
	timer : 0,
		
	init: function ()
	{
		var settings = {};
		settings.width = 10;
		settings.height = 10;
		// call the parent constructor
		this.parent(0, 0, settings);
		
		// add the first row of moles
		for ( var i = 0; i < 3; i ++) {
			this.moles[i] = new MoleEntity((112 + (i * 310)), 127+40)
			me.game.add (this.moles[i], 15);
		}
		
		// add the 2nd row of moles
		for ( var i = 3; i < 6; i ++) {
			this.moles[i] = new MoleEntity((112 + ((i-3) * 310)), 383+40)
			me.game.add (this.moles[i], 35);
		}
		
		// add the 3rd row of moles
		for ( var i = 6; i < 9; i ++) {
			this.moles[i] = new MoleEntity((112 + ((i-6) * 310)), 639+40)
			me.game.add (this.moles[i], 55);
		}
		
			
		this.timer = me.timer.getTime();
		
	},

	/*
	 * update function
	 */
	update : function ()
	{
		// every 1/2 seconds display moles randomly default 500
		if ((me.timer.getTime() - this.timer) > 700) {

			for (var i = 0; i < 9; i+=3) {
				var hole = Number.prototype.random(0,2) + i ;
				if (!this.moles[hole].isOut && !this.moles[hole].isVisible) {
					this.moles[hole].display();
				}
			
			}
			this.timer = me.timer.getTime();
		}
		if ((me.timer.getTime() - this.timer) == 200) {

			for (var i = 0; i < 9; i+=3) {
				var hole = Number.prototype.random(0,2) + i ;
				if (!this.moles[hole].isOut && !this.moles[hole].isVisible) {
					this.moles[hole].jackpot();
				}
			
			}
			this.timer = me.timer.getTime();
		}
		padicheckstraight(this.moles);
 		return false;
	}
	
});

/* game initialization */
var PlayScreen = me.ScreenObject.extend(
{
   // we just defined what to be done on reset
   // no need to do somehting else
	onResetEvent: function()
	{	
		me.game.reset();
		// add the background & foreground
		// add the foreground
		var background_sprite10 = new me.SpriteObject (0, 0,   me.loader.getImage("background"));
		var grass_upper_1	    = new me.SpriteObject (0, 0,   me.loader.getImage("grass_upper"));
		
		var background_sprite11 = new me.SpriteObject (0, 127, me.loader.getImage("background"));
		var grass_lower_1       = new me.SpriteObject (0, 127, me.loader.getImage("grass_lower"));
		
		var background_sprite20 = new me.SpriteObject (0, 255, me.loader.getImage("background"));
		var grass_upper_2       = new me.SpriteObject (0, 255, me.loader.getImage("grass_upper"));
		
		var background_sprite21 = new me.SpriteObject (0, 383, me.loader.getImage("background"));
		var grass_lower_2       = new me.SpriteObject (0, 383, me.loader.getImage("grass_lower"));
		
		var background_sprite30 = new me.SpriteObject (0, 511, me.loader.getImage("background"));
		var grass_upper_3       = new me.SpriteObject (0, 511, me.loader.getImage("grass_upper"));
		
		var background_sprite31 = new me.SpriteObject (0, 639, me.loader.getImage("background"));
		var grass_lower_3       = new me.SpriteObject (0, 639, me.loader.getImage("grass_lower"));
		
		// instantiate teh mole Manager 
		var moleManager = new MoleManager(0, 0);
			
		// add all objects
		me.game.add (background_sprite10, 0);
		me.game.add (background_sprite11, 0);
		me.game.add (background_sprite20, 0);
		me.game.add (background_sprite21, 0);
		me.game.add (background_sprite30, 0);
		me.game.add (background_sprite31, 0);
		
		me.game.add (grass_upper_1, 10);
		me.game.add (grass_lower_1, 20);
		me.game.add (grass_upper_2, 30);
		me.game.add (grass_lower_2, 40);
		me.game.add (grass_upper_3, 50);
		me.game.add (grass_lower_3, 60);
		me.game.add (moleManager, 0);
		
		// make sure everything is sorted
		me.game.sort();
		
		// start the main soundtrack
		me.audio.playTrack("whack");
		
	},
	
	/*---
	
		the manu drawing function
	  ---*/
	
	onDestroyEvent : function()
	{
		me.audio.stopTrack();
	}
	
});


	var id=1;
	var arr = new Array();
	var x = new Array();
	
	function shuffleArray(array) {
	    for (var i = array.length - 1; i > 0; i--) {
	        var j = Math.floor(Math.random() * (i + 1));
	        var temp = array[i];
	        array[i] = array[j];
	        array[j] = temp;
	    }
	    return array;
	}	
	
	removeElement = function(arr,elm){
		arr.splice(arr.indexOf(elm), 1);
		return arr;
	}
	
	padidialog = function(mole){
		myarray = ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26"];
		jackpot_array = ["27","28","29","30","31","32","33","34","35"];
		var random_num = myarray[Math.floor(Math.random()*myarray.length)];
		var random_jackpot_num = jackpot_array[Math.floor(Math.random()*jackpot_array.length)];
		myarray.splice(random_num,1);
		jackpot_array.splice(random_jackpot_num,1);
		if(mole.isCurrentAnimation('jackpot')){
			x = get_jackpot_question(random_jackpot_num,arr,mole);
		}else{
			x = get_question(random_num,arr,mole);
		}
			$('#qdialog').html(x['question']+'<br /> A. '+x['answer_a']+'<br /> B. '+x['answer_b']+'<br /> C. '+x['answer_c']+'<br /> D. '+x['answer_d']);
			$('#qdialog').dialog({
				'title':'PadiNET Quiz',
				'buttons':{
				'a':function(){
					if(x['answered_a']==="1"){
						send_answer(x['question_id'],'a','1','x');
						mole.setCurrentAnimation('padi_true');
					}else{
						send_answer(x['question_id'],'a','0','x');
						mole.setCurrentAnimation('padi_false');
					}
					$('#mycursor').css('display','block');
					$(this).dialog('close');
				},
				'b':function(){
					if(x['answered_b']==="1"){
						send_answer(x['question_id'],'b','1','x');
						mole.setCurrentAnimation('padi_true');
					}else{
						send_answer(x['question_id'],'b','0','x');
						mole.setCurrentAnimation('padi_false');
					}
					$('#mycursor').css('display','block');
					$(this).dialog('close');
				},
				'c':function(){
					if(x['answered_c']==="1"){
						send_answer(x['question_id'],'c','1','x');
						mole.setCurrentAnimation('padi_true');
					}else{
						send_answer(x['question_id'],'c','0','x');
						mole.setCurrentAnimation('padi_false');
					}
					$('#mycursor').css('display','block');
					$(this).dialog('close');
				},
				'd':function(){
					if(x['answered_d']==="1"){
						send_answer(x['question_id'],'d','1','x');
						mole.setCurrentAnimation('padi_true');
					}else{
						send_answer(x['question_id'],'d','0','x');
						mole.setCurrentAnimation('padi_false');
					}
					$('#mycursor').css('display','block');
					$(this).dialog('close');
				}
			},
			});
	}
	
	padicheckstraight = function(moles){
		if(
		(moles[0].isCurrentAnimation("padi_true") && moles[1].isCurrentAnimation("padi_true") && moles[2].isCurrentAnimation("padi_true"))||
		(moles[3].isCurrentAnimation("padi_true") && moles[4].isCurrentAnimation("padi_true") && moles[5].isCurrentAnimation("padi_true"))||
		(moles[6].isCurrentAnimation("padi_true") && moles[7].isCurrentAnimation("padi_true") && moles[8].isCurrentAnimation("padi_true"))||
		(moles[0].isCurrentAnimation("padi_true") && moles[3].isCurrentAnimation("padi_true") && moles[6].isCurrentAnimation("padi_true"))||
		(moles[1].isCurrentAnimation("padi_true") && moles[4].isCurrentAnimation("padi_true") && moles[7].isCurrentAnimation("padi_true"))||
		(moles[2].isCurrentAnimation("padi_true") && moles[5].isCurrentAnimation("padi_true") && moles[8].isCurrentAnimation("padi_true"))||
		(moles[0].isCurrentAnimation("padi_true") && moles[4].isCurrentAnimation("padi_true") && moles[8].isCurrentAnimation("padi_true"))||
		(moles[2].isCurrentAnimation("padi_true") && moles[4].isCurrentAnimation("padi_true") && moles[6].isCurrentAnimation("padi_true"))		
		)
		{
			if(!padi_is_win){
				$('<div>YOU WIN !!!</div>').dialog({'title':'PadiNET'});
				}
				padi_is_win = true;
		}
	}
//bootstrap :)
window.onReady(function() 
{
	jsApp.onload();
});
