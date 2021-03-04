<div class="container mt-5">
  <h2><p class="text-center text-uppercase font-weight-bold">Orderan</p></h2>
  <div class="row">

    <table class="table table-hover">
      <thead>
        <tr class="text-center">
          <th scope="col">No</th>
          <th scope="col">Produk</th>
          <th scope="col">Banyak</th>
          <th scope="col">Harga</th>
          <th scope="col">Dateline kirim</th>
          <th scope="col">Pelanggan</th>
          <th scope="col">Alamat&nomor</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody  class="text-center">
        <tr>
          <th scope="row">1</th>
          <td>Skincare</td>
          <td>1</td>
          <td>Rp. 234.000</td>
          <td>12 april 2020 12:12 WIB</td>
          <td>Otto</td>
          <td><a href="#" data-toggle="modal" data-target="#exampleModal">lihat</a></td>
          <td><button type="button" class="btn btn-primary">Terima</button><button type="button" class="btn btn-danger ml-1">Tolak</button></td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Skincare</td>
          <td>2</td>
          <td>Rp. 234.000</td>
          <td>12 april 2020 12:12 WIB</td>
          <td>Otto</td>
          <td><a href="#" data-toggle="modal" data-target="#exampleModal">lihat</a></td>
          <td><div class="input-group">
            <input type="text" class="form-control" placeholder="Masukan nomor resi" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-success" type="button">Kirim</button>
              <button class="btn btn-danger" type="button">Batal</button>
            </div>
          </div></td>
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
        <h5 class="modal-title" id="exampleModalLabel">Alamat pengiriman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table>
          <tr>
            <td>otto</td>
          </tr>
          <tr>
            <td>Jl.Kenari No 37, RT 004, RW 036</td>
          </tr>
          <tr>
            <td>Desa Arjosari</td>
          </tr>
          <tr>
            <td>Kecamatan Kalipare, Kabupaten Malang</td>
            <tr>
              <td>Provinsi Jawa Timur, Kode Pos 65166</td>
            </tr>
            <tr>
              <td>Nomor/WA 85795485</td>
            </tr>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
