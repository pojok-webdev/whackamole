<a href='<?php echo base_url();?>index.php/questions'>Home</a><br />
Total : <?php echo $visitors->result_count();?>

<table>
<thead>
<tr>
<th>No</th><th>Nama</th><th>Alamat</th><th>Telp</th><th>Perusahaan</th><th>Tanggal</th><th>Detil</th>
</tr>
</thead>
<tbody>
<?php 
$c=1;
?>
<?php foreach ($visitors as $visitor){?>
<tr>
<td><?php echo $c++;?></td>
<td><?php echo $visitor->name;?></td>
<td><?php echo $visitor->address;?></td>
<td><?php echo $visitor->phone;?></td>
<td><?php echo $visitor->company;?></td>
<td><?php echo $visitor->create_date;?></td>
<td><a href='<?php echo base_url();?>index.php/visitors/add_detil/id/<?php echo $visitor->id;?>' >Detil</a>
</tr>
<?php }?>
</tbody>
</table>