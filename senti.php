<?php
    include 'havenondemand-php/lib/hodclient.php';
    include("scrapeData.php");
    include('phpgraphlib.php');
    include('phpgraphlib_pie.php');

        //$searchTerm = $_GET["f"];
        $searchTerm = "Donald Trump";
        //scrapeData($searchTerm);

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
/*
        $filename = 'urlFile.txt';
        $contents = file($filename);

        foreach($contents as $line) {
        //$hodClient2 = new HODClient('dd65da22-c111-4eb5-a7f2-31dc9d96d41c');

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
*/
        $total = sizeof($negative) + sizeof($positive);
        $percentPositive = sizeof($positive)/$total;
        $percentNegative = sizeof($negative)/$total;



        $graph = new PHPGraphLibPie(400, 200, "graph.png");
        $data = array("Positive" => $percentPositive, "Negative" => $percentNegative);
        $graph->addData($data);
        $graph->setTitle("Search Results");
        $graph->setLabelTextColor('50,50,50');
        $graph->setLegendTextColor('50,50,50');
        $graph->createGraph();

 ?>
