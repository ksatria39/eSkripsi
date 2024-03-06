
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
              <li class="nav-item">
                <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Penguji 1</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Penguji 2</a>
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
                    <th scope="col">Tanggal ujian</th>
                    <th scope="col">Ruang</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Rancang Bangun Sistem Informasi Skripsi Menggunakan Metode FAST</td>
                    <td>Ksatria Damar Galih</td>
                    <td>2 Januari 2024</td>
                    <td>Laboratorium RPL</td>
                    <td>09.00</td>
                    <td>
                        <a type="submit" class="btn btn-primary" href="<?= base_url() ?>score_skripsi/dosen2">Nilai</a>
                    </td>
                  </tr>
                </tbody>
              </table>
              <!-- End Default Table Example -->
</div>
</div>
            </div>
          </div>
</section>
