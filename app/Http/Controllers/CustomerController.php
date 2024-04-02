<?php

namespace App\Http\Controllers;


use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //

    public function index()
    {
        $users = Customer::all();

        return response()->json($users);

        // $customers = Customer::paginate();

        // return CustomerResource::collection($customers);
    }
}
