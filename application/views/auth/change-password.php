<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-5">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h3 class="h4 text-gray-900" style="font-family:Roboto">FORM UBAH PASSWORD</h3>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <hr>
                                <form class="user" method="post" action="<?= base_url('auth/changepassword'); ?>">
                                    <div class="form-group">
                                        <input type="password" class="form-control " id="password1" name="password1" placeholder="Masukan password baru...">
                                        <?= form_error('password1', '<small class="text-danger pl-1">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control " id="password2" name="password2" placeholder="Ulangi password baru...">
                                        <?= form_error('password2', '<small class="text-danger pl-1">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block">
                                        Ganti Password
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>