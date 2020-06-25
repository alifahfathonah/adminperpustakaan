
<div class="card">
    
      <?=form_open($form_action);?>
      <div class="card-header card-header-icon" data-background-color="rose">
          <i class="fa fa-users fa-2x"></i>
      </div>
      <div class="card-content">
          <h4 class="card-title">Register Forms</h4>
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
          <div class="form-group label-floating <?=setValidationStyle('nim')?>">
            <label class="control-label">
              NIM<small>*</small>
            </label>
            <input type="text" name="nim" class="form-control" value="<?=$input->nim?>" >
            <?=setValidationIcon('nim') ?>
            <?=form_error('nim')?>
          </div>
          <div class="form-group label-floating <?=setValidationStyle('nik')?> " >
            <label class="control-label">
              NIK KTP<small>*</small>
            </label>
            <input type="number" name="nik" class="form-control" value="<?=$input->nik?>" >
            <?=setValidationIcon('nik');?>
            <?=form_error('nik')?>
          </div>

          <div class="form-group label-floating <?=setValidationStyle('nama')?>">
            <label class="control-label">
              Nama<small>*</small>
            </label>
            <input type="text" name="nama" class="form-control" value="<?=$input->nama?>" >
            <?=setValidationIcon('nama');?>
            <?=form_error('nama')?>
          </div>
          <div class="form-group label-floating <?=setValidationStyle('alamat')?>">
            <label class="control-label">
              Alamat<small>*</small>
            </label>
            <textarea name="alamat" class="form-control" ><?=$input->alamat?></textarea>
            <?=setValidationIcon('alamat');?>
            <?=form_error('alamat')?>
          </div>

          
          <div class="row">
              <div class="form-group label-floating column-sizing <?=setValidationStyle('gender');?>">
                <label class=" control-label col-sm-2"  >Gender<small>*</small></label>
              
                <div class="col-sm-6">
                    <div class="form-group label-floating column-sizing">
                        <div class="radio">
                            <label>
                                <input type="radio" name="gender" value="perempuan" <?=set_radio('gender','perempuan')?> > Perempuan
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group label-floating column-sizing">
                        <div class="radio">
                            <label>
                                <input type="radio" name="gender"  value="laki-laki" <?=set_radio('gender','laki-laki')?> > Laki-laki
                            </label>
                        </div>
                    </div>
                </div>
                <?=setValidationIcon('gender')?>
                <?=form_error('gender')?>
              </div>
          </div>
          <div class="form-group label-floating <?=setValidationStyle('kode_post');?>" >
            <label class="control-label">
              Kode Post<small>*</small>
            </label>
            <input type="text" name="kode_post" class="form-control" value="<?=$input->kode_post?>">
            <?=setValidationIcon('kode_post');?>
            <?=form_error('kode_post')?>

          </div>
          <div class="row">
              
              <div class="col-sm-8">
                  <div class="form-group label-floating column-sizing <?=setValidationStyle('tmp_lahir');?>">
                      <label class=" control-label  label-on-right">Tempat Lahir<small>*</small></label>
                      <input class="form-control" name="tmp_lahir" value="<?=$input->tmp_lahir?>" id="tmp_lahir" type="text"  />
                      <?=setValidationIcon('tmp_lahir');?>
                      <?=form_error('tmp_lahir')?>
                  </div>
              </div>
              <div class="col-sm-4">
                  <div class="form-group label-floating column-sizing <?=setValidationStyle('tgl_lahir');?>" >
                      <label class="control-label label-on-right">Tanggal<small>*</small></label>
                      <input class="form-control datepicter" value="<?=$input->tgl_lahir?>" name="tgl_lahir" id="tanggal" type="date"   />
                      <?=setValidationIcon('tgl_lahir');?>
                      <?=form_error('tgl_lahir')?>
                  </div>
              </div>
          </div>
          <div class="form-group label-floating <?=setValidationStyle('agama');?>">
            <label class="control-label">
                  Agama
                  <small>*</small>
            </label>
            <select name="agama" class="selectpicker" data-style="btn" title="Agama" >
                
                <option value="islam" 
                 >Islam</option>
                <option value="kristen" <?=set_select('agama','kristen');?>>Kristen</option>
                <option value="katolik" <?=set_select('agama','katolik');?>>Katolik</option>
                <option value="hindu" <?=set_select('agama','hindu');?>>Hindu</option>
                <option <?=set_select('agama','budha');?> value="budha">Budha</option>
                <option value="khonghuchu" <?=set_select('agama','khonghuchu');?>>Khonghuchu</option>
            </select>
            <?=setValidationIcon('agama');?>
            <?=form_error('agama')?>
          </div>
          
          <div class="form-group label-floating <?=setValidationStyle('jurusan');?>">
              <label class="control-label">
                  Jurusan
                  <small>*</small>
              </label>
              <input class="form-control" name="jurusan" type="text" value="<?=$input->jurusan?>" />
              <?=setValidationIcon('jurusan');?>
              <?=form_error('jurusan')?>
          </div>
          <div class="form-group label-floating <?=setValidationStyle('angkatan');?>">
              <label class="control-label">
                  Angkatan
                  <small>*</small>
              </label>
              <input class="form-control" value="<?=$input->angkatan?>" name="angkatan" type="number" />
              <?=setValidationIcon('angkatan');?>
              <?=form_error()?>
          </div>
          <div class="form-group label-floating <?=setValidationStyle('hp');?>">
              <label class="control-label">
                  No Hp/Telpn.
                  <small>*</small>
              </label>
              <input class="form-control" value="<?=$input->hp?>" name="hp" type="number"  />
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
              <small>*</small> Required fields
          </div>
          <div class="row">
            <div class="form-footer text-right">
              <div class="col-md-12 ">
                
                <div class="checkbox pull-left <?=setValidationStyle('status')?>">
                    <label>
                        <input type="checkbox" value="belum" <?=set_checkbox('status','belum')?> name="status"> Saya Mengetahui dan Menyetujui Syarat dan Ketentuan
                        <br/>
                    </label>
                    <?=setValidationIcon('status')?>
                    <?=form_error('status');?>
                </div> 
              </div>
              
            </div>
          </div>
          <div class="row">
            <div class="form-footer text-left">
              <div class="col-md-12 col-md-offset-6">
                <button type="reset" class="btn btn-primary btn-fill">Batal</button>
                <button type="submit" class="btn btn-rose btn-fill">Register</button>
                <a href="<?=base_url()?>" class="btn btn-dark btn-info btn-fill"> Login <span class="material-icons">keyboard_arrow_right</span></a>
                  
              </div>
              
            </div>
          </div>
      </div>
    </form>
</div>



