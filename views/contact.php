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
      $nameErr = $emailErr = $conformErr = "";
      $name = $email = $conform = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {


        if (empty($_POST['name'])) {
          $nameErr="Nombre requerido";
        } else {
          $name = test_input($_POST["name"]);
          if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Solo se permiten letras y espacios";
          }
        }

        if (empty($_POST['email'])) {
          $emailErr = "Email requerido";
        } else {
          $email = test_input($_POST["email"]);
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Formato de Email erroneo";
          }
        }

        if (empty($_POST['conform'])) {
          $conformErr = "Acepta nuestras condiciones";
        } else {
          $conform = test_input($_POST["conform"]);
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

        <form class="contactForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

          <fieldset>
            <legend>Personal information:</legend>

          <label class="error"><?php echo $nameErr;?></label>
           <div class="group">
             <input type="text"
                   name="name" id="nameContac" class="field" autofocus>
             <span class="highlight"></span><span class="bar"></span>
             <label id="nicknameLabel">Nickname</label>

           </div>

          <label class="error"><?php echo $emailErr;?></label>
           <div class="group">
             <input type="text"
                   name="email" id="emailLabel" class="field" autofocus>
             <span class="highlight"></span><span class="bar"></span>
             <label id="emailLabel">Email</label>

           </div>
          </fieldset>

          <div class="groupType">
            <fieldset>
              <legend>Type of contact:</legend>
              <input type="radio" name="classMail" class="field" value="male" checked><label id="evaluation"></label>
              <input type="radio" name="classMail" class="field" value="male"><label id="suggest"></label>
              <input type="radio" name="classMail" class="field" value="male"><label id="review"></label>
            </fieldset>
          </div>

          <div class="groupText">
            <textarea id="emailText" name="text" maxlength="300" rows="10" cols="60" placeholder="We want to read your opinion!"></textarea>
          </div>

          <div class="groupConform">
            <span class="error"><?php echo $conformErr;?></span><br>
            <input type="checkbox" name="conform" value="conformity"/><label id="accordance" ></label>

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
