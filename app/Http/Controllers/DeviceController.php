<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use Illuminate\Support\Facades\Validator;


class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Device::all();
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
        $rules = array(
            "name" => "required",
            "user_id" => "required | max:4"
        );
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return $validator->errors();
        } 

        else {
            $user = new Device;
            $user->name = $request->name;
            $user->user_id = $request->user_id;
            $user->member_id = 'member_4';

            $user->save();
            if ($user) {
                return "data added";
            } else {
                return 'failed to add';
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Device::where('id', $id)->first();
        if ($user) {
            return $user;
        } else {
            return 'not found';
        }
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

    public function search($name)
    {
        // $user = Device::where('name', $name)->get();
        $user = Device::where('name', 'like', '%' . $name . '%')->get();

        if ($user) {

            return $user;
        } else {
            return 'not found';
        }
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
        $user = Device::where('id', $id);
        $user->name = $request->name;
        $user->member_id = $request->member_id;
        $user->save();
        return 'updated successfully';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Device::where('id', $id);
        $user->delete();
        return 'deleted successfully';
    }
}
