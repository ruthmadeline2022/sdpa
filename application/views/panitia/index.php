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
                  <h3 class="mb-0">Tebel Kepanitian</h3>
                </div>
                <div class="col text-right">
                  #Silahkan Pilihlah Bidang Dahulu
              </div>
            </div>
            <hr/>
            <div class="form-group">
              <form action="<?php echo base_url('index.php/panitia/filter');?>" method="post">
              <div class="row">
                <div class="col-md-5">
                  <select class="form-control" name="id_bidang">
                  <option value=""> - Pilih Bidang - </option>
                    <?php foreach ($bidang as $b) { 
                      if ($b['id_bidang'] == $id_bidang ) { ?>
                      <option value="<?php echo $b['id_bidang']; ?>" selected><b><?php echo $b['nama_bidang'].' - [ Rp. '.number_format($b['tap_biaya'],2,',','.').' ]'; ?></b></option>
                    <?php } else { ?>
                      <option value="<?php echo $b['id_bidang']; ?>"><?php echo $b['nama_bidang'].' - [ Rp. '.number_format($b['tap_biaya'],2,',','.').' ]'; ?></option>
                    <?php } } ?>
                  </select>
                </div>
                <div class="col-md-5">
                <select required data-placeholder="- Pilih Nama Siswa - " tabindex="-1" class="form-control" name="id_program">

                <?php if($id_program==0) { ?>
                  <option value=""> - Pilih Program - </option>
                <?php } else { ?>
                    <?php foreach ($program as $p) { 
                      if ($p['id_program'] == $id_program ) { ?>
                      <option value="<?php echo $p['id_program']; ?>" selected><b><?php echo $p['nama_program'].' - [ Rp. '.number_format($p['tap_program'],2,',','.').' ]'; ?></b></option>
                    <?php } else { ?>
                      <option value="<?php echo $p['id_program']; ?>"><?php echo $p['nama_program'].' - [ Rp. '.number_format($p['tap_program'],2,',','.').' ]'; ?></option>
                    <?php } } ?>
                <?php } ?>

                </select>
                </div>
                <div class="col-md-2">
                  <button class="btn btn-primary" type="submit">Lihat</button>
                </div>
              </div>
            </form>
            </div>

            <?php if($id_program!=0) { ?>

                <?php $jumlah = 0; foreach ($kegiatan as $k ) {
                    $jumlah = $jumlah + $k['tap_kegiatan'];
                } 
                  $sisa = $det_program->tap_program - $jumlah;
                ?>

            <hr/>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kegiatan</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach($kegiatan as $k) { ?>
                  <tr>
                    <th scope="row">
                      <?php echo $no;?>
                    </th>
                    <td>
                      <a href="#"><i style="color:blue" class="ni ni-dcollection"></i> </a><?php echo $k['nama_kegiatan'];?>
                    </td>
                    <td>
                    <a href="#" data-toggle="modal" data-target="#panitia<?php echo $no;?>" class="btn btn-sm btn-info"><i class="ni ni-circle-08"> Detail Panitia</i></a>

                    <div class="modal fade" id="panitia<?php echo $no++;?>" role="dialog">
                        <div class="modal-dialog modal-md">
                          <div class="modal-content">
                            <div class="modal-header">
                              Form Detail
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                              <h6 class="heading-small text-muted mb-4">Daftar Panitia : <br/><?php echo $k['nama_kegiatan'];?> </h6>
                              <?php 
                                 $id = $k['id_kegiatan'];
                                 $panitia = $this->m_panitia->get($id)->result_array();
                                 if (COUNT($panitia)!=0) {?>
                                  <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                      <tr>
                                        <th scope="col">Struktur</th>
                                        <th scope="col">Nama Anggota</th>
                                        <th scope="col">Aksi</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      
                                    <?php 
                                    foreach ($panitia as $p) { ?>
                                      <tr>
                                        <td>
                                          <b><?php echo $p['nama_struktur'];?></b>
                                        </td>
                                        <td>
                                          <?php echo $p['nama_anggota'];?>
                                        </td>
                                        <td>
                                        <a href="<?php echo base_url('index.php/panitia/edit/'.$id_bidang.'/'.$id_program.'/'.$p['id_panitia']);?>" class="btn btn-sm btn-success"><i class="ni ni-ruler-pencil"> Edit</i></a>
                                        </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                  </table>
                                  <br/>
                                    <?php if($p['id_anggota']==$_SESSION['id_anggota'] || $_SESSION['id_level']==1||$_SESSION['id_level']==2) { ?>
                                      <a href="<?php echo base_url('index.php/panitia/add/'.$id_bidang.'/'.$id_program.'/'.$k['id_kegiatan']);?>" class="btn btn-sm btn-primary"><i class="ni ni-fat-add"> Tambah</i></a>
                                    <?php } ?>
                                  <?php } else { ?>
                                    &nbsp &nbsp <i style="font-size:12px;">*/ Catatan : Daftar panitia masih belum diisi</i>&nbsp &nbsp => &nbsp &nbsp
                                    <?php if($p['id_anggota']==$_SESSION['id_anggota'] || $_SESSION['id_level']==1||$_SESSION['id_level']==2) { ?>
                                      <a href="<?php echo base_url('index.php/panitia/add/'.$id_bidang.'/'.$id_program.'/'.$k['id_kegiatan']);?>" class="btn btn-sm btn-primary"><i class="ni ni-fat-add"> Tambah</i></a>
                                    <?php } ?>
                                  <?php } ?>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>


                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          
            <?php } ?>
            </div>
          </div>
        </div>
     </div>


<script>
				window.onload= function(){
					$("select[name='id_bidang']").change(function (){
						var url = "<?php echo base_url('index.php/kegiatan/program');?>/"+$(this).val();
						$("select[name='id_program']").load(url);
						return false;
					});
				};
</script>
      
<script>
  $('#tap_kegiatan').keyup(function(){
  if ($(this).val() >= <?php echo $sisa; ?>){
    alert("Dana Sisa <?php echo "Rp " . number_format($sisa,2,',','.'); ?>");
    $(this).val('<?php echo $sisa; ?>');
  }
});
</script>

