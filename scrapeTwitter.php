<?php

use Abraham\TwitterOAuth\TwitterOAuth;
function scrapeTwitter($searchTerm){
require "vendor/autoload.php";

$consumerKey = "qfy0WT0R1sVw609ZFbI25DkLm";
$consumerKeySecret = "xoJUKGq3Y1tk6VzNS0XWFXO1Xf5RzgpJUMVde0kj6xGdKrmSL6";
$accessToken = "741823591789039616-pcM518cReMak69SgOnPHjFhBrsSVLFq";
$accessTokenSecret = "W80NaIejtVZy4AQcmGoVoptydC2jEhBagbd01RATXj5Dx";


$conn = new TwitterOAuth($consumerKey, $consumerKeySecret, $accessToken, $accessTokenSecret);

$query = array(
 "q" => $searchTerm,
 "count" => 100,
 "lang" => "en"
);

$myfile = fopen("tweetsFile.txt", "w");
$tweets = $conn->get('search/tweets', $query);

foreach ($tweets->statuses as $tweet) {
    fwrite($myfile,$tweet->text);
    echo $tweet->text;
}
}
scrapeTwitter("Donald Trump");






 ?>
