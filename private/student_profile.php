<?php include('navigation.php');?>
<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row">
<div class="col">
<h3 class="page-title">Profile</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
<li class="breadcrumb-item active">Profile</li>
</ul>
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="profile-header">
<div class="row align-items-center">
<div class="col-auto profile-image">
<a href="#">
<img class="rounded-circle" alt="User Image" src="assets/img/profiles/avatar-02.jpg">
</a>
</div>
<div class="col ml-md-n2 profile-user-info">
<h4 class="user-name mb-0">John Doe</h4>
<h6 class="text-muted">UI/UX Design Team</h6>
<div class="user-Location"><i class="fas fa-map-marker-alt"></i> Florida, United States</div>
<div class="about-text">Lorem ipsum dolor sit amet.</div>
</div>
<div class="col-auto profile-btn">
<a href="#" class="btn btn-primary">
Edit
</a>
</div>
</div>
</div>
<div class="profile-menu">
<ul class="nav nav-tabs nav-tabs-solid">
<li class="nav-item">
<a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
</li>
</ul>
</div>
<div class="tab-content profile-tab-cont">

<div class="tab-pane fade show active" id="per_details_tab">

<div class="row">
<div class="col-lg-9">
<div class="card">
<div class="card-body">
<h5 class="card-title d-flex justify-content-between">
<span>Personal Details</span>
<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="far fa-edit mr-1"></i>Edit</a>
</h5>
<div class="row">
<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
<p class="col-sm-9">John Doe</p>
</div>
<div class="row">
<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
<p class="col-sm-9">24 Jul 1983</p>
</div>
<div class="row">
<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
<p class="col-sm-9"><a href="https://preschool.dreamguystech.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0a606562646e656f4a6f726b677a666f24696567">[email&#160;protected]</a></p>
</div>
<div class="row">
<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
<p class="col-sm-9">305-310-5857</p>
 </div>
<div class="row">
<p class="col-sm-3 text-muted text-sm-right mb-0">Address</p>
<p class="col-sm-9 mb-0">4663 Agriculture Lane,<br>
Miami,<br>
Florida - 33165,<br>
United States.</p>
</div>
</div>
</div>
</div>
<div class="col-lg-3">

<div class="card">
<div class="card-body">
<h5 class="card-title d-flex justify-content-between">
<span>Account Status</span>
<a class="edit-link" href="#"><i class="far fa-edit mr-1"></i> Edit</a>
</h5>
<button class="btn btn-success" type="button"><i class="fe fe-check-verified"></i> Active</button>
</div>
</div>


<div class="card">
<div class="card-body">
<h5 class="card-title d-flex justify-content-between">
<span>Skills </span>
<a class="edit-link" href="#"><i class="far fa-edit mr-1"></i> Edit</a>
</h5>
<div class="skill-tags">
<span>Html5</span>
<span>CSS3</span>
<span>WordPress</span>
<span>Javascript</span>
<span>Android</span>
<span>iOS</span>
<span>Angular</span>
<span>PHP</span>
</div>
</div>
</div>

</div>
</div>

</div>


<div id="password_tab" class="tab-pane fade">
<div class="card">
<div class="card-body">
<h5 class="card-title">Change Password</h5>
<div class="row">
<div class="col-md-10 col-lg-6">
<form>
<div class="form-group">
<label>Old Password</label>
<input type="password" class="form-control">
</div>
<div class="form-group">
<label>New Password</label>
<input type="password" class="form-control">
</div>
<div class="form-group">
<label>Confirm Password</label>
<input type="password" class="form-control">
</div>
<button class="btn btn-primary" type="submit">Save Changes</button>
</form>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>

</div>


            <!-- <footer style="position: absolute;bottom: 0px;width: 100%;">
                <p>Copyright © 2021 KaiZev.</p>
            </footer> -->

           




<script src="<?php echo PUBLICPATH?>assets/scripts/jquery.js"></script>


<script src="<?php echo PUBLICPATH?>assets/scripts/popper.min.js"></script>
<script src="assets/scripts/bootstrap.min.js"></script>

<script src="<?php echo PUBLICPATH?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo PUBLICPATH?>assets/plugins/jquery.slimscroll.min.js"></script>

<!-- <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="assets/plugins/apexchart/chart-data.js"></script> -->

<script src="<?php echo PUBLICPATH?>assets/scripts/script.js"></script>
</body>

<!-- Mirrored from preschool.dreamguystech.com/html-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Nov 2021 10:18:32 GMT -->

</html>