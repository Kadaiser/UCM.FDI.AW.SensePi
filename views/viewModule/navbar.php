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
		if (isset($_SESSION["login"])) {
			?>
			<li id="navLogout">
				<a href="../php/logout.php"><span>LOGOUT</span></a>
			</li>

      <li id="navUser">
        <a href="../views/dashboard.php"><span><?php echo $_SESSION['nick'];?></span></a>
      </li>
	<?php
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
