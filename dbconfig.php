<?php

$db= new mysqli("localhost","root","","xpanel");

if(!$db){
    die("not db found");
}
session_start();
