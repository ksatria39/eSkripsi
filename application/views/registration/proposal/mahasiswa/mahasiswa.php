
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

              <table class="table mt-3">
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
                    <td>Rancang Bangun Sistem Informasi Skripsi Menggunakan Metode FAST</td>
                    <td>Asfan Muqtadir, S.Kom., M.Kom.</td>
                    <td>Alfian Nurlifa, S.Kom., M.Kom.</td>
                    <td>Diverifikasi</td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Lihat Detail</button></td>
                  </tr>
                </tbody>
              </table>
              <!-- End Default Table Example -->

              
              <a class="btn btn-primary position-absolute top-0 end-0 m-3" href="<?= base_url()?>registration_proposal/mahasiswa2" style="border-radius: 15px;">
                <i class="ri-add-line"></i>Tambah
              </a>
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
                <hr>
                <div class="row">
                  <span class="col-sm-5"><b>Pembimbing 2</b></span>
                  <span class="col-sm-10">Andik Adi Suryanto, S.T. M.T.</span>
                </div>
                <div class="row">
                  <span class="col-sm-5"><b>Status</b></span>
                  <span class="col-sm-10">Ditolak</span>
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