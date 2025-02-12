
$(document).ready(function(){
  
  $('#menu-flters li').click(function(){
    var filter = $(this).attr('data-filter');

    
    $('#menu-flters li').removeClass('filter-active');
    $(this).addClass('filter-active');

    if (filter == '*') {
      $('.menu-item').show(); 
    } else {
      $('.menu-item').not(filter).hide();
      $(filter).show(); 
    }
  });
});

 
 const carousel = document.querySelector('#carouselExample');

 
 document.getElementById('btnSlide1').addEventListener('click', () => {
     const carouselInstance = bootstrap.Carousel.getOrCreateInstance(carousel);
     carouselInstance.to(0); 
 });

 document.getElementById('btnSlide2').addEventListener('click', () => {
     const carouselInstance = bootstrap.Carousel.getOrCreateInstance(carousel);
     carouselInstance.to(1); 
 });

 document.getElementById('btnSlide3').addEventListener('click', () => {
     const carouselInstance = bootstrap.Carousel.getOrCreateInstance(carousel);
     carouselInstance.to(2); 
 });

 document.getElementById('btnSlide4').addEventListener('click', () => {
     const carouselInstance = bootstrap.Carousel.getOrCreateInstance(carousel);
     carouselInstance.to(3); 
 });

 function validation(){

    let username = $('#username').val();
    let email    = $('#email').val();
    let subject  = $('#subject').val();
    let message  = $('#message').val();
  
    if(username == ''){
      toastr.error("Enter Your Name...");
      $('#username').focus();
      return false;
    }else if(email == ''){
      toastr.error("Enter email...");
      $('#email').focus();
      return false;
    }
    else if(subject == ''){
      toastr.error("Enter subject...");
      $('#subject').focus();
      return false;
    }
    else if(message == ''){
      toastr.error("Enter message...");
      $('#message').focus();
      return false;
    }
     else{
      return true;
    }
  }
  
  function send(event){
    event.preventDefault();
    if(validation()){
      let username = $('#username').val();
      let email = $('#email').val();
      let subject = $('#subject').val();
      let message = $('#message').val();
    
    
      $.ajax({
        url : 'actions/contact',
        type : 'POST',
        data : {'action' : 'send','username' : username, 'email' : email ,'subject' : subject, 'message' : message },
        success : function(data){         
          if (data == "true"){
            toastr.success("Send Successfully...!");
            setTimeout(function(){
              window.location.href = "index";
            },1000);
          } else {
            toastr.error('Invalid Data');
          }
        }
      });
    }
  }
 
  function valid_numbers(e) {
    var key = e.which || e.keyCode;
  
    if (key >= 48 && key <= 57) {
        return true;
    } else {
        e.preventDefault();
        return false;
    }
  }
  
  function valid_text(e) {
    var key = e.which || e.keyCode;
  
    if ((key >= 65 && key <= 90) || (key >= 97 && key <= 122) || key === 32 || key === 8) {
        return true;
    } else {
        e.preventDefault();
        return false;
     }
  }
  function valid(){
   
        let userName       = $('#userName').val();
        let contactNumber  = $('#contactNumber').val();
        
        
      
        if(userName == ''){
          toastr.error("Enter Your Name...");
          $('#userName').focus();
          return false;
        }else if(contactNumber == ''){
          toastr.error("Enter contactNumber...");
          $('#contactNumber').focus();
          return false;
        }
         else{
          return true;
        }
      }
      
      function update(event){
      
        event.preventDefault();
        if(valid()){
          let userName = $('#userName').val();
          let contactNumber = $('#contactNumber').val();
          let hidrand = $('#hidrand').val();
          
          
          
        
          $.ajax({
            url : 'actions/users',
            type : 'POST',
            data : {'action' : 'user','userName' : userName, 'contactNumber' : contactNumber,'hidrand': hidrand},
            success : function(data){         
              if (data == "true"){
                toastr.success("Updated Successfully...!");
                setTimeout(function(){
                  window.location.href = "home";
                },1000);
              } else {
                toastr.error(' Data Not Updated');
              }
            }
          });
        }
      }
   

      function modaldetails(id) {
        $.ajax({
            url: "actions/Vehicles",
            type: "post",
            data: { id: id, action: 'details' },
            success: function(data) {
                if (data) {
                    let details = JSON.parse(data);
                    $('#brand1').val(details.data[0]['BRAND']);
                    $('#modal').val(details.data[0]['MODAL']);
                    $('#price').val(details.data[0]['RENTAL_PRICING']);
                    // $('#photos').attr('src', '../admin/uploads/Vehicles' + details.data[0]['PHOTOS']);
                    $('#detailsModal').modal('show');
                }
            }
        });
    }

      
      // Function to handle brand selection
      // function brand(id) {
      //     if (id === "") {
      //         alert("Please select a valid brand");
      //         return;
      //     }

      //     $.ajax({
      //         url: "actions/Vehicles", // Backend URL
      //         type: "POST",
      //         data: { id: id, action: 'filterByBrand' },
      //         success: function (response) {
      //             try {
      //                 const data = JSON.parse(response);
      //                 const container = $("#vehicleResults");
      //                 console.log();
      //                 container.empty();

      //                 if (data.recordsTotal > 0) {
      //                     data.data.forEach(vehicle => {
      //                         const vehicleCard = `
      //                             <div class="col-lg-4 col-md-6 col-sm-12">
      //                                 <div class="car-wrap rounded border p-3 mb-4">
      //                                     <div class="img rounded d-flex align-items-end mb-3">
      //                                         <img src="admin/${vehicle.PHOTOS}" class="img-fluid" alt="${vehicle.BRAND}">
      //                                     </div>
      //                                     <div class="text">
      //                                         <h2>${vehicle.BRAND}</h2>
      //                                         <div class="d-flex mb-3">
      //                                             <span class="cat">${vehicle.MODAL}</span>
      //                                             <p class="price ml-auto">${vehicle.RENTAL_PRICING}<span>/day</span></p>
      //                                         </div>
      //                                         <p class="d-flex mb-0 d-block">
      //                                             <a href="Book" class="btn btn-primary py-2 mr-1">Book now</a>
      //                                             <a href="#" class="btn btn-secondary py-2 ml-1">Details</a>
      //                                         </p>
      //                                     </div>
      //                                 </div>
      //                             </div>`;
      //                         container.append(vehicleCard);
      //                     });
      //                 } else {
      //                     container.html("<p class='text-center'>No vehicles found for this brand.</p>");
      //                 }
      //             } catch (error) {
      //                 console.error("Error parsing response:", error);
      //                 alert("An error occurred. Please try again.");
      //             }
      //         },
      //         error: function (xhr, status, error) {
      //             console.error("AJAX Error:", status, error);
      //             alert("Failed to fetch data. Please try again.");
      //         }
      //     });
      // }

      // function updateBrand(v,b){
      //   // alert(b);
      //   let value = v;
        
      //   window.location.href ='home.php?vehicle_type='+ b + ' &rand='+ value;

      // }
      function updateBrand(selectedBrand) {
        const params = new URLSearchParams(window.location.search); 
        if (selectedBrand) {
            params.set('rand', selectedBrand); 
        } else {
            params.delete('rand'); 
        }
        window.location.search = params.toString(); 
    }
    
    function modal(selectedModal) {
        const params = new URLSearchParams(window.location.search); 
        if (selectedModal) {
            params.set('modal', selectedModal); 
        } else {
            params.delete('modal'); 
        }
        window.location.search = params.toString(); 
    }
    function search() {
      const searchInput = document.querySelector('input[name="search"]').value; 
      const params = new URLSearchParams(window.location.search); 
      if (searchInput) {
          params.set('search', searchInput); 
      } else {
          params.delete('search'); 
      }
      window.location.search = params.toString(); 
  }
     
    
 


      

