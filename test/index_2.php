<?php

include 'Validator_2.php';
include 'DatabaseConnection.php';

$newline = PHP_SAPI === 'cli' ? "\n" : "<br>";

DatabaseConnection::connect('localhost', "task", "root", "");
$validator = new Validator_2(5,20);



//Test parametri
$email = "dragoljubd@gmail.come";
$password = "password1%";
$password_2 = "password1";


//Provera da li je email ispravan
echo $validator->validateEmail($email);
echo $newline;

//Provera da li je korisnik vec registrovan
if ($validator->validateEmail($email)) {
    echo $validator->isRegistered($email);
}

echo $newline;

//Provera da li password zadovoljava zadata pravila
echo $validator->validatePassword($password);

echo $newline;

//Provera da li su unete lozinke iste
echo $validator->checkPasswords($password, $password_2);
