
<section class="section">
<div class="card">
            <div class="card-body">

              <?php if ($this->session->flashdata('success')):?>
                <div class="alert alert-info alert-dismissible fade show" style="margin-top: 4rem;" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif;?>

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
                <?php $no = 1; foreach($myt as $myt) { ?>
                  <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $myt->judul; ?></td>
                    <td>
                      <?php
                      $dosen1 = $this->db->where('id', $myt->dospem_1_id)->get('users')->row();
                      echo $dosen1->nama;
                      ?>
                    </td>
                    <td>
                      <?php
                      $dosen2 = $this->db->where('id', $myt->dospem_2_id)->get('users')->row();
                      echo $dosen2->nama;
                      ?>
                    </td>
                    <td><?= $myt->status; ?></td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?= $myt->id; ?>">Lihat Detail</button></td>
                  </tr>
<div class="modal fade" id="myModal<?= $myt->id; ?>">
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
                  <span class="col-sm-10"><?= $myt->judul; ?></span>
                </div>
                <div class="row">
                  <span class="col-sm-5"><b>Mahasiswa</b></span>
                  <span class="col-sm-10"><?= $myt->nama_mahasiswa; ?></span>
                </div>
                <hr>
                <div class="row">
                  <span class="col-sm-5"><b>Pembimbing 1</b></span>
                  <span class="col-sm-10">
                      <?php
                      $dosen1 = $this->db->where('id', $myt->dospem_1_id)->get('users')->row();
                      echo $dosen1->nama;
                      ?>
                  </span>
                </div>
                <div class="row">
                  <span class="col-sm-5"><b>Status</b></span>
                  <span class="col-sm-10"><?= $myt->status_dospem_1; ?></span>
                </div>
                <div class="row">
                  <span class="col-sm-5"><b>Keterangan</b></span>
                  <span class="col-sm-10"><?= $myt->alasan_dospem_1; ?></span>
                </div>
                <hr>
                <div class="row">
                  <span class="col-sm-5"><b>Pembimbing 2</b></span>
                  <span class="col-sm-10">
                      <?php
                      $dosen1 = $this->db->where('id', $myt->dospem_1_id)->get('users')->row();
                      echo $dosen1->nama;
                      ?>
                  </span>
                </div>
                <div class="row">
                  <span class="col-sm-5"><b>Status</b></span>
                  <span class="col-sm-10"><?= $myt->status_dospem_2; ?></span>
                </div>
                <div class="row">
                  <span class="col-sm-5"><b>Keterangan</b></span>
                  <span class="col-sm-10"><?= $myt->alasan_dospem_2; ?></span>
                </div>
                <hr>
                <div class="row">
                  <span class="col-sm-5"><b>Status Akhir</b></span>
                  <span class="col-sm-10"><?= $myt->status; ?></span>
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
                  <?php } ?>
                </tbody>
              </table>
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
                <?php $no = 1; foreach($t as $t) { ?>
                  <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $t->judul; ?></td>
                    <td><?= $t->nama_mahasiswa; ?></td>
                    <td>
                      <?php
                      $dosen1 = $this->db->where('id', $t->dospem_1_id)->get('users')->row();
                      echo $dosen1->nama;
                      ?>
                    </td>
                    <td>
                      <?php
                      $dosen2 = $this->db->where('id', $t->dospem_2_id)->get('users')->row();
                      echo $dosen2->nama;
                      ?>
                    </td>
                    <td><?= $t->status; ?></td>
                  </tr>
                  <?php } ?>
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
