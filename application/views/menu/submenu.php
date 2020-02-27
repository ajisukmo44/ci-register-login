<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class='col-lg-12'>
        <a href="" class="btn btn-success btn-sm mb-3" data-toggle="modal" data-target="#modalSubMenu">Tambah Data Sub Menu</a>
        <table class="table table-hover">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Url</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>

            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($submenu as $sm) : ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $sm['title']; ?></td>
                        <td><?= $sm['menu']; ?></td>
                        <td><?= $sm['url']; ?></td>
                        <td><?= $sm['icon']; ?></td>
                        <td><?= $sm['status']; ?></td>
                        <td>
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
<div class="modal fade" id="modalSubMenu" tabindex="-1" role="dialog" aria-labelledby="modalSubMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSubMenuLabel">Tambah Data Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="nama title">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu </option>
                            <?php foreach ($menu as $m) : ?>
                                <option value=""><?= $m['menu'] ?> </option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="nama url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="nama icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="status" checked> <label class="form-check-label" for="status"> Aktive? </label>
                        </div>
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