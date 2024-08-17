<?php

namespace App\Http\Controllers\V1;

use App\Filters\V1\NasabahFilters;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreNasabahRequests;
use App\Http\Requests\V1\UpdateNasabahRequests;
use App\Http\Resources\NasabahCollection;
use App\Http\Resources\NasabahResource;
use App\Models\Nasabah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NasabahAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterItems = (new NasabahFilters())->transform($request);

        if ($filterItems == 0) {
            return new NasabahCollection(Nasabah::paginate());
        } else {
            return new NasabahCollection(Nasabah::where($filterItems)->paginate());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNasabahRequests $request)
    {
//        dd($request->all());
        return new NasabahResource(Nasabah::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $nasabah = Nasabah::findOrFail($id);
        return $nasabah;
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
    public function update(UpdateNasabahRequests $request, Nasabah $nasabah)
    {
//        dd($request->all());
        Log::info('before update', ['nasabah' => $nasabah->toArray()]);
        $nasabah->update($request->all());
        Log::info('after update', ['data' => $nasabah->toArray()]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
