<?php
include 'library/config.php';
include'library/opendb.php';
$query="select * from myrss";
$result=mysql_query("$query");
while($row=mysql_fetch_object($result))
{	echo"<b>$row->article_title</b></br>";
	echo"<a href='edit.php?article_id=$row->article_id'>edit</a>|<a href='feed.php?article_id=$row->article_id'>Make rss</a></br></br>";
	}
	echo"<a href='adminrss.html'>Return to admin page</a>";

?>