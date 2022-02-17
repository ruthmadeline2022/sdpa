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
                  <h3 class="mb-0">Tabel Pengajuan</h3>
                </div>
                <div class="col text-right">
                  <?php if($kegiatan->id_anggota=$_SESSION['id_anggota']||$_SESSION['id_level']==1||$_SESSION['id_level']==2) { ?>
                    <a href="#" data-toggle="modal" data-target="#pengajuan" class="btn btn-sm btn-primary"><i class="ni ni-fat-add"> Tambah</i></a>
                  <?php } ?>
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
                        <th scope="col" width="20%">Unit Kerja</th>
                        <th scope="col" width="80%"> : <?php echo $kegiatan->nama_bidang;?></th>
                    </tr>
                    <tr>
                        <th scope="col" width="20%">Program</th>
                        <th scope="col" width="80%"> : <?php echo $kegiatan->nama_program;?></th>
                    </tr>
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
                   </thead>
            </table>

            <hr/>

              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal Pengajuan</th>
                    <th scope="col">Tanggal LPJ</th>
                    <th scope="col">Persetujuan</th>
                    <th scope="col">Tahap Pengajuan</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach($pengajuan as $p) { ?>
                  <tr>
                    <th scope="row">
                        <?php echo $no++;?>
                    </th>
                    <td>
                        <?php echo $p['tanggal_pengajuan'];?>
                    </td>
                    <td>
                        <?php echo $p['tanggal_lpj'];?>
                    </td>
                    <td>
                        <?php echo $p['nama_anggota'];?> &nbsp
                        <?php if ($p['status_pengajuan']==0) { ?>
                            <span class="badge badge-danger">Belum Diverifikasi</span>
                        <?php } else { ?>
                            <span class="badge badge-info">Diverifikasi</span>
                        <?php } ?>
                    </td>
                    <td>
                      <?php if($p['tahap_pengajuan']==0) { ?>
                          <span class="badge badge-danger">Pending</span>
                      <?php } else { ?>
                          <span class="badge badge-info">Complete</span>
                      <?php } ?>
                    </td>
                    <td>
                    <?php if($kegiatan->id_anggota=$_SESSION['id_anggota']||$_SESSION['id_level']==1||$_SESSION['id_level']==2) { ?>
                      <a href="#" data-toggle="modal" data-target="#aksi" class="btn btn-sm btn-info"><i class="ni ni-briefcase-24"> Aksi</i></a>
                      
                    <?php } ?>

                    <?php if($kegiatan->id_anggota=$_SESSION['id_anggota']||$_SESSION['id_level']==1||$_SESSION['id_level']==2||$p['id_verifikasi']==$_SESSION['id_anggota']) { ?>
                      <a href="<?php echo base_url('index.php/rincian/data/'.$p['id_pengajuan']);?>"><button type="button" class="btn btn-sm btn-warning"><i class="ni ni-briefcase-24"></i> Rincian</button></a>
                    <?php } ?>
                    
                    <?php if($p['tahap_pengajuan']==1 && $p['status_pengajuan']==1 && ($kegiatan->id_anggota=$_SESSION['id_anggota']||$_SESSION['id_level']==1||$_SESSION['id_level']==2||$p['id_verifikasi']==$_SESSION['id_anggota'])) { ?>
                      <a href="<?php echo base_url('index.php/pengajuan/ttd/'.$p['id_pengajuan']);?>" class="btn btn-sm btn-warning"><i class="ni ni-spaceship"> Cetak</i></a>
                      <a href="<?php echo base_url('index.php/pengeluaran/data/'.$p['id_pengajuan']);?>"><button type="button" class="btn btn-sm btn-danger"><i class="ni ni-book-bookmark"></i> Pengeluaran (LPJ)</button></a>        
                      <?php } ?>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        
        <div class="modal fade" id="aksi" role="dialog">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                Menu Detail
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <center>
                  <a href="<?php echo base_url('index.php/pengajuan/edit/'.$p['id_pengajuan'].'/'.$p['id_kegiatan']);?>" class="btn btn-success"><i class="ni ni-ruler-pencil"> Edit</i></a> 
                  <a onclick="javascript: return confirm('Apakah Kamu yakin ingin menghapus data ini ?')" href="<?php echo base_url('index.php/pengajuan/delete/'.$p['id_pengajuan']);?>" class="btn btn-danger"><i class="ni ni-fat-remove"> Hapus</i></a>
                </center>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

  <div class="modal fade" id="pengajuan" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          Tambah Data
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo base_url('index.php/pengajuan/tambah');?>">
            <input type="hidden" name="id_kegiatan" class="form-control form-control-alternative" value="<?php echo $kegiatan->id_kegiatan;?>" required>
                <h6 class="heading-small text-muted mb-4">Silahkan Masukan Data Sesuai Form</h6>
                <div class="pl-lg-12">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Tanggal Pengajuan</label>
                        <input type="date" name="tanggal_pengajuan" class="form-control form-control-alternative" value="<?php echo date('Y-m-d');?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Tanggal LPJ</label>
                        <input type="date" name="tanggal_lpj" class="form-control form-control-alternative" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Verifikator</label>
                        <select class="form-control form-control-alternative" name="id_verifikasi">
                        <?php foreach($anggota as $a) { ?>
                            <option value="<?php echo $a['id_anggota'];?>"><?php echo $a['nama_anggota'];?></option>
                        <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
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
