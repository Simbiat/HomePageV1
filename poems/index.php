<?php
require_once('../commonfunc.php');
require_once "../config.php";
require_once('../css.php');
echo "<script src=\"../js/jquery-2.1.1.min.js\"></script>";
echo "<title>Simbiat's Poems</title>";
echo "<meta property=\"og:type\"   content=\"website\" /> 
	<meta property=\"og:url\"    content=\"http://".$_SERVER['SERVER_NAME']."\" /> 
	<meta property=\"og:title\"  content=\"Simbiat's Poems\" />
	<meta property=\"og:description\"  content=\"Simbiat's Poems\" /> 
	<meta property=\"og:image\"  content=\"http://".$_SERVER['SERVER_NAME']."/main/1/img/logo/poems.png\" /> ";
$link = mysqli_connect("$host", "$username", "$password", "$db_name");
if (!$link) {
	Echo "Failed to conenct to database";
	Exit;
} else {
	mysqli_set_charset($link, 'UTF8');
	echo "<div id=\"navigation\" style=\"width:15%; height:500px; overflow-y:auto;float:left;position: fixed;\"><a href=\"../\">Main Page</a><br><br>In Russian<br>";
	$snipgrab = mysqli_query($link, "(SELECT id, title FROM m1__dspoems WHERE language=\"rus\" AND original is NULL AND title <> \"***\") UNION ALL (SELECT id, CONCAT(SUBSTRING(m1__dspoems.text from 1 FOR LOCATE(\"\n\", m1__dspoems.text)), \"...\") as title FROM m1__dspoems WHERE language=\"rus\" AND original is NULL AND title = \"***\") ORDER BY title");
	if (mysqli_num_rows($snipgrab)) {
		while ($row = mysqli_fetch_array($snipgrab, MYSQLI_ASSOC)) {
			echo "--- <a href=\"#".$row['id']."\">".$row['title']."</a><br>";
		}
	}
	echo "<br>In English<br>";
	$snipgrab = mysqli_query($link, "(SELECT id, title FROM m1__dspoems WHERE language=\"eng\" AND original is NULL AND title <> \"***\") UNION ALL (SELECT id, CONCAT(SUBSTRING(m1__dspoems.text from 1 FOR LOCATE(\"\n\", m1__dspoems.text)), \"...\") as title FROM m1__dspoems WHERE language=\"eng\" AND original is NULL AND title = \"***\") ORDER BY title");
	if (mysqli_num_rows($snipgrab)) {
		while ($row = mysqli_fetch_array($snipgrab, MYSQLI_ASSOC)) {
			echo "--- <a href=\"#".$row['id']."\">".$row['title']."</a><br>";
		}
	}
	echo "<br>Versions<br>";
	$snipgrab = mysqli_query($link, "(SELECT id, title FROM m1__dspoems WHERE type=\"orig\" AND original is not NULL AND title <> \"***\") UNION ALL (SELECT id, CONCAT(SUBSTRING(m1__dspoems.text from 1 FOR LOCATE(\"\n\", m1__dspoems.text)), \"...\") as title FROM m1__dspoems WHERE type=\"orig\" AND original is not NULL AND title = \"***\") ORDER BY title");
	if (mysqli_num_rows($snipgrab)) {
		while ($row = mysqli_fetch_array($snipgrab, MYSQLI_ASSOC)) {
			echo "--- <a href=\"#".$row['id']."\">".$row['title']."</a><br>";
		}
	}
	echo "<br>Translations<br>";
	$snipgrab = mysqli_query($link, "(SELECT id, title FROM m1__dspoems WHERE type=\"trans\" AND original is not NULL AND title <> \"***\") UNION ALL (SELECT id, CONCAT(SUBSTRING(m1__dspoems.text from 1 FOR LOCATE(\"\n\", m1__dspoems.text)), \"...\") as title FROM m1__dspoems WHERE type=\"trans\" AND original is not NULL AND title = \"***\") ORDER BY title");
	if (mysqli_num_rows($snipgrab)) {
		while ($row = mysqli_fetch_array($snipgrab, MYSQLI_ASSOC)) {
			echo "--- <a href=\"#".$row['id']."\">".$row['title']."</a><br>";
		}
	}
	echo "</div><div style=\"padding-left: 50px;float:left;\">";
	$snipgrab = mysqli_query($link, "SELECT * FROM m1__dspoems ORDER BY date DESC");
	if (mysqli_num_rows($snipgrab)) {
		echo "<table>";
		while ($row = mysqli_fetch_array($snipgrab, MYSQLI_ASSOC)) {
			echo "<tr id=\"".$row['id']."\"><td colspan=\"2\"><center><br><br><b>{$row['title']}</b> <sup style=\"font-size:xx-small; vertical-align:super;\"><a href=\"{$row['copyright']}\" target=\"_blank\">&copy;</a></sup></center></td></tr>";
			echo "<tr><td style=\"font-size:small;\" colspan=\"2\"><center><i>".date("d.m.Y", $row['date'])."</i> <sup style=\"font-size:xx-small; vertical-align:super;\"><a title=\"This date may be approximate or simply be representing the date on stihi.ru rather than real date a piece was written.\" href=\"#\">[?]</a></sup></center></td></tr>";
			if ($row['description'] != "") {
				echo "<tr><td style=\"text-align:center\" colspan=\"2\">".nl2br($row['description'])."<br><br></td></tr>";
			}
			if ($row['song'] != "") {
				echo "<tr><td colspan=\"2\"><center><audio controls preload=\"metadata\">
					<source src=\"".$row['song']."\" type=\"audio/mpeg\">
					Your browser does not support the audio element.
					</audio><br><br></center></td></tr>";
			}
			if ($row['original'] == "") {
				echo "<tr><td style=\"vertical-align:top;\" colspan=\"2\">";
			} else {
				echo "<tr style=\"text-align:center\"><td><i>Translation</i></td><td><i>Original</i></td></tr>";
				echo "<tr><td style=\"vertical-align:top;\">";
			}
			echo "<center>".nl2br($row['text'])."</center>";
			if ($row['original'] != "" and $row['type'] == "trans") {
				
			}
			echo "</td>";
			if ($row['original'] != "") {
				echo "<td style=\"vertical-align:top;\"><center>".nl2br($row['original'])."</center></td>";
			}
			echo "</tr>";
		}
		echo "</table></div>";
	} else {
		Echo "Wrong or missing poem! Below are the available ones.<br><br>";
		mysqli_close($link);
		listsnippets();
		exit;
	}
}
?>