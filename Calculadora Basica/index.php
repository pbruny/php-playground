<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Calculadora</title>
</head>
<body>
  <form action="calcular.php" method="get">
    <input type="number" name="n1" placeholder="Insira um número">
    <select name="operation">
      <option value="4"></option>
      <option value="0">+</option>
      <option value="1">-</option>
      <option value="2">*</option>
      <option value="3">/</option>
    </select>
    <input type="number" name="n2" placeholder="Insira um número">
    <input type="submit" value="Calcular">
  </form>
</body>
</html>