<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
  /**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */

    public function create()
    {
        return view('listings.create');
    }
  public function index(Request $request)
{
    $query = Listing::with('reviews');

    if ($request->filled('city')) {
        $query->where('city', 'LIKE', '%' . $request->city . '%');
    }

    if ($request->filled('type')) {
        $query->where('type', $request->type);
    }

    if ($request->filled('availability')) {
        $query->where('availability', $request->availability);
    }

    if ($request->filled('price')) {
        $query->where('price', '<=', $request->price);
    }

    $listings = $query->get();

    return view('listings.index', compact('listings'));
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $image1 = null;
    $image2 = null;
    $image3 = null;
    $image4 = null;

    if ($request->hasFile('image')) {
        $image1 = time().'_1.'.$request->image->extension();
        $request->image->move(public_path('images'), $image1);
    }

    if ($request->hasFile('image2')) {
        $image2 = time().'_2.'.$request->image2->extension();
        $request->image2->move(public_path('images'), $image2);
    }

    if ($request->hasFile('image3')) {
        $image3 = time().'_3.'.$request->image3->extension();
        $request->image3->move(public_path('images'), $image3);
    }

    if ($request->hasFile('image4')) {
        $image4 = time().'_4.'.$request->image4->extension();
        $request->image4->move(public_path('images'), $image4);
    }

   Listing::create([
    'title' => $request->title,
    'type' => $request->type,
    'description' => $request->description,
    'price' => $request->price,
    'city' => $request->city,
    'address' => $request->address,
    'latitude' => $request->latitude,
'longitude' => $request->longitude,
    'availability' => $request->availability,

    'image' => $image1,
    'image2' => $image2,
    'image3' => $image3,
    'image4' => $image4,

    'wifi' => $request->has('wifi'),
    'parking' => $request->has('parking'),
    'climatisation' => $request->has('climatisation'),
    'television' => $request->has('television'),
    'eau_chaude' => $request->has('eau_chaude'),
    'groupe_electrogene' => $request->has('groupe_electrogene'),
    'securite' => $request->has('securite'),
    'cuisine' => $request->has('cuisine'),

    'user_id' => auth()->id()
]);

    return redirect('/listings');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
  public function myListings()
{
   $listings = Listing::where('user_id', auth()->id())->get();

    return view('listings.my-listings', compact('listings'));
}
   public function edit($id)
{
    $listing = Listing::findOrFail($id);

    return view('listings.edit', compact('listing'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $id)
{
    $listing = Listing::findOrFail($id);

    $listing->update([
        'title' => $request->title,
        'type' => $request->type,
        'description' => $request->description,
        'price' => $request->price,
        'city' => $request->city,
        'address' => $request->address,
        'latitude' => $request->latitude,
'longitude' => $request->longitude,
        'availability' => $request->availability,

        'wifi' => $request->has('wifi'),
        'parking' => $request->has('parking'),
        'climatisation' => $request->has('climatisation'),
        'television' => $request->has('television'),
        'eau_chaude' => $request->has('eau_chaude'),
        'groupe_electrogene' => $request->has('groupe_electrogene'),
        'securite' => $request->has('securite'),
        'cuisine' => $request->has('cuisine'),
    ]);

    return redirect('/my-listings');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
public function show($id)
{
    $listing = Listing::with('reviews')->findOrFail($id);

    $owner = [
        'name' => 'Yoann Kamdem',
        'phone' => '693218744',
        'email' => 'Yoannkamdem862@gmail.com',
        'verified' => true
    ];

    return view('listings.show', compact('listing', 'owner'));
}
}
