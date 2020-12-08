<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Gambar Barang : <?= $barang->nama_barang ?></h3>

            <div class="card-tools">
                <a href="<?= base_url('barang/add') ?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>
                    Tambah</a>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
                echo $this->session->flashdata('pesan');
                echo '</h5></div>';
            }
            ?>
            <?= form_open_multipart('gambarbarang/add/' . $barang->id_barang);
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

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Ket gambar</label>
                        <input name="ket" class="form-control" placeholder="Ket gambar" value="<?= set_value('nama_barang'); ?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="gambar" id="preview_gambar" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <img src="<?= base_url('assets/gambar-barang/no-image.jpg'); ?>" id="gambar_load" width="200px">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn">Simpan</button>
                <a href="<?= base_url('gambarbarang') ?>" class="btn btn-success">Kembali</a>
            </div>

            <?= form_close() ?>

            <hr>
            <div class="row">
                <?php foreach ($gambar as $key => $value) { ?>
                    <div class="col-sm-3">
                        <div class="form-group text-center">
                            <img src="<?= base_url('assets/gambarbarang/' . $value->gambar); ?>" id="gambar_load" width="250px" height="250px">
                        </div>
                        <p for="">Ket : <?= $value->ket ?></p>
                        <button data-toggle="modal" data-target="#delete<?= $value->id_gambar ?>" class="btn btn-danger btn-xs btn-block"><i class="fas fa-trash"></i> Delete</button>
                    </div>
                <?php } ?>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- Modal delete -->
<?php foreach ($gambar as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_gambar ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">gambar <?= $value->id_gambar ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group text-center">
                        <img src="<?= base_url('assets/gambarbarang/' . $value->gambar); ?>" id="gambar_load" width="250px" height="250px">
                    </div>
                    <h5>Apakah anda yakin akan menghapus gambar ini ?</h5>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <a href="<?= base_url('gambarbarang/delete/' . $value->id_barang . '/' . $value->id_gambar); ?>" class="btn btn-primary">Hapus</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.modal delete -->

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