<div class="container mt-5">
	<h2><p class="text-center text-uppercase font-weight-bold">Edit profile</p></h2>
	<?= $this->session->flashdata('message'); ?>
	<form  action="<?= base_url('muach/edit_mua/').$profil["id_mua"];?>" method="POST" enctype="multipart/form-data">
		<div class="form-group row">
			<label for="nama" class="col-sm-2 col-form-label">Nama MUA</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?= $profil['nama_mua']; ?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?= $profil['alamat']; ?>">
			</div>
		</div>	
		<div class="form-group row">
			<label for="rt" class="col-sm-2 col-form-label">RT</label>
			<div class="col-sm-10">
				<input type="number" class="form-control" name="rt" id="rt" placeholder="RT" value="<?= $profil['rt']; ?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="rw" class="col-sm-2 col-form-label">RW</label>
			<div class="col-sm-10">
				<input type="number" class="form-control" name="rw" id="rw" placeholder="RW" value="<?= $profil['rw']; ?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="kecamatan" class="col-sm-2 col-form-label" >kecamatan</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="kecamatan" value="<?= $profil['kecamatan']; ?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="kabupaten" class="col-sm-2 col-form-label">Kabupaten/kota</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="kabupaten" id="kabupaten" placeholder="kabupaten" value="<?= $profil['kabupaten']; ?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="provinsi" value="<?= $profil['provinsi']; ?>">
			</div>
		</div>						
		<div class="form-group row">
			<label for="logo" class="col-sm-2 col-form-label">Logo</label>
			<div class="col-sm-10">
				<input type="file" class="custom-file-input"  name="image" id="image">
				<label class="custom-file-label" for="logo">Choose file</label>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary">Simpan</button>
				<button type="cancel" class="btn btn-danger" onclick="window.history.go(-1); return false;">Batal</button>
			</div>
		</div>
	</form>
</div>