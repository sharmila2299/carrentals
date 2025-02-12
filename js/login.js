function validation() {
  let username = $('#username').val();
  let password = $('#password').val();

  if(username == ''){
    toastr.error("Enter Email...");
    $('#username').focus();
    return false;
  }else if(password == ''){
    toastr.error("Enter PassWord...");
    $('#password').focus();
    return false;
  }else{
    return true;
  }
}

function loginval(event){
  event.preventDefault();
  if(validation()){
    let username = $('#username').val();
    let password = $('#password').val();
  
    $.ajax({
      url : 'actions/loginActions',
      type : 'POST',
      data : {'action' : 'login','username' : username, 'password' : password},
      success : function(data){         
        if (data == "true"){
          toastr.success("Login Successfully...!");
          setTimeout(function(){
            window.location.href = "home";
          },1000);
        } else {
          toastr.error('Invalid Logins');
        }
      }
    });
  }
}