<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
            <!-- Begin Page Content -->
            <div class="container-fluid">

<!-- Page Heading -->


<h1 class="h3 mb-4 text-gray-800">DETAIL EMPLOYEE</h1> 

<div class="card" style="max-width: 100%;">

<img src="<?= base_url('img/profile/'). $employeebyid['image']; ?>" class=" rounded mx-auto d-block mt-4" width="200">  

<div class="card-body">
<div class="table-responsive">
<table class="table table-stripped table-hover">
<tr>
    <th width="250">NIP</th>
    <td width="30">:</td>
    <td><?= $employeebyid['nip']; ?></td>
  </tr>  
<tr>
    <th width="250">NAME</th>
    <td width="30">:</td>
    <td><?= $employeebyid['name']; ?></td>
  </tr>
  <tr>
    <th width="250">EMAIL</th>
    <td width="30">:</td>
    <td><?= $employeebyid['email']; ?></td>
  </tr>
  <tr>
    <th width="250">PHONE NUMBER</th>
    <td width="30">:</td>
    <td><?= $employeebyid['phone_number']; ?></td>
  </tr>
  <tr>
    <th width="250">PLACE AND DATE OF BIRTH</th>
    <td width="30">:</td>
    <td><?= $employeebyid['place']; ?>, <?= date('d-m-Y',$employeebyid['date_birth']); ?></td>
</tr>
    <tr>
        <th width="250">GENDER</th>
        <td width="30">:</td>
        <?php if ($employeebyid['gender'] == 0): ?>
        <td>Male</td>
        <?php else: ?>
        <td>Female</td>
        <?php endif ?>
    </tr>
    <tr>
        <th width="250">ADDRESS</th>
        <td width="30">:</td>
        <td><?= $employeebyid['address']; ?></td>   
    </tr>
    <tr>
        <th width="250">POSITION</th>
        <td width="30">:</td>
        <td><?= $employeebyid['position']; ?></td>   
    </tr>
    <tr>
        <th width="250">STATUS EMPLOYEE</th>
        <td width="30">:</td>
        <td><?= $employeebyid['status_employee']; ?></td>   
    </tr>
    <tr>
        <th width="250">HIRE DATE</th>
        <td width="30">:</td>
        <td><?= date('d-m-Y',$employeebyid['hire_date']); ?></td>   
    </tr>
  
 </table>
</div>
</div>
</div>
<br>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?= $this->endSection(); ?>