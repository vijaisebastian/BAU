<?php
class DbOperations
{
    public $server="localhost";
    public $user="root";
    public $password="";
    public $databse="ff";
    public $con;
    public function DbConnect()
    {
    
    	$this->con=new mysqli($this->server,$this->user, $this->password, $this->databse);
    	$this->con->set_charset("utf8");
    	if ($this->con->connect_error)
    	{
    		die("Connection failed: " . $con->connect_error);
    	}
    
   

    }
    public function Insert($sql)
	{
		
    	 if ($this->con->query($sql))
    	{
    		return "true";
    	}
    	else 
    	{
    		echo "Error: " ;
    		echo $this->con->error;
    	} 
    	
    }
    public function Select($sql)
    {
    	
    	$result=$this->con->query($sql);
    	if ($result->num_rows > 0)
    	{
    	
    	while ($item=$result->fetch_assoc())
    	{
    	
    		$items[]=$item;
    	
    	}
    	return $items;
    	}
    	else 
    	{
    		return 0;
    	}
    }
    public function exe_sql($sql1)
    {
    	$this->sql=$sql1;
    	echo "<br>";
    	//echo $this->sql;
    	$this->sql_r=mysqli_query($this->con,$this->sql);
    	return   $this->sql_r;
    	if($this->sql_r=="FALSE")
    	{
    		echo "Query Failed";
    		printf("Error: %s\n",mysqli_error($this->sql_r));
    		echo "<br>";
    		 
    	}
    
    
    }
    
    
	 
}   
?>