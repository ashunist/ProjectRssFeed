

<?php
include 'library/config.php';
include 'library/opendb.php';
$file = "mysite.xml";
$sim = simplexml_load_file($file);
 foreach ($sim->channel->item as $it)
{
echo "<h4>'$it->article_title'</h4><br />";
echo "<a href='$it->article_link'>Play</a><br />";
echo "'$it->article_description' <br/>";
echo "'$it->article_time'<br/>";
}
?>

