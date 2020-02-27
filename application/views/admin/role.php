<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class='col-lg-6'>
        <a href="" class="btn btn-success btn-sm mb-3" data-toggle="modal" data-target="#roleModal">Tambah Data</a>
        <table class="table table-hover">

            <?= form_error('menu', '<div class="alert alert-danger" role="alert">',  '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Menu</th>
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
                            <a href="" class="badge badge-warning">Edit</a>
                            <a href="" class="badge badge-danger">Hapus</a>

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
                <h5 class="modal-title" id="roleModalLabel">Tambah Data Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('role'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="nama menu">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>