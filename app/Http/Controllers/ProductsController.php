<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class ProductsController extends Controller
{
    private $productModel;

    public function __construct(Product $product)
    {
        $this->productModel = $product;
    }

    public function index()
    {
        $products = $this->productModel->all();

        return view('products.index', compact('products'));
    }

    public function create(Category $category)
    {
        $categories = $category->lists('name', 'id');

        return view('products.create', compact('categories'));
    }

    public function store(Requests\ProductRequest $productRequest)
    {
        $input = $productRequest->all();

        $product = $this->productModel->fill($input);

        $product->save();

        return redirect()->route('products.index');
    }

    public function edit($id, Category $category)
    {
        $categories = $category->lists('name', 'id');

        $product = $this->productModel->find($id);

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Requests\ProductRequest $productRequest, $id)
    {
        $this->productModel->find($id)->update($productRequest->all());

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $this->productModel->find($id)->delete();

        return redirect()->route('products.index');
    }
}
