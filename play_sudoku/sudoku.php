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
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
     <input type="text" id="11" maxlength="1">
     <input type="text" id="12" maxlength="1">
     <input type="text" id="13" maxlength="1">
     <input type="text" id="14" maxlength="1">
     <input type="text" id="15" maxlength="1">
     <input type="text" id="16" maxlength="1">
     <input type="text" id="17" maxlength="1">
     <input type="text" id="18" maxlength="1" value="6" disabled>
     <input type="text" id="19" maxlength="1">
  </div>
  <div id="subgrid-2">
     <input type="text" id="21" maxlength="1" value="1" disabled>
     <input type="text" id="22" maxlength="1">
     <input type="text" id="23" maxlength="1" value="3" disabled>
     <input type="text" id="24" maxlength="1">
     <input type="text" id="25" maxlength="1">
     <input type="text" id="26" maxlength="1" value="7" disabled>
     <input type="text" id="27" maxlength="1">
     <input type="text" id="28" maxlength="1">
     <input type="text" id="29" maxlength="1" value="5" disabled>
  </div>
  <div id="subgrid-3">
     <input type="text" id="31" maxlength="1" value="9" disabled>
     <input type="text" id="32" maxlength="1">
     <input type="text" id="33" maxlength="1" value="7" disabled>
     <input type="text" id="34" maxlength="1" value="5" disabled>
     <input type="text" id="35" maxlength="1">
     <input type="text" id="36" maxlength="1" value="6" disabled>
     <input type="text" id="37" maxlength="1">
     <input type="text" id="38" maxlength="1" value="3" disabled>
     <input type="text" id="39" maxlength="1" value="2" disabled>
  </div>
  <div id="subgrid-4">
     <input type="text" id="41" maxlength="1">
     <input type="text" id="42" maxlength="1">
     <input type="text" id="43" maxlength="1">
     <input type="text" id="44" maxlength="1">
     <input type="text" id="45" maxlength="1">
     <input type="text" id="46" maxlength="1" value="8" disabled>
     <input type="text" id="47" maxlength="1" value="3" disabled>
     <input type="text" id="48" maxlength="1">
     <input type="text" id="49" maxlength="1" value="2" disabled>
  </div>
  <div id="subgrid-5">
     <input type="text" id="51" maxlength="1">
     <input type="text" id="52" maxlength="1">
     <input type="text" id="53" maxlength="1">
     <input type="text" id="54" maxlength="1">
     <input type="text" id="55" maxlength="1" value="1" disabled>
     <input type="text" id="56" maxlength="1">
     <input type="text" id="57" maxlength="1">
     <input type="text" id="58" maxlength="1">
     <input type="text" id="59" maxlength="1">
  </div>
  <div id="subgrid-6">
     <input type="text" id="61" maxlength="1" value="8" disabled>
     <input type="text" id="62" maxlength="1">
     <input type="text" id="63" maxlength="1" value="9" disabled>
     <input type="text" id="64" maxlength="1" value="4" disabled>
     <input type="text" id="65" maxlength="1">
     <input type="text" id="66" maxlength="1">
     <input type="text" id="67" maxlength="1">
     <input type="text" id="68" maxlength="1">
     <input type="text" id="69" maxlength="1">
  </div>
  <div id="subgrid-7">
     <input type="text" id="71" maxlength="1" value="4" disabled>
     <input type="text" id="72" maxlength="1" value="8" disabled>
     <input type="text" id="73" maxlength="1">
     <input type="text" id="74" maxlength="1" value="6" disabled>
     <input type="text" id="75" maxlength="1">
     <input type="text" id="76" maxlength="1" value="1" disabled>
     <input type="text" id="77" maxlength="1" value="2" disabled>
     <input type="text" id="78" maxlength="1">
     <input type="text" id="79" maxlength="1" value="5" disabled>
  </div>
  <div id="subgrid-8">
     <input type="text" id="81" maxlength="1" value="3" disabled>
     <input type="text" id="82" maxlength="1">
     <input type="text" id="83" maxlength="1">
     <input type="text" id="84" maxlength="1" value="9" disabled>
     <input type="text" id="85" maxlength="1">
     <input type="text" id="86" maxlength="1">
     <input type="text" id="87" maxlength="1" value="7" disabled>
     <input type="text" id="88" maxlength="1">
     <input type="text" id="89" maxlength="1" value="1" disabled>
   </div>
  <div id="subgrid-9">
     <input type="text" id="91" maxlength="1">
     <input type="text" id="92" maxlength="1" value="9" disabled>
     <input type="text" id="93" maxlength="1">
     <input type="text" id="94" maxlength="1">
     <input type="text" id="95" maxlength="1">
     <input type="text" id="96" maxlength="1">
     <input type="text" id="97" maxlength="1">
     <input type="text" id="98" maxlength="1">
     <input type="text" id="99" maxlength="1">
   </div>
</form>
</div>
  <footer>
    <button type="button" class="cta" id ="solution">Sumbit Solution</button>
    <a class="cta" href="logout.php">Logout <?php echo "$current_username"; ?> </a>
  </footer>
  <script src="reg.js"></script>
</body>
</html>
