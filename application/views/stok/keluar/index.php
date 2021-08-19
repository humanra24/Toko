<!-- alert -->
<!-- 
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-siapa" data-flashsiapa="<?= $this->session->flashdata('siapa'); ?>"></div> -->

<?php if ($this->session->flashdata('flash') && $this->session->flashdata('siapa')) : ?>
    <!-- <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data stok
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

<!-- label Stok -->

<h2>Daftar Stok Keluar</h2>

<!-- end label stok -->

<!-- button tambah -->

<a href="<?= base_url(); ?>stok/tambahKeluar" class="btn float-right btn-primary">
    <span style="font-size: 15px; color: white;"> <i class="fas fa-plus"> Tambah </i> </span>
</a>

<!-- end button tambah -->

<!-- table stok -->

<div class="table-responsive">
    <div class="mt-2">
        <table class="table table-bordered table-striped" id="tabel">
            <thead>
                <tr class="table-secondary">
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Jumlah</th>
                </tr>

            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($stok as $stk) : ?>                
                <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?php $tgl = $stk['tgl'];
                            $tgl = date('d-m-Y', strtotime($tgl));
                            echo $tgl;?></td>
                    <td><?= $stk['id_barang']; ?></td>
                    <td><?= $stk['nama_barang']; ?></td>
                    <td><?= $stk['ket']; ?></td>
                    <td><?= $stk['jml_barang']; ?></td>

                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- end table stok -->