<?php

namespace App\Http\Controllers\User;
use App\Restaurant;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->user()->name);
        $user_id = $request->user()->id;
        //->request->get('parameters')
        $restaurant = User::find($user_id)->restaurant;
        // dd($restaurant->id);

        return view('users.restaurant.index', compact('restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
       
        $user_id = $request->user()->id;
        
        $restaurant = User::find($user_id)->restaurant;
        
        return view('users.restaurant.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'phone_number' => 'nullable',
            'img' => 'nullable | image | max:500',
            'description' => 'nullable | max:500',
            'location' => 'nullable',
            'opening_time' => 'nullable',
            'closure_time' => 'nullable',
            'free_shipping' => 'nullable',
            'price_shipping' => 'nullable'
        ]);
        $restaurant = Restaurant::find($id);
        if ($request->img) {
            Storage::delete($restaurant->img);
            $img = Storage::disk('public')->put('img_restaurants', $request->img);
            $validatedData['img'] = $img;
        }
        $restaurant->update($validatedData);

        return redirect()->route('user.restaurant.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
