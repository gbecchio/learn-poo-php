<?php
$s = new splMinHeap();
$s->insert(1);
$s->insert(2);
$s->insert(3);
$s->insert(0);
var_dump($s);
foreach($s as $val)
{
	echo "\n".$val;
}
var_dump($s);
$s = new splMaxHeap();
$s->insert(1);
$s->insert(2);
$s->insert(3);
$s->insert(0);
var_dump($s);
foreach($s as $val)
{
	echo "\n".$val;
}
var_dump($s);

$obj = new SplDoublyLinkedList();

// Check wither linked list is empty
if ($obj->isEmpty())
{
    echo "Adding nodes to Linked List<br>";
    $obj->push(2);
    $obj->push(3);
   
    echo "Adding the node at beginning of doubly linked list <br>";
    $obj->unshift(10);
}

echo "<br>Our Linked List:";
print_r($obj);

echo "<br>Pick the node from beginning of doubly linked list";
echo $obj->bottom();