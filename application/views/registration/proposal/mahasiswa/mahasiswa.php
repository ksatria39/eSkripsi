<section class="section">
	<div class="card">
		<div class="card-body">

			<!-- <div style="margin-top: 4rem;">
                <?php
				// if (empty($myProposal)) { 
				?>
                  <p>Anda belum mendaftarkan diri untuk ujian proposal.</p>
                <?php
				//  } else {
				?>
                </div> -->

			<!-- <div class="d-flex justify-content mt-3">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Cari" aria-label="cari">
                        <button class="btn btn-outline-primary" type="submit">
                            <i class="ri-search-line"></i>
                        </button>
                    </form>
                </div> -->

			<?php if ($this->session->flashdata('success')) : ?>
				<div class="alert alert-info alert-dismissible fade show" style="margin-top: 4rem;" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php endif; ?>

			<?php if (empty($myProposal)) { ?>
				<p>Anda belum mendaftar untuk mengikuti ujian proposal.</p>
			<?php } else { ?> -->

				<table class="table" style="margin-top: 4rem;">
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
						<?php $no = 1;
						foreach ($myProposal as $myProposal) { ?>
							<tr>
								<th scope="row"><?= $no++; ?></th>
								<td><?= $myProposal->judul; ?></td>
								<td>
									<?php
									$dosen1 = $this->db->where('id', $myProposal->dospem_1_id)->get('users')->row();
									echo $dosen1->nama;
									?>
								</td>
								<td>
									<?php
									$dosen2 = $this->db->where('id', $myProposal->dospem_2_id)->get('users')->row();
									echo $dosen2->nama;
									?>
								</td>
								<td><?= $myProposal->pro_status; ?></td>
								<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?= $myProposal->id; ?>">Lihat Detail</button></td>
							</tr>
							<div class="modal fade" id="myModal<?= $myProposal->id; ?>">
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
												<span class="col-sm-10"><?= $myProposal->judul; ?></span>
											</div>
											<div class="row">
												<span class="col-sm-5"><b>Mahasiswa</b></span>
												<span class="col-sm-10">
													<?php
													$mhs = $this->db->where('id', $myProposal->mahasiswa)->get('users')->row();
													echo $dosen1->nama;
													?>
												</span>
											</div>
											<hr>
											<div class="row">
												<span class="col-sm-5"><b>Pembimbing 1</b></span>
												<span class="col-sm-10">
													<?php
													$dosen1 = $this->db->where('id', $myProposal->dospem_1_id)->get('users')->row();
													echo $dosen1->nama;
													?>
												</span>
											</div>
											<div class="row">
												<span class="col-sm-5"><b>Status</b></span>
												<span class="col-sm-10"><?= $myProposal->pro_status_dospem_1; ?></span>
											</div>
											<!-- <div class="row">
                  <span class="col-sm-5"><b>Keterangan</b></span>
                  <span class="col-sm-10"><?= $myProposal->alasan_dospem_1; ?></span>
                </div> -->
											<hr>
											<div class="row">
												<span class="col-sm-5"><b>Pembimbing 2</b></span>
												<span class="col-sm-10">
													<?php
													$dosen1 = $this->db->where('id', $myProposal->dospem_1_id)->get('users')->row();
													echo $dosen1->nama;
													?>
												</span>
											</div>
											<div class="row">
												<span class="col-sm-5"><b>Status</b></span>
												<span class="col-sm-10"><?= $myProposal->pro_status_dospem_2; ?></span>
											</div>
											<!-- <div class="row">
                  <span class="col-sm-5"><b>Keterangan</b></span>
                  <span class="col-sm-10"><?= $myProposal->alasan_dospem_2; ?></span>
                </div> -->
											<hr>
											<div class="row">
												<span class="col-sm-5"><b>Status Akhir</b></span>
												<span class="col-sm-10"><?= $myProposal->pro_status; ?></span>
											</div>
											<hr>
											<div class="row">
												<span class="col-sm-5"><b>Berkas</b></span>
												<a class="btn btn-primary" href="<?= base_url() ?>/file/proposal/logbook/<?= $myProposal->file_logbook; ?>">Logbook</a></span>
											</div>
										</div>
										<!-- Modal Footer -->
										<div class="modal-footer ">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
					</tbody>
				</table>

			<!-- <?php } ?> -->
			<!-- End Default Table Example -->


			<a class="btn btn-primary position-absolute top-0 end-0 m-3" href="<?= base_url() ?>/registration_proposal/daftar" style="border-radius: 15px;">
				<i class="ri-add-line"></i>Tambah
			</a>

		</div>
	</div>
</section>


<!-- <div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail</h4>
            </div>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div> -->
