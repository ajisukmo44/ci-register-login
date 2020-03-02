<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h3>EDIT MENU</h3>

    <hr>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('menu/editmenu'); ?> " method="post">
                <div class="form-group">
                    <label for="menu">Nama Menu</label>
                    <input type="hidden" class="form-control" id="menu_id" name="menu_id" value="<?= $menu['menu_id'] ?>">
                    <input type="text" class="form-control" id="menu" name="menu" value="<?= $menu['menu'] ?>">
                    <?= form_error('menu', '<small class="text-danger ml-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update </button>

                </div>

            </form>

        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->