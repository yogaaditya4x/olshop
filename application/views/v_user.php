<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data User</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>
                  Add</button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
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
                                <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                            <td>
                                
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