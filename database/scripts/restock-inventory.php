<?php

// connect to DB
require __DIR__ . '/../dbconnect.php';

// get all product IDs
$stock = $db->queryAndFetch('SELECT sku FROM stock WHERE prod_id > 90');

// stock each sku 3 times

foreach($stock as $sku) {
    $qty = 0;
    while($qty < 3) {
        $query = $db->prepare('INSERT INTO inventory(sku, recv_date) VALUES(:sku, "2023-10-03")');
        $query->execute(['sku' => $sku['sku']]);
        $qty++;
    }
}




$db = null;

?>