<?php

namespace App\Http\Controllers;

use App\Models\AddressModel;
use App\Models\IngModel;
use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class MainController extends Controller
{
    public function landing()
    {
        return view('landing');
    }

    public function delivery()
    {
        return view('delivery', ['data' => ProductModel::all()]);
    }

    public function det($type, $id)
    {
        $count = [
            'pizza' => 21,
            'snack' => 21,
            'salad' => 43,
            'main' => 52,
            'dessert' => 64,
            'drink' => 76
        ];

        if ($id == 1) $prev = null;
        else $prev = ProductModel::query()->where('type', $type)->get()[$id - 2];

        if ($id == ProductModel::query()->where('type', $type)->count("*")) $next = null;
        else $next = ProductModel::query()->where('type', $type)->get()[$id];

        $mas = [];

        for ($i = 0; $i < IngModel::query()->count('*'); $i++) {
            $mas = array_pad($mas, count($mas) + 1, [IngModel::query()->where('id', $i + 1)->get()[0]->weight, IngModel::query()->where('id', $i + 1)->get()[0]->price]);
        }

        $p = ProductModel::query();
        $c = $p->count('*');
        $slides = $p->where('id', rand(1, $c))->orWhere('id', rand(1, $c))->orWhere('id', rand(1, $c))
            ->orWhere('id', rand(1, $c))->orWhere('id', rand(1, $c))->orWhere('id', rand(1, $c))
            ->orWhere('id', rand(1, $c))->orWhere('id', rand(1, $c))->get();


        return view('desc', ['el' => ProductModel::query()->where('type', $type)->get()[$id - 1],
            'prev' => $prev,
            'next' => $next,
            'count' => $count,
            'ing' => IngModel::all(),
            'mas' => $mas,
            'slides' => $slides]);
    }

    public function pizza(Request $request)
    {
        return view('pizza', ['data' => ProductModel::query()->where('type', 'pizza')->get()]);
    }

    public function snack()
    {
        return view('snack', ['data' => ProductModel::query()->where('type', 'snack')->get()]);
    }

    public function salad()
    {
        return view('salad', ['data' => ProductModel::query()->where('type', 'salad')->get()]);
    }

    public function main()
    {
        return view('main', ['data' => ProductModel::query()->where('type', 'main')->get()]);
    }

    public function dessert()
    {
        return view('dessert', ['data' => ProductModel::query()->where('type', 'dessert')->get()]);
    }

    public function drink()
    {
        return view('drink', ['data' => ProductModel::query()->where('type', 'drink')->get()]);
    }

    public function reg()
    {
        return view('reg');
    }

    public function userReg(Request $request)
    {
        $request->validate([
            'pas2' => 'same:pas1'
        ]);

        $email = UserModel::all()->where('email', $request->input('email'));

        if (count($email) !== 0) return redirect()->action([MainController::class, 'reg']);

        UserModel::insert([
            'name' => trim($request->input('name')),
            'surname' => trim($request->input('surname')),
            'email' => trim($request->input('email')),
            'phone' => trim($request->input('phone')),
            'pas' => md5(trim($request->input('pas1'))),
            'street' => trim($request->input('street')),
            'house' => trim($request->input('house')),
            'entrance' => trim($request->input('entrance')),
            'flat' => trim($request->input('flat')),
            'floor' => trim($request->input('floor'))
        ]);

        Cookie::queue('name', mb_strimwidth(trim($request->input('name')), 0, 11, '...'), 60);
        Cookie::queue('id', UserModel::query()->where('email', $request->input('email'))->get()[0]->id, 60);

        return redirect()->action([MainController::class, 'delivery']);
    }

    public function login()
    {
        return view('login');
    }

    public function userLog(Request $request)
    {
        $email = UserModel::query()->where('email', $request->input('email'))
            ->where('pas', md5($request->input('pas')))->get();

        if (count($email) === 0) return redirect()->action([MainController::class, 'login']);
        else {
            Cookie::queue('name', mb_strimwidth($email[0]->name, 0, 11, '...'), 60);
            Cookie::queue('id', $email[0]->id, 60);
            return redirect()->action([MainController::class, 'delivery']);
        }
    }

    public function exit()
    {
        Cookie::queue(Cookie::forget('name'));
        Cookie::queue(Cookie::forget('id'));

        return redirect()->action([MainController::class, 'delivery']);
    }

    public function del(Request $request)
    {
        if ($request->cookie('name') === null) $user = null;
        else $user = UserModel::query()->where('id', $request->cookie('id'))->get()[0];
        return view('del', ['user' => $user]);
    }

    public function createDel(Request $request)
    {
        if (!isset($_COOKIE['order'])) return redirect()->action([MainController::class, 'delivery']);

        if ($request->cookie('id') !== null) {
            $user = UserModel::query()->where('id', $request->cookie('id'))->get()[0];
            $name = $user->name;
            $email = $user->email;
            $phone = $user->phone;
        } else {
            $name = $request->input('name');
            $email = $request->input('email');
            $phone = $request->input('phone');
        }

        $price = 0;
        $data = json_decode($_COOKIE['order']);

        for ($i = 0; $i < $data->count; $i++)
            $price += $data->data[$i]->price * $data->data[$i]->count;


        if ($request->input('del') === 'add') {
            $address = 'Київ, вул. ' . trim($request->input('street')) . ', '
                . trim($request->input('house')) . ', п. '
                . trim($request->input('entrance')) . ', кв. '
                . trim($request->input('flat')) . ', '
                . trim($request->input('floor'));
        } else {
            $address = AddressModel::query()->where('id', $request->input('address'))->get()[0]->addr;
        }

        OrderModel::insert([
            'order' => $_COOKIE['order'],
            'price' => $price,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'delType' => $request->input('del'),
            'address' => $address,
            'payment' => $request->input('opl'),
            'status' => 'formalized',
            'time' => Carbon::now()
        ]);

        setcookie('order', '', time() + 3600, '/');

        return redirect()->action([MainController::class, 'delivery']);
    }


    public function box()
    {
        return view('box');
    }

    public function test(Request $request)
    {
//        setcookie('order', '', time() + 3600, '/');
//        dd();
        return view('temp');
    }
}
