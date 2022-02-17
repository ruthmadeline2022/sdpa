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
                  <h3 class="mb-0">Tambah Data User</h3>
                </div>
               
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
               <div class="modal-content">
                <div class="modal-body">
                  <form method="post" action="<?php echo base_url('index.php/user/tambah');?>">
                    <input type="hidden" name="id_anggota" class="form-control form-control-alternative" value="<?php echo $id_anggota;?>" required>
                        <h6 class="heading-small text-muted mb-4">Data Anggota : <?php echo $anggota->nama_anggota;?></h6>
                        <div class="pl-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Username</label>
                                    <input type="text" name="username" class="form-control form-control-alternative" placeholder="admin" required>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Password</label>
                                    <input type="password" name="password" class="form-control form-control-alternative" min="8" placeholder="**********" required>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Hak Akses</label>
                                    <select class="form-control form-control-alternative" name="id_level">
                                    <?php foreach($level as $l) { ?>
                                        <option value="<?php echo $l['id_level'];?>"><?php echo $l['nama_level'];?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <div class="row">
                          <div class="col-md-2">
                            <a href="<?php echo base_url('index.php/user');?>"><button type="button" class="btn btn-default">Kembali</button></a>
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