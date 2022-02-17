<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Sistem DPA</a>
        <!-- Form -->
      
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="<?php echo base_url();?>assets/img/logo.png">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?php echo $_SESSION['username'];?></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="#" data-toggle="modal" data-target="#chPassword" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Ubah Password</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?php echo base_url('index.php/login/logout');?>" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Keluar</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>