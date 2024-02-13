<?php

namespace Rignchen\Database;

class Table {
    public function __construct(private readonly Database $database, private string $name) {}

    public function delete(): void {
        $this->database->execute("drop table $this->name");
    }

    public function addRow(array $values): void {
        $this->database->execute("insert into $this->name ("
                . implode(",", array_keys($values))
                . ") values ("
                . implode(",", array_map(fn($index) => ":$index", array_keys($values)))
                . ")", $values);
    }

    public function addColumn(string $string, string $string1) {
		$this->database->execute("alter table $this->name add column $string $string1");
    }
    public function addColumns(array $columns) {
        foreach ($columns as $column => $type) {
            $this->addColumn($column, $type);
        }
    }
}
