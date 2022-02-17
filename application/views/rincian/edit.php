<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
     <div class="social-auth-links text-left">
                <?php  if($this->session->flashdata('alert')) : ?>
                  <?php echo '<div class="social-auth-links text-center"> <div class="alert alert-danger"> <b>'.$this->session->flashdata('alert').'</b> </div> </div>' ?>
                <?php endif;?>
              </div>
    </div>

    <?php $jumlah=0; foreach($rincian as $r) {
        $jumlah = $jumlah + $r['jumlah_rincian'];
    }
        $sisa = $det_kegiatan->tap_kegiatan - $jumlah;
    ?>
    <!-- Page content -->
    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Form Redit Rincian</h3>
                </div>
               
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
                <div class="modal-content">
                <div class="modal-body">
                  <form method="post" action="<?php echo base_url('index.php/rincian/update');?>">
                     <input type="hidden" name="id_pengajuan" class="form-control form-control-alternative" value="<?php echo $det_rincian->id_pengajuan; ?>" required>
                     <input type="hidden" name="id_rincian" class="form-control form-control-alternative" value="<?php echo $det_rincian->id_rincian; ?>" required>
                        <h6 class="heading-small text-muted mb-4">Silahkan Masukan Data Sesuai Form</h6>
                        <div class="pl-lg-12">
                            <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label class="form-control-label" for="input-username">Uraian</label>
                                <input type="text" name="uraian_rincian" class="form-control form-control-alternative" value="<?php echo $det_rincian->uraian_rincian;?>" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label class="form-control-label" for="input-first-name">Jumlah Dana</label>
                                <input type="number" name="jumlah_rincian" id="jumlah_rincian" class="form-control form-control-alternative" value="<?php echo $det_rincian->jumlah_rincian;?>" required>
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
                                  <?php echo "Rp " . number_format($det_kegiatan->tap_kegiatan,2,',','.'); ?>
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
                        <hr class="my-4" />
                        <div class="row">
                          <div class="col-md-2">
                            <a href="<?php echo base_url('index.php/rincian/data/'.$det_kegiatan->id_kegiatan);?>"><button type="button" class="btn btn-default">Kembali</button></a>
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

      <script>
  $('#jumlah_rincian').keyup(function(){
  if ($(this).val() >= <?php echo $sisa; ?>){
    alert("Dana melibihi Dana Sisa yaitu <?php echo "Rp " . number_format($sisa + $rincian->jumlah_rincian,2,',','.'); ?>");
    $(this).val('<?php echo $sisa + $rincian->jumlah_rincian; ?>');
  }
});
</script>