<div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-labelledby="registration">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{ route('register.create') }}" method="post">
        {{ csrf_field() }}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title text-center" id="registration">Register</h4>
        </div>
        <div class="modal-body">
          @include('users.partials.social_buttons')
          <div class="form-group">
            <label for="reg-name" class="label-control">Name</label>
            <input type="text" id="reg-name" name="reg-name" value="{{ old('reg-name') }}" class="form-control">
          </div>
          <div class="form-group">
            <label for="reg-email" class="label-control">Email</label>
            <input type="email" id="reg-email" name="reg-email" value="{{ old('reg-email') }}" class="form-control">
          </div>
          <div class="form-group">
            <label for="reg-password" class="label-control">Password</label>
            <input type="password" id="reg-password" name="reg-password" class="form-control">
          </div>
          <div class="form-group">
            <label for="reg-password_confirmation" class="label-control">Confirm Password</label>
            <input type="password" id="reg-password_confirmation" name="reg-password_confirmation" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Register</button>
        </div>
      </form>
    </div>
  </div>
</div>