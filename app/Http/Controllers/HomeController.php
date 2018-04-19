<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Product;
use Cart;
use Auth;
use Category;
use SubCat;
use DB;

class HomeController extends Controller
{    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::orderBy('created_at', 'desc')->paginate(12);
        return view('home')->with($data);
    }

    public function search(Request $request)
    {        
        $search = $request->input('keyword');
        $data['search'] = $search;
        $data['title'] = $search;
        $data['products'] = Product::where('name', 'LIKE', '%'.$search.'%', 'OR', 'code', 'LIKE', '%'.$search.'%', 'OR', 'company', 'LIKE', '%'.$search.'%', 'OR', 'category', 'LIKE', '%'.$search.'%', 'OR', 'subcat', 'LIKE', '%'.$search.'%')->get();
        return view('home')->with($data);
    }

    public function category($category)
    {
        if (!Category::where('slug', '=', $category)->exists()) {
            abort(404);
        }
        $code_category = Category::where('slug', '=', $category)->value('code');
        $data['products'] = Product::where('category', '=', $code_category)->get();
        $data['title'] = $category;
        return view('home')->with($data);
    }

    public function sub_category($category, $sub_category)
    {
        $code_category = Category::where('slug', '=', $category)->value('code');
        $id_subcat = SubCat::where('slug', '=', $sub_category)->value('id');
        if (!Subcat::where('category', '=', $code_category)->exists() || !SubCat::where('slug', '=', $sub_category)->exists()) {
            abort(404);
        }
        $data['products'] = Product::where('category', '=', $code_category)->where('subcat', '=', $id_subcat)->get();
        $data['title'] = $sub_category;
        return view('home')->with($data);
    }

    public function product($category, $sub_category, $id)
    {
        $code_category = Category::where('slug', '=', $category)->value('code');
        $id_subcat = SubCat::where('slug', '=', $sub_category)->value('id');
        if (!Product::where('category', '=', $code_category)->exists() || !Product::where('subcat', '=', $id_subcat)->exists() || !Product::where('id', '=', $id)->exists()) {
            abort(404);
        }
        $data['product'] = Product::find($id);
        return view('product')->with($data);
    }

    public function cart()
    {
        return view('cart');
    }

    public function checkout()
    {        
        if (Cart::content()->count() <= 0) {
            abort(404);
        }
        return view('checkout');
    }

    public function add(Request $request)
    {
        Cart::add([
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'qty' => $request->input('qty'),
            'price' => $request->input('price'),
            'options' => [
                'category' => $request->input('category'),
                'subcat' => $request->input('subcat'),
                'size' => $request->input('size'),
            ]
        ]);
        return back();
    }

    public function edit(Request $request)
    {
        $rowId = $request->input('id');
        Cart::update($rowId, ['qty' => $request->input('qty')]);
        return back();
    }

    public function remove(Request $request)
    {
        $rowId = $request->input('id');
        Cart::remove($rowId);
        return back();
    }

    public function destroy()
    {        
        Cart::destroy();
        return back();
    }    

    public function states()
    {
        $categories = DB::table('categories')->pluck("name","id");
        return view('welcome',compact('categories'));
    }

    public function getStates($id) {
        $subcat = DB::table("sub_cats")->where("category",$id)->pluck("name","id");

        return json_encode($subcat);

    }

}
