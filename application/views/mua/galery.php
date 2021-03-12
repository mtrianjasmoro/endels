<div class="container mt-5">
  <h2><p class="text-center text-uppercase font-weight-bold">Galery</p></h2>
  <?= $this->session->flashdata('message'); ?>
  <div class="row">
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah_produk">
      Tambah produk
    </button>
    <table class="table table-hover">
      <thead>
        <tr class="text-center">
          <th scope="col">No</th>
          <th scope="col">Judul</th>
          <th scope="col">Foto</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody  class="text-center">
        <?php $i=0; foreach ($galery as $gal) { $i++;?>
          <tr>
            <th scope="row"><?=$i;?></th>
            <td><?=$gal['judul']?></td>
            <td><a href="#" data-toggle="modal" data-target="#img<?=$gal['id_galery']?>">lihat</a></td>
            <td><button type="button" class="btn btn-danger ml-1" onclick="window.location.replace('<?= base_url('muach/hapus_galery/').$gal['id_galery']; ?>');">Hapus</button></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div> 

<?php $i=0; foreach ($galery as $gal) { $i++;?>
  <!-- Modal -->
  <div class="modal fade" id="img<?=$gal['id_galery']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Foto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="carouselExampleControls<?=$gal['id_galery']?>" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="<?= base_url('asset/mua/').$gal['foto1'];?>" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="<?= base_url('asset/mua/').$gal['foto2'];?>" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="<?= base_url('asset/mua/').$gal['foto3'];?>" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls<?=$gal['id_galery']?>" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls<?=$gal['id_galery']?>" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>


<div class="modal fade" id="tambah_produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah galery</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('muach/add_galery');?>" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="judul" class="col-form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul">
          </div>
          <div class="form-group">
            <label for="foto1" class="col-form-label">Foto 1</label>
            <input type="file" class="form-control" id="foto1" name="foto1">
          </div>

          <div class="form-group">
            <label for="foto2" class="col-form-label">Foto 2</label>
            <input type="file" class="form-control" id="foto2" name="foto2">
          </div>

          <div class="form-group">
            <label for="foto3" class="col-form-label">Foto 3</label>
            <input type="file" class="form-control" id="foto3" name="foto3">
          </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>