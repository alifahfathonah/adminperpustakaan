
<div class="card-header card-header-icon" data-background-color="blue">
    <i class="material-icons">language</i>
</div>
<div class="card-content">
	<h4 class="card-title">Dashboard</h4>
	<div class="alert" role="alert">
	  <h4 class="alert-heading">Sekedar info</h4>
	  <hr>
	  <p class="mb-0 text-danger">
	  	Untuk Mahasiswa yang akan membuat Laporan Akhir di wajibkan untuk meminta surat bebas pustaka dari perpustakaan.
	  	Syarat yang harus dipenuhi yaitu:
	  	<ul>
	  		<li>Mengembalikan seluruh buku koleksi yang dipinjam</li>
	  		<li>Menyumbangkan buku Non Mapel sejumlah minimal 1 eksemplar dalam cetak dan softfile kemudian
	  			diupload sistem Elfan Bookless...
	  		</li>
	  	</ul>
	  </p>
	  <p>
	  	Permohonan Bebas Pustaka dilayani sampai batas waktu tanggal 30 Juni 2019 Pukul 22.00 WIB.
	  </p>
	  <p>Demikian Informasi ini saya sampaikan. Atas perhatian saya ucapkan Terimkasih </p>
	</div>

	<p>
		<table class="table table-bordered">
			<thead>
				<tr>
					<td>Surat Bukti Upload</td>
					<td>
						<?php if($bukti_upload == null) : ?>
							Belum Upload Buku
						<?php else : ?>
							<?php foreach ($bukti_upload->result() as $key) {
								if ($key->status == 'tunda') {
							?>
							<a href="<?=base_url('mahasiswa/konfirmUpload/'.$key->no_upload)?>" class="btn btn-sm btn-primary" role="button" aria-disabled=''>Cetak Bukti Upload</a>

							<?php	}else{ ?>

							<button class="btn btn-sm btn-success"> Bukti Upload Sukses </button>
							<?php	}
							} ?>
						<?php endif;?>
					</td>
				</tr>
			</thead>
		</table>
	</p>
</div>
