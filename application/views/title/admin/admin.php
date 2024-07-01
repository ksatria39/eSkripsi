<section class="section">
	<div class="card">
		<div class="card-body">

			<?php if (empty($titles)) { ?>
				<p>Belum ada judul yang diajukan.</p>
			<?php } else { ?>

				<!-- <div class="d-flex justify-content mt-3">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Cari" aria-label="cari">
                        <button class="btn btn-outline-primary" type="submit">
                            <i class="ri-search-line"></i>
                        </button>
                    </form>
                </div> -->

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
							<th scope="col">Status</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($titles as $title) { ?>
							<tr>
								<th scope="row"><?= $no++; ?></th>
								<td><?= $title->judul; ?></td>
								<td>
									<?php
									$mahasiswa = $this->db->where('id', $title->mahasiswa)->get('users')->row();
									echo $mahasiswa->nama;
									?>
								</td>
								<td>
									<?php
									$dosen1 = $this->db->where('id', $title->dospem_1_id)->get('users')->row();
									echo $dosen1->nama;
									?>
								</td>
								<td>
									<?php if ($title->status_dospem_1 == "Diterima") { ?>
										<span class="badge rounded-pill bg-success">Diterima</span>
									<?php } else if ($title->status_dospem_1 == "Ditolak") { ?>
										<span class="badge rounded-pill bg-danger">Ditolak</span>
									<?php } else { ?>
										<span class="badge rounded-pill bg-secondary">Sedang diproses</span>
									<?php } ?>
								</td>
								<td>
									<?php
									$dosen2 = $this->db->where('id', $title->dospem_2_id)->get('users')->row();
									echo $dosen2->nama;
									?>
								</td>
								<td>
									<?php if ($title->status_dospem_2 == "Diterima") { ?>
										<span class="badge rounded-pill bg-success">Diterima</span>
									<?php } else if ($title->status_dospem_2 == "Ditolak") { ?>
										<span class="badge rounded-pill bg-danger">Ditolak</span>
									<?php } else { ?>
										<span class="badge rounded-pill bg-secondary">Sedang diproses</span>
									<?php } ?>
								</td>
								<td>
									<?php if ($title->status == "Diterima") { ?>
										<span class="badge rounded-pill bg-success">Diterima</span>
									<?php } else if ($title->status == "Ditolak") { ?>
										<span class="badge rounded-pill bg-danger">Ditolak</span>
									<?php } else { ?>
										<span class="badge rounded-pill bg-secondary">Sedang diproses</span>
									<?php } ?>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			<?php } ?>

		</div>
	</div>
</section>
