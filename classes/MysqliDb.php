<?php

class MysqliDb{
    public $conn;
    function __construct($servername, $username, $password, $dbname){
        // Create connection
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        //echo "Connecttion successful";
    }

    function rawQuery($sql){
        $conn->query($sql);
    }

    function get($tableName, $select, $where=""){
        $sql = "SELECT ".$select." from ".$tableName;
        if($where!=""){
            $sql  .= "WHERE ".$where;
        }
        $result = $this->conn->query($sql);
        $data = array();
        while($row = $result->fetch_object()) {
            $data[]=$row;
        }
        return $data;
    }

    function update($tableName, $updateData, $where){
        $sql = "Update ".$tableName." SET ";
        $cols=array();
        foreach($updateData as $key=>$val){
            $cols[]=$key."='".$val."'";
        }
        $sql .= "".implode(', ',$cols);
        if($where!=""){
            $sql  .= " WHERE ".$where;
        }
        //echo $sql;
        $this->conn->query($sql);
        return $this->conn->affected_rows;
    }
}