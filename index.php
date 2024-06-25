<?php
require_once(__DIR__ . '/includes/loader.php');

require_once(__DIR__ . '/templates/header.php');

$_SESSION['test'] = 'hello!!!';
var_dump($_SESSION);

echo <<<HTML
	<main>
		<h2>Current Chat: </h2>
	</main>
	HTML;

require_once(__DIR__ . '/templates/footer.php');
