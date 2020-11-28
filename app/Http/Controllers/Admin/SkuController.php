<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkuRequest;
use App\Models\Product;
use App\Models\Sku;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class SkuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Product  $product
     * @return Response
     */
    public function index(Product $product)
    {
        $skus = $product->skus()->paginate(10);
        return view('auth.skus.index', compact('skus', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Product  $product
     * @return void
     */
    public function create(Product $product)
    {
        return view('auth.skus.form', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @param  Product  $product
     * @return void
     */
    public function store(SkuRequest $request, Product $product)
    {
        $params = $request->all();
        $params['product_id'] = $request->product->id;

        $skus = Sku::create($params);

        $skus->propertyOptions()->sync($request->property_id);
        return redirect()->route('skus.index', $product);
    }

    /**
     * Display the specified resource.
     *
     * @param  Product  $product
     * @param  Sku  $skus
     * @return void
     */
    public function show(Product $product, $skusId)
    {
        $skus = Sku::findOrFail($skusId);
        return view('auth.skus.show', compact('product', 'skus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product  $product
     * @param  Sku  $sku
     */
    public function edit(Product $product, Sku $sku)
    {
        return view('auth.skus.form', ['product' => $product, 'sku' => $sku, 'skus' => $sku]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Product  $product
     * @param  Sku  $skus
     * @return void
     */
    public function update(Request $request,$product, $skus)
    {
        $product = Product::find($product);
        $skus = Sku::find($skus);

        $params = $request->all();
        $params['product_id'] = $product->id;
        $skus->update($params);

        $skus->propertyOptions()->sync($params['property_id']);
        return redirect()->route('skus.index', $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @param  Sku  $skus
     * @return void
     * @throws Exception
     */
    public function destroy(Product $product, Sku $skus)
    {
        $skus->delete();
        return redirect()->route('skus.index', $product);
    }
}
