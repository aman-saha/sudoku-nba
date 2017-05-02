<?php 
  include("includes/database_connection.php");
  include("includes/functions.php");
  include("includes/session.php");
?>
<?php
  //echo $_SESSION['logged_in'];
  if($_SESSION['logged_in'])
  {
    $current_username = $_SESSION['current_username'];
    $current_ip = $_SESSION['current_ip']; 
  }
  else
    redirect_to("index.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Sudoku</title>  
      <link rel="stylesheet" href="css/style.css">
</head>
<style type="text/css">
  header {
  height:100px;
  background:black;
  color: white;
  text-align:center;
  line-height:100px;
}
footer { 
  position: relative;
  margin-top: 370px; /* negative value of footer height */
  height: 75px;
  text-align:center;
  background:white;
}
.cta
{
  font-family: 'helvetica neue', helvetica, arial, sans-serif;
  font-weight:500;
  text-decoration:none;
  margin: 0px 0px;
  color:white;
  background: black;
  display:inline-block;
  text-shadow:0 -1px 0px rgba(0,0,0,0.3);
  padding:8px 1em;
  border-radius:4px;
  box-shadow: 0 1px 0 rgba(255,255,255,0.5) inset, 0 -1px 0 rgba(0,0,0,0.3) inset;
}

.cta-colouring(@main-color)
{
   border:1px solid darken(@main-color, 5%);
   background:@main-color;
}
</style>
<body>
  <header>
    <h2>WELCOME TO SUDOKU RACE</h2>
  </header>
  <div>
  <form id="grid">
  <div id="subgrid-1">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1" value="6" disabled>
     <input type="text" maxlength="1">
  </div>
  <div id="subgrid-2">
     <input type="text" maxlength="1" value="1" disabled>
     <input type="text" maxlength="1">
     <input type="text" maxlength="1" value="3" disabled>
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1" value="7" disabled>
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1" value="5" disabled>
  </div>
  <div id="subgrid-3">
     <input type="text" maxlength="1" value="9" disabled>
     <input type="text" maxlength="1">
     <input type="text" maxlength="1" value="7" disabled>
     <input type="text" maxlength="1" value="5" disabled>
     <input type="text" maxlength="1">
     <input type="text" maxlength="1" value="6" disabled>
     <input type="text" maxlength="1">
     <input type="text" maxlength="1" value="3" disabled>
     <input type="text" maxlength="1" value="2" disabled>
  </div>
  <div id="subgrid-4">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1" value="8" disabled>
     <input type="text" maxlength="1" value="3" disabled>
     <input type="text" maxlength="1">
     <input type="text" maxlength="1" value="2" disabled>
  </div>
  <div id="subgrid-5">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1" value="1" disabled>
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
  </div>
  <div id="subgrid-6">
     <input type="text" maxlength="1" value="8" disabled>
     <input type="text" maxlength="1">
     <input type="text" maxlength="1" value="9" disabled>
     <input type="text" maxlength="1" value="4" disabled>
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
  </div>
  <div id="subgrid-7">
     <input type="text" maxlength="1" value="4" disabled>
     <input type="text" maxlength="1" value="8" disabled>
     <input type="text" maxlength="1">
     <input type="text" maxlength="1" value="6" disabled>
     <input type="text" maxlength="1">
     <input type="text" maxlength="1" value="1" disabled>
     <input type="text" maxlength="1" value="2" disabled>
     <input type="text" maxlength="1">
     <input type="text" maxlength="1" value="5" disabled>
  </div>
  <div id="subgrid-8">
     <input type="text" maxlength="1" value="3" disabled>
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1" value="9" disabled>
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1" value="7" disabled>
     <input type="text" maxlength="1">
     <input type="text" maxlength="1" value="1" disabled>
   </div>
  <div id="subgrid-9">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1" value="9" disabled>
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
     <input type="text" maxlength="1">
   </div>
</form>
</div>
  <script src="reg.js"></script>
  <footer>
    <a class="cta" href="logout.php">Submit Solution</a>
    <a class="cta" href="logout.php">Logout <?php echo "$current_username"; ?> </a>
  </footer>
</body>
</html>
