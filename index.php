<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from themewagon.github.io/carbook/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Nov 2024 11:15:25 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
  <?php include("includes/header.php");
  $selQry = "SELECT * FROM tbl_vehicles limit 4;";
  $resQry =$crud->getData($selQry);

 
  ?>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

  <body>
  <?php include("includes/navbar.php")?>
    
	 
    <!-- END nav -->
    
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('https://static.vecteezy.com/system/resources/previews/039/617/725/non_2x/ai-generated-polished-shiny-beautiful-black-car-on-dark-isolated-background-for-website-or-print-design-generative-ai-free-photo.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
          <div class="col-lg-8 ftco-animate">
          	<div class="text w-100 text-center mb-md-5 pb-md-5">
	            <h1 class="mb-4"><span style="color:black">Rent a Car </span> &amp; &nbsp;is with'in your Finger tips.</h1>
                
	            <p style="font-size: 18px;">"Ride Your Way! Car or bike rental today. Rely on our quality services at the lowest prices!
				Would you like to have it made more specific towards a particular demographic or geographical area? owned by spondias  Rentals</p>
	            
	            </a>
            </div>
          </div>
        </div>
        
      </div>
    </div>

     <section class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-md-12	featured-top">
    				<div class="row no-gutters">
	  					<div class="col-md-4 d-flex align-items-center">
	  						<form action="#" class="request-form ftco-animate bg-primary">
		          		<h2>Make your trip</h2>
			    				<div class="form-group">
			    					<label for="" class="label">Pick-up locatio</label>
			    					<input type="text" class="form-control" placeholder="City, Airport, Station, etc">
			    				</div>
			    				<div class="form-group">
			    					<label for="" class="label">Drop-off location</label>
			    					<input type="text" class="form-control" placeholder="City, Airport, Station, etc">
			    				</div>
			    				<div class="d-flex">
			    					<div class="form-group mr-2">
			                <label for="" class="label">Pick-up date</label>
			                <input type="text" class="form-control" id="book_pick_date" placeholder="Date">
			              </div>
			              <div class="form-group ml-2">
			                <label for="" class="label">Drop-off date</label>
			                <input type="text" class="form-control" id="book_off_date" placeholder="Date">
			              </div>
		              </div>
		              <div class="form-group">
		                <label for="" class="label">Pick-up time</label>
		                <input type="text" class="form-control" id="time_pick" placeholder="Time">
		              </div>
			            <div class="form-group">
			             <a href ="login.php"> <input type="button"  value="Rent A Car Now" class="btn btn-secondary py-3 px-4"></a>
			            </div>
                

			    			</form>
	  					</div>
	  					<div class="col-md-8 d-flex align-items-center">
	  						<div class="services-wrap rounded-right w-100">
	  							<h3 class="heading-section mb-4">Better Way to Rent Your Perfect Cars</h3>
	  							<div class="row d-flex mb-4">
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Choose Your Pickup Location</h3>
				                </div>
					            </div>      
					          </div>
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Select the Best Deal</h3>
					              </div>
					            </div>      
					          </div>
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Reserve Your Rental Car</h3>
					              </div>
					            </div>      
					          </div>
					        </div>
					        <p><a href="login.php" class="btn btn-primary py-3 px-4">Reserve Your Perfect Car</a></p>
	  						</div>
	  					</div>
	  				</div>
				</div>
  		</div>
    </section>


    <!-- ===========ABOUT========== -->

<section class="ftco-section ftco-about" id="about">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/about.jpg);">
					</div>
					<div class="col-md-6 wrap-about ftco-animate">
	          <div class="heading-section heading-section-white pl-md-5">
	          	<span class="subheading">About us</span>
	            <h2 class="mb-4">Welcome to Spondias Rentals</h2>

	            <p> Spondias Rentals -your trusted rental provider for hassle- car and bike services. 
					</p>
	            <p>At Spondias Rentals, we really care about providing easy access to transportation, 
					 
					</p>
					<ul style="color: white;">
						<li><strong>Wide Range of Vehicles</strong> </li>
						<li><strong>Affordable Rates</strong> </li>
						<li><strong>Flexible Rentals</strong> </li>
						<li><strong>Seamless Experience</strong> </li>
						<li><strong>Safety First:</strong> </li>
					</ul>
	            <p><a href="#car" class="btn btn-primary py-3 px-4">Search Vehicle</a></p>
	          </div>
					</div>
				</div>
			</div>
</section>

		<!-- ========SERVICES======== -->

    <section class="ftco-section" id="services">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <span class="subheading">Services</span>
        <h2 class="mb-3">Our Latest Services</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="services services-2 w-100 text-center">
          <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-wedding-car"></span></div>
          <div class="text w-100">
            <h3 class="heading mb-2">Wedding Ceremony</h3>
            <p class="justify-text">Make your wedding day special by booking this luxurious wedding car hire service. At Spondias Rentals, celebrations of your special day, especially when it concerns traveling.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="services services-2 w-100 text-center">
          <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
          <div class="text w-100">
            <h3 class="heading mb-2">City Transfer</h3>
            <p class="justify-text">Spondias rentals will make traveling. Whether you are commuting for business transfer, seeing a new city, or just running errands, our city transfer car rental service.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="services services-2 w-100 text-center">
          <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car"></span></div>
          <div class="text w-100">
            <h3 class="heading mb-2">Airport Transfer</h3>
            <p class="justify-text">Travel Stress Ends with Spondias Car Rentals: Airport Transfer Car Rental Solutions Arriving or Leaving, we strive to ensure that your journey to and from the airport goes smoothly.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="services services-2 w-100 text-center">
          <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
          <div class="text w-100">
            <h3 class="heading mb-2">Whole City Tour</h3>
            <p class="justify-text">Explore the city  entirely new way with Spondias Car Rentals's Whole City . Whether you're visiting  experiencing it again, enjoy wherever you want to go in a professional ride.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  .justify-text {
    text-align: justify;
  }
</style>

		<!-- ==========CAR & BIKES ========= -->

 <section class="ftco-section ftco-no-pt bg-light" id="car">
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5 mt-5">
                <span class="subheading">What we offer</span>
                <h2 class="mb-2">Featured Vehicles</h2>
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="menu-flters" class="d-flex">
                            <li data-filter="*" class="filter-active">Show All</li>
                            <li data-filter=".filter-cars">Cars</li>
                            <li data-filter=".filter-bikes">Bikes</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Horizontal Scrolling Container -->
        <div class="row menu-container" style="overflow-x: auto; white-space: nowrap;">
            <!-- First Car -->
            <?php foreach ($resQry as $key => $value) { 
              $images =$value['PHOTOS'];

              $image = str_replace('../','', $images);
              ?>
              
              <div class="col-lg-3 menu-item filter-cars" style="display: inline-block;">
             
                <div class="car-wrap rounded ftco-animate">
                    <div class="img rounded d-flex align-items-end" ><img src="admin/<?php echo $image ;?>" width="100%;" height="99%"></img></div>
                    <div class="text">
                        <h2 class="mb-0"><a href="#"><?php echo $value['BRAND']?></a></h2>
                        <div class="d-flex mb-3">
                            <span class="cat" style="font-size:15px;"><?php echo $value['MODAL'] ?></span>
                            <p class="price ml-auto"> <?php echo $value['RENTAL_PRICING'] ?> <span>/day</span></p>
                        </div>
                        <p class="d-flex mb-0 d-block"><a href="login" class="btn btn-primary py-2 mr-1">Book now</a> <a href="#" class="btn btn-secondary py-2 ml-1" data-bs-toggle="modal" data-bs-target="#detailsModal">
                                Details</a></p>
                    </div>
                </div>
            </div>
            <?php }?>

            <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailsModalLabel">Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class = "row">
                            
                             <div class="col-12 mb-2">
                                <label for="">Brand</label>
                                <input type="text" id="brand" name="brand" class="form-control" onkeypress="valid_text(event)">
                              </div>

                              <div class="col-12 mb-2">
                                <label for="">Modal</label>
                                <input type="text" id="modal" name="modal" class="form-control">
                              </div>

                              

                              <div class="col-12 mb-2">
                                <label for="">Rental Price</label>
                                <input type="text" id="price" name="price" class="form-control" >
                              </div>

                              

                              <div class="col-12 ">
                                <label for="">Photos</label>
                                <img id="previewImg" alt="Uploaded Image Preview" width="80px" height="80px" style="display:none;">
                              </div>

                            

                          </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            

        </div>
    </div>
</section>


	<!-- =============CONTACT========== -->

	<section class="ftco-section contact-section" id ="contact">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
        	<div class="col-md-4">
        		<div class="row mb-5">
		          <div class="col-md-12">
		          	<div class="border w-100 p-4 rounded mb-2 d-flex">
			          	<div class="icon mr-3">
			          		<span class="icon-map-o"></span>
			          	</div>
			            <p><span>Address:</span> W6MM+G2R, Turangi, Kakinada, Andhra Pradesh 533002</p>
			          </div>
		          </div>
		          <div class="col-md-12">
		          	<div class="border w-100 p-4 rounded mb-2 d-flex">
			          	<div class="icon mr-3">
			          		<span class="icon-mobile-phone"></span>
			          	</div>
			            <p><span>Phone:</span> <a href="tel://1234567920">+2 392 3929 210</a></p>
			          </div>
		          </div>
		          <div class="col-md-12">
		          	<div class="border w-100 p-4 rounded mb-2 d-flex">
			          	<div class="icon mr-3">
			          		<span class="icon-envelope-o"></span>
			          	</div>
			            <p style="margin-left:-15px;"><span>Email:</span> <a href="mailto:info@yoursite.com">spondiasrentals@gmail.com</a></p>
			          </div>
		          </div>
		        </div>
          </div>
          <div class="col-md-8 block-9 mb-md-5">
            <form action="#" class="bg-light p-5 contact-form"  autocomplete="off">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name" id="username" name="username">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Your Email" id="email" name="email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject" id="subject" name="subject">
              </div>
              <div class="form-group">
                <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Message" ></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5" onclick="send(event)">
              </div>
            </form>
          
          </div>
        </div>
        <!-- x -->
      </div>
  </section>

   <?php include ("includes/footer.php")?>
    
  </body>
  <script src="js/index.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
 
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  



<!-- Mirrored from themewagon.github.io/carbook/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Nov 2024 11:15:40 GMT -->
</html>