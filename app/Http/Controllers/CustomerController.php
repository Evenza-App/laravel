<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRequest;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\UserResource;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // // $users = Customer::all();
        // // return response()->json($users);

        // $customers = Customer::paginate();
        // return CustomerResource::collection($customers);

        //  $customers = Customer::get();
        $user = $request->user();
        $customer = $user->customer;

        return ProfileResource::make($customer);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $user = $request->user();
        $customer = $user->customer;
        //return $customer;
        $customer->load('user');
        return ProfileResource::make($customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request)
    {
        $user = $request->user();
        $user->update($request->only(['email', 'password']));
        //$data = $request->validated() + ['user_id' => auth()->id()];
        $data = $request->except(['email', 'password']);
        // $data = $request->email;
        $user->customer->update($data);
        ////  $user->update($data);
        return ProfileResource::make($user->customer);
    }
    // public function update(UpdateRequest $request, $id)
    // {
    //     $user = User::find($id);
    //     $customer = Customer::find($id);

    //     if ($user) {
    //         $user->email = $request->input('email');
    //         // $user->name = $request->input('name');
    //         $user->save();
    //     }

    //     if ($customer) {
    //         //  $customer->email = $request->input('email');
    //         $customer->name = $request->input('name');
    //         $customer->address = $request->input('address');
    //         $customer->phone = $request->input('phone');
    //         $customer->save();
    //     }

    //     return response()->json(['message' => 'Profile updated successfully']);
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
