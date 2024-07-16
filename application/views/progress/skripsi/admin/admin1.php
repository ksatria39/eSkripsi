<section class="section">
    <!--<div class="pagetitle mb-15">
        <h1>Proposal</h1>
      </div>-->


    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Bimbingan & Revisi</h5>

            <!-- Default Table -->

            <body>

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
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
                        <?php foreach ($data_skripsi as $row) : ?>
                            <tr>
                                <td><?php echo $row->id; ?></td>
                                <td><?php echo date('l, d F Y', strtotime($row->tanggal)); ?></td>
                                <td><?php echo $row->judul_id; ?></td>
                                <td><?php echo $row->pembimbing; ?></td>
                                <td><?php echo $row->bab; ?></td>
                                <td><?php echo $row->pembahasan; ?></td>
                                <td>
                                    <a href="<?php echo site_url('Progress_skripsi/download_bukti/' . $row->id); ?>">
                                        <button>unduh</button>
                                    </a>
                                </td>
                                <td><?php echo $row->status; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="<?php echo site_url('Progress_skripsi/download_log'); ?>">
                    <button>Unduh Log</button>
                </a>
            </body>
            <!-- End Default Table Example -->
            <a href="<?= base_url() ?>/progress_skripsi/admin2" class="btn btn-primary" style="border-radius: 10px;" type="submit">Tambah</a>
        </div>
    </div>
    </div>
</section>