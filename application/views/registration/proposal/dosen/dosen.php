
<section class="section">
<div class="card">
            <div class="card-body">

            <ul class="nav nav-tabs mt-3" id="myTabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">Pembimbing 1</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Pembimbing 2</a>
              </li>
              </ul>

              <div class="tab-content mt-2">
                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">

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
                    <th scope="col">NPM</th>
                    <th scope="col">Tanggal Didaftarkan</th>
                    <th scope="col">Naskah</th>
                    <th scope="col">Logbook Bimbingan</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Rancang Bangun Sistem Informasi Skripsi Menggunakan Metode FAST</td>
                    <td>Ksatria Damar Galih</td>
                    <td>1412200017</td>
                    <td>25 Desember 2023</td>
                    <td><button class="btn btn-primary">Unduh</button></td>
                    <td><button class="btn btn-primary">Unduh</button></td>
                    <td>
                        <button type="submit" class="btn btn-primary">Terima</button>
                        <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Tolak</button>
                    </td>
                  </tr>
                </tbody>
              </table>



              </div>
              <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
              
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
                        <button type="submit" class="btn btn-primary">Terima</button>
                        <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Tolak</button>
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
                <h4 class="modal-title">Tolak Judul?</h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
            <div class="form-floating mb-3">
                      <textarea class="form-control" placeholder="Berikan alasan" id="alasan" style="height: 100px;"></textarea>
                      <label for="alasan">Alasan</label>
            </div>
            <center><button type="submit" class="btn btn-danger">Tolak</button></center>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
