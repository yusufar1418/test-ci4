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
				  EDIT EMPLOYEE
				  </div>
				  <div class="card-body">
            
			<form action="/employee/update/<?= $employeebyid['idemployee'] ?>" method="post" enctype="multipart/form-data">
        
            <?= csrf_field(); ?>
            <input type="hidden" name="nip" value="<?= $employeebyid['nip']; ?>">
            <input type="hidden" name="oldImage" value="<?= $employeebyid['image']; ?>">
        <table class="table table-stripped table-hover">
        <tr>
        <th width="180">NAME</th>
          <td><input type="text" class="form-control form-control-user <?= validation_show_error("name") ? 'is-invalid' : '';?>" name="name"  value="<?= old('name', $employeebyid['name'])?>" id="name" placeholder="Name" autofocus>
          <div class="invalid-feedback">
          <?= validation_show_error("name"); ?>
          </div>
          </td>
        </tr>
        <tr>
        <th>EMAIL</th>
          <td><input type="text" class="form-control form-control-user <?= validation_show_error("email") ? 'is-invalid' : '';?>" name="email" id="email" value="<?= old('email', $employeebyid['email'])?>" placeholder="Email">
          <div class="invalid-feedback">
          <?= validation_show_error("email"); ?>
          </div>
          </td>
        </tr>
        <th>PHONE NUMBER</th>
          <td><input type="number" class="form-control form-control-user <?= validation_show_error("phone_number") ? 'is-invalid' : '';?>" name="phone_number" id="phone_number" value="<?= old('phone_number', $employeebyid['phone_number'])?>" placeholder="Phone number">
          <div class="invalid-feedback">
          <?= validation_show_error("phone_number"); ?>
          </div>
          </td>
        </tr>
        <tr>
        <th>PLACE AND DATE OF BIRTH</th>
          <td> 
            <input type="text" class="form-control <?= validation_show_error("place") ? 'is-invalid' : '';?>" id="place" name="place" placeholder="Tempat" value="<?= old('place', $employeebyid['place']); ?>">
            <div class="invalid-feedback">
                <?= validation_show_error("place"); ?>
            </div>
            <input type="date" class="form-control <?= validation_show_error("date_birth") ? 'is-invalid' : '';?>" id="date_birth" name="date_birth" placeholder="date_birth" value="<?= old('date_birth', date('Y-m-d',$employeebyid['date_birth'])); ?>">
            <div class="invalid-feedback">
                <?= validation_show_error("date_birth"); ?>
            </div>
          </td>
        </tr>
        <tr>
        <th>GENDER</th>
          <td>
            <select class="form-control <?= validation_show_error("gender") ? 'is-invalid' : '';?>" id="gender" name="gender">
            <?php if ($employeebyid['gender'] == 0): ?>
              <option value="<?= $employeebyid['gender']; ?>" selected>Male</option>
                  <?php else: ?>
              <option value="<?= $employeebyid['gender']; ?>" selected>Female</option>
              <?php endif; ?>
            <option value="0" <?= set_select('gender',0) ?>>Male</option>
            <option value="1" <?= set_select('gender',1) ?>>Female</option>
            </select>
            <div class="invalid-feedback">
                <?= validation_show_error("gender"); ?>
            </div>
          </td>
        </tr>
        <tr>
        <th>ADDRESS</th>
            <td>
                <textarea class="form-control <?= validation_show_error("address") ? 'is-invalid' : '';?>" id="exampleFormControlTextarea1" placeholder="Address" name="address" rows="3"><?= old('address',$employeebyid['address']); ?>
                </textarea>
                <div class="invalid-feedback">
                    <?= validation_show_error("address"); ?>
                </div>
            </td>
        </tr>
        <tr>
            <th>HIRE DATE</th>
            <td>
            <input type="date" class="form-control <?= validation_show_error("hire_date") ? 'is-invalid' : '';?>" id="hire_date" name="hire_date" placeholder="hire_date" value="<?= old('hire_date',date('Y-m-d',$employeebyid['hire_date'])); ?>">
            <div class="invalid-feedback">
                <?= validation_show_error("hire_date"); ?>
            </div>
            </td>
        </tr>
        <th>POSITION</th>
          <td>
            <select class="form-control <?= validation_show_error("position") ? 'is-invalid' : '';?>" id="position" name="position">
           
            <option value="<?= $employeebyid['position'] ?>" <?= set_select('position', $employeebyid['position']) ?> selected><?= $employeebyid['position'] ?></option>
            <option value="President" <?= set_select('position','President') ?>>President</option>
            <option value="Vice president" <?= set_select('position','Vice president') ?>>Vice president</option>
            <option value="Director" <?= set_select('position','Director') ?>>Director</option>
            <option value="Manager" <?= set_select('position','Manager') ?>>Manager</option>
            <option value="Assistant manager" <?= set_select('position','Assistant manager') ?>>Assistant manager</option>
            <option value="Executive officer" <?= set_select('position','Executive officer') ?>>Executive officer</option>
            </select>
            <div class="invalid-feedback">
                <?= validation_show_error("position"); ?>
            </div>
          </td>
        </tr>
        <th>STATUS</th>
          <td>
            <select class="form-control <?= validation_show_error("status_employee") ? 'is-invalid' : '';?>" id="status_employee" name="status_employee">
            <option value="<?= $employeebyid['status_employee'] ?>" <?= set_select('status_employee',$employeebyid['status_employee']) ?> selected><?= $employeebyid['status_employee'] ?></option>
            <option value="Permanent" <?= set_select('status_employee','Permanent') ?>>Permanent</option>
            <option value="Contract" <?= set_select('status_employee','Contract') ?>>Contract</option>
            <option value="nternship" <?= set_select('status_employee','nternship') ?>>Internship</option> 
            </select>
            <div class="invalid-feedback">
                <?= validation_show_error("status_employee"); ?>
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="2">
        <div class="form-group row">
        <div class="col-sm-2"><b>Foto (Format File jpeg/jpg Makx 300kb)</b></div>
        <div class="col-sm-10">
          <div class="row">
            <div class="col-sm-3">
              
                <img src="<?= base_url('img/profile/' . $employeebyid['image']); ?>" class="img-thumbnail">
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
			
        <button type="submit" name="add" class="btn btn-primary float-right">Edit</button>
        </form>
    </div>
				</div>
			</div>
      </div>
      </div>


      <!-- End of Main Content -->



<?= $this->endSection(); ?>