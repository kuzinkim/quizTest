<?php

$post = (!empty($_POST)) ? true : false;

if($post)
{
$quest1 = trim($_POST['quest1']);
$quest2 = htmlspecialchars($_POST['quest2']);
$quest3 = htmlspecialchars($_POST['$quest3']);
$quest4 = htmlspecialchars($_POST['$quest4']);
$email = htmlspecialchars($_POST['email']);
$tel = htmlspecialchars($_POST["tel"]);
$error = '';


// Проверка телефона
function ValidateTel($valueTel)
{
$regexTel = "/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/";
if($valueTel == "") {
return false;
} else {
$string = preg_replace($regexTel, "", $valueTel);
}
return empty($string) ? true : false;
}
if(!$email)
{
$error .= "Пожалуйста введите email<br />";
}
if($email && !ValidateTel($email))
{
$error .= "Введите корректный email<br />";
}
if(!$error)

// (length)
if(!$message || strlen($message) < 1)
{
$error .= "Введите ваше сообщение<br />";
}
if(!$error)
{


$name_tema = "=?utf-8?b?". base64_encode('Ваша заявка') ."?=";

$subject ="Новая заявка с сайта domain.name";
$subject1 = "=?utf-8?b?". base64_encode($subject) ."?=";
/*
$message ="\n\nСообщение: ".$message."\n\nИмя: " .$name."\n\nТелефон: ".$tel."\n\n";
*/
$message1 ="\n\nВопрос 1: ".$quest1."\n\nВопрос 2: " .$quest2."\n\nВопрос 3: " .$quest3."\n\nВопрос 4: ".$quest4."\n\nТелефон: " .$tel."\n\nEmail: " .$email."\n\n";	


$header = "Content-Type: text/plain; charset=utf-8\n";

$header .= "From: Новая заявка <kuzinhb2019@gmail.com>\n\n";	
$mail = mail("kuzinhb2019@gmail.com", $subject1, iconv ('utf-8', 'windows-1251', $message1), iconv ('utf-8', 'windows-1251', $header));

if($mail)
{
echo 'OK';
