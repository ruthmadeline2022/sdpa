<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
     <div class="social-auth-links text-left">
                <?php  if($this->session->flashdata('alert')) : ?>
                  <?php echo '<div class="social-auth-links text-center"> <div class="alert alert-danger"> <b>'.$this->session->flashdata('alert').'</b> </div> </div>' ?>
                <?php endif;?>
              </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--7">

      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Tabel Pengajuan</h3>
                </div>
                <div class="col text-right">
                  #Silahkan Pilihlah Kegiatan Untuk Mengadakan Pengajuan
              </div>
            </div>
            <hr/>
            <div class="form-group">
              <form action="<?php echo base_url('index.php/pengajuan/filter');?>" method="post">
              <div class="row">
                <div class="col-md-5">
                  <select class="form-control" name="id_bidang">
                  <option value=""> - Pilih Bidang - </option>
                    <?php foreach ($bidang as $b) { 
                      if ($b['id_bidang'] == $id_bidang ) { ?>
                      <option value="<?php echo $b['id_bidang']; ?>" selected><b><?php echo $b['nama_bidang'].' - [ Rp. '.number_format($b['tap_biaya'],2,',','.').' ]'; ?></b></option>
                    <?php } else { ?>
                      <option value="<?php echo $b['id_bidang']; ?>"><?php echo $b['nama_bidang'].' - [ Rp. '.number_format($b['tap_biaya'],2,',','.').' ]'; ?></option>
                    <?php } } ?>
                  </select>
                </div>
                <div class="col-md-5">
                <select required data-placeholder="- Pilih Nama Siswa - " tabindex="-1" class="form-control" name="id_program">

                <?php if($id_program==0) { ?>
                  <option value=""> - Pilih Program - </option>
                <?php } else { ?>
                    <?php foreach ($program as $p) { 
                      if ($p['id_program'] == $id_program ) { ?>
                      <option value="<?php echo $p['id_program']; ?>" selected><b><?php echo $p['nama_program'].' - [ Rp. '.number_format($p['tap_program'],2,',','.').' ]'; ?></b></option>
                    <?php } else { ?>
                      <option value="<?php echo $p['id_program']; ?>"><?php echo $p['nama_program'].' - [ Rp. '.number_format($p['tap_program'],2,',','.').' ]'; ?></option>
                    <?php } } ?>
                <?php } ?>

                </select>
                </div>
                <div class="col-md-2">
                  <button class="btn btn-primary" type="submit">Lihat</button>
                </div>
              </div>
            </form>
            </div>

            <?php if($id_program!=0) { ?>

                <?php $jumlah = 0; foreach ($kegiatan as $k ) {
                    $jumlah = $jumlah + $k['tap_kegiatan'];
                } 
                  $sisa = $det_program->tap_program - $jumlah;
                ?>

            <hr/>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">MAK</th>
                    <th scope="col">Nama Kegiatan</th>
                    <th scope="col">Ketetapan Biaya</th>
                    <?php if($det_program->id_anggota==$_SESSION['id_anggota'] || $_SESSION['id_level']==1 || $_SESSION['id_level']==2) { ?>
                    <th scope="col">Aksi</th>
                    <?php } ?>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach($kegiatan as $k) { ?>
                  <tr>
                    <th scope="row">
                    <?php echo $k['mak_kegiatan'];?>
                    </th>
                    <td>
                      <?php echo $k['nama_kegiatan'];?>
                    </td>
                    <td>
                      <?php echo "Rp " . number_format($k['tap_kegiatan'],2,',','.');?>
                    </td>
                    <?php if($det_program->id_anggota==$_SESSION['id_anggota'] || $_SESSION['id_level']==1 || $_SESSION['id_level']==2) { ?>
                    <td>
                      <a href="<?php echo base_url('index.php/pengajuan/data/'.$k['id_kegiatan']);?>" class="btn btn-sm btn-info"><i class="ni ni-cloud-upload-96"> &nbsp Tambah Pengajuan</i></a>
                    </td>
                    <?php } ?>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
         
            <?php } ?>
            </div>
          </div>
        </div>
     </div>


<script>
				window.onload= function(){
					$("select[name='id_bidang']").change(function (){
						var url = "<?php echo base_url('index.php/kegiatan/program');?>/"+$(this).val();
						$("select[name='id_program']").load(url);
						return false;
					});
				};
</script>
    

