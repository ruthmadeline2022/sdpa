 <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Bidang</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo COUNT($bidang);?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Program</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo COUNT($program);?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Anggota</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo COUNT($anggota);?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php $jumlah = 0; foreach ($bidang as $b ) {
                $jumlah = $jumlah + $b['tap_biaya'];
            } 
            ?>

            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Anggaran</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo "Rp " . number_format($jumlah,2,',','.'); ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Tentang Sekolah</h3>
                </div>
                <div class="col text-right">
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
             
                <div class="col-md-12">
                  <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                          <div class="col-md-4">
                            <img src="<?php echo base_urL('assets/img/logo.png');?>" class="img-rounded" width="70%" style="padding:1%;margin:20%;">
                          </div>
                          <div class="col-md-8">
                            <p style="background-color:#5e72e4;padding:2%;color:white;">VISI SEKOLAH</p>
                            <p style="padding:2%;">Madrasah Mu’allimin Muhammadiyah Yogyakarta sebagai institusi pendidikan Muhammadiyah tingkat menengah yang unggul dan mampu menghasilkan kader ulama, pemimpin, dan pendidik sebagai pembawa misi gerakan Muhammadiyah</p>
                            <p style="background-color:#5e72e4;padding:2%;margin-top:3%;color:white;">MISI SEKOLAH</p>
                            <p style="padding:1%;padding-left:2%;"> 1.	Menyelenggarakan dan mengembangkan pendidikan Islam guna membangun kompetensi dan keunggulan siswa di bidang ilmu-ilmu dasar keislaman, ilmu pengetahuan, teknologi, seni, dan budaya.</p>
                            <p style="padding:1%;padding-left:2%;"> 2.	Menyelenggarakan dan mengembangkan pendidikan bahasa Arab dan bahasa Inggris sebagai alat komunikasi untuk mendalami agama dan ilmu pengetahuan.</p>
                            <p style="padding:1%;padding-left:2%;"> 3.	Menyelenggarakan dan mengembangkan pendidikan kepemimpinan guna membangun kompetensi dan keunggulan siswa di bidang akhlak dan kepribadian.</p>
                            <p style="padding:1%;padding-left:2%;"> 4.	Menyelenggarakan dan mengembangkan pendidikan keguruan guna membangun kompetensi dan keunggulan siswa di bidang kependidikan.</p>
                            <p style="padding:1%;padding-left:2%;"> 5.	Menyelenggarakan dan mengembangkan pendidikan keterampilan guna membangun kompetensi dan keunggulan siswa di bidang Wirausaha.</p>
                            <p style="padding:1%;padding-left:2%;"> 6.  Menyelenggarakan dan mengembangkan pendidikan kader Muhammadiyah guna membangun kompetensi dan keunggulan siswa di bidang organisasi dan perjuangan Muhammadiyah.</p>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
  
            </div>
          </div>
        </div>
      
      </div>