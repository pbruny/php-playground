<?php

    class Log {
        private $pdo;

        public function __construct()
        {
            try {
                $this->pdo = new PDO("mysql:dbname=projeto_log;host=localhost", "root", "root");
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function logRegister($action) {
            $ip = $_SERVER['REMOTE_ADDR'];
            $sql = "INSERT INTO log SET ip = :ip, date = NOW(), action = :action";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":ip", $ip);
            $sql->bindValue(":action", $action);
            $sql->execute();
        }

        public function getVisitCount() {
            $sql = "SELECT COUNT(*) as counter FROM log";
            $sql = $this->pdo->query($sql);
            if($sql->rowCount() > 0) {
                $sql = $sql->fetch();
                return $sql['counter'];
            }
            return false;
        }
    }