<?php

$error='';


$success='';
function require_input($value){
    $str=trim($value);
    if(strlen($str)>0){
        return true;
    }
    $error='';
    return false;
}
function  santString($value){
    
   return filter_var(trim($value),FILTER_SANITIZE_STRING);
}
function  santEmail($value){
    
    return filter_var(trim($value),FILTER_SANITIZE_EMAIL);
 }
 function minInput($value,$min)
{
    if(strlen($value) < $min)
    {
        return false;
    }
    return true;
}

// maximum number 
function maxInput($value,$max)
{
    if(strlen($value) > $max)
    {
        return false;
    }
    return true;
}


// validate email 
function validEmail($email)
{
    if(filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        return true;
    }
    return false;
}


?>