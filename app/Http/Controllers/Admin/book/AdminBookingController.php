<?php

namespace App\Http\Controllers\Admin\book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class AdminBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allbookings = Booking::paginate(4);
        if ($allbookings) {
            return response()->json($allbookings);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $searchforbooking = Booking::findorfail($id);
        if ($searchforbooking) {
            return response()->json($searchforbooking);
        }else{
            return response()->json([
                'success' => false,
                'message' => "Booking Not Found",
            ]);
        }
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
        $searchforbooking = Booking::findorfail($id);
        if ($searchforbooking) {
            $searchforbooking->delete();
            return response()->json([
                'success' => true,
                'message' => "Booking Deleted Successfully",
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => "Booking Not Found",
            ]);
        }
    }
}
