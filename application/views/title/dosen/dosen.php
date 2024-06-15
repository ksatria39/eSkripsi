<section class="section">
	<div class="card">
		<div class="card-body">

			<?php if ($this->session->flashdata('success')) : ?>
				<div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php endif; ?>

			<?php if ($this->session->flashdata('denied')) : ?>
				<div class="alert alert-secondary alert-dismissible fade show mt-3" role="alert">
					<?php echo $this->session->flashdata('denied'); ?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php endif; ?>

			<ul class="nav nav-tabs mt-3" id="myTabs" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">Pembimbing 1</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Pembimbing 2</a>
				</li>
			</ul>

			<div class="tab-content mt-2">
				<div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">

					<?php if (empty($dospem1)) { ?>
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
									<th scope="col">Bidang</th>
									<th scope="col">Mahasiswa</th>
									<th scope="col">NPM</th>
									<th scope="col">Tanggal Diajukan</th>
									<th scope="col">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($dospem1 as $dospem1) { ?>
									<tr>
										<th scope="row"><?= $no++; ?></th>
										<td><?= $dospem1->judul; ?></td>
										<td>
											<?php
											$bidang = $this->db->where('id', $dospem1->bidang_id)->get('research_area')->row();
											echo $bidang->nama;
											?>
										</td>
										<td>
											<?php
											$mahasiswa = $this->db->where('id', $dospem1->mahasiswa)->get('users')->row();
											echo $mahasiswa->nama;
											?>
										</td>
										<td>
											<?php
											$npm = $this->db->where('id', $dospem1->mahasiswa)->get('users')->row();
											echo $npm->npm;
											?>
										</td>
										<td><?= $dospem1->tanggal_pengajuan; ?></td>
										<td>
											<form action="<?= base_url('title/accDospem1'); ?>" method="post">
												<input type="hidden" id="id" name="id" value="<?= $dospem1->id; ?>"></input>
												<button type="submit" class="btn btn-primary">Terima</button>
											</form>
											<button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?= $dospem1->id; ?>">Tolak</button>
										</td>
									</tr>
									<div class="modal fade" id="myModal<?= $dospem1->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<!-- Modal Header -->
												<div class="modal-header">
													<h4 class="modal-title">Tolak Judul?</h4>
												</div>
												<!-- Modal Body -->
												<div class="modal-body">
													<form action="<?= base_url('title/deDospem1'); ?>" method="post">
														<input type="hidden" id="id" name="id" value="<?= $dospem1->id; ?>"></input>
														<div class="form-floating mb-3">
															<textarea class="form-control" placeholder="Berikan alasan" name="alasan" id="alasan" style="height: 100px;"></textarea>
															<label for="alasan">Alasan</label>
														</div>
														<p align="center"><button type="submit" class="btn btn-danger">Tolak</button></p>
													</form>
												</div>
												<!-- Modal Footer -->
												<div class="modal-footer">
													<button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
							</tbody>
						</table>

					<?php } ?>


				</div>
				<div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">

					<?php if (empty($dospem2)) { ?>
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
									<th scope="col">Bidang</th>
									<th scope="col">Mahasiswa</th>
									<th scope="col">NPM</th>
									<th scope="col">Tanggal Diajukan</th>
									<th scope="col">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($dospem2 as $dospem2) { ?>
									<tr>
										<th scope="row"><?= $no++; ?></th>
										<td><?= $dospem2->judul; ?></td>
										<td>
											<?php
											$bidang = $this->db->where('id', $dospem2->bidang_id)->get('research_area')->row();
											echo $bidang->nama;
											?>
										</td>
										<td>
											<?php
											$mahasiswa = $this->db->where('id', $dospem2->mahasiswa)->get('users')->row();
											echo $mahasiswa->nama;
											?>
										</td>
										<td>
											<?php
											$npm = $this->db->where('id', $dospem2->mahasiswa)->get('users')->row();
											echo $npm->npm;
											?>
										</td>
										<td><?= $dospem2->tanggal_pengajuan; ?></td>
										<td>
											<form action="<?= base_url('title/accDospem2'); ?>" method="post">
												<input type="hidden" id="id" name="id" value="<?= $dospem2->id; ?>"></input>
												<button type="submit" class="btn btn-primary">Terima</button>
											</form>
											<button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#myModal2<?= $dospem2->id; ?>">Tolak</button>
										</td>
									</tr>
									<div class="modal fade" id="myModal2<?= $dospem2->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<!-- Modal Header -->
												<div class="modal-header">
													<h4 class="modal-title">Tolak Judul?</h4>
												</div>
												<!-- Modal Body -->
												<div class="modal-body">
													<form action="<?= base_url('title/deDospem2'); ?>" method="post">
														<input type="hidden" id="id" name="id" value="<?= $dospem2->id; ?>"></input>
														<div class="form-floating mb-3">
															<textarea class="form-control" placeholder="Berikan alasan" name="alasan" id="alasan" style="height: 100px;"></textarea>
															<label for="alasan">Alasan</label>
														</div>
														<p align="center"><button type="submit" class="btn btn-danger">Tolak</button></p>
													</form>
												</div>
												<!-- Modal Footer -->
												<div class="modal-footer">
													<button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
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
		</div>
</section>

<div class="modal fade" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Tolak Judul?</h4>
			</div>
			<!-- Modal Body -->
			<div class="modal-body">
				<div class="form-floating mb-3">
					<textarea class="form-control" placeholder="Berikan alasan" id="alasan" style="height: 100px;"></textarea>
					<label for="alasan">Alasan</label>
				</div>
				<center><button type="submit" class="btn btn-danger">Tolak</button></center>
			</div>
			<!-- Modal Footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
			</div>
		</div>
	</div>
</div>