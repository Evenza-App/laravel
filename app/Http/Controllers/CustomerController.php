<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateRequest;
use App\Http\Resources\GetAllProfileResource;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // // $users = Customer::all();

        // // return response()->json($users);

        // $customers = Customer::paginate();

        // return CustomerResource::collection($customers);

        $customers = Customer::get();

        return GetAllProfileResource::collection($customers);
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
    public function show(Customer $customer)
    {
        //return $customer;
        $customer->load('user');
        return GetAllProfileResource::make($customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Customer $customer)
    {
        $data = $request->validated() + ['user_id' => auth()->id()];
        //$data = $request->validated();
        $customer->update($data);
        return $customer;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
