<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Models\Cart;
use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebsiteController extends Controller
{
    //
    public function category()
    {
        $category = CategoryProduct::where('parent_id', null)->get();
        return view('category', compact('category'));
    }

    public function subcategory($slug)
    {
        $category = CategoryProduct::where('slug', $slug)->first();

        if (!isset($category) || empty($category))
            abort(404);
        $subcate = $category->categories()->get();

        return view('sub-category', [
            'title' => $category->name
        ], compact('subcate'));
    }

    public function getAllProduct($category)
    {
        $category = CategoryProduct::where('slug', $category)->first();

        if (!isset($category) || empty($category))
            abort(404);

        $listProduct = $category->Product()->get();

        return view('list-product', [
            'title' => $category->name
        ], compact('listProduct'));
    }

    public function detailProduct($slug)
    {
        $product = Product::where('slug', $slug)->first();

        if (!isset($product) || empty($product))
            abort(404);

        return view('product-detail', [
            'title' => '1'
        ], compact('product'));
    }

    public function addToCart(AddToCartRequest $request, $slug)
    {
        $product = Product::where('slug', $slug)->first();

        if (!isset($product) || empty($product))
            abort(404);

        $pr = Cart::where('id_account', Auth::user()->id)->where('id_product', $product->id)->first();

        if (isset($pr) > 0) {
            $quan = $pr->quantity;
            $pr->quantity = $quan + $request->quantity;

            $pr->save();
        } else {
            $cart = new Cart;
            $cart->id_account = Auth::user()->id;
            $cart->id_product = $product->id;
            $cart->quantity = $request->quantity;

            $cart->save();
        }

        return back()->withInput()->with('success', 'Add to cart Success!');
    }

    public function getCart()
    {
        $listCart = Auth::user()->Cart()->get();

        return view('cart', compact('listCart'));
    }

    public function getUpdateCart(Request $request)
    {
        $card = Cart::findOrFail($request->id);

        $card->quantity = $request->quantity;
        $card->save();
    }

    public function deleteCart(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);

        $cart->delete();

        return back();
    }

    public function getCartForUser()
    {
        if (Auth::check()) {
            return Auth::user()->Cart()->get();
        }
    }
}
