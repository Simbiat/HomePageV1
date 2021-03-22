<?php
require_once('../commonfunc.php');

ini_set( "display_errors", 0);

// ######################### REQUIRE BACK-END ############################
require_once "../config.php";


	// ###### YOUR CUSTOM CODE GOES HERE #####
	echo "<title>Simbiat's Coins</title>";
	echo "<meta property=\"og:type\"   content=\"website\" /> 
		<meta property=\"og:url\"    content=\"http://".$_SERVER['SERVER_NAME']."\" /> 
		<meta property=\"og:title\"  content=\"Simbiat's Coins\" />
		<meta property=\"og:description\"  content=\"Simbiat's Coins\" /> 
		<meta property=\"og:image\"  content=\"http://".$_SERVER['SERVER_NAME']."/main/1/img/logo/simbiat.png\" /> ";

	require_once('../css.php');
	$files = scandir('./');
	$i = 0;
	$j = 0;
	$HTML = "<center><table style=\"border-collapse: collapse;\">";
	foreach ($files as $file) {
		if ($file != "." and $file != ".." and $file != "index.php" and $file != "thumbs") {
			$i++;
			if ($i % 2 == 0) {
				$HTML = $HTML . "<td style=\"border-bottom:1px solid;border-right:1px solid;\"><a target=\"_blank\" href=\"".$file."\"><img width=100px height=100px src=\"thumbs/" . $file . "\"></a></td></tr>";
			} else {
				$j++;
				$HTML = $HTML . "<tr><td style=\"border-top:1px solid;border-left:1px solid;border-right:1px solid;\" colspan=\"2\"><center>".$j."</center></td></tr><tr><td style=\"border-bottom:1px solid;border-left:1px solid;\"><a target=\"_blank\" href=\"".$file."\"><img width=100px height=100px src=\"thumbs/" . $file . "\"></a></td>";
			}
		}
	}
	$HTML = $HTML . "</table></center>";
echo $HTML;


?>