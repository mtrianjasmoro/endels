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

				

				<h2 class="title text-center">Info Klinik</h2>
				<div class="col-sm-9 padding-right">					
					
					<div class="recommended_items"><!--recommended_items-->												
							<div class="col-sm-4"><center>
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?= base_url('asset/produk/ex.jpg');?>" alt="" />
											<h2>Klinik 1</h2>
											
											<p>Kota Malang</p>

											<p>Jl.Hamid Rusdi Timur IV 288</p>
											<h3>Rp.120.000</h3>
											<a href="<?= base_url('klinik/detail'); ?>" class="detail"><i class="fa fa-info"></i> Detail Klinik</a><br><br>

											<a href="<?= base_url('klinik/payment'); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mulai Konsultasi</a>
											<br>
											<!-- if -->
										<!-- 	<a href="<?= base_url('klinik/chat'); ?>" class="btn btn-default add-to-cart">Chat Klinik</a> -->
											<!-- end if -->

										</div>
										
									</div>
								</div></center>
							</div>
					</div><!--/recommended_items-->

					<h2 class="pro text-center" id="p_judul"></h2>

						<div class="column">
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?= base_url('asset/produk/ex.jpg');?>" alt="" />
											<h2>Klinik 2</h2>
											<a href="<?= base_url('klinik/detail'); ?>" class="detail"><i class="fa fa-info"></i> Detail</a><br><br>
											<a href="<?= base_url('klinik/chat'); ?>" class="btn btn-default add-to-cart">Chat Klinik</a>
										</div>
												
									</div>
								</div>
							</div>
						</div>

					</div>
					
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
filterSelection("all","Klinik Terdaftar")
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

