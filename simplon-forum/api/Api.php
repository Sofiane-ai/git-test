<?php

//data base connexion
//and function to perform CRUD functions 


class Api{
    private $connect;

    //private $host = "localhost";
    //private $db_name = "simplonforum";
    private $username = "root";
    private $password = "";
    
   


    function __construct(){
        $this->database_connection();
    }

    public function database_connection(){
        // on ferme la connexion si elle existait
        $this->connect = null;

        // On essaie de se connecter
       
            $this->connect = new PDO('mysql:host=localhost;dbname=simplonforum;charset=utf8;port=3308',$this->username, $this->password);
            $this->connect->exec("set names utf8") ; // On force les transactions en UTF-8
         
    }  
    
    function fetch_all(){
        $query = "SELECT topic.title, post.id, post.content, post.author, post.topic_id, post.date FROM  post  LEFT JOIN topic ON post.topic_id = topic.id ORDER BY post.date DESC";
        $statement = $this->connect->prepare($query);
        if($statement->execute())
        {
            while($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $data[] = $row;
            }
            return $data;  
        }  
    }

}







?>