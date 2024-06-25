<?php
if (isHTMX())
	return;


//Create version hashes based on last modified time.
$versionedFiles = array(
	APP_ROOT . 'assets/favicon.svg' => '',
	APP_ROOT . 'css/styles.css' => '',
	APP_ROOT . 'js/scripts.js' => '',
	APP_ROOT . 'js/ws.js' => '',
	APP_ROOT . 'vendors/htmx.min.js' => '',
);

foreach ($versionedFiles as $fileName => $hash)
{
	$versionedFiles[$fileName] = substr(md5(filemtime($_SERVER['DOCUMENT_ROOT'] . $fileName)), 0, 6);
}

echo <<<HTML
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>PW-Chat</title>
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="icon" href="{$GLOBALS['constants']['APP_ROOT']}assets/favicon.svg?v={$versionedFiles[$GLOBALS['constants']['APP_ROOT'] . 'assets/favicon.svg']}" type="image/svg+xml">
		<link rel="stylesheet" href="{$GLOBALS['constants']['APP_ROOT']}css/styles.css?v={$versionedFiles[$GLOBALS['constants']['APP_ROOT'] . 'css/styles.css']}">
		<script src="{$GLOBALS['constants']['APP_ROOT']}js/scripts.js?v={$versionedFiles[$GLOBALS['constants']['APP_ROOT'] . 'js/scripts.js']}"></script>
		<script src="{$GLOBALS['constants']['APP_ROOT']}js/ws.js?v={$versionedFiles[$GLOBALS['constants']['APP_ROOT'] . 'js/ws.js']}"></script>
		<script src="{$GLOBALS['constants']['APP_ROOT']}vendors/htmx.min.js?v={$versionedFiles[$GLOBALS['constants']['APP_ROOT'] . 'vendors/htmx.min.js']}"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/amplitudejs@5.3.2/dist/amplitude.js"></script>
		<!-- <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
		<script type="module" src="https://cdn.jsdelivr.net/npm/@duetds/date-picker@1.4.0/dist/duet/duet.esm.js"></script>
		<script nomodule src="https://cdn.jsdelivr.net/npm/@duetds/date-picker@1.4.0/dist/duet/duet.js"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@duetds/date-picker@1.4.0/dist/duet/themes/default.css" /> -->
	</head>

	<body>
		<header>
			<h1><a href="{$GLOBALS['constants']['APP_ROOT']}" hx-get="{$GLOBALS['constants']['APP_ROOT']}" hx-select="main" hx-target="main" hx-swap="outerHTML" hx-push-url="true">PHP WS Chat</a></h1>
	HTML;
require_once(__DIR__ . '/nav.php');
echo <<<HTML
	</header>
	HTML;
