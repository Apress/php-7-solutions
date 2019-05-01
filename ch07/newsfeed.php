<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Displaying an RSS Feed</title>
    <link rel="stylesheet" href="../styles/newsfeed.css">
</head>
<body>
<h1>The Latest from BBC News</h1>
<?php
$url = 'http://feeds.bbci.co.uk/news/world/rss.xml';
$feed = simplexml_load_file($url, 'SimpleXMLIterator');
$filtered = new LimitIterator($feed->channel->item, 0, 4);
foreach ($filtered as $item) { ?>
    <h2><a href="<?= htmlentities($item->link) ?>">
            <?= htmlentities($item->title) ?></a></h2>
    <p class="datetime"><?php $date = new DateTime($item->pubDate);
        $date->setTimezone(new DateTimeZone('America/New_York'));
        $offset = $date->getOffset();
        $timezone = ($offset == -14400) ? ' EDT' : ' EST';
        echo $date->format('M j, Y, g:i a') . $timezone; ?></p>
    <p><?= htmlentities($item->description) ?></p>
<?php } ?>
</body>
</html>
