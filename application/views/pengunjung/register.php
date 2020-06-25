
<div class="card">
    
      <?=form_open($form_action);?>
      <div class="card-header card-header-icon" data-background-color="rose">
          <i class="fa fa-users fa-2x"></i>
      </div>
      <div class="card-content">
          <h4 class="card-title">Register Pengunjung</h4>
          <?=showFlashMessage();?>
          <?php
              if(isset($_SESSION['error']))
              {
                showFlashMessage();
                unset($_SESSION['error']);
              }elseif (isset($_SESSION['success'])) {
                showFlashMessage();
                unset($_SESSION['success']);
              }

          ?>
          <?php 
            if (isset($_SESSION['warning'])) {
                showFlashMessage();
                unset($_SESSION['warning']);
              }
          ?>
          
          <div class="form-group label-floating <?=setValidationStyle('hp');?>">
              <label class="control-label">
                  No Hp/Telpn.
                  <small>*</small>
              </label>
              <input class="form-control" value="<?=$input->hp?>" name="hp" type="text"  />
              <?=setValidationIcon('hp');?>
              <?=form_error('hp')?>
          </div>
          <div class="form-group label-floating <?=setValidationStyle('email') ?>">
              <label class="control-label">
                  Email Address
                  <small>*</small>
              </label>
              <input class="form-control" value="<?=$input->email?>" name="email" type="email"  />
              <?= setValidationIcon('email') ?>
              <?=form_error('email');?>
          </div>
          <div class="form-group label-floating <?=setValidationStyle('password') ?>">
              <label class="control-label">
                  Password
                  <small>*</small>
              </label>
              <input class="form-control" value="<?=$input->password?>" name="password" id="Password" type="password" />
              <?= setValidationIcon('password') ?>
              <?=form_error('password');?>
          </div>
          <div class="form-group label-floating <?=setValidationStyle('confirmpassword') ?>">
              <label class="control-label">
                  Ulangi Password
                  <small>*</small>
              </label>
              <input class="form-control" value="<?=$input->confirmpassword?>" name="confirmpassword" id="confirmpassword" type="password" />
              <?= setValidationIcon('confirmpassword') ?>
              <?=form_error('confirmpassword');?>
          </div>
         <!--
          <div class="form-group label-floating">
              <label class="control-label">
                  Confirm Password
                  <small>*</small>
              </label>
              <input class="form-control" name="" id="registerPasswordConfirmation" type="password" />
          </div>
        -->
          <div class="category form-category">
              <small>*</small> Required fields</div>
          <div class="form-footer text-right">
              <div class="checkbox pull-left <?=setValidationStyle('status')?>">
                  <label>
                      <input type="checkbox" value="belum" <?=set_checkbox('status','belum')?> name="status"> Saya Mengetahui dan Menyetujui Syarat dan Ketentuan
                      <br/>
                  </label>
                  <?=setValidationIcon('status')?>
                  <?=form_error('status');?>
              </div>
              <button type="reset" class="btn btn-primary btn-fill">Batal</button>
              <button type="submit" class="btn btn-rose btn-fill">Register</button>
              <a href="<?=base_url('pengunjung')?>" class="btn btn-dark btn-info btn-fill"> Login <span class="material-icons">keyboard_arrow_right</span></a>
          </div>
      </div>
    </form>
</div>



