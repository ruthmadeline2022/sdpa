 <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
     <div class="social-auth-links text-left">
                <?php  if($this->session->flashdata('alert')) : ?>
                  <?php echo '<div class="social-auth-links text-center"> <div class="alert alert-danger"> <b>'.$this->session->flashdata('alert').'</b> </div> </div>' ?>
                <?php endif;?>
              </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Tabel Bidang</h3>
                </div>
               
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
               <div class="modal-content">
                <div class="modal-body">
                  <form method="post" action="<?php echo base_url('index.php/bidang/update');?>">
                    <input type="hidden" name="id_bidang" class="form-control form-control-alternative" value="<?php echo $bidang->id_bidang;?>" required>
                        <h6 class="heading-small text-muted mb-4">Silahkan Masukan Data Sesuai Form</h6>
                        <div class="pl-lg-12">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label class="form-control-label" for="input-username">Nama Bidang</label>
                                <input type="text" name="nama_bidang" class="form-control form-control-alternative" value="<?php echo $bidang->nama_bidang;?>" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label class="form-control-label" for="input-first-name">Ketetapan Biaya</label>
                                <input type="number" name="tap_biaya" class="form-control form-control-alternative" value="<?php echo $bidang->tap_biaya;?>" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label class="form-control-label" for="input-username">MAK Bidang</label>
                                <input type="text" name="mak_bidang" class="form-control form-control-alternative" value="<?php echo $bidang->mak_bidang;?>" required>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr class="my-4" />
                        <div class="row">
                          <div class="col-md-2">
                            <a href="<?php echo base_url('index.php/bidang');?>"><button type="button" class="btn btn-default">Kembali</button></a>
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