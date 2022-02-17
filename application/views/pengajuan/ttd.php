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
                  <h3 class="mb-0">Sebelum Mencetak Silahkan pilih TTD 
                     
                   </h3>
                </div>
                <div class="col text-right">
                
                </div>
              </div>
            </div>
              <!-- Projects table -->
            
            <div class="modal-body">

                <form method="post" action="<?php echo base_url('index.php/laporan/pengajuan');?>" target="_blank">
                <input type="hidden" name="id_pengajuan" class="form-control form-control-alternative" value="<?php echo $pengajuan->id_pengajuan;?>" required>
                    <h6 class="heading-small text-muted mb-4">Silahkan Masukan Data Sesuai Form</h6>
                    <div class="pl-lg-12">
                        <div class="row">
                                <div class="col-md-2">
                                <label class="form-control-label" for="input-username">TTD 1</label>
                                </div>
                                <div class="col-md-5">
                                <label class="form-control-label" for="input-username">Pilih Jabatan</label>
                                <select class="form-control" name="id_jabatan1">
                                <option value=""> - Pilih Jabatan - </option>
                                    <?php foreach ($jabatan as $j) {?>
                                    <option value="<?php echo $j['id_jabatan']; ?>"><b><?php echo $j['nama_jabatan']; ?></b></option>
                                    <?php } ?>
                                </select>
                                </div>
                                <div class="col-md-5">
                                <label class="form-control-label" for="input-username">Pilih Angota</label>
                                <select class="form-control" name="id_anggota1">
                                    <option value=""> - Pilih Anggota - </option>
                                </select>
                                </div>
                        </div>
                        <hr/>
                        <div class="row">
                                <div class="col-md-2">
                                <label class="form-control-label" for="input-username">TTD 2</label>
                                </div>
                                <div class="col-md-5">
                                <label class="form-control-label" for="input-username">Pilih Jabatan</label>
                                <select class="form-control" name="id_jabatan2">
                                <option value=""> - Pilih Jabatan - </option>
                                    <?php foreach ($jabatan as $j) {?>
                                    <option value="<?php echo $j['id_jabatan']; ?>"><b><?php echo $j['nama_jabatan']; ?></b></option>
                                    <?php } ?>
                                </select>
                                </div>
                                <div class="col-md-5">
                                <label class="form-control-label" for="input-username">Pilih Angota</label>
                                <select class="form-control" name="id_anggota2">
                                    <option value=""> - Pilih Anggota - </option>
                                </select>
                                </div>
                        </div>
                        <hr/>
                        <div class="row">
                                <div class="col-md-2">
                                <label class="form-control-label" for="input-username">TTD 3</label>
                                </div>
                                <div class="col-md-5">
                                <label class="form-control-label" for="input-username">Pilih Jabatan</label>
                                <select class="form-control" name="id_jabatan3">
                                <option value=""> - Pilih Jabatan - </option>
                                    <?php foreach ($jabatan as $j) {?>
                                    <option value="<?php echo $j['id_jabatan']; ?>"><b><?php echo $j['nama_jabatan']; ?></b></option>
                                    <?php } ?>
                                </select>
                                </div>
                                <div class="col-md-5">
                                <label class="form-control-label" for="input-username">Pilih Angota</label>
                                <select class="form-control" name="id_anggota3">
                                    <option value=""> - Pilih Anggota - </option>
                                </select>
                                </div>
                        </div>
                        <hr/>
                        <div class="row">
                                <div class="col-md-2">
                                <label class="form-control-label" for="input-username">TTD 4</label>
                                </div>
                                <div class="col-md-5">
                                <label class="form-control-label" for="input-username">Pilih Jabatan</label>
                                <select class="form-control" name="id_jabatan4">
                                <option value=""> - Pilih Jabatan - </option>
                                    <?php foreach ($jabatan as $j) {?>
                                    <option value="<?php echo $j['id_jabatan']; ?>"><b><?php echo $j['nama_jabatan']; ?></b></option>
                                    <?php } ?>
                                </select>
                                </div>
                                <div class="col-md-5">
                                <label class="form-control-label" for="input-username">Pilih Angota</label>
                                <select class="form-control" name="id_anggota4">
                                    <option value=""> - Pilih Anggota - </option>
                                </select>
                                </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-2">
                            <a href="<?php echo base_url('index.php/pengajuan/data/'.$pengajuan->id_pengajuan);?>"><button type="button" class="btn btn-default">Kembali</button></a>
                        </div>
                        <div class="col-md-8">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Cetak</button>
                        </div>
                    </div>
                </div>
            </form>

            </div>
        </div>

    </div>


    <script>
            window.onload= function(){
              $("select[name='id_jabatan1']").change(function (){
                var url = "<?php echo base_url('index.php/anggota/jabatan');?>/"+$(this).val();
                $("select[name='id_anggota1']").load(url);
                return false;
              });
              $("select[name='id_jabatan2']").change(function (){
                var url = "<?php echo base_url('index.php/anggota/jabatan');?>/"+$(this).val();
                $("select[name='id_anggota2']").load(url);
                return false;
              });
              $("select[name='id_jabatan3']").change(function (){
                var url = "<?php echo base_url('index.php/anggota/jabatan');?>/"+$(this).val();
                $("select[name='id_anggota3']").load(url);
                return false;
              });
              $("select[name='id_jabatan4']").change(function (){
                var url = "<?php echo base_url('index.php/anggota/jabatan');?>/"+$(this).val();
                $("select[name='id_anggota4']").load(url);
                return false;
              });
            };
      </script>