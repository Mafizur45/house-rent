<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Models\HouseImage;

class HouseRentController extends Controller
{
    /**
     * Show static rent page
     */
 public function rent(Request $request)
{
    $query = House::query()->where('is_available', true);

    $houses = House::all();

    // Search by keyword (title, area, city)
    if ($request->q) {
        $keyword = $request->q;
        $query->where(function ($q) use ($keyword) {
            $q->where('title', 'like', "%{$keyword}%")
              ->orWhere('area', 'like', "%{$keyword}%")
              ->orWhere('rent', 'like', "%{$keyword}%")
              ->orWhere('month', 'like', "%{$keyword}%")
              ->orWhere('bedrooms', 'like', "%{$keyword}%")
              ->orWhere('city', 'like', "%{$keyword}%");
        });
    }

    $houses = $query->get(); // ✅ Use filtered query

    return view('house.rent', compact('houses'));
}
    /**
     * Show form to create a new house
     */
    public function create()
    {
        return view('house.create');
    }

    /**
     * Store new house
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'title'        => 'required|string|max:255',
        //     'description'  => 'nullable|string',
        //     'rent'         => 'required|numeric|min:0',
        //     'bedrooms'     => 'required|integer|min:1',
        //     'bathrooms'    => 'required|integer|min:1',
        //     'area'         => 'nullable|string|max:255',
        //     'city'         => 'nullable|string|max:255',
        //     'mobile' => 'required|digits:11',
        //     'image_url' => 'nullable|array',
        //     'image_url'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'month'         => 'nullable|string|max:255',
        //     'is_furnished' => 'required|boolean',
        //     'is_available' => 'required|boolean',
        // ]);

        // if ($request->hasFile('image_url')) {
        //     $imagePath = $request->file('image_url')->store('houses', 'public');
        //     $validated['image_url'] = 'storage/' . $imagePath;
        // }

        // House::create($validated);

        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'rent'         => 'required|numeric|min:0',
            'bedrooms'     => 'required|integer|min:1',
            'bathrooms'    => 'required|integer|min:1',
            'area'         => 'nullable|string|max:255',
            'city'         => 'nullable|string|max:255',
            'mobile'       => 'required|digits:11',
            'image_url'    => 'nullable|array',
            'image_url.*'  => 'image|mimes:jpeg,png,jpg,gif|max:2048', // each file
            'month'        => 'nullable|string|max:255',
            'is_furnished' => 'required|boolean',
            'is_available' => 'required|boolean',
]);

$house = House::create($validated); // houses table save

if ($request->hasFile('image_url')) {
    foreach ($request->file('image_url') as $image) {
        $path = $image->store('houses', 'public'); // storage/app/public/houses
        $house->images()->create([
            'image_path' => 'storage/' . $path
        ]);
    }
}
        return redirect()->route('house.rent')->with('success', 'House added successfully!');
    }

    /**
     * List all houses with search functionality
     */
    // public function index(Request $request)
    // {
    //     $query = House::query()->where('is_available', true);

    //     // Search by keyword (title, area, city)
    //     if ($request->q) {
    //         $keyword = $request->q;
    //         $query->where(function($q) use ($keyword) {
    //             $q->where('title', 'like', "%{$keyword}%")
    //               ->orWhere('area', 'like', "%{$keyword}%")
    //               ->orWhere('city', 'like', "%{$keyword}%");
    //         });
    //     }

    //     // Optional filters
    //     if ($request->min_rent) {
    //         $query->where('rent', '>=', $request->min_rent);
    //     }
    //     if ($request->max_rent) {
    //         $query->where('rent', '<=', $request->max_rent);
    //     }
    //     if ($request->bedrooms) {
    //         if ($request->bedrooms == 3) {
    //             $query->where('bedrooms', '>=', 3);
    //         } else {
    //             $query->where('bedrooms', $request->bedrooms);
    //         }
    //     }

    //     // Sorting
    //     if ($request->sort == 'rent_asc') $query->orderBy('rent', 'asc');
    //     elseif ($request->sort == 'rent_desc') $query->orderBy('rent', 'desc');
    //     else $query->latest();

    //     $houses = $query->paginate(12)->withQueryString();

    //     return view('house.rent', compact('houses'));
    // }

    public function show($id)
{
    $house = House::findOrFail($id);
    return view('house.view', compact('house'));
}
}
