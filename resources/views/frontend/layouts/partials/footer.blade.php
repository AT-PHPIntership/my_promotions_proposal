
<footer class="footer-copy">
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
         {!! trans('labels.copy_right') !!}
        </div><!-- /.col-sm-4 -->

        <div class="col-sm-8 text-right">
          <a href="#">{!! trans('labels.promotions') !!}</a>
        </div><!-- /.col-sm-8 -->
      </div><!-- /.row -->
    </div>
</footer>
<script src="{{ asset('frontend/js/bower.js') }}"></script>
<!-- Laravel Javascript Validation -->
<script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
<script>
    var labels= {!! json_encode( trans('labels') ) !!};
    var image= {!! json_encode( config('define.image_default') ) !!};
    var order_number= {!! json_encode( config('define.order_number') ) !!};
    var increment= {!! json_encode( config('define.increment') ) !!};
    var num_column= {!! json_encode( config('define.save_num_column') ) !!};
</script>
@if(Auth::guard('web')->check())
<script src="{{ asset('frontend/js/show_follow.js') }}"></script>
@endif
@yield('script')
</body>
</html>
    
