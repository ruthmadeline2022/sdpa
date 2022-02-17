<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
     <div class="social-auth-links text-left">
                <?php  if($this->session->flashdata('alert')) : ?>
                  <?php echo '<div class="social-auth-links text-center"> <div class="alert alert-danger"> <b>'.$this->session->flashdata('alert').'</b> </div> </div>' ?>
                <?php endif;?>
              </div>
    </div>

                <?php $jumlah = 0; foreach ($kegiatan_by as $t ) {
                    $jumlah = $jumlah + $t['tap_kegiatan'];
                } 
                  $sisa = $det_program->tap_biaya - $jumlah;
                ?>
    <!-- Page content -->
    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-xl-8 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Tabel Kegiatan</h3>
                </div>
               
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
                <div class="modal-content">
                <div class="modal-body">
                  <form method="post" action="<?php echo base_url('index.php/kegiatan/update');?>">
                     <input type="hidden" name="id_bidang" class="form-control form-control-alternative" value="<?php echo $id_bidang; ?>" required>
                     <input type="hidden" name="id_program" class="form-control form-control-alternative" value="<?php echo $id_program; ?>" required>
                     <input type="hidden" name="id_kegiatan" class="form-control form-control-alternative" value="<?php echo $kegiatan->id_kegiatan; ?>" required>
                        <h6 class="heading-small text-muted mb-4">Silahkan Masukan Data Sesuai Form</h6>
                        <div class="pl-lg-12">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label class="form-control-label" for="input-username">Nama Kegiatan</label>
                                <input type="text" name="nama_kegiatan" class="form-control form-control-alternative" value="<?php echo $kegiatan->nama_kegiatan;?>" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label class="form-control-label" for="input-first-name">Ketetapan Biaya</label>
                                <input type="number" name="tap_kegiatan" id="tap_kegiatan" class="form-control form-control-alternative" value="<?php echo $kegiatan->tap_kegiatan; ?>" required>
                              </div>
                            </div>
                          </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label" for="input-username">Penanggung Jawab</label>
                              <select class="form-control form-control-alternative" name="id_anggota">
                              <?php foreach($anggota as $a) { 
                                if($a['id_anggota']==$kegiatan->id_anggota) {?>
                                  <option value="<?php echo $a['id_anggota'];?>" selected><?php echo $a['nama_anggota'];?></option>
                              <?php } else { ?>
                                  <option value="<?php echo $a['id_anggota'];?>"><?php echo $a['nama_anggota'];?></option>
                              <?php } } ?>
                              </select>
                            </div>
                          </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label class="form-control-label" for="input-username">MAK Kegiatan</label>
                                <input type="text" name="mak_kegiatan" class="form-control form-control-alternative" value="<?php echo $kegiatan->mak_kegiatan;?>" required>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr class="my-4" />
                        <div class="row">
                        <div class="col-lg-12">
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
                                  <?php echo "Rp " . number_format($sisa,2,',','.').' Dana Program ['."Rp " . number_format($kegiatan->tap_kegiatan,2,',','.').'] '; ?> 
                                </th>
                              </tr>
                            </thead>
                          </table>
                          </div>
                        </div>
                        <hr class="my-4" />
                        <div class="row">
                          <div class="col-md-2">
                            <a href="<?php echo base_url('index.php/kegiatan/filter/'.$id_bidang.'/'.$id_program);?>"><button type="button" class="btn btn-default">Kembali</button></a>
                          </div>
                          <div class="col-md-8">
                          </div>
                          <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                        </div>
                      </form>
                </div>
                </div>
               
              </div>

            </div>
          </div>
        </div>
        
      </div>

<script>
  $('#tap_kegiatan').keyup(function(){
  if ($(this).val() >= <?php echo $sisa + $kegiatan->tap_kegiatan; ?>){
    alert("Dana melibihi Dana Sisa yaitu <?php echo "Rp " . number_format($sisa + $kegiatan->tap_kegiatan,2,',','.'); ?>");
    $(this).val('<?php echo $sisa + $kegiatan->tap_kegiatan; ?>');
  }
});
</script>