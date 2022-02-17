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
        <div class="col-xl-8 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Tabel anggota</h3>
                </div>
               
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
               <div class="modal-content">
                <div class="modal-body">
                  <form method="post" action="<?php echo base_url('index.php/anggota/update');?>">
                    <input type="hidden" name="id_anggota" class="form-control form-control-alternative" value="<?php echo $anggota->id_anggota;?>" required>
                        <h6 class="heading-small text-muted mb-4">Silahkan Masukan Data Sesuai Form</h6>
                  <div class="pl-lg-12">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">NBM</label>
                        <input type="text" name="nbm_anggota" class="form-control form-control-alternative" value="<?php echo $anggota->nbm_anggota;?>" required>
                      </div>
                    </div>
                  </div>
                    <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nama</label>
                        <input type="text" name="nama_anggota" class="form-control form-control-alternative" value="<?php echo $anggota->nama_anggota;?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Jenis Kelamin</label>
                        <select name="jenkel" class="form-control form-control-alternative" required>
                            <?php if($anggota->jenkel=='L') { ?>
                                <option value="L" selected>Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            <?php } else { ?>
                                <option value="L">Laki-Laki</option>
                                <option value="P" selected>Perempuan</option>
                            <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">No. HP</label>
                        <input type="number" name="no_anggota" class="form-control form-control-alternative" value="<?php echo $anggota->no_anggota;?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Email</label>
                        <input type="email" name="email" class="form-control form-control-alternative" value="<?php echo $anggota->email;?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Alamat</label>
                        <textarea name="alamat" class="form-control form-control-alternative" required><?php echo $anggota->alamat;?></textarea>
                      </div>
                    </div>
                  </div>
                        </div>
                        <hr class="my-4" />
                        <div class="row">
                          <div class="col-md-2">
                            <a href="<?php echo base_url('index.php/anggota');?>"><button type="button" class="btn btn-default">Kembali</button></a>
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