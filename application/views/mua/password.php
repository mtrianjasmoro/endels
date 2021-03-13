<div class="container mt-5">
	<h2><p class="text-center text-uppercase font-weight-bold">Edit password</p></h2>
	<?= $this->session->flashdata('message'); ?>
	<form  action="<?= base_url('muach/ubah_password/edit')?>" method="POST" enctype="multipart/form-data">
		<div class="form-group row">
			<label for="pass" class="col-sm-2 col-form-label">Password lama</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" name="pass" id="pass" placeholder="password lama">
				<?= form_error('pass', '<small class="text-danger pl-3">', '</small>'); ?>
			</div>
		</div>
		<div class="form-group row">
			<label for="password1" class="col-sm-2 col-form-label">Password baru</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" name="password1" id="password1" placeholder="password baru">
				<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
			</div>
		</div>
		<div class="form-group row">
			<label for="password2" class="col-sm-2 col-form-label">Ulangi Password</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" name="password2" id="password2" placeholder="ulangi password">
				<?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
			</div>
		<div class="form-group row">
			<div class="col-sm-12 ml-5">
				<button type="submit" class="btn btn-primary">Simpan</button>
				<button type="cancel" class="btn btn-danger" onclick="window.history.go(-1); return false;">Batal</button>
			</div>
		</div>
	</form>
</div>