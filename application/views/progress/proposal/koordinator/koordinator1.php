<html>
<section class="section">
  <div class="card">
    <div class="card-body">
      <div class="tab-content pt-2">

        <div class="tab-pane fade profile-overview active show" id="profile-overview" role="tabpanel">

          <table class="table">
            <thead>
              <tr>
                <th>Tanggal</th>
                <th>Judul</th>
                <th>Pembimbing</th>
                <th>Bab</th>
                <th>Pembahasan</th>
                <th>Bukti Bimbingan</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data_proposal as $row) : ?>
                <tr>
                  <td><?php echo date('l, d F Y', strtotime($row->tanggal)); ?></td>
                  <td><?php echo $row->judul; ?></td>
                  <td><?php echo $row->nama_pembimbing; ?></td>
                  <td><?php echo $row->bab; ?></td>
                  <td><?php echo $row->pembahasan; ?></td>
                  <td>
                    <a href="<?php echo site_url('Progress_proposal/download_bukti/' . $row->id); ?>">
                      <button class="btn btn-success">unduh</button>
                    </a>
                  </td>
                  <td><?php echo $row->status; ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <a href="<?php echo site_url('Progress_proposal/download_log'); ?>">
            <button class="btn btn-primary">Unduh Log</button>
          </a>


        </div>
      </div>
    </div>
</section>

</html>