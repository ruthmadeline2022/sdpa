<?php if($this->session->userdata('id_user')==0) { redirect();?>

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
    
    <div class="container-fluid mt--7">
      <div class="row mt-5">
        <div class="col">
        <center>
        <p style="font-size:20pt;">LAPORAN KEPANITIAN KEGIATAN</p>
        <p style="font-size:15pt;">Madrasah Muallimin Muhammadiyah Yogyakarta</p>
        <p style="font-size:10pt;"><?php echo $tahun->nama_tahun;?></p>
        </center>
        <br/>
          <div class="card">
            
            <div class="table-responsive">
              <!-- Projects table -->
              <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" width="5%">No</th>
                    <th scope="col" width="10%">Nama Anggota</th>
                    <th scope="col" width="10%">Jumlah Kepanitaan</th>
                  </tr>
                </thead>
               
                <?php $this->load->model('m_anggota');
                $no=1;
                $anggota = $this->m_anggota->get()->result_array();
                foreach ($anggota as $a) { 
                    $panitia = $this->m_struktural->get_anggota($a['id_anggota'])->result_array();
                ?>
                <tbody> 
                <?php 
                        $count = COUNT($panitia);
                ?>
                  <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $a['nama_anggota'];?></td>
                    <td><?php echo $count;?></td>
                  </tr>
                </tbody>
                <?php } ?>
              </table>
              <hr/>
            

              
            </div>
          </div>
        </div>
        
      </div>
      <br/>

      <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" width="80%"></th>
                    <th scope="col" width="20%">
                      Yogyakarta, <?php echo date('d F Y', strtotime(date('d-m-Y')));?><br/>
                      Direktur

                      <br/>
                      <br/>
                      <br/>
                      <br/>
                      <br/>
                      <br/>

                      Aly Aulia,Lc.,M.Hum<br/>
                      NBM. 867 866
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