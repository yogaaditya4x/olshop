<div class="col-md-12">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Data User</h3>

      <div class="card-tools">
        <button data-toggle="modal" data-target="#add" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>
          Tambah</button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <?php
      if ($this->session->flashdata('pesan')) {
        echo '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Success !</h5>';
        echo $this->session->flashdata('pesan');
        echo '</div>';
      }
      ?>
      <table class="table table-bordered" id="example1">
        <thead class="text-center">
          <tr>
            <th>No. </th>
            <th>Nama User</th>
            <th>Username</th>
            <th>Password</th>
            <th>Level User</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($user as $key => $value) { ?>
            <tr>
              <td class="text-center"><?= $no++; ?></td>
              <td><?= $value->nama_user ?></td>
              <td><?= $value->username ?></td>
              <td><?= $value->password ?></td>
              <td class="text-center"><?php
                                      if ($value->level_user == 1) {
                                        echo '<span class="badge bg-danger">Admin</span>';
                                      } else {
                                        echo '<span class="badge bg-warning">User</span>';
                                      } ?>
              </td>
              <td class="text-center">
                <button class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $value->id_user ?>"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $value->id_user ?>"><i class="fas fa-trash"></i></button>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>

<!-- Modal add -->
<div class="modal fade" id="add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah user</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?=
          form_open('user/add');
        ?>
        <div class="form-group">
          <label>Nama user</label>
          <input type="text" name="nama_user" class="form-control" placeholder="Nama user" required>
        </div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="text" name="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="form-group">
          <label>Level user</label>
          <select name="level_user" class="form-control">
            <option value="1">Admin</option>
            <option value="2">User</option>
          </select>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      <?=
        form_close();
      ?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal add -->

<!-- Modal edit -->
<?php foreach ($user as $key => $value) { ?>
  <div class="modal fade" id="edit<?= $value->id_user ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit user</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?=
            form_open('user/edit/' . $value->id_user);
          ?>
          <div class="form-group">
            <label>Nama user</label>
            <input type="text" name="nama_user" value="<?= $value->nama_user ?>" class="form-control" placeholder="Nama user" required>
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" value="<?= $value->username ?>" class="form-control" placeholder="Username" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" value="<?= $value->password ?>" class="form-control" placeholder="Password" required>
          </div>
          <div class="form-group">
            <label>Level user</label>
            <select name="level_user" class="form-control">
              <option value="1" <?php if ($value->level_user == 1) {
                                  echo 'selected';
                                } ?>>Admin</option>
              <option value="2" <?php if ($value->level_user == 2) {
                                  echo 'selected';
                                } ?>>User</option>
            </select>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <?=
          form_close();
        ?>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php } ?>
<!-- /.modal edit -->

<!-- Modal delete -->
<?php foreach ($user as $key => $value) { ?>
  <div class="modal fade" id="delete<?= $value->id_user ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">User <?= $value->nama_user ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h5>Apakah anda yakin akan menghapus akun ini ?</h5>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <a href="<?= base_url('user/delete/' . $value->id_user); ?>" class="btn btn-primary">Hapus</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php } ?>
<!-- /.modal delete -->