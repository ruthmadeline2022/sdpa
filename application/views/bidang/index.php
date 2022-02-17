 <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
     <div class="social-auth-links text-left">
                <?php  if($this->session->flashdata('alert')) : ?>
                  <?php echo '<div class="social-auth-links text-center"> <div class="alert alert-danger"> <b>'.$this->session->flashdata('alert').'</b> </div> </div>' ?>
                <?php endif;?>
              </div>
    </div>
    <?php $this->load->model('m_jabatan');
    $jabatan = $this->m_jabatan->get()->result_array();
    ?>
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
                <div class="col text-right">
                  <a href="#" data-toggle="modal" data-target="#bidang" class="btn btn-sm btn-primary"><i class="ni ni-fat-add"> Tambah</i></a>
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
                    <th scope="col">No</th>
                    <th scope="col">Nama Bidang</th>
                    <th scope="col">Ketetapan Biaya</th>
                    <th scope="col">MAK</th>
                    <th scope="col"><a href="#" data-toggle="modal" data-target="#lap_bidang" class="btn btn-sm btn-info"><i class="ni ni-archive-2"> Cetak</i></a></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach($bidang as $b) { ?>
                  <tr>
                    <th scope="row">
                      <?php echo $no++;?>
                    </th>
                    <td>
                      <?php echo $b['nama_bidang'];?>
                    </td>
                    <td>
                      <?php echo "Rp " . number_format($b['tap_biaya'],2,',','.');?>
                    </td>
                    <td>
                      <b><?php echo $b['mak_bidang'];?></b>
                    </td>
                    <td>
                      <a href="<?php echo base_url('index.php/bidang/edit/'.$b['id_bidang']);?>" class="btn btn-sm btn-success"><i class="ni ni-ruler-pencil"> Edit</i></a> 
                      <a onclick="javascript: return confirm('Apakah Kamu yakin ingin menghapus data ini ?')" href="<?php echo base_url('index.php/bidang/delete/'.$b['id_bidang']);?>" class="btn btn-sm btn-danger"><i class="ni ni-fat-remove"> Hapus</i></a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        

  <div class="modal fade" id="bidang" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          Tambah Bidang
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo base_url('index.php/bidang/tambah');?>">
                <h6 class="heading-small text-muted mb-4">Silahkan Masukan Data Sesuai Form</h6>
                <div class="pl-lg-12">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nama Bidang</label>
                        <input type="text" name="nama_bidang" class="form-control form-control-alternative" placeholder="Humas,dll" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Ketetapan Biaya</label>
                        <input type="number" name="tap_biaya" class="form-control form-control-alternative" placeholder="10.000.000...dst" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">MAK Bidang</label>
                        <input type="text" name="mak_bidang" class="form-control form-control-alternative" placeholder="12,13,14" required>
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

  <div class="modal fade" id="lap_bidang" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          Silahkan Pilih TTD 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <form method="post" action="<?php echo base_url('index.php/laporan/bidang');?>" target="_blank">
        <div class="row">
                <div class="col-md-12">
                <label class="form-control-label" for="input-username">Pilih Jabatan</label>
                  <select class="form-control" name="jabatan">
                  <option value=""> - Pilih Jabatan - </option>
                    <?php foreach ($jabatan as $j) {?>
                      <option value="<?php echo $j['id_jabatan']; ?>"><b><?php echo $j['nama_jabatan']; ?></b></option>
                    <?php } ?>
                  </select>
                </div>
        </div>
        <hr/>
        <div class="row">
                <div class="col-md-12">
                <label class="form-control-label" for="input-username">Pilih Angota</label>
                  <select class="form-control" name="anggota">
                    <option value=""> - Pilih Anggota - </option>
                  </select>
                </div>
        </div>
        <hr/>
        <div class="row">
                  <div class="col-md-4">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                  <div class="col-md-4">
                  </div>
                  <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Cetak</button>
                  </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  </div>

  <script>
				window.onload= function(){
					$("select[name='jabatan']").change(function (){
						var url = "<?php echo base_url('index.php/anggota/jabatan');?>/"+$(this).val();
						$("select[name='anggota']").load(url);
						return false;
					});
				};
  </script>