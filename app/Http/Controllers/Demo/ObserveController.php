<?php

namespace App\Http\Controllers\Demo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Demo\Observe as observeModel;
use App\Observers\Demo\Observe as Observer;

class ObserveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        observeModel::observe(Observer::class);
        $randNum = mt_rand(1, 1000);
        $title = 'Title'.$randNum;
        observeModel::create([
            'title' => $title
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        observeModel::observe(Observer::class);
        $randNum = mt_rand(1, 1000);
        $title = 'Title'.$randNum;

        // update scheme 1
        /*$observe_model = new observeModel;
        $observe_model->update([
            'id' => $id,
            'title' => $title
        ]);*/

        // update scheme 2
        // may trigger observers
        /*$observe = observeModel::find($id);
        $observe->title = $title;
        $observe->save();*/

        // update scheme 3
        /*observeModel::where('id', $id)->update([
            'title' => $title
        ]);*/

        // update scheme 4
        /*observeModel::where('id', $id)->first()->update([
            'title' => $title
        ]);*/

        // update scheme 5
        /*observeModel::where('id', $id)->get()->update([
            'title' => $title
        ]);*/

        // update scheme 6
        $observe = observeModel::find($id)->update([
            'title' => $title
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
