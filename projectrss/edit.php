<?php
include 'library/config.php';
include'library/opendb.php';
$article_id=$_GET['article_id'];
/*if($get="")
{
	}
else
{
   */
if(!isset($_POST['submit']))
{
  $result=mysql_query("$query");
  while($row=mysql_fetch_object($result))
	{
  	<b>Description:</b><textarea name='description_value'>$row->article_description</textarea> </br><input type='hidden' name='get' value='$article_id'></br>
  	<input type='submit' name='submit' value='Edit rss'></form>";
  	}
  	}

else
{
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