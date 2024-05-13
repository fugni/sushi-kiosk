<?php

class productGateway
{
    private PDO $connection;

    public function __construct(database $database)
    {
        $this->connection = $database->connect();
    }

    // shows all products from specified category
    public function getCategory(string $value): array
    {
        $sql = "SELECT * FROM sushi WHERE type = :type";

        $statement = $this -> connection -> prepare($sql);

        $statement -> bindValue(':type', $value, PDO::PARAM_STR);

        $statement -> execute();

        $data = [];

        while ($row = $statement -> fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        return $data;
    }

    // shows a single product by id
    public function getById(string $value): array | false
    {
        $sql = "SELECT * FROM sushi WHERE id = :id";

        $statement = $this -> connection -> prepare($sql);

        $statement -> bindValue(':id', $value, PDO::PARAM_INT);

        $statement -> execute();

        $data = $statement -> fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    // shows all products
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