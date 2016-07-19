
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
@yield('script')
</body>
</html>