@extends('frontend.layouts.master')

@section('content')
<div class="account-in">
   	  <div class="container">
   	     <form> 
		   <div class="register-top-grid">
			<h2>BUSINESS INFORMATION</h2>
			 <div>
				<span>Business Name<label>*</label></span>
				<input type="text" name="txtbname"> 
			 </div>
			 <div>
				 <span>Phone Number <label>&nbsp;</label></span>
				 <input type="text" name="txtphone"> 
			 </div>
			 <div>
				 <span>Email Address<label>*</label></span>
				 <input type="text" name ="txtemail"> 
			 </div>
                         <div>
				 <span>Contact Address <label>&nbsp;</label></span>
				 <input type="text" name="txtaddress"> 
			 </div>
                         <div>
				 <span>City <label>&nbsp;</label></span>
                                 <div class="quantity_box">
					<div class="product-qty">
					   <select  name="txtcity">
						 <option>Ha Noi</option>
						 <option>Da Nang</option>
						 <option>Ho Chi Minh</option>
					   </select>
                                        </div>
                                </div>
                                 
			 </div>
                         <div>
				 <span>County <label>&nbsp;</label></span>
                                 <div class="quantity_box">
					<div class="product-qty">
					   <select  name="txtcounty">
                                                 <option>Hoan Kiem</option>
						 <option>Dong Da</option>
					   </select>
                                        </div>
                                </div>
			 </div>
                         <div>
				 <span>Description <label>*</label></span>
                                 <textarea name="txtdesc" rows="5"></textarea>
			 </div>

                         <div>
				 <span>Logo <label>&nbsp;</label></span>
				 <input type="file" name="logoimg"> 
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
   <div class="map">
	   <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3150859.767904157!2d-96.62081048651531!3d39.536794757966845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1408111832978"> </iframe>
   </div>
@endsection