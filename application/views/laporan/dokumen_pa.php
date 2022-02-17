<?php if(COUNT($this->session->userdata('id_user'))==0) { redirect();?>

<?php } else { ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Sistem Dokumen Pelakasanaan Anggaran</title>
  <!-- Favicon -->
  <link href="<?php echo base_url();?>assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="<?php echo base_url();?>assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="<?php echo base_url();?>assets/css/argon.css?v=1.0.0" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body onload="window.print()">
    <!-- Page content -->
    <br/>
    <br/>
    <br/>

    <?php $jumlah = 0; foreach ($belanja as $b ) {
        $jumlah = $jumlah + $b['jumlah'];
    } 
      $sisa = $kegiatan->tap_kegiatan - $jumlah;
    ?>
    
    <div class="container-fluid mt--7">
      <div class="row mt-5">
        <div class="col">
        <p style="font-size:20pt;">DOKUMEN PELAKSANAAN ANGGARAN</p>
        <p style="font-size:15pt;">Madrasah Muallimin Muhammadiyah Yogyakarta</p>
        <p style="font-size:10pt;"><?php echo $tahun->nama_tahun;?></p>
        <br/>
          <div class="card">
            
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">Informasi Umum</h6>
                <div class="pl-lg-4">
                  <div class="row">
                  <div class="table">
                        <!-- Projects table -->
                        <div class="table">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" width="20%">Unit Kerja</th>
                                <th scope="col" width="80%"> : <?php echo $kegiatan->nama_bidang;?></th>
                            </tr>
                            <tr>
                                <th scope="col" width="20%">Program</th>
                                <th scope="col" width="80%"> : <?php echo $kegiatan->nama_program;?></th>
                            </tr>
                            <tr>
                                <th scope="col" width="20%">Kegiatan</th>
                                <th scope="col" width="80%"> : <?php echo $kegiatan->nama_kegiatan;?></th>
                            </tr>
                            <tr>
                                <th scope="col" width="20%">Pelaksana Kegiatan</th>
                                <th scope="col" width="80%"> : <?php echo $detail->pelaksana;?></th>
                            </tr>
                            <tr>
                                <th scope="col" width="20%">Sasaran</th>
                                <th scope="col" width="80%"> : <?php echo $detail->sasaran;?></th>
                            </tr>
                            <tr>
                                <th scope="col" width="20%">Lokasi Kegiatan</th>
                                <th scope="col" width="80%"> : <?php echo $detail->lokasi;?></th>
                            </tr>
                            <tr>
                                <th scope="col" width="20%">Jumlah Dana</th>
                                <th scope="col" width="80%"> : <?php echo $kegiatan->tap_kegiatan;?></th>
                            </tr>
                            </thead>
                        </table>
                        </div>
                    </div>
                  </div>
                </div>


                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Indikator & Tolak Ukur Kinerja Belanja Langsung</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Indikator</th>
                                <th scope="col">Tolak Ukur Kinerja</th>
                                <th scope="col">Target Kinerja</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">Capaian Kegiatan</th>
                                <td><?php echo $detail->capaian;?></td>
                                <td><?php echo $detail->target_capaian;?></td>
                            </tr>
                            <tr>
                                <th scope="row" rowspan="3">Masukan</th>
                                <td>Sumber Dana</td>
                                <td><?php echo $detail->sumber_dana;?></td>
                            </tr>
                            <tr>
                                <td>Tenaga</td>
                                <td><?php echo $detail->tenaga;?></td>
                            </tr>
                            <tr>
                                <td>Waktu</td>
                                <td><?php echo $detail->waktu;?></td>
                            </tr>
                            <tr>
                                <th scope="row">Keluaran</th>
                                <td><?php echo $detail->keluaran;?></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                  </div>
                </div>


                <hr class="my-4" />
                <!-- Description -->
                <center>
                <h6 class="heading-small text-muted mb-4"><b>RINCIAN ANGGARAN BELANJA LANGSUNG</b></h6>
                <h6 class="heading-small text-muted mb-4">MENURUT PROGRAM PER KEGIATAN Kepala Urusan Pembinaan Kader Persyarikatan</h6>
                </center>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" width="5%">No.</th>
                                <th scope="col" width="40%">Uraian</th>
                                <th scope="col" width="5%">Volume</th>
                                <th scope="col" width="5%">Satuan</th>
                                <th scope="col" width="15%">Harga</th>
                                <th scope="col" width="20%">Jumlah</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(COUNT($belanja)==null) { ?>
                              <tr>
                                <td colspan="6">&nbsp &nbsp <i style="font-size:12px;">*/ Data belanja masih kosong, silahkan diisi</i></td>
                              </tr>
                            <?php }  else { ?>
                            <?php $no=1; foreach ($belanja as $b) { ?>
                                <tr>
                                    <th scope="row"><?php echo $no++;?></th>
                                    <td><?php echo $b['belanja'];?></td>
                                    <td><?php echo $b['volume'];?></td>
                                    <td><?php echo $b['satuan'];?></td>
                                    <td><?php echo "Rp " . number_format($b['harga'],2,',','.');?></td>
                                    <td><?php echo "Rp " . number_format($b['jumlah'],2,',','.');?></td>
                                </tr>
                            <?php } }?>
                            </tbody>
                            <tfoot>
                                <tr>
                                  <th scope="col" width="70%" colspan="5">JUMLAH</th>
                                  <th scope="col" width="20%"><?php echo "Rp " . number_format($jumlah,2,',','.');?></th>
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                    </div>
                  </div>
                </div>

            </div>
              
            </div>
          </div>
        </div>
        
      </div>

      <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" width="25%">
                      <br/>
                      <?php echo $struktural1->nama_jabatan;?>
                      
                      <br/>
                      <br/>
                      <br/>
                      <br/>
                      <br/>
                      <br/>

                      <?php echo $struktural1->nama_anggota;?><br/>
                      NBM. <?php echo $struktural1->nbm_anggota;?>
                    </th>
                    <th scope="col" width="25%">
                      <br/>
                      <?php echo $struktural2->nama_jabatan;?>
                      
                      <br/>
                      <br/>
                      <br/>
                      <br/>
                      <br/>
                      <br/>

                      <?php echo $struktural2->nama_anggota;?><br/>
                      NBM. <?php echo $struktural2->nbm_anggota;?>
                    </th>
                    <th scope="col" width="25%">
                      <br/>
                      <?php echo $struktural3->nama_jabatan;?>
                      
                      <br/>
                      <br/>
                      <br/>
                      <br/>
                      <br/>
                      <br/>

                      <?php echo $struktural3->nama_anggota;?><br/>
                      NBM. <?php echo $struktural3->nbm_anggota;?>
                    </th>
                    <th scope="col" width="25%">
                      Yogyakarta, <?php echo date('d F Y', strtotime(date('d-m-Y')));?><br/>
                      <?php echo $struktural4->nama_jabatan;?>
                      
                      <br/>
                      <br/>
                      <br/>
                      <br/>
                      <br/>
                      <br/>

                      <?php echo $struktural4->nama_anggota;?><br/>
                      NBM. <?php echo $struktural4->nbm_anggota;?>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>

</body>

</html>
<?php } ?>