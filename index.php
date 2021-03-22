<?php
require_once('./commonfunc.php');

ini_set( "display_errors", 0);

// ######################### REQUIRE BACK-END ############################
require_once "./config.php";

	// ###### YOUR CUSTOM CODE GOES HERE #####
	echo "<title>Simbiat's Page</title>";
	echo "<meta property=\"og:type\"   content=\"website\" /> 
		<meta property=\"og:url\"    content=\"http://".$_SERVER['SERVER_NAME']."\" /> 
		<meta property=\"og:title\"  content=\"Simbiat's Page\" />
		<meta property=\"og:description\"  content=\"Simbiat's Page showcasing all projects he participated in\" /> 
		<meta property=\"og:image\"  content=\"http://".$_SERVER['SERVER_NAME']."/img/logo/simbiat.png\" /> ";

	require_once('./css.php');
	$HTML = "<script src=\"./js/jquery-2.1.1.min.js\"></script>";
	$HTML = $HTML. "
	<script>
	$(document).ready ( function () {
		$(document).on ('click', '.toglink', function (event) {
			event.preventDefault();
			var e = document.getElementById($(this).attr('href'));
			if (e.style.display == \"\") {
				e.style.display = \"none\";
				$('html, body').animate({scrollTop:$('#'+$(this).attr('id')).position().top}, 'medium');
			} else {
				e.style.display = \"\";
				$('html, body').animate({scrollTop:$('#'+$(this).attr('id')).position().top}, 'medium');
			}
			return false;
		});
	});
    	</script>";
	//echo "<script src=\"jquery/jquery.fastLiveFilter.js\"></script>";

	$HTML = $HTML. "<body><table style=\"display: block;margin-left: auto;margin-right: auto;position: relative;width=1280px;height:100%;\">";
	$HTML = $HTML. "<tr>";
	$HTML = $HTML. "<td colspan=3><center><b>Simbiat Universe</b><sup><a target=_blank href=\"http://".$_SERVER['SERVER_NAME']."/ssc/faq.php\">[?]</a></sup></center></td>";
	$HTML = $HTML. "</tr>";
	$HTML = $HTML. "<tr style=\"vertical-align:top;text-align:center\">";
	$HTML = $HTML. "
<td style=\"width:480px\">
<a class=\"toglink\" id=\"aedocuments\" target=_self href=\"edocuments\" title=\"E-Documents\">
<img width=\"100\" height=\"50\"src=\"./img/logo/edocuments.png\">
</a>
<div id=\"edocuments\" style=\"display:none;text-align:justify\">
In my experience I stumbled upon different sites, that provide different documents to users. For some reason quite a number of them provide those documents  as physical files, that were generated some time before the user's request, that is if it was not pre-generated user could never get that file. While in some cases that is logical thing to do, for example when those files are supposed to be encrypted and signed and there is no way to do that efficiently on server side due to some restrictions, or it is simply something, that can't be generated that easily, \"documents\" in their general sense should not require such a pre-generation. Nowadays data is generally held in database and when there is always a way to get the data from it in a query and then \"format\" it in a desired way to generate the document requested. On-demand and on-the-fly. The 
<a href=\"/edocuments/ppt\" title=\"E-Documents Description\" target=\"_blank\">presentation</a> here describes a system I wrote to do exactly that. Of course, there are other systems doing the same thing, but I wanted to see how difficul it may be to write it and test myself. So it was written from scratch with its own custom authentication system, basic user management and some toher stuff. Not much of GUI at the moment, though. All the main details are described in the presentation. Alternatively you can try the live version 
<a href=\"/edocuments\" title=\"E-Documents\" target=\"_blank\">here</a>.
</div>
</td>


<td style=\"width:480px\">
<a class=\"toglink\" id=\"asilversteam\" target=_self href=\"silversteam\" title=\"SilverSteam\">
<img width=\"100\" height=\"50\"src=\"/ssc/img/logosss.png\">
</a>
<div id=\"silversteam\" style=\"display:none;text-align:justify\">Unlike DarkSteam, SilverSteam is not for downloading any files. This is more like a training ground to check if something similar to SteamDB can be created, but with a focus on not so technically aware users. While SteamDB is an awesome service it is designed primarily for users who have some basic knowledge on how Steamd distribution service works. At the same time Steam's library in itself may be seen as a bit cluttered and inflexible in some points. DarkSteam's changes to GUI made by me after the project was abandoned by Gwolf2U were generally welcomed, that is why I am now trying to update it for it to become more useful and comfortable and autonomous. You can see how it is going on in 
<a href=\"/ssc\" target=\"_blank\" title=\"SilverSteam\">this</a> sample. Source code on <a href=\"https://github.com/Simbiat/SilverSteam\" target=\"_blank\">GitHub</a>.
</div>
</td>


<td style=\"width:480px\">
<a class=\"toglink\" id=\"adarksteam\" target=_self href=\"darksteam\" title=\"DarkSteam\">
<img width=\"100\" height=\"50\"src=\"/darksteam/img/logo.png\">
</a>
<div id=\"darksteam\" style=\"display:none;text-align:justify\">
DarkSteam was a service to provide access to files of games, that were distributed through service called Steam, without owning those files. Games were bought by me, downloaded through Steam client and then published in DarkSteam. Due to various reasons service was terminated, but 
<a href=\"/darksteam\" target=\"_blank\" title=\"DarkSteam\">here</a> you can check what it felt like in its web interface and also download source code of the client, that was used along side it. Only minimal corrections and updates were done to the code to make it work without the service itself. Source code on <a href=\"https://github.com/Simbiat/DarkSteam\" target=\"_blank\">GitHub</a>.
</div>
</td>";
	$HTML = $HTML. "</tr>";
	$HTML = $HTML. "<tr style=\"vertical-align:top;text-align:center\">";
	$HTML = $HTML. "
<td style=\"width:480px\">
<a class=\"toglink\" id=\"aars\" target=_self href=\"ars\" title=\"ARS\">
<img width=\"100\" height=\"50\"src=\"./img/logo/ars.png\">
</a>
<div id=\"ars\" style=\"display:none;text-align:justify\">
Quite some time ago I creted a run sheet in MS Excel which is still used in order to mark completed steps in set of processes and do some checks using it, as well. It's my long living dream to turn it into a web-app, since it will eliminate some limitations and add posibility of some useful features. The idea is to use <a href=\"http://jeasyui.com/tutorial/app/crud2.php\" target=\"_blank\">CRUD Grid</a> or something similar as basics.<br>
This section will have links to both VBA code and to live version of web-app, when it's ready.
</div>
</td>


<td style=\"width:480px\">
<a class=\"toglink\" id=\"asimbiat\" target=_self href=\"simbiat\" title=\"Simbiat\">
<img width=\"100\" height=\"50\"src=\"./img/logo/simbiat.png\">
</a>
<div id=\"simbiat\" style=\"display:none;text-align:justify\">
My book series, I've been working on for a very long time, constantly re-writing it. A bit of fantasy, a bit of sci-fi, quite a bit of insanity. Inspired by Herbert's Dune, Tolkien's Lord of The Rings, King's Dark Tower, current version is being written in English to assist with realization of an idea of a <a href=\"http://forums.bethsoft.com/topic/1508925-turning-idea-into-reality-assistance-required/\" target=\"_blank\">game</a>. In short the synopsis is something like that: a guy gets incredible power and it affects him greatly and not in a good way. Cliche by itself I try to take a psychological and as-realistic-as-possible approach to depict things, that super-hero books rarely do. But do not take my word for granted, try it for yourself: the best source for this at the moment is <a href=\"https://facebook.com/simbiatseries/posts/1554724118108739\" target=\"_blank\">FaceBook</a> page: it has all the links to current chapters. I plan to create a separate page for, possibly, better way to read it. The page will hold not only the text, but also background (behind-the-scenes) and ideas for how that or other episode could be done in a game.
</div>
</td>


<td style=\"width:480px\">
<a class=\"toglink\" id=\"amusic\" target=_self href=\"music\" title=\"Music Library\">
<img width=\"100\" height=\"50\"src=\"./img/logo/music.png\">
</a>
<div id=\"music\" style=\"display:none;text-align:justify\">
I've long wanted for my music library to be easily accessible and played from anywhere. If it will be possible to realize this using <a href=\"https://onedrive.live.com/redir?resid=3842BF972DFC8AC6!1189&authkey=!APOnbmq9bfv_Jb8&ithint=folder%2c\" target=\"_blank\">OneDrive</a> then it will be used. If not - then it will be a fully custom solution.
</div>
</td>";
	$HTML = $HTML. "</tr>";
	$HTML = $HTML. "<tr style=\"vertical-align:top;text-align:center\">";
	$HTML = $HTML. "
<td style=\"width:480px\">
<a class=\"toglink\" id=\"apoems\" target=_self href=\"poems\" title=\"Poems\">
<img width=\"100\" height=\"50\"src=\"./img/logo/poems.png\">
</a>
<div id=\"poems\" style=\"display:none;text-align:justify\">
My poems. In Russian and in English. <a href=\"poems\" target=\"_blank\">Here</a>. Some with music using HTML5.
</div>
</td>


<td style=\"width:480px\">
<a class=\"toglink\" id=\"ahta\" target=_self href=\"hta\" title=\"HTA\">
<img width=\"100\" height=\"50\"src=\"./img/logo/hta.png\">
</a>
<div id=\"hta\" style=\"display:none;text-align:justify\">
This section provides links to code snippets usable in HTA files (Visual Basic Script with HTML)<br>
<a target=\"_blank\" href=\"/snippets/launcher\">Launcher</a><br>
<a target=\"_blank\" href=\"/snippets/hashupd\">Hash Updater</a><br>
<a target=\"_blank\" href=\"/snippets/hashchk\">Hash Checker</a><br>
<a target=\"_blank\" href=\"/snippets/htalogging\">Logging</a><br>
<a target=\"_blank\" href=\"/snippets/htalogparser\">Log Parser</a><br>
<a target=\"_blank\" href=\"/snippets/amuruarmcfg\">AMUR\UARM Checker</a><br>
<a target=\"_blank\" href=\"/snippets/htacopy\">Filemover</a>
</div>
</td>


<td style=\"width:480px\">
<a class=\"toglink\" id=\"astories\" target=_self href=\"stories\" title=\"Short Stories\">
<img width=\"100\" height=\"50\"src=\"./img/logo/stories.png\">
</a>
<div id=\"stories\" style=\"display:none;text-align:justify\">
Some short stories written by me. At the moment best place to read them is <a href=\"http://proza.ru/avtor/simbiat\" target=\"_blank\">here</a>. There will be an alternative page here at a later date.
</div>
</td>";
	$HTML = $HTML. "</tr>";
	$HTML = $HTML. "<tr style=\"vertical-align:top;text-align:center\">";
	$HTML = $HTML. "
<td style=\"width:480px\">
<a class=\"toglink\" id=\"auser\" target=_self href=\"user\" title=\"User 360\">
<img width=\"100\" height=\"50\"src=\"./img/logo/360.png\">
</a>
<div id=\"user\" style=\"display:none;text-align:justify\">
Sometimes in corporate network it is required to gather some data from lots of people. Best choice is a website, but for different reasons that may be problematic, especially in terms of development of a \"proper\" one. A possible alternative is MS Excel. Here there will be links to portions of code, that can help with such a task.
</div>
</td>


<td style=\"width:480px\">
<a class=\"toglink\" id=\"acmd\" target=_self href=\"cmd\" title=\"CMD\">
<img width=\"100\" height=\"50\"src=\"./img/logo/cmd.png\">
</a>
<div id=\"cmd\" style=\"display:none;text-align:justify\">
This section has links to samples of code for .bat files<br>
<a target=\"_blank\" href=\"/snippets/globalfunctions\">Global Functions</a><br>
<a target=\"_blank\" href=\"/snippets/repack\">Repack</a><br>
<a target=\"_blank\" href=\"/snippets/sftpfilecheck\">SFTP File Check</a><br>
<a target=\"_blank\" href=\"/snippets/distribution\">Distribution</a><br>
<a target=\"_blank\" href=\"/snippets/usercreator\">User Creator</a>
</div>
</td>


<td style=\"width:480px\">
<a class=\"toglink\" id=\"ahtml\" target=_self href=\"html\" title=\"HTML5 Page\">
<img width=\"100\" height=\"50\"src=\"./img/logo/html5.png\">
</a>
<div id=\"html\" style=\"display:none;text-align:justify\">
This is what I originally wanted the home page to look like. A huge circle drawn in HTML5 and JavaScript with other circles along it representing the projects. Informative was chosen instead of flashy, so this idea was abandoned. <a href=\"/main/0/index.html\" target=\"_blank\">Here</a> it is for historical purposes.
</div>
</td>";
	$HTML = $HTML. "</tr>";
	$HTML = $HTML. "<tr style=\"vertical-align:top;text-align:center\">";
	$HTML = $HTML. "
<td style=\"width:480px\">
<a class=\"toglink\" id=\"alode\" target=_self href=\"lode\" title=\"Lodestone Connect\">
<img width=\"100\" height=\"50\"src=\"./img/logo/arr.png\">
</a>
<div id=\"lode\" style=\"display:none;text-align:justify\">
Since Lodestone's (or rather Square Enix's) authentication API is closed and they do not share the vBulletin module/hack for authentication, idea for vBulletin and Lodestone integration was abandoned. But, a small script for tracking Free Companies was created and can be checked <a href=\"/fctracker\" target=\"_blank\">here</a> (with source code downloadable). Or you can go to <a href=\"https://github.com/SImbiat/XIV-FC-Page\" target=\"_blank\">GitHub</a>
</div>
</td>


<td style=\"width:480px\">
<a class=\"toglink\" id=\"abic\" target=_self href=\"bic\" title=\"BIC\">
SPRAV.MFO HTML
</a>
<div id=\"bic\" style=\"display:none;text-align:justify\">
Russian banks have a certain identicfication code (BIC) and Central Bank provides BIC library in DBF format. Unfortuantely the only way to adequately check it is a DOS programm SPRAV.MFO. I will try to change that.</div>
</td>


<td style=\"width:480px\">
<a class=\"toglink\" id=\"asteam\" target=_self href=\"steam\" title=\"Steam Profile Parser\">
<img width=\"100\" height=\"50\"src=\"./img/logo/steam.png\">
</a>
<div id=\"steam\" style=\"display:none;text-align:justify\">
Potential project, which can (also potentially) become part of SilverSteam to see what use can be done if I parse Steam user's profile (or even login to SilverSteam using Steam's API). If nothing actually useful will be found may not be picked up.
</div>
</td>";
	$HTML = $HTML. "</tr>";
	$HTML = $HTML. "<tr style=\"vertical-align:top;text-align:center\">";
	$HTML = $HTML. "
<td style=\"width:480px\">
<a class=\"toglink\" id=\"acoins\" target=_self href=\"coins\" title=\"Coins\">Coins
</a>
<div id=\"coins\" style=\"display:none;text-align:justify\">
I am selling some old coins (or at least wish to sell them). <a target=_blank href=\"./coins/index.php\">Here</a> are the images of them. COntact me if you want any of them</div>
</td>


<td style=\"width:480px\">
</td>


<td style=\"width:480px\">
<a class=\"toglink\" id=\"ainetcom\" target=_self href=\"inetcom\" title=\"Inetcom for Resume\">
Inetcom Resume
</a>
<div id=\"inetcom\" style=\"display:none;text-align:justify\">
At some point I considered a job in ISP Inetcom. They had some tasks for potential candidates and I completed them the best I could, cnsidering I did not know anything. <a target=_blank href=\"./inetcom/index.php\">Here</a> is what I got. Note, that it is in Russian.</div>
</td>";
	$showlg = "";
	$HTML = $HTML. "</tr>";
	$HTML = $HTML. "<tr>";
	$HTML = $HTML. "<td style=\"padding-top:25pt;width:480px\" colspan=1><b><center>News</center></b></td><td></td><td style=\"padding-top:25pt;\"><center><b>Todo list</b></center></td></tr>";
	$HTML = $HTML. "<tr>";
	$HTML = $HTML. "<td style=\"width:960px;height:400px\" colspan=2>";

	$link = mysqli_connect("$host", "$username", "$password", "$db_name");
	if (!$link) {
		die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
	} else {
		$newsget1 = mysqli_query($link, "SELECT * From ss__news ORDER By date DESC LIMIT 25");
		if (mysqli_num_rows($newsget1)) {
			//require_once('./ssc/css.php');
			$showlg=$showlg . "<div style=\"height:100%;overflow:auto\">";
			while ($row = mysqli_fetch_array($newsget1, MYSQLI_ASSOC)){
				if (startsWith($row['text'], "http://") === false AND startsWith($row['text'], "https://") === false) {
					$newstext=str_ireplace("[b]", "<b>", $row['text']);
					$newstext=str_ireplace("[/b]", "</b>", $newstext);
					$newstext=str_ireplace("[i]", "<i>", $newstext);
					$newstext=str_ireplace("[/i]", "</i>", $newstext);
					$newstext=str_ireplace("[u]", "<u>", $newstext);
					$newstext=str_ireplace("[/u]", "</u>", $newstext);
					$newstext=str_ireplace("[left]", "<div align=\"left\">", $newstext);
					$newstext=str_ireplace("[/left]", "</div>", $newstext);
					$newstext=str_ireplace("[right]", "<div align=\"right\">", $newstext);
					$newstext=str_ireplace("[/right]", "</div>", $newstext);
					$newstext=str_ireplace("[center]", "<div align=\"center\">", $newstext);
					$newstext=str_ireplace("[/center]", "</div>", $newstext);
					$newstext=str_ireplace("[color=", "<font color=", $newstext);
					$newstext=str_ireplace("[/color]", "</font>", $newstext);
					$newstext=str_ireplace("[size=", "<font size=", $newstext);
					$newstext=str_ireplace("[/size]", "</font>", $newstext);
					$newstext=str_ireplace("[font=", "<font face=", $newstext);
					$newstext=str_ireplace("[/font]", "</font>", $newstext);
					$newstext=str_ireplace("[url=", "<a href=", $newstext);
					$newstext=str_ireplace("[/url]", "</a>", $newstext);
					$newstext=str_ireplace("[attach]", "", $newstext);
					$newstext=str_ireplace("[/attach]", "", $newstext);
					$newstext=str_ireplace("]", ">", $newstext);
					$newstext=str_ireplace("[url>", "", $newstext);
					$newstext=str_ireplace("\">", "", $newstext);
					$newstext = preg_replace("~[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]~", "<a href=\"\\0\">\\0</a>", $newstext);
					$showlg=$showlg. nl2br("<b><font size=4 color=gold>".$row['title']."</font></b><br><i><font size=1 color=darkviolet>Published on ".date("d/m/Y", $row['date'])." at ".date("H:i", $row['date'])."</font></i><BR>".$newstext)."<BR><BR>";
				}
			}
		}
		$HTML = $HTML. $showlg;
		$HTML = $HTML. "</td><td style=\"vertical-align:top;height:400px\"><div style=\"height:100%;overflow:auto\">";
		$newsget1 = mysqli_query($link, "SELECT * FROM m1__crosslist order by crossed ASC, type ASC, id ASC ");
		if (mysqli_num_rows($newsget1)) {
			while ($row = mysqli_fetch_array($newsget1, MYSQLI_ASSOC)){
				if ($row['crossed'] == 1) {
					$HTML = $HTML. "<span style=\"text-decoration: line-through;\">";
				}
				$HTML = $HTML. "[". $row['type'] . "] ". $row['text']."<br>";
				if ($row['crossed'] == 1) {
					$HTML = $HTML. "</span>";
				}
			}
		}
		$HTML = $HTML. "</div></td>";
		mysqli_close($link);
	}
	$HTML = $HTML. "</tr>";
	$HTML = $HTML. "<tr colspan=3>";
	$HTML = $HTML. "<td style=\"padding-top:25pt\" colspan=3><center><a class=\"toglink\" id=\"aabout\" target=_self href=\"about\"><b>About</b></a></center></td>";
	$HTML = $HTML. "</tr>";
	$HTML = $HTML. "<tr colspan=3>";
	$HTML = $HTML. "<td></td><td style=\"width:480px;word-wrap:break-word\"><div id=\"about\" style=\"display:none\">My name is Dmitry Kustov (a.k.a. Simbiat) and this is my page, through which I will try to provide links to different projects I am\was involved in.<br>I code stuff, mainly in PHP, but have experience in different versions of Visual Basic, JavaScript and C++.<br>I also try to write: mainly prose, but also some poetry.<br>Links to all of this stuff can be found here.</div></td><td></td>";
	$HTML = $HTML. "</tr>";
	$HTML = $HTML. "<tr>";
	$HTML = $HTML. "<td style=\"padding-top:25pt\" colspan=3><center><b><font size=3>You can contact me through these</font></b><br><font size=1>(sorted by decreasing preference)</font><br>";
	$HTML = $HTML. "<a target=\"_blank\" href=\"mailto:simbiat@bk.ru\"><img width=\"50\" height=\"50\" src=\"./img/Mail.png\"></a>";
	$HTML = $HTML. "<a target=\"_blank\" href=\"https://facebook.com/simbiat19\"><img width=\"50\" height=\"50\" src=\"./img/facebook.png\"></a>";
	$HTML = $HTML. "&nbsp;<a target=\"_blank\" href=\"https://vk.com/simbiat19\"><img width=\"50\" height=\"50\" src=\"./img/vk.png\"></a>";
	$HTML = $HTML. "&nbsp;<a target=\"_blank\" href=\"https://linkedin.com/profile/view?id=226600459\"><img width=\"50\" height=\"50\" src=\"./img/Linkedin.png\"></a>";
	$HTML = $HTML. "<a target=\"_blank\" href=\"http://steamcommunity.com/id/artimenius/\"><img width=\"50\" height=\"50\" src=\"./img/steam.png\"></a>";
	$HTML = $HTML. "<a target=\"_blank\" href=\"https://twitter.com/simbiat199\"><img width=\"50\" height=\"50\" src=\"./img/twitter.png\"></a>";
	$HTML = $HTML. "&nbsp;<a target=\"_blank\" href=\"http://my.mail.ru/bk/simbiat\"><img width=\"50\" height=\"50\" src=\"./img/moimir.png\"></a>";
	$HTML = $HTML. "&nbsp;<a target=\"_blank\" href=\"https://plus.google.com/115219118566827565176\"><img width=\"50\" height=\"50\" src=\"./img/google.png\"></a>";
	$HTML = $HTML. "</center></td>";
	$HTML = $HTML. "</tr>";
	$HTML = $HTML. "</table></div></body>";

echo $HTML;


?>