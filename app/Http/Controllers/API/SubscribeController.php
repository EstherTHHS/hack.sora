<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Services\SubscribeService;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubscribeRequest;
use Illuminate\Support\Facades\Log;

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
    public function store(SubscribeRequest $request)
    {

            try {

                $startTime = microtime(true);

                // $validatedData = $request->validated();

                $data = $this->SubscribeService->subscribe($request);

                return response()->success($request, $data, 'Subscription Create Successfully.', 201, $startTime, 1);
            } catch (Exception $e) {
                Log::channel('sora_error_log')->error("Subscription  Store Error" . $e->getMessage());
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

    // public function payment(SubscribeRequest $request)
    // {

    //         try {

    //             $startTime = microtime(true);

    //             // $validatedData = $request->validated();

    //             $data = $this->SubscribeService->subscribe($request);

    //             return response()->success($request, $data, 'Subscription Create Successfully.', 201, $startTime, 1);
    //         } catch (Exception $e) {
    //             Log::channel('sora_error_log')->error("Subscription  Store Error" . $e->getMessage());
    //             return response()->error($request, null, $e->getMessage(), 500, $startTime);
    //         }

    // }

}
