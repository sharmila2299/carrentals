// alert('text');
function valid_numbers(e) {
    var key = e.which || e.keyCode;
  
    if (key >= 48 && key <= 57) {
        return true;
    } else {
        e.preventDefault();
        return false;
    }
  }

  function isValidEmail(email) {
    var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return emailPattern.test(email);
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

  function validateFileType() {
    // var image = document.getElementById("image").value;
    var idxDot = image.lastIndexOf(".") + 1;
    var extFile = fileName.substr(idxDot, image.length).toLowerCase();
    if (extFile == "jpg" || extFile == "jpeg" || extFile == "png" || extFile == "gif") {
      alert("Image Saved");
    } else {
      alert("Only jpg, jpeg, png and gif files are allowed!");
    }
  }

  function validateFileType1() {
    // var image = document.getElementById("image").value;
    var idxDot = profile.lastIndexOf(".") + 1;
    var extFile = fileName.substr(idxDot, image1.length).toLowerCase();
    if (extFile == "jpg" || extFile == "jpeg" || extFile == "png" || extFile == "gif") {
      alert("Image Saved");
    } else {
      alert("Only jpg, jpeg, png and gif files are allowed!");
    }
  }

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
document.getElementById('image1').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const previewImg = document.getElementById('previewImg1');
            previewImg.src = e.target.result;
            previewImg.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
});

$(function() {
  $("form[name='registerForm']").validate({
   
    rules: {         
        name         : "required",
        email        : "required",
        password     : "required",
        dob          : "required",
        gender       : "required",
        number       : "required",
        address      : "required",
        image        : "required",
        image1       : "required",
    },

    messages: {         
        name         : "Please Enter Your Name",
        email        : "Please Enter Your email",
        password     : "Please Enter Your password",
        dob          : "Please Enter Your Date of birth",
        gender       : "please select gender",
        number       : "Please Enter Your phonenumber",
        address      : "Please Enter Your address",
        image        : "Please Choose aadhar Image",
        image1       : "Please Choose profile Image",
    },
    
    submitHandler: function(form) {

      let formdata = new FormData();
      let x = $('#registerForm').serializeArray();
      $.each(x, function(i, field){
        formdata.append(field.name,field.value);
      });
      formdata.append('action' , 'save');
        
      let image = $('#image')[0].files;

      if (image.length > 0){
        formdata.append('image', image[0]);
      }  

      let image1 = $('#image1')[0].files;

      if (image1.length > 0){
        formdata.append('image1', image1[0]);
      }  
      
      
     
      $.ajax({
        type: "POST",
        url: "actions/registration",
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        data: formdata,
        success: function (data) {
          if (data.trim() == 'true'){
            toastr.success('Data Saved Successfully...!');
            // alert("Data Saved Successfully...!");
            setTimeout(function (){
              location.href = "index";
            },1000);
          }
          else{
            toastr.error('Data not Saved. Please Try Later');
            // alert("Data not Saved. Please Try Later");
          }
        }
      });
    }
  });
});