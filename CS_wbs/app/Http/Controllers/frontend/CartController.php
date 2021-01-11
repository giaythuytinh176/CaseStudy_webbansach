<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function main(Request $request)
    {
        if ($request->op == "deletecarts") {
            return $this->deleteCart();
        } elseif ($request->op == "checkout") {
            return $this->checkout();
        } elseif (!empty($request->remove_cart)) {
            return $this->destroy($request->remove_cart);
        } elseif ($request->updatecart == "update_cart") {
            return $this->updateCart($request->items);
        }
        return redirect()->route('cart.index');
    }

    public function deleteCart()
    {
        Cart::destroy();
        return redirect()->route('cart.index');
    }

    public function checkout()
    {
        $customer = Auth::guard('customers')->user();
        return view('frontend.cart.checkout', compact('customer'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
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

    public function updateCart($items_update)
    {
        foreach ($items_update as $key => $itemupdate) {
            foreach (Cart::content() as $k => $cart) {
                if ($cart->id == $key) {
                    Session::flash('updateCart', "Successfully updated cart.");
                    Cart::update($cart->rowId, $itemupdate['qty']);
                }
            }
        }
        return redirect()->route('cart.index');
    }

    public function checkOutBank(Request $request, Customer $customer, Order $order, Book $book)
    {
        if (!empty($request->form_id)) {
            if ($request->panes['payment']['payment_method'] == 'cod') {
                $carts = Cart::content();
                foreach ($carts as $cart) {
                    $book_id = $cart->id;
                    $customer_id = Auth::guard('customers')->id();
                    $order->order_date = date('H:i:s d/m/Y');
                    $order->customer_id = $customer_id;
                    $order->status = 'New';
//                    $order->status = 'Invoiced';
//                    $order->status = 'Shipped';
//                    $order->status = 'Closed';
                    $order->save();

                    $ctm = $customer::findOrFail($customer_id);
                    $ctm->first_name = $request->first_name;
                    $ctm->last_name = $request->last_name;
                    $ctm->email = $request->email;
                    $ctm->phone = $request->phone;
                    $ctm->address = $request->address;
                    $ctm->save();

                    $book = Book::find($book_id);
                    $book->orders()->attach($order->id, [
                            'quantity' => $cart->qty,
                            'price' => $cart->price,
                        ]
                    );
                }
                Cart::destroy();
                return view('frontend.cart.cod');
            } elseif ($request->panes['payment']['payment_method'] == 'vinno-momo') {

                dd($request);
                Cart::destroy();

            } elseif ($request->panes['payment']['payment_method'] == 'ngangluong') {

                dd($request);
                Cart::destroy();

            }
            dd($request);

        }

        return view('frontend.cart.cod');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('frontend.cart.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
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
        Session::flash('sucess_cart', "Successfully added to cart.");
        return view('frontend.cart.index');
    }

    public function store2(Request $request, $id)
    {
        $book_info = Book::findOrFail($id);
        $book = [
            'id' => $book_info->id,
            'name' => $book_info->name,
            'qty' => $request->quantity,
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
        Session::flash('sucess_cart', "Successfully added to cart.");
        return view('frontend.cart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}
