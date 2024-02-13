<?php
require_once '../vendor/autoload.php';

use Rignchen\Database\Database;

$pdo = new PDO('sqlite:identifier.sqlite');
$db = new Database($pdo);

$db->createTable('identifier', [
    'id' => 'INTEGER PRIMARY KEY',
    'name' => 'TEXT',
    'value' => 'TEXT'
]);
