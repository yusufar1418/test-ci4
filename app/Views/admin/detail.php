<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
            <!-- Begin Page Content -->
            <div class="container-fluid">

<!-- Page Heading -->


<h1 class="h3 mb-4 text-gray-800">DETAIL USER</h1> 

<div class="card" style="max-width: 100%;">

<img src="<?= base_url('img/profile/'). $userbyid['image']; ?>" class=" rounded mx-auto d-block mt-4" width="200">  

<div class="card-body">
<div class="table-responsive">
<table class="table table-stripped table-hover">
  <tr>
    <th width="250">FULLNAME</th>
    <td width="30">:</td>
    <td><?= $userbyid['fullname']; ?></td>
  </tr>
  <tr>
    <th width="250">USERNAME</th>
    <td width="30">:</td>
    <td><?= $userbyid['username']; ?></td>
  </tr>
  
  <tr>
    <th width="250">EMAIL</th>
    <td width="30">:</td>
    <td><?= $userbyid['email']; ?></td>
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