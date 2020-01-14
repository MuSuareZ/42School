<!DOCTYPE html>
<html>
<link rel="stylesheet" href="login.css">
<body>
<?php
$nameErr = $passwordErr = "";
$name = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9]*$/",$name)) {
      $nameErr = "Only letters and numbers allowed!";
    }
  }
  
  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
    // check if e-mail address is well-formed
    if (!preg_match("/^[a-zA-Z0-9@]*$/",$password)) {
      $passwordErr = "Only letters and numbers allowed!";
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<center>
<div class="background">
	<div class="midpage">
	<head>
		<div class="banner"><h1>Caraio!!!</h1></div>
	</head>
		<div class="login">
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		User name: <input type="text" name="name" value="<?php echo $name;?>">
		<span class="error">* <?php echo $nameErr;?></span>
		<br>
		User password: <input type="password" name="password" value="<?php echo $password;?>">
		<span class="error">* <?php echo $passwordErr;?></span>
			<br><br>
			<input type="submit" name="submit" value="Submit">
			<input type="reset">
		</form>
		</div>
	</div>
</div>
</center>
</body>
</html>
