<div class="col-lg-3 col-md-4 col-sm-5">
    <h1>{!! trans('labels.list') !!}</h1>
    <div class="list-group table-of-contents">
        <a class="list-group-item" href="{{ route('get.business.follow', [ Auth::user()->id, $id]) }}">{!! trans('labels.user_following') !!}</a>
        <a class="list-group-item" href="{{ route('get.rating',[ Auth::user()->id, $id]) }}">{!! trans('labels.rating') !!}</a>
        <a class="list-group-item" href="{{ route('get.business.promotion', [ Auth::user()->id, $id]) }}">{!! trans('labels.promotion') !!}</a>
    </div>
</div>
