<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Services\SubscribeService;
use App\Http\Controllers\Controller;

class SubscribeController extends Controller
{

    protected SubscribeService $SubscribeService;

    public function __construct(SubscribeService $SubscribeService)
    {
        $this->SubscribeService =$SubscribeService;

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
        //
    }
}
