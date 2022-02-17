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
        $sisa = $kegiatan->tap_kegiatan - $jumlah;
    ?>

    <!-- Page content -->
    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Tabel Pengajuan &nbsp 
                  <?php if($pengajuan->id_verifikasi==$_SESSION['id_anggota']&& $pengajuan->status_pengajuan==0) { ?>
                            <a href="#" data-toggle="modal" data-target="#verifikasi" class="btn btn-sm btn-info"><i class="ni ni-single-copy-04"> Verifikasi</i></a>
                          <?php } ?>
                          </h3>
                </div>
                <div class="col text-right">
                <?php if($pengajuan->tahap_pengajuan==0 && ($kegiatan->id_anggota=$_SESSION['id_anggota']||$_SESSION['id_level']==1||$_SESSION['id_level']==2)) { ?>
                  <a href="#" data-toggle="modal" data-target="#rincian" class="btn btn-sm btn-primary"><i class="ni ni-fat-add"> Tambah</i></a>
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
                        <th scope="col" width="20%">Dana Terpakai</th>
                        <th scope="col" width="80%"> : <?php echo "Rp " . number_format($jumlah,2,',','.');?></th>
                    </tr>
                    <tr>
                        <th scope="col" width="20%">Jumlah Dana</th>
                        <th scope="col" width="80%"> : <?php echo "Rp " . number_format($kegiatan->tap_kegiatan,2,',','.');?></th>
                    </tr>
                    <tr>
                        <th scope="col" width="20%">Dana Sisa</th>
                        <th scope="col" width="80%"> : <?php echo "Rp " . number_format($sisa,2,',','.');?></th>
                    </tr>
                   </thead>
            </table>

            <hr/>

                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Uraian</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Tanggal Input</th>
                                <?php if($pengajuan->tahap_pengajuan==0 && ($kegiatan->id_anggota=$_SESSION['id_anggota']||$_SESSION['id_level']==1||$_SESSION['id_level']==2)) { ?>
                                <th scope="col">Aksi</th>
                                <?php } ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach($rincian as $r) { ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $no++;?>
                                </th>
                                <td>
                                    <?php echo $r['uraian_rincian'];?>
                                </td>
                                <td>
                                    <?php echo "Rp " . number_format($r['jumlah_rincian'],2,',','.');?>        
                                </td>
                                <td>
                                    <?php echo $r['tanggal_rincian'];?>
                                </td>
                                <?php if($pengajuan->tahap_pengajuan==0 && ($kegiatan->id_anggota=$_SESSION['id_anggota']||$_SESSION['id_level']==1||$_SESSION['id_level']==2)) { ?>
                                <td>
                                    <a href="<?php echo base_url('index.php/rincian/edit/'.$r['id_rincian'].'/'.$kegiatan->id_kegiatan);?>" class="btn btn-sm btn-success"><i class="ni ni-ruler-pencil"> Edit</i></a> 
                                    <a onclick="javascript: return confirm('Apakah Kamu yakin ingin menghapus data ini ?')" href="<?php echo base_url('index.php/rincian/delete/'.$r['id_rincian'].'/'.$pengajuan->id_pengajuan);?>" class="btn btn-sm btn-danger"><i class="ni ni-fat-remove"> Hapus</i></a>
                                </td>
                                <?php } ?>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                    </div>
                    <hr class="my-4" />
                        <div class="row">
                          <div class="col-md-2">
                            <a href="<?php echo base_url('index.php/pengajuan/data/'.$kegiatan->id_kegiatan);?>"><button type="button" class="btn btn-default">Kembali</button></a>
                          </div>
                          <div class="col-md-8">
                          </div>
                          <div class="col-md-2">
                          <?php if($pengajuan->tahap_pengajuan==0 && COUNT($pengajuan)!=0 && ($kegiatan->id_anggota=$_SESSION['id_anggota']||$_SESSION['id_level']==1||$_SESSION['id_level']==2)) { ?>
                          <a href="#" data-toggle="modal" data-target="#complete" class="btn btn-md btn-warning"><i class="ni ni-check-bold"> Selesai</i></a>
                          <?php } ?>
                          </div>
                        </div>
        

  <div class="modal fade" id="rincian" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          Tambah Bidang
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

                    <form method="post" action="<?php echo base_url('index.php/rincian/tambah');?>">
                    <input type="hidden" name="id_pengajuan" class="form-control form-control-alternative" value="<?php echo $pengajuan->id_pengajuan;?>" required>
                        <h6 class="heading-small text-muted mb-4">Silahkan Masukan Data Sesuai Form</h6>
                        <div class="pl-lg-12">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label class="form-control-label" for="input-username">Uraian</label>
                                <input type="text" name="uraian_rincian" class="form-control form-control-alternative" placeholder="Urain pengajuan" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label class="form-control-label" for="input-first-name">Jumlah Dana</label>
                                <input type="number" name="jumlah_rincian" id="jumlah_rincian" class="form-control form-control-alternative" placeholder="2000000" required>
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
                        </div>
                    </form>
        </div>
      </div>
    </div>

  <div class="modal fade" id="complete" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          Konfirmasi Kembali
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <center><h1 class="heading-medium text-muted mb-4">PERINGATAN !</h1></center>
                    <form method="post" action="<?php echo base_url('index.php/pengajuan/complete');?>">
                        <input type="hidden" name="id_pengajuan" class="form-control form-control-alternative" value="<?php echo $pengajuan->id_pengajuan;?>" required>
                        
                        <div class="pl-lg-12">
                        <p>Data yang sudah dinyatakan selesai tidak akan bisa kembali melakukan fungsi tambah, edit, hapus.
                        Silahkan cek terlebih dahulu.<p>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Selesai</button>
                        </div>
                        </div>
                        </div>
                    </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="verifikasi" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          Konfirmasi Kembali
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <center><h1 class="heading-medium text-muted mb-4">PERINGATAN !</h1></center>
                    <form method="post" action="<?php echo base_url('index.php/pengajuan/verifikasi');?>">
                        <input type="hidden" name="id_pengajuan" class="form-control form-control-alternative" value="<?php echo $pengajuan->id_pengajuan;?>" required>
                        
                        <div class="pl-lg-12">
                        <p>Data yang sudah <b>Diverifikasi</b> tidak dibatalkan atau diubah.
                        Silahkan cek terlebih dahulu.<p>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Verifikasi</button>
                        </div>
                        </div>
                        </div>
                    </form>
        </div>
      </div>
    </div>
  </div>

  <script>
  $('#jumlah_rincian').keyup(function(){
  if ($(this).val() >= <?php echo $sisa; ?>){
    alert("Dana melibihi Dana Sisa yaitu <?php echo "Rp " . number_format($sisa,2,',','.'); ?>");
    $(this).val('<?php echo $sisa; ?>');
  }
});
</script>
