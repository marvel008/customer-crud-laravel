<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class CustomerController extends Controller
{

    public function index(Request $request)
    {
        $customers=Customer::when($request->has('search'), function($query) use ($request) {
            $query->where('first_name','like',"%$request->search%")
            ->orWhere('last_name','like',"%$request->search%")
            ->orWhere('email','like',"%$request->search%")
            ->orWhere('phone','like',"%$request->search%")
            ->orWhere('bank_account_number','like',"%$request->search%");
        })
        ->orderBy('id',$request->has('order') && $request->order == 'asc' ? 'ASC' : 'DESC')->get();

        return view('customer.index',compact('customers'));
    }


    public function create()
    {
        return view('customer.create');
    }


    public function store(StoreRequest $request)
    {
        $customer = new Customer();

        if($request->hasFile('image')){
            $imgaeFile=$request->file('image');
           $filePath=$imgaeFile->store('','public');
            $imagePath='/uploads/'.$filePath;
            $customer->image=$imagePath;
        }
        $customer->first_name=$request->first_name;
        $customer->last_name=$request->last_name;
        $customer->email=$request->email;
        $customer->phone=$request->phone;
        $customer->bank_account_number=$request->bank_account_number;
        $customer->about=$request->about;
        $customer->save();



        return \redirect()->route('customer.index');
    }


    public function show(string $id)
    {
        $customer=Customer::findOrFail($id);
        return view('customer.show',compact('customer'));
    }


    public function edit(string $id)
    {
        $customer=Customer::findOrFail($id);
        return \view('customer.edit',compact('customer'));
    }


    public function update(StoreRequest $request, string $id)
    {
        $customer=Customer::findOrFail($id);

        if($request->hasFile('image')){
            File::delete(public_path($customer->image));
            $imgaeFile=$request->file('image');
           $filePath=$imgaeFile->store('','public');
            $imagePath='/uploads/'.$filePath;
            $customer->image=$imagePath;
        }

        $dataTOUpdate=[
            'first_name'=>$request->filled('first_name') ? $request->first_name : $customer->first_name,
            'last_name'=>$request->filled('last_name') ? $request->last_name : $customer->last_name,
            'phone'=>$request->filled('phone') ? $request->phone : $customer->phone,
            'email'=>$request->filled('email') ? $request->email : $customer->email,
            'bank_account_number'=>$request->filled('bank_account_number') ? $request->bank_account_number : $customer->bank_account_number,
            'about'=>$request->filled('about') ? $request->about : $customer->about,
        ];

        $customer->update($dataTOUpdate);

        $customer->save();

        return \redirect()->route('customer.index');
    }


    public function destroy(string $id)
    {
        $customer=Customer::findOrFail($id);

        $customer->delete();

        return \redirect()->route('customer.index');
    }

    public function trashIndex(Request $request){

        $customers=Customer::when($request->has('search'), function($query) use ($request) {
            $query->where('first_name','like',"%$request->search%")
            ->orWhere('last_name','like',"%$request->search%")
            ->orWhere('email','like',"%$request->search%")
            ->orWhere('phone','like',"%$request->search%")
            ->orWhere('bank_account_number','like',"%$request->search%");
        })->orderBy('id',$request->has('order') && $request->order == 'asc' ? 'ASC' : 'DESC')->onlyTrashed()->get();

        return \view('customer.trash',compact('customers'));
    }

    public function restore(string $id){

        $customer=Customer::withTrashed()->findOrFail($id);
        $customer->restore();

        return \redirect()->back();
    }

    public function delete(string $id){
        $customer=Customer::withTrashed()->findOrFail($id);
        File::delete(public_path($customer->image));
        $customer->forceDelete();

        return \redirect()->back();
    }

}
