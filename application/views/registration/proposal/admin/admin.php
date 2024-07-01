<section class="section">
	<div class="card">
		<div class="card-body">

			<?php if (empty($proposal)) { ?>
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
						foreach ($proposal as $proposal) { ?>
							<tr>
								<th scope="row"><?= $no++; ?></th>
								<td><?= $proposal->judul; ?></td>
								<td>
									<?php
									$mahasiswa = $this->db->where('id', $proposal->mahasiswa)->get('users')->row();
									echo $mahasiswa->nama;
									?>
								</td>
								<td>
									<?php
									$dosen1 = $this->db->where('id', $proposal->dospem_1_id)->get('users')->row();
									echo $dosen1->nama;
									?>
								</td>
								<td><?= $proposal->pro_status_dospem_1; ?></td>
								<td>
									<?php
									$dosen2 = $this->db->where('id', $proposal->dospem_2_id)->get('users')->row();
									echo $dosen2->nama;
									?>
								</td>
								<td><?= $proposal->pro_status_dospem_2; ?></td>
								<td><?= $proposal->pro_status; ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			<?php } ?>

		</div>
	</div>
</section>
