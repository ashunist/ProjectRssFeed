<?php
include 'library/config.php';
include'library/opendb.php';
$article_id=$_GET['article_id'];
/*if($get="")
{	echo"<a href='adminrss.html'>admin page</a>";
	}
else
{
   */
if(!isset($_POST['submit']))
{  $query="select * from myrss where article_id ='$article_id'";
  $result=mysql_query("$query");
  while($row=mysql_fetch_object($result))
	{  	echo"<form action='edit.php' method='POST'><b>Title:</b><input type='text'name='title_value' value='$row->article_title'></br><b>Link:</b><input type='text' name='link_value' value='$row->article_link'></br>
  	<b>Description:</b><textarea name='description_value'>$row->article_description</textarea> </br><input type='hidden' name='get' value='$article_id'></br>
  	<input type='submit' name='submit' value='Edit rss'></form>";
  	}
  	}

else
{$title=trim($_POST['title_value']);
$link=trim($_POST['link_value']);
$description=trim($_POST['description_value']);
$id=trim($_POST['get']);
echo"$title</br>";
echo"$link</br>";
echo"$description</br>";
$query="UPDATE myrss SET article_title='$title',article_link='$link',article_description='$description',article_time=now() where article_id='$id'";
$result=mysql_query($query);

echo "<a href='adminrss.html'>Back to admin page</a>";
}



?>