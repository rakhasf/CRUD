<?php
require 'header.php';
require 'functions.php';

$siswas = query("SELECT * FROM siswa");
?>

<main role="main" class="main-content">
    <button class="btn btn-success name="btnTambahData>Create</button>
    <!-- Modal Tambah Data -->

    <div class="modal fade" id="varyModal" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="varyModalLabel">Tambah data siswa baru</h5>
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
                                    <label for="kelas" class="col-form-label">Kelas:</label>
                                    <input type="text" name="kelas" class="form-control" id="kelas">
                                    <select name="kelas" id="kelas">
                                        <option value="X RPL">X RPL</option>
                                        <option value="X TKJ">X TKJ</option>
                                        <option value="X DMM">X DMM</option>
                                        <option value="XI RPL A">XI RPL A</option>
                                        <option value="XI RPL B">XI RPL B</option>
                                        <option value="XI TKJ">XI TKJ</option>
                                        <option value="XI DMM">XI DMM</option>
                                        <option value="XII RPL BIMBEL 1">XII RPL BIMBEL 1</option>
                                        <option value="XII RPL BIMBEL 2">XII RPL BIMBEL 2</option>
                                        <option value="XII TKJ BIMBEL 1">XII TKJ BIMBEL 1</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="statuss" class="col-form-label">Status:</label>
                                    <input type="text" name="statuss" class="form-control" id="statuss">
                                    <select name="statuss" id="statuss">
                                        <option value="Di Sekolah">Di Sekolah</option>
                                        <option value="Izin">Izin</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Pulang">Pulang</option>
                                        <option value="IDN Mengajar">IDN Mengajar</option>
                                        <option value="PKL">PKL</option>
                                    </select>
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
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Foto</th>
      <th scope="col">Kelas</th>
      <th scope="col">Status</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
</main>
<?php require 'footer.php';?>