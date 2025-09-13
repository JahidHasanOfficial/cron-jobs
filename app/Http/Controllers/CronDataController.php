<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CronData;

class CronDataController extends Controller
{
    // All data show
    public function index()
    {
        $allData = CronData::all();
        return view('cron.index', compact('allData'));
    }

    // Create new data manually
    public function create()
    {
        return view('cron.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        CronData::create([
            'name' => $request->name,
            'created_at' => now(),
        ]);

        return redirect()->route('cron.index')->with('success', 'Data created successfully');
    }

    // Delete data manually
    public function destroy($id)
    {
        $data = CronData::findOrFail($id);
        $data->delete();
        return redirect()->route('cron.index')->with('success', 'Data deleted successfully');
    }
}
