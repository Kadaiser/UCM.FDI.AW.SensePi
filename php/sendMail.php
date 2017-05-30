<?php
  if(isset($_POST['email']))
  {
    $email_to = "pisense@yourdomain.com";
    $email_subject = "Mail de contacto del exterior!!";
 
    function died($error)
    {
        echo "Lo sentimos, pero ha habido errores durante el proceso de envio";
        echo "Concretamente estos: <br /><br />";
        echo $error."<br /><br />";
        echo "Regresa al formulario de contacto y revisa estos errores.<br /><br />";
        die();
    }
 
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['classMail']) ||
        !isset($_POST['conform']))
    {
        died('We are sorry, but there appears to be a problem with the form you submitted.');      
    }
 
    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $classMail = $_POST['classMail']; // required
    $text = $_POST['text']; // not required
    $conform = $_POST['conform']; // required
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from))
  {
    $error_message .= 'La direccion de mail introdcida no parace ser valida.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name))
  {
    $error_message .= 'El nombre es incorrecto o no ha podido ser procesado.<br />';
  }
 
  if(strlen($text) < 5)
  {
    $error_message .= 'Tu comentario es demasiado corto.<br />';
  }
 
  if(strlen($error_message) > 0)
  {
    died($error_message);
  }
 
    $email_message = "Detalles de formulario.\n\n";
  
   function clean_string($string)
   {
     $bad = array("content-type","bcc:","to:","cc:","href");
     return str_replace($bad,"",$string);
   }

  $email_message .= "Name: ".clean_string($name)."\n";
  $email_message .= "Email: ".clean_string($email_from)."\n";
  $email_message .= "Email Class: ".clean_string($classMail)."\n";
  $email_message .= "Comments: ".clean_string($text)."\n";
 
  // create email headers
  $headers = 'From: '.$email_from."\r\n".
  'Reply-To: '.$email_from."\r\n" .
  'X-Mailer: PHP/' . phpversion();
  @mail($email_to, $email_subject, $email_message, $headers); 
?>
Gracias por escribirnos, pronto nos podremos en contacto contigo.
<?php
  }
?>
