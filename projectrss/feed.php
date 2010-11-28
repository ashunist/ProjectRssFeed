<?php
include 'library/config.php';
include 'library/opendb.php';
$article_id=$_GET['article_id'];
$file = "mysite.xml";
$q = mysql_query("SELECT *  FROM myrss WHERE article_id = '$article_id'");

if (mysql_num_rows($q) > 0)
{
while ($row = mysql_fetch_object($q))
{
$title = $row->article_title;
$desc = $row->article_description;
$link = $row->article_link;
$time=$row->article_time;

echo "This feed was added at $time.'<br />' ";
echo '<b>Title:</b>:' . "$title" . '<br />';
echo '<b>Description:</b>' . "$desc".'<br />';
echo '<b>Link:</b>' . "$link".'<br />';
echo '<b>Time:</b>' . "$time".'<br />';
$sim = simplexml_load_file($file);
foreach($sim->channel->item as $it)
{

$feed[] = '<item>' . "\n" . '<title>' . "$it->title" . '</title>' . "\n" . '<description>' . "$it->description" . '</description>' . "\n" . '<link>' . "$it->link" . '</link>' . "\n" .'<pubDate>' . "$it->pubDate" . '</pubDate>' . "\n" . '</item>';
}
}

$fd = fopen($file, "w");
$ele1 ='<?xml version="1.0" encoding="ISO-8859-1" ?>
<rss version="2.0">' . "\n";
$ele2 = '<channel>' . "\n";
$ele3 = '<title>Feeds of Sankalp2010</title>' . "\n";
$ele5 = '<link>http://www.sankalp2010.com</link>' . "\n";
$ele4 = '<description>All the updates regarding the sankalp2010</description>' . "\n";
$eles =  "$ele1" . "$ele2" . "$ele3" . "$ele4" . "$ele5";
fwrite($fd, $eles);
fclose($fd);
$fp = fopen($file, "a");
$ele10 = '<item>' . "\n";
$ele11 = '</item>' . "\n";
$title2 = '<title>' . "$title" . '</title>' . "\n";
$desc2  = '<description>' . "$desc" . '</description>' . "\n";
$link2 = '<link>' . "$link" . '</link>' . "\n";
$time2='<pubDate>'."$time".'</pubDate>'."\n";
$rty ="$ele10" . "$title2" . "$desc2" . "$link2" ."$time2". "$ele11";
fwrite($fp, $rty);
fclose($fp);
$total = count($feed);
echo "$total<br />";
if ($total < 15)
{
$amount = $total;
$num = 0;
}
else if ($total == 0)
{
$amount = 1;
$num = 0;
}
else
{
$amount = 15;
$num = 1;
}
for($i=$num;$i<$amount;$i++)
{

$titl[$i] ="$feed[$i]";
$fg = fopen($file, "a");
fwrite($fg, $titl[$i]);
}
$ele11 = '</channel>' . "\n";
$ele12 = '</rss>';
$rss = "$ele11" . "$ele12";
$fy = fopen($file, "a");
fwrite($fy, $rss);
fclose($fy);
echo "<a href='adminrss.html'>Feed created, go back</a><br />";
}


?>


