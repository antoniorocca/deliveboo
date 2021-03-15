<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Dish;
use App\User;
use App\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = $request->user()->id;
        $restaurant = User::find($user_id)->restaurant;
        $dishes = $restaurant->dishes;




        return view('users.dish.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.dish.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['slug'] = Str::slug($request->name);
        
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'img' => 'nullable | mimes:jpg,png,jpeg | max:500',
            'description' => 'nullable | max:500',
            'price' => 'required | max:5',
            'discount' => 'nullable',
            'rating' => 'nullable',
            'menu_class' => 'nullable',
            'discount_id' => 'nullable'

        ]);
        if ($request->img) {
            $img = Storage::disk('public')->put('img_restaurants', $request->img);
            $validatedData['img'] = $img;
        }
        Dish::create($validatedData);
        $dish = Dish::orderBy('id', 'desc')->first();
        $user_id = $request->user()->id;
        $restaurant = User::find($user_id)->restaurant;
        $dish->restaurant_id = $restaurant->id;
        $dish->save();
        return redirect()->route('user.dish.show', compact('dish'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view('users.dish.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        return view('users.dish.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'img' => 'nullable | image | max:500',
            'description' => 'nullable | max:500',
            'price' => 'required | max:5',
            'discount' => 'nullable',
            'menu_class' => 'nullable'

        ]);
        if ($request->img) {
            Storage::delete($dish->img);
            $img = Storage::disk('public')->put('img_restaurants', $request->img);
            $validatedData['img'] = $img;
        }
        $dish->update($validatedData);

        return redirect()->route('user.dish.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route('user.dish.index');
    }
}
