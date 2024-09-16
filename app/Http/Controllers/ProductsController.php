<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductsController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Product::all()->load('category'));
    }

    public function show(Product $product_id)
    {
        return response()->json($product_id);
    }

    public function store(ProductRequest $request): JsonResponse
    {
        return response()->json(Product::create($request->validated()));
    }

    public function update(Product $product_id, ProductRequest $request): JsonResponse
    {
        $product_id->update($request->validated());

        return response()->json($product_id);
    }

    public function delete(Product $product_id): JsonResponse
    {
        $product_id->delete();

        return response()->json(['message' => 'Delete successfully'], 200);
    }

    public function filter(int $category_id): JsonResponse
    {
        return response()->json(Product::where('category_id', $category_id)->get());
    }
}
