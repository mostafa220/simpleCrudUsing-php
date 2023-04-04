<?php 

$error="";
$success="";

// require input
function requireInput($val){

    $input = trim($val);
    if(strlen($input>0)){
        return true;
    }else{
        return false;
    }

}
//validate email
function validateEmail($val){

    $email = trim($val);
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        return true;
    }else {

        return false;
    }

}
//validate string
function validateString($val){

    $string = trim($val);
       return $string;
  

}

//minimam number of characters
function valMin($val , $min){

    if(strlen($val)<$min){
        return false;
    }
        return true;
    
}


//maximum number of characters
function valMax($val , $max){

    if(strlen($val)>$max){
        return false;
    }
        return true;

}

