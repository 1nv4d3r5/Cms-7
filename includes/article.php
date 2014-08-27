<?php
    class Article{
        public function fetch_all(){
            global $pdo;
            $query=$pdo->prepare('SELECT * FROM articles');
            $query->execute();
            return $query->fetchAll();
        }

        public function fetch_data($articleId){
            global $pdo;
            $query=$pdo->prepare("SELECT * FROM articles WHERE articleId=?");
            $query->bindValue(1,$articleId);
            $query->execute();
            return $query->fetch();
        }
    }
?>