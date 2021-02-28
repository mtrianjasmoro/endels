<div class="panel panel-default">
	<div class="panel-heading text-center">Status Pembayaran</div>
	<div class="panel-body">		
		<table class="table table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Produk</th>
					<th>Nomor resi</th>
					<th>Harga</th>
					<th>Dateline bayar</th>
					<th>Upload bukti</th>
					<th>Status</th>
					<th>Keterangan</th>
				</tr>
			</thead>

			<tbody>
				<?php 

				$i=0; 
				foreach ($transaksi as $tran) { 
					$i++;
					if ($tran['status'] == "belum" || $tran['status'] == "gagal") {
						$tampil ="enabled";
					} else {
						$tampil ="disabled";
					}					
					
				?>
					<tr>
						<th scope="row"><?=$i;?></th>
						<td><?=$tran['nama_produk']?></td>
						<td><?=$tran['resi']?></td>
						<td>Rp. <?=number_format($tran['total_harga'],'0','','.');?></td>
						<td><?=$tran['tgl_dateline']?></td>
						<td>
						<?php echo form_open_multipart('skincare/upload_bayar','id="form'.$i.'"');?>
							<div class="input-group">
								<input type="file" class="form-control c" <?=$tampil;?> id="image" name="image">
								<span class="input-group-btn">
									<button class="btn btn-success" type="submit" <?=$tampil;?> form="form<?=$i?>">Upload</button>
								</span>
							</div>							
						</form>
						</td>
						<td>
							<?php if ($tran['status'] == "belum") {
								echo '<mark class="belum">Belum bayar</mark>';
							} elseif ($tran['status'] == "menunggu") {
								echo '<mark class="menunggu">Menunggu ACC</mark>';
							}elseif ($tran['status'] == "lunas") {
								echo '<mark class="berhasil">Berhasil</mark>';
							}elseif ($tran['status'] == "gagal") {
								echo '<mark class="belum">Gagal</mark>';
							}?>
						</td> 
						<td><?=$tran['keterangan']?></td>
					</tr>
				<?php } ?>

			</tbody>
		</table>
</div>
</div>
