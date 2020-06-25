<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-icon" data-background-color="green">
				<i class="material-icons">supervisor_account</i>
			</div>
			<div class="card-content">
				<h4 class="card-title">Table User</h4>
				
				<div class="material-datatables">	
					<table class="table">
						<thead>
							<tr>	
								<th>No</th>
								<th>Username</th>
								<th>Level</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						<!--
							<?php $no=0; foreach ($query as $key): $no++;?>
							<tr>
								<td><?=$no?></td>
								<td><?= $key->username ;?></td>
								<td>
									<div class="togglebutton">
                      <label>
                      	<?php if ($key->status == 'on'): ?>
                      		<input value="off" type="checkbox" checked class="status" data-id="<?=$key->id?>"> <span class="text-success"><?= $key->status ;?></span>
                      	<?php else :?>
                      		
                          <input value="on" type="checkbox" class="status" data-id="<?=$key->id?>"> <span class="text-warning"><?= $key->status ;?></span>
                      	<?php endif ?>
                      </label>
                  </div>
								</td>
								<td>
									<button class="btn btn-danger btn-sm">
										Hapus
									</button>
									<input type="button" name="edit" value="Edit" class="btn btn-sm btn-info">
								</td>
							</tr>

							<?php endforeach ?>
						-->
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="modal" id="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" id="form">
              <div class="form-group label-floating">
                  <label class="control-label">Username</label>
                  <input type="username" name="username" id="username" class="form-control">
              </div>
              <div class="form-group label-floating">
                  <label class="control-label">Password</label>
                  <input type="password" class="form-control" name="password" id="password">
              </div>
              <div class="form-group label-floating">
                  <label class="control-label">Level</label>
                  <select name="level" id="level" class="form-control">
                  	<option value="admin">Admin</option>
                  	<option value="operator">Operator</option>
                  </select>
              </div>
              <div class="checkbox">
                  <label>
                      <input id="status" type="checkbox" name="status"> Status On
                  </label>
              </div>
              <button id="save" type="submit" class="btn btn-fill btn-rose">Submit</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" id="save" class="btn btn-primary">Save</button> -->
      </div>
    </div>
  </div>
</div>