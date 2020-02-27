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
                                    <h1 class="h4 text-gray-900 mb-4">FORM LOGIN</h1>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="post" action="<?= base_url('auth/'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" value="<?= set_value('email'); ?>" placeholder="Masukan email anda..">
                                        <?= form_error('email', '<small class="text-danger ml-3">', '</small>') ?>

                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password" id="Password" placeholder="Isikan password anda..">
                                        <?= form_error('password', '<small class="text-danger ml-3">', '</small>') ?>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-user btn-block">
                                        Masuk
                                    </button>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Lupa Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/register') ?>">Daftar Akun?</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>