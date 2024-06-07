<?php $this->load->view('layout/header-auth') ?>
<div class="card" style="width: 25rem;">
    <div class="card-body">
        <h4 class="card-title text-center">Register</h4>
        <?php if ($this->session->flashdata('message')) : ?>
            <h5 class="card-body text-center">
                <?= $this->session->flashdata('message') ?>
            </h5>
        <?php endif ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Name</label>
                <input type="text" name="name" class="form-control" id="username" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
            </div>
            <div class="form-group">
                <label for="re-password">Retype password</label>
                <input type="re-password" name="re-password" class="form-control" id="re-password" placeholder="Retype password">
            </div>
            <button type="submit" name="daftar" class="btn btn-primary btn-block">Register</button>
            <small>Do you have account? <a href="<?= base_url('authuser/login') ?>">login</a></small>
        </form>
        <div class="text-center py-3 font-weight-bold">
            fx_directory © <?= date('Y') ?>
        </div>
    </div>
</div>
<?php $this->load->view('layout/footer-auth') ?>