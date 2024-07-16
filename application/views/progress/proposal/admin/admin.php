<section class="section">
<div class="card">
            <div class="card-body">
              <p class="card-title"><a href="" class="text-black">Semua Judul</a></p>
              <!-- Default Table 
              
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
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Sistem Informasi Balbla</td>
                    <td>Amin</td>
                    <td><a href="<?= base_url()?>/progress_proposal/admin1" class="btn btn-primary" style="border-radius: 10px;" type="submit">progress</a></td>
                  </tr>
                </tbody>
              </table>
               End Default Table Example -->
              

    <table border="1">
    <tr>
        <th>No.</th>
        <th>Judul</th>
        <th>Mahasiswa</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($proposals as $key => $value): ?>
    <tr>
        <td><?php echo $key + 1; ?></td>
        <td><?php echo $value->judul_id; ?></td>
        <td><?php echo $value->mahasiswa; ?></td>
        <td><a href="<?= base_url()?>/progress_proposal/admin1" class="btn btn-primary">Progress</a></td>
    </tr>
    <?php endforeach; ?>
</table>
            </div>
          </div>
</section>