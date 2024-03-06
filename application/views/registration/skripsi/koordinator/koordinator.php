
<section class="section">
<div class="card">
            <div class="card-body">

                <div class="d-flex justify-content mt-3">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Cari" aria-label="cari">
                        <button class="btn btn-outline-primary" type="submit">
                            <i class="ri-search-line"></i>
                        </button>
                    </form>
                </div>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Mahasiswa</th>
                    <th scope="col">Tanggal Didaftarkan</th>
                    <th scope="col">Naskah</th>
                    <th scope="col">Logbook Bimbingan</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Sistem Informasi Balbla</td>
                    <td>Amin</td>
                    <td>12/10/2020</td>
                    <td><button class="btn btn-primary">Unduh</button></td>
                    <td><button class="btn btn-primary">Unduh</button></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Terima</button>
                        <a class="btn btn-danger">Tolak</a>
                    </td>
                  </tr>
                </tbody>
              </table>
              </div>
          

            </div>
</div>
</section>

<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Detail</h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
            <form>
                <div class="row mb-3 mt-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
                  <div class="col-sm-10 col-form-label">
                    Sistem Informasi Aku
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Penguji 1</label>
                  <div class="col-sm-10">
                    <select class="form-select w-50" aria-label="Default select example">
                      <option selected="">Pilih Dosen</option>
                      <option value="1">Amaludin Arifia</option>
                      <option value="2">Asfan</option>
                      <option value="3">Alfian</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Penguji 2</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected="">Pilih Dosen</option>
                      <option value="1">Amaludin Arifia</option>
                      <option value="2">Asfan</option>
                      <option value="3">Alfian</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Ruangan</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected="">Pilih Ruang</option>
                      <option value="1">Lab RPL</option>
                      <option value="2">Lab Data Mining</option>
                      <option value="3">Gedung M1</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3 mt-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tanggal</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" placeholder="Pilih Tanggal">
                  </div>
                </div>

                <div class="row mb-3 mt-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Jam</label>
                  <div class="col-sm-10">
                    <input type="time" class="form-control" placeholder="Pilih Tanggal">
                  </div>
                </div>

                  <div class="col-sm-10" align="center">
                    <button type="submit" class="btn btn-primary">Jadwalkan</button>
                  </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>