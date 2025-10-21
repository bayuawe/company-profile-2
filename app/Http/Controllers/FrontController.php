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

        $testimonials = \App\Models\Testimonial::latest('time')->take(6)->get();
        $settings = Setting::getSiteSettings();

        return view('front.index', compact('featuredProducts', 'categories', 'testimonials', 'settings'));
    }

    public function products(Request $request)
    {
        $query = Product::with(['category', 'media'])
            ->where('is_active', true);

        // Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Filter by price range
        if ($request->filled('price_min') && is_numeric($request->price_min)) {
            $query->where('price', '>=', (float) $request->price_min);
        }

        if ($request->filled('price_max') && is_numeric($request->price_max)) {
            $query->where('price', '<=', (float) $request->price_max);
        }

        // Sorting
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
        $settings = Setting::getSiteSettings();

        return view('front.products', compact('products', 'categories', 'settings'));
    }

    public function about()
    {
        $categories = Category::all();
        $settings = Setting::getSiteSettings();
        $testimonials = \App\Models\Testimonial::latest('time')->take(6)->get();

        return view('front.about', compact('categories', 'settings', 'testimonials'));
    }

    public function contact()
    {
        $categories = Category::all();
        $settings = Setting::getSiteSettings();

        return view('front.contact', compact('categories', 'settings'));
    }

    public function productDetail($slug)
    {
        $categories = Category::all();
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

        return view('front.product-detail', compact('product', 'relatedProducts', 'categories', 'settings'));
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

    public function sitemap()
    {
        $categories = Category::all();
        $products = Product::where('is_active', true)->get();
        $settings = Setting::getSiteSettings();

        return view('front.sitemap', compact('categories', 'products', 'settings'));
    }

    public function sitemapXml()
    {
        $categories = Category::all();
        $products = Product::where('is_active', true)->get();
        $settings = Setting::getSiteSettings();

        return response()->view('front.sitemap-xml', compact('categories', 'products', 'settings'))
            ->header('Content-Type', 'application/xml');
    }
}
