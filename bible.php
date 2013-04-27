<?PHP 
//MYSQL Database 1 (For events) 
$dbusername1 = "cakephpspencer";
$dbpassword1 = "JESUSsaves!777";
$hostname1 = "cakephpspencer.db.7228669.hostedresource.com";
$dbname1 = "cakephpspencer";
$link1 = mysql_connect($hostname1,$dbusername1 ,$dbpassword1) or die('Cannot connect to the DB');

mysql_select_db("cakephpspencer"); 

$sql="CREATE TABLE `bible` (
  `id` int(11) NOT NULL auto_increment,
  `ref` varchar(100) NOT NULL,
  `book` varchar(100) NOT NULL,
  `chapter` int(10) NOT NULL,
  `verse` int(10) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;"; 
$x= mysql_query($sql); 

$y = set_time_limit(0);
print(str_repeat(" ", 300) . "\n"); 
flush(); // Flush all output to make sure 
?>
<html>
	<head><title>1611 KJV Bible</title></head>
	<body>
	<table>
<?PHP

$bible = simplexml_load_file('kjv_osis.xml');
//print_r($bible); 

for($d=0; $d<66; $d++){
	echo $d."<br>"; 
	for($c=0; $c<160; $c++){ 
		for($v=0; $v<100; $v++){ 
			$x = $bible->osisText[0]->div[$d]->chapter[$c]->verse[$v];
				if ($x==NULL || $x=="" || $x==" "){ 
					continue; 
				}else{
?>
<!-- <tr><td><?PHP $r= $x["osisID"]; //echo $r; ?></td><td><?PHP //echo $x ?></td></tr> !-->
<?
$o = explode(".",$r); 
$sql="INSERT INTO  bible ( `id` ,`ref` ,`book`,`chapter`,`verse`,`text`) VALUES ('NULL',  '{$r}','{$o[0]}','{$o[1]}','{$o[2]}',  '{$x}');"; 
$result = mysql_query($sql); 
		}
				}
		if ($x==NULL || $x=="" || $x==" "){ 
			continue; 
		}
	} 
	if($x==NULL){ 
		continue; 
	} 
}
?>
	</table>
	</body>
</html>
