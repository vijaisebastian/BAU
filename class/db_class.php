<?php
class data_base
{
    var  $server="localhost";
    var  $user="root";
    var $password="";
    var $con;
    var $select_db;
    var $db_name="blog";
    var $sql;
    var $sql_r;
	var $row; 
    public function db_connect()
    {
        $this->con=mysqli_connect($this->server,$this->user,$this->password);
        if($this->con=="FALSE")
        {
             echo "connection Failed";
			 echo "<br>";
			 printf("Error: %s\n",mysqli_error($this->con)); 
            
        }
       
    }
    public function db_select()
    
    
    {
        


        $this->select_db=mysqli_select_db($this->con,$this->db_name);
        if($this-$select_db=="FALSE")
        {
            echo  "Unable to select DB";
			echo "<br>";
			echo "More details";
			printf("Error: %s\n",mysqli_error($this-$select_db)); 
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