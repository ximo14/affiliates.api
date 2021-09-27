<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use Illuminate\Http\Request;

class AffiliateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json('store' );
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        return response()->json(['uuid' => $uuid]);
    }

}
