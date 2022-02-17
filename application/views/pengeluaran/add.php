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
                  <h3 class="mb-0">Mengisi Data Pengeluaran 
                     
                   </h3>
                </div>
                <div class="col text-right">
                
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <div class="table-responsive">
              <!-- Projects table -->
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
                   </thead>
            </table>

            <hr/>
            
                <table class="table align-items-center table-flush">
                <form method="post" action="<?php echo base_url('index.php/pengeluaran/tambah');?>">
                <input type="hidden" name="id_pengajuan" class="form-control form-control-alternative" value="<?php echo $pengajuan->id_pengajuan;?>" required>
                <input type="hidden" name="id_kegiatan" class="form-control form-control-alternative" value="<?php echo $kegiatan->id_kegiatan;?>" required>
                  <thead class="thead-light">
                    <tr>
                        <th scope="col" width="20%">No KK</th>
                        <th scope="col" width="80%"> <input type="text" name="no_kk" class="form-control form-control-alternative" placeholder="1001" required></th>
                    </tr>
                    <tr>
                        <th scope="col" width="20%">Tanggal Pelaporan (LPJ)</th>
                        <th scope="col" width="80%"> <input type="date" name="tanggal_pengeluaran" class="form-control form-control-alternative" required></th>
                    </tr>
                    <tr>
                        <th scope="col" width="20%">Verifikator</th>
                        <th scope="col" width="80%"> 
                            <select class="form-control form-control-alternative" name="id_verifikator">
                            <?php foreach($anggota as $a) { ?>
                                <option value="<?php echo $a['id_anggota'];?>"><?php echo $a['nama_anggota'];?></option>
                            <?php } ?>
                            </select>
                        </th>
                    </tr>
                    <tr>
                        <th scope="col" width="20%"></th>
                        <th scope="col" width="80%"> <button type="submit" class="btn btn-primary">Simpan</button></th>
                    </tr>
                   </thead>
                   </form>
                </table>
                </div>
                </div>
                </div>
                    <hr class="my-4" />
                        <div class="row">
                          <div class="col-md-2">
                            <a href="<?php echo base_url('index.php/pengeluaran/data/'.$pengajuan->id_pengajuan);?>"><button type="button" class="btn btn-default">Kembali</button></a>
                          </div>
                          <div class="col-md-8">
                          </div>
                          <div class="col-md-2">
                         
                          </div>
                        </div>
                        </div>
                        </div>
