<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h3>GANTI PASSWORD</h3>

    <hr>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('user/changepassword'); ?> " method="post">

                <div class="form-group">
                    <label for="passwordlama">Password lama</label>
                    <input type="password" class="form-control" id="passwordlama" name="passwordlama" placeholder="password lama ..">
                    <?= form_error('passwordlama', '<small class="text-danger ml-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="newpassword">Password baru</label>
                    <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="password baru ..">
                    <?= form_error('newpassword', '<small class="text-danger ml-3">', '</small>') ?>
                </div>

                <div class="form-group">
                    <label for="newpassword2">Ulangi password baru </label>
                    <input type="password" class="form-control" id="newpassword2" name="newpassword2" placeholder="password baru ..">
                    <?= form_error('newpassword2', '<small class="text-danger ml-3">', '</small>') ?>

                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan </button>

                </div>

            </form>

        </div>
    </div>





</div>
</div>
<!-- End of Main Content -->