<div class="col-lg-3 col-md-4 col-sm-5">
    <h1>{!! trans('labels.category') !!}</h1>
    <div class="list-group table-of-contents">
        @foreach($categories as $category)
            <a class="list-group-item" href="#">{{ $category->name }}</a>
        @endforeach
    </div>
</div>
