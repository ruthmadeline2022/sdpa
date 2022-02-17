<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
     <div class="social-auth-links text-left">
                <?php  if($this->session->flashdata('alert')) : ?>
                  <?php echo '<div class="social-auth-links text-center"> <div class="alert alert-danger"> <b>'.$this->session->flashdata('alert').'</b> </div> </div>' ?>
                <?php endif;?>
              </div>
    </div>

                <?php $jumlah = 0; foreach ($belanja_by as $p ) {
                    $jumlah = $jumlah + $p['jumlah'];
                } 
                  $sisa = $kegiatan->tap_kegiatan - $jumlah;
                ?>
    <!-- Page content -->
    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-xl-8 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Tabel belanja</h3>
                </div>
               
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
                <div class="modal-content">
                <div class="modal-body">
                  <form method="post" action="<?php echo base_url('index.php/belanja/update');?>">
                  <input name="id_kegiatan" type="hidden" class="form-control form-control-alternative" value="<?php echo $id_kegiatan;?>">
                  <input name="id_belanja" type="hidden" class="form-control form-control-alternative" value="<?php echo $belanja->id_belanja;?>">
                   
                        <div class="row">
                            <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="input-first-name">Urain Belanja</label>
                                <input style="background-color:white;color:black;" type="text" class="form-control form-control-alternative" name="belanja" value="<?php echo $belanja->belanja;?>" required>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="input-first-name">Rincian Perhitungan</label>
                                <hr class="my-4" />
                                
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-control-label" for="input-first-name">Volume</label>
                                        <input style="background-color:white;color:black;" type="number" class="form-control form-control-alternative" id="volume" name="volume" value="<?php echo $belanja->volume;?>" required>
                                    </div>
                                    <div class="col-sm-4">
                                    <label class="form-control-label" for="input-first-name">Satuan</label>
                                        <input style="background-color:white;color:black;" type="text" class="form-control form-control-alternative" name="satuan" value="<?php echo $belanja->satuan;?>" required>
                                    </div>
                                    <div class="col-sm-4">
                                    <label class="form-control-label" for="input-first-name">Harga</label>
                                        <input style="background-color:white;color:black;" type="number" class="form-control form-control-alternative" id="harga" name="harga" value="<?php echo $belanja->harga;?>" required>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-first-name">Jumlah</label>
                                <input type="hidden" class="form-control form-control-alternative" id="jumlah" name="jumlah" value="<?php echo $belanja->jumlah;?>" required>
                                <input style="background-color:#8898aa;color:white" type="number" class="form-control form-control-alternative" id="jumlah" name="jumlah" value="<?php echo $belanja->jumlah;?>" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-first-name">Kategori</label>
                                <select class="form-control form-control-alternative" name="id_kategori" required>
                                    <?php foreach ($kategori as $k) { 
                                        if ($belanja->id_kategori==$k['id_kategori']) { ?>
                                            <option value="<?php echo $k['id_kategori'];?>" selected><?php echo $k['nama_kategori'];?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo $k['id_kategori'];?>"><?php echo $k['nama_kategori'];?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                        </div>
                        </div>
                        
                        <hr class="my-4" />
                        <div class="row">
                          <table class="table align-items-center table-flush">
                          <thead class="thead-light">
                              <tr>
                                <th scope="row">
                                  Dana Tersedia
                                </th>
                                <th><?php echo "Rp " . number_format($kegiatan->tap_kegiatan,2,',','.');?></th>
                              </tr>
                              <tr>
                                <th scope="row">
                                  Dana Terpakai
                                </th>
                                <th><?php echo "Rp " . number_format($jumlah,2,',','.');?></th>
                              </tr>
                              <tr>
                                <th scope="row">
                                  Dana Sisa
                                </th>
                                <th><?php echo "Rp " . number_format($sisa,2,',','.');?></th>
                              </tr>
                            </thead>
                          </table>
                        </div>
                        
                        <hr class="my-4" />
                        <div class="row">
                          <div class="col-md-2">
                            <a href="<?php echo base_url('index.php/detail/data/'.$id_kegiatan);?>"><button type="button" class="btn btn-default">Kembali</button></a>
                          </div>
                          <div class="col-md-8">
                          </div>
                          <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                        </div>
                      </form>
                </div>
               
              </div>

            </div>
          </div>
   
        


      <script>
        $('#harga').keyup(function(){
          $hasil = $('#volume').val() * $('#harga').val();
          $('#jumlah').val($hasil);
        });

        $('#harga').keyup(function(){
          if ($('#jumlah').val() >= <?php echo $sisa; ?>){
            alert("Dana melibihi Dana Sisa yaitu : <?php echo "Rp " . number_format($sisa + $belanja->jumlah,2,',','.'); ?> | Silahkan sesuaikan dana yang ada dengan volume dan harga |");
            $('#jumlah').val('<?php echo $sisa + $belanja->jumlah; ?>');
          }
        });
      </script>