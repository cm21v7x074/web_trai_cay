<?php

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

include __DIR__ . '/../functions.php'; ?><!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<link rel="stylesheet" media="all" href="css/style.css">
	<title><?php
	if (defined('TITLE')) {
		echo TITLE;
	} else {
		echo 'Web Trai Cay';
	}
	?></title>
</head>
<body>
	<div class="container" id="container">
 		<!-- BEGIN CHANGEABLE CONTENT. -->