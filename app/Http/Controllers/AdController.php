<?php

namespace App\Http\Controllers;

use App\Ad;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $ads = Ad::all();
        return response()->json($ads);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'picture' => 'required',
            'date' => 'required',
        ]);

        $ad = Ad::create($request->all());

        return response()->json([
            'message' => 'Great success! New advertisement created',
            'ad' => $ad
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Ad $ad
     * @return Response
     */
    public function show(Ad $ad)
    {
        return response()->json($ad);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Ad $ad
     * @return Response
     */
    public function update(Request $request, Ad $ad)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'picture' => 'required',
            'date' => 'required',
        ]);

        $ad->update($request->all());

        return response()->json([
            'message' => 'Great success! advertisement updated',
            'ad' => $ad
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Ad $ad
     * @return Response
     * @throws Exception
     */
    public function destroy(Ad $ad)
    {
        $ad->delete();

        return response()->json([
            'message' => 'Successfully deleted an advertisement!'
        ]);
    }
}
