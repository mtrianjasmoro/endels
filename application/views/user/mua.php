
<h2 class="title text-center">MUA</h2>

<div class="col-sm-7 padding-right">	
	<?= $this->session->flashdata('message'); ?>
	<div class="category-tab">
		<?php foreach ($mua as $m) {?>
			<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img src="<?= base_url('asset/logo_mua/').$m['foto'];?>" alt="" />
							<h2>Rp. <?=number_format($m['harga'],'0','','.');?></h2>
							<p><?=$m['nama_produk'];?></p>
							<a href="#" class="detail" data-toggle="modal" ><i class="fa fa-info"></i> Detail</a>
							<?php 
							$hiddena = array('id_barang' => $pro['id_produk'], 'id_user' => '234');
							echo form_open('skincare/tambah_keranjang', 'id="keranjang'.$pro['id_produk'].'"', $hiddena);				
							?>
							<button type="submit" form="keranjang<?=$pro['id_produk']?>" name="keranjang" class="btn btn-default-modal col-md-12" ><i class="fa fa-shopping-cart"> </i> Keranjang</button>
						</form>
					</div>

				</div>
			</div>
		</div>
	<?php } ?>
</div>

</div><div class="col-sm-3 padding-right">
	<?php echo form_open('mua');?>
	<div class="form-group">
		<label for="exampleFormControlInput1">Tanggal booking</label>
		<input type="date" class="form-control" name="tgl_booking">
	</div>
	<div class="form-group row">
		<div class="col-sm-10">
			<button type="submit" class="btn btn-primary">Chek</button>
		</div>
	</div>
</form>
</div>
</div>
</div>
</section>





