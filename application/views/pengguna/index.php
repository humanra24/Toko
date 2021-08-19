<!-- alert -->

<!-- <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-siapa" data-flashsiapa="<?= $this->session->flashdata('siapa'); ?>"></div> -->

<?php if ($this->session->flashdata('flash') && $this->session->flashdata('siapa')) : ?>
    <!-- <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data pengguna
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

<!-- label pengguna -->

<h2>Daftar Kasir</h2>

<!-- end label alert -->

<!-- button tambah -->

<a href="<?= base_url(); ?>pengguna/tambah" class="btn float-right btn-primary">
    <span style="font-size: 15px; color: white;"> <i class="fas fa-plus"> Tambah </i> </span>
</a>

<!-- end button tambah -->

<!-- table pengguna -->

<div class="table-responsive">
    <div class="mt-2">
        <table class="table table-bordered table-striped" id="tabel">
            <thead>
                <tr class="table-secondary">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>No telp.</th>
                    <th>Alamat</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; 
                foreach ($pengguna as $pgn) : ?>
                    <tr>
                        <th><?= $no++ ?></th>
                        <td><?= $pgn['nama_pengguna']; ?></td>
                        <td><?= $pgn['jk']; ?></td>
                        <td><?= $pgn['no_telp']; ?></td>
                        <td><?= $pgn['alamat']; ?></td>
                        <td><?= $pgn['username']; ?></td>
                        <td><?= $pgn['password']; ?></td>
                        <td><?= $pgn['golongan']; ?></td>
                        <td>
                            <a href="<?= base_url(); ?>pengguna/ubah/<?= $pgn['id_pengguna']; ?>" class="btn"><span style="font-size: 20px; color: green;"> <i class="fas fa-edit"></i> </span> </a>
                            <a href="<?= base_url(); ?>pengguna/hapus/<?= $pgn['id_pengguna']; ?>" id="pengguna" name="<?= $pgn['nama_pengguna']; ?>" class="btn hapus"><span style="font-size: 20px; color: red;"> <i class="fas fa-trash-alt"></i> </span> </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- end table pengguna -->

