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

    <?php $jumlah = 0; foreach ($pembelanjaan as $p ) {
        $jumlah = $jumlah + $p['jumlah_pembelanjaan'];
    } 
    ?>
    
    <div class="container-fluid mt--7">
      <div class="row mt-5">
        <div class="col">
        <p style="font-size:20pt;">Lembar Daftar Pembelanjaan</p>
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
                                <th scope="col" width="5%">No.</th>
                                <th scope="col" width="15%">Tanggal</th>
                                <th scope="col" width="60%">Uraian Rencana</th>
                                <th scope="col" width="20%">Jumlah</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach ($pembelanjaan as $b) { ?>
                                <tr>
                                    <th scope="row"><?php echo $no++;?></th>
                                    <td><?php echo $b['tanggal_pembelanjaan'];?></td>
                                    <td><?php echo $b['uraian_pembelanjaan'];?></td>
                                    <td><?php echo "Rp " . number_format($b['jumlah_pembelanjaan'],2,',','.');?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                  <th scope="col" width="70%" colspan="3">JUMLAH</th>
                                  <th scope="col" width="20%"><?php echo "Rp " . number_format($jumlah,2,',','.');?></th>
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                    </div>
                  </div>
                </div>

            </div>

            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" width="80%">
                    </th>
                    <th scope="col" width="20%">
                      Yogyakarta, <?php echo date('d F Y', strtotime(date('d-m-Y')));?><br/>
                      Verifikator,
                      
                      <br/>
                      <br/>
                      <br/>
                      <br/>
                      <br/>
                      <br/>

                      <?php echo $pengeluaran->nama_anggota;?><br/>
                      NBM. <?php echo $pengeluaran->nbm_anggota;?>
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
              
            </div>
          </div>
        </div>
        
      </div>

     
        

</body>

</html>
<?php } ?>