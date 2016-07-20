@extends('frontend.layouts.master)
@section('content')
    <div class="container">
        <div class="page-header" id="banner">
            <div class="row">
                {!! Form::open(['route' => 'user.post.register', 'class' => 'form-horizontal'] ) !!}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::label('name', trans('labels.username'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}

                        @if ($errors->has('name'))
                            <span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
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
                {!! Form::close !!}
            </div>
        </div>
    </div>
@endsection