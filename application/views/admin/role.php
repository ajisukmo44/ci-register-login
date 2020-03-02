<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class='col-lg-6'>
        <a href="" class="btn btn-success btn-sm mb-3" data-toggle="modal" data-target="#roleModal"> <i class="fas fa-plus"></i> Tambah Data Access</a>
        <table class="table table-hover">

            <?= form_error('menu', '<div class="alert alert-danger" role="alert">',  '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Access</th>
                    <th scope="col">Aksi</th>
                </tr>

            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($access as $r) : ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $r['access']; ?></td>
                        <td>

                            <a href="<?= base_url('admin/roleaccess/') . $r['access_id']; ?>" class="badge badge-success">Access</a>
                            <?php
                            $a = $r['access_id'];
                            $hapus = 'cuk';
                            $link = base_url('Admin/hapusrole/') . $r['access_id'];

                            if ($a != 1) {
                                echo "<a href='$link' class='badge badge-danger'>hapus</a>";
                            }
                            ?>
                        </td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="roleModalLabel">Tambah Data Access</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/role/'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="access" name="access" placeholder="nama role access..">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>