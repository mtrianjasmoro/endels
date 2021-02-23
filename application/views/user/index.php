<style>

.column {
  display: none; 
}

.pro {
  color: #8a4411;
  font-family: 'Roboto', sans-serif;
  font-size: 18px;
  font-weight: 700;
  margin: 0 15px;
  text-transform: uppercase;
  margin-bottom: 30px;
}

.detail{
	color: #696763;
}
.detail:hover{
	color:#8a4411;
	font-size: 18px;
}

</style>

				

				<h2 class="title text-center">Penawaran</h2>
				<div class="col-sm-9 padding-right">					
					<div class="recommended_items"><!--recommended_items-->												
							<?php for($i=0;$i<=5;$i++){?>
							<div class="col-sm-2">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?= base_url('asset/produk/ex.jpg');?>" alt="" />
											<h2>$56</h2>
											<a href="" class="detail" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-info"></i> Detail</a>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										
									</div>
								</div>
							</div>
							<?php }; ?>	
					</div><!--/recommended_items-->

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
													<a href="<?= base_url('skincare/detail'); ?>" class="detail"><i class="fa fa-info"></i> Detail</a>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Tambah keranjang</a>
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
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="ModalCarouselLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="row">
						<div class="col-md-6">
							<div id="carousel-inner" class="carousel slide" data-ride="carousel">
								<!-- Sliding images statring here --> 
								<div class="carousel-inner"> 
									<div class="item"> 
										<img src="<?= base_url('asset/produk/').$pro['foto'];?>" alt="banana"> 
									</div> 
									<div class="item"> 
										<img src="<?= base_url('asset/produk/').$pro['foto'];?>" alt="currant"> 
									</div> 
									<div class="item"> 
										<img src="<?= base_url('asset/produk/').$pro['foto'];?>" alt="mango"> 
									</div>
									<div class="item active"> 
										<img src="<?= base_url('asset/produk/').$pro['foto'];?>" alt="strawberries"> 
									</div> 

								</div> 
								<!-- Next / Previous controls here -->
								<a class="left carousel-control" href="#carousel-inner" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left"></span>
								</a>
								<a class="right carousel-control" href="#carousel-inner" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right"></span>
								</a>
							</div>
						</div>
						<div class="col-md-6">
							<table>
								<tr>
									<td>Produk</td>
									<td>contoh</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>


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
    this.className += " active";
  });
}
</script>					

