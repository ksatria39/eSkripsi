<section class="section">
  <div class="card">
    <div class="card-body">
      <p class="card-title"><a href="" class="text-black">Semua Judul</a></p>

      <table border="1">
        <tr>
          <th>No.</th>
          <th>Judul</th>
          <th>Mahasiswa</th>
          <th>Aksi</th>
        </tr>
        <?php foreach ($skripsi as $key => $value) : ?>
          <tr>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $value->judul_id; ?></td>
            <td><?php echo $value->mahasiswa; ?></td>
            <td><a href="<?= base_url() ?>/progress_skripsi/admin1" class="btn btn-primary">Progress</a></td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</section>