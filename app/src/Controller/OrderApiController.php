<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderApiController extends AbstractController
{
    #[Route('/api/orders', name: 'api_order_list', methods: ['GET'])]
    public function listOrders(): JsonResponse
    {
        $orders = [
            [
                'id' => 1,
                'number' => 'ZAM/001/2025',
                'customer' => 'Sklep Alfa',
                'status' => 'w realizacji',
            ],
            [
                'id' => 2,
                'number' => 'ZAM/002/2025',
                'customer' => 'Butik Bella',
                'status' => 'w realizacji',
            ],
        ];
        return $this->json($orders, Response::HTTP_OK);
    }

    #[Route('/api/orders/{id}', name: 'api_order_show', methods: ['GET'])]
    public function showOrder(string $id): JsonResponse
    {
        if(!ctype_digit($id)){
            return $this->json(
                ['error'=> 'Nieprawidłowy identyfikator zamówienia (id musi być liczbą całkowitą).'],
                Response::HTTP_BAD_REQUEST
            );
        }
    $orderId=(int) $id;

    $orders = [
        1=>[
        'id' => 1,
        'number' => 'ZAM/001/2025',
        'customer' => 'Sklep Alfa',
        'status' => 'w realizacji',
        ],

    2=>[
        'id' => 2,
        'number' => 'ZAM/002/2025',
        'customer' => 'Butik Bella',
        'status' => 'w realizacji',
        ],
    ];

    if(!isset($orders[$orderId])){
        return $this->json(
            ['error'=>'Zamówienie o podanym ID nie istnieje.'],
            Response::HTTP_NOT_FOUND
        );
    }

return $this->json($orders[$orderId], Response::HTTP_OK);


    }

}