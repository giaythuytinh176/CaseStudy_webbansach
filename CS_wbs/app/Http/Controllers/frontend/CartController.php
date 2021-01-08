<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function main(Request $request)
    {
        if ($request->op == "deletecarts") {
            return $this->deleteCart();
        } elseif (!empty($request->remove_cart)) {
            return $this->destroy($request->remove_cart);
        } elseif ($request->updatecart == "update_cart") {
            return $this->updateCart($request->items);
        }
        dd($request);
        return redirect()->route('cart.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        $categorys = Category::all();
        return view('frontend.cart.index', compact('authors', 'categorys'));
    }

    public function updateCart($items_update)
    {
        foreach ($items_update as $key => $itemupdate) {
            foreach (Cart::content() as $k => $cart) {
                if ($cart->id == $key) {
                    Cart::update($cart->rowId, $itemupdate['qty']);
                }
            }
        }
        return redirect()->route('cart.index');
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book_info = Book::findOrFail($request->id);
        $book = [
            'id' => $book_info->id,
            'name' => $book_info->name,
            'qty' => 1,
            'price' => $book_info->price,
            'weight' => 550,
            'options' => ['img' => $book_info->img,]
        ];
        if (count(Cart::content()) == 0) {
            Cart::add([$book]);
        } else {
            foreach (Cart::content() as $k => $cart) {
                if ($cart->id == $book_info->id) {
                    Cart::update($cart->rowId, ++$cart->qty);
                    break;
                } else {
                    Cart::add([$book]);
                }
            }
        }
        $authors = Author::all();
        $categorys = Category::all();
        Session::flash('sucess_cart', "Successfully added to cart.");
        return view('frontend.cart.index', compact('authors', 'categorys'));
    }

    public function deleteCart()
    {
        Cart::destroy();
        return redirect()->route('cart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (count(Cart::content()) > 0) {
            foreach (Cart::content() as $k => $cart) {
                if ($cart->id == $id) {
                    Cart::remove($cart->rowId);
                    Session::flash('remove_cart', "Successfully removed.");
                    return redirect()->route('cart.index');
                }
            }
        }
    }
}
