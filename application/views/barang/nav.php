<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link <?php if ($judul == 'Daftar Barang') {
                                                        echo 'active';
                                                    }  ?>" href="<?= base_url(); ?>barang">Barang</a>
  </li>
  <li class="nav-item ">
    <a class="nav-link <?php if ($judul == 'Daftar Barang Grosir') {
                                                        echo 'active';
                                                    }  ?>" href="<?= base_url(); ?>barang">Grosir</a>
  </li>
  <li class="nav-item ">
    <a class="nav-link <?php if ($judul == 'Daftar Barang Diskon') {
                                                        echo 'active';
                                                    }  ?>" href="<?= base_url(); ?>barang">Diskon</a>
  </li>
</ul>