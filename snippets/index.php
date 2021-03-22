<?php
require_once('../commonfunc.php');
require_once "../config.php";
require_once('../css.php');
echo "<script src=\"../js/jquery-2.1.1.min.js\"></script>";
echo "
	<link rel=\"stylesheet\" href=\"./styles/hybrid.css\">
	<script src=\"./highlight.pack.js\"></script>
	<script>hljs.initHighlightingOnLoad();</script>
	";
if (empty($_GET['snippet']) or !file_exists("./".$_GET['snippet'].".txt")) {
	echo "<title>Simbiat's Code Snippets</title>";
	echo "<meta property=\"og:type\"   content=\"website\" /> 
		<meta property=\"og:url\"    content=\"http://".$_SERVER['SERVER_NAME']."\" /> 
		<meta property=\"og:title\"  content=\"Simbiat's Code Snippets\" />
		<meta property=\"og:description\"  content=\"Simbiat's Code Snippets\" /> 
		<meta property=\"og:image\"  content=\"http://".$_SERVER['SERVER_NAME']."/main/1/img/logo/cmd.png\" /> ";
	echo "<a href=\"../\">Main Page</a><br><br>No snippet selected! Below are the available ones.<br><br>";
	listsnippets();
} else {
	$link = mysqli_connect("$host", "$username", "$password", "$db_name");
	if (!$link) {
		Echo "Failed to conenct to database";
		Exit;
	} else {
		$snipgrab = mysqli_query($link, "SELECT * FROM m1__dssnippets WHERE ID=\"".$_GET['snippet']."\"");
		if (mysqli_num_rows($snipgrab)) {
			$row = mysqli_fetch_array($snipgrab, MYSQLI_ASSOC);
			echo "<title>Simbiat's ".str_replace("vbscript-html", "HTA", $row['type'])." Snippets: ".$row['Title']."</title>";
			echo "<meta property=\"og:type\"   content=\"website\" /> 
				<meta property=\"og:url\"    content=\"http://".$_SERVER['SERVER_NAME']."\" /> 
				<meta property=\"og:title\"  content=\"Simbiat's ".str_replace("vbscript-html", "HTA", $row['type'])." Snippets: ".$row['Title']."\" />
				<meta property=\"og:description\"  content=\"Simbiat's ".str_replace("vbscript-html", "HTA", $row['type'])." Snippets: ".$row['Title']."\" /> 
				<meta property=\"og:image\"  content=\"http://".$_SERVER['SERVER_NAME']."/main/1/img/logo/cmd.png\" /> ";
			echo "<a href=\"../\">Main Page</a>     |     <a href=\"../snippets\">List Snippets</a><br><br>";
			echo str_replace("Global Functions", "<a target=\"_blank\" href=\"globalfunctions\">Global Functions</a>", nl2br($row['description']));
			echo "<pre><code class=\"".strtolower(str_replace("vbscript-html", "HTA", $row['type']))."\">";
			$snippet = file_get_contents("./".$_GET['snippet'].".txt");
			echo htmlspecialchars($snippet);
			echo "</code></pre>";
		} else {
			Echo "Wrong or missing snippet! Below are the available ones.<br><br>";
			mysqli_close($link);
			listsnippets();
			exit;
		}
	}
}
function listsnippets() {
	global $host, $username, $password, $db_name;
	$link = mysqli_connect("$host", "$username", "$password", "$db_name");
	if (!$link) {
		Echo "Failed to conenct to database";
		Exit;
	} else {
		$snipgrab = mysqli_query($link, "SELECT ID, Title, type FROM m1__dssnippets ORDER BY type, Title");
		if (mysqli_num_rows($snipgrab)) {
			while ($row = mysqli_fetch_array($snipgrab, MYSQLI_ASSOC)) {
				echo "<a href=\"".$row['ID']."\" title=\"".$row['Title']."\">".$row['Title']."</a> (".str_replace("vbscript-html", "HTA", $row['type']).")<br>";
			}
		}
		mysqli_close($link);
	}

}
?>