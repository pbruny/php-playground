<?php

  class Contato {

    private $pdo;
    private $db_name;
    private $db_user;
    private $db_password;

    public function __construct() {
      try {
        $this->db_name = "mysql:dbname=projeto_crud;host=localhost";
        $this->db_user = "root";
        $this->db_password = "root";
      
        $this->pdo = new PDO($this->db_name, $this->db_user, $this->db_password);
      } catch (PDOException $e) {
          echo $e->getMessage();
      }
  }

  public function addContact($email, $name = "") {
    if($this->emailExists($email) == false) {
      $sql = "INSERT INTO contacts (name, email) VALUES (:name, :email)";
      $sql = $this->pdo->prepare($sql);
      $sql->bindValue(':name', $name);
      $sql->bindValue(':email', $email);
      $sql->execute();

      return true;
    } else {
      return false;
    }
  }

  public function getNameByEmail($email) {
    $sql = "SELECT name FROM contacts WHERE email = :email";
    $sql = $this->pdo->prepare($sql);
    $sql->bindValue(':email', $email);
    $sql->execute();

    if($sql->rowCount() > 0) {
      $data = $sql->fetch();

      return $data['name'];
    } else {
      return "";
    }
  }

  public function getContactById($id) {
    $sql = "SELECT * FROM contacts WHERE id = :id";
    $sql = $this->pdo->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0) {
      $data = $sql->fetch();

      return $data;
    } else {
      return "";
    }
  }

  public function getAllContacts() {
    $sql = "SELECT * FROM contacts";
    $sql = $this->pdo->query($sql);

    if($sql->rowCount() > 0){
      $data = $sql->fetchAll();

      return $data;
    } else {
      return array();
    }
  }

  public function editContactNameByEmail($email, $name) {
    if($this->emailExists($email)) {
      $sql = "UPDATE contacts SET name = :name WHERE email = :email";
      $sql = $this->pdo->prepare($sql);
      $sql->bindValue(':name', $name);
      $sql->bindValue(':email', $email);
      $sql->execute();

      return true;
    } else {
      return false;
    }
  }

  public function editContactNameById($id, $name, $email) {
    $sql = "UPDATE contacts SET name = :name, email = :email WHERE id = :id";
    $sql = $this->pdo->prepare($sql);
    $sql->bindValue(':name', $name);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':id', $id);
    $sql->execute();
  }

  public function deleteContactByEmail($email) {
    if($this->emailExists($email)) {
      $sql = "DELETE FROM contacts WHERE email = :email";
      $sql = $this->pdo->prepare($sql);
      $sql->bindValue(':email', $email);
      $sql->execute();

      return true;
    } else {
      return false;
    }
  }

  public function deleteContactById($id){
    $sql = "DELETE FROM contacts WHERE id = :id";
    $sql = $this->pdo->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->execute();
    return true;
  }

  private function emailExists($email){
    $sql = "SELECT * FROM contacts WHERE email = :email";
    $sql = $this->pdo->prepare($sql);
    $sql->bindValue(':email', $email);
    $sql->execute();

    if($sql->rowCount() > 0){
      return true;
    } else {
      return false;
    }
  }


}

?>