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
                  <h3 class="mb-0">Tabel Strutural</h3>
                </div>
               
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
               <div class="modal-content">
                <div class="modal-body">
                  <form method="post" action="<?php echo base_url('index.php/panitia/update');?>">
                  <input type="hidden" name="id_bidang" value="<?php echo $id_bidang;?>"> 
                  <input type="hidden" name="id_program" value="<?php echo $id_program;?>"> 
                    <input type="hidden" name="id_panitia" class="form-control form-control-alternative" value="<?php echo $panitia->id_panitia;?>" required>
                        <h6 class="heading-small text-muted mb-4">Silahkan Masukan Data Sesuai Form</h6>
                        <div class="pl-lg-12">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label class="form-control-label" for="input-username">Nama</label>
                                <input type="text" name="nama_anggota" class="form-control form-control-alternative" value="<?php echo $panitia->nama_anggota;?>" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label class="form-control-label" for="input-first-name">Struktur</label>
                                <select name="id_struktur" class="form-control form-control-alternative" required>
                                    <?php foreach($struktur as $j) { 
                                        if($j['id_struktur']==$panitia->id_struktur) { ?>
                                        <option value="<?php echo $j['id_struktur'];?>" selected><?php echo $j['nama_struktur'];?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $j['id_struktur'];?>"><?php echo $j['nama_struktur'];?></option>
                                    <?php } } ?>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr class="my-4" />
                        <div class="row">
                          <div class="col-md-2">
                          <a href="<?php echo base_url('index.php/panitia/filter/'.$id_bidang.'/'.$id_program);?>"><button type="button" class="btn btn-default">Kembali</button></a>
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