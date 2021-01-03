<?php

class Dataclass
{
    
	private $conn;


    public function __construct()
    {
       $this->conn=mysqli_connect("localhost","root","","iant") or die('connection Failed');
    }
    public function getConn()
    {
        return $this->conn;
    }

    public function saveRecord($query)
    {
    	$res=mysqli_query($this->conn,$query);
	    return $res;
    }
    public function checkExUser($query)
    {
    	$res = mysqli_query($this->conn,$query);
    	if (mysqli_num_rows($res) > 0)
        {
    		return false;														
    	}
        else
        {
    		return true;
    	}
    }

     public function getTable($query)
    {
    	$table = mysqli_query($this->conn,$query);

    	return $table;
    }

    public function getRow($query)
    {
    	$table = mysqli_query($this->conn,$query);
    	$row = mysqli_fetch_assoc($table);
    	return $row;
    }

    public function deleteRecord($query)
    {
    	$res=mysqli_query($this->conn,$query);
    	return $res;
    }

    public function __destruct()
    {
    	mysqli_close($this->conn);
    }
}

	
?>