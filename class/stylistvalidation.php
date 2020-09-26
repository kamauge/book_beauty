<?php

include_once 'stylist.class.php';

class stylistvalidation{
	
   public function signupValidation($email,$password,$confirm)
   {    
   	   $style = new stylist();
	   $validstylist= true;
	   if($style->getEmailforValidation($email)){
		   echo"<script>
		   alert('email already has an account');
		   window.location.href='stylistregister.php';
		   </script>";
		   $validstylist = false;
	   }
	   elseif($password!==$confirm){
           echo"<script>
		   alert('password mismatch');
		   window.location.href='stylistregister.php';
		   </script>";
		   $validstylist = false;
	   }
	   else{
		   
		   return $validstylist;
	   }
	   
   }
   
   public function loginValidation($email,$password){
   	   $salon = new stylist();
   	   $style = $salon->getEmail($email);
       foreach($style as $item){
	   if(!$item){
	   	return false;
		   	}
        elseif(password_verify($password,$item['password'])){ 
        return true;
	   }
	   else{
	       return false;
	   }
	}
	
	    
   }

}

?>