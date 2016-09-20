<?php echo form_open(base_url() . 'index.php/visitors/handler');?>
<?php echo form_hidden('id',$visitors->id);?>
<table>
<tr><td>Nama</td><td>:</td><td><?php echo $visitors->name;?></td></tr>
<tr><td>Alamat</td><td>:</td><td><?php echo $visitors->address;?></td></tr>
<tr><td>Telepon</td><td>:</td><td><?php echo $visitors->phone;?></td></tr>
<tr><td>Perusahaan</td><td>:</td><td><?php echo $visitors->company;?></td></tr>
</table>
Keterangan:<br />
<textarea name='detil'>
<?php echo $visitors->detil;?>
</textarea>
<br />
<?php echo form_submit('save','Simpan');?>
<?php echo form_submit('close','Tutup');?>
<?php echo form_close();?>