<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Services\ProjectService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{

    protected ProjectService $service;

    public function __construct(ProjectService $service)
    {
        $this->service = $service;
        // $this->middleware('permission:projectList', ['only' => 'index']);
        // $this->middleware('permission:projectCreate', ['only' => ['store']]);
        // $this->middleware('permission:projectedit', ['only' => ['update']]);
        // $this->middleware('permission:projectdelete', ['only' => 'destroy']);
        // $this->middleware('permission:projectshow', ['only' => 'show']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(ProjectRequest $request)
    {
        try {

            $startTime = microtime(true);

            $validatedData = $request->validated();

            $data = $this->service->storeProject($validatedData);

            return response()->success($request, $data, 'Project Created Successfully.', 201, $startTime, 1);
        } catch (Exception $e) {
            return response()->error($request, null, $e->getMessage(), 500, $startTime);
        }
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
        //
    }
}
