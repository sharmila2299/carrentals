document.getElementById('attachment').addEventListener('change', function (event) {
  const file = event.target.files[0];
  if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
          const previewImg = document.getElementById('previewImg');
          previewImg.src = e.target.result;
          previewImg.style.display = 'block';
      };
      reader.readAsDataURL(file);
  }
});

function valid() {
  let name = $('#name').val();
  let email = $('#email').val();
  let issue = $('#issue').val();

  if (name === '') {
      toastr.error("Enter Your Name...");
      $('#name').focus();
      return false;
  } else if (email === '') {
      toastr.error("Enter email...");
      $('#email').focus();
      return false;
  } else if (issue === '') {
      toastr.error("Enter issue...");
      $('#issue').focus();
      return false;
  } else {
      return true;
  }
}

function update(event) {
  event.preventDefault();

  if (valid()) {
      let name = $('#name').val();
      let email = $('#email').val();
      let issue = $('#issue').val();
      let attachment = $('#attachment')[0].files[0];

      let formData = new FormData();
      formData.append('action', 'save');
      formData.append('name', name);
      formData.append('email', email);
      formData.append('issue', issue);

      if (attachment) {
          formData.append('attachment', attachment);
      }

      
      $.ajax({
          url: 'actions/Coustmer',
          type: 'POST',
          data: formData,
          processData: false, 
          contentType: false, 
          success: function (data) {
              if (data === "true") {
                  toastr.success("Sent Successfully...!");
                  setTimeout(function () {
                      window.location.href = "custmorservice";
                  }, 1000);
              } else {
                  toastr.error('Data Not Sent');
              }
          },
          error: function (xhr, status, error) {
              toastr.error("An error occurred: " + error);
          }
      });
  }
}
