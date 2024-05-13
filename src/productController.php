<?php

class productController 
{
    public function __construct(private productGateway $gateway) 
    {

    }

    public function processRequest(string $method, ?string $id): void 
    {
        if ($id) {

            $this -> processResourceRequest($method, $id);

        } else {

            $this -> processCollectionRequest($method);

        }
    }

    private function processResourceRequest(string $method, string $id): void 
    {

    }

    private function processCollectionRequest(string $method): void 
    {
        switch ($method) {
            case 'GET':
                echo json_encode($this -> gateway -> getAll());
                break;
        }
    }
}