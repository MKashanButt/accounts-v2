<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExpenseRequest;
use App\Models\Expense;
use App\Models\Head;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function index()
    {
        $heads = Head::all();
        $finance = Expense::selectRaw('head_id, SUM(CASE WHEN type = "debit" THEN amount ELSE 0 END) as debit, 
                                      SUM(CASE WHEN type = "credit" THEN amount ELSE 0 END) as credit,
                                      SUM(CASE WHEN type = "debit" THEN amount ELSE -amount END) as balance')
            ->groupBy('head_id')
            ->with('head')
            ->get();
        return view('finance', compact('finance', 'heads'));
    }

    public function head(string $name)
    {
        $heads = Head::all();
        if ($name != 'all') {
            $head = Head::where('name', $name)->first();
            $finance = Expense::with('head')
                ->where('head_id', $head->id)
                ->get();

            $view = 'view';
        } else {
            $finance = Expense::selectRaw('head_id, SUM(CASE WHEN type = "debit" THEN amount ELSE 0 END) as debit, 
                                      SUM(CASE WHEN type = "credit" THEN amount ELSE 0 END) as credit,
                                      SUM(CASE WHEN type = "debit" THEN amount ELSE -amount END) as balance')
                ->groupBy('head_id')
                ->with('head')
                ->get();
            $view = 'finance';
        }
        return view($view, compact('finance', 'heads'));
    }

    public function create(string $name)
    {
        $head = Head::where('name', $name)->first();
        return view('create', compact('head'));
    }

    public function store(StoreExpenseRequest $request)
    {
        $validated = $request->validated();
        $head_id = Head::where('name', $validated['head'])->first();

        $data = [
            'date' => $validated['date'],
            'description' => $validated['description'],
            'type' => $request->input('debit') ? 'debit' : 'credit',
            'amount' => $request->input('debit') ?: $request->input('credit'),
            'head_id' => $head_id->id,
        ];

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads', 'public');
            $data['file'] = $filePath;
        }

        Expense::create($data);

        return redirect()->back()->with('success', 'Expense created successfully.');
    }
}
