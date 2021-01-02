<!-- Main content -->
<div class="invoice p-3 mb-3">
  <!-- title row -->
  <div class="row">
    <div class="col-12">
      <h4>
        <i class="fas fa-shopping-cart"></i> Cekout
        <small class="float-right">Date: 2/10/2014</small>
      </h4>
    </div>
    <!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      From
      <address>
        <strong>Admin, Inc.</strong><br>
        795 Folsom Ave, Suite 600<br>
        San Francisco, CA 94107<br>
        Phone: (804) 123-5432<br>
        Email: info@almasaeedstudio.com
      </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">

    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
      <b>Invoice #007612</b><br>
      <br>
      <b>Order ID:</b> 4F3S8J<br>
      <b>Payment Due:</b> 2/22/2014<br>
      <b>Account:</b> 968-34567
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Table row -->
  <div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Qty</th>
            <th width="150px" class="text-center">Harga</th>
            <th>Barang</th>
            <th>Total Harga</th>
            <th>Berat</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $i = 1;
          $total_berat = 0;
          foreach ($this->cart->contents() as $items) {
            $barang = $this->m_home->detail_barang($items['id']);
            $berat = $items['qty'] * $barang->berat;
            $total_berat = $total_berat + $berat;
          ?>

            <tr>
              <td><?php echo $items['qty']; ?></td>
              <td style="text-center">Rp. <?php echo number_format($items['price'], 0); ?></td>
              <td><?php echo $items['name']; ?></td>
              <td style="text-center">Rp. <?php echo number_format($items['subtotal'], 0); ?></td>
              <td style="text-center"><?= $berat ?> Gr</td>
            </tr>
          <?php } ?>

        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <div class="row">
    <!-- accepted payments column -->
    <div class="col-sm-8 invoice-col">
      Tujuan
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>Provinsi</label>
            <select name="provinsi" class="form-control"></select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Kota/Kabupaten</label>
            <select name="kota" class="form-control"></select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Ekspedisi</label>
            <select name="ekspedisi" class="form-control"></select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Paket</label>
            <select name="paket" class="form-control"></select>
          </div>
        </div>
      </div>
    </div>
    <!-- /.col -->
    <div class="col-4">
      <div class="table-responsive">
        <table class="table">
          <tr>
            <th style="width:50%">Subtotal:</th>
            <td>Rp. <?php echo number_format($this->cart->total(), 0); ?></td>
          </tr>
          <tr>
            <th>Berat:</th>
            <td><?= $total_berat; ?> Gr</td>
          </tr>
          <tr>
            <th>Ongkir:</th>
            <td><label>0</label></td>
          </tr>
          <tr>
            <th>Total Bayar:</th>
            <td><label>0</label></td>
          </tr>
        </table>
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- this row will not appear when printing -->
  <div class="row no-print">
    <div class="col-12">
      <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>

      <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
        <i class="fas fa-shopping-cart"></i> Proses Cekout
      </button>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    //masukkan data ke select provinsi
    $.ajax({
      type: "POST",
      url: "<?= base_url('rajaongkir/provinsi') ?>",
      success: function(hasil_provinsi) {
        // console.log(hasil_provinsi);
        $("select[name = provinsi]").html(hasil_provinsi);
      }
    });
    //masukkan data ke select kota
    $("select[name=provinsi]").on("change", function() {
      var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
      $.ajax({
        type: "POST",
        url: "<?= base_url('rajaongkir/kota') ?>",
        data: 'id_provinsi=' + id_provinsi_terpilih,
        success: function(hasil_kota) {
          // console.log(hasil_kota);
          $("select[name = kota]").html(hasil_kota);
        }
      });
    });
  });
</script>