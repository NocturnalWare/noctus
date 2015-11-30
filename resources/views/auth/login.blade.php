
<div class="row">
    <center>
        <img src="http://54.149.181.47/images/witeskull.png" class="img-responsive" />
        <form method="POST" action="auth/login">
            {!! csrf_field() !!}

            <div class="col-sm-12">
                <div class="col-sm-12">
                    <label class="en-label">Email</label>
                </div>
                <div class="col-sm-12">
                    <input type="email" name="email" value="{{ old('email') }}">
                </div>
            </div>

            <div class="col-sm-12">
                <div class="col-sm-12">
                    <label class="en-label">Password</label>
                </div>
                <div class="col-sm-12">
                    <input type="password" name="password" id="password">
                </div>
            </div>

            <div class="col-sm-12">
                <input type="checkbox" name="remember"> 
                <span style="color:#fff">Remember Me</span>
            </div>

            <div style="margin-top:20px;">
                <button class="btn btn-sm btn-primary" type="submit">Login</button>
            </div>
        </form>

    </center>
</div>
