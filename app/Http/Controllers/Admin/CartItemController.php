<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCartItemRequest;
use App\Http\Requests\StoreCartItemRequest;
use App\Http\Requests\UpdateCartItemRequest;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CartItemController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cart_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cartItems = CartItem::with(['cart', 'product'])->get();

        return view('admin.cartItems.index', compact('cartItems'));
    }

    public function create()
    {
        abort_if(Gate::denies('cart_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carts = Cart::pluck('token', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.cartItems.create', compact('carts', 'products'));
    }

    public function store(StoreCartItemRequest $request)
    {
        $cartItem = CartItem::create($request->all());

        return redirect()->route('admin.cart-items.index');
    }

    public function edit(CartItem $cartItem)
    {
        abort_if(Gate::denies('cart_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carts = Cart::pluck('token', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cartItem->load('cart', 'product');

        return view('admin.cartItems.edit', compact('cartItem', 'carts', 'products'));
    }

    public function update(UpdateCartItemRequest $request, CartItem $cartItem)
    {
        $cartItem->update($request->all());

        return redirect()->route('admin.cart-items.index');
    }

    public function show(CartItem $cartItem)
    {
        abort_if(Gate::denies('cart_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cartItem->load('cart', 'product');

        return view('admin.cartItems.show', compact('cartItem'));
    }

    public function destroy(CartItem $cartItem)
    {
        abort_if(Gate::denies('cart_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cartItem->delete();

        return back();
    }

    public function massDestroy(MassDestroyCartItemRequest $request)
    {
        $cartItems = CartItem::find(request('ids'));

        foreach ($cartItems as $cartItem) {
            $cartItem->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
