<section class="section">
	<div class="card">
		<div class="card-body">

			<?php if ($this->session->flashdata('error')) : ?>
				<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
					<?php echo $this->session->flashdata('error'); ?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php endif; ?>

			<form method="post" action="<?php echo base_url('registration_proposal/addProposal'); ?>" enctype="multipart/form-data">

				<div class="row mb-3 mt-3">
					<label class="col-sm-2 col-form-label">Judul</label>
					<div class="col-sm-10">
						<select class="form-select" name="title_id" id="title_id" aria-label="Default select example">
							<option selected="">-- Pilih Judul --</option>
							<?php foreach ($myTitle as $myTitle) : ?>
								<option value="<?= $myTitle['id']; ?>" <?= set_select('id', $myTitle['id']); ?>><?= $myTitle['judul']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>

				<div class="row mb-3 mt-3">
					<label class="col-sm-2 col-form-label">Naskah Proposal</label>
					<div class="col-sm-10">
						<input type="file" class="form-control" name="file_naskah" id="file_naskah" placeholder="Pilih File">
					</div>
					<div class="text-sm text-muted">* .pdf dengan ukuran maksimal 10MB</div>
				</div>

				<div class="col-sm-10" align="center">
					<button type="submit" class="btn btn-primary">Daftar</button>
				</div>

			</form>
		</div>
	</div>
</section>
