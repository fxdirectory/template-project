<?php
$this->load->view('layout/header');
$this->load->view('layout/navbar');
?>
<div class="container mt-5 pt-4">
    <div class="card card-body my-2 p-3">
        <div>
            <h5 class="card-title float-left">Page User</h5>
            <a href="<?= base_url('authuser/logout/' . $profile['id']) ?>" class="btn btn-danger float-right font-weight-bold">
                <i class="fa fa-sign-out mr-1" aria-hidden="true"></i>Logout
            </a>
        </div>
        <div class="p-3">
            <div class="my-2">
                <img src="<?= ($profile['path'] == null) ? base_url('upload\profile\default-user.png'): '' ?>"
                width="80" height="80" 
                alt="<?= ($profile['filename'] == null) ? 'default picture': '' ?>">
            </div>
            <div class="my-2">
                <h5 class="">ID user:</h5>
                <div><?= $profile['id'] ?></div>
            </div>
            <div class="my-2">
                <h5 class="">Username:</h5>
                <div><?= $profile['username'] ?></div>
            </div>
            <div class="my-2">
                <h5 class="">Email User:</h5>
                <div><?= $profile['email'] ?></div>
            </div>
            <div class="my-2">
                <a href="<?= base_url('user/update_profile/'.$profile['id'])?>" class="btn btn-primary"> Update Profile</a>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('layout/footer') ?>