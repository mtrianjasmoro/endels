<div class="container mt-5">
	<h2><p class="text-center text-uppercase font-weight-bold">Transaksi</p></h2>
	<div class="row">
		<div class="col-md-4">
			<div class="card text-center">
				<div class="card-header">
					Pendapatan
				</div>
				<div class="card-body">
					<h1 class="card-title">Rp. 3.000.000</h1>
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
					<h1 class="card-title">Rp. 3.000.000</h1>
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
					<h1 class="card-title">Rp. 3.000.000</h1>
					<p class="card-text">Saldo yang telah ditarik.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-4">
		<table class="table table-hover">
			<thead>
				<tr>
					<td colspan="6"><div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Cari</span>
						</div>
						<input type="text" class="form-control" id="myInput" aria-label="Username" aria-describedby="basic-addon1">
					</div></td>
				</tr>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Tanggal</th>
					<th scope="col">Penerima</th>
					<th scope="col">Pengirim</th>
					<th scope="col">Jumlah</th>
					<th scope="col">Keterangan</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<tr>
					<th scope="row">1</th>
					<td>12 oktober 1996</td>
					<td>Anjas</td>
					<td>Nia</td>
					<td>Rp. 3.000.000</td>
					<td>Penarikan saldo</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>