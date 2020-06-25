<div class="row">
	<div class="col-md-4 col-sm-4">
		<h3>History Tracking Mahasiswa</h3>
	</div>
	<div class="col-md-8 col-sm-8">
	    <form class="navbar-form navbar-right form-horizontal " action="<?=base_url('mahasiswa/search')?>" accept-charset="utf-8" method="get"  role="search">
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
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title"> Trafik Buku Dibaca </h4>
							<div class="table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>No</th>
											<th>id Open</th>
											<th>Time Open</th>
											<th>Time Live</th>
											<th>URL</th>
										</tr>
									</thead>
									<tbody>
										
											<?php 
									    $jum = count($image);
									    $i = 0;
									    $j = 1;
									    while ($i<$jum) {
									    ?>
									  <?=($i & 1) ? '<tr class="success">' : '<tr>' ?>
												<td><?= $j++ ;?></td>
												<td><?= $image[$i]->id_open ;?></td>
												<td><?= $image[$i]->time_open ;?></td>
												<td><?= $image[$i]->time_live ;?></td>
												<td><?= $image[$i]->url ;?></td>
										</tr>
										<?php	$i++;
									    }
										?>
									</tbody>
									<tfoot>
									</tfoot>
									
								</table>
							</div>
            </div>
            <!-- end content-->
        </div>
        <!--  end card  -->
    </div>
    <!-- end col-md-12 -->
</div>