<?php
require_once '../vendor/autoload.php';

use Rignchen\Database\Database;

$pdo = new PDO('sqlite:identifier.sqlite');
$db = new Database($pdo, true);

$table = $db->createTable('identifier', [
    'id' => 'INTEGER PRIMARY KEY',
    'name' => 'TEXT',
    'value' => 'TEXT'
]);

$table->addRow([
    'name' => 'toto',
    'value' => 'tutu'
]);
$table->addColumn('age', 'INTEGER');
$table->addColumns([
    'size' => 'INTEGER',
    'weight' => 'INTEGER'
]);
