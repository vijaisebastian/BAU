<?php     
require_once ("./libs.inc.php");

//db data


$smarty->display('Header.tpl');
//menu data




$Dbo->DbConnect();

$Sql = "SELECT distinct dob.dob, dob_rate.base_currency,dob_rate.to_currency,dob_rate.rate,dob_rate.count
FROM dob_rate
INNER JOIN dob ON dob.date_id = dob_rate.date_id order by dob.dob desc;";
$dob_rate=$Dbo->Select($Sql);
if(!isset($dob_rate) )
{
echo "No data please add data";
}
else
{
$smarty->assign('dob_rate', $dob_rate);
}

$smarty->display('Index.tpl');

//content for each slots

//footer ui
$smarty->display('Footer.tpl');
//footer ui


?>







