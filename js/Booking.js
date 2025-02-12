function valid_numbers(e) {
    var key = e.which || e.keyCode;
  
    if (key >= 48 && key <= 57) {
        return true;
    } else {
        e.preventDefault();
        return false;
    }
  }

function validation(){
    //  alert("hello");
        let bookingId  = $('#bookingId').val();
        let vehicleId  = $('#vehicleId').val();
        let price = $('#price').val();
        let startdate    = $('#startdate').val();
        let enddate  = $('#enddate').val();
        let status  = $('#status').val();
        
        if(bookingId == ''){
            toastr.error("Enter bookingId...");
            $('#bookingId').focus();
            return false;
          }
          else if(vehicleId == ''){
            toastr.error("Enter vehicleId...");
            $('#vehicleId').focus();
            return false;
          }
          else if(price == ''){
          toastr.error("Enter Your Price...");
          $('#price').focus();
          return false;
        }else if(startdate == ''){
          toastr.error("Enter startdate...");
          $('#startdate').focus();
          return false;
        }
        else if(enddate == ''){
          toastr.error("Enter enddate...");
          $('#enddate').focus();
          return false;
        }
        else if(status == ''){
          toastr.error("Enter status...");
          $('#status').focus();
          return false;
        }
         else{
          return true;
        }
      }
      
      function book(event){
        // alert("afdgyb");
        event.preventDefault();
        if(validation()){
          let bookingId  = $('#bookingId').val();
        //   console.log(bookingId);
          let vehicleId  = $('#vehicleId').val();
        //   console.log(vehicleId);
          let price = $('#price').val();
          let startdate = $('#startdate').val();
          let enddate = $('#enddate').val();
          let status = $('#status').val();
          // console.log(status);
        
          $.ajax({
            url : 'actions/bookings',
            type : 'POST',
            data : {'action' : 'book','bookingId' : bookingId, 'vehicleId' : vehicleId , 'price' : price, 'startdate' : startdate ,'enddate' : enddate, 'status' : status },
            success : function(data){         
              if (data == "true"){
                toastr.success("Booked Successfully...!");
                setTimeout(function(){
                  window.location.href = "home";
                },1000);
              } else {
                toastr.error('Booking not successful');
              }
            }
          });
        }
      }