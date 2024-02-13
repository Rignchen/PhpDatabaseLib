<?php

namespace Rignchen\Database;

use PDO;

readonly class Database {
    public function __construct(private PDO $pdo, private bool $debug = false) {}

    private function execute(string $request, array $parameters = []): void {
        $query = $this->pdo->prepare($request);
        $query->execute($parameters);
        if ($this->debug)
        	echo $request . "<br>";
    }

    /**
     * @param array<string> $columns
     */
    public function createTable(string $name, array $columns): void {
        $request = "create table if not exists $name ("
                . implode("," , array_map(fn($index, $value) => "$index $value", array_keys($columns), $columns))
                . ")";
        $this->execute($request);
    }
}