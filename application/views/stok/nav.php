<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link <?php if ($judul == 'Daftar Stok Masuk') {
                                                        echo 'active';
                                                    }  ?>" href="<?= base_url(); ?>stok/masuk">Masuk</a>
  </li>
  <li class="nav-item ">
    <a class="nav-link <?php if ($judul == 'Daftar Stok Keluar') {
                                                        echo 'active';
                                                    }  ?>" href="<?= base_url(); ?>stok/keluar">Keluar</a>
  </li>
</ul>