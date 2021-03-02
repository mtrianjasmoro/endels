<div class="col-sm-2">
	<div class="left-sidebar">

		<div class="brands_products"><!--brands_products-->
			<h2><?php
				if ($this->uri->segment('1') == 'skincare') {
					echo "toko";
				} elseif($this->uri->segment('1') == 'mua') {
					echo "mua";
				}else{
					echo "klinik";
				}
				
			?>

		</h2>
		<div class="brands-name">
			<ul class="nav nav-pills nav-stacked">
				<?php foreach ($toko as $tok) {

					?>
					<li><a href="<?= base_url('skincare/toko/').$tok['id_toko'].'/'.$tok['nama_toko'];?>"> <span class="pull-left"><img src="<?= base_url('asset/logo_toko/').$tok['logo'];?>" width="15%"><?=$tok['nama_toko']?></span></a></li>
				<?php } ?>
			</div>
		</div><!--/brands_products-->


	</div>
</div>