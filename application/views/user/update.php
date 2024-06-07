<?php
$this->load->view('layout/header');
$this->load->view('layout/navbar');
?>
<div class="container mt-5 pt-4">
    <div class="card card-body my-2 p-3">
    <div class="my-2">
                <img src="<?= ($profile['path'] == null) ? base_url('upload\profile\default-user.png'): '' ?>"
                width="80" height="80" 
                alt="<?= ($profile['filename'] == null) ? 'default picture': '' ?>">
            </div>
    </div>
    <form action="" method="post">
        file
    </form>
</div>

<?php $this->load->view('layout/footer') ?>