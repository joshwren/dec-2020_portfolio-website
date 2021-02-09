<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700' rel='stylesheet' type='text/css'>
    
      <title>DBJW Webfolio</title>
    
      <link rel="shortcut icon" type="image/png" href="img/Logo/DBJW_logo.svg" />

      <!-- Google font Roboto -->
      <link rel="preconnect" href="https://fonts.gstatic.com" />
      <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet" />

      <!-- Bootstrap SASS compiled CSS styles file -->
      <link rel="stylesheet" href="css/bootstrap.css" />

      <!-- Custom styles SASS compiled CSS styles file -->
      <link rel="stylesheet" href="css/style.css" />
    
      <meta name="keywords" content="graphic design, website design, website development, great graphic design">
      <meta name="description" content="Designs by Josh Wren. Highly Experienced Graphic and Web Designer. Highly Experienced Web Developer.">
</head>
<body>
  <!-- PHP FORM SEND SCRIPT START HERE -->

<?php
if(isset($_POST['email'])) {
 
    // Email send details along with the subject line
    $email_to = "joshua@advancedgraphics.com.au";
    $email_subject = "Email from DBJW Portfolio website";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['firstname']) ||
        !isset($_POST['lastname']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $firstname = $_POST['firstname']; // required
    $lastname = $_POST['lastname']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$firstname)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }

  if(!preg_match($string_exp,$lastname)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "First Name: ".clean_string($firstname)."\n";
    $email_message .= "Last Name: ".clean_string($lastname)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>

<!DOCTYPE html>
<html>
<!-- CONTENT START HERE -->
<section class="message-sent bg-primary">
    <div class="row message-sent__large-hero bg-secondary">
      <div class="message-sent__large-hero" style="padding-left: 0px;  padding-right: 0px;">
        <img src="img/Icons/message-sent.svg" class="message-sent__large-hero--icon">

        <picture>
          <source srcset="
          img/Images/celebration_banner.svg 1920w, 
          img/images/celebration_banner.svg 3840w" media="(min-width: 1380px)"> <!-- Large screen sizes -->
          <source srcset="
          img/images/celebration_banner.svg 1380w, 
          img/images/celebration_banner.svg 2760w" media="(min-width: 990px)"> <!-- Medium screen sizes -->
          <source srcset="
          img/images/celebration_banner.svg 990w, 
          img/images/celebration_banner.svg 1980w" media="(min-width: 640px)"> <!-- Small screen sizes -->
          <img srcset="
          img/images/celebration_banner.svg 640w, 
          img/images/celebration_banner.svg 1280w" alt="" class="message-sent__large-hero--banner-image">
          <!-- Smallest screen sizes -->
        </picture>
        <a href="index.html">
          <div class="message-sent__close">X</div>
        </a>
      </div>
    </div>
    <!-- TEXT START -->
    <div class="container message-sent__text-content">
      <div class="row">
        <div class="col text-center">
          <h3 class="mt-5">Success<span class="pink-accent">!!!</span></h3>
          <h1 class="mb-4">Message Sent</h1>
          <p class="mb-3 mt-3">Your message has been successfully sent.</p>
          <hr>
          <p class="mt-3 mb-4">Thank you for contacting me. I will be in touch with you very soon.</p>

          <a href="index.html">
            <button class="btn btn-success btn-rectangle btn-inline-block py-2 px-3 mt-2">
              <span>&#8604;</span> Take me back
            </button>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- CONTENT END HERE -->

<!-- Jquery JS (best to use the MINIFIED version) http://code.jquery.com/ -->
<script src="http://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

  <!-- Bootstrap JS (best to not use the SLIM version as it will not include some effects) https://getbootstrap.com/docs/4.4/getting-started/introduction/ -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

<!-- Your custom JS -->
<script>

</script>
</html>

<?php
}
?>

</body>
