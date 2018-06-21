<?php

 $get_file_path_name= dirname(__FILE__);
$get_file_path_name="./libs.inc.php";
 
//require_once ("./libs.inc.php");
//echo $get_file_path_name;
//echo "<br>";
//$get_file_path_name1=str_replace("admin","",$get_file_path_name);

//echo $get_file_path_name1;
//require_once ($get_file_path_name1."./libs.inc.php");
//require_once ("./libs.inc.php");
class data_base
{
    var  $server="localhost";
    var  $user="root";
    var $password="";
    var $db_name="blog";
    var $con;
    var $select_db;
    var $sql;
    var $sql_r;
	var $row; 
    public function __construct()
    {
        $this->con=mysqli_connect($this->server,$this->user,$this->password);
        if($this->con=="FALSE")
        {
             echo "connection Failed";
			 echo "<br>";
			 printf("Error: %s\n",mysqli_error($this->con)); 
            
        }    
        $this->select_db=mysqli_select_db($this->con,$this->db_name);
        

    if(!$this->select_db)
    {
    die("Database selection failed: " . mysqli_error($this->con));
}

        
 
        
    }
    public function exe_sql($sql1)
    {
        $this->sql=$sql1;
        $this->sql_r=mysqli_query($this->con,$this->sql) ;
        
       return $this->sql_r;
       
       
    }
 public         function mysql_die($msg)
  {
    echo "<FONT face=verdana SIZE=2 COLOR=#FF0000><B>ERROR: Unable to execute query</B></FONT><BR>";
    echo "<pre>$msg</pre>";
    echo "<FONT face=arial SIZE=2 COLOR=#0000FF><B>";
    echo mysqli_error($this->con);
    echo "</B></FONT><BR>";
    exit(0);
  }  
    
    
public function mysql_clean($value, $is_magic_quote_removed = 0)
{
    if (get_magic_quotes_gpc() && $is_magic_quote_removed == 0)
    {
        $value = stripslashes($value);
    }
    
    if (! is_numeric($value))
    {
        $value = mysqli_real_escape_string($this->con,$value);
    }
    
    return $value;
}
    
    public function get_db_results($result,$limit) 
   {
      SmartyPaginate::connect();
      SmartyPaginate::setLimit($limit);
         
       while ($new_blog = mysqli_fetch_assoc($result))
       {
        $_data[] = $new_blog;
        
        
        
      }
      SmartyPaginate::setTotal(count($_data));
      return array_slice($_data, SmartyPaginate::getCurrentIndex(),SmartyPaginate::getLimit());   
     
}
public function get_results($result1) 
   {
      
         
       while ($new_blog1 = mysqli_fetch_assoc($result1))
       {
        $_data1[] = $new_blog1;
        
      }
      
      return $_data1;
     
}
public function count_rows($result1) 
{
    $count= mysqli_num_rows($result1);
         
      
      
      return  $count;
     
}
    
	 
}   
?>