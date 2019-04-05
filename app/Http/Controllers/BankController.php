<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Http\Requests\StoreBank;
use App\Bank;
use App\Http\Filters\BankFilter;

class BankController extends Controller
{
    public function index(BankFilter $filter)
    {
        //dd($request->input('page'));
        $banks = Bank::filter($filter)->paginate();
        return view('banks/index', compact('banks'));
    }
 
    public function show($id)
    {
        $bank=Bank::find($id);
        return view('banks/show', compact('bank'));
    }

    public function create(Request $request)
    {
        return Bank::create($request->all());
    }

    public function edit($id)
    {
        $bank = Bank::findOrFail($id);
        return view('banks/edit', compact('bank'));
    }

    public function update(StoreBank $request, $id)
    {

        $validated = $request->validated();

        $bank = Bank::findOrFail($id);
   
        $bank->update($validated);

        return redirect('/banks')->with('success', 'Bank updated!');
    }

    public function delete(Request $request, $id)
    {
        $article = Bank::findOrFail($id);
        $article->delete();

        return 204;
    }
}
