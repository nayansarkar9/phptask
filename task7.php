<!DOCTYPE html>
<html>
<head>
  <title>task6</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <style>
    body{
    background-color: teal;
  }
  table{
      width: 100%;

    }
    td,th{
      width: 50%;
    }
    .msg , .msgs{
      display: none;
    }
    .error , .errornum{
      color: red;
    }
    .correct , .correctnum{
      color: green;
    }
  </style>
</head>
<body>



<form name="Form" id="form" method="post" action="export.php" onsubmit="return post();">  
  FirstName: <input type="text" name="fname" id="first" placeholder="FirstName">
  <br><br>
  LastName: <input type="text" name="lname" id="last" placeholder="LastName">
  <br><br>
  FullName: <input type="text" name="fullname" id="full" readonly="readonly" placeholder="FullName">
  <br><br>
  Contact Number<input type="text" name="phonenumber" placeholder="ContactNO." id="contact">
  <span class="msgs errornum">*Invalid phone number</span><span class="msgs correctnum">Valid number</span>
  <span id='error' ></span>

    <br><br>

  E-mail: <input type="text" name="email" placeholder="E-mail" id="email"><span class="msg error">*Invalid email id</span><span class="msg correct">Valid Email</span>
  <br><br>
<textarea cols="20" rows="10" name="txtarea" placeholder="Enter Your Subject & Marks" id="txtarea"></textarea>
<br><br>
  <input type="submit" name="submit" value="Submit" id="submit">  
</form>
<p id="success_para"></p>
<script type="text/javascript">

  $(document).ready(function() {
      $('#first, #last').keyup(function(){
        var str = " ";
        $('#first, #last').each(function() {
          str += $(this).val().replace(' ', ' ')+" ";
        });
        $('#full').val(str);

    });
      $('input[name="email"]').blur(function () {
   var email1 = $(this).val();
var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/igm;
if (re.test(email1)) {
   $('.msg').hide();
   $('.correct').show();
   $('#submit').removeAttr("disabled");
} else {
   $('.msg').hide();
   $('.error').show();
   $("#submit").attr("disabled", true);

}
});$('input[name="phonenumber"]').blur(function () {
   var num = $(this).val();
var regex = /^([+][9][1])([6-9]{1})([0-9]{9})$/;
if (regex.test(num)) {
   $('.msgs').hide();
   $('.correctnum').show();
   $('#submit').removeAttr("disabled");
} else {
   $('.msgs').hide();
   $('.errornum').show();
   $("#submit").attr("disabled", true);
}
});
});

</script>
 <script type="text/javascript">
function post()

{

  var firstname = document.getElementById("first").value;
  var lastname = document.getElementById("last").value;
  var fullname = document.getElementById("full").value;
  var phnumber = document.getElementById("contact").value;


    var email = document.getElementById("email").value;
    

  var message = document.getElementById("txtarea").value;

  if(firstname && lastname && fullname && phnumber && email && message)

  {

    $.ajax

    ({

      type: 'post',

      url: 'validate.php',
      

      data: 

      {

        user_firstname:firstname,

        user_lastname:lastname,
        user_fullname:fullname,
        user_contact:phnumber,

      user_email:email,

      user_message:message

      },

      success: function (response) 

      {
        
        
        
        if(response == 0){
          document.getElementById("success_para").innerHTML="Form Validations Failed";

        }
        if(response == 1)
          document.getElementById("success_para").innerHTML="Form Submitted Successfully";
        alert("download file");
        window.open("export.php?email="+email+"&lname="+lastname+"&fname="+firstname+"&fullname="+fullname+"&number="+phnumber+"&message="+message);

  

      }
      

    });

  }

  

  return false;

}

</script>
</script> 

</body>
</html>