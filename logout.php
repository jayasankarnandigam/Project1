<?php

#we have to destroy the session to delete session variables, so session variables become unset 
require 'core.php';  //by using this we get header functions 
session_destroy();

//after destroying it should goto header

header('Location: index.php');


?>