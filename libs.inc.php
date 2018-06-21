<?php

$fixpath = dirname(__FILE__);//This will provide you the current file path
require_once("class\DbClass.php"); //Using this we can acess functions in db_class.php  
$Dbo=new DbOperations();
require 'smarty\Smarty.class.php';//Using this we can acess functions in Smarty.class.php
require 'smarty\SmartyPaginate.class.php';  //Using this we can acess functions in SmartyPaginate.class.php
$smarty = new Smarty;//Creating a smarty object
$smarty->plugin_dir = '\user\smarty\plugins';    //smarty folder set up
$smarty->compile_dir = "$fixpath\compile"; //smarty folder set up
$smarty->template_dir = "$fixpath\html"; //smarty folder set up

?>



