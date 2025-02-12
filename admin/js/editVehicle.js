document.getElementById('image').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const previewImg = document.getElementById('previewImg');
            previewImg.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

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
      return false;
  }
}

$(function() {
  $("form[name='editVehicleForm']").validate({
   
    rules: {         
      type        : "required",
      brand       : "required",
      modal       : "required",
      number      : "required",
      price       : "required",
      // image       : "required",
      status      : "required",
  },
  messages: {         
      type        : "Please select vehicle type",
      brand       : "Please select vehicle brand",
      modal       : "Please Choose vehicle modal",
      number      : "Please Enter number",
      price       : "Please Enter price",
      // image       : "Please Choose Service Image",
      status      : "Please update status",
  },
    
    submitHandler: function(form) {
      
      let formdata = new FormData();
      let x = $('#editVehicleForm').serializeArray();
      $.each(x, function(i, field){
        formdata.append(field.name,field.value);
      });
      formdata.append('action' , 'update');  

      let image = $('#image')[0].files;

      if (image.length > 0){
        formdata.append('image', image[0]);
      }      
     
      $.ajax({
        type: "POST",
        url: "actions/Vehicles",
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        data: formdata,
        success: function (data) {
          if (data.trim() == 'true'){
            toastr.success('Updated Successfully...!');
            setTimeout(function (){
              location.href = "manageVehicle";
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