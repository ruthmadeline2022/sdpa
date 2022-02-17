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

<body>
  <!-- Sidenav -->
 <?php $this->load->view('plus/menu')?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php $this->load->view('plus/navigasi')?>
    <!-- Header -->
   <?php echo $contents;?>
      <!-- Footer -->
       <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2019 <a href="#" class="font-weight-bold ml-1" target="_blank">ASM Development</a>
            </div>
          </div>
    
        </div>
      </footer>
    </div>

  </div>


  <div class="modal fade" id="menu_master" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          Menu Master
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <center>
            <a href="<?php echo base_url('index.php/bidang');?>"><button type="button" class="btn btn-info">Bidang</button></a>
            <a href="<?php echo base_url('index.php/program');?>"><button type="button" class="btn btn-info">Program</button></a>
          </center>
          <hr/>
          <center>
            <a href="<?php echo base_url('index.php/tahun');?>"><button type="button" class="btn btn-danger">Tahun</button></a>
            <a href="<?php echo base_url('index.php/kategori');?>"><button type="button" class="btn btn-danger">Kategori</button></a>
          </center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="menu_anggota" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          Menu Anggota
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <center>
            <a href="<?php echo base_url('index.php/anggota');?>"><button type="button" class="btn btn-info">Anggota</button></a>
            <a href="<?php echo base_url('index.php/jabatan');?>"><button type="button" class="btn btn-info">Jabatan</button></a>
            <a href="<?php echo base_url('index.php/struktural');?>"><button type="button" class="btn btn-info">Struktural</button></a>
          </center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="menu_panitia" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          Menu Panitia
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <center>
            <a href="<?php echo base_url('index.php/struktur');?>"><button type="button" class="btn btn-info">Struktur</button></a>
            <a href="<?php echo base_url('index.php/panitia');?>"><button type="button" class="btn btn-info">Kepanitian</button></a>
          </center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="modal fade" id="menu_laporan_belanja" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          Menu Laporan Belanja
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <center>
            <a href="<?php echo base_url('index.php/laporan/belanja_bln');?>" target="_blank"><button type="button" class="btn btn-info">Bulan Ini</button></a>
            <a href="<?php echo base_url('index.php/laporan/belanja');?>" target="_blank"><button type="button" class="btn btn-info">Sampai Bulan Ini</button></a>
          </center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> -->

  <div class="modal fade" id="chPassword" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          Ganti Password
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
			<div class="modal-body">
				<form method="post" action="<?php echo base_url('index.php/user/ch_password');?>">
					<input type="hidden" value="<?php echo $_SESSION['password'];?>" class="form-control" name="password">
					<input type="hidden" value="<?php echo $_SESSION['id_user'];?>" class="form-control" name="id_user">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="bmd-label-floating">Password Lama</label>
								<input type="password" class="form-control" name="pass_lama" required>
								<p id="notif_false" style="color:red;font-size:10pt;"></p>
								<p id="notif_true" style="color:green;font-size:10pt;"></p>
							</div>
							<div class="form-group">
								<label class="bmd-label-floating">Password Baru</label>
								<input type="password" class="form-control" name="pass_baru" required>

							</div>
							<div class="form-group">
								<label class="bmd-label-floating">Confirm Password Baru</label>
								<input type="password" class="form-control" name="pass_confirm" required>
								<p id="notif_confirm_false" style="color:red;font-size:10pt;"></p>
								<p id="notif_confirm_true" style="color:green;font-size:10pt;"></p>
							</div>
						</div>
					</div>
					<div class="row">
                  <div class="col-md-4">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                  <div class="col-md-4">
                  </div>
                  <div class="col-md-4">
                    <button type="submit" name="button" class="btn btn-primary">Simpan</button>
                  </div>
          </div>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url();?>assets/md5/jquery.crypt.js"></script>

<script type="text/javascript">

$("input[name='pass_lama']").change(function (){
  var pass_lama = $("input[name='password']").val();
  var pass_baru = $("input[name='pass_lama']").val();
  var strMD5 = $().crypt({
    method: "md5",
    source: pass_baru
  });
  if (pass_lama==strMD5){
    $("input[name='pass_baru']").show();
    $("input[name='pass_confirm']").show();
    $("button[name='button']").show();
    $('#notif_true').text('Password Sama');
    $('#notif_false').text('');
  } else {
    $("input[name='pass_baru']").hide();
    $("input[name='pass_confirm']").hide();
    $("button[name='button']").hide();
    $('#notif_false').text('Password Tidak Sama');
    $('#notif_true').text('');
  }
});

$("input[name='pass_confirm']").change(function (){
  var pass_lama = $("input[name='pass_baru']").val();
  var pass_baru = $("input[name='pass_confirm']").val();
  var strMD51 = $().crypt({
    method: "md5",
    source: pass_lama
  });

  var strMD52 = $().crypt({
    method: "md5",
    source: pass_baru
  });
  if (strMD51==strMD52){
    $("button[name='button']").show();
    $('#notif_confirm_true').text('Password Sama');
    $('#notif_confirm_false').text('');
  } else {
    $("button[name='button']").hide();
    $('#notif_confirm_false').text('Password Tidak Sama');
    $('#notif_confirm_true').text('');
  }
});

</script>

  <!-- Argon Scripts -->
  
  <!-- Core -->
  <script src="<?php echo base_url();?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="<?php echo base_url();?>assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="<?php echo base_url();?>assets/js/argon.js?v=1.0.0"></script>
</body>

</html>
<?php } ?>