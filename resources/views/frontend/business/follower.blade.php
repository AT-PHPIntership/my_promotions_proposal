@extends('frontend.layouts.master')

@section('content')
<div class="men">
    <div class="container">
    	<div class="col-md-4 sidebar_men">
    	  <h3>Follower Manager</h3>
    	  <ul class="product-categories color">
                        <li class="cat-item cat-item-42"><a href="{{ url('business') }}">Promotions</a></li>
			<li class="cat-item cat-item-60"><a href="{{ url('business/follower') }}">Follwer</a> <span class="count">(1253)</span></li>
	</div>
    	<div class="col-md-8 mens_right">
    		<div class="dreamcrub">
                    <ul class="breadcrumbs">
                    <li class="home">
                        <h2>Follower</h2>
                    </li>
                    </ul>
                <div class="clearfix"></div>
		</div>
		<div class="mens-toolbar">
                
    	        <ul class="women_pagenation dc_paginationA dc_paginationA06">
			     <li><a href="#" class="previous">Page : </a></li>
			     <li class="active"><a href="#">1</a></li>
			     <li><a href="#">2</a></li>
		  	    </ul>
                <div class="clearfix"></div>		
		</div>
    		<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
                    <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Datetime</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>David Beckham</td>
                        <td>26/06/2016</td>
                      </tr>
                      <tr>
                        <td>David Beckham</td>
                        <td>26/06/2016</td>
                      </tr>
                      <tr>
                        <td>David Beckham</td>
                        <td>26/06/2016</td>
                      </tr>
                      <tr>
                        <td>David Beckham</td>
                        <td>26/06/2016</td>
                      </tr>
                      <tr>
                        <td>David Beckham</td>
                        <td>26/06/2016</td>
                      </tr>
                      <tr>
                        <td>David Beckham</td>
                        <td>26/06/2016</td>
                      </tr>
                      <tr>
                        <td>David Beckham</td>
                        <td>26/06/2016</td>
                      </tr>
                      <tr>
                        <td>David Beckham</td>
                        <td>26/06/2016</td>
                      </tr>
                      <tr>
                        <td>David Beckham</td>
                        <td>26/06/2016</td>
                      </tr>
                      <tr>
                        <td>David Beckham</td>
                        <td>26/06/2016</td>
                      </tr>
                    </tbody>
                  </table>
					<div class="clearfix"></div>
		</div>
		<script src="{{ asset('asset/frontend/js/cbpViewModeSwitch.js') }}" type="text/javascript"></script>
                <script src="{{ asset('asset/frontend/js/classie.js') }}" type="text/javascript'"></script>
    	</div>
    </div>
   </div>
@endsection