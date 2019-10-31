<?php

try {
  $dbname = "mysql:dbname=blog;host=localhost";
  $dbuser = "root";
  $dbpass = "root";
  $pdo = new PDO($dbname, $dbuser, $dbpass);
} catch (PDOException $e){
  echo $e->getMessage();
}

$author = "Jorge, o Autor ";
$title = "Titulo da postagem ";
$post = "Lorem Ipsum dolor sit amet é bem daora";

//Código para popular o banco

// for($i = 0; $i < 300; $i++){
//   $authorAux = $author . $i;
//   $titleAux = $title . $i;
//   $sql = "INSERT INTO posts SET autor = :autor, titulo = :titulo, post = :post";
//   $sql = $pdo->prepare($sql);
//   $sql->bindValue(":autor", $authorAux);
//   $sql->bindValue(":titulo", $titleAux);
//   $sql->bindValue(":post", $post);
//   $sql->execute();
//   // echo $authorAux." ".$titleAux."<br/>";
// }

$sql = "SELECT COUNT(*) as counter FROM posts";
$sql = $pdo->query($sql);
$sql = $sql->fetch();
$totalRegisters = $sql['counter'];
$numberOfPages = 30;
$totalPages = $totalRegisters / $numberOfPages;

$actualPage = 1;
if(isset($_GET['page']) && !empty($_GET['page'])) {
  $actualPage = addslashes($_GET['page']);
}

$page = ($actualPage - 1) * $totalPages;

$sql = "SELECT * FROM posts LIMIT $page, $totalPages";
$sql = $pdo->query($sql);

if($sql->rowCount() > 0) {
  foreach($sql->fetchAll() as $item) {
    echo $item['id']." - ".$item['autor']." - ".$item['titulo']." - ".$item['post']."<br/>";
  }
}

echo "<hr>";

for($i = 0; $i < $numberOfPages; $i++) {
  echo '<a href="/?page='.($i + 1).'">['.($i + 1).']</a>';
}