<?php

if(isset($_POST["n_a"]) && isset($_POST["n_b"]) && isset($_POST["operator"])) {
  $n_a = $_POST["n_a"];
  $n_b = $_POST["n_b"];
  $n_a_size = strlen($n_a);
  $n_b_size = strlen($n_b);
  $operator = $_POST["operator"];

  if($n_a_size == 0 || $n_b_size == 0) {
    echo "Field data missing";
  }
  else {
    switch ($operator) {
      case "+":
        $result = $n_a + $n_b;
      break;

      case "-":
        $result = $n_a - $n_b;
      break;

      case "*":
        $result = $n_a * $n_b;
      break;

      case "/":
        if ($n_b !=0){
          $result = $n_a / $n_b;
        } else {
          $result = "undivided, denominator value can't be zero";
        }     
      break;

      // default:
      //   if ($n_a = "" || $n_b = ""){
      //     $result = "Invallid operator or incomplete information";
      //   }
      // break;  
    }

  }
  echo $result = $n_a.$operator.$n_b." = ".$result;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignment on simple php calculator 26092023</title>

</head>

<body>
  <br><br>
  <form action="#" method="post">
  
   <label for="">A:</label>
   <input type="number" name="n_a" id="number_a"><br><br>

   <label for="">B:</label>
   <input type="number" name="n_b" id="number_b"><br><br>

   <input type="submit" value="+" name="operator" id="add">
   <input type="submit" value="-" name="operator" id="substract" >
   <input type="submit" value="*" name="operator" id="multiply">
   <input type="submit" value="/" name="operator" id="divide">

  </form>

</body>

</html>