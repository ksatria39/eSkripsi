
<section class="section">
<div class="card">
            <div class="card-body">

              <?php if ($this->session->flashdata('success')):?>
                <div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif;?>

              <?php if ($this->session->flashdata('denied')):?>
                <div class="alert alert-secondary alert-dismissible fade show mt-3" role="alert">
                <?php echo $this->session->flashdata('denied'); ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif;?>

                <?php if (empty($titleKo)) { ?>
                  <p>Tidak ada judul yang menunggu persetujuan.</p>
                <?php } else { ?>

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
                    <th scope="col">Pembimbing 1</th>
                    <th scope="col">Status Pembimbing 1</th>
                    <th scope="col">Pembimbing 2</th>
                    <th scope="col">Status Pembimbing 2</th>
                    <th scope="col">Detail</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach($titleKo as $titleKo) { ?>
                  <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $titleKo->judul; ?></td>
                    <td>
                      <?php
                        $mahasiswa = $this->db->where('id', $titleKo->mahasiswa)->get('users')->row();
                        echo $mahasiswa->nama;
                      ?>
                    </td>
                    <td>
                      <?php
                        $dosen1 = $this->db->where('id', $titleKo->dospem_1_id)->get('users')->row();
                        echo $dosen1->nama;
                      ?>
                    </td>
                    <td><?= $titleKo->status_dospem_1; ?></td>
                    <td>
                      <?php
                        $dosen2 = $this->db->where('id', $titleKo->dospem_2_id)->get('users')->row();
                        echo $dosen2->nama;
                      ?>
                    </td>
                    <td><?= $titleKo->status_dospem_2; ?></td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?= $titleKo->id; ?>">Lihat Detail</button></td>
                    <td>
                      <form action="<?= base_url('title/accTitle'); ?>" method="post">
                        <input type="hidden" id="id" name="id" value="<?= $titleKo->id; ?>"></input>
                        <button type="submit" class="btn btn-primary">Terima</button>
                      </form>
                      <form action="<?= base_url('title/deTitle'); ?>" method="post">
                        <input type="hidden" id="id" name="id" value="<?= $titleKo->id; ?>"></input>
                        <button type="submit" class="btn btn-danger">Tolak</button>
                      </form>
                    </td>
                  </tr>
<div class="modal fade" id="myModal<?= $titleKo->id; ?>">
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
                  <span class="col-sm-10"><?= $titleKo->judul; ?></span>
                </div>
                <div class="row">
                  <span class="col-sm-5"><b>Mahasiswa</b></span>
                  <span class="col-sm-10">
                    <?php
                      $mahasiswa = $this->db->where('id', $titleKo->mahasiswa)->get('users')->row();
                      echo $mahasiswa->nama;
                    ?>
                  </span>
                </div>
                <hr>
                <div class="row">
                  <span class="col-sm-5"><b>Pembimbing 1</b></span>
                  <span class="col-sm-10">
                    <?php
                      $dosen1 = $this->db->where('id', $titleKo->dospem_1_id)->get('users')->row();
                      echo $dosen1->nama;
                    ?>
                  </span>
                </div>
                <div class="row">
                  <span class="col-sm-5"><b>Status</b></span>
                  <span class="col-sm-10"><?= $titleKo->status_dospem_1; ?></span>
                </div>
                <div class="row">
                  <span class="col-sm-5"><b>Keterangan</b></span>
                  <span class="col-sm-10"><?= $titleKo->alasan_dospem_1; ?></span>
                </div>
                <hr>
                <div class="row">
                  <span class="col-sm-5"><b>Pembimbing 2</b></span>
                  <span class="col-sm-10">
                    <?php
                      $dosen2 = $this->db->where('id', $titleKo->dospem_2_id)->get('users')->row();
                      echo $dosen2->nama;
                    ?>
                  </span>
                </div>
                <div class="row">
                  <span class="col-sm-5"><b>Status</b></span>
                  <span class="col-sm-10"><?= $titleKo->status_dospem_2; ?></span>
                </div>
                <div class="row">
                  <span class="col-sm-5"><b>Keterangan</b></span>
                  <span class="col-sm-10"><?= $titleKo->alasan_dospem_2; ?></span>
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
              <?php } ?>
              
            </div>
          </div>
</section>
