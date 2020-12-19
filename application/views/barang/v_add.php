<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form tambah barang</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?= form_open_multipart('barang/add');
            //  Notifikasi form kosong
            echo validation_errors('<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i>', '</h5></div>');
            // Notifikasi gagal upload gambar
            if (isset($error_upload)) {
                echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i>' . $error_upload . '</h5></div>';
            }
            ?>

            <div class="form-group">
                <label>Nama barang</label>
                <input name="nama_barang" class="form-control" placeholder="Nama barang" value="<?= set_value('nama_barang'); ?>">
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="id_kategori" class="form-control">
                            <option value="">--Pilih Kategori--</option>
                            <?php foreach ($kategori as $key => $value) { ?>
                                <option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Harga</label>
                        <input name="harga" class="form-control" placeholder="Harga barang" value="<?= set_value('harga'); ?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Berat (Gr)</label>
                        <input type="number" min="0" name="berat" class="form-control" placeholder="Berat dalam satuan gram" value="<?= set_value('berat'); ?>">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Deskripsi barang</label>
                <textarea name="deskripsi" class="form-control" rows="5" placeholder="Deskripsi barang"><?= set_value('deskripsi'); ?></textarea>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="gambar" id="preview_gambar" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <img src="<?= base_url('assets/gambar-barang/no-image.jpg'); ?>" id="gambar_load" width="200px">
                    </div>
                </div>
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary btn">Simpan</button>
                <a href="<?= base_url('barang') ?>" class="btn btn-success">Kembali</a>
            </div>


            <?= form_close() ?>
        </div>
    </div>
</div>

<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#preview_gambar").change(function() {
        bacaGambar(this);
    })
</script>