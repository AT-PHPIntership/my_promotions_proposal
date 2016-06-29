@extends('frontend.layouts.master')

@section('content')
<div class="men">
    <div class="container">
    	<div class="col-md-4 sidebar_men">
    	  <h3>Business Manager</h3>
    	  <ul class="product-categories color">
                        <li class="cat-item cat-item-42"><a href="{{ url('business') }}">Promotions</a></li>
			<li class="cat-item cat-item-60"><a href="{{ url('business/follower') }}">Follwer</a> <span class="count">(1253)</span></li>
	</div>
    	<div class="col-md-8 mens_right">
    		<div class="dreamcrub">
                    <ul class="breadcrumbs">
                    <li class="home">
                        <h2>Promotions</h2>
                    </li>
                    </ul>
                <div class="clearfix"></div>
		</div>
		<div class="mens-toolbar">
                <div class="sort">
               	   <div class="sort-by">
                       <label><a href="{{ url('business/add_promotion') }}">Create a Promotion</a></label>
		            
		            <a href=""><img src="{{ asset('asset/frontend/images/add.png') }}" alt="" class="v-middle"></a>
                   </div>
    		     </div>
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
                        <th>Title</th>
                        <th colspan="2">Tools</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,</td>
                        <td><a href="#"><button type="button" class="btn btn-warning">Edit</button></a></td>
                        <td><a href="#"><button type="button" class="btn btn-danger">Delete</button></a></td>
                      </tr>
                      <tr>
                        <td>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,</td>
                        <td><a href="#"><button type="button" class="btn btn-warning">Edit</button></a></td>
                        <td><a href="#"><button type="button" class="btn btn-danger">Delete</button></a></td>
                      </tr>
                      <tr>
                        <td>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,</td>
                        <td><a href="#"><button type="button" class="btn btn-warning">Edit</button></a></td>
                        <td><a href="#"><button type="button" class="btn btn-danger">Delete</button></a></td>
                      </tr>
                      <tr>
                        <td>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,</td>
                        <td><a href="#"><button type="button" class="btn btn-warning">Edit</button></a></td>
                        <td><a href="#"><button type="button" class="btn btn-danger">Delete</button></a></td>
                      </tr>
                      <tr>
                        <td>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,</td>
                        <td><a href="#"><button type="button" class="btn btn-warning">Edit</button></a></td>
                        <td><a href="#"><button type="button" class="btn btn-danger">Delete</button></a></td>
                      </tr>
                      <tr>
                        <td>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,</td>
                        <td><a href="#"><button type="button" class="btn btn-warning">Edit</button></a></td>
                        <td><a href="#"><button type="button" class="btn btn-danger">Delete</button></a></td>
                      </tr>
                      <tr>
                        <td>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,</td>
                        <td><a href="#"><button type="button" class="btn btn-warning">Edit</button></a></td>
                        <td><a href="#"><button type="button" class="btn btn-danger">Delete</button></a></td>
                      </tr>
                      <tr>
                        <td>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,</td>
                        <td><a href="#"><button type="button" class="btn btn-warning">Edit</button></a></td>
                        <td><a href="#"><button type="button" class="btn btn-danger">Delete</button></a></td>
                      </tr>
                      <tr>
                        <td>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,</td>
                        <td><a href="#"><button type="button" class="btn btn-warning">Edit</button></a></td>
                        <td><a href="#"><button type="button" class="btn btn-danger">Delete</button></a></td>
                      </tr>
                      <tr>
                        <td>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,</td>
                        <td><a href="#"><button type="button" class="btn btn-warning">Edit</button></a></td>
                        <td><a href="#"><button type="button" class="btn btn-danger">Delete</button></a></td>
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