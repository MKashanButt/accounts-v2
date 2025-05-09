<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHeadRequest;
use App\Models\Head;
use Illuminate\Http\Request;

class HeadController extends Controller
{
    public function create()
    {
        return view('head.create');
    }

    public function store(StoreHeadRequest $request)
    {
        $validated = $request->validated();

        Head::create($validated);

        return redirect()->back()->with('success', 'Head created successfully.');
    }

    public function destroy(Head $head)
    {
        $head->delete();

        return redirect()->route('finance.index')->with('success', 'Head deleted successfully.');
    }
}
