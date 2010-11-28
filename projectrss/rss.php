<?php
 echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<rss version="2.0">
	<channel>
		<title>Dashboard </title>
		<link></link>
		<description>Url shortner Dashboard </description>
		<language>en-us</language>
		
		<category>Project</category>
		<docs>http://www.rssboard.org/rss-specification</docs>
<?php

//Connect to the database here

include 'library/config.php';
include 'library/opendb.php';

//Create the SELECT statement and execute it
$query = "SELECT *, DATE_FORMAT(article_time, '%a, %d %b %Y %T PST') AS article_pubdate FROM myrss ORDER BY article_time ";
$result = mysql_query($query);
//Iterate over the rows to create each item
while ($row = mysql_fetch_array($result) )
{
echo '<item>
		<title>'.$row['article_title'].'</title>
		<link>'.$row['article_link'].'</link>
		<description>'.$row['article_description'].'</description>
             	<pubDate>'.$row['article_pubdate'].'</pubDate>
		
	</item>';
}

?>

	</channel>
</rss>
