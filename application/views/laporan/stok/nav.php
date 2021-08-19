<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link <?php if ($judul == 'Laporan Stok Masuk') {
                                                        echo 'active';
                                                    }  ?>" href="<?= base_url(); ?>laporan/stokMasuk">Masuk</a>
  </li>
  <li class="nav-item ">
    <a class="nav-link <?php if ($judul == 'Laporan Stok Keluar') {
                                                        echo 'active';
                                                    }  ?>" href="<?= base_url(); ?>laporan/stokKeluar">Keluar</a>
  </li>
</ul>