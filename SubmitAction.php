<?php     
require_once ("./libs.inc.php");
$date_input=$_POST['dob'];
$from=$_POST['From_Currency'];
$to=$_POST['To_Currency'];
$manip_date=str_replace("/","-",$date_input);
$time = strtotime($manip_date);
$newformat_date = date('Y-m-d',$time);
$response = file_get_contents('http://data.fixer.io/api/'.$newformat_date.'?access_key=002c4ed42615bd348b9cc48b44a512f2&base='.$from.'&symbols='.$to.'&format=1');
$result = json_decode($response,true);
echo "<br>";
echo $response ;
echo "<br>";
//echo $result['base'];
$rate = $result['rates'][$to];
echo "<br>";
echo "rate=";
echo $rate;
//exiting without doing anything if service is down
if ($rate==0)
{
	
	//echo $rate;
	header("location: Index.php?rate=$rate");
	exit();
}
$Dbo->DbConnect();
$sql_get_date_id_count = "SELECT count(date_id) FROM DOB  WHERE dob='$newformat_date'";
$get_date_id_count=$Dbo->exe_sql($sql_get_date_id_count); 
while ($row_count = mysqli_fetch_array($get_date_id_count))
{
	if($row_count[0]==0)
	{
		//dob table insertion for a fresh row
		
		$sql_dob_insert="insert into dob(dob) values ('$newformat_date')";
		$dob_insert=$Dbo->Insert($sql_dob_insert);
		
		//get date_id from dob table
		
		$sql_get_date_id= "SELECT date_id FROM DOB  WHERE dob='$newformat_date'";
		$get_date_id=$Dbo->exe_sql($sql_get_date_id); 
		
		while ($row = mysqli_fetch_array($get_date_id))
		{
			
			//dob_rate table insertion for a fresh row
			
			$sql_dob_rate_insert="insert into dob_rate(date_id,base_currency,to_currency,rate) values ('$row[0]','$from','$to','$rate')";
			echo $sql_dob_rate_insert;
			$dob_rate_insert_result=$Dbo->Insert($sql_dob_rate_insert);
		}
		header("location: Index.php?rate=$rate");

		exit();
	}
	if($row_count[0]>0)
	{
		//dob table has already entry for a date
		
		$sql_get_date_id= "SELECT date_id FROM DOB  WHERE dob='$newformat_date'";
		$get_date_id=$Dbo->exe_sql($sql_get_date_id); 
		
		while ($row = mysqli_fetch_array($get_date_id))
		{
			
						
			$sql_get_date_id_to_currency_count= "SELECT count(id) FROM dob_rate  WHERE date_id='$row[0]' and 
			to_currency='$to' and base_currency='$from'" ;
			$get_date_id_to_currency_count=$Dbo->exe_sql($sql_get_date_id_to_currency_count); 
			while ($row_date_id_to_currency_count = mysqli_fetch_array($get_date_id_to_currency_count))
			{
				
				//dob table count check for fresh row
				
				if($row_date_id_to_currency_count[0]==0)
				{
										
					$sql_dob_rate_insert="insert into dob_rate(date_id,base_currency,to_currency,rate) values ('$row[0]','$from','$to','$rate')";
					$dob_rate_insert_result=$Dbo->Insert($sql_dob_rate_insert);
			
				}
				else
				{
					//dob table count check if count has alreday value
					
					$sql_get_currency_data= 
					"SELECT id,count FROM dob_rate  WHERE 
					date_id='$row[0]' and to_currency='$to' and base_currency='$from'" ;	
					
					$get_currency_data=$Dbo->exe_sql($sql_get_currency_data); 
					while ($row_currency_data = mysqli_fetch_array($get_currency_data))
					{
							$new_count=$row_currency_data['count']+1;					
						$Sql_update="update dob_rate set  count='$new_count'
						WHERE id='$row_currency_data[id]' and to_currency='$to' and base_currency='$from'" ;
						$return_value=$Dbo->exe_sql($Sql_update); 
					
					
					}
					
						
				}
		}
		header("location: Index.php?rate=$rate");
		exit();
		
	}
}
}
?>