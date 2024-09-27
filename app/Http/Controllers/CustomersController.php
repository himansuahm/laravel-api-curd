<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::latest()->paginate(10);
        return [
            "status" => 1,
            "data" => $customers
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'date_of_birth' => 'date_format:Y-m-d',
        ]);
        $customer = Customer::create($request->all());
        return [
            "status" => 1,
            "data" => $customer
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return [
            "status" => 1,
            "data" =>$customer
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'date_of_birth' => 'date_format:Y-m-d',
        ]);
        $customer->update($request->all());
        return [
            "status" => 1,
            "data" => $customer,
            "msg" => "Customer updated successfully"
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return [
            "status" => 1,
            "data" => $customer,
            "msg" => "Customer deleted successfully"
        ];
    }
}
