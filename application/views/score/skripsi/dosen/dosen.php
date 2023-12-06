
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
                    <th scope="col">Tanggal ujian</th>
                    <th scope="col">Ruang</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Sistem Informasi Balbla</td>
                    <td>Amin</td>
                    <td>12/10/2020</td>
                    <td>Lab RPL</td>
                    <td>
                        <a type="submit" class="btn btn-primary" href="<?= base_url() ?>score_skripsi/dosen2">Nilai</a>
                    </td>
                  </tr>
                </tbody>
              </table>
              <!-- End Default Table Example -->
              
            </div>
          </div>
</section>
