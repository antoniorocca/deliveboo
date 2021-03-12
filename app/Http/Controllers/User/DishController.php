<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Dish;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('users.dish.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.dish.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'img' => 'nullable | image | max:500',
            'description' => 'required',
            'price' => 'required',
            'discount' => 'nullable',
            'rating' => 'required',
            'menu_class' => 'required'

        ]);
        if ($request->img) {
            $img = Storage::disk('public')->put('img_restaurants', $request->img);
            $validatedData['img'] = $img;
        }
        Dish::create($validatedData);
        $new_dish = Dish::orderBy('id', 'desc')->first();
  
        return redirect()->route('user.dish.index', $new_dish);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view('user.dish.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        return view('user.dish.edit', compact('dish'));
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
            'description' => 'required',
            'price' => 'required',
            'discount' => 'nullable',
            'rating' => 'required',
            'menu_class' => 'required'

        ]);
        if ($request->img) {
            Storage::delete($dish->img);
            $img = Storage::disk('public')->put('img_restaurants', $request->img);
            $validatedData['img'] = $img;
        }
        $dish->update($validatedData);

        return redirect()->route('user.dish.index', $dish);
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
