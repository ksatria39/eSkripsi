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

			<?php if ($this->session->flashdata('error')) : ?>
				<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
					<?php echo $this->session->flashdata('error'); ?>
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
				<li class="nav-item">
					<a class="nav-link" id="tab3-tab" data-bs-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">Koordinator</a>
				</li>
			</ul>

			<div class="tab-content mt-2">
				<div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">

					<?php if (empty($dospem1)) { ?>
						<p>Tidak ada pendaftaran ujian proposal yang menunggu persetujuan.</p>
					<?php } else { ?>

						<table class="table">
							<thead>
								<tr>
									<th scope="col">No</th>
									<th scope="col">Judul</th>
									<th scope="col">Mahasiswa</th>
									<th scope="col">NPM</th>
									<th scope="col">Logbook Bimbingan</th>
									<th scope="col">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($dospem1 as $data1) { ?>
									<tr>
										<th scope="row"><?= $no++; ?></th>
										<td><?= $data1->judul; ?></td>
										<td>
											<?php
											$mahasiswa = $this->db->where('id', $data1->mahasiswa)->get('users')->row();
											echo $mahasiswa->nama;
											?>
										</td>
										<td><?= $mahasiswa->npm; ?></td>
										<td><a class="btn btn-primary" href="<?= base_url() ?>file/proposal/logbook/<?= $data1->file_logbook; ?>">Unduh</a></td>
										<td>
											<a href="<?= base_url('registration_proposal/accDospem1') ?>/<?= $data1->pro_id; ?>" class="btn btn-primary">Terima</a>
											<a href="<?= base_url('registration_proposal/deDospem1') ?>/<?= $data1->pro_id; ?>" class="btn btn-danger">Tolak</a>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>

					<?php } ?>

				</div>

				<div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">

					<?php if (empty($dospem2)) { ?>
						<p>Tidak ada pendaftaran ujian proposal yang menunggu persetujuan.</p>
					<?php } else { ?>

						<table class="table">
							<thead>
								<tr>
									<th scope="col">No</th>
									<th scope="col">Judul</th>
									<th scope="col">Mahasiswa</th>
									<th scope="col">NPM</th>
									<th scope="col">Logbook Bimbingan</th>
									<th scope="col">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($dospem2 as $data2) { ?>
									<tr>
										<th scope="row"><?= $no++; ?></th>
										<td><?= $data2->judul; ?></td>
										<td>
											<?php
											$mahasiswa = $this->db->where('id', $data2->mahasiswa)->get('users')->row();
											echo $mahasiswa->nama;
											?>
										</td>
										<td><?= $mahasiswa->npm; ?></td>
										<td><a class="btn btn-primary" href="<?= base_url() ?>file/proposal/logbook/<?= $data2->file_logbook; ?>">Unduh</a></td>
										<td>
											<a href="<?= base_url('registration_proposal/accDospem2') ?>/<?= $data2->pro_id; ?>" class="btn btn-primary">Terima</a>
											<a href="<?= base_url('registration_proposal/deDospem2') ?>/<?= $data2->pro_id; ?>" class="btn btn-danger">Tolak</a>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>

					<?php } ?>

				</div>

				<div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">

					<?php if (empty($koordinator)) { ?>
						<p>Tidak ada pendaftaran ujian proposal yang menunggu persetujuan.</p>
					<?php } else { ?>

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
									<th scope="col">Logbook Bimbingan</th>
									<th scope="col">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($koordinator as $data3) { ?>
									<tr>
										<th scope="row"><?= $no++; ?></th>
										<td><?= $data3->judul; ?></td>
										<td>
											<?php
											$mahasiswa = $this->db->where('id', $data3->mahasiswa)->get('users')->row();
											echo $mahasiswa->nama;
											?>
										</td>
										<td>
											<?php
											$dosen1 = $this->db->where('id', $data3->dospem_1_id)->get('users')->row();
											echo $dosen1->nama;
											?>
										</td>
										<td><?= $data3->pro_status_dospem_1; ?></td>
										<td>
											<?php
											$dosen2 = $this->db->where('id', $data3->dospem_2_id)->get('users')->row();
											echo $dosen2->nama;
											?>
										</td>
										<td><?= $data3->pro_status_dospem_2; ?></td>
										<td><a class="btn btn-primary" href="<?= base_url() ?>file/proposal/logbook/<?= $data3->file_logbook; ?>">Unduh</a></td>
										<td>
											<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal<?= $data3->pro_id; ?>">Terima</button>
											<a href="<?= base_url('registration_proposal/deProposal') ?>/<?= $data3->pro_id; ?>" class="btn btn-danger">Tolak</a>
										</td>
									</tr>

									<div class="modal fade" id="myModal<?= $data3->pro_id; ?>" tabindex="-1">
										<div class="modal-dialog">
											<div class="modal-content">
												<!-- Modal Header -->
												<div class="modal-header">
													<h4 class="modal-title">Atur Jadwal</h4>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<!-- Modal Body -->
												<div class="modal-body">
													<form class="row g-3 needs-validation border-top" action="<?php echo base_url('registration_proposal/accProposal'); ?>" method="post" novalidate>

														<input type="hidden" id="id" name="id" value="<?= $data3->pro_id; ?>"></input>
														<input type="hidden" id="title_id" name="title_id" value="<?= $data3->title_id; ?>"></input>

														<div class="col-12">
															<label for="tanggal" class="form-label">Tanggal</label>
															<div class="input-group has-validation">
																<input type="date" name="tanggal" class="form-control" id="tanggal" placeholder="Pilih Tanggal" required>
															</div>
														</div>

														<div class="col-12">
															<label for="jam" class="form-label">Jam</label>
															<input type="time" name="jam" class="form-control" id="jam" placeholder="Pilih Jam" required>
														</div>

														<div class="col-12">
															<label for="title_id" class="form-label">Ruangan</label>
															<select class="form-select" name="room_id" id="room_id" aria-label="Default select example">
																<option selected="">-- Pilih Ruangan Ujian --</option>
																<?php foreach ($rooms as $room) : ?>
																	<option value="<?= $room['id']; ?>" <?= set_select('id', $room['id']); ?>><?= $room['nama']; ?></option>
																<?php endforeach; ?>
															</select>
														</div>

														<div class="col-12">
															<label for="title_id" class="form-label">Dosen Penguji 1</label>
															<select class="form-select" name="dosuji1" id="dosuji1" aria-label="Default select example">
																<option selected="">-- Pilih Penguji 1 --</option>
																<?php foreach ($dosuji1 as $dosuji1) : ?>
																	<option value="<?= $dosuji1['id']; ?>" <?= set_select('id', $dosuji1['id']); ?>><?= $dosuji1['nama']; ?></option>
																<?php endforeach; ?>
															</select>
														</div>

														<div class="col-12">
															<label for="title_id" class="form-label">Dosen Penguji 2</label>
															<select class="form-select" name="dosuji2" id="dosuji2" aria-label="Default select example">
																<option selected="">-- Pilih Penguji 2 --</option>
																<?php foreach ($dosuji2 as $dosuji2) : ?>
																	<option value="<?= $dosuji2['id']; ?>" <?= set_select('id', $dosuji2['id']); ?>><?= $dosuji2['nama']; ?></option>
																<?php endforeach; ?>
															</select>
														</div>

														<div class="col-12 mt-3" align="center">
															<button class="btn btn-primary" style="border-radius: 15px;" type="submit">Atur Jadwal</button>
														</div>
													</form>
												</div>
												<!-- Modal Footer -->
												<div class="modal-footer">
													<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
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
