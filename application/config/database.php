<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = 'QualityLeads';
$active_record = TRUE;

$db['default']['hostname'] = 'localhost';
$db['default']['username'] = '';
$db['default']['password'] = '';
$db['default']['database'] = '';
$db['default']['dbdriver'] = 'mysql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;

$db['QLI']['hostname'] = 'localhost';
$db['QLI']['username'] = 'resultex_resultu';
$db['QLI']['password'] = 'SgJHevQbi*&E';
$db['QLI']['database'] = 'resultex_resultdb';
$db['QLI']['dbdriver'] = 'mysql';
$db['QLI']['dbprefix'] = '';
$db['QLI']['pconnect'] = TRUE;
$db['QLI']['db_debug'] = TRUE;
$db['QLI']['cache_on'] = FALSE;
$db['QLI']['cachedir'] = '';
$db['QLI']['char_set'] = 'utf8';
$db['QLI']['dbcollat'] = 'utf8_general_ci';
$db['QLI']['swap_pre'] = '';
$db['QLI']['autoinit'] = TRUE;
$db['QLI']['stricton'] = FALSE;

$db['QualityLeads']['hostname'] = 'localhost';
$db['QualityLeads']['username'] = 'resultex_resultu';
$db['QualityLeads']['password'] = 'SgJHevQbi*&E';
$db['QualityLeads']['database'] = 'resultex_resultdb';
$db['QualityLeads']['dbdriver'] = 'mysql';
$db['QualityLeads']['dbprefix'] = '';
$db['QualityLeads']['pconnect'] = TRUE;
$db['QualityLeads']['db_debug'] = TRUE;
$db['QualityLeads']['cache_on'] = FALSE;
$db['QualityLeads']['cachedir'] = '';
$db['QualityLeads']['char_set'] = 'utf8';
$db['QualityLeads']['dbcollat'] = 'utf8_general_ci';
$db['QualityLeads']['swap_pre'] = '';
$db['QualityLeads']['autoinit'] = TRUE;
$db['QualityLeads']['stricton'] = FALSE;

/*$db['hitpath']['hostname'] = 'localhost';
$db['hitpath']['username'] = 'QLI';
$db['hitpath']['password'] = 'h3R3n0W';
$db['hitpath']['database'] = 'hitpath';
$db['hitpath']['dbdriver'] = 'mysql';
$db['hitpath']['dbprefix'] = '';
$db['hitpath']['pconnect'] = TRUE;
$db['hitpath']['db_debug'] = TRUE;
$db['hitpath']['cache_on'] = FALSE;
$db['hitpath']['cachedir'] = '';
$db['hitpath']['char_set'] = 'utf8';
$db['hitpath']['dbcollat'] = 'utf8_general_ci';
$db['hitpath']['swap_pre'] = '';
$db['hitpath']['autoinit'] = TRUE;
$db['hitpath']['stricton'] = FALSE;*/


/* End of file database.php */
/* Location: ./application/config/database.php */