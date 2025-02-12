document.getElementById('image').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const previewImg = document.getElementById('previewImg');
            previewImg.src = e.target.result;
            previewImg.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
});

$(function() {
  $("form[name='addServiceForm']").validate({
   
    rules: {         
      title         : "required",
      description   : "required",
      image         : "required",
    },

    messages: {         
      title         : "Please Enter Title",
      description   : "Please Enter Description",
      image         : "Please Choose Service Image",
    },
    
    submitHandler: function(form) {

      let formdata = new FormData();
      let x = $('#addServiceForm').serializeArray();
      $.each(x, function(i, field){
        formdata.append(field.name,field.value);
      });
      formdata.append('action' , 'save');
        
      let image = $('#image')[0].files;

      if (image.length > 0){
        formdata.append('image', image[0]);
      }      
     
      $.ajax({
        type: "POST",
        url: "actions/service",
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        data: formdata,
        success: function (data) {
          if (data.trim() == 'true'){
            toastr.success('Service Saved Successfully...!');
            setTimeout(function (){
              location.href = "manageService";
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