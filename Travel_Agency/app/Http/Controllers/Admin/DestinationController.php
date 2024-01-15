<?php

namespace App\Http\Controllers\Admin;

use App\Models\Destination; // Pastikan namespace model Destination sudah benar
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\DestinationRequest;



class DestinationController extends Controller
{
    public function index(): View
    {
        $destinations = Destination::get();
        return view('admin.destinations.index', compact('destinations'));
    }


    public function create(): View
    {
        return view('admin.destinations.create');
    }

    public function store(DestinationRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('assets/destinations', 'public');
            $validatedData['image'] = $image;
        }

        Destination::create($validatedData);

        return redirect()->route('admin.destinations.index')->with([
            'message' => 'Successfully created!',
            'alert-type' => 'success'
        ]);
    }

    public function show(Destination $destination): View
    {
        return view('admin.destinations.show', compact('destination'));
    }

    public function edit(Destination $destination): View
    {
        return view('admin.destinations.edit', compact('destination'));
    }

    public function update(DestinationRequest $request, Destination $destination): RedirectResponse
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            File::delete('storage/' . $destination->image);
            $image = $request->file('image')->store('assets/destinations', 'public');
            $validatedData['image'] = $image;
        }

        $destination->update($validatedData);

        return redirect()->route('admin.destinations.index')->with([
            'message' => 'Successfully updated!',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Destination $destination): RedirectResponse
    {
        File::delete('storage/' . $destination->image);
        $destination->delete();

        return back()->with([
            'message' => 'Successfully deleted!',
            'alert-type' => 'danger'
        ]);
    }
}

