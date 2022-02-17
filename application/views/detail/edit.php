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
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          
        </div>

        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Detail Kegiatan</h3>
                </div>
                <div class="col-4 text-right">
                </div>
              </div>
            </div>
            <div class="card-body">
            <form method="post" action="<?php echo base_url('index.php/detail/update');?>">
                <input name="id_kegiatan" type="hidden" class="form-control form-control-alternative" value="<?php echo $id_kegiatan;?>">
                <input name="id_detail" type="hidden" class="form-control form-control-alternative" value="<?php echo $detail->id_detail;?>">
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

                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Informasi Tambahan</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Pelaksana</label>
                        <input style="background-color:white;color:black" type="text" class="form-control form-control-alternative" value="<?php echo $detail->pelaksana;?>" name="pelaksana" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Sasaran</label>
                        <input style="background-color:white;color:black;display:block" type="text" class="form-control form-control-alternative" value="<?php echo $detail->sasaran;?>" name="sasaran" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Lokasi Kegiatan</label>
                        <input style="background-color:white;color:black;display:block" type="text" class="form-control form-control-alternative" value="<?php echo $detail->lokasi;?>" name="lokasi" required>
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
                                <td><input style="background-color:white;color:black" type="text" class="form-control form-control-alternative" value="<?php echo $detail->capaian;?>" name="capaian" required></td>
                                <td><input style="background-color:white;color:black" type="text" class="form-control form-control-alternative" value="<?php echo $detail->target_capaian;?>" name="target_capaian" required></td>
                            </tr>
                            <tr>
                                <th scope="row" rowspan="3">Masukan</th>
                                <td>Sumber Dana</td>
                                <td><input style="background-color:white;color:black" type="text" class="form-control form-control-alternative" value="<?php echo $detail->sumber_dana;?>" name="sumber_dana" required></td>
                            </tr>
                            <tr>
                                <td>Tenaga</td>
                                <td><input style="background-color:white;color:black" type="text" class="form-control form-control-alternative" value="<?php echo $detail->tenaga;?>" name="tenaga" required></td>
                            </tr>
                            <tr>
                                <td>Waktu</td>
                                <td><input style="background-color:white;color:black" type="text" class="form-control form-control-alternative" value="<?php echo $detail->waktu;?>" name="waktu" required></td>
                            </tr>
                            <tr>
                                <th scope="row">Keluaran</th>
                                <td><input style="background-color:white;color:black" type="text" class="form-control form-control-alternative" value="<?php echo $detail->keluaran;?>" name="keluaran" required></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                  </div>
                </div>

                </div>
                <hr class="my-4" />
                <div class="row">
                  <div class="col-md-10">
                  </div>
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
                <hr class="my-4" />
              </form>
            </div>
          </div>
        </div>