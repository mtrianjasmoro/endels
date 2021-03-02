
				<h2 class="title text-center"><?= $this->session->flashdata('nama'); ?>	</h2>
				<div class="col-sm-9 padding-right">	
				<?= $this->session->flashdata('message'); ?>	

					<div class="category-tab"><!--category-tab-->					

						<div id="myBtnContainer">
							<div class="col-sm-12">
								<ul class="nav nav-tabs">
									<li class="li"><a onclick="filterSelection('all','Semua jenis kulit')">Semua</a></li>
									<?php
										foreach ($katagori as $kat) {
									?>
										<li class="li"><a onclick="filterSelection('<?=$kat['id_katagori']?>','Kulit <?=$kat['nama_katagori']?>')"><?=$kat['nama_katagori']?></a></li>
									<?php } ?>
								</ul>
							</div>
							<form action="/action_page.php" >
			                <div class="input-group col-sm-3 pull-right">
			                  <input type="text" class="form-control" placeholder="Cari" name="search">
			                  <div class="input-group-btn">
			                    <button class="btn btn-default" type="submit">
			                      <i class="glyphicon glyphicon-search"></i>
			                    </button>
			                  </div>
			                </div>
			              </form>
						</div>
					<h2 class="pro text-center" id="p_judul"></h2>


							<?php foreach ($produk as $pro) {?>
							  <div class="column <?=$pro['id_katagori']?>">
								   <div class="col-sm-3">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="<?= base_url('asset/produk/').$pro['foto'];?>" alt="" />
													<h2>Rp. <?=number_format($pro['harga'],'0','','.');?></h2>
													<p><?=$pro['nama_produk'];?></p>
													<a href="#" class="detail" data-toggle="modal" data-target="#detail<?=$pro['id_produk']?>"><i class="fa fa-info"></i> Detail</a>
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
							  </div>
							<?php } ?>

					</div><!--/category-tab-->
					</div>
			</div>
		</div>
	</section>

<!-- Modal -->
<?php foreach ($produk as $pro) {?>
	<div class="modal fade" id="detail<?=$pro['id_produk']?>" tabindex="-1" role="dialog" aria-labelledby="ModalCarouselLabel">
		<div class="modal-dialog" role="document">
			<?php 
				$hidden = array('id_barang' => $pro['id_produk']);
				echo form_open('skincare/bayar', 'id="m_bayar'.$pro['id_produk'].'"', $hidden);				
			?>
			<div class="modal-content">
				<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Detail Produk</h4>
			      </div>
				<div class="row">
					<div class="col-md-6">
						<div id="carousel-inner<?=$pro['id_produk']?>" class="carousel slide" data-ride="carousel">
							<!-- Sliding images statring here --> 
							<div class="carousel-inner"> 
								<div class="item"> 
									<img src="<?= base_url('asset/produk/').$pro['foto'];?>"  alt="1"> 
								</div> 
								<div class="item"> 
									<img src="<?= base_url('asset/produk/').$pro['foto_2'];?>" alt="2"> 
								</div> 
								<div class="item"> 
									<img src="<?= base_url('asset/produk/').$pro['foto_3'];?>" alt="3"> 
								</div>
								<div class="item active"> 
									<img src="<?= base_url('asset/produk/').$pro['foto_4'];?>" alt="4"> 
								</div> 

							</div> 
							<!-- Next / Previous controls here -->
							<a class="left carousel-control" href="#carousel-inner<?=$pro['id_produk']?>" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
							</a>
							<a class="right carousel-control" href="#carousel-inner<?=$pro['id_produk']?>" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
							</a>
						</div>
					</div>
					
					<div class="col-md-6">
						<table>
							<tr>
								<td>Nama</td>
								<td>: <?=$pro['nama_produk']?></td>
							</tr>
							<tr>
								<td>Harga</td>
								<td>: Rp. <?=number_format($pro['harga'],'0','','.');?></td>
							</tr>
							<tr>
								<td>Jenis kulit</td>
								<td>: <?=$pro['nama_katagori']?></td>
							</tr>
							<tr>
								<td>Jumlah</td>
								<td>: <?=$pro['jumlah']?></td>
							</tr>
							<tr>
								<td colspan="2"><?=$pro['deskripsi']?></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="modal-footer">
		        	<div class="row">
		        		<div class="col-md-6"><button type="submit" form="m_bayar<?=$pro['id_produk']?>"  class="btn btn-success-modal col-md-12"><i class="fa fa-dollar"></i> Bayar</button></div>    
		      			</form>
		      			<?php 
							$hiddena = array('id_barang' => $pro['id_produk'], 'id_user' => '234');
							echo form_open('skincare/tambah_keranjang', 'id="m_keranjang'.$pro['id_produk'].'"', $hiddena);				
						?>
		        		<div class="col-md-6"><button type="submit" form="m_keranjang<?=$pro['id_produk']?>" name="keranjang" class="btn btn-default-modal col-md-12" ><i class="fa fa-shopping-cart"> </i> Keranjang</button></div>
		        		</form>

		        	</div>
		      </div>
			</div>
		</div>
	</div>
<?php } ?>
<!-- modal -->


<script>
filterSelection("all","Semua jenis kulit")
function filterSelection(c,judul) {
	document.getElementById("p_judul").innerHTML = judul;
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}


// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("li");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[i].className = current[i].className.replace(" active", "");
    // this.className += " active";
  });
}
</script>					

