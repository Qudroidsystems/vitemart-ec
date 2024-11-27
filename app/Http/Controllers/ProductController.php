<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Unit;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Variation;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            $categories = Category::all();
            $tags = Tag::all(['id', 'name']); // Fetch both ID and name
            $stores = Warehouse::all();
            $units = Unit::all();
            $kt_ecommerce_add_product_options = Variation::all();
            $brands = Brand::all();

            return view('product.add', compact('categories', 'tags', 'stores', 'units', 'kt_ecommerce_add_product_options', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

            // dd($request);

            // Validate the request data

            // Validate request data
        $validatedData = $request->validate(
            [
                'product_name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'thumbnail' =>  'required|file|mimes:jpg,jpeg,png|max:2048', // Max file size is 2MB
                'status' => 'required|string',
                'meta_tag_title' => 'nullable|string|max:255',
                'meta_tag_name' => 'nullable|string|max:255',
                'meta_tag_description' => 'nullable|string',
                'meta_tag_keywords' => 'nullable|string|max:255',
                'category' => 'required', // Single category ID
                'selected_tag_ids' => 'nullable|string', // JSON string of tag IDs
                'brand' => 'required',
                'unit' => 'required|string',
                'kt_ecommerce_add_product_options' => 'nullable|array',
                'kt_ecommerce_add_product_options.*.discounttype' => 'required|in:nodiscount,percentage,fixed',
                'kt_ecommerce_add_product_options.*.percentage' => 'nullable|numeric|min:0|required_if:kt_ecommerce_add_product_options.*.discounttype,percentage',
                'kt_ecommerce_add_product_options.*.fixed' => 'nullable|numeric|min:0|required_if:kt_ecommerce_add_product_options.*.discounttype,fixed',
                'kt_ecommerce_add_product_options' => 'nullable|array',
                'kt_ecommerce_add_product_options.*.sku' => 'required|string|unique:product_variant,sku|max:255',
                'kt_ecommerce_add_product_options.*.vat_amount' => 'nullable|numeric|min:0|max:100',
                'kt_ecommerce_add_product_options.*.tax' => 'nullable|numeric|min:0|max:100',
                'kt_ecommerce_add_product_options.*.stock' => 'required|integer|min:0',
                'kt_ecommerce_add_product_options.*.stock_alert' => 'nullable|integer|min:0',
                'kt_ecommerce_add_product_options.*.barcode' => 'nullable|string|max:255',
                'kt_ecommerce_add_product_options.*.price' => 'required|numeric|min:0',
                'kt_ecommerce_add_product_options.*.discount_type' => 'nullable|in:percentage,fixed',
                'kt_ecommerce_add_product_options.*.discount_value' => 'nullable|numeric|min:0',
                'kt_ecommerce_add_product_options.*.manufacture' => 'nullable|string',
                'kt_ecommerce_add_product_options.*.expiry' => 'nullable|string',
                'warehouse' => 'nullable|exists:warehouses,id', // Single warehouse ID
            ],
            [
                // Custom error messages
                'name.required' => 'The product name is required.',
                'category_id.required' => 'A category is required.',
                'brand.required' => 'A brand must be selected.',
                'unit.required' => 'A unit must be selected.',
                'quantity.required' => 'Quantity is required for the product unit.',
                'kt_ecommerce_add_product_options.*.sku.unique' => 'Each variant SKU must be unique.',
                'warehouse.required' => 'The  warehouse or store must be selected.',
            ],
            [
                // Custom attribute names
                'product_name' => 'Product Name',
                'meta_tag_description' => 'Meta Tag Description',
                'kt_ecommerce_add_product_options' => 'Product Options',
                'kt_ecommerce_add_product_options.*.discounttype' => 'Discount Type',
                'kt_ecommerce_add_product_options.*.percentage' => 'Discount Percentage',
                'kt_ecommerce_add_product_options.*.fixed' => 'Fixed Discount Value',
            ]
        );

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            // Store the file using Laravel's storage system
            $path = $file->storeAs('uploads', uniqid().'.'.$file->getClientOriginalExtension(), 'public');


            // Save file metadata in the uploads table
            $upload = Upload::create([
                'path' => $path,
                'filename' => $file->getClientOriginalName(),
                'mime_type' => $file->getMimeType(),
                'size' => $file->getSize(),
            ]);

            if (! $upload) {
                return response()->json(['error' => 'Failed to save upload'], 500);
            }

            // Store the product
        $product = Product::create([
            'name' => $validatedData['product_name'],
            'description' => $validatedData['description'] ?? null,
            'thumbnail' => $validatedData['thumbnail'] ?? null,
            'status' => $validatedData['status'],
            'meta_tag_title' => $validatedData['meta_tag_title'] ?? null,
            'meta_tag_name' => $validatedData['meta_tag_name'] ?? null,
            'meta_tag_description' => $validatedData['meta_tag_description'] ?? null,
            'meta_tag_keywords' => $validatedData['meta_tag_keywords'] ?? null,
        ]);

        // Attach the single category
        $product->categories()->sync([$validatedData['category']]);

        // Attach tags if provided (parsing JSON string into an array)
        if (!empty($validatedData['tag_ids'])) {
            $tagIds = json_decode($validatedData['selected_tag_ids'], true);
            $product->tags()->sync($tagIds);
        }

        // Attach the brand
        $product->brand()->sync([$validatedData['brand']]);

        // Attach the unit
        $product->units()->create([
            'unit' => $validatedData['unit'],
            // 'quantity' => $validatedData['quantity'],
        ]);

        // Attach variants if provided
        if (!empty($validatedData['kt_ecommerce_add_product_options'])) {
            foreach ($validatedData['kt_ecommerce_add_product_options'] as $variant) {
                $product->variants()->create([
                    'sku' => $variant['sku'],
                    'vat_amount' => $variant['vat_amount'] ?? null,
                    'tax' => $variant['tax'] ?? null,
                    'stock' => $variant['stock'],
                    'stock_alert' => $variant['stock_alert'] ?? null,
                    'barcode' => $variant['barcode'] ?? null,
                    'base_price' => $variant['price'],
                    'discount_type' => $variant['discount_type'] ?? null,
                    'discount_value' => $variant['discount_value'] ?? null,
                    'manufacture' => $variant['manufacture'] ?? null,
                    'expiry' => $variant['expiry'] ?? null,
                ]);
            }
        }

            // Attach warehouse data if provided
            if (!empty($validatedData['warehouse_id'])) {
                $product->warehouses()->create([
                    'warehouse_id' => $validatedData['warehouse_id'],
                    // 'quantity' => $validatedData['warehouse_quantity'],
                ]);
            }



        return response()->json(['message' => 'Product created successfully!', 'product' => $product], 201);
        }

        //return redirect()->back()->with('success', 'Product created successfully!');
      }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
