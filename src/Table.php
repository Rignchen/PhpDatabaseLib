<?php

namespace Rignchen\Database;

class Table {
    public function __construct(private readonly Database $database, private string $name) {}

    public function addRow(array $values): void {
        $this->database->execute("insert into $this->name ("
                . implode(",", array_keys($values))
                . ") values ("
                . implode(",", array_map(fn($index) => ":$index", array_keys($values)))
                . ")", $values);
    }
}
