@extends('frontend.layouts.master')

@section('content')
<div class="men">
    <div class="container">
    	<div class="col-md-4 sidebar_men">
    	  <h3>Categories</h3>
    	  <ul class="product-categories color"><li class="cat-item cat-item-42"><a href="#">Dresses</a> <span class="count">(14)</span></li>
			<li class="cat-item cat-item-60"><a href="#">Glasses</a> <span class="count">(2)</span></li>
			<li class="cat-item cat-item-63"><a href="#">Gloves</a> <span class="count">(2)</span></li>
			<li class="cat-item cat-item-54"><a href="#">Jeans</a> <span class="count">(8)</span></li>
			<li class="cat-item cat-item-55"><a href="#">Shoes</a> <span class="count">(11)</span></li>
			<li class="cat-item cat-item-64"><a href="#">Shorts</a> <span class="count">(3)</span></li>
			<li class="cat-item cat-item-61"><a href="#">Skirts</a> <span class="count">(3)</span></li>
			<li class="cat-item cat-item-56"><a href="#">Sweaters</a> <span class="count">(6)</span></li>
			<li class="cat-item cat-item-57"><a href="#">T-Shirts</a> <span class="count">(13)</span></li>
			<li class="cat-item cat-item-58"><a href="#">Tops</a> <span class="count">(7)</span></li>
			<li class="cat-item cat-item-62"><a href="#">Watchers</a> <span class="count">(2)</span></li>
			<li class="cat-item cat-item-41"><a href="#">Women</a> <span class="count">(17)</span></li>
	  </ul>
	</div>
    	<div class="col-md-8 mens_right">
    		<div class="dreamcrub">
			   	<ul class="breadcrumbs">
                    <li class="home">
                       <a href="{{ url('/') }}" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="home">&nbsp;
                        Men / Women&nbsp;
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="{{ url('/') }}">Back to Previous Page</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			   <div class="mens-toolbar">
                 <div class="sort">
               	   <div class="sort-by">
		            <label>Sort By</label>
		            <select>
		                            <option value="">
		                    Position                </option>
		                            <option value="">
		                    Name                </option>
		                            <option value="">
		                    Price                </option>
		            </select>
		            <a href=""><img src="{{ asset('asset/frontend/images/arrow2.gif') }}" alt="" class="v-middle"></a>
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
					<div class="cbp-vm-options">
						<a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid" title="grid">Grid View</a>
						<a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list" title="list">List View</a>
					</div>
					<div class="pages">   
        	 <div class="limiter visible-desktop">
               <label>Show</label>
                  <select>
                            <option value="" selected="selected">
                    9                </option>
                            <option value="">
                    15                </option>
                            <option value="">
                    30                </option>
                  </select> per page        
               </div>
       	   </div>
					<div class="clearfix"></div>
					<ul>
					  <li class="simpleCart_shelfItem">
							<a class="cbp-vm-image" href="single.html">
							 <div class="view view-first">
					   		  <div class="inner_content clearfix">
								<div class="product_image">
									<div class="mask1"><img src="{{ asset('asset/frontend/images/m1.jpg') }}" alt="image" class="img-responsive zoom-img"></div>
									<div class="mask">
			                       		<div class="info">Quick View</div>
					                 </div>
					                 <div class="product_container">
									   <h4>Lorem 2016</h4>
									   <p>Dresses</p>
									   <div class="price mount item_price">$99.00</div>
									   <a class="button item_add cbp-vm-icon cbp-vm-add" href="{{ url('details') }}">View Details</a>
									 </div>		
								  </div>
			                     </div>
		                      </div>
		                    </a>
						</li>
						<li class="simpleCart_shelfItem">
							<a class="cbp-vm-image" href="single.html">
							  <div class="view view-first">
					   		  <div class="inner_content clearfix">
								<div class="product_image">
									<div class="mask1"><img src="{{ asset('asset/frontend/images/m1.jpg') }}" alt="image" class="img-responsive zoom-img"></div>
									 <div class="mask">
			                       		<div class="info">Quick View</div>
					                  </div>
									 <div class="product_container">
									   <h4>Lorem 2016</h4>
									   <p>Dresses</p>
									   <div class="price mount item_price">$99.00</div>
									   <a class="button item_add cbp-vm-icon cbp-vm-add" href="{{ url('details') }}">View Details</a>
									 </div>		
								  </div>
			                     </div>
		                      </div>
							 </a>
						</li>
						<li class="last simpleCart_shelfItem">
							<a class="cbp-vm-image" href="single.html">
								<div class="view view-first">
					   		  <div class="inner_content clearfix">
								<div class="product_image">
									<div class="mask1"><img src="{{ asset('asset/frontend/images/m1.jpg') }}" alt="image" class="img-responsive zoom-img"></div>
									<div class="mask">
			                       		<div class="info">Quick View</div>
					                  </div>
									<div class="product_container">
									   <h4>Lorem 2016</h4>
									   <p>Dresses</p>
									    <div class="price mount item_price">$99.00</div>
									    <a class="button item_add cbp-vm-icon cbp-vm-add" href="{{ url('details') }}">View Details</a>
									 </div>		
								  </div>
			                     </div>
		                      </div>
							</a>
						</li>
						<li class="simpleCart_shelfItem">
							<a class="cbp-vm-image" href="single.html">
								<div class="view view-first">
					   		  <div class="inner_content clearfix">
								<div class="product_image">
									<div class="mask1"><img src="{{ asset('asset/frontend/images/m1.jpg') }}" alt="image" class="img-responsive zoom-img"></div>
									<div class="mask">
			                       		<div class="info">Quick View</div>
					                  </div>
									<div class="product_container">
									   <h4>Lorem 2016</h4>
									   <p>Dresses</p>
									   <div class="price mount item_price">$99.00</div>
									    <a class="button item_add cbp-vm-icon cbp-vm-add" href="{{ url('details') }}">View Details</a>
									 </div>		
								  </div>
			                     </div>
		                      </div>
							</a>
						</li>
						<li class="simpleCart_shelfItem">
							<a class="cbp-vm-image" href="single.html">
								<div class="view view-first">
					   		  <div class="inner_content clearfix">
								<div class="product_image">
									<div class="mask1"><img src="{{ asset('asset/frontend/images/m1.jpg') }}" alt="image" class="img-responsive zoom-img"></div>
									<div class="mask">
			                       		<div class="info">Quick View</div>
					                  </div>
									<div class="product_container">
									   <h4>Lorem 2016</h4>
									   <p>Dresses</p>
									    <div class="price mount item_price">$99.00</div>
									    <a class="button item_add cbp-vm-icon cbp-vm-add" href="{{ url('details') }}">View Details</a>
									 </div>		
								  </div>
			                     </div>
		                      </div>
							</a>
						</li>
						<li class="last simpleCart_shelfItem">
							<a class="cbp-vm-image" href="single.html">
								<div class="view view-first">
					   		  <div class="inner_content clearfix">
								<div class="product_image">
									<div class="mask1"><img src="{{ asset('asset/frontend/images/m1.jpg') }}" alt="image" class="img-responsive zoom-img"></div>
									<div class="mask">
			                       		<div class="info">Quick View</div>
					                  </div>
									<div class="product_container">
									   <h4>Lorem 2016</h4>
									   <p>Dresses</p>
									    <div class="price mount item_price">$99.00</div>
									    <a class="button item_add cbp-vm-icon cbp-vm-add" href="{{ url('details') }}">View Details</a>
									 </div>		
								  </div>
			                     </div>
		                      </div>
							</a>
						</li>
					</ul>
				</div>
				<script src="{{ asset('asset/frontend/js/cbpViewModeSwitch.js') }}" type="text/javascript"></script>
                <script src="{{ asset('asset/frontend/js/classie.js') }}" type="text/javascript'"></script>
    	</div>
    </div>
   </div>
@endsection