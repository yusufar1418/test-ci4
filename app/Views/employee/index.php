<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  
   	<div class="row">
  		<div class="col-lg">

          <?php if(session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
          <?php endif; ?>

          <a href="<?= base_url('employee/create') ?>" class="btn btn-primary mb-3">Add Employee</a>
          

      <div class="table-responsive">
        <table align="center" id="table" class="table table-stripped table-bordered table-hover" bgcolor="white" >
      			<thead class="table-primary">
      			<tr>
              <th width="20">No</th>
              <th>NIP</th>
              <th>Name</th>
              <th>Position</th>
              <th>Status</th>
              <th>Hire Date</th>
              <th>Action</th>	
      			</tr>
      			</thead>
      			<tbody>
      				<?php $i = 1; ?>
      				<?php foreach ($employeelist as $el ) :?>
      			<tr>
      				<th scope="row"><?= $i; ?></th>
      				<td><?= $el['nip']; ?></td>
      				<td><?= $el['name']; ?></td> 
      				<td><?= $el['position']; ?></td> 
      				<td><?= $el['status_employee']; ?></td> 
      				<td><?= date('Y-m-d',$el['hire_date']); ?></td> 
              <td>
                <!-- start link detail -->
                <a href="<?= base_url('employee/') .$el['nip'];?>" class="badge badge-primary float-right ml-1">Detail</a><br>
                
                <a href="<?= base_url('employee/edit/') .$el['nip'];?>" class="badge badge-success float-right ml-1">Edit</a><br>
                
                <form action="/employee/<?= $el['idemployee'] ?>" method="post" class="d-inline">
                  <?= csrf_field(); ?>
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="badge badge-danger float-right ml-1" onclick="return confirm('Apakah anda yakin?')">Delete</button><br>
                </form>
                <!-- stop link detail -->
            		
      				</td>
      			</tr>
      			<?php $i++; ?>
      		<?php endforeach; ?>
      			</tbody>
      		</table>
        </div>
    </div>

  </div>
  </div>
</div>
      <!-- End of Main Content
<?= $this->endSection(); ?>

