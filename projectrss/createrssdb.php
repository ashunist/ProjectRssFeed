<?php
include 'library/config.php';
include 'library/opendb.php';
$titl=trim($_POST['title_value']);
$lnk=trim($_POST['link_value']);
$descrip=trim($_POST['description_value']);
$query= "INSERT INTO myrss(article_title,article_link,article_description,article_time)
VALUES('$titl','$lnk','$descrip',NOW())";
$result=mysql_query($query);
if($result)
{echo "rss form is inserted successfully";
echo"<br />";
echo "<a href='adminrss.html'>admin rss page</a>";


	}

else
{	echo "error in inserting the rss form";
	}



	include 'library/closedb.php';



?>