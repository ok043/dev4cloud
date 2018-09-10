<?php
$including_page = trim($_SERVER["PHP_SELF"],"/");

$pages = array(
  array("news.php", "News", 1),
  array("guestbook.php", "Guestbook", 1),
);

function display_nav($pages, $including_page) {
  foreach ($pages as $page){
    if ($page[0] == $including_page){
      echo '<li class="nav-item"><a class="nav-link active" href="' . $page[0] . '">' . $page[1] . '</a></li>';
    } else {
      echo '<li class="nav-item"><a class="nav-link" href="' . $page[0] . '">' . $page[1] . '</a></li>';
    }
  }
}

 ?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <a class="navbar-brand" href="index.php">Home</a>
    <ul class="navbar-nav">
      <?php display_nav($pages,$including_page); ?>
    </ul>
    <ul class="navbar-nav ml-auto">
      <?php   if (!isset($_SESSION['AccessToken'])) {    ?>


        <li class="nav-item" id="sign_up"><a class="nav-link"  href="register.php">Sign-Up</a></li>
        <li class="nav-item dropdown" id="sign_in">
          <a class="nav-link dropdowntoggle" title="Login" href="#" id="navbardrop" data-toggle="dropdown">
            <i data-feather="log-in"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <form action="res/login.php" method="POST" id="loginform">
             <div class="dropdown-item">
               <input type="text" class="form-control" placeholder="Username" name="username" id="username">
             </div>
             <div class="dropdown-item">
               <input type="password" class="form-control" placeholder="Password" name="password" id="password">
             </div>
             <input type="submit" class="btn btn-primary" id="loginsub" value="Login"/>
            </form>
          </div>
        </li>
      <?php   } else { ?>
        <li class="nav-item"><a class="nav-link" id="sign_out" title="Logout" href="res/logout.php"><i data-feather="log-out"></i></a></li>
      <?php   } ?>
    </ul>

</nav>
