<?php 
require 'functions.php';
require 'header.php';


$gurus = query("SELECT * FROM guru");
?>
<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="mb-2 page-title">Data Guru</h2>
              <button type="button" class="btn mb-2 btn-success" data-toggle="modal" data-target="#varyModal" data-whatever="@mdo">Tambah data Guru</button>
              
              <!--Modal Tambah Data  -->

              <div class="modal fade" id="varyModal" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="varyModalLabel">Tambah data guru baru</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form method="post" action=""enctype="multipart/form-data">
                              <div class="modal-body">
                                  <div class="form-group">
                                    <label for="nama" class="col-form-label">Nama:</label>
                                    <input type="text" name="nama" class="form-control" id="nama">
                                  </div>
                                  <div class="form-group">
                                    <label for="mapel" class="col-form-label">Mapel:</label>
                                    <input type="text" name="mapel" class="form-control" id="mapel">
                                  </div>
                                  <div class="form-group">
                                    <label for="gambar">Upload gambar</label>
                                    <input type="file" name="gambar" id="gambar" class="form-control-file">
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Keluar</button>
                                  <button type="submit" name="btnTambahData" class="btn mb-2 btn-primary">Tambah data</button>
                                </div>
                            </div>
                          </form>
                        </div>
                      </div>
              <div class="row my-4">

                <!-- Akhir Modal Tambah Data -->


                <!-- Small table -->
                <div class="col-md-12">
                  <div class="card shadow">
                    <div class="card-body">
                      <!-- table -->
                      <table class="table datatables" id="dataTable-1">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Mapel</th>
                            <th>Gambar</th>
                            <th>Tombol</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $n=1 ?>
                            <?php foreach($gurus as $guru): ?>
                                <tr>
                                <td><?= $n; ?></td>
                                <td><?= $guru["nama"]; ?></td>
                                <td><?= $guru["mapel"]; ?></td>
                                <td>
                                  <img height="150" width="150" src="img/<?= $guru["gambar"]; ?>" alt=""></td>
                                <td>
                                    <a class="btn btn-warning" data-toggle="modal" data-target="#ubah<?=$n; ?>" href="#">Ubah</a>
                                    <a class="btn btn-danger" data-toggle="modal" data-target="#hapus<?=$n; ?>" href="#">Hapus</a>
                                </td>
                            </tr>
                      <!-- MODAL UBAH DATA -->
                      <div class="modal fade" id="ubah<?=$n;?>" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="varyModalLabel">Ubah data guru baru</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form method="post" action=""enctype="multipart/form-data">
                              <div class="modal-body">
                                <input type="hidden" name="id_guru" value="<?= $guru["id"];?>">
                                  <div class="form-group">
                                    <label for="unama" class="col-form-label">Nama:</label>
                                    <input type="text" name="unama" class="form-control" id="unama" value="<?= $guru["nama"]; ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="umapel" class="col-form-label">Mapel:</label>
                                    <input type="text" name="umapel" class="form-control" id="umapel" value="<?= $guru["mapel"]; ?>">
                                  </div>
                                  <div class="form-group">
                                    <label> gambar : </label>
                                    <input type="hidden" name="gambarlama" value="<?= $guru["gambar"]; ?>">
                                    <img width="50" height="50" src="img/<?= $guru["gambar"]; ?>" alt="">
                                  </div>
                                  <div class="form-group">
                                    <label for="gambar">Upload gambar</label>
                                    <input type="file" name="gambar" id="gambar" class="form-control-file">
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Keluar</button>
                                  <button type="submit" name="btnUbahData" class="btn mb-2 btn-primary">Simpan</button>
                                </div>
                            </div>
                          </form>
                        </div>
                      </div>
                      <!-- MODAL UBAH DATA -->
                      <!-- MODAL HAPUS -->
                      <div class="modal fade" id="hapus<?=$n;?>" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="varyModalLabel">Konfirmasi Hapus Data</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form method="post" action=""enctype="multipart/form-data">
                            <input type="hidden" name="id_guru" value="<?= $guru["id"];?>">
                              <div class="modal-body">
                                 <p>Apakah anda yakin menghapus <span style="color:red;"> <?= $guru["nama"];?></span> !</p>
                              </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Keluar</button>
                                  <button type="submit" name="btnHapusData" class="btn mb-2 btn-danger">Yakin</button>
                                </div>
                            </div>
                          </form>
                        </div>
                      </div>
                      <!-- MODAL HAPUS -->
                            <?php $n++; ?>
                            <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div> <!-- simple table -->
              </div> <!-- end section -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="list-group list-group-flush my-n3">
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-box fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Package has uploaded successfull</strong></small>
                        <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                        <small class="badge badge-pill badge-light text-muted">1m ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-download fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Widgets are updated successfull</strong></small>
                        <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
                        <small class="badge badge-pill badge-light text-muted">2m ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-inbox fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Notifications have been sent</strong></small>
                        <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                        <small class="badge badge-pill badge-light text-muted">30m ago</small>
                      </div>
                    </div> <!-- / .row -->
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-link fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Link was attached to menu</strong></small>
                        <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                        <small class="badge badge-pill badge-light text-muted">1h ago</small>
                      </div>
                    </div>
                  </div> <!-- / .row -->
                </div> <!-- / .list-group -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body px-5">
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-success justify-content-center">
                      <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Control area</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Activity</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Droplet</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Upload</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-users fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Users</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Settings</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php 
        if(isset($_POST["btnTambahData"])){
          if (tambah($_POST) > 0){
              echo "
              <script>
              alert('data berhasil di tambahkan!');
              document.location.href = 'guru.php';
              </script>
              ";
          }else{
              echo "
              <script>
              alert('data gagal di tambahkan!');
              document.location.href = 'guru.php'
              </script>
              ";
          }
        }
        if(isset($_POST["btnUbahData"])){
          if (tambahGuru($_POST) > 0){
              echo "
              <script>
              alert('data berhasil di ubah!');
              document.location.href = 'guru.php';
              </script>
              ";
          }else{
              echo "
              <script>
              alert('data gagal di ubah!');
              document.location.href = 'guru.php'
              </script>
              ";
          }
        }
        if(isset($_POST["btnHapusData"])){
          if (hapusGuru($_POST) > 0){
              echo "
              <script>
              alert('data berhasil di hapus!');
              document.location.href = 'guru.php';
              </script>
              ";
          }else{
              echo "
              <script>
              alert('data gagal di hapus!');
              document.location.href = 'guru.php'
              </script>
              ";
          }
        }
        ?>

        <?php 
        if(isset($_POST["btnTambahData"])){
          aksi("tambahGuru","Tambahkan","guru.php");
        }
        
        if(isset($_POST["btnUbahData"])){
          aksi("ubahGuru","Ubah","guru.php");
        }
        if(isset($_POST["btnHapusData"])){
          aksi("hapusGuru","Hapus","guru.php");
        }
        ?>
      </main> <!-- main -->
<?php require 'footer.php' ?>