<div class="container mt-5">
  <h2><p class="text-center text-uppercase font-weight-bold">Orderan</p></h2>
  <?= $this->session->flashdata('orderan'); ?>
  <div class="row">
    <table class="table table-hover">
      <thead>
        <tr class="text-center">
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Hari H</th>
          <th scope="col">Dateline Konfirmasi</th>
          <th scope="col">Alamat&nomor</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody  class="text-center">
        <?php $i=0; foreach ($orderan as $ord) { $i++;?>
          <tr>
            <th scope="row"><?=$i;?></th>
            <td><?=$ord['nama_user'];?></td>
            <td><?=date('d F Y', strtotime($ord['tgl_H']));?></td>
            <td><?=date('d F Y', strtotime('+1 days', strtotime($ord['tgl_booking'])));?></td>
            <td ><a href="#" data-toggle="modal" data-target="#look<?=$ord['id_booking']?>" >lihat</a></td>
            <td><button type="button" class="btn btn-primary" onclick="window.location.replace('<?= base_url('muach/action_orderan/').$ord['id_booking'].'/1'; ?>');">Terima</button><button type="button" class="btn btn-danger ml-1" onclick="window.location.replace('<?= base_url('muach/action_orderan/').$ord['id_booking'].'/2'; ?>');">Tolak</button></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div> 

<?php $i=0; foreach ($orderan as $ord) { $i++;?>
  <!-- Modal -->
  <div class="modal fade" id="look<?=$ord['id_booking']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Alamat pelanggan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table>
            <tr>
              <td><?=$ord['nama_user']?></td>
            </tr>
            <tr>
              <td><?=$ord['alamat'].' RT '.$ord['rt'].' RW '.$ord['rw'].' '.$ord['kecamatan']?></td>
            </tr>
            <tr>
              <td>Nomor/WA <?=$ord['nomor']?></td>
            </tr>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- end modal -->
<?php } ?>