<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Loader, with varying connection that lacks database specification.
require_once(__DIR__ . '/../includes/config.php');
if (DEBUG === true) require_once(__DIR__ . '/../includes/debug.php');
require_once(__DIR__ . '/../includes/enumerators.php');
require_once(__DIR__ . '/../includes/globals.php');
require_once(__DIR__ . '/../includes/functions.php');
require_once(__DIR__ . '/../includes/models.php');

require_once(__DIR__ . '/setup_functions.php');

if (is_dir(BACKEND_UPLOAD_DIR) === false)
{
	mkdir(BACKEND_UPLOAD_DIR, 0777, true);
}

$setupConnection = new Connector(DB_TYPE, DB_HOST, DB_PORT, '', DB_USERNAME, DB_PASSWORD, DB_CHARSET, DB_TRUST_CERT);

$setupConnection->executeStatement(file_get_contents(__DIR__ . '/../sql/initial_table_setup.sql'), [], true);
$setupConnection->executeStatement(file_get_contents(__DIR__ . '/../sql/initial_view_setup.sql'), [], true);
$setupConnection->executeStatement(file_get_contents(__DIR__ . '/../sql/initial_table_values.sql'), [], true);
