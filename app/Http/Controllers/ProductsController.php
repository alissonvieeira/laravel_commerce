<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use CodeCommerce\Tag;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    private $productModel;

    public function __construct(Product $product)
    {
        $this->productModel = $product;
    }

    public function index()
    {
        $products = $this->productModel->paginate(10);

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

        $arrayTags = $this->tagToArray($input['tags']);

        $product = $this->productModel->fill($input);
        $product->save();

        $product->tags()->sync($arrayTags);

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
        $arrayTags = $this->tagToArray($productRequest->tags);

        $this->productModel->find($id)->update($productRequest->all());

        $this->productModel->find($id)->tags()->sync($arrayTags);

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $this->productModel->find($id)->delete();

        return redirect()->route('products.index');
    }

    public function images($id)
    {
        $product = $this->productModel->find($id);

        return view('products.images', compact('product'));
    }

    public function createImage($id)
    {
        $product = $this->productModel->find($id);

        return view('products.create_image', compact('product'));
    }

    public function storeImage(Requests\ProductImageRequest $request, $id, ProductImage $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create(['product_id' => $id, 'extension' => $extension]);

        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));

        return redirect()->route('products.images', ['id' => $id]);
    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);

        if(file_exists(public_path() . '/uploads/'.$image->id.'.'.$image->extension)){
            Storage::disk('public_local')->delete($image->id.'.'.$image->extension);
        }

        $product = $image->product;
        $image->delete();

        return redirect()->route('products.images', ['id' => $product->id]);
    }

    private function tagToArray($tags)
    {
        $tags = explode(",", $tags);
        $tags = array_map('trim', $tags);
        $tagCollection = [];
        foreach ($tags as $tag) {
            $t = Tag::firstOrCreate(['name' => $tag]);
            array_push($tagCollection, $t->id);
        }
        return $tagCollection;
    }
}
