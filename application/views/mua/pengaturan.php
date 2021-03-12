<div class="container mt-5">
	<h2><p class="text-center text-uppercase font-weight-bold">Pengaturan</p></h2>
	<?= $this->session->flashdata('message'); ?>
	<form action="<?= base_url('muach/edit_mua_pengaturan/').$profil["id_mua"];?>" method="POST" enctype="multipart/form-data">
		<div class="form-group row input-group mb-3">
			<label for="nama" class="col-sm-2 col-form-label">Harga</label>
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">Rp</span>
			</div>
				<input type="number" class="form-control" name="harga" placeholder="harga" value="<?=number_format($profil['harga'],'0','','.');?>">
		</div>
		<div class="form-group row">
			<label for="alamat" class="col-sm-2 col-form-label">Status</label>
			<div class="input-group col-sm-10">
				<div class="input-group-text">
					<input type="radio" value="1" name="status" aria-label="Radio button for following text input" class="mr-1" <?php echo ($profil['buka'] == '1' ? ' checked' : ''); ?>>
					Buka
				</div>
				<div class="input-group-text ml-3">
					<input type="radio" value="0" name="status" aria-label="Radio button for following text input" class="mr-1" <?php echo ($profil['buka'] == '0' ? ' checked' : ''); ?>>
					Tutup
				</div>
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