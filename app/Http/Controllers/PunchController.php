<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePunchRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Punch;
use App\Models\Pic;
use App\Models\Product;
use App\Models\Material;
use App\Models\Machine;

class PunchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->filter;
        if ($filter) {
            return [$filter, Punch::with(['pics','products','materials','machines'])->where($filter)->get()];
        } else {
            return [$filter, Punch::with(['pics','products','materials','machines'])->get()];
        }        
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
    public function store(StorePunchRequest $request)
    {

        $validatedRequest = $request->validated();

        $punch = Punch::create([
            'name' => $validatedRequest['title'],
            'ordernum' => $request->input('ordernum'),
            'year' => $request->input('year'),
            'size_length' => $validatedRequest['size-length'],
            'size_width' => $validatedRequest['size-width'],
            'size_height' => $request->input('size-height'),
            'knife_size_length' => $request->input('knife-size-length'),
            'knife_size_width' => $request->input('knife-size-width'),
        ]);

        $products = Product::find($request->products);
        $punch->products()->attach($products);

        $materials = Material::find($request->materials);
        $punch->materials()->attach($materials);

        $machines = Machine::find($request->machines);
        $punch->machines()->attach($machines);

        foreach($request->pics as $pic) {
            $file = $pic;
            $upload_folder = 'public/img';
            $path = Storage::putFile($upload_folder, $file);
            $punch->pics()->create([
                'value' => $path
            ]);
        };

        return redirect('/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return Punch::with(['pics','products','materials','machines'])->where('id', $request->id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Punch::with(['pics','products','materials','machines'])->where('id', $request->id)->delete();
        return redirect('/');
    }
}
