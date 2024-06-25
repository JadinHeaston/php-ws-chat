<?PHP
DEFINE('DEBUG', false);
DEFINE('DISABLE_ERROR_EMAILS', false);
DEFINE('ERROR_EMAIL_ADDRESSES', array('<EMAIL>'));
DEFINE('APP_ROOT', '/');
DEFINE('UPLOAD_DIR', __DIR__ . '/../UPLOADS/'); //Must end with a slash

//SMTP
DEFINE('ENABLE_SMTP', false);
DEFINE('APPLICATION_EMAIL', 'php-ws-chat@example.com');

//Database
define('DB_HOST', 'st-mariadb');
define('DB_USERNAME', '');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'php-ws-chat');
define('DB_TYPE', 'mysql');
define('DB_PORT', 3306);
define('DB_TRUST_CERT', 1);
define('DB_CHARSET', 'utf8mb4');

//AUTHENTICATION
DEFINE('AUTHENTICATION_ENABLE', true);
