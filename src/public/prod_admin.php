<?php

class Product
{  
// подключение к базе данных и имя таблицы
    private $conn;
    private $table_name = "auto";
// свойства объекта
    public $id;
    public $name;
    public $itog_0;
    public $itog;
    public $marka;
    public $model;
        
public function __construct($db)
{ $this->conn = $db; }


function singer() {
    $query = "SELECT id,title,parent FROM music WHERE parent=0";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
}

function singer1($id1)  {
    $query="SELECT id,title,parent FROM music WHERE parent=$id1";
    $stmt1=$this->conn->prepare($query);
    $stmt1->execute();
    return $stmt1;
}

function singer2($id2)  {
    $query="SELECT id,title,parent FROM music WHERE parent=$id2";
    $stmt2=$this->conn->prepare($query);
    $stmt2->execute();
    return $stmt2;
}
function singer3($id3)  {
    $query="SELECT id,title,parent FROM music WHERE parent=$id3";
    $stmt3=$this->conn->prepare($query);
    $stmt3->execute();
    return $stmt3;
}




}