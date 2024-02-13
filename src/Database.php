<?php

namespace Rignchen\Database;

use PDO;

readonly class Database {
    public function __construct(private PDO $pdo) {}

}