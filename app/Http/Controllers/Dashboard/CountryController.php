<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\City;

class CountryController extends Controller
{
    public function getCities($countryId)
    {
        // Fetch cities based on the selected country
        $cities = City::where('country_id', $countryId)->pluck('name', 'id');

        // Return the cities as JSON response
//        dd($countryId);
        return response()->json($cities);
    }
}
