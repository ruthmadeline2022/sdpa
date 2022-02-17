 <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="./index.html">
        <img src="<?php echo base_url();?>assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.html">
                <img src="<?php echo base_url();?>assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <!-- Navigation -->
        <ul class="navbar-nav">

          <?php if ($this->uri->segment(1)=='home') { ?>
						<li class="active" style="li:active{color:red}">
					<?php } else { ?> 
						<li class="">
          <?php } ?>
            <a class="nav-link" href="<?php echo base_url('index.php/home');?>">
              <i class="ni ni-tv-2 text-primary"></i> Halaman Utama
            </a>
          </li>
          
          <?php if($_SESSION['id_level']==1||$_SESSION['id_level']==2) { ?>
          <?php if ($this->uri->segment(1)=='bidang'||$this->uri->segment(1)=='program'||$this->uri->segment(1)=='tahun'||$this->uri->segment(1)=='kategori'&&$_SESSION['id_level']==1 ) { ?>
						<li class="active">
					<?php } else { ?> 
						<li class="">
          <?php } ?>
            <a class="nav-link" href="#" data-toggle="modal" data-target="#menu_master">
              <i class="ni ni-planet text-blue"></i> Master
            </a>
          </li>
          

          <?php if ($this->uri->segment(1)=='anggota'||$this->uri->segment(1)=='jabatan'||$this->uri->segment(1)=='struktural'&&$_SESSION['id_level']==1) { ?>
						<li class="active">
					<?php } else { ?> 
						<li class="">
          <?php } ?>
            <a class="nav-link" href="#" data-toggle="modal" data-target="#menu_anggota">
              <i class="ni ni-single-02 text-yellow"></i> Keanggotaan
            </a>
          </li>
          <?php } ?>

          <?php if ($this->uri->segment(1)=='kegiatan'||$this->uri->segment(1)=='detail'||$this->uri->segment(1)=='belanja') { ?>
						<li class="active">
					<?php } else { ?> 
						<li class="">
          <?php } ?>
            <a class="nav-link" href="<?php echo base_url('index.php/kegiatan');?>">
              <i class="ni ni-bullet-list-67 text-red"></i> Perencanaan
            </a>
          </li>

          <?php if ($this->uri->segment(1)=='pengajuan'||$this->uri->segment(1)=='rincian' || $this->uri->segment(1)=='pengeluaran'||$this->uri->segment(1)=='pembelanjaan') { ?>
						<li class="active">
					<?php } else { ?> 
						<li class="">
          <?php } ?>
            <a class="nav-link" href="<?php echo base_url('index.php/pengajuan');?>">
              <i class="ni ni-briefcase-24 text-green"></i> Pengeluaran
            </a>
          </li>

          <?php if ($this->uri->segment(1)=='struktur'||$this->uri->segment(1)=='panitia') { ?>
						<li class="active">
					<?php } else { ?> 
						<li class="">
          <?php } ?>
            <a class="nav-link" href="#" data-toggle="modal" data-target="#menu_panitia">
              <i class="ni ni-circle-08 text-pink"></i> Panitia
            </a>
          </li>
          
          <?php if($_SESSION['id_level']==1||$_SESSION['id_level']==2) { ?>
          <?php if ($this->uri->segment(1)=='user') { ?>
						<li class="active">
					<?php } else { ?> 
						<li class="">
          <?php } ?>
            <a class="nav-link" href="<?php echo base_url('index.php/user');?>">
              <i class="ni ni-circle-08 text-black"></i> User
            </a>
          </li>
          <?php } ?>
          
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">Pelaporan</h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('index.php/bidang');?>">
              <i class="ni ni-spaceship"></i> Bidang
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('index.php/kegiatan');?>">
              <i class="ni ni-ui-04"></i> Dokumen PA
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('index.php/laporan/kategori');?>">
              <i class="ni ni-circle-08"></i> Laporan Kategori
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('index.php/laporan/panitia');?>" target="_blank">
              <i class="ni ni-collection"></i> Laporan Kepanitian
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('index.php/laporan/belanja');?>" target="_blank">
              <i class="ni ni-single-copy-04"></i> Laporan Belanja
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>