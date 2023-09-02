<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   <div class="container">
	
	<div class="row mt-3">
		<div class="col-md-12">

			<div class="card">
				  <div class="card-header">
				  ADD USER
				  </div>
				  <div class="card-body">
            
			<form action="/admin/save" method="post" enctype="multipart/form-data">
        
            <?= csrf_field(); ?>
 	
        <table class="table table-stripped table-hover">
        <tr>
        <th width="180">FULLNAME</th>
          <td><input type="text" class="form-control form-control-user <?= validation_show_error("fullname") ? 'is-invalid' : '';?>" name="fullname"  value="<?= old('fullname')?>" id="fullname" placeholder="Fullname" autofocus>
          <div class="invalid-feedback">
          <?= validation_show_error("fullname"); ?>
          </div>
          </td>
        </tr>
        <tr>
        <th width="180">USERNAME</th>
          <td><input type="text" class="form-control form-control-user <?= validation_show_error("username") ? 'is-invalid' : '';?>" name="username"  value="<?= old('username')?>" id="username" placeholder="Username" autofocus>
          <div class="invalid-feedback">
          <?= validation_show_error("username"); ?>
          </div>
          </td>
        </tr>
        <tr>
        <th>EMAIL</th>
          <td><input type="text" class="form-control form-control-user <?= validation_show_error("email") ? 'is-invalid' : '';?>" name="email" id="email" value="<?= old('email')?>" placeholder="Email">
          <div class="invalid-feedback">
          <?= validation_show_error("email"); ?>
          </div>
          </td>
        </tr>
        <tr>
        <th>PASSWORD</th>
          <td> 
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" class="form-control form-control-user <?= validation_show_error("password1") ? 'is-invalid' : '';?>" name="password1"  placeholder="Password">
                <div class="invalid-feedback">
                  <?= validation_show_error("password1"); ?>
                </div>
              </div>
              <div class="col-sm-6">
                <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
              </div>
              </div>
          </td>
        </tr>
        <tr>
        <tr>
          <td colspan="2">
        <div class="form-group row">
        <div class="col-sm-2"><b>Foto (Format File jpeg/jpg Max 300kb)</b></div>
        <div class="col-sm-10">
          <div class="row">
            <div class="col-sm-3">
              
                <img src="<?= base_url('img/profile/default.jpg'); ?>" class="img-thumbnail">
            </div>
            <div class="col-sm-9">
              <div class="custom-file">
              <input type="file" class="custom-file-input" id="image" name="image">
              <label class="custom-file-label" for="image">Choose file</label>
              <?= validation_show_error("image"); ?>
              </div>
            </div>
            
          </div>
        </div>
        </div>
        </td>
    </tr>
        

        </table>
      </div>
    </div>
    <br>
			
        <button type="submit" name="add" class="btn btn-primary float-right">Add</button>
        </form>
    </div>
				</div>
			</div>
      </div>
      </div>


      <!-- End of Main Content -->



<?= $this->endSection(); ?>