<div class="container mt-5">
  <h2>
    <p class="text-center text-uppercase font-weight-bold">produk</p>
  </h2>
  <?= $this->session->flashdata('message'); ?>
  <div class="row">
    <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#tambah">Tambah produk</button>   
    <table class="table table-hover">
      <thead>
        <tr class="text-center">
          <th scope="col">No</th>
          <th scope="col">Produk</th>
          <th scope="col">Banyak</th>
          <th scope="col">Harga</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody class="text-center">

        <tr>
          <th scope="row">1</th>
          <td>Skincare</td>
          <td>
            <div class="input-group mb-3">
              <input type="number" class="form-control" value="2" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">Ubah</button>
              </div>
            </div>
          </td>
          <td>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Rp</span>
              </div>
              <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" value="23000">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">Ubah</button>
              </div>
            </div>
          </td>
          <td>
            <button type="button" class="btn btn-danger">Hapus</button><button type="button" class="btn btn-success ml-1">Iklankan produk</button>
          </td>
        </tr>

      </tbody>
    </table>
  </div>
</div>

<!-- modal -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('toko/tambah_produk')?>" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label class="col-form-label">Nama produk:</label>
            <input type="text" class="form-control" name="nama_produk">
          </div>


          <div class="form-group">
            <label class="col-form-label">Deskripsi:</label>
            <textarea class="form-control" name="deskripsi"></textarea>
          </div>

          <div class="form-group">
            <label class="col-form-label">Foto 1</label>
            <input type="file" class="form-control" name="foto1">
          </div>

          <div class="form-group">
            <label class="col-form-label">Foto 2</label>
            <input type="file" class="form-control" name="foto2">
          </div>

          <div class="form-group">
            <label class="col-form-label">Foto 3</label>
            <input type="file" class="form-control" name="foto3">
          </div>

          <div class="form-group">
            <label class="col-form-label">Foto 4</label>
            <input type="file" class="form-control" name="foto4">
          </div>

          <div class="form-group">
            <label class="col-form-label">Harga:</label>            
            <div class="input-group">
             <div class="input-group-prepend">
              <span class="input-group-text">Rp</span>
            </div>
            <input type="number" class="form-control" name="harga">
          </div>
        </div>

        <div class="form-group">
          <label class="col-form-label">Jumlah:</label>
          <input type="number" min="1" class="form-control" name="jumlah"> 
        </div>

        <div class="form-group">
          <label >Tipe kulit</label>
          <select class="form-control" name="tipe_kulit">
            <option value="1">Berminyak</option>
            <option value="2">Basah</option>
            <option value="3">Kering</option>
            <option value="4">Normal</option>
          </select>
        </div>

      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>

    </form>
  </div>
</div>
</div>