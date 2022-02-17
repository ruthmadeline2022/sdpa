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
                  <h3 class="mb-0">Pilihan Bidang</h3>
                </div>
                <div class="col text-right">
                  #Silahkan Pilihlah Bidang Dahulu
              </div>
            </div>
            <hr/>
            <div class="form-group">
              <form action="<?php echo base_url('index.php/kegiatan/filter');?>" method="post">
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
                      if ($p['id_program'] == $id_program && $p['id_bidang']=$id_bidang) { ?>
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
                    <th scope="col">Penanggung Jawab</th>
                    <?php if(($det_program->id_anggota==$_SESSION['id_anggota'] || $_SESSION['id_level']==1 || $_SESSION['id_level']==2)&&$sisa>0) { ?>
                    <th scope="col"><a href="#" data-toggle="modal" data-target="#kegiatan" class="btn btn-sm btn-primary"><i class="ni ni-fat-add"> Tambah</i></a></th>
                    <?php } else { ?>
                      <th scope="col">Aksi</th>
                    <?php }  ?>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($kegiatan as $k) { ?>
                  <tr>
                    <th scope="row">
                      <b><?php echo $k['mak_kegiatan'];?></b>
                    </th>
                    <td>
                      <a href="<?php echo base_url('index.php/detail/data/'.$k['id_kegiatan']);?>"><i style="color:blue" class="ni ni-collection"></i> </a><?php echo $k['nama_kegiatan'];?>
                    </td>
                    <td>
                      <?php echo "Rp " . number_format($k['tap_kegiatan'],2,',','.');?>
                    </td>
                    <td>
                      <b><?php echo $k['nama_anggota'];?></b>
                    </td>
                    <?php if($det_program->id_anggota==$_SESSION['id_anggota'] || $_SESSION['id_level']==1 || $_SESSION['id_level']==2) { ?>
                    <td>
                      <a href="<?php echo base_url('index.php/kegiatan/edit/'.$k['id_kegiatan'].'/'.$id_bidang.'/'.$id_program);?>" class="btn btn-sm btn-success"><i class="ni ni-ruler-pencil"> Edit</i></a> 
                      <a onclick="javascript: return confirm('Apakah Kamu yakin ingin menghapus data ini ?')" href="<?php echo base_url('index.php/kegiatan/delete/'.$k['id_kegiatan'].'/'.$id_bidang.'/'.$id_program);?>" class="btn btn-sm btn-danger"><i class="ni ni-fat-remove"> Hapus</i></a>
                    </td>
                    <?php } ?>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
            <?php } ?>

          </div>
        </div>
     </div>


      <div class="modal fade" id="kegiatan" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          Tambah Kegiatan
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo base_url('index.php/kegiatan/tambah');?>">
             <input type="hidden" name="id_bidang" class="form-control form-control-alternative" value="<?php echo $id_bidang; ?>" required>
             <input type="hidden" name="id_program" class="form-control form-control-alternative" value="<?php echo $id_program; ?>" required>
                <h6 class="heading-small text-muted mb-4">Silahkan Masukan Data Sesuai Form</h6>
                <div class="pl-lg-12">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nama Kegiatan</label>
                        <input type="text" name="nama_kegiatan" class="form-control form-control-alternative" placeholder="Masukan nama Kegiatan" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Ketetapan Biaya</label>
                        <input type="number" name="tap_kegiatan" id="tap_kegiatan" class="form-control form-control-alternative" placeholder="Dana Sisa : <?php echo "Rp " . number_format($sisa,2,',','.'); ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">MAK Kegiatan</label>
                        <input type="text" name="mak_kegiatan" class="form-control form-control-alternative" placeholder="12.1.1,13.2.1" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Penanggung Jawab</label>
                        <select class="form-control form-control-alternative" name="id_anggota">
                        <?php foreach($anggota as $a) { ?>
                            <option value="<?php echo $a['id_anggota'];?>"><?php echo $a['nama_anggota'];?></option>
                        <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <div class="row">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th scope="row">
                          Dana Tersedia
                        </th>
                        <th>
                          <?php echo "Rp " . number_format($det_program->tap_program,2,',','.'); ?>
                        </th>
                      </tr>
                      <tr>
                        <th scope="row">
                          Dana Terpakai
                        </th>
                        <th>
                          <?php echo "Rp " . number_format($jumlah,2,',','.'); ?>
                        </th>
                      </tr>
                      <tr>
                        <th scope="row">
                          Dana Sisa
                        </th>
                        <th>
                          <?php echo "Rp " . number_format($sisa,2,',','.'); ?>
                        </th>
                      </tr>
                    </thead>
                  </table>
                </div>
                <div class="row">
                  <div class="col-md-4">
                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                  <div class="col-md-4">
                  </div>
                  <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </form>
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
      
<script>
  $('#tap_kegiatan').keyup(function(){
  if ($(this).val() >= <?php echo $sisa; ?>){
    alert("Dana melibihi Dana Sisa yaitu <?php echo "Rp " . number_format($sisa,2,',','.'); ?>");
    $(this).val('<?php echo $sisa; ?>');
  }
});
</script>

