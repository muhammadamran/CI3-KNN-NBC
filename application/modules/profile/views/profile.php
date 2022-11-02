<!-- Script Provinsi, KabKota, Kecamatan, Kelurahan -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/07323268fb.js"></script>
<!-- Script Provinsi, KabKota, Kecamatan, Kelurahan -->
<style type="text/css">
  .mr-3 {
    border-radius: 50%;
  }
</style>
<!-- CDN Jquery -->
<!--**********************************Content body start***********************************-->
<div class="content-body">
    <div class="col-lg-12 col-xl-12">
      <div class="row page-titles mx-0">
          <div class="col p-md-0">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url('home');?>">Home</a></li>
                  <li class="breadcrumb-item active"><a href="<?= base_url('profile');?>">Profile</a></li>
              </ol>
          </div>
      </div>
    </div>
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center mb-4">
                            <!-- Foto -->
                            <?php 
                            $cek_gender = $this->session->userdata('JenisKelamin');
                            $cek_foto = $this->session->userdata('Foto');
                            ?>
                            <?php if ($cek_gender == NULL) { ?>
                              <?php if ($cek_foto == NULL) { ?>
                                <img src="https://ia601009.us.archive.org/13/items/HeaderIconUser/Header-Icon-User.png" height="80" width="80" alt="">
                              <?php } else { ?>
                                <img src="<?= base_url('assets/images/user/'.$this->session->userdata('Foto'));?>" class="mr-3" height="80" width="80" alt="">
                              <?php } ?>
                            <?php } else if ($cek_gender == '1') { ?>
                              <!-- PRIA -->
                              <?php if ($cek_foto == NULL) { ?>
                                <img src="https://assets.webiconspng.com/uploads/2016/11/avatar_business_costume_male_man_office_work_icon_628289.png" class="mr-3" height="80" width="80" alt="">
                              <?php } else { ?>
                                <img src="<?= base_url('assets/images/user/'.$this->session->userdata('Foto'));?>" class="mr-3" height="80" width="80" alt="">
                              <?php } ?>
                            <?php } else if ($cek_gender == '2') { ?>
                              <!-- WNITA -->
                              <?php if ($cek_foto == NULL) { ?>
                                <img src="https://cdn1.iconfinder.com/data/icons/user-pictures/100/female1-512.png" class="mr-3" height="80" width="80" alt="">
                              <?php } else { ?>
                                <img src="<?= base_url('assets/images/user/'.$this->session->userdata('Foto'));?>" class="mr-3" height="80" width="80" alt="">
                              <?php } ?>
                            <?php } ?>
                            <!-- End Foto -->
                            <div class="media-body">
                                <h3 class="mb-0"><?= $this->session->userdata('GelarDepan'); ?> <?= $this->session->userdata('NamaLengkap'); ?> <?= $this->session->userdata('GelarBelakang'); ?></h3>
                                <p class="text-muted mb-0"><?= $this->session->userdata('NIP'); ?></p>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col">
                                <div class="card card-profile text-center">
                                    <span class="mb-1 text-primary"><i class="icon-star"></i></span>
                                    <h5 class="mb-0"><?= $this->session->userdata('GolonganPegawai'); ?></h5>
                                    <br>
                                    <p class="text-muted px-4">Golongan</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card card-profile text-center">
                                    <span class="mb-1 text-warning"><i class="icon-briefcase"></i></span>
                                    <h5 class="mb-0"><?= $this->session->userdata('NamaDepartemen'); ?></h5>
                                    <br>
                                    <p class="text-muted">Departement</p>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary px-5"><i class="icon-user"></i> Hak Akses: <?= $this->session->userdata('Role'); ?></button>
                            </div>
                        </div>
                        <h4>Alamat</h4>
                        <?php if ($this->session->userdata('nm_provinsi') == NULL) { ?>

                        <?php } else { ?>
                            <p class="text-muted"><?= $this->session->userdata('Alamat'); ?></p>
                            <p class="text-muted" style="text-transform: uppercase;">Kel.<?= $this->session->userdata('nm_kelurahan'); ?>, Kec.<?= $this->session->userdata('nm_kecamatan'); ?>, <?= $this->session->userdata('nm_kotakab'); ?>, <?= $this->session->userdata('nm_provinsi'); ?>  </p>
                        <?php } ?>
                        <ul class="card-profile__info">
                            <li class="mb-1">
                              <strong class="text-dark mr-4">No. Telepon</strong> 
                              <span><?= $this->session->userdata('NoHP'); ?></span>
                            </li>
                            <li><strong class="text-dark mr-4">Email</strong> <span><?= $this->session->userdata('Email'); ?></span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <?php if ($this->session->flashdata('success')) : ?>
                        <hr>
                        <div class="card-content">
                            <div class="alert alert-success">
                              <i class="icon-info"></i> Data <b>Bershasil</b> simpan!, Silahkan <b>Logout</b> dan login kembali untuk merefresh data anda!
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('filed')) : ?>
                        <hr>
                        <div class="card-content">
                            <div class="alert alert-danger">
                              <i class="icon-info"></i> Data <b>Gagal</b> disimpan!, Password Lama anda tidak sesuai!, Periksa Kembali!
                            </div>
                        </div>
                        <?php endif; ?>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs mb-3" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting"><span><i class="icon-user-following"></i> Pengaturan Profile</span></a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#updatefoto"><span><i class="icon-picture"></i> Ganti Foto</span></a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#changepassword"><span><i class="icon-lock"></i> Ganti Password</span></a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content tabcontent-border">
                          <div class="tab-pane fade show active" id="setting" role="tabpanel">
                            <div class="basic-form">
                              <form method="POST" action="<?= base_url('profile/updating')?>" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Username</label>
                                        <input type="text" class="form-control" placeholder="Username" value="<?= $this->session->userdata('username'); ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Hak Akses</label>
                                        <input type="text" class="form-control" placeholder="Username" value="<?= $this->session->userdata('Role'); ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>NIK</label>
                                        <input type="hidden" name="username" value="<?= $this->session->userdata('username'); ?>">
                                        <input type="text" class="form-control" placeholder="NIK" name="NIK" value="<?= $this->session->userdata('NIK'); ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>NIP</label>
                                        <input type="text" class="form-control" placeholder="NIP" name="NIP" value="<?= $this->session->userdata('NIP'); ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Gelar Depan</label>
                                        <input type="text" class="form-control" placeholder="Gelar Depan" name="GelarDepan" value="<?= $this->session->userdata('GelarDepan'); ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" placeholder="Nama Lengkap" name="NamaLengkap" value="<?= $this->session->userdata('NamaLengkap'); ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Gelar Belakang</label>
                                        <input type="text" class="form-control" placeholder="Gelar Belakang" name="GelarBelakang" value="<?= $this->session->userdata('GelarBelakang'); ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control" name="JenisKelamin">
                                          <?php if ($this->session->userdata('JenisKelamin') == '1') { ?>
                                            <option value="<?= $this->session->userdata('JenisKelamin'); ?>">Pria</option>
                                          <?php } else if ($this->session->userdata('JenisKelamin') == '2') { ?>
                                            <option value="<?= $this->session->userdata('JenisKelamin'); ?>">Wanita</option>
                                          <?php } ?>
                                          <option value="">-- Pilih Jenis Kelamin --</option>
                                          <option value="1">Pria</option>
                                          <option value="2">Wanita</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Tempat Lahir</label>
                                        <input type="text" class="form-control" placeholder="Tempat Lahir" name="TempatLahir" value="<?= $this->session->userdata('TempatLahir'); ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" id="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" name="TanggalLahir" value="<?= $this->session->userdata('TanggalLahir'); ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Usia</label>
                                        <input type="text" id="umur" class="form-control" name="Usia" value="<?= $this->session->userdata('Usia'); ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Agama</label>
                                        <?php if ($this->session->userdata('Agama') == NULL) { ?>
                                            <select class="form-control" name="Agama">
                                              <option value="">-- Pilih Agama --</option>
                                              <option value="Islam">Islam</option>
                                              <option value="Kristen">Kristen</option>
                                              <option value="Khatolik">Khatolik</option>
                                              <option value="Hindu">Hindu</option>
                                              <option value="Budha">Budha</option>
                                              <option value="Konghuchu">Konghuchu</option>
                                            </select>
                                        <?php } else { ?>
                                            <select class="form-control" name="Agama">
                                              <option value="<?= $this->session->userdata('Agama'); ?>"><?= $this->session->userdata('Agama'); ?></option>
                                              <option value="">-- Pilih Agama --</option>
                                              <option value="Islam">Islam</option>
                                              <option value="Kristen">Kristen</option>
                                              <option value="Khatolik">Khatolik</option>
                                              <option value="Hindu">Hindu</option>
                                              <option value="Budha">Budha</option>
                                              <option value="Konghuchu">Konghuchu</option>
                                            </select>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Status Nikah</label>
                                        <?php if ($this->session->userdata('StatusNikah') == NULL) { ?>
                                            <select class="form-control" name="StatusNikah">
                                              <option value="">-- Pilih Status Nikah --</option>
                                              <option value="Belum Kawin">Belum Kawin</option>
                                              <option value="Kawin">Kawin</option>
                                              <option value="Cerai Hidup">Cerai Hidup</option>
                                              <option value="Cerai Mati">Cerai Mati</option>
                                            </select>
                                        <?php } else { ?>
                                            <select class="form-control" name="StatusNikah">
                                              <option value="<?= $this->session->userdata('StatusNikah'); ?>"><?= $this->session->userdata('StatusNikah'); ?></option>
                                              <option value="">-- Pilih Status Nikah --</option>
                                              <option value="Belum Kawin">Belum Kawin</option>
                                              <option value="Kawin">Kawin</option>
                                              <option value="Cerai Hidup">Cerai Hidup</option>
                                              <option value="Cerai Mati">Cerai Mati</option>
                                            </select>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Golongan Darah</label>
                                        <?php if ($this->session->userdata('GolonganDarah') == NULL) { ?>
                                            <select class="form-control" name="GolonganDarah">
                                              <option value="">-- Pilih Golongan Darah --</option>
                                              <option value="A">A</option>
                                              <option value="B">B</option>
                                              <option value="AB">AB</option>
                                              <option value="O">O</option>
                                            </select>
                                        <?php } else { ?>
                                            <select class="form-control" name="GolonganDarah">
                                              <option value="<?= $this->session->userdata('GolonganDarah'); ?>"><?= $this->session->userdata('GolonganDarah'); ?></option>
                                              <option value="">-- Pilih Golongan Darah --</option>
                                              <option value="A">A</option>
                                              <option value="B">B</option>
                                              <option value="AB">AB</option>
                                              <option value="O">O</option>
                                            </select>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Departemen</label>
                                        <input type="text" class="form-control" placeholder="Departemen" name="DepartemenID" value="<?= $this->session->userdata('NamaDepartemen'); ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Status Pegawai</label>
                                        <input type="text" class="form-control" placeholder="Status Pegawai" name="StatusPegawai" value="<?= $this->session->userdata('StatusPegawai'); ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Tanggal Masuk</label>
                                        <input type="date" class="form-control" placeholder="Tanggal Masuk" name="Tgl_Masuk" value="<?= $this->session->userdata('Tgl_Masuk'); ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php if ($this->session->userdata('StatusPegawai') == 'Aktif') { ?>
                                          <label>Tanggal Keluar</label>
                                          <input type="text" class="form-control" placeholder="Status Masih Aktif" name="Tgl_Keluar" value="<?= $this->session->userdata('Tgl_Keluar'); ?>" readonly>
                                        <?php } else { ?>
                                          <label>Tanggal Keluar</label>
                                          <input type="date" class="form-control" placeholder="Tanggal Keluar" name="Tgl_Keluar" value="<?= $this->session->userdata('Tgl_Keluar'); ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" name="Alamat" placeholder="Alamat Lengakap" rows="8" cols="80"><?= $this->session->userdata('Alamat'); ?></textarea>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label>Provinsi</label>
                                        <?php if ($this->session->userdata('nm_provinsi') == NULL) { ?>
                                            <select class="form-control" id="provinsi" name="Provinsi">
                                              <option value="">Pilih Provinsi</option>
                                              <?php
                                                foreach ($provinsi as $row) {
                                                    echo '<option value="' . $row->id . '">' . $row->name . '</option>';
                                                }
                                              ?>
                                            </select>
                                        <?php } else { ?>
                                            <select class="form-control" id="provinsi" name="Provinsi">
                                              <option value="<?= $this->session->userdata('id_provinsi'); ?>"><?= $this->session->userdata('nm_provinsi'); ?></option>
                                              <option value="">Pilih Provinsi</option>
                                              <?php
                                                foreach ($provinsi as $row) {
                                                    echo '<option value="' . $row->id . '">' . $row->name . '</option>';
                                                }
                                              ?>
                                            </select>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Kota/Kabupaten</label>
                                        <?php if ($this->session->userdata('nm_kotakab') == NULL) { ?>
                                            <select class="form-control" id="kabupaten" name="KotaKab">
                                              <option value="">Pilih Kabupaten</option>
                                              <?php

                                              ?>
                                            </select>
                                        <?php } else { ?>
                                            <select class="form-control" id="kabupaten" name="KotaKab">
                                              <option value="<?= $this->session->userdata('id_kotakab'); ?>"><?= $this->session->userdata('nm_kotakab'); ?></option>
                                              <option value="">Pilih Kabupaten</option>
                                              <?php

                                              ?>
                                            </select>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Kecamatan</label>
                                        <?php if ($this->session->userdata('nm_kecamatan') == NULL) { ?>
                                            <select class="form-control" id="kecamatan" name="Kecamatan">
                                              <option value="">Pilih Kecamatan</option>
                                              <?php

                                              ?>
                                            </select>
                                        <?php } else { ?>
                                            <select class="form-control" id="kecamatan" name="Kecamatan">
                                              <option value="<?= $this->session->userdata('id_kecamatan'); ?>"><?= $this->session->userdata('nm_kecamatan'); ?></option>
                                              <option value="">Pilih Kecamatan</option>
                                              <?php

                                              ?>
                                            </select>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Kelurahan</label>
                                        <?php if ($this->session->userdata('nm_kelurahan') == NULL) { ?>
                                            <select class="form-control" id="kelurahan" name="Kelurahan">
                                              <option value="">-- Pilih Kelurahan --</option>
                                              <?php

                                              ?>
                                            </select>
                                        <?php } else { ?>
                                            <select class="form-control" id="kelurahan" name="Kelurahan">
                                              <option value="<?= $this->session->userdata('id_kelurahan'); ?>"><?= $this->session->userdata('nm_kelurahan'); ?></option>
                                              <option value="">-- Pilih Kelurahan --</option>
                                              <?php

                                              ?>
                                            </select>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label>Kode POS</label>
                                        <input type="text" class="form-control" placeholder="Kode POS" name="KodePOS" value="<?= $this->session->userdata('KodePOS'); ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="Email" name="Email" value="<?= $this->session->userdata('Email'); ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>No.Telepon Rumah</label>
                                        <input type="text" class="form-control" placeholder="No.Telepon Rumah" name="NoTlpRumah" value="<?= $this->session->userdata('NoTlpRumah'); ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>No.Telepon</label>
                                        <input type="text" class="form-control" placeholder="No.Telepon" name="NoHP" value="<?= $this->session->userdata('NoHP'); ?>">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                              </form>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="updatefoto" role="tabpanel">
                            <form method="POST" action="<?= base_url('profile/changefoto')?>" enctype="multipart/form-data">
                              <center>
                                <!-- Foto -->
                                <?php 
                                $cek_gender = $this->session->userdata('JenisKelamin');
                                $cek_foto = $this->session->userdata('Foto');
                                ?>
                                <?php if ($cek_gender == NULL) { ?>
                                  <?php if ($cek_foto == NULL) { ?>
                                    <img src="https://ia601009.us.archive.org/13/items/HeaderIconUser/Header-Icon-User.png" height="150" width="150" alt="">
                                  <?php } else { ?>
                                    <img src="<?= base_url('assets/images/user/'.$this->session->userdata('Foto'));?>" class="mr-3" height="150" width="150" alt="">
                                  <?php } ?>
                                <?php } else if ($cek_gender == '1') { ?>
                                  <!-- PRIA -->
                                  <?php if ($cek_foto == NULL) { ?>
                                    <img src="https://assets.webiconspng.com/uploads/2016/11/avatar_business_costume_male_man_office_work_icon_628289.png" class="mr-3" height="150" width="150" alt="">
                                  <?php } else { ?>
                                    <img src="<?= base_url('assets/images/user/'.$this->session->userdata('Foto'));?>" class="mr-3" height="150" width="150" alt="">
                                  <?php } ?>
                                <?php } else if ($cek_gender == '2') { ?>
                                  <!-- WNITA -->
                                  <?php if ($cek_foto == NULL) { ?>
                                    <img src="https://cdn1.iconfinder.com/data/icons/user-pictures/100/female1-512.png" class="mr-3" height="150" width="150" alt="">
                                  <?php } else { ?>
                                    <img src="<?= base_url('assets/images/user/'.$this->session->userdata('Foto'));?>" class="mr-3" height="150" width="150" alt="">
                                  <?php } ?>
                                <?php } ?>
                                <!-- End Foto -->
                              </center>
                              <label class="form-label" for="Foto">Foto</label>
                                <input type="file" name="foto" class="form-control" id="Foto" placeholder="Foto" required>
                                <input type="hidden" name="username" value="<?= $this->session->userdata('username'); ?>">
                                <input type="hidden" name="id_pegawai" value="<?= $this->session->userdata('id_pegawai'); ?>">
                                <small style="color: red;"><i> Format File : JPG | JPEG | PNG</i></small>
                              <br>
                              <small style="color: red;"><i> Jika Anda memiliki file yang ingin Anda unggah, pastikan file tersebut di bawah Maksimum 2MB</i></small>
                              <br><br>
                              <button type="submit" class="btn btn-primary">Ganti Foto</button>
                            </form>
                          </div>
                          <div class="tab-pane fade" id="changepassword" role="tabpanel">
                            <div class="p-t-15">
                              <form method="POST" action="<?= base_url('profile/gantipassword')?>" enctype="multipart/form-data">
                                  <div class="form-group row">
                                      <label class="col-lg-4 col-form-label" for="val-password">Password Lama <span class="text-danger">*</span>
                                      </label>
                                      <div class="col-lg-6">
                                          <input type="password" class="form-control" id="val-password" name="oldpassword" placeholder="Password Lama" required="required">
                                          <input type="hidden" name="username" value="<?= $this->session->userdata('username'); ?>">
                                          <input type="hidden" name="id_pegawai" value="<?= $this->session->userdata('id_pegawai'); ?>">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label class="col-lg-4 col-form-label" for="Password">Password Baru <span class="text-danger">*</span>
                                      </label>
                                      <div class="col-lg-6">
                                          <input type="password" class="form-control" id="Password" name="newpassword" placeholder="Password Baru" required="required">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label class="col-lg-4 col-form-label" for="ConfirmPassword">Konfirmasi Password <span class="text-danger">*</span>
                                      </label>
                                      <div class="col-lg-6">
                                          <input type="password" class="form-control" id="ConfirmPassword" name="confirmpassword" placeholder="Konfirmasi Password" required="required">
                                          <span id="CheckPasswordMatch" style="margin-top: -35px;font-style:italic;"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-lg-8 ml-auto">
                                          <button type="submit" class="btn btn-primary">Ganti Password</button>
                                      </div>
                                  </div>
                              </form>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************Content body end***********************************-->
<script type="text/javascript">
    $(document).ready(function() {
        //request data kabupaten
        $('#provinsi').change(function() {
            var provinsi_id = $('#provinsi').val(); //ambil value id dari provinsi
            if (provinsi_id != '') {
                $.ajax({
                    url: '<?= base_url(); ?>dynamic_dependent/get_kabupaten',
                    method: 'POST',
                    data: {
                        provinsi_id: provinsi_id
                    },
                    success: function(data) {
                        $('#kabupaten').html(data)
                    }
                });
            }
        });

        //request data kecamatan
        $('#kabupaten').change(function() {
            var kabupaten_id = $('#kabupaten').val(); // ambil value id dari kabupaten
            if (kabupaten_id != '') {
                $.ajax({
                    url: '<?= base_url(); ?>/dynamic_dependent/get_kecamatan',
                    method: 'POST',
                    data: {
                        kabupaten_id: kabupaten_id
                    },
                    success: function(data) {
                        $('#kecamatan').html(data)
                    }
                });
            }
        });

        //request data kelurahan
        $('#kecamatan').change(function() {
            var kecamatan_id = $('#kecamatan').val(); // ambil value id dari kecamatan
            if (kecamatan_id != '') {
                $.ajax({
                    url: '<?= base_url(); ?>dynamic_dependent/get_kelurahan',
                    method: 'POST',
                    data: {
                        kecamatan_id: kecamatan_id
                    },
                    success: function(data) {
                        $('#kelurahan').html(data)
                    }
                });
            }
        });
    });
</script>
<!-- Validate Password And Confirm Password -->
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <script type="text/javascript">
   $(document).ready(function () {
      $("#ConfirmPassword").on('keyup', function(){
      var password = $("#Password").val();
      var confirmPassword = $("#ConfirmPassword").val();
      if (password != confirmPassword)
         $("#CheckPasswordMatch").html("Kata sandi tidak sama!").css("color","red");
      else
         $("#CheckPasswordMatch").html("Kata sandi sama!").css("color","green");
      });
   });
   </script>
<!-- End Validate Password And Confirm Password -->
<!-- Cek Usia -->
<link href="<?= base_url('assets/otomatic/jquery-ui.css');?>" rel="stylesheet">
<script src="<?= base_url('assets/otomatic/jquery-ui.js');?>"></script>
<script type="text/javascript">
    $(function() {
        $( "#tgl_lahir" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    });
    window.onload=function(){
        $('#tgl_lahir').on('change', function() {

            var dob = new Date(this.value);
            var today = new Date();
            var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
            $('#umur').val(age);
        });
    }
</script>