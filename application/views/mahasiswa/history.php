
<div class="row">
	<?php
		$perPage 	= 5;
		$keyword = $this->input->get('keyboard');
		if (isset($keyword)) {
			$offset = $this->uri->segment(4);
		}else{
			$offset = $this->uri->segment(3);
		}

		$i = isset($offset) ? $offset * $perPage -$perPage : 0;
	?>
	<div class="col-sm-12">
		<div class="card-header">
			<div class="card-title">
				
	  	</div>
		</div>
		<div class="card-content">
			<div class="row">
				<div class="col-sm-6">
					<h3>History Buku Mahasiswa</h3>
				</div>
				<div class="col-sm-6">
				    <form class="form-horizontal navbar-form navbar-right" action="<?=base_url('mahasiswa/search')?>" accept-charset="utf-8" method="get"  role="search">
				    	<div class="row">
					    	<label class="col-sm-3 label-on-left">Tanggal</label>
					    	<div class="col-sm-9">
						    	<div class="form-group label-floating is-empty">
						    		<input type="date" value="<?=$this->input->get('keyboard')?>" name="keyboard" class="form-control">
						    	</div>
						        <button type="submit" class="btn btn-white btn-round btn-just-icon">
						            <i class="material-icons">search</i>
						            <div class="ripple-container"></div>
						        </button>
						    </div>
					    </div>
				    </form>
					
				</div>
			</div>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Gambar</th>
							<th>Judul</th>
							<th>Pengarang</th>
							<th>Cetakan</th>
							<th>Waktu Buka</th>
						</tr>
					</thead>
					<tbody>
					<!--
					<?php
						$this->buku = $this->load->database('buku', TRUE);
						foreach ($viewBuku as $key) {
							$gambar = $key->url;
							//echo $key->url;;
							if (strpos($gambar,'viewer?id=')) {
								$g = substr($gambar,-6);
								$image = $this->buku->query("SELECT * FROM `database_buku` where id_f='$g' ")->row_array();
								//echo print_r($image);
								echo "<br/>";
								//echo $g;
								?>
								<tr>
									<td><img class="img" style="width:100px;height: 150px;" src="<?php echo DIRECTORY_SEPARATOR.'buku/buku_data/'.$image['dir'].'/'.$image['id_f'].'/'.$image['s_file'];?>"></td>
									<td>
										<?=$image['judul']?>
									</td>
									<td>
										<?=$image['pengarang']?>
									</td>
									<td>
										<?=$image['cetakan']?>
									</td>
								</tr>
								<?php
							}	
						}
					?>
					-->
					<?php if (isset($image)) : ?>

					<?php $no=0;foreach ($image as $image) {   ?>
						
						<?=($i & 1) ? '<tr class="success">' : '<tr>' ?>
										<td><?=++$i?></td>
										<td><img class="img" style="width:100px;height: 150px;" src="<?php echo DIRECTORY_SEPARATOR.'buku/buku_data/'.$image['dir'].'/'.$image['id_f'].'/'.$image['s_file'];?>"></td>
										<td>
											<?=$image['judul']?>
										</td>
										<td>
											<?=$image['pengarang']?>
										</td>
										<td>
											<?=$image['cetakan']?>
										</td>
										<td>
											<?=$time_open[$no]?>
										</td>
									</tr>

					<?php	 $no++; } ?>
					
					<?php else: ?>
					<tr>
						<td colspan="5">
							Kosong
						</td>
					</tr>

					<?php endif;?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="4">
									<?=$pagination;?>
							</td>
							<td colspan="1">
								Jumlah: <?=$jumlah;?>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
