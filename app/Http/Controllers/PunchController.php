<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PunchRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Punch;
use App\Models\Pic;
use App\Models\Product;
use App\Models\Material;
use App\Models\Machine;

class PunchController extends Controller
{
    /**
     * Return the list of punches (.list method)
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Punch::with(['pics','products','materials','machines'])->get();
    }

    /**
     * Create new punch (.add method)
     *
     * @param  App\Http\Requests\PunchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PunchRequest $request)
    {
        $validatedRequest = $request->validated();

        $punch = Punch::create([
            'name' => $validatedRequest['name'],
            'ordernum' => $validatedRequest['ordernum'],
            'year' => $validatedRequest['year'],
            'size_length' => $validatedRequest['size-length'],
            'size_width' => $validatedRequest['size-width'],
            'size_height' => $validatedRequest['size-height'],
            'knife_size_length' => $validatedRequest['knife-size-length'],
            'knife_size_width' => $validatedRequest['knife-size-width'],
        ]);

        $products = Product::find($validatedRequest['products']);
        if ($products) {
            $punch->products()->attach($products);
        };

        $materials = Material::find($validatedRequest['materials']);
        if ($materials) {
            $punch->materials()->attach($materials);
        };

        $machines = Machine::find($validatedRequest['machines']);
        if ($machines) {
            $punch->machines()->attach($machines);
        };

        foreach($request->pics as $pic) {
            $file = $pic;
            $upload_folder = 'public/img';
            $path = Storage::putFile($upload_folder, $file);
            $punch->pics()->create([
                'value' => $path
            ]);
        };
        return redirect('/');
    }

    /**
     * Return one punch by id (.get method)
     *
     * @param  App\Http\Requests\PunchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function show(PunchRequest $request)
    {
        $data = $request->validated();
        return Punch::with(['pics','products','materials','machines'])->where('id', $data['id'])->get();
    }

    /**
     * Update punch (.update method)
     *
     * @param  App\Http\Requests\PunchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(PunchRequest $request)
    {
        $data = $request->validated();
        $id = $data['id'];
        unset($data['id']);
        $result = Punch::where('id', $id)->update($data);
        return ['result' => (bool)$result];
    }

    /**
     * Delete punch (.delete method)
     *
     * @param App\Http\Requests\PunchRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(PunchRequest $request)
    {
        $data = $request->validated();
        $punch = Punch::find($data['id']);
        if ($punch) {
            $result = $punch->delete();
        } else {
            return ['result' => (bool)$punch];
        }
        return ['result' => (bool)$result];
    }
}
