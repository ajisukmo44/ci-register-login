  <div class="container">

      <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
          <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                  <div class="col-lg">
                      <div class="p-5">
                          <div class="text-center">
                              <h1 class="h4 text-gray-900 mb-4">FORM REGISTER</h1>
                          </div>
                          <form class="user" method="post" action="<?= base_url('auth/register'); ?>">
                              <div class="form-group">
                                  <input type="name" class="form-control form-control-user" name="name" id="name" value="<?= set_value('name'); ?>" placeholder="Nama anda..">
                                  <?= form_error('name', '<small class="text-danger ml-3">', '</small>') ?>
                              </div>
                              <div class="form-group">
                                  <input type="text" class="form-control form-control-user" name="email" id="email" value="<?= set_value('email'); ?>" placeholder="Email anda..">
                                  <?= form_error('email', '<small class="text-danger ml-3">', '</small>') ?>
                              </div>
                              <div class="form-group row">
                                  <div class="col-sm-6 mb-3 mb-sm-0">
                                      <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Isikan password..">
                                      <?= form_error('password1', '<small class="text-danger ml-3">', '</small>') ?>
                                  </div>
                                  <div class="col-sm-6">
                                      <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Isikan password anda lagi..">
                                  </div>
                              </div>
                              <button type="submit" class="btn btn-success btn-user btn-block">
                                  daftar Akun
                              </button>
                          </form>
                          <hr>
                          <div class="text-center">
                              <a class="small" href="forgot-password.html">Lupa Password?</a>
                          </div>
                          <div class="text-center">
                              <a class="small" href="<?= base_url('auth') ?>">Sudah memiliki akun? </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

  </div>