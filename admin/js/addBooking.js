function valid_numbers(e) {
  var key = e.which || e.keyCode;

  if (key >= 48 && key <= 57) {
      return true;
  } else {
      e.preventDefault();
      return false;
  }
}

$(function() {
  $("form[name='addBookingForm']").validate({
   
    rules: {         
      startdate    : "required",
      enddate      : "required",
      price        : "required",
      status       : "required",
    },

    messages: {         
     startdate   : "Please select Startdate",
     enddate     : "Please select Startdate",
     price       : "Please select Price",
     status      : "Please select Status",
    },
    
    submitHandler: function(form) {

      let formdata = new FormData();
      let x = $('#addBookingForm').serializeArray();
      $.each(x, function(i, field){
        formdata.append(field.name,field.value);
      });
      formdata.append('action' , 'save');
        
          
     
      $.ajax({
        type: "POST",
        url: "actions/bookings",
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        data: formdata,
        success: function (data) {
          if (data.trim() == 'true'){
            toastr.success('Booking Saved Successfully...!');
            setTimeout(function (){
              location.href = "manageBooking";
            },1000);
          }
          else{
            toastr.error('Data not Saved. Please Try Later');
          }
        }
      });
    }
  });
});