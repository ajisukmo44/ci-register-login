<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h3>EDIT SUBMENU</h3>
    <hr>
    <div class="row">
        <div class="col-lg-8">
            <?= form_open_multipart('menu/editsubmenu'); ?>

            <input type="hidden" class="form-control" id="id" name="id" value="<?= $submenu['id'] ?>">
            <input type="hidden" class="form-control" id="menu_id" name="menu_id" value="<?= $submenu['menu_id'] ?>">
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" value="<?= $submenu['title']; ?>">
                    <?= form_error('title', '<small class="text-danger ml-3">', '</small>') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="url" class="col-sm-2 col-form-label">Url</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="url" name="url" value="<?= $submenu['url']; ?>">
                    <?= form_error('url', '<small class="text-danger ml-3">', '</small>') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="icon" class="col-sm-2 col-form-label">Icon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="icon" name="icon" value="<?= $submenu['icon']; ?>">
                    <?= form_error('icon', '<small class="text-danger ml-3">', '</small>') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="status" name="status" min="0" max="1" value="<?= $submenu['status']; ?>">
                    <?= form_error('status', '<small class="text-danger ml-3">', '</small>') ?>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update Submenu</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>


</div>
<!-- End of Main Content -->