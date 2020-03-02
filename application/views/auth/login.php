<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-lg-5 mt-4">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <img src="<?= base_url('assets/img/ci.png'); ?>" style="width: 70px">
                                    <h3 class=" h3 text-gray-900 mb-4" style="font-family:Roboto">FORM LOGIN</h3>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="post" action="<?= base_url('auth/'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control " id="email" name="email" value="<?= set_value('email'); ?>" placeholder="Masukan email anda..">
                                        <?= form_error('email', '<small class="text-danger ml-1">', '</small>') ?>

                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control " name="password" id="Password" placeholder="Isikan password anda..">
                                        <?= form_error('password', '<small class="text-danger ml-1">', '</small>') ?>
                                    </div><button type="submit" class="btn btn-success  btn-block">
                                        MASUK
                                    </button>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/forgetpassword'); ?>">Lupa Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/register') ?>">Daftar Akun?</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <p style="text-align:center">admin = admin@gmail.com | 123456</p>
        </div>

    </div>

</div>