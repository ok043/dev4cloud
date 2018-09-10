$(document).ready(function() {

  $('#loginform').submit(function(e) {
    e.preventDefault();
    $.ajax({
       type: "POST",
       url: 'res/login.php',
       data: $(this).serialize(),
       success: function(data)
       {
          if (data === 'Login') {
            window.location = '/index.php';
          }  else if (data === 'Error' || data === 'ErrorError'){
            alert("No !");
          }else {
            alert('Invalid Credentials');
          }
       }
   });
 });

 $('#registerForm').submit(function(e) {
   e.preventDefault();
   $.ajax({
      type: "POST",
      url: 'res/registering.php',
      data: $(this).serialize(),
      success: function(data)
      {
         if (data === 'Confirmed') {
           $('#success1').show();
           //window.location = 'index.php';
         }else {
           alert('Username exists');
         }
      }
  });
});

$('#error1').hide();
$('#error2').hide();
$('#error3').hide();
$('#error4').hide();
$('#error5').hide();
$('#error6').hide();
$('#success1').hide();

 $('#registerForm').change(function(e) {

   var pw1 = $('#RegPassword').val();
   var pw2 = $('#RegPasswordConfirm').val();

   var valid = true;


   if (pw1 != pw2) {
     $('#error1').show();
     valid = false;
   } else {
     $('#error1').hide();

   }

   if (pw1.length < 8){
     $('#error2').show();
     valid = false;
   } else {
     $('#error2').hide();
   }

   if (pw1 == pw1.toLowerCase()){
     $('#error3').show();
     valid = false;
   } else {
     $('#error3').hide();
   }

   if (pw1 == pw1.toUpperCase()){
     $('#error4').show();
     valid = false;
   } else {
     $('#error4').hide();
   }

   var specialChars = "<>@!#$%^&*()_+[]{}?:;|'\"\\,./~`-="
   var check = function(string){
    for(i = 0; i < specialChars.length;i++){
        if(string.indexOf(specialChars[i]) > -1){
            return true
        }
    }
    return false;
  }

  if (!check(pw1)) {
    $('#error5').show();
    valid = false;
  } else {
    $('#error5').hide();
  }


  if (valid){
    $('#RegSubmit').prop('disabled', false);
  } else {
    $('#RegSubmit').prop('disabled', true);
  }


 });
});
