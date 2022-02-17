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

    <?php $jumlah = 0; foreach ($pembelanjaan as $b ) {
        $jumlah = $jumlah + $b['jumlah_pembelanjaan'];
    } 
    ?>
    
    <div class="container-fluid mt--7">
      <div class="row mt-5">
        <div class="col">
        <p style="font-size:20pt;">BUKTI PENGELUARAN KAS</p>
        <p style="font-size:15pt;">Madrasah Muallimin Muhammadiyah Yogyakarta</p>
        <p style="font-size:10pt;"><?php echo $tahun->nama_tahun;?></p>
        <br/>
          <div class="card">
            
            <div class="card-body">
                <div class="pl-lg-4">
                  <div class="row">
                  <div class="table-responsive">
                        <!-- Projects table -->
                        <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" width="20%">Kegiatan</th>
                                <th scope="col" width="80%"> : <?php echo $kegiatan->nama_kegiatan;?></th>
                            </tr>
                            <tr>
                                <th scope="col" width="20%">KK.No </th>
                                <th scope="col" width="80%"> : <?php echo $pengeluaran->no_kk;?></th>
                            </tr>
                            <tr>
                                <th scope="col" width="20%">Telah diterima dari</th>
                                <th scope="col" width="80%"> : Direktur Madrasah Mua'allimin Muhammadiyah Yogyakarta</th>
                            </tr>
                            <tr>
                                <th scope="col" width="20%">Digunakan Tanggal</th>
                                <th scope="col" width="80%"> : <?php echo date('d F Y', strtotime($pengeluaran->tanggal_pengeluaran));?></th>
                            </tr>
                            <tr>
                                <th scope="col" width="20%">Jumlah</th>
                                <th scope="col" width="80%"> : <?php echo "Rp " . number_format($jumlah,2,',','.');?></th>
                            </tr>
                            </thead>
                        </table>

                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" width="50%">
                                    Total Dana : <?php echo "Rp " . number_format($jumlah,2,',','.');?>   
                                </th>
                                <th scope="col" width="50%">
                                Yogyakarta, <?php echo date('d F Y', strtotime($pengajuan->tanggal_pengajuan));?><br/>
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
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                <hr/>
                <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" width="25%">
                                Setuju dibayar Tgl, <?php echo date('d F Y', strtotime(date('d-m-Y')));?><br/>
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
                                Laporan Tgl, <?php echo date('d F Y', strtotime(date('d-m-Y')));?><br/>
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
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                <hr/>
                <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" width="10%">
                                Lembar :
                                </th>
                                <th scope="col" width="40%">
                                    <ol>
                                        <li>Untuk Bendahara Pengguna</li>
                                        <li>Untuk Wadir II</li>
                                        <li>Untuk Ka.Ur. yang bersangkutan</li>     
                                    </ol>
                                </th>
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
      <hr/>
      
        

</body>

</html>
<?php } ?>