<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('id', 'name', 'email', 'role')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('users.edit', $row->id);
                    $btn = '<button onclick="editUser(' . $row->id . ')" class="btn btn-success btn-sm">Edit</button> ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.index');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|in:admin,user',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }
    // UserController.php
    public function editProfile()
    {
        $user = Auth::user(); // Get the authenticated user
        return view('admin.edit', compact('user'));
    }

    public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return response()->json(['success' => 'User deleted successfully']);
}

}
