<?php

require "vendor/autoload.php";
use Lab1\User;
use Lab1\Comment;

$person = new User(123, "Nadya", "olesya@gmail.com", "ptytyty");
$person1 = new User(743, "Olesya" , "olesyka", "200289868");

$comm = new Comment($person, "Hey there");
$comm2 = new Comment($person, "~Uwu~");
$comm3 = new Comment($person1, "Some message");

$datetime = new DateTime("2019-03-21 21:01:54");
$dictionary = [$comm, $comm2, $comm3];

foreach ($dictionary as $item){
    if(DateTime::createFromFormat("Y-m-d H:i:s", $item->user->dateOfCreate())>$datetime){
        echo "$item->message\n";
    }
}

?>
