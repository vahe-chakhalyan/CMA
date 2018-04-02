<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Order;
use App\Product;
use App\ProductInOrder;
use App\Table;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }


    /**
     * @param Request $request
     * @param $table_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function create($table_id)
    {
        $table = Table::findOrFail($table_id);
        $products = Product::all();
        if ($table->activeOrder) {
            return redirect('/my-tables');
        }

        return view('pages.orders.create', compact('table', 'products'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrderRequest $request, $table_id)
    {
        \DB::beginTransaction();
        try {
            $order = new Order();
            $order->table_id = $table_id;
            $order->status = 1;
            $order->save();

            $product = Product::find($request->input('product'));
            $productInOrder = new ProductInOrder();
            $productInOrder->order_id = $order->id;

            $productInOrder->product_id = $product->id;
            $productInOrder->count = $request->input('count');
            $productInOrder->status = 'active';
            $productInOrder->save();

            $order->total_amount += $product->price * $request->input('count');
            $order->save();

            \DB::commit();
            return redirect('my-tables');
        } catch (\Exception $ex) {
            \DB::rollBack();
            abort(500);
        }
    }

    /**
     * @param Request $request
     * @param $table_id
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, $table_id, $id)
    {
        $table = Table::findOrFail($table_id);
        $order = Order::findOrFail($id);

        if ($request->user()->id != $table->waiter_id) {
            abort(403);
        }


        if ($order->table_id != $table->id) {
            abort(403);
        }

        $order->productsInOrder;
        if ($order->productsInOrder->count()) {
            foreach ($order->productsInOrder as $pio) {
                $pio->product;
            }
        }

        return view('pages.orders.show', compact('table', 'order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $table_id, $id)
    {
        $table = Table::findOrFail($table_id);
        $order = Order::findOrFail($id);

        if ($request->user()->id != $table->waiter_id) {
            abort(403);
        }


        if ($order->table_id != $table->id) {
            abort(403);
        }


        $order->productsInOrder;
        if ($order->productsInOrder->count()) {
            foreach ($order->productsInOrder as $pio) {
                $pio->product;
            }
        }

        return view('pages.orders.edit', compact('table', 'order'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
