<div class="container mt-5">
	<h2><p class="text-center text-uppercase font-weight-bold">Dasboard</p></h2>
	<div class="row">
		<div class="col-sm-6">
			<div class="card text-center">
				<div class="card-header">
					Jadwal
				</div>
				<div class="card-body">
					<h1 class="card-title"><?=$jadwal;?> Jadwal</h1>
					<a href="<?= base_url('muach/jadwal'); ?>" class="btn btn-primary">Detail</a>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="card text-center">
				<div class="card-header">
					Orderan
				</div>
				<div class="card-body">
					<h1 class="card-title"><?=$orderan;?> orderan menunggu</h1>
					<a href="<?= base_url('muach/orderan'); ?>" class="btn btn-primary">Detail</a>
				</div>
			</div>
		</div>
	</div>
</div>