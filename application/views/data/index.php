<?php
$this->load->view('layout/header');
$this->load->view('layout/navbar');
?>
<div class="container mt-5 pt-4">
    <div class="card card-body my-2 p-3">
        <h5 class="card-title">Page Data</h5>
        <div class="my-3">
            <a href="<?= base_url('data/add') ?>" class="btn btn-primary font-weight-bold float-left">
                <i class="fa fa-plus mr-2" aria-hidden="true"></i>Add
            </a>
            <div class="float-right">
                <a href="<?= base_url('data/add') ?>" class="btn btn-warning font-weight-bold mr-2">
                    <i class="fa fa-print mr-2" aria-hidden="true"></i>Print
                </a>
                <a href="<?= base_url('data/export') ?>" class="btn btn-success font-weight-bold">
                    <i class="fa fa-table mr-2" aria-hidden="true"></i>Export
                </a>
            </div>
        </div>
        <?php if ($this->session->flashdata('success')) : ?>
            <h5 class="card-body text-center text-success">
                <?= $this->session->flashdata('success') ?>
            </h5>
        <?php elseif ($this->session->flashdata('failed')) : ?>
            <h5 class="card-body text-center text-danger">
                <?= $this->session->flashdata('failed') ?>
            </h5>
        <?php endif ?>
        <div class="px-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama barang</th>
                        <th scope="col">Jenis Barang</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($produk as $p):?>
                    <tr>
                        <th scope="row"><?= $p->id?></th>
                        <td><?= $p->nama_produk?></td>
                        <td><?= $p->jenis?></td>
                        <td><?= $p->jumlah?> pcs</td>
                        <td>Rp <?= $p->harga?>,-</td>
                        <td>
                            <a href="<?=base_url('data/edit/'.$p->id)?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="<?=base_url('data/delete/'.$p->id)?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $this->load->view('layout/footer') ?>