<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShopingCartResource;
use App\Models\ClientData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ShopingCart;

class ShopingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getUserCart(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $cart = ShopingCart::query()->where('status', 0)->where('user_id', auth('sanctum')->user()->id)->get();
        return ShopingCartResource::collection($cart);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ShopingCartResource
     */
    public function store(Request $request): ShopingCartResource
    {
        $product = ShopingCart::query()
            ->where('status', 0)
            ->where('product_id', $request->product_id)
            ->where('user_id', auth('sanctum')->user()->id)
            ->first();
        if($product){
            $product->increment('quantity');
        }else{
            $product = ShopingCart::query()->create([
                'user_id' => auth('sanctum')->user()->id,
                'product_id' => $request->product_id,
                'quantity' => 1
            ]);
        }
        return new ShopingCartResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $product = Product::query()->where('product_id', $id)
            ->where('user_id', auth('sanctum')->user()->id)
            ->where('status', 0)
            ->first();
        if($product){
            return response()->json(['data' => $product]);
        }else{
            return response()->json(['error' => 'Product not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
       $shop = ShopingCart::query()
            ->where('id', $id)
            ->update([
                'quantity' => $request->quantity,
                'total' => $request->quantity * Product::find($request->product_id)->price]);
        return response()->json(['success' => 'Product updated', 'data' => $shop]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param null $id
     * @return JsonResponse
     */
    public function destroy($id = null): JsonResponse
    {
        if($id){
            ShopingCart::query()->where('user_id', auth('sanctum')->user()->id)
                ->where('product_id', $id)
                ->delete();
        }else{
            ShopingCart::query()->where('user_id', auth('sanctum')->user()->id)->delete();
        }
        return response()->json(['success' => 'Product removed from cart']);
    }

    /**
     * BuyProduct.
     * @return JsonResponse
     */
    public function buyProduct(): JsonResponse
    {
        ShopingCart::query()->where('user_id', auth('sanctum')->user()->id)
        ->update([
            'status' => 1
        ]);
        return response()->json(['success' => 'Product purchased']);
    }
    public function getUser(): JsonResponse
    {
        $client = ClientData::query()->where('user_id', auth('sanctum')->user()->id)->first();
        return response()->json($client);
    }
}
