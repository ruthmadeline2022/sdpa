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
                  <h3 class="mb-0">Pengaturan Struktural Sekolah</h3>
                </div>
              </div>
            </div>
            <form method="post" action="<?php echo base_url('index.php/struktural/tambah');?>">
            <div class="table-responsive">
              <!-- Projects table -->

              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" style="width:10%">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                  </tr>
                </thead>
                <tbody>
                
                  <?php $no=1; foreach($anggota as $a) { ?>
                  <tr>
                    <th scope="row">
                      <?php echo $no;?>
                    </th>
                    <td>
                        <input type="hidden" name="data[<?php echo $no;?>][id_anggota]" value="<?php echo $a['id_anggota'];?>">
                      <b><?php echo $a['nama_anggota'];?></b>
                    </td>
                    <td>
                        <select name="data[<?php echo $no;?>][id_jabatan]" class="form-control form-control-alternative" required>
                            <?php foreach($jabatan as $j) { ?>
                                <option value="<?php echo $j['id_jabatan'];?>"><?php echo $j['nama_jabatan'];?></option>
                            <?php } ?>
                        </select>
                    </td>
                  </tr>
                <?php $no++; } ?>
                
                </tbody>
              </table>
            </div>
            
            <hr/>
            <div class="row">
                  <div class="col-md-10">
                    &nbsp &nbsp <i style="font-size:12px;">*/ Catatan : Silahkan sesuaikan jabatan dengan nama anggota</i>
                  </div>
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
            </div>
            <hr/>

            </form>
          </div>
          <br/>
          <a href="<?php echo base_url('index.php/struktural');?>"><button type="button" class="btn btn-default">Kembali</button></a>
        </div>
        
      </div>