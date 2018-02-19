<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

INFO - 2018-01-14 15:37:28 --> Config Class Initialized
INFO - 2018-01-14 15:37:28 --> Hooks Class Initialized
INFO - 2018-01-14 15:37:28 --> UTF-8 Support Enabled
INFO - 2018-01-14 15:37:28 --> Utf8 Class Initialized
INFO - 2018-01-14 15:37:28 --> URI Class Initialized
DEBUG - 2018-01-14 15:37:28 --> No URI present. Default controller set.
INFO - 2018-01-14 15:37:28 --> Router Class Initialized
INFO - 2018-01-14 15:37:28 --> Output Class Initialized
INFO - 2018-01-14 15:37:28 --> Security Class Initialized
INFO - 2018-01-14 15:37:28 --> Input Class Initialized
INFO - 2018-01-14 15:37:28 --> Language Class Initialized
INFO - 2018-01-14 15:37:28 --> Loader Class Initialized
INFO - 2018-01-14 15:37:28 --> Helper loaded: url_helper
INFO - 2018-01-14 15:37:28 --> Helper loaded: html_helper
INFO - 2018-01-14 15:37:28 --> Helper loaded: form_helper
INFO - 2018-01-14 15:37:28 --> Helper loaded: cookie_helper
INFO - 2018-01-14 15:37:28 --> Database Driver Class Initialized
ERROR - 2018-01-14 15:37:30 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): �Ώۂ̃R���s���[�^�[�ɂ��ċ��ۂ��ꂽ���߁A�ڑ��ł��܂���ł����B
 C:\xampp\htdocs\CodeIgniter\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2018-01-14 15:37:35 --> Severity: Warning --> CI_DB_driver::initialize(): Property access is not allowed yet C:\xampp\htdocs\CodeIgniter\system\database\DB_driver.php 433
ERROR - 2018-01-14 15:37:35 --> Severity: Warning --> CI_DB_driver::initialize(): Property access is not allowed yet C:\xampp\htdocs\CodeIgniter\system\database\DB_driver.php 433
ERROR - 2018-01-14 15:37:35 --> Severity: Warning --> CI_DB_driver::initialize(): Property access is not allowed yet C:\xampp\htdocs\CodeIgniter\system\database\DB_driver.php 433
ERROR - 2018-01-14 15:37:35 --> Severity: Warning --> CI_DB_driver::initialize(): Property access is not allowed yet C:\xampp\htdocs\CodeIgniter\system\database\DB_driver.php 433
ERROR - 2018-01-14 15:37:35 --> Severity: Warning --> CI_DB_driver::initialize(): Property access is not allowed yet C:\xampp\htdocs\CodeIgniter\system\database\DB_driver.php 433
ERROR - 2018-01-14 15:37:35 --> Severity: Warning --> CI_DB_driver::initialize(): Property access is not allowed yet C:\xampp\htdocs\CodeIgniter\system\database\DB_driver.php 433
ERROR - 2018-01-14 15:37:35 --> Severity: Warning --> CI_DB_driver::initialize(): Property access is not allowed yet C:\xampp\htdocs\CodeIgniter\system\database\DB_driver.php 433
ERROR - 2018-01-14 15:37:35 --> Severity: Warning --> CI_DB_driver::initialize(): Property access is not allowed yet C:\xampp\htdocs\CodeIgniter\system\database\DB_driver.php 433
ERROR - 2018-01-14 15:37:35 --> Severity: Warning --> CI_DB_driver::initialize(): Property access is not allowed yet C:\xampp\htdocs\CodeIgniter\system\database\DB_driver.php 433
ERROR - 2018-01-14 15:37:35 --> Severity: Warning --> CI_DB_driver::initialize(): Property access is not allowed yet C:\xampp\htdocs\CodeIgniter\system\database\DB_driver.php 433
ERROR - 2018-01-14 15:37:35 --> Severity: Warning --> CI_DB_driver::initialize(): Property access is not allowed yet C:\xampp\htdocs\CodeIgniter\system\database\DB_driver.php 433
ERROR - 2018-01-14 15:37:35 --> Severity: Warning --> CI_DB_driver::initialize(): Property access is not allowed yet C:\xampp\htdocs\CodeIgniter\system\database\DB_driver.php 433
ERROR - 2018-01-14 15:37:35 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\CodeIgniter\system\core\Exceptions.php:283) C:\xampp\htdocs\CodeIgniter\system\core\Common.php 569
ERROR - 2018-01-14 15:37:35 --> Severity: Error --> Uncaught RuntimeException: Unable to connect to the database. in C:\xampp\htdocs\CodeIgniter\system\database\DB_driver.php:433
Stack trace:
#0 C:\xampp\htdocs\CodeIgniter\system\database\DB.php(219): CI_DB_driver->initialize()
#1 C:\xampp\htdocs\CodeIgniter\system\core\Loader.php(400): DB(Array, NULL)
#2 C:\xampp\htdocs\CodeIgniter\system\core\Loader.php(1344): CI_Loader->database()
#3 C:\xampp\htdocs\CodeIgniter\system\core\Loader.php(157): CI_Loader->_ci_autoloader()
#4 C:\xampp\htdocs\CodeIgniter\system\core\Controller.php(79): CI_Loader->initialize()
#5 C:\xampp\htdocs\CodeIgniter\system\core\CodeIgniter.php(467): CI_Controller->__construct()
#6 C:\xampp\htdocs\CodeIgniter\index.php(308): require_once('C:\\xampp\\htdocs...')
#7 {main}
  thrown C:\xampp\htdocs\CodeIgniter\system\database\DB_driver.php 433
