<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title id="webTitle">Contact</title>
    <link rel="icon" type="image/png" href="../images/icons/zero.png"/>
    <link rel="stylesheet" type="text/css" href="../css/basic.css">
    <link rel="stylesheet" type="text/css" href="../css/contact.css"/>
    <script type="text/javascript" src="../js/basic.js"></script>
    <script type="text/javascript" src="../js/contact.js"></script>
    <script type="text/javascript" src="../js/lit/lit-EN.js"></script>
  </head>

  <body>

      <?php
      $nameErr = $emailErr = $radioErr = $conformErr = $commentErr = "";
      $name = $email = $radio = $conform = $comment = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {


        if (empty($_POST['textNameContact'])) {
          $nameErr="Nombre requerido";
        } else {
          $name = test_input($_POST["textNameContact"]);
          if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Solo se permiten letras y espacios";
          }
        }


        if (empty($_POST['textEmailContact'])) {
          $emailErr = "Email requerido";
        } else {
          $email = test_input($_POST["textEmailContact"]);
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "formato de Email erroneo";
          }
        }


        if (empty($_POST['radioClass'])) {
          $radioErr = "Selecciona un tipo";
        } else {
          $radio = test_input($_POST['radioClass']);
        }


        if (empty($_POST['textEmailText'])) {
          $commentErr = "";
        } else {
          $comment = test_input($_POST['textEmailText']);
        }


        if (empty($_POST['conform'])) {
          $conformErr = "Acepta nuestras condiciones";
        } else {
          $conform = test_input($_POST['conform']);
        }
      }
      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>

    <!-- WRAPPER CLASS -->
    <div id="wrapper">

      <!-- HEADER CLASS -->
      <?php
      include '../php/navbar.php';
       ?>

      <!-- CONTENT CLASS -->
      <div id="content">
        <p><span class="error">* We're missing some datas!!</span></p>
        <form class="contactForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

          <div class="group">
            <fieldset>
             <legend>Personal information:</legend>
              <label id="nickLabel"></label>
              <input type="text" name="textNameContact" id="nameContac" class="field" autofocus>
              <span class="highlight"></span><span class="bar"></span>
              <span class="error">* <?php echo $nameErr;?></span>

              <label id="emailLabel"></label>
              <input type="text" name="textEmailContact" id="emailContact" class="field">
              <span class="highlight"></span><span class="bar"></span>
              <span class="error">* <?php echo $emailErr;?></span>
            </fieldset>
          </div>

          <div class="groupType">
            <fieldset>
              <legend>Type of contact:</legend>
              <input type="radio" name="radioClass" class="field" value="male" checked><span id="evaluation"></span>
              <input type="radio" name="radioClass" class="field" value="male"><span id="suggest"></span>
              <input type="radio" name="radioClass" class="field" value="male"><span id="review"></span>
              <span class="error"><?php echo $radioErr;?></span>
            </fieldset>
          </div>

          <div class="groupText">
            <textarea id="emailText" name="textEmailText" maxlength="300" rows="10" cols="30" placeholder="We want to read your opinion!"></textarea>
          </div>

          <div class="groupConform">
            <input type="checkbox" name="conform" value="conformity"/><span id="accordance" ></span>
            <span class="error">* <?php echo $conformErr;?></span><br>
          </div>

          <div class="group">
            <input type="submit" value="Submit">
          </div>
        </form>

      </div>

      <!-- FOOTER CLASS -->
      <?php
        include '../php/footer.php';
       ?>

    <!-- END WRAPPER CLASS -->
    </div>

  </body>
</html>
