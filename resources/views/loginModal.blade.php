<div id="alert_login_modal" class="modal fade">
    <div class="modal-dialog login-popup modal-login">
        <div class="modal-content">
        <form method="post" id="frm_login" name="frm_login">
                      <div class="modal-header">
                    <h4 class="modal-title">Login</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Username</label>
                         <input type="text" class="form-control" id="username" placeholder="Username" name="username"  required>
                    </div>
                    <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" id="btn_login" value="Login">
                    <!-- <a class="btn btn-link" style="background: #281f41; color:#fff; text-decoration: none; border-radius:3px;" href="{{ url('/signup') }}">Signup</a> -->
                </div>
            </form>
        </div>
    </div>
</div>