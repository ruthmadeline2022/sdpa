<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
     <div class="social-auth-links text-left">
                <?php  if($this->session->flashdata('alert')) : ?>
                  <?php echo '<div class="social-auth-links text-center"> <div class="alert alert-danger"> <b>'.$this->session->flashdata('alert').'</b> </div> </div>' ?>
                <?php endif;?>
              </div>
    </div>
    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Edit Pengajuan</h3>
                </div>
               
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
               <div class="modal-content">
                <div class="modal-body">
                    <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" width="20%">Kegiatan</th>
                                    <th scope="col" width="80%"> : <?php echo $kegiatan->nama_kegiatan;?></th>
                                </tr>
                                <tr>
                                    <th scope="col" width="20%">Penanggung Jawab</th>
                                    <th scope="col" width="80%"> : <?php echo $kegiatan->nama_anggota;?></th>
                                </tr>
                                <tr>
                                    <th scope="col" width="20%">Jumlah Dana</th>
                                    <th scope="col" width="80%"> : <?php echo "Rp " . number_format($kegiatan->tap_kegiatan,2,',','.');?></th>
                                </tr>
                                <tr>
                                    <th scope="col" width="20%">Tanggal Pengajuan</th>
                                    <th scope="col" width="80%"> : <?php echo $pengajuan->tanggal_pengajuan;?></th>
                                </tr>
                                <tr>
                                    <th scope="col" width="20%">Tahap Pengajuan</th>
                                    <th scope="col" width="80%"> : 
                                    <?php if($pengajuan->tahap_pengajuan==0) { ?>
                                        <span class="badge badge-danger">Pending</span>
                                    <?php } else { ?>
                                        <span class="badge badge-info">Complete</span>
                                    <?php } ?>
                                    </th>
                                </tr>
                            </thead>
                        </table>

                  <form method="post" action="<?php echo base_url('index.php/pengajuan/update');?>">
                    <input type="hidden" name="id_pengajuan" class="form-control form-control-alternative" value="<?php echo $pengajuan->id_pengajuan;?>" required>
                    <input type="hidden" name="id_kegiatan" class="form-control form-control-alternative" value="<?php echo $pengajuan->id_kegiatan;?>" required>
                        <h6 class="heading-small text-muted mb-4">Silahkan Masukan Data Sesuai Form</h6>
                        <div class="pl-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="input-username">Tanggal Pengajuan</label>
                                <input type="date" name="tanggal_pengajuan" class="form-control form-control-alternative" value="<?php echo $pengajuan->tanggal_pengajuan;?>" required>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="input-username">Tanggal LPJ</label>
                                <input type="date" name="tanggal_lpj" class="form-control form-control-alternative" value="<?php echo $pengajuan->tanggal_lpj;?>" required>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="input-username">Verifikator</label>
                                <select class="form-control form-control-alternative" name="id_verifikasi">
                                <?php foreach($anggota as $a) { 
                                    if($a['id_anggota']==$pengajuan->id_verifikasi) { ?>
                                    <option value="<?php echo $a['id_anggota'];?>" selected><?php echo $a['nama_anggota'];?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $a['id_anggota'];?>"><?php echo $a['nama_anggota'];?></option>
                                <?php } } ?>
                                </select>
                            </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <div class="row">
                          <div class="col-md-2">
                            <a href="<?php echo base_url('index.php/pengajuan/data/'.$kegiatan->id_kegiatan);?>"><button type="button" class="btn btn-default">Kembali</button></a>
                          </div>
                          <div class="col-md-8">
                          </div>
                          <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                        </div>
                        </div>
                      </form>
                </div>
              </div>

            </div>
          </div>
        </div>
        
      </div>