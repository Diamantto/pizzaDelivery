<?php

namespace App\Http\Controllers;

use App\Models\AddressModel;
use App\Models\IngModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class EndPointController extends Controller
{
    public function getAdd()
    {
        return AddressModel::all()->toJson();
    }

    public function getIng()
    {
        return IngModel::all()->toJson();
    }

    public function getItem()
    {
        return ProductModel::all()->toJson();
    }
}
