<?php

namespace App\Controller;

use Symfony\Component\Uid\Uuid;
use Symfony\Component\HttpKernel\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\ProductService;

class ProductUploadController extends AbstractController
{
    public function __construct(
        private ProductService $productService,
        private SerializerInterface $serializer
    )
    {}

    public function __invoke(Request $request)
    {
        $file = $request->files->get('file');
        $id = $request->request->get('id');


        if (!$id) {
            throw new Exception\BadRequestHttpException('The id field should not be blank.');
        }

        if (!Uuid::isValid($id)) {
            throw new Exception\BadRequestHttpException('The ID format is invalid.');
        }

        $errors = $this->productService->validateProductDto($file);

        if ($errors) {
            return new JsonResponse([
                'errors' => true, 
                'message' => $errors, 
                'data' => null
            ],
            Response::HTTP_BAD_REQUEST
            );
        }

        $product = $this->productService->updateUploadFile($file, Uuid::fromString($id));

        return $this->json(
            $product,
            Response::HTTP_OK,
            [],
            ['groups' => ['product:read']]
        );
    }
}