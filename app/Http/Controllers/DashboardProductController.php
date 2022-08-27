<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Admin\ProductRequest;
use App\Product;
use App\ProductGallery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DashboardProductController extends Controller
{
    public function index()
    {
        $products = Product::with('galleries','category')
                            ->where('users_id', Auth::user()->id)
                            ->get();
        return view('pages.dashboard-products', compact('products'));
    }
    public function details(Request $request, $id)
    {
        $product = Product::with(['galleries','users','category'])->findOrFail($id);
        $categories = Category::all();
        return view('pages.dashboard-products-details' , compact(
            'product','categories'
        ));
    }

    public function uploadgallery(Request $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/product', 'public');

        ProductGallery::create($data);
        return redirect()->back();
    }

    public function deletegallery(Request $request, $id)
    {
        $item = ProductGallery::findOrFail($id);
        $item->delete();

        return redirect()->back();

    }
    public function create()
    {
        $categories = Category::all();
        return view('pages.dashboard-products-create', compact('categories'));
    }
    public function store(ProductRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        $product = Product::create($data);

        $gallery = [
            'products_id' => $product->id,
            'photos' => $request->file('photo')->store('assets/product', 'public')
        ];

        ProductGallery::create($gallery);

        return redirect()->back();
    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        $item = Product::findOrFail($id);

        $item->update($data);

        return redirect()->back();
    }
}
