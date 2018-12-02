
<?php
  echo '<nav class="white card">
          <div class="nav-wrapper">
            <a href="home.php" class="brand-logo">
              <img class="logo" src="images/logo/fallrecipes.png" />
            </a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">';

  if(isset($_SESSION['AuthorName'])){
    echo '    <li class="black-text nav-text">'.$_SESSION['AuthorName'].'</li>
              <li class="red"><a href="logout.php">Logout</a></li>
            </ul>
          </div>
        </nav>';
		// print "<h4 align='center' style='color:orange;'>Welcome back, ".$_SESSION['AuthorName']."!</h4>";
	}else{
    echo '    <li class="blue"><a href="login.php">Login</a></li>
            </ul>
          </div>
        </nav>';
  }

?>
