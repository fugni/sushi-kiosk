<?php

class productController 
{
    public function __construct(private productGateway $gateway) 
    {

    }

    public function processRequest(string $method, ?string $value): void 
    {
        if ($value == "sushi" || $value == "voordeel" || $value == "pokebowl" || $value == "dranken") {
            $this -> categoryRequest($method, $value);
        } else if ($value) {
            $this -> singleProductRequest($method, $value);
        } else {
            $this -> allProductsRequest($method);
        }
    }

    private function singleProductRequest(string $method, string $value): void 
    {
        $product = $this -> gateway -> getById($value);

        if (!$product) {
            http_response_code(404);
            echo json_encode(['error' => 'Product not found']);
            return;
        }

        switch ($method) {
            case 'GET':
                echo json_encode($product);
                break;
        }
    }

    private function categoryRequest(string $method, string $value): void 
    {
        switch ($method) {
            case 'GET':
                echo json_encode($this -> gateway -> getCategory($value));
                break;
        }
    }

    private function allProductsRequest(string $method): void 
    {
        switch ($method) {
            case 'GET':
                echo json_encode($this -> gateway -> getAll());
                break;
        }
    }
}