<!DOCTYPE HTML>
<html>
<head>
<title>Watches an E-Commerce online Shopping Category Flat Bootstrap Responsive Website Template| Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Watches Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="{{ asset('asset/frontend/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="{{ asset('asset/frontend/css/style.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ asset('asset/frontend/css/component.css') }}" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--webfont-->
<link href='//fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Dorsa' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="{{ asset('asset/frontend/js/jquery-1.11.1.min.js') }}"></script>
<!-- start menu -->
<link href="{{ asset('asset/frontend/css/megamenu.css') }}" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="{{ asset('asset/frontend/js/megamenu.js') }}"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="{{ asset('asset/frontend/js/jquery.easydropdown.js') }}"></script>
<script src="{{ asset('asset/frontend/js/easyResponsiveTabs.js') }}" type="text/javascript"></script>
		    <script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion           
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
            </script>	
<script src="{{ asset('asset/frontend/js/simpleCart.min.js') }}"> </script>
</head>
<body>
	<div class="men_banner">
   	  <div class="container">
   	  	<div class="header_top">
   	  	   <div class="header_top_left">
	  	    
	          <div class="clearfix"> </div>
	       </div>
           <div class="header_top_right">
		  	 <div class="lang_list">
				<select tabindex="4" class="dropdown">
					<option value="" class="label" value="">$ Us</option>
					<option value="1">Dollar</option>
					<option value="2">Euro</option>
				</select>
			 </div>
			 <ul class="header_user_info">
			  <a class="login" href="{{ url('login')}}">
				<i class="user"> </i> 
				<li class="user_desc">My Account</li>
			  </a>
			  <div class="clearfix"> </div>
		     </ul>
		    <!-- start search-->
				<div class="search-box">
				   <div id="sb-search" class="sb-search">
					  <form>
						 <input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
						 <input class="sb-search-submit" type="submit" value="">
						 <span class="sb-icon-search"> </span>
					  </form>
				    </div>
				 </div>
				 <!----search-scripts---->
				 <script src="{{ asset('asset/frontend/js/classie1.js') }}"></script>
				 <script src="{{ asset('asset/frontend/js/uisearch.js') }}"></script>
				   <script>
					 new UISearch( document.getElementById( 'sb-search' ) );
				   </script>
					<!----//search-scripts---->
		            <div class="clearfix"> </div>
			 </div>
		     <div class="clearfix"> </div>
	  </div>
	  <div class="header_bottom">
	   <div class="logo">
               <h1><a href="{{ url('/') }}"><span class="m_1">P</span>romotions</a></h1>
	   </div>
   	   <div class="menu">
	     <ul class="megamenu skyblue">
			<li><a class="color2" href="{{ url('/') }}">Home</a></li>
                        <li><a class="color4" href="#">Brands</a>
                        <div class="megapanel">
                            <div class="row">
				<div class="col1">
                                    <div class="h_nav">
					<h4>Men</h4>
                                            <ul>
						<li><a href="{{ url('list') }}">Brand 1</a></li>
						<li><a href="{{ url('list') }}">Brand 2</a></li>
                                                <li><a href="{{ url('list') }}">Brand 3</a></li>
						<li><a href="{{ url('list') }}">Brand 4</a></li>
						
                                                
                                            </ul>	
                                    </div>							
				</div>
                            </div>
                        </div>
                        </li>		
			<li class="active grid"><a class="color3" href="{{ url('sale') }}">Sale</a></li>
			<li><a class="color7" href="404.html">Contact</a></li>
			<div class="clearfix"> </div>
			</ul>
			</div>
	        <div class="clearfix"> </div>
	        </div>
	    </div>
   </div>