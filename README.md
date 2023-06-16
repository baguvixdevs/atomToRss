# atomToRss

Bu basit PHP fonksiyonu, bir Atom beslemesini RSS formatına dönüştürmek için kullanılır.

## Kullanım

```php
include 'atomToRss.php';

$link = 'https://www.example.com/atom-feed.xml';
$rss = atomToRss($link);

// $rss'i kullanarak istediğiniz işlemleri yapabilirsiniz.
