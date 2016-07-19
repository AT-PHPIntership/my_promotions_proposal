<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a href="{{ url('/') }}" class="navbar-brand">{!! trans('labels.promotions') !!}</a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">{!! trans('labels.home') !!}</a>
                </li>
                <li>
                    <a href="#">{!! trans('labels.sale') !!}</a>
                </li>
                <li>
                    <a href="#">{!! trans('labels.contact') !!}</a>
                </li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">{!! trans('labels.submit') !!}</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">{!! trans('labels.sign_in') !!}</a></li>
                <li><a href="{!! route('user.get.register') !!}">{!! trans('labels.sign_up') !!}</a></li>
            </ul>

        </div>
    </div>
</div>