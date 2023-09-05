
function validate()
{
   if( document.Registration.textnames.value == "" )
   {
     alert( "Please provide your Name!" );
     document.Registration.textnames.focus() ;
     return false;
   }
   
   if( document.Registration.password.value == "" )
   {
     alert( "Please provide your password" );
     document.Registration.password.focus() ;
     return false;
   }

   if(document.Registration.password.value.length <= 8)
   {
     alert( "Password must be greater than 8 character" );
     document.Registration.password.focus() ;
     return false;
   }

   if( document.Registration.confirm.value == "" || document.Registration.password.value!=document.Registration.confirm.value)
   {
     alert( "Please check your password" );
     document.Registration.confirm.focus() ;
     return false;
   }

   if( document.Registration.paddress.value == "" )
   {
     alert( "Please provide your address" );
     document.Registration.paddress.focus() ;
     return false;
   }
   if ( ( Registration.sex[0].checked == false ) && ( Registration.sex[1].checked == false ) )
   {
   alert ( "Please choose your Gender: Male or Female" );
   return false;
   }   

   if( document.Registration.pincode.value == "" ||
           isNaN( document.Registration.pincode.value) ||
           document.Registration.pincode.value.length != 6 )
   {
     alert( "Please provide a pincode in the format ######." );
     document.Registration.pincode.focus() ;
     return false;
   }
   
 var email = document.Registration.emailid.value;
  atpos = email.indexOf("@");
  dotpos = email.lastIndexOf(".");
 if (email == "" || atpos < 1 || ( dotpos - atpos < 2 )) 
 {
     alert("Please enter correct email ID")
     document.Registration.emailid.focus() ;
     return false;
 }var lblError = document.getElementById("lblError");
         //Get the date from the TextBox.
    

     if( document.Registration.adharno.value == "")
   {
     alert( "Please provide your adhar no!" );
     document.Registration.adharno.focus() ;
     return false;
   }
    if( document.Registration.adharno.value.length !=12)
   {
     alert( "Please correct your adhar no!" );
     document.Registration.adharno.focus() ;
     return false;
   }
  if( document.Registration.mobileno.value == "" ||
           isNaN( document.Registration.mobileno.value) ||
           document.Registration.mobileno.value.length != 10 )
   {
     alert( "Please provide correct mobileno." );
     document.Registration.mobileno.focus() ;
     return false;
   }
 return (true);
}