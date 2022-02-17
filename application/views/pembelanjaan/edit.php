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

        $jumlah1=0; foreach ($jum_pembelanjaan as $p ){
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
                  <h3 class="mb-0">Mengisi Data Pembelanjaan
                     
                   </h3>
                </div>
                <div class="col text-right">
                
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <div class="table-responsive">
              <!-- Projects table -->
            <div class="modal-body">

                <form method="post" action="<?php echo base_url('index.php/pembelanjaan/update');?>">
                <input type="hidden" name="id_pembelanjaan" class="form-control form-control-alternative" value="<?php echo $pembelanjaan->id_pembelanjaan;?>" required>
                <input type="hidden" name="id_pengajuan" class="form-control form-control-alternative" value="<?php echo $id_pengajuan;?>" required>
                    <h6 class="heading-small text-muted mb-4">Silahkan Masukan Data Sesuai Form</h6>
                    <div class="pl-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Uraian</label>
                            <input type="text" name="uraian_pembelanjaan" class="form-control form-control-alternative" value="<?php echo $pembelanjaan->uraian_pembelanjaan;?>" required>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Jumlah Dana</label>
                            <input type="number" name="jumlah_pembelanjaan" id="jumlah_pembelanjaan" class="form-control form-control-alternative" value="<?php echo $pembelanjaan->jumlah_pembelanjaan;?>" required>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Tanggal</label>
                            <input type="date" name="tanggal_pembelanjaan" class="form-control form-control-alternative" value="<?php echo $pembelanjaan->tanggal_pembelanjaan;?>" required>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-2">
                        <a href="<?php echo base_url('index.php/pengeluaran/data/'.$pengajuan->id_pengajuan);?>"><button type="button" class="btn btn-default">Kembali</button></a>
                    </div>
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </div>
                    </div>
                </form>
                </div>
                </div>
                </div>
                </div>

                        </div>
<script>

  $('#jumlah_pembelanjaan').keyup(function(){
  if ($(this).val() >= <?php echo $sisa; ?>){
    alert("Dana melebihi Dana Sisa yaitu <?php echo "Rp " . number_format($sisa + $pembelanjaan->tanggal_pembelanjaan,2,',','.'); ?>");
    $(this).val('<?php echo $sisa + $pembelanjaan->tanggal_pembelanjaan; ?>');
  }
});
</script>