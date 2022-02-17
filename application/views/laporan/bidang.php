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
        <p style="font-size:20pt;">REKAPITULASI RENCANA BELANJA</p>
        <p style="font-size:15pt;">Madrasah Muallimin Muhammadiyah Yogyakarta</p>
        <p style="font-size:10pt;"><?php echo $tahun->nama_tahun;?></p>
        <br/>
          <div class="card">
            <div class="table-responsive">
              <!-- Projects table -->
              <div class="table-responsive">
              <!-- Projects table -->
            <hr/>
            <?php foreach ($bidang as $b) { ?>

              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" width="2%">Nomor</th>
                    <th scope="col" width="65%" colspan="4">Keterangan Belanja</th>
                    <th scope="col" width="10%">Jumlah Dana</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $b['mak_bidang'];?></td>
                    <td colspan="4"><?php echo $b['nama_bidang'];?></td>
                    <td><b><?php echo "Rp " . number_format($b['tap_biaya'],2,',','.');?></b></td>
                  </tr>
                </tbody>


                <?php $this->load->model('m_program'); 
                $id_bidang = $b['id_bidang'];
                $program = $this->m_program->get_by($id_bidang)->result_array();
                foreach ($program as $p) { ?>

                <tbody>
                  <tr>
                    <td></td>
                    <td><?php echo $p['mak_program'];?></td>
                    <td colspan="3"><?php echo $p['nama_program'];?></td>
                    <td colspan="2"><?php echo "Rp " . number_format($p['tap_program'],2,',','.');?></td>
                  </tr>
                </tbody>
                

                <?php $this->load->model('m_kegiatan');
                $id_program = $p['id_program'];
                $kegiatan = $this->m_kegiatan->get_by($id_program)->result_array();
                foreach ($kegiatan as $k) { ?>

                <tbody>
                  <tr>
                    <td colspan="2"></td>
                    <td><?php echo $k['mak_kegiatan'];?></td>
                    <td colspan="1"><?php echo $k['nama_kegiatan'];?></td>
                    <td colspan="1"><?php echo "Rp " . number_format($k['tap_kegiatan'],2,',','.');?></td>
                    <td></td>
                  </tr>
                </tbody>
                <?php } ?>
                <?php } ?>
              </table>
              <hr/>
            <?php } ?>

              
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
                      <?php echo $struktural->nama_jabatan;?>

                      <br/>
                      <br/>
                      <br/>
                      <br/>
                      <br/>
                      <br/>

                      <?php echo $struktural->nama_anggota;?><br/>
                      NBM. <?php echo $struktural->nbm_anggota;?>
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