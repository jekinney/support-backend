<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="login">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{ route('auth.login') }}" method="post">
        {{ csrf_field() }}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title text-center" id="login">Login</h4>
        </div>
        <div class="modal-body">
          @include('users.partials.social_buttons')
          <div class="form-group">
            <label for="reg-email" class="label-control">Email</label>
            <input type="email" id="reg-email" name="reg-email" value="{{ old('reg-email') }}" class="form-control">
          </div>
          <div class="form-group">
            <label for="reg-password" class="label-control">Password</label>
            <input type="password" id="reg-password" name="reg-password" class="form-control">
          </div>
          <div class="form-group text-center">
            <div class="checkbox">
              <label for="remember">
                <input type="checkbox" id="remember" value="remember" checked>
                Remeber Login?
              </label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a href="" class="btn btn-link">Forgot Password?</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
      </form>
    </div>
  </div>
</div>