@extends('frontend.layouts.master')

@section('content')
<div class="account-in">
   	 <div class="container">
   	   <h3>Account</h3>
		<div class="col-md-7 account-top">
		  <form action="{{ url('business') }}">
			<div> 	
				<span>Email*</span>
				<input type="text"> 
			</div>
			<div> 
				<span class="pass">Password*</span>
				<input type="password">
			</div>				
				<input type="submit" value="Login"> 
		   </form>
		</div>
		<div class="col-md-5 left-account ">
			<a href="#"><img class="img-responsive " src="{{ asset('asset/frontend/images/s4.jpg') }}" alt=""/></a>
			<div class="five-in">
			<h1>35% </h1><span>discount</span>
			</div>
			<a href="{{ url('register') }}" class="create">Create an account</a>
			<div class="clearfix"> </div>
		</div>
	    <div class="clearfix"> </div>
	  </div>
   </div>
   <div class="map">
	   <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3150859.767904157!2d-96.62081048651531!3d39.536794757966845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1408111832978"> </iframe>
   </div>
@endsection