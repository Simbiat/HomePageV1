<?php
//require_once('./ssc/commonfunc.php');
	$showcss="";
$showcss=$showcss. "<style>

body{
border-color: whitesmoke;
color: black;
font-family:Microsoft Sans Serif;
font-size:10pt;
background:#C0C0C0 none;
}

.forumblock{
background-color: transparent;
}

table, th, td, tr{
border-color: whitesmoke;
color: black;
font-family:Microsoft Sans Serif;
font-size:10pt;
}

a:link {text-decoration:none;}
a:link {color:#A52A2A;}
a:visited {color:#A52A2A;}
a:hover {color:#A52A2A;}
a:active {color:#A52A2A;}


.back-to-top {
position: fixed;
border-radius: 15px;
bottom: 1pt;
right: 0px;
text-decoration: none;
color: #000000;
background-color: rgba(151, 151, 151, 0.80);
font-size: 12px;
padding: 2pt;
display: none;
}

.back-to-top:hover {    
    background-color: rgba(151, 151, 151, 0.50);
}

ul {
list-style: none;
padding: 0;
}
</style>";
echo $showcss;
?>