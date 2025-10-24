<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Setting;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        $provinces = Province::all();
        $settings = Setting::getSiteSettings();
        $categories = Category::all();
        return view('auth.register', compact('provinces', 'settings', 'categories'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'birthdate' => 'required|date|before:today',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'province' => 'required|exists:provinces,id',
            'city_regency' => 'required|exists:regencies,id',
            'district' => 'required|exists:districts,id',
            'subdistrict' => 'required|exists:villages,id',
        ]);

        $user = User::create([
            'name' => $request->name,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'birthdate' => $request->birthdate,
            'phone' => $request->phone,
            'address' => $request->address,
            'province' => $request->province,
            'city_regency' => $request->city_regency,
            'district' => $request->district,
            'subdistrict' => $request->subdistrict,
        ]);

        Auth::login($user);

        return redirect()->route('index');
    }

    public function getRegencies(Request $request)
    {
        $regencies = Regency::where('province_id', $request->province_id)->get();
        return response()->json($regencies);
    }

    public function getDistricts(Request $request)
    {
        $districts = District::where('regency_id', $request->regency_id)->get();
        return response()->json($districts);
    }

    public function getVillages(Request $request)
    {
        $villages = Village::where('district_id', $request->district_id)->get();
        return response()->json($villages);
    }
}
