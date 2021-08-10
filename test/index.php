<?php


$newline = PHP_SAPI === 'cli' ? "\n" : "<br>";

include 'Validator.php';

$validator = new Validator();


//Test parametri
$username = "email@email.com";
$password = "passwor#d1";
$password_2 = "password1";


//Provera da li je email ispravan
echo $validator->validateEmail($username) ? "Email je ispravan" : "Neispravan email";

echo $newline;

//Provera da li je password duzi od 5 karaktera
echo $validator->checkPasswordMinLength($password) ? "Minimalna duzina OK" : "Lozinka mora biti 5 ili vise karaktera";

echo $newline;

//Provera da li je password kraci od 20 karaktera
echo $validator->checkPasswordMaxLength($password) ? "Maksimalna duzina OK" : "Lozinka mora biti kraca od 20 karaktera";

echo $newline;

//Provera da li je password sadrzi neki od specijalnih karaktera
echo $validator->checkSpecialCharacters($password) ? "OK" : "Lozinka mora da sadrzi specijalni karakter";

echo $newline;

//Provera da li je su oba passworda ista
echo $validator->checkBothPasswords($password,$password_2) ? "Lozinke su iste" : "Lozinke nisu iste";


