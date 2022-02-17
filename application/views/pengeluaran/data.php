<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
     <div class="social-auth-links text-left">
                <?php  if($this->session->flashdata('alert')) : ?>
                  <?php echo '<div class="social-auth-links text-center"> <div class="alert alert-danger"> <b>'.$this->session->flashdata('alert').'</b> </div> </div>' ?>
                <?php endif;?>
              </div>
    </div>
    <?php $jumlah=0; foreach($rincian as $r) {
        $jumlah = $jumlah + $r['jumlah_rincian'];
    }

        $jumlah1=0; foreach ($pembelanjaan as $p ){
            $jumlah1 = $jumlah1 + $p['jumlah_pembelanjaan'];
        }

        $sisa = $jumlah - $jumlah1;
    ?>

    <!-- Page content -->
    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Tabel Pengeluaran &nbsp 
                     
                   </h3>
                </div>
                <div class="col text-right">
                  <?php if(COUNT($pengeluaran)!=0) { ?>
                    <?php if($pengeluaran->tahap_pengeluaran==1 && ($kegiatan->id_anggota=$_SESSION['id_anggota']||$_SESSION['id_level']==1||$_SESSION['id_level']==2||$p['id_verifikator']==$_SESSION['id_anggota'])) { ?>
                    <a href="#" data-toggle="modal" data-target="#pengeluaranBukti" class="btn btn-sm btn-warning"><i class="ni ni-spaceship"> Cetak Bukti LPJ</i></a>
                    <a href="<?php echo base_url('index.php/laporan/pengeluaranLembar/'.$pengeluaran->id_pengeluaran);?>" target="_blank" class="btn btn-sm btn-success"><i class="ni ni-spaceship"> Cetak Lembar LPJ</i></a>
                    <?php } ?>
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
                        <th scope="col" width="20%">Kegiatan</th>
                        <th scope="col" width="80%"> : <?php echo $kegiatan->nama_kegiatan;?></th>
                    </tr>
                    <tr>
                        <th scope="col" width="20%">Penanggung Jawab</th>
                        <th scope="col" width="80%"> : <?php echo $kegiatan->nama_anggota;?></th>
                    </tr>
                    <tr>
                        <th scope="col" width="20%">Jumlah Dana Kegiatan</th>
                        <th scope="col" width="80%"> : <?php echo "Rp " . number_format($kegiatan->tap_kegiatan,2,',','.');?></th>
                    </tr>
                    <tr>
                        <th scope="col" width="20%">Jumlah Dana Pengajuan</th>
                        <th scope="col" width="80%"> : <?php echo "Rp " . number_format($jumlah,2,',','.');?></th>
                    </tr>
                    <tr>
                        <th scope="col" width="20%">Dana Sisa</th>
                        <th scope="col" width="80%"> : <?php echo "Rp " . number_format($sisa,2,',','.');?></th>
                    </tr>
                   </thead>
            </table>
            

            <hr/>
            
            <?php if (COUNT($pengeluaran)==0) { ?>
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                        <th scope="col" width="90%"><i style="font-size:12px;">*/ Data detail tentang pengeluaran ini masih kosong, silahkan diisi</i></th>
                        <?php if($kegiatan->id_anggota==$_SESSION['id_anggota'] || $_SESSION['id_level']==1 || $_SESSION['id_level']==2) { ?>
                        <th scope="col" width="10%"> <a href="<?php echo base_url('index.php/pengeluaran/add/'.$pengajuan->id_pengajuan);?>"><button type="button" class="btn btn-primary">Isi Data</button></a></th>
                        <?php } ?>
                    </tr>
                   </thead>
                </table>
                
                <hr/>

            <?php } else { ?>
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                        <th scope="col" width="90%"><i style="font-size:12px;">*/ Apabila ada data detail yang salah silahkan diperbaiki</i></th>
                        <?php if($pengeluaran->tahap_pengeluaran==0 && ($kegiatan->id_anggota==$_SESSION['id_anggota'] || $_SESSION['id_level']==1 || $_SESSION['id_level']==2)) { ?>
                        <th scope="col" width="10%"> <a href="<?php echo base_url('index.php/pengeluaran/edit/'.$pengeluaran->id_pengeluaran);?>"><button type="button" class="btn btn-primary">Edit Data</button></a></th>
                        <?php } ?>
                    </tr>
                   </thead>
                </table>
                
                <hr/>
            
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                        <th scope="col" width="20%">No KK</th>
                        <th scope="col" width="80%"> : <?php echo $pengeluaran->no_kk;?></th>
                    </tr>
                    <tr>
                        <th scope="col" width="20%">Tanggal Pelaporan (LPJ)</th>
                        <th scope="col" width="80%"> : <?php echo $pengeluaran->tanggal_pengeluaran;?></th>
                    </tr>
                    <tr>
                        <th scope="col" width="20%">Verifikator</th>
                        <th scope="col" width="80%"> : <?php echo $pengeluaran->nama_anggota;?></th>
                    </tr>
                    <tr>
                        <th scope="col" width="20%">Tahap Pengeluaran</th>
                        <th scope="col" width="80%"> : 
                            <?php if($pengeluaran->tahap_pengeluaran==0) { ?>
                            <span class="badge badge-danger">Pending</span>
                            <?php } else { ?>
                                <span class="badge badge-info">Complete</span>
                            <?php } ?>
                      </th>
                    </tr>
                   </thead>
                </table>

                <hr/>

                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                        <td scope="col" width="90%"><i style="font-size:12px;">*/ Tombol untuk menambah data belanja (Detail Belanja LPJ)</i></td>
                        <?php if($pengeluaran->tahap_pengeluaran==0 && ($kegiatan->id_anggota==$_SESSION['id_anggota'] || $_SESSION['id_level']==1 || $_SESSION['id_level']==2)) { ?>
                        <td scope="col" width="10%">  <a href="<?php echo base_url('index.php/pembelanjaan/add/'.$pengeluaran->id_pengeluaran);?>" class="btn btn-sm btn-primary"><i class="ni ni-fat-add"> Tambah Pembelanjaan</i></a></td>
                        <?php } ?>
                    </tr>
                   </thead>
                </table>
            
           

            <hr/>

                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Uraian</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Status</th>

                                <?php if($pengeluaran->tahap_pengeluaran==0 && ($kegiatan->id_anggota=$_SESSION['id_anggota']||$_SESSION['id_level']==1||$_SESSION['id_level']==2)) { ?>
                                <th scope="col">
                                    Aksi
                                    <?php if($pengeluaran->id_verifikator==$_SESSION['id_anggota']) { ?>
                                      <a href="#" data-toggle="modal" data-target="#complete" class="btn btn-sm btn-warning"><i class="ni ni-check-bold"> Selesai</i></a>
                                      <?php } ?>
                                </th>
                                <?php } ?>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach($pembelanjaan as $p) { ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $no;?>
                                </th>
                                <td>
                                    <?php echo $p['tanggal_pembelanjaan'];?>
                                </td>
                                <td>
                                    <?php echo $p['uraian_pembelanjaan'];?>
                                </td>
                                <td>
                                    <?php echo "Rp " . number_format($p['jumlah_pembelanjaan'],2,',','.');?>        
                                </td>
                                <td>
                                    <?php if ($pengeluaran->tahap_pengeluaran==0) { ?>
                                        <span class="badge badge-danger">Belum Diverifikasi</span>
                                    <?php } else { ?>
                                        <span class="badge badge-info">Diverifikasi</span>
                                    <?php } ?>
                                </td>
                                <?php if($pengeluaran->tahap_pengeluaran==0 && ($kegiatan->id_anggota=$_SESSION['id_anggota']||$_SESSION['id_level']==1||$_SESSION['id_level']==2)) { ?>
                                <td>
                                    <a href="<?php echo base_url('index.php/pembelanjaan/edit/'.$p['id_pembelanjaan'].'/'.$pengajuan->id_pengajuan);?>" class="btn btn-sm btn-success"><i class="ni ni-ruler-pencil"> Edit</i></a> 
                                    <a onclick="javascript: return confirm('Apakah Kamu yakin ingin menghapus data ini ?')" href="<?php echo base_url('index.php/pembelanjaan/delete/'.$p['id_pembelanjaan'].'/'.$pengajuan->id_pengajuan);?>" class="btn btn-sm btn-danger"><i class="ni ni-fat-remove"> Hapus</i></a>                   
                                </td>
                                <?php } ?>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <?php } ?>
                        </div>
                        </div>
                        </div>        
                    <hr class="my-4" />
                        <div class="row">
                          <div class="col-md-2">
                            <a href="<?php echo base_url('index.php/pengajuan/data/'.$pengajuan->id_pengajuan);?>"><button type="button" class="btn btn-default">Kembali</button></a>
                          </div>
                          <div class="col-md-8">
                          </div>
                          <div class="col-md-2">
                          </div>
                        </div>
                        </div>
  

                        <?php if(COUNT($pengeluaran)!=0) { ?>
                        <div class="modal fade" id="complete" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          Konfirmasi Kembali
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                              <div class="modal-body">
                                                <center><h1 class="heading-medium text-muted mb-4">PERINGATAN !</h1></center>
                                                    <form method="post" action="<?php echo base_url('index.php/pengeluaran/complete');?>">
                                                        <input type="hidden" name="id_pengeluaran" class="form-control form-control-alternative" value="<?php echo $pengeluaran->id_pengeluaran;?>" required>
                                                        <input type="hidden" name="id_pengajuan" class="form-control form-control-alternative" value="<?php echo $pengajuan->id_pengajuan;?>" required>
                                                        
                                                        <div class="pl-lg-12">
                                                        <p>Data yang sudah dinyatakan <b>Selesai</b> tidak akan bisa kembali melakukan fungsi tambah, edit, hapus.
                                                        Silahkan cek terlebih dahulu.<p>
                                                        </div>
                                                        <div class="row">
                                                        <div class="col-md-4">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                        <div class="col-md-2">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <button type="submit" class="btn btn-primary">Selesain</button>
                                                        </div>
                                                        </div>
                                                        </div>
                                                    </form>
                                              </div>
                                      </div>
                                    </div>
                                  </div>
                        

                            <div class="modal fade" id="pengeluaranBukti" role="dialog" target="_blank">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    Cetak Lembar Bukti Pengeluaran Kas
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>
                                <div class="modal-body">
                                  <form method="post" action="<?php echo base_url('index.php/laporan/pengeluaranBukti');?>" target="_blank">
                                  <input type="hidden" class="form-control form-control-alternative" name="id_pengeluaran" value="<?php echo $pengeluaran->id_pengeluaran;?>">
                                  <div class="row">
                                          <div class="col-md-2">
                                          <label class="form-control-label" for="input-username">TTD 1 (Yang Menerima)</label>
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
                                          <label class="form-control-label" for="input-username">TTD 2 (Bendahara)</label>
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
                                          <label class="form-control-label" for="input-username">TTD 3 (Atasan Bendahara)</label>
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

     <?php } ?>

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
            };
      </script>


      <script>
        $('#jumlah_pengeluaran').keyup(function(){
        if ($(this).val() >= <?php echo $sisa; ?>){
          alert("Dana melibihi Dana Sisa yaitu <?php echo "Rp " . number_format($sisa,2,',','.'); ?>");
          $(this).val('<?php echo $sisa; ?>');
        }
      });
      </script>
