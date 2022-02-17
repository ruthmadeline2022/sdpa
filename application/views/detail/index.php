<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
     <div class="social-auth-links text-left">
                <?php  if($this->session->flashdata('alert')) : ?>
                  <?php echo '<div class="social-auth-links text-center"> <div class="alert alert-danger"> <b>'.$this->session->flashdata('alert').'</b> </div> </div>' ?>
                <?php endif;?>
              </div>
    </div>
    <!-- Page content -->

    <?php $this->load->model('m_jabatan');
    $jabatan = $this->m_jabatan->get()->result_array();
    ?>

    <?php $jumlah = 0; foreach ($belanja as $b ) {
        $jumlah = $jumlah + $b['jumlah'];
    } 
      $sisa = $kegiatan->tap_kegiatan - $jumlah;
    ?>

    <div class="container-fluid mt--7">
      <div class="row">
      <?php if($sisa>0 && ($kegiatan->id_anggota==$_SESSION['id_anggota'] || $_SESSION['id_level']==1 || $_SESSION['id_level']==2) ) { ?>
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
        <form method="post" action="<?php echo base_url('index.php/belanja/tambah');?>">
          <input name="id_kegiatan" type="hidden" class="form-control form-control-alternative" value="<?php echo $id_kegiatan;?>">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                    <h3 class="mb-0">Form Input Anggaran Belanja</h3>
                    </div>
                    <div class="col-4 text-right">
                    </div>
                </div>
                </div>
                <div class="card-body">
                    <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Urain Belanja</label>
                            <input style="background-color:white;color:black;" type="text" class="form-control form-control-alternative" name="belanja" placeholder="Perlengkapan Acara" required>
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
                                    <input style="background-color:white;color:black;" type="number" class="form-control form-control-alternative" id="volume" name="volume" placeholder="1,2,3,4,5, dst..." required>
                                </div>
                                <div class="col-sm-4">
                                <label class="form-control-label" for="input-first-name">Satuan</label>
                                    <input style="background-color:white;color:black;" type="text" class="form-control form-control-alternative" name="satuan" placeholder="Orang, paket dll" required>
                                </div>
                                <div class="col-sm-4">
                                <label class="form-control-label" for="input-first-name">Harga</label>
                                    <input style="background-color:white;color:black;" type="number" class="form-control form-control-alternative" id="harga" name="harga" placeholder="100000,200000,30000 dst.." required>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Jumlah</label>
                            <input type="hidden" class="form-control form-control-alternative" id="jumlah1" name="jumlah" required>
                            <input style="background-color:#8898aa;color:white" type="number" class="form-control form-control-alternative" id="jumlah2" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Kategori</label>
                            <select class="form-control form-control-alternative" name="id_kategori" required>
                                <?php foreach ($kategori as $k) { ?>
                                <option value="<?php echo $k['id_kategori'];?>"><?php echo $k['nama_kategori'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    </div>
                    
                  </div>
                <div class="text-center">
                   
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
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </div>
            </div>
            </form>
        </div>
      <?php } ?>

      <?php if($sisa>0 && ($kegiatan->id_anggota==$_SESSION['id_anggota'] || $_SESSION['id_level']==1 || $_SESSION['id_level']==2)) { ?>
        <div class="col-xl-8 order-xl-1">
        <?php } else { ?>
          <div class="col">
        <?php } ?>
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Detail Kegiatan</h3>
                </div>
                <div class="col-4 text-right">
                  <?php if((COUNT($detail)!=null&&COUNT($belanja)!=null)) { 
                    if($kegiatan->id_anggota==$_SESSION['id_anggota'] || $_SESSION['id_level']==1 || $_SESSION['id_level']==2) { ?>
                    <a href="#" data-toggle="modal" data-target="#cetak_dokumen"><button type="button" class="btn btn-info">Cetak</button></a>  
                  <?php } else {} } ?>       
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">Informasi Umum</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="form-group">
                        <input style="background-color:#8898aa;color:black;display:block" type="text" class="form-control form-control-alternative" value="NAMA BIDANG" readonly>
                      </div>
                    </div>
                    <div class="col-lg-9">
                      <div class="form-group">
                        <input style="background-color:#5e72e4;color:white;display:block" type="text" class="form-control form-control-alternative" value="<?php echo $kegiatan->nama_bidang;?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="form-group">
                        <input style="background-color:#8898aa;color:black;display:block" type="text" class="form-control form-control-alternative" value="NAMA PROGRAM" readonly>
                      </div>
                    </div>
                    <div class="col-lg-9">
                      <div class="form-group">
                        <input style="background-color:#5e72e4;color:white;display:block" type="text" class="form-control form-control-alternative" value="<?php echo $kegiatan->nama_program;?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="form-group">
                        <input style="background-color:#8898aa;color:black;display:block" type="text" class="form-control form-control-alternative" value="NAMA KEGIATAN" readonly>
                      </div>
                    </div>
                    <div class="col-lg-9">
                      <div class="form-group">
                        <input style="background-color:#5e72e4;color:white;display:block" type="text" class="form-control form-control-alternative" value="<?php echo $kegiatan->nama_kegiatan;?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="form-group">
                        <input style="background-color:black;color:white;display:block" type="text" class="form-control form-control-alternative" value="TOTAL DANA KEGIATAN" readonly>
                      </div>
                    </div>
                    <div class="col-lg-9">
                      <div class="form-group">
                        <input style="background-color:black;color:white;display:block" type="text" class="form-control form-control-alternative" value="<?php echo "Rp " . number_format($kegiatan->tap_kegiatan,2,',','.');?>" readonly>
                      </div>
                    </div>
                  </div>
                </div>
                
                
                <?php if(COUNT($detail)==null) { ?>
                  <hr class="my-4" />
                  <div class="row">
                        <div class="col-md-9">
                          &nbsp &nbsp <i style="font-size:12px;">*/ Data detail tentang kegiatan ini masih kosong, silahkan diisi</i>
                        </div>
                        <div class="col-md-2">
                          <?php if($kegiatan->id_anggota==$_SESSION['id_anggota'] || $_SESSION['id_level']==1 || $_SESSION['id_level']==2) { ?>
                          <a href="<?php echo base_url('index.php/detail/add/'.$id_kegiatan);?>"><button type="button" class="btn btn-primary">Isi Data</button></a>
                          <?php } ?>
                        </div>
                  </div>
                <?php } else { ?>
                
                 <hr class="my-4" />
                 <div class="row">
                    <div class="col-md-9">
                      &nbsp &nbsp <i style="font-size:12px;">*/ Apabila ada data detail yang salah silahkan diperbaiki</i>
                    </div>
                    <div class="col-md-2">
                    <?php if($kegiatan->id_anggota==$_SESSION['id_anggota'] || $_SESSION['id_level']==1 || $_SESSION['id_level']==2) { ?>
                    <a href="<?php echo base_url('index.php/detail/edit/'.$id_kegiatan);?>"><button type="button" class="btn btn-primary">Edit Data</button></a>
                    <?php } ?>
                    </div>
                 </div>
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Informasi Tambahan</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input style="background-color:white;color:black;display:block" type="text" class="form-control form-control-alternative" value="Pelaksana : <?php echo $detail->pelaksana;?>" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input style="background-color:white;color:black;display:block" type="text" class="form-control form-control-alternative" value="Sasaran : <?php echo $detail->sasaran;?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <input style="background-color:white;color:black;display:block" type="text" class="form-control form-control-alternative" value="Lokasi Kegaitan : <?php echo $detail->lokasi;?>" readonly>
                      </div>
                    </div>
                  </div>
                </div>

                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Indikator & Tolak Ukur Kinerja Belanja Langsung</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Indikator</th>
                                <th scope="col">Tolak Ukur Kinerja</th>
                                <th scope="col">Target Kinerja</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">Capaian Kegiatan</th>
                                <td><?php echo $detail->capaian;?></td>
                                <td><?php echo $detail->target_capaian;?></td>
                            </tr>
                            <tr>
                                <th scope="row" rowspan="3">Masukan</th>
                                <td>Sumber Dana</td>
                                <td><?php echo $detail->sumber_dana;?></td>
                            </tr>
                            <tr>
                                <td>Tenaga</td>
                                <td><?php echo $detail->tenaga;?></td>
                            </tr>
                            <tr>
                                <td>Waktu</td>
                                <td><?php echo $detail->waktu;?></td>
                            </tr>
                            <tr>
                                <th scope="row">Keluaran</th>
                                <td><?php echo $detail->keluaran;?></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                  </div>
                </div>

                <?php } ?>
                <hr class="my-4" />
                <!-- Description -->
                <center>
                <h6 class="heading-small text-muted mb-4"><b>RINCIAN ANGGARAN BELANJA LANGSUNG</b></h6>
                <h6 class="heading-small text-muted mb-4">MENURUT PROGRAM PER KEGIATAN Kepala Urusan Pembinaan Kader Persyarikatan</h6>
                </center>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" width="5%">No.</th>
                                <th scope="col" width="40%">Uraian</th>
                                <th scope="col" width="5%">Volume</th>
                                <th scope="col" width="5%">Satuan</th>
                                <th scope="col" width="10%">Harga</th>
                                <th scope="col" width="20%">Jumlah</th>
                                <?php if($kegiatan->id_anggota==$_SESSION['id_anggota'] || $_SESSION['id_level']==1 || $_SESSION['id_level']==2) { ?>
                                <th scope="col" width="10%">Aksi</th>
                                <?php } ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(COUNT($belanja)==null) { ?>
                              <tr>
                                <td colspan="6">&nbsp &nbsp <i style="font-size:12px;">*/ Data belanja masih kosong, silahkan diisi</i></td>
                              </tr>
                            <?php }  else { ?>
                            <?php $no=1; foreach ($belanja as $b) { ?>
                                <tr>
                                    <th scope="row"><?php echo $no++;?></th>
                                    <td><?php echo $b['belanja'];?></td>
                                    <td><?php echo $b['volume'];?></td>
                                    <td><?php echo $b['satuan'];?></td>
                                    <td><?php echo "Rp " . number_format($b['harga'],2,',','.');?></td>
                                    <td><?php echo "Rp " . number_format($b['jumlah'],2,',','.');?></td>
                                    <?php if($kegiatan->id_anggota==$_SESSION['id_anggota'] || $_SESSION['id_level']==1 || $_SESSION['id_level']==2) { ?>
                                    <td>
                                      <a href="<?php echo base_url('index.php/belanja/edit/'.$b['id_belanja']);?>" class="btn btn-sm btn-success"><i class="ni ni-ruler-pencil"> Edit</i></a> 
                                      <a onclick="javascript: return confirm('Apakah Kamu yakin ingin menghapus data ini ?')" href="<?php echo base_url('index.php/belanja/delete/'.$b['id_belanja'].'/'.$id_kegiatan);?>" class="btn btn-sm btn-danger"><i class="ni ni-fat-remove"> Hapus</i></a>
                                    </td>
                                    <?php } ?>
                                </tr>
                            <?php } }?>
                            </tbody>
                            <tfoot>
                                <tr>
                                  <th scope="col" width="70%" colspan="5">JUMLAH</th>
                                  <th scope="col" width="20%"><?php echo "Rp " . number_format($jumlah,2,',','.');?></th>
                                  <?php if($kegiatan->id_anggota==$_SESSION['id_anggota'] || $_SESSION['id_level']==1 || $_SESSION['id_level']==1) { ?>
                                  <th scope="col" width="10%">Aksi</th>
                                  <?php } ?>
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                    </div>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
      <hr/>

      <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-2">
                <a href="<?php echo base_url('index.php/kegiatan/filter/'.$kegiatan->id_bidang.'/'.$kegiatan->id_program);?>"><button type="button" class="btn btn-default">Kembali</button></a>
                </div>
                <div class="col-10 text-right">   
                </div>
              </div>
            </div>
          </div>
        </div>

      <div class="modal fade" id="cetak_dokumen" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              Silahkan Pilih TTD 
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <form method="post" action="<?php echo base_url('index.php/laporan/dokumen_pa');?>" target="_blank">
            <input type="hidden" class="form-control form-control-alternative" name="id_kegiatan" value="<?php echo $id_kegiatan;?>">
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
            <hr/>
            <div class="row">
                      <div class="col-md-4">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                      <div class="col-md-6">
                      </div>
                      <div class="col-md-2">
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

      <script>
        $('#harga').keyup(function(){
          $hasil = $('#volume').val() * $('#harga').val();
          $('#jumlah1').val($hasil);
          $('#jumlah2').val($hasil);
        });

        $('#harga').keyup(function(){
          if ($('#jumlah1').val() >= <?php echo $sisa; ?>){
            alert("Dana melibihi Dana Sisa yaitu : <?php echo "Rp " . number_format($sisa,2,',','.'); ?> | Silahkan sesuaikan dana yang ada dengan volume dan harga |");
            $('#jumlah1').val('<?php echo $sisa; ?>');
            $('#jumlah2').val('<?php echo $sisa; ?>');
          }
        });
      </script>