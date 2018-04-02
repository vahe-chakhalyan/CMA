<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTableRequest;
use App\Http\Requests\UpdateTablesRequest;
use App\Role;
use App\Table;
use App\User;
use Illuminate\Http\Request;

class TablesController extends Controller
{
    public function __construct()
    {
        $this->middleware('manager', ['except' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = Table::paginate(env('RPP'));
        $waiters = User::where('role_id', Role::getWaiterRole()->id)
            ->get();

        return view('pages.tables.index', compact('tables', 'waiters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTableRequest $request)
    {
       Table::create([
           'name' => $request->input('name')
       ]);

       return redirect('/tables');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Table::findOrFail($id);

        return view('pages.tables.show', compact('table'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $table = Table::findOrFail($id);
        $waiters = User::where('role_id', Role::getWaiterRole()->id)
            ->get();

        return view('pages.tables.edit', compact('table', 'waiters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTablesRequest $request, $id)
    {
        $table = Table::findOrFail($id);

        $table->name = $request->input('name');
        if(!empty($request->input('waiter'))) {
            $table->waiter_id = $request->input('waiter');
        }

        $table->saveOrFail();

        return redirect('tables');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
