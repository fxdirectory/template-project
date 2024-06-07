<?php
$this->load->view('layout/header');
$this->load->view('layout/navbar');
?>
<div class="container mt-5 pt-4">
    <div class="card card-body my-2 p-3">
        <h5 class="card-title">Page Add Data</h5>
        <div class="my-3">
            <a href="<?= base_url('data') ?>" class="btn btn-danger font-weight-bold float-left">
                <i class="fa fa-arrow-left mr-2" aria-hidden="true"></i>Back
            </a>
        </div>
        <div class="px-3">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="name-product">Nama Produk</label>
                    <input type="text" name="nama-produk" class="form-control" id="name-product">
                </div>
                <div class="form-group">
                    <label for="jenis-produk">Jenis Produk</label>
                    <select class="form-control" id="jenis-produk" name="jenis-produk">
                        <option value="bahan makanan">bahan makanan</option>
                        <option value="furniture">furniture</option>
                        <option value="accesories">accesories</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah">jumlah</label>
                    <input type="number" name="jumlah" class="form-control" id="jumlah">
                </div>
                <div class="form-group">
                    <label for="harga">harga</label>
                    <input type="number" name="harga" class="form-control" id="harga">
                </div>
                <button type="submit" name="save" class="btn btn-primary font-weight-bold float-right">
                    <i class="fa fa-floppy-o mr-2" aria-hidden="true"></i>Save
                </button>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('layout/footer') ?>