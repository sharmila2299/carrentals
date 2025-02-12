

$(function() {
  $("form[name='editBookingForm']").validate({
   
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
      let x = $('#editBookingForm').serializeArray();
      $.each(x, function(i, field){
        formdata.append(field.name,field.value);
      });
      formdata.append('action' , 'update');  
    
     
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
            toastr.success('Updated Successfully...!');
            setTimeout(function (){
              location.href = "manageBooking";
            },1000);
          }
          else{
            toastr.error('Data not Updated..!');
          }
        }
      });
    }
  });
});