<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{!! trans('labels.title_login') !!}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('asset/backend/bootstrap/css/bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('asset/backend/dist/css/AdminLTE.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('asset/backend/plugins/iCheck/square/blue.css') }}">
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="{{ url('admin/login') }}"><b>{!! trans('labels.title_my') !!}</b>{!! trans('labels.title_promotion') !!}</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">{!! trans('labels.title_signin') !!}</p>
        <form action="{{ url('admin/login') }}" method="post">
        {{ csrf_field() }}
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
            <input id="password" type="password" class="form-control" name="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck" style="margin-left: 20px">
                <label>
                  <input type="checkbox" name="remember"> {!! trans('labels.title_remember') !!}
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">
                    {!! trans('labels.btn_signin') !!}
                </button>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('asset/backend/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('asset/backend/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('asset/backend/plugins/iCheck/bootstrap.min.js') }}"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
