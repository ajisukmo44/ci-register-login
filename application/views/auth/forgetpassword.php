<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-lg-5 mt-5">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h3 class="h4 text-gray-900 mb-4" style="font-family:Roboto">LUPA PASSWORD?</h3>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="post" action="<?= base_url('auth/forgetpassword'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>" placeholder="Masukan email anda..">
                                        <?= form_error('email', '<small class="text-danger ml-3">', '</small>') ?>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block">
                                        Reset Password
                                    </button>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/') ?>">
                                            Kembali !</a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>