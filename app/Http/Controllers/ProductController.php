<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ProductAttribute;
use App\Http\Resources\ProductResource;
use App\Models\SubCategory;
use Illuminate\Pipeline\Pipeline;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Product $product): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return ProductResource::collection($product->orderByDesc('id')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductCreateRequest $request
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductCreateRequest $request, Product $product): \Illuminate\Http\JsonResponse
    {
        //Upload Images
       if($request->hasFile('files')){
            $image = [];
             foreach($request->file('files') as $file){
                  $file_name = time().'_'.$file->getClientOriginalName();
                  $file_path = $file->storeAs('uploads', $file_name, 'public');
                  $image[] = "/storage/".$file_path;
             }
          }
        //Create Product
         $product_id = $product->create([
             'name' => $request->name,
             'description' => $request->description,
             'price' => $request->price,
             'stock' => $request->stock,
             'image' => json_encode($image),
             'rating' => '2.5',
             'subcategory_id' => $request->subcategory_id,
             'category_id' => $request->category_id,
         ])->id;
        //Create Product Attributes
         $attributes = json_decode($request->attribute);
         foreach ($attributes as $attribute) {
            ProductAttribute::create([
                 'product_id' => $product_id,
                 'attribute' => $attribute->type,
                 'value' => $attribute->value,
             ]);
         }
         //return
          return response()->json([
              'message' => 'Product created successfully',
              'data' => $product_id,
          ], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @param $id
     * @return ProductResource
     */
    public function show(Product $product,$id): ProductResource
    {
        return new ProductResource($product->query()->findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param \App\Models\Product $product
     * @param $id
     * @return Product
     */
    public function edit(Request $request,Product $product,$id): Product
    {
        //edit
        $product->findOrFail($id)->update($request->all());

        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Product $product): \Illuminate\Http\JsonResponse
    {
        $product->query()->update($request->all());
        $product->attributes()->update($request->all());
        return response()->json(['message' => 'Product Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Product $product,$id): \Illuminate\Http\JsonResponse
    {
        $product->find($id)->delete();
        return response()->json([
            'message' => 'Product deleted!'
        ]);
    }
    public function test(Request $request)
    {
        SubCategory::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->name),
        ]);
        return response()->json([
            'message' => 'Subcategory created successfully',
        ], 201);
    }
    public function filter()
    {
        $query = Product::query()->orderByDesc('created_at');

        $products = app(Pipeline::class)
            ->send($query)
            ->through([
                \App\QueryFilters\ProductCategoryFilter::class,
                \App\QueryFilters\ProductColorFilter::class,
                \App\QueryFilters\ProductPriceFilter::class,
            ])
            ->thenReturn()
        ->get();
        return ProductResource::collection($products);
    }

}

