<?php

namespace Rignchen\Database;

use PDO;

readonly class Database {
    public function __construct(private PDO $pdo, private bool $debug = false) {}

    public function execute(string $request, array $parameters = []): void {
        $query = $this->pdo->prepare($request);
        $query->execute($parameters);
        if ($this->debug)
        	echo $request . "<br>";
    }

    /**
     * @param array<string> $columns
     */
    public function createTable(string $name, array $columns): Table {
        $this->execute("create table if not exists $name ("
                . implode("," , array_map(fn($index, $value) => "$index $value", array_keys($columns), $columns))
                . ")");
        return new Table($this, $name);
    }
    public function removeTable(string $name): void {
        $this->execute("drop table if exists $name");
    }
}