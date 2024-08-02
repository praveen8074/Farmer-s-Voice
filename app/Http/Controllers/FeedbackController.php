<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'farm_size' => 'required|numeric|min:0',
            'crop_type' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        Feedback::create($validated);  
        return redirect()->back()->with('success', 'Thank you for your feedback!');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Feedback::query();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        return view('feedback.index');
    }
    
}
