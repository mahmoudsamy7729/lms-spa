<div>
    <x-slot name="title">
        LMS - LOGIN
    </x-slot>
    <div class="wrapper">
        <div class="">
          <div class="row g-0 m-0">
            <div class="col-xl-6 col-lg-12">
              <div class="login-cover-wrapper">
                <div class="card shadow-none">
                  <div class="card-body">
                    <div class="text-center">
                      <h4>Sign In</h4>
                      <p>Sign In to your account</p>
                    </div>
                    <form class="form-body row g-3" wire:submit.prevent="login">
                      <div class="col-12">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" wire:model.lazy = "email" id="inputEmail" required>
                      </div>
                      <div class="col-12">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" class="form-control"  wire:model.lazy = "password" id="inputPassword" required>
                      </div>
                      <div class="col-12 col-lg-6">
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckRemember">
                          <label class="form-check-label" for="flexSwitchCheckRemember">Remember Me</label>
                        </div>
                      </div>
                      <div class="col-12 col-lg-6 text-end">
                        <a href="#">Forgot Password?</a>
                      </div>
                      <div class="col-12 col-lg-12">
                        <div class="d-grid">
                          <button type="submit" class="btn btn-primary">Sign In</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-12">
              <div class="position-fixed top-0 h-100 d-xl-block d-none login-cover-img">
              </div>
            </div>
          </div>
          <!--end row-->
        </div>
      </div>
</div>
