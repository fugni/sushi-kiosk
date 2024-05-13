<?php

class productGateway
{
    private PDO $connection;

    public function __construct(database $database)
    {
        $this->connection = $database->connect();
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM sushi";

        $statement = $this -> connection -> query($sql);

        $data = [];

        while ($row = $statement -> fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        return $data;
    }
}