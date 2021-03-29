

<script>
	$(document).ready(function(){
		$('#example').DataTable();
	});
</script>

<div class="container mt-5">
	<h2><p class="text-center text-uppercase font-weight-bold">Transaksi</p></h2>
	<div class="row">
		<div class="col-md-4">
			<div class="card text-center">
				<div class="card-header">
					Pendapatan
				</div>
				<div class="card-body">
					<h1 class="card-title">Rp. <?=number_format($pendapatan['total'],'0','','.');?></h1>
					<p class="card-text">Total semua uang yang didapatkan.</p>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card text-center">
				<div class="card-header">
					Saldo
				</div>
				<div class="card-body">
					<h1 class="card-title">Rp. <?=number_format(($pendapatan['total']-$penarikan['tarik']),'0','','.');?></h1>
					<p class="card-text">Saldo yang berada diaplikasi.</p>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card text-center">
				<div class="card-header">
					Penarikan
				</div>
				<div class="card-body">
					<h1 class="card-title">Rp. <?=number_format($penarikan['tarik'],'0','','.');?></h1>
					<p class="card-text">Saldo yang telah ditarik.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 mt-3">
			<table id="example">
				<thead>
					<tr>
						<th>Tanggal</th>
						<th>Penerima</th>
						<th>Pengirim</th>
						<th>Jumlah</th>
						<th>Keterangan</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Tanggal</th>
						<th>Penerima</th>
						<th>Pengirim</th>
						<th>Jumlah</th>
						<th>Keterangan</th>
					</tr>
				</tfoot>
				<tbody>
					<?php 
					foreach ($penarikan_detail as $pd) {
						$ket="Penarikan saldo"
						?>
						<tr>
							<td><?=date('d F Y', strtotime($pd['tgl_tarik']));?></td>
							<td><?=$pd['nama_mua']?></td>
							<td><?=$pd['id_admin']?></td>
							<td>Rp. <?=number_format($pd['jumlah'],'0','','.');?></td>
							<td><?=$ket;?></td>
						</tr>
					<?php }?>

					<?php 
					foreach ($pendapatan_detail as $ped) {
						$ket="Pendapatan"
						?>
						<tr>
							<td><?=date('d F Y', strtotime($ped['tgl_bayar']));?></td>
							<td><?=$ped['nama_mua']?></td>
							<td><?=$ped['nama_user']?></td>
							<td>Rp. <?=number_format($ped['total'],'0','','.');?></td>
							<td><?=$ket;?></td>
						</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>
