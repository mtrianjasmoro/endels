<div class="container mt-5">
  <h2><p class="text-center text-uppercase font-weight-bold">Galery</p></h2>
  <div class="row">

    <table class="table table-hover">
      <thead>
        <tr class="text-center">
          <th scope="col">No</th>
          <th scope="col">Judul</th>
          <th scope="col">Foto</th>
          <th scope="col">Harga</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody  class="text-center">
        <tr>
          <th scope="row">1</th>
          <td>Otto</td>
          <td><a href="#" data-toggle="modal" data-target="#exampleModal">lihat</a></td>
          <td>Rp. 30.000</td>
          <td><button type="button" class="btn btn-danger ml-1">Hapus</button></td>
        </tr>
        <tr>
          <th scope="row">1</th>
          <td>Otto</td>
          <td><a href="#" data-toggle="modal" data-target="#exampleModal">lihat</a></td>
          <td>Rp. 30.000</td>
          <td><button type="button" class="btn btn-danger ml-1">Hapus</button></td>
        </tr>
      </tbody>
    </table>
  </div>
</div> 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?= base_url('asset/mua/1.jpg');?>" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?= base_url('asset/mua/2.jpg');?>" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?= base_url('asset/mua/3.jpg');?>" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
      </div>
    </div>
  </div>
</div>
