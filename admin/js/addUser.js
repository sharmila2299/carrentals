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
  

  function validateFileType() {
    // var image = document.getElementById("image").value;
    var idxDot = aadhar.lastIndexOf(".") + 1;
    var extFile = fileName.substr(idxDot, aadhar.length).toLowerCase();
    if (extFile == "jpg" || extFile == "jpeg" || extFile == "png" || extFile == "gif") {
      alert("Image Saved");
    } else {
      alert("Only jpg, jpeg, png and gif files are allowed!");
    }
  }

  function validateFileType1() {
    // var image = document.getElementById("image").value;
    var idxDot = profile.lastIndexOf(".") + 1;
    var extFile = fileName.substr(idxDot, profile.length).toLowerCase();
    if (extFile == "jpg" || extFile == "jpeg" || extFile == "png" || extFile == "gif") {
      alert("Image Saved");
    } else {
      alert("Only jpg, jpeg, png and gif files are allowed!");
    }
  }

document.getElementById('aadhar').addEventListener('change', function(event) {
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
document.getElementById('profile').addEventListener('change', function(event) {
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
  $("form[name='addUserForm']").validate({
   
    rules: {         
        name         : "required",
        email        : "required",
        password     : "required",
        phonenumber  : "required",
        address      : "required",
        aadhar       : "required",
        profile      : "required",
    },

    messages: {         
        name         : "Please Enter Your Name",
        email        : "Please Enter Your email",
        password     : "Please Enter Your password",
        phonenumber  : "Please Enter Your phonenumber",
        address      : "Please Enter Your address",
        aadhar       : "Please Choose aadhar Image",
        profile      : "Please Choose profile Image",
    },
    
    submitHandler: function(form) {

      let formdata = new FormData();
      let x = $('#addUserForm').serializeArray();
      $.each(x, function(i, field){
        formdata.append(field.name,field.value);
      });
      formdata.append('action' , 'save');
        
      let image = $('#aadhar')[0].files;

      if (image.length > 0){
        formdata.append('aadhar', image[0]);
      }  

      let image1 = $('#profile')[0].files;

      if (image1.length > 0){
        formdata.append('profile', image1[0]);
      }  
      
      
     
      $.ajax({
        type: "POST",
        url: "actions/users",
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        data: formdata,
        success: function (data) {
          if (data.trim() == 'true'){
            toastr.success('User Saved Successfully...!');
            setTimeout(function (){
              location.href = "manageUser";
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