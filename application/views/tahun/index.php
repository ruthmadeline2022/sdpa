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
                  <h3 class="mb-0">Tabel Tahun</h3>
                </div>
                <div class="col text-right">
                  <a href="#" data-toggle="modal" data-target="#tahun" class="btn btn-sm btn-primary"><i class="ni ni-fat-add"> Tambah</i></a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Tahun</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach($tahun as $t) { ?>
                  <tr>
                    <th scope="row">
                      <?php echo $no++;?>
                    </th>
                    <td>
                      <?php echo $t['nama_tahun'];?>
                    </td>
                    <td>
                      <a href="<?php echo base_url('index.php/tahun/edit/'.$t['id_tahun']);?>" class="btn btn-sm btn-success"><i class="ni ni-ruler-pencil"> Edit</i></a> 
                      <a onclick="javascript: return confirm('Apakah Kamu yakin ingin menghapus data ini ?')" href="<?php echo base_url('index.php/tahun/delete/'.$t['id_tahun']);?>" class="btn btn-sm btn-danger"><i class="ni ni-fat-remove"> Hapus</i></a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        
      </div>

      <div class="modal fade" id="tahun" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          Tambah Tahun
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo base_url('index.php/tahun/tambah');?>">
                <h6 class="heading-small text-muted mb-4">Silahkan Masukan Data Sesuai Form</h6>
                <div class="pl-lg-12">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nama Tahun</label>
                        <input type="text" name="nama_tahun" class="form-control form-control-alternative" placeholder="Tahun Ajaran 2018/2019" required>
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