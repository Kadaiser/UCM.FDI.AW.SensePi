<?php session_start(); ?>
<div id="header">
  <nav class="mainNav">
    <ul>
      <li id="navHome">
        <a href="../views/index.php"><span>HOME</span></a>
      </li>
      <li id="navTeam">
        <a href="../views/team.php"><span>TEAM</span></a>
      </li>
      <li id="navProject">
        <a href="../views/project.php"><span>PROJECT</span></a>
      </li>
      <li id="navContact">
        <a href="../views/contact.php"><span>CONTACT</span></a>
      </li>
    </ul>
  </nav>

  <nav class="mainNav rightNav">
    <ul>
	<?php
		if (isset($_SESSION["login"])) {  //Usuario
			?>
			<li id="navLogout">
				<a href="../views/logout.php"><span>LOGOUT</span></a>
			</li>
	<?php
		
			if ($_SESSION['isAdmin']==1) { //Usuario administrador
	?>
				<li id="navAdmin">
					<a href="../views/adminview.php"><span><?php echo $_SESSION['nick'];?></span></a>
				</li>
	<?php
			}
			else {  //Usuario
	?>
				<li id="navUser">
					<a href="../views/userView.php"><span><?php echo $_SESSION['nick'];?></span></a>
				</li>
	<?php
			}

		}
		else{
	?>
			<li id="navLogIn">
				<a href="../views/login.php"><span>LOGIN</span></a>
			</li>
	<?php
		}
	?>
    </ul>
  </nav>
</div>
