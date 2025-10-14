<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Message;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index()
    {
        $featuredProducts = Product::with('category')
            ->where('featured', true)
            ->latest()
            ->take(4)
            ->get();

        $categories = Category::withCount('products')
            ->take(4)
            ->get();

        return view('front.index', compact('featuredProducts', 'categories'));
    }

    public function products(Request $request)
    {
        $query = Product::with(['category', 'media'])->where('is_active', true);

        // Filter by category
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        // Filter by price range
        if ($request->has('price_min')) {
            $query->where('price', '>=', $request->price_min);
        }
        if ($request->has('price_max')) {
            $query->where('price', '<=', $request->price_max);
        }

        // Sort products
        $sort = $request->get('sort', 'latest');
        switch ($sort) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            default:
                $query->latest();
                break;
        }

        $products = $query->paginate(12)->withQueryString();
        $categories = Category::withCount('products')->get();

        return view('front.products', compact('products', 'categories'));
    }

    public function about()
    {
        return view('front.about');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function productDetail($slug)
    {
        $product = Product::with(['category', 'media'])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // Get related products from same category
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->take(4)
            ->get();

        $settings = Setting::getSiteSettings();
        $settings->phone = preg_replace('/[^0-9]/', '', $settings->phone);
        if (str_starts_with($settings->phone, '0')) {
            $settings->phone = '62' . substr($settings->phone, 1);
        }

        return view('front.product-detail', compact('product', 'relatedProducts', 'settings'));
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Simpan pesan ke database
        Message::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'message' => $validated['message'],
        ]);

        return back()->with('success', 'Thank you for your message. We will get back to you soon.');
    }
}
