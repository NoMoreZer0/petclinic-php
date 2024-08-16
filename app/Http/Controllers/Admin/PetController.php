<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PetStoreRequest;
use App\Models\Owner;
use App\Models\Pet;
use App\Models\Type;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = Pet::all();
        return view('pets.index', compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all()->pluck('name')->toArray();
        $owners = Owner::all();
        return view('pets.create', compact(['types', 'owners']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PetStoreRequest $request)
    {
        $owner = Owner::query()
            ->whereRaw("CONCAT(`first_name`, ' ', `last_name`) LIKE '%{$request->get('owner')}%'")
            ->first();
        $type = Type::find($request->get('type') + 1);
        if ($owner == null) {
            return back()->withErrors('There is no such owner');
        }
        if ($type == null) {
            return back()->withErrors('There is no such type');
        }
        $pet = new Pet([
            'owner_id' => $owner->id,
            'type_id' => $request->get('type') + 1,
            'name' => $request->get('name'),
            'birth_date' => $request->get('birth_date')
        ]);
        $pet->save();
        return redirect()->route('admin.pet.index')->with('success', 'Pet created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
