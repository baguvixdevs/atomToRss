<?php 

function atomToRss($link){
    $xml = file_get_contents($link); 
    $atom = new SimpleXMLElement($xml);
    $rss = '<?xml version="1.0" encoding="utf-8"?>';
    // RSS kanalı bilgilerini ayarla.
    $rss .= "<rss version=\"2.0\">\n";
    $rss .= "<channel>\n";
    $rss .= "<title> TUNAHAN </title>\n";
    $rss .= "<link><![CDATA[https://www.tunahan.com]]></link>\n";
    $rss .= "<description>Manşetler RSS Feed - Tunahan</description>\n";
    $rss .= "<language>tr-TR</language>\n";
    // Atom feedindeki her bir girdiyi RSS girdisine dönüştür
    foreach ($atom->entry as $entry) {
        $rss .= "<item>\n";
        $rss .= "<title><![CDATA[" . strip_tags($entry->title) . "]]></title>\n";
        $rss .= "<link><![CDATA[" . htmlspecialchars($entry->link['href']) . "]]></link>\n";
        $rss .= "<guid isPermaLink='false'>" . htmlspecialchars($entry->id) . "</guid>\n";
        $published_time = date(DATE_RSS, strtotime($entry->updated));
        $rss .= "<pubDate>" . $published_time . "</pubDate>\n";
        $rss .= "<description>" . htmlspecialchars($entry->content) . "</description>\n";
        $rss .= "</item>\n";
    }
    // RSS kanalını bitir.
    $rss .= "</channel>\n";
    $rss .= "</rss>";
    return $rss;
}




