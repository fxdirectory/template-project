<?php $this->load->view('layout/header-auth'); ?>
<div class="card" style="width: 25rem;">
    <div class="card-body">
        <h4 class="card-title text-center">Login</h4>
        <?php if ($this->session->flashdata('message')) : ?>
            <h5 class="card-body text-center">
                <?= $this->session->flashdata('message') ?>
            </h5>
        <?php endif ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
            </div>
            <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
            <small>Do you haven't account? <a href="<?= base_url('authuser/register') ?>">register</a></small>
        </form>
        <div class="text-center py-3 font-weight-bold">
            fx_directory © <?= date('Y') ?>
        </div>
    </div>
</div>
<?php $this->load->view('layout/footer-auth'); ?>