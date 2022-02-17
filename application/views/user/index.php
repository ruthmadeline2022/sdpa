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
                  <h3 class="mb-0">Tabel User</h3>
                </div>
                <div class="col text-right">
                  <a href="#" data-toggle="modal" data-target="#user" class="btn btn-sm btn-primary"><i class="ni ni-fat-add"> Tambah</i></a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Level</th>
                    <th scope="col">Nama Anggota</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach($user as $u) { ?>
                  <tr>
                    <th scope="row">
                      <?php echo $no;?>
                    </th>
                    <td>
                      <?php echo $u['username'];?>
                    </td>
                    <td>
                      <?php echo $u['nama_level'];?>
                    </td>
                    <td>
                      <?php echo $u['nama_anggota'];?>
                    </td>
                    <td>
                      <a href="<?php echo base_url('index.php/user/edit/'.$u['id_user']);?>" class="btn btn-sm btn-success"><i class="ni ni-ruler-pencil"> Edit</i></a> 
                      <?php if($u['id_user']!=$_SESSION['id_user']) { ?>
                      <a onclick="javascript: return confirm('Apakah Kamu yakin ingin menghapus data ini ?')" href="<?php echo base_url('index.php/user/delete/'.$u['id_user'].'/'.$u['id_anggota']);?>" class="btn btn-sm btn-danger"><i class="ni ni-fat-remove"> Hapus</i></a>
                      <?php } ?>
                    
                      <?php if($_SESSION['id_level']==1&&$u['id_user']!=$_SESSION['id_user']) { ?>
                      <a href="#" data-toggle="modal" data-target="#rspassword<?php echo $no;?>" class="btn btn-sm btn-info"><i class="ni ni-settings-gear-65"> Reset Password</i></a>

                      <div class="modal fade" id="rspassword<?php echo $no++;?>" role="dialog">
                        <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                            Reset Password [<?php echo $u['username'];?>]
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                            <form method="post" action="<?php echo base_url('index.php/user/chpassword');?>">
                            <input type="hidden" name="id_user" class="form-control form-control-alternative" value="<?php echo $u['id_user'];?>" required>
                                    <h6 class="heading-small text-muted mb-4">Silahkan Masukan Data Sesuai Form</h6>
                                    <div class="pl-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">New Password</label>
                                            <input type="password" name="pass_baru" class="form-control form-control-alternative" placeholder="*********" required>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Retype Password</label>
                                            <input type="password" name="pass_confirm" class="form-control form-control-alternative" placeholder="*********" required>
                                            <p id="notif_confirm_false" style="color:red;font-size:10pt;"></p>
						                                <p id="notif_confirm_true" style="color:green;font-size:10pt;"></p>
                                        </div>
                                        </div>
                                    </div>
  
                                    </div>
                                    <hr class="my-4" />
                                    <div class="row">
                                    <div class="col-md-8">
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" name="button" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        </div>
                    </div>
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

    <div class="modal fade" id="user" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          Tambah user
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo base_url('index.php/user/add');?>">
                <h6 class="heading-small text-muted mb-4">Silahkan pilih anggota</h6>
                <div class="pl-lg-12">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nama Anggota</label>
                        <select class="form-control form-control-alternative" name="id_anggota">
                        <?php foreach($anggota as $a) { ?>
                            <option value="<?php echo $a['id_anggota'];?>"><?php echo $a['nama_anggota'];?></option>
                        <?php } ?>
                        </select>
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

        <script>
            $("input[name='pass_confirm']").change(function (){
				var pass_lama = $("input[name='pass_baru']").val();
				var pass_baru = $("input[name='pass_confirm']").val();
				if (pass_lama==pass_baru){
					$("button[name='button']").show();
					$('#notif_confirm_true').text('Password Sama');
					$('#notif_confirm_false').text('');
				} else {
					$("button[name='button']").hide();
					$('#notif_confirm_false').text('Password Tidak Sama');
					$('#notif_confirm_true').text('');
				}
			});
        </script>