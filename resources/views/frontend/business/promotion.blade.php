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
    		<form> 
		   <div class="register-top-grid" >
			<h2>Create a Promotion</h2>
			 <div>
				<span>Title<label>*</label></span>
				<textarea name="txttile" rows="5"></textarea>
			 </div>
			 <div>
				<span>Intro<label>*</label></span>
                                <textarea name="txtintro" rows="5"></textarea>
                         </div>
			 <div >
				 <span>Content<label>*</label></span>
                                 <textarea name="txtcontent" rows="5"></textarea>
			 </div>
			 <div class="clearfix"> </div>
			   
			 </div>
		     
		  </form>
		<div class="clearfix"> </div>
		<div class="register-but">
		   <form>
			   <input type="submit" value="submit">
			   <div class="clearfix"> </div>
		   </form>
		</div>
    	</div>
    </div>
   </div>
@endsection