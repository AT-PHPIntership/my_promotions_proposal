@extends('frontend.layouts.master')
@section('content')
    <div class="container">
        <div class="page-header" id="banner">
            <div class="row">
                {!! Form::open(['route' => 'postlogin', 'class' => 'form-horizontal'] ) !!}
                    <fieldset>
                        <legend>{!! trans('labels.sign_in') !!}</legend>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('name', trans('labels.email'), ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('email', old('email'), ['placeholder' => 'Email','class' => 'form-control']) !!}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('name', trans('labels.password'), ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::password('password', ['placeholder' => 'Password','class' => 'form-control']) !!}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-2">
                                {!! Form::reset(trans('labels.reset'), ['class'=>'btn btn-default'])!!}
                                {!! Form::submit( trans('labels.submit') , array('class' => 'btn btn-primary')) !!}
                            </div>
                        </div>
                    </fieldset>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection