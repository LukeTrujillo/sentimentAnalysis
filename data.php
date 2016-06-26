<?php



use Abraham\TwitterOAuth\TwitterOAuth;

include 'havenondemand-php/lib/hodclient.php';
include('phpgraphlib.php');
include('phpgraphlib_pie.php');
require "vendor/autoload.php";
include('simple_html_dom.php');

$consumerKey = "qfy0WT0R1sVw609ZFbI25DkLm";
$consumerKeySecret = "xoJUKGq3Y1tk6VzNS0XWFXO1Xf5RzgpJUMVde0kj6xGdKrmSL6";
$accessToken = "741823591789039616-pcM518cReMak69SgOnPHjFhBrsSVLFq";
$accessTokenSecret = "W80NaIejtVZy4AQcmGoVoptydC2jEhBagbd01RATXj5Dx";

$searchTerm = $_POST["query"];

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
}

fclose($myfile);


$hodClient = new HODClient('dd65da22-c111-4eb5-a7f2-31dc9d96d41c');

$positive = [];
$negative = [];

$twitterArr = array(
'file' => "tweetsFile.txt",
'mode' => "file");

$jobID = $hodClient->PostRequest($twitterArr, HODApps::ANALYZE_SENTIMENT, REQ_MODE::ASYNC);
$response = $hodClient->GetJobResult($jobID);

$array = (array) $response;
$positiveArray = $array["positive"];
$negativeArray = $array["negative"];

for($i=0; $i<sizeof($positiveArray);$i++) {
    $pos = (array) $positiveArray[$i];
    array_push($positive,$pos["score"]);
}

for($i=0; $i<sizeof($negativeArray);$i++) {
    $neg = (array) $negativeArray[$i];
    array_push($negative,$neg["score"]);
}

    $myfile = fopen("urlFile.txt", "w");

    $html = new simple_html_dom();
    $bing = "http://www.bing.com/search?q=";

    if (strpos($searchTerm," ") !== false) {
        $searchTerm = str_replace(" ", "+", $searchTerm);
    }

    $page = $bing .  $searchTerm;

    $html->load_file($page);
/*
    foreach($html->find('a') as $element){
         if (strpos($element->href,"http") !== false && strpos($element->href,"microsoft") == false) {
             fwrite($myfile,$element->href . "\n");
         }
 }
*/
         $filename = 'urlFile.txt';
         $contents = file($filename);

         foreach($contents as $line) {
         $hodClient2 = new HODClient('dd65da22-c111-4eb5-a7f2-31dc9d96d41c');

         $urlArr = array(
         'url' => $line,
         'mode' => "url");

         $urlJobID = $hodClient->PostRequest($urlArr,HODApps::ANALYZE_SENTIMENT, REQ_MODE::ASYNC);
         $response = $hodClient->GetJobResult($urlJobID);

         $array = (array) $response;
         $urlPositiveArray = $array["positive"];
         $urlNegativeArray = $array["negative"];

         for($i=0; $i<sizeof($urlPositiveArray);$i++) {
         $posurl = (array) $positiveArray[$i];
         array_push($positive,$posurl["score"]);
     }

     for($i=0; $i<sizeof($urlNegativeArray);$i++) {
         $negurl = (array) $urlNegativeArray[$i];
         array_push($negative,$negurl["score"]);
     }
 }

     sleep(6);

     $total = sizeof($negative) + sizeof($positive);
     $percentPositive = sizeof($positive)/$total;
     $percentNegative = sizeof($negative)/$total;

     $graph = new PHPGraphLibPie(400, 200, "graph.png");
     $data = array("Positive" => $percentPositive, "Negative" => $percentNegative);
     $graph->addData($data);
     $graph->setTitle("Search Results");
     $graph->setLabelTextColor('50,50,50');
     $graph->setLegendTextColor('50,50,50');
     unlink("graph.png");
     $graph->createGraph();

     header('Location: index.php');
     die();


 ?>
