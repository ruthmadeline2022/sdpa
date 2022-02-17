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
                  <h3 class="mb-0">Tabel Anggota</h3>
                </div>
                <div class="col text-right">
                  <a href="#" data-toggle="modal" data-target="#anggota" class="btn btn-sm btn-primary"><i class="ni ni-fat-add"> Tambah</i></a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">NBM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No. HP</th>
                    <th scope="col">Email</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach($anggota as $t) { ?>
                  <tr>
                    <td>
                      <b><?php echo $t['nbm_anggota'];?></b>
                    </td>
                    <td>
                      <b><?php echo $t['nama_anggota'];?></b>
                      &nbsp 
                      <?php if($t['status_user']==0) { ?>
                        <span class="badge badge-danger">User Tidak Aktif</span>
                      <?php } else { ?>
                        <span class="badge badge-info">User Aktif</span>
                      <?php } ?>
                      
                    </td>
                    <td>
                      <?php echo $t['no_anggota'];?>
                    </td>
                    <td>
                      <i><u style="color:blue;"><?php echo $t['email'];?></u></i>
                    </td>
                    <td>
                      <?php echo $t['alamat'];?>
                    </td>
                    <td>
                      <a href="<?php echo base_url('index.php/anggota/edit/'.$t['id_anggota']);?>" class="btn btn-sm btn-success"><i class="ni ni-ruler-pencil"> Edit</i></a> 
                      <a onclick="javascript: return confirm('Apakah Kamu yakin ingin menghapus data ini ?')" href="<?php echo base_url('index.php/anggota/delete/'.$t['id_anggota']);?>" class="btn btn-sm btn-danger"><i class="ni ni-fat-remove"> Hapus</i></a>
                      <?php if($t['status_user']==0) { ?>
                      <a href="<?php echo base_url('index.php/user/add/'.$t['id_anggota']);?>" class="btn btn-sm btn-info"><i class="ni ni-circle-08"> Buat User</i></a> 
                      <?php } ?>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        
      </div>

      <div class="modal fade" id="anggota" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          Tambah anggota
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo base_url('index.php/anggota/tambah');?>">
                <h6 class="heading-small text-muted mb-4">Silahkan Masukan Data Sesuai Form</h6>
                <div class="pl-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">NBM</label>
                        <input type="text" name="nbm_anggota" class="form-control form-control-alternative" placeholder="867 988" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nama</label>
                        <input type="text" name="nama_anggota" class="form-control form-control-alternative" placeholder="Aly Auliak, Lc., M.Hum." required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Jenis Kelamin</label>
                        <select name="jenkel" class="form-control form-control-alternative" required>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">No. HP</label>
                        <input type="number" name="no_anggota" class="form-control form-control-alternative" placeholder="08xxxxxxxxxx" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Email</label>
                        <input type="email" name="email" class="form-control form-control-alternative" placeholder="xxxxx@xxxx.xxx" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Alamat</label>
                        <textarea name="alamat" class="form-control form-control-alternative" placeholder="Alamat secara singkat" required></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
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