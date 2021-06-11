<div class="card mt-3">
  <div class="card-header bg-success text-white ">
    Data Dokumen
  </div>
  <div class="card-body">
  	<a href="?halaman=arsip_surat&hal=tambahdata" class="btn btn-secondary mb-3" >Tambah Data</a>
	  <a href="#" class="btn btn-success mb-3" >Report</a>
    <table class="table table-borderd table-hovered table-striped">
    	<tr>
    		<th>No</th>
    		<th>No Surat</th>
    		<th>Tanggal Dokumen</th>
    		<th>Tanggal Dikirim</th>
    		<th>Deskripsi</th>
    		<th>Bagian</th>
    		<th>Jenis Dokumen</th>
    		<th>File</th>
    		<th>Aksi</th>
    	</tr>
    	<?php
    		$tampil = mysqli_query($koneksi, "
    				  SELECT 
    				  	tbl_arsip.*,
    				  	tbl_departemen.nama_departemen,
    				  	tbl_pengirim_surat.nama_pengirim, tbl_pengirim_surat.no_hp
    				  FROM 
    				  	tbl_arsip, tbl_departemen, tbl_pengirim_surat
    				  WHERE 
    				  	tbl_arsip.id_departemen = tbl_departemen.id_departemen
    				  	and tbl_arsip.id_pengirim = tbl_pengirim_surat.id_pengirim_surat
    				  ");
    		$no = 1;
    		while($data = mysqli_fetch_array($tampil)) :

    	?>
    	<tr>
    		<td><?=$no++?></td>
    		<td><?=$data['no_surat']?></td>
    		<td><?=$data['tanggal_surat']?></td>
    		<td><?=$data['tanggal_diterima']?></td>
    		<td><?=$data['prihal']?></td>
    		<td><?=$data['nama_departemen']?></td>
    		<td><?=$data['nama_pengirim']?> / <?=$data['no_hp']?></td>
    		<td>
    			<?php
    				//uji apakah file nya ada atau tidak
    				if(empty($data['file'])){
    					echo " - ";
    				}else{
    			?>
				
    				<a href="file/<?=$data['file']?>" target="$_blank" class="btn btn-dark">Lihat </a> 
    			<?php
    				}
    			?>
    		</td>
    		<td>
    			<a href="?halaman=arsip_surat&hal=edit&id=<?=$data['id_arsip']?>" class="btn btn-warning" >Edit </a>
    			<a href="?halaman=arsip_surat&hal=hapus&id=<?=$data['id_arsip']?>" class="btn btn-danger" 
    				onclick="return confirm('Apakah yakin ingin menghapus data ini?')" >Hapus </a>
    		</td>
    	</tr>
    <?php endwhile; ?>
    </table>
  </div>
</div>