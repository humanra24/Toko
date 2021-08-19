

<!-- alert -->

<!-- <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-siapa" data-flashsiapa="<?= $this->session->flashdata('siapa'); ?>"></div> -->

<?php if ($this->session->flashdata('flash') && $this->session->flashdata('siapa')) : ?>
    <!-- <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data supplier
                    <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                    <strong>berhasil</strong> <?= $this->session->flashdata('siapa'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div> -->
<?php endif; ?>

<!-- end alert -->

<!-- label Supplier -->

<h2>Daftar Supplier</h2>

<!-- end label Supplier -->

<!-- button tambah -->

<a href="<?= base_url(); ?>supplier/tambah" class="btn float-right btn-primary">
    <span style="font-size: 15px; color: white;"> <i class="fas fa-plus"> Tambah </i> </span>
</a>

<!-- end button supplier -->

<!-- table supplier -->

<div class="table-responsive">
    <div class="mt-2">
        <table class="table table-bordered table-striped" id="tabel">
            <thead>
                <tr class="table-secondary">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No telp.</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no=1;
                foreach ($supplier as $spl) : ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></>
                        </th>
                        <td><?= $spl['nama_supplier']; ?></td>
                        <td><?= $spl['no_telp']; ?></td>
                        <td><?= $spl['alamat']; ?></td>
                        <td>
                            <a href="<?= base_url(); ?>supplier/ubah/<?= $spl['id_supplier']; ?>" class="btn"> <span style="font-size: 20px; color: green;"> <i class="fas fa-edit"></i> </span> </a>
                            <a href="<?= base_url(); ?>supplier/hapus/<?= $spl['id_supplier']; ?>" name="<?= $spl['nama_supplier']; ?>" id="supplier" class="btn hapus"> <span style="font-size: 20px; color: red;"> <i class="fas fa-trash-alt"></i> </span> </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>

<!-- end table -->