<div class="panel panel-default">
	<div class="panel-heading text-center">Keranjang</div>
	<div class="panel-body">	
		<?= $this->session->flashdata('message'); ?>
		<table class="table table-hover text-center">
			<thead>
				<tr>
					<th class="text-center">No</th>
					<th class="text-center">Foto</th>	
					<th class="text-center">Produk</th>
					<th class="text-center">Harga</th>
					<th class="text-center">Stok</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>

			<tbody>
				<?php 
				$i=0;
				foreach ($bayar as $buy) {
					$i++;		
					?>
					<?php
					echo form_open('skincare/bayar', 'id="m_bayar'.$buy['id_produk'].'"');	 ?>
					 <input type="hidden"name="id_barang" value="<?=$buy['id_produk']?>" form="m_bayar<?=$buy['id_produk']?>">
					 <input type="hidden"name="id_keranjang" value="<?=$buy['id_keranjang']?>" form="m_bayar<?=$buy['id_produk']?>">
					<tr>
						<td scope="row" class="text-center"><?=$i?></th>
						<td><img src="<?=base_url('asset/produk/').$buy['foto']?>" width="10%"></td>
						<td><?=$buy['nama_produk']?></td>
						<td>Rp. <?=number_format($buy['harga'],'0','','.');?></td>
						<td><?=$buy['jumlah']?></td>
						<td><button type="submit" form="m_bayar<?=$buy['id_produk']?>"  class="btn btn-success-modal col-md-12"><i class="fa fa-dollar"></i> Bayar</button></td>
					</tr>
				</form>
			<?php }?>
		</tbody>
	</table>
</div>
</div>
