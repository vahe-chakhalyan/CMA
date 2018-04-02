<?php

namespace App\Http\Controllers;

use App\Order;
use App\Table;
use Illuminate\Http\Request;

class WaiterTablesController extends Controller
{
    public function index(Request $request)
    {
        $tables = Table::where('waiter_id', $request->user()->id)
            ->with('activeOrder')
            ->get();

        return view('pages.waiters.tables', compact('tables'));
    }
}
