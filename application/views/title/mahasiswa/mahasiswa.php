
<section class="section">
<div class="card">
            <div class="card-body">
            <ul class="nav nav-tabs mt-3" id="myTabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">Judul Saya</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Semua Judul</a>
              </li>
              </ul>

              <div class="tab-content mt-2">
                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                  
                <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Pembimbing 1</th>
                    <th scope="col">Pembimbing 2</th>
                    <th scope="col">Status</th>
                    <th scope="col">Detail</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Sistem Informasi Balbla</td>
                    <td>Halo</td>
                    <td>Halo</td>
                    <td>Sedang Diproses</td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Lihat Detail</button></td>
                  </tr>
                </tbody>
              </table>

<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Detail</h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="row">
                  <span class="col-sm-5"><b>Judul</b></span>
                  <span class="col-sm-10">Sistem Informasi Balbla</span>
                </div>
                <div class="row">
                  <span class="col-sm-5"><b>Mahasiswa</b></span>
                  <span class="col-sm-10">Muhammad Amin (1412100017)</span>
                </div>
                <hr>
                <div class="row">
                  <span class="col-sm-5"><b>Pembimbing 1</b></span>
                  <span class="col-sm-10">Amaludin Arifia, S.Kom. M.Kom.</span>
                </div>
                <div class="row">
                  <span class="col-sm-5"><b>Status</b></span>
                  <span class="col-sm-10">Diterima</span>
                </div>
                <div class="row">
                  <span class="col-sm-5"><b>Keterangan</b></span>
                  <span class="col-sm-10">Sangat Bagus</span>
                </div>
                <hr>
                <div class="row">
                  <span class="col-sm-5"><b>Pembimbing 2</b></span>
                  <span class="col-sm-10">Andik Adi Suryanto, S.T. M.T.</span>
                </div>
                <div class="row">
                  <span class="col-sm-5"><b>Status</b></span>
                  <span class="col-sm-10">Ditolak</span>
                </div>
                <div class="row">
                  <span class="col-sm-5"><b>Keterangan</b></span>
                  <span class="col-sm-10">Sudah pernah dilakukan</span>
                </div>
                <hr>
                <div class="row">
                  <span class="col-sm-5"><b>Status Akhir</b></span>
                  <span class="col-sm-10">Sedang Diproses</span>
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

                </div>
                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                  
                <div class="d-flex justify-content">
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
                    <th scope="col">Pembimbing 1</th>
                    <th scope="col">Pembimbing 2</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Sistem Informasi Balbla</td>
                    <td>Amin</td>
                    <td>Halo</td>
                    <td>Halo</td>
                    <td>Diverifikasi</td>
                  </tr>
                </tbody>
              </table>

                </div>
              </div>
              <!-- Default Table -->
              <!--
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Mahasiswa</th>
                    <th scope="col">Pembimbing 1</th>
                    <th scope="col">Pembimbing 2</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Sistem Informasi Balbla</td>
                    <td>Amin</td>
                    <td>Halo</td>
                    <td>Halo</td>
                    <td>Diverifikasi</td>
                  </tr>
                </tbody>
              </table>
              -->

            <a class="btn btn-primary position-absolute top-0 end-0 m-3" href="<?= base_url()?>title/mahasiswa2" style="border-radius: 15px;">
              <i class="ri-add-line"></i>
              Tambah
            </a>
              
            </div>
          </div>
</section>
