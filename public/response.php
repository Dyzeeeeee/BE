<?php
header('Content-Type: application/json');

$items = array();

// Text Entry
$obj1 = new stdClass();
$obj1->type = 0;
$obj1->content = 'My Title';
$obj1->bold = 1;
$obj1->align = 2;
$obj1->format = 3;
array_push($items, $obj1);

// Continue adding other items in the same manner...
$obj2 = new stdClass();
$obj2->type = 1;
$obj2->path = 'https://www.mydomain.com/image.jpg';
$obj2->align = 2;
array_push($items, $obj2);

// Encode the array of items directly
echo json_encode($items);
?>
