<?php

echo "test<BR><BR>";

// Create a Mongo conenction
$mongoDB = new MongoClient("mongodb://localhost");

// Choose the database and collection
$db = $mongoDB->test1;
$coll = $db->colltest1;

// select 
    $cursor = $coll->find();
    // 迭代显示文档标题
    foreach ($cursor as $document) {
        print_r($document);
        echo "<BR><BR><BR>";
    }



?>