<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MainController extends Controller
{
    public function index(){
        $products = Product::get();
        return view('index', compact('products'));
    }
    public function categories(){
        $categories = Category::get();

        return view('categories', compact('categories'));
    }
    public function category($code){
        $category = Category::where('code', $code)->first();

        return view('category', compact('category'));
    }
    public function product($category, $productCode){
        $product = Product::byCode($productCode)->first();
        return view('product', compact('product'));
    }
//    public function product($category, $product=null){
//        return view('product', ['product' =>$product]);
//    }

    public function cart(){
        return view('cart');
    }

    public function cartOrder(){
        return view('order');
    }

    public function changeLocale($locale){
        $availableLocales = ['en', 'ru'];
        if (!in_array($locale, $availableLocales)){
            $locale = config ('app.locale');
        }
        session(['locale' => $locale]);
        App::setLocale($locale);
        return redirect()->back();
    }
}
