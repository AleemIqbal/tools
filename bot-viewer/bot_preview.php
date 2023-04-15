<?php
$url = $_GET['url'];
$crawler = $_GET['crawler'];

$user_agents = [
    'googlebot' => 'Googlebot/2.1 (+http://www.google.com/bot.html)',
    'bingbot' => 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)',
    'facebook' => 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)',
    'twitter' => 'Twitterbot/1.0',
    'baiduspider' => 'Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)',
    'yandex' => 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)',
    'duckduckbot' => 'DuckDuckBot/1.0; (+http://duckduckgo.com/duckduckbot.html)',
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_USERAGENT, $user_agents[$crawler]);

$response = curl_exec($ch);
curl_close($ch);

echo $response;