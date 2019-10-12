<?php
  if((isset($_GET['n1']) && !empty($_GET['n1'])) && (isset($_GET['n2'])) && ($_GET['operation'] < 4)){
    $number1 = $_GET['n1'];
    $number2 = $_GET['n2'];
    $operation = $_GET['operation'];

    switch($operation){
      case '0':
        $sum = $number1 + $number2;
        echo "<h2>".$number1." + ".$number2." = ".$sum."</h2>";
        break;
      case '1':
        $minus = $number1 - $number2;
        echo "<h2>".$number1." - ".$number2." = ".$minus."</h2>";
        break;
      case '2': 
        $multiply = $number1 * $number2;
        echo "<h2>".$number1." * ".$number2." = ".$multiply."</h2>";
        break;
      case '3':
        if($number2 != 0){
          $division = $number1 / $number2;
          echo "<h2>".$number1." / ".$number2." = ".$division."</h2>";
        } else {
          echo "<h2>Divisao por 0 nao existe</h2>";
        }
        break;
        default:
          echo "<h2>Caso nao calculavel</h2>";
    }

  } else {
    header("Location: index.php");
  }
