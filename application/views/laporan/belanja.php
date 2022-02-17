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
        <p style="font-size:20pt;">LAPORAN BELANJA BULAN <?php echo date('F-Y');?></p>
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
                    <th scope="col" width="10%">Keterangan Belanja</th>
                    <th scope="col" width="10%">Rencana</th>
                    <th scope="col" width="10%">S/d Bulan Lalu</th>
                    <th scope="col" width="10%">Bulan Ini</th>
                    <th scope="col" width="10%">S/d Bulan Ini</th>
                    <th scope="col" width="5%">%</th>
                  </tr>
                </thead>
                <?php foreach ($bidang as $b) { ?>
                <tbody> 
                  <tr>
                    <td><?php echo $b['mak_bidang'];?></td>
                    <td><b><i><?php echo $b['nama_bidang'];?></i></b></td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                </tbody>
                
                <?php $this->load->model('m_program'); 
                $id_bidang = $b['id_bidang'];
                $program = $this->m_program->get_by($id_bidang)->result_array();
                foreach ($program as $p) { ?>

                <tbody> 
                  <tr>
                    <td><?php echo $p['mak_program'];?></td>
                    <td><i><?php echo $p['nama_program'];?></i></td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                </tbody>
                
                <?php $this->load->model('m_kegiatan');
                $id_program = $p['id_program'];
                $kegiatan = $this->m_kegiatan->get_by($id_program)->result_array();
                foreach ($kegiatan as $k) { 
                    $pengeluaran = $this->m_pengeluaran->get_by($k['id_kegiatan'])->result_array();
                    foreach ($pengeluaran as $pg) {
                        $pembelanjaan_lalu = $this->m_pembelanjaan->get_tanggal($pg['id_pengeluaran'],$lalu)->result_array();

                        

                        $pembelanjaan_sekarang = $this->m_pembelanjaan->get_tanggal($pg['id_pengeluaran'],$sekarang)->result_array();

                        $jumlah_sekarang=0; foreach($pembelanjaan_sekarang as $ps){
                            $jumlah_sekarang = $jumlah_sekarang + $ps['jumlah_pembelanjaan'];
                        }

                        $pembelanjaan_bulan = $this->m_pembelanjaan->get_bln($pg['id_pengeluaran'],$bulan)->result_array();

                        $jumlah_bulan=0; foreach($pembelanjaan_bulan as $pb){
                            $jumlah_sekarang = $jumlah_sekarang + $pb['jumlah_pembelanjaan'];
                        }
                    }    
                    
                ?>
                <tbody> 
                <?php 
                    $jumlah_lalu=0; foreach($pembelanjaan_lalu as $pl){
                        $jumlah_lalu = $jumlah_lalu + $pl['jumlah_pembelanjaan'];
                    }
                ?>
                  <tr>
                    <td><?php echo $k['mak_kegiatan'];?></td>
                    <td><?php echo $k['nama_kegiatan'];?></td>
                    <td><?php echo number_format($k['tap_kegiatan'],2,',','.');?></td>
                    <td><?php echo number_format($jumlah_lalu,2,',','.');?></td>
                    <td><?php echo number_format($jumlah_bulan,2,',','.');?></td>
                    <td><?php echo number_format($jumlah_sekarang,2,',','.');?></td>
                    <td><?php echo $hasil = ($jumlah_sekarang/$k['tap_kegiatan']) *100;?>%</td>
                  </tr>
                </tbody>
                <?php } ?>
                <?php } ?>
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