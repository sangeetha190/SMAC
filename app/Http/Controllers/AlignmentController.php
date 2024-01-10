<?php

namespace App\Http\Controllers;

use App\Models\Alignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AlignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allCategory = Alignment::all();
        return view('admin-dashboard.product-management.alignment.all-alignment', compact('allCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-dashboard.product-management.alignment.create-alignment');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:alignments,name',
        ]);
        $data = [
            'name' => $request['name'],
            'status' => $request['status'],
            'created_by' => Auth::user()->first_name . ' ' . Auth::user()->last_name,
        ];
        $slug = Str::slug($request['name']);
        $data['slug'] = $slug;
        // dd($data);
        Alignment::create($data);
        return redirect()->route('alignment.index')
            ->with('success', 'Alignment created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alignment $alignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alignment $alignment)
    {
        // dd($productCategory);
        return view('admin-dashboard.product-management.alignment.edit-alignment', compact('alignment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alignment $alignment)
    {
        $this->validate($request, [
            'name' => 'required',
            // 'permission' => 'required',
        ]);

        $update_data = [
            'name' => $request['name'],
            'status' => $request['status'],
            'created_by' => Auth::user()->first_name . ' ' . Auth::user()->last_name,
        ];
        $slug = Str::slug($request['name']);
        $update_data['slug'] = $slug;
        // $update_data=ModelsPermission::find($id);
        $alignment->update($update_data);



        return redirect()->route('alignment.index')
            ->with('success', 'Alignment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alignment $alignment)
    {
        $alignment->delete();
        return redirect()->route('alignment.index')
            ->with('danger', 'Alignment deleted successfully');
    }
}
