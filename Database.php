<?php  

class Database{

    public $connection;
    public $hostName="localhost";
    public $dbName="search_box";
    public $dbUserName="root";
    public $dbPassWord="";

    public function __construct(){
        $this->connection = new PDO("mysql:host=$this->hostName;dbname=$this->dbName", $this->dbUserName , $this->dbPassWord);
        if($this->connection){
            //echo 'Connected';
        }else{
            echo 'error';
        }
    }
    //Insert
    public function insert($title,$description){
        $query = "INSERT INTO posts(title,description,post_date) VALUES(:title, :description, :post_date)";
        $statement = $this->connection->prepare($query);
        $statement->execute(array(
            ':title' =>$title,
            ':description' =>$description,
            ':post_date' => date('Y-m-d')
        ));
    }

    //Fetch Data
    public function searchData($search){
        $query = "SELECT * FROM posts WHERE title LIKE '%$search%' OR description LIKE '%$search%' OR post_date LIKE '%$search%'";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }
}


?>