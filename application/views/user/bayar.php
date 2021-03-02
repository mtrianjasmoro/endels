<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style type="text/css">

  .loader {
    border: 16px solid #f3f3f3; /* Light grey */
    border-top: 16px solid #72380e; /* Blue */
    border-radius: 50%;
    width: 120px;
    height: 120px;
    animation: spin 2s linear infinite;
  }

  .loadermini {
    border: 4px solid #f3f3f3;
    border-radius: 50%;
    border-top: 4px solid #72380e;
    width: 12px;
    height: 12px;
    -webkit-animation: spin 1s linear infinite; /* Safari */
    animation: spin 1s linear infinite;


    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
  </style>
  <div class="container" id="loading">
    <div class="row">
      <div class="loader col-md-2 col-md-offset-5"></div>
    </div>
  </div>

  <div class="container" id="buy" hidden>
    <div class="panel panel-default">
      <div class="panel-heading text-center">Pembayaran dan pengiriman</div>
      <div class="panel-body">
        <?php 
        $hiddena = array('id_barang' => $toko['id_produk'], 'id_user' => $pembeli['id_user'],'alamat' => $pembeli['alamat'],'rt' => $pembeli['rt'],'rw' => $pembeli['rw'],'kelurahan' => $pembeli['kelurahan'],'kecamatan' => $pembeli['kecamatan']);
        echo form_open('skincare/beli', 'id=f_bayar', $hiddena);       
        ?>
        <table style="width: 100%">
          <tr>
            <td>Produk</td>
            <td>: <?=$toko['nama_produk']?></td>
          </tr>
          <tr>
            <td>Harga</td>
            <td>: Rp. <?=number_format($toko['harga'],'0','','.');?></td>
          </tr>
          <tr>
            <td>Banyak</td>
            <td><input type="number" name="banyak" id="banyak" min="1" max="<?=$toko['jumlah']?>" value="1" class="form-control"></td>
          </tr>
          <tr>
            <td>Berat</td>
            <td >: <?=$toko['berat']?> gram</td>
          </tr>
          <tr id="toko">
            <td>Dikirim dari</td>
            <td>: <?=$toko['alamat_toko']?></td>
            <td> Kecamatan: <?=$toko['kecamatan']?></td>
          </tr>
          <tr style="border-top: 1px solid black;">
            <td rowspan="3">Dikirim Ke</td>
            <td>: <?=$pembeli['alamat']?></td>
            <td> RT: <?=$pembeli['rt']?></td>
            <td> RW: <?=$pembeli['rw']?></td>
            <td> Kecamatan: <?=$pembeli['kecamatan']?></td>
          </tr>
          <tr id="beli"> 
          </tr>
          <tr>
            <td>Nomor telp: <?=$pembeli['nomor']?></td>
          </tr>
          <tr>
            <td>pilih kurir</td>
            <td>
              <select class="form-control" id="kurir" name="kurir">
                <option value=""> Pilih Kurir</option>
                <option value="jne">JNE</option>
                <option value="tiki">TIKI</option>
                <option value="pos">POS Indonesia</option>
              </select>
            </td>
            <td>
              <div class="loadermini" id="loadermini" hidden></div>
            </td>
          </tr>
          <tr>
            <td>Jenis pengiriman</td>
            <td>
              <select class="form-control" id="jenis_pengiriman" disabled>
                <option value=""> Jenis pengiriman</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><b>Total</b></td>
            <td><b><div id="total"></div></b></td>
          </tr>
        </table>
        <div id="hid"></div>
        <div id="hid_prov"></div>
        <button type="submit" class="btn btn-success-modal col-md-12" disabled id="btn_ok">Bayar</button>

      </from>
    </div>
  </div>

</div>

<script type="text/javascript">

  // tamapil hasil kota&kabupaten dari raja ongkir
  getKota1();
  getKota2();

  // pilih jenis pengiriman->hitung total harga (harga barang*jumlah barang+ ongkir)->enable tombol bayar
  $("#jenis_pengiriman").on("change", function(e){
    e.preventDefault();
    var option = parseInt($('option:selected', this).val())+(parseInt(document.getElementById("banyak").value)*parseInt(<?=$toko['harga']?>));
    var uang = (option/1000).toFixed(3);
    var paket = $('option:selected', this).text().split("(")[0];

    document.getElementById("hid").innerHTML = "<input type='hidden' name='total_harga' value='"+uang+"'><input type='hidden' name='paket' value='"+paket+"'>";
    document.getElementById("total").innerHTML = ": Rp. "+uang;    
    document.getElementById("btn_ok").disabled = false;


  });

  // pilih kurir->menghitung biaya ongkir(kota asal, kota tujuan, berat) integrasi api RajaOngkir->enable jenis pengiriman
  $("#kurir").on("change", function(e){
    e.preventDefault();
    var option = $('option:selected', this).val(); 

    var origin = <?=$toko['kabupaten']?>;
    var des = <?=$pembeli['kabupaten']?>;
    var qty = <?=$toko['berat']?>;


    if(qty==='0' || qty==='')
    {
      alert('null 1');
    }
    else if(option==='')
    {
      alert('null 2');        
    }
    else
    {                   
      getOrigin(origin,des,qty,option);
    }
  });

  // merubah data mysql kab&provinsi dari angka ke huruf untuk penjual
  function getKota1() {
    var prov = <?=$toko['provinsi']?>;
    var kot = <?=$toko['kabupaten']?>;
    var row = document.getElementById("toko"); 
    var x = row.insertCell(3);
    var y = row.insertCell(4);

    $.getJSON("../ongkir/kota/"+prov, function(data){      
      $.each(data, function(i,field){  

        if (field.city_id == kot) {
          console.log(field.city_name);
          console.log(field.province); 
          x.innerHTML = "Kabupaten/Kota: "+field.city_name;
          y.innerHTML = "Provinsi: "+field.province;
        }       

      });

    });

  }

  // merubah data mysql kab&provinsi dari angka ke huruf untuk pembeli
  // tampil data->hideen loading jika semua data siap
  function getKota2() {
    var row = document.getElementById("beli"); 
    var x = row.insertCell(0);
    var y = row.insertCell(1);

    $.getJSON("../ongkir/kota/"+11, function(data){      
      $.each(data, function(i,field){  

        if (field.city_id == 256) {
          console.log(field.city_name);
          console.log(field.province); 
          x.innerHTML = "Kabupaten/Kota: "+field.city_name;
          y.innerHTML = "Provinsi: "+field.province;
          document.getElementById("hid_prov").innerHTML = "<input type='hidden' name='kabupaten' value='"+field.city_name+"'><input type='hidden' name='provinsi' value='"+field.province+"'>";
          $("#buy").show();
          $("#loading").hide();
        }       

      });

    });

  }

  // menghitung ongkir dari api RajaOngkir->menampilkan data kurir&biaya&estimasi waktu
  function getOrigin(origin,des,qty,cour) {
    var $op = $("#jenis_pengiriman"); 
    var i, j, x = "";
    $("#loadermini").show();

    $.getJSON("../ongkir/tarif/"+origin+"/"+des+"/"+qty+"/"+cour, function(data){     
      $.each(data, function(i,field){  

        for(i in field.costs)
        {

          for (j in field.costs[i].cost) {

                $op.append('<option value="'+field.costs[i].cost[j].value+'">'+field.costs[i].service+'( Rp. '+(field.costs[i].cost[j].value/1000).toFixed(3)+' Sampai '+field.costs[i].cost[j].etd+' hari)'+'</option>');
              }

            }
            document.getElementById("jenis_pengiriman").disabled = false;
            $("#loadermini").hide();

          });
    });

  }


</script>

