<div class="col-lg-3 col-md-4 col-sm-5">
    <h1>{!! trans('labels.category') !!}</h1>
    <div class="list-group table-of-contents">
            @foreach($categories as $key => $category)
                <a class="list-group-item" href="{{ route('get.category', $key) }}">{{ $category }}</a>
            @endforeach
    </div>
    @if(Auth::guard('web')->check())
        @include('frontend.follow.index')
    @endif
</div>
