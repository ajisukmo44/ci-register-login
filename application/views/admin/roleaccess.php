<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class='col-lg-6'>
        <table class="table table-hover">

            <?= $this->session->flashdata('message'); ?>
            <h5>Role: <?= $access['access']; ?></h5>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Aksi</th>
                </tr>

            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($menu as $m) : ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $m['menu']; ?></td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" <?= check_access($access['access_id'], $m['menu_id']); ?> data-access="<?= $access['access_id']; ?>" data-menu="<?= $m['menu_id']; ?>">
                            </div>
    </div>

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