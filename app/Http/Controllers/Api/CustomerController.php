<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerFormRequest;

use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\Customer;
use App\Models\Catalogs\IdentityDocumentType;
use App\Models\Catalogs\Country;
use App\Models\Catalogs\Department;
use App\Models\Catalogs\Province;
use App\Models\Catalogs\District;

class CustomerController extends Controller
{


    public function index()
    {
        $identityDocumentTypes = IdentityDocumentType::WhereActive()->orderByDescription()->get();
        $countries = Country::WhereActive()->orderByDescription()->get();
        $departments = Department::WhereActive()->orderByDescription()->get();
        $provinces = Province::WhereActive()->orderByDescription()->get();
        $districts = District::WhereActive()->orderByDescription()->get();

        return response()->json([
            'identityDocumentTypes' => $identityDocumentTypes,
            'countries'             => $countries,
            'deparments'            => $departments,
            'provinces'             => $provinces,
            'districts'             => $districts,
        ], 201);
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Customer $customer)
    {
        //$ss=Customer::Where('id',$id)->first();//;
        dd(compact('customer'));
    }

    
    public function update(Request $request, Post $post)
    {
        //
    }

    
    public function destroy(Post $post)
    {
        //
    }
}
