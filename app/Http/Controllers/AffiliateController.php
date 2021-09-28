<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAffiliateRequest;
use App\Models\Affiliate;
use Illuminate\Http\Request;

class AffiliateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $affiliates = Affiliate::all();
        if ($affiliates->isEmpty())
        {
            return response()->json(['error' => 'no data'], 402);
        }

        return response()->json(['affiliates' => $affiliates], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateAffiliateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateAffiliateRequest $request)
    {
        $requestData = $request->only('name', 'surname', 'email');

        $affiliate = Affiliate::where('email', $requestData['email'])->first();
        if ($affiliate) {
            return response()->json(['error' => 'affiliate with this email already exists'], 400);
        }

        $affiliate = Affiliate::create($requestData);
        $id = $affiliate->id;

        return response()->json(['uuid' => $id] );
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($uuid)
    {
        $affiliate = Affiliate::where('id', $uuid)->first();

        if (!$affiliate)
        {
            return response()->json(['error' => 'affiliate not found'], 402);
        }

        return response()->json(['affiliate' => $affiliate]);
    }

}
