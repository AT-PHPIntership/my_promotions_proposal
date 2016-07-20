@extends('frontend.layouts.master')
@section('content')
    <legend>{!! trans('labels.forget_password') !!}</legend>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    {!! Form::open(['route' => 'postemail', 'class' => 'form-horizontal'] ) !!}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        {!! Form::label('email', trans('labels.email'), ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-10">
            {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}

            @if ($errors->has('email'))
                <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            {!! Form::reset( trans('labels.reset') , array('class' => 'btn btn-default')) !!}
            {!! Form::submit( trans('labels.submit') , array('class' => 'btn btn-primary')) !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection