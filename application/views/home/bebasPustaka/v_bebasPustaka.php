<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-icon" data-background-color="green">
				<i class="material-icons">language</i></div>
			<div class="card-content">
				<h3>Tabel Bukti Upload</h3>
				<div class="row">
					<div class="col-md-12">
						<button class="btn btn-sm btn-primary" onclick="buka()"> 	Cetak SBP*</button>
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<td>No</td>
										<td>SBU</td>
										<td>Nama</td>
										<td>Tanggal</td>
										<td>Judul</td>
										<td>Status</td>
										<td>Mengetahui</td>
										<td>Aktion</td>
									</tr>
								</thead>
								
								<tbody>
										<?php if ($upload->num_rows() >= 1) : 
										$no=0;	foreach ($upload->result_array() as $key) { $no++; ?>
										<tr>
												<td><?= $no ;?></td>
												<td><?php echo $key['no_upload'] ?></td>
												<td> <?php echo $key['nama'] ?></td>
												<td><?= $key['dibuat'] ;?></td>
												<td><?= $key['judul'] ;?></td>
												<td><?php 
														
														$status = $key['status'] ;
														$h = ($status=='setuju') ? "<span class='text-success'>".$status."</span>" : "<span class='text-danger'>".$status."</span>" ; 
														echo $h;
														?>
												</td>
												<td><?= $key['mengetahui'] ;?></td>
												<td>
													<?php if ($key['status'] == 'setuju'): ?>
														
													<a href="<?=base_url('home/suratBebasPustaka/'.$key["nim"].'/'.$key["id_buktiupload"])?>" class="btn btn-sm btn-primary">Cetak</a>

													<?php else: ?>
														
													<a href="http://bookless.id/buku/detail_buku?id=<?=$key['qrcode']?>" target="_blank" class="btn btn-sm btn-info">Lihat</a>
													<?php endif ?>
												</td>
										</tr>
										<?php 	}
										?>
										<?php else: ?>
											<tr><td colspan="6">Kosong</td></tr>
										<?php endif ?>
									
								</tbody>
							
							</table>
						</div>
						<label for="" class="text-danger">*</label>Surat Bebas Pustaka
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Bootstrap -->
	<div class="modal" tabindex="-1" role="dialog" id="myModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Surat Bebas Pustaka</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form class="" id='testform'>
	        	<div class="row">
	        		<label for="cari" class="col-md-3 label-on-left">Cari SUrat</label>
	        		<div class="col-md-6">
	        			<div class="form-group label-floating">
	        				<input type="text" name="no" class="form-control">
	        			</div>
	        		</div>
	        		<div class="col-md-3">
	        			<button type="submit" class="btn btn-sm btn-info" id="cari">Cari</button>
	        		</div>
	        	</div>
	        </form>
	        <div id="result"></div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>

</div>