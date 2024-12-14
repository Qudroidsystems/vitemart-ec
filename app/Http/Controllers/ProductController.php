<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Unit;
use App\Models\Brand;
use App\Models\Upload;
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

         // Fetch all products with relevant data like SKU, quantity, price, etc.
        $products = Product::select('id', 'name', 'description','sku', 'stock', 'base_price',  'status')->get();
        return view('product.index', compact('products'));
    }


     /**
     * Search or fetch products based on query or barcode.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        // Validate the input
        $request->validate([
            'query' => 'nullable|string',
            'barcode' => 'nullable|string',
        ]);

        $query = $request->get('query');
        $barcode = $request->get('barcode');

        // Fetch products based on query or barcode, and include the category
        $products = Product::query()
            ->with('categories') // Eager load the related category
            ->when($barcode, function ($query, $barcode) {
                return $query->where('sku', $barcode);
            })
            ->when($query, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('sku', 'like', '%' . $search . '%');
            })
            ->get();


        // Return JSON response
        return response()->json([
            'status' => 'success',
            'data' => $products,
        ]);
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
        // $kt_ecommerce_add_product_options = Variation::with('values')->get(); // Ensure relations are loaded
        $brands = Brand::all();
        $kt_ecommerce_add_product_options = Variation::all();


        return view('product.add', compact('categories', 'tags', 'stores', 'units', 'brands'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request);
        // Validate the incoming request data
        $validatedData = $request->validate([
            'product_name' => 'required|unique:products,name|max:255',
            'description' => 'nullable|string',
            'meta_tag_title' => 'nullable|string|max:255',
            'meta_tag_description' => 'nullable|string',
            'status' => 'required|string|in:published,draft',
            'category' => 'required|exists:categories,id', // Validating category ID
            'unit' => 'required|exists:units,id', // Unit ID should exist in the units table
            'brand' => 'required|exists:brands,id', // Brand ID should exist in the brands table
            'warehouse' => 'required|exists:warehouses,id', // Warehouse ID should exist in the warehouses table
            'sku' => 'required|unique:products,sku|max:255',
            'barcode' => 'nullable|string|max:255',
            'stock' => 'required|integer|min:0',
            'stock_alert' => 'nullable|integer|min:0',
            'price' => 'required|numeric|min:0',
            'tax' => 'nullable|numeric|min:0|max:100',
            'vat_amount' => 'nullable|numeric|min:0|max:100',
            'manufacture' => 'nullable|date',
            'expiry' => 'nullable|date|after_or_equal:manufacture',
            'selected_tag_ids' => 'nullable|json', // Ensure this is a valid JSON string
            'meta_title' => 'nullable|string|max:255', // Meta title is optional
            'kt_ecommerce_add_product_meta_keywords' => 'nullable|string', // Meta keywords are optional
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Image validation for the thumbnail
            'kt_ecommerce_add_product_options' => 'nullable|array',
            'kt_ecommerce_add_product_options.*.discounttype' => 'required|in:nodiscount,percentage,fixed',
            'kt_ecommerce_add_product_options.*.percentage' => 'nullable|numeric|min:0|required_if:kt_ecommerce_add_product_options.*.discounttype,percentage',
            'kt_ecommerce_add_product_options.*.fixed' => 'nullable|numeric|min:0|required_if:kt_ecommerce_add_product_options.*.discounttype,fixed',
        ],
        [
            // Custom error messages
            'product_name.required' => 'The product name is required.',
            'category.required' => 'A category is required.',
            'brand.required' => 'A brand must be selected.',
            'unit.required' => 'A unit must be selected.',
            'warehouse.required' => 'The warehouse or store must be selected.',
            // 'kt_ecommerce_add_product_options.*.sku.unique' => 'Each variant SKU must be unique.',
            // 'kt_ecommerce_add_product_options.*.stock.required' => 'Stock is required for the product option.',
        ],
        [
            // Custom attribute names
            'product_name' => 'Product Name',
            'meta_tag_description' => 'Meta Tag Description',
            'kt_ecommerce_add_product_options' => 'Product Options',
            'kt_ecommerce_add_product_options.*.discounttype' => 'Discount Type',
            'kt_ecommerce_add_product_options.*.percentage' => 'Discount Percentage',
            'kt_ecommerce_add_product_options.*.fixed' => 'Fixed Discount Value',
        ]);

        // Create the product
        $product = new Product();
        $product->name = $validatedData['product_name'];
        $product->description = $validatedData['description'];
        $product->status = $validatedData['status'];
        // $product->category_id = $validatedData['category'];
        $product->sku = $validatedData['sku'];
        $product->barcode = $validatedData['barcode'];
        $product->stock = $validatedData['stock'];
        $product->stock_alert = $validatedData['stock_alert'];
        $product->base_price = $validatedData['price'];
        $product->tax = $validatedData['tax'];
        $product->vat_amount = $validatedData['vat_amount'];
        $product->manufactured = $validatedData['manufacture'];
        $product->expiry = $validatedData['expiry'];
        $product->meta_tag_title = $validatedData['meta_title'];
        $product->meta_tag_description = $validatedData['meta_tag_description'];
        $product->meta_tag_keywords = $validatedData['kt_ecommerce_add_product_meta_keywords'];

        // Handle the thumbnail upload if exists
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');

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



            $product->save();

            if (isset($validatedData['category'])) {
                $product->categories()->sync([$validatedData['category']]); // Sync category
            }

                // Attach related data (tags, brands, units, warehouses) to the product
            if (isset($validatedData['selected_tag_ids'])) {
                // Decode the selected_tag_ids JSON string to an array
                $tagIds = json_decode($validatedData['selected_tag_ids'], true);

                // Check if the decoded data is a valid array
                if (is_array($tagIds)) {
                    $product->tags()->sync($tagIds); // Attach tags
                }
            }

            // Attach related data (category,tags, brands, units, warehouses) to the product
            if (isset($validatedData['tag'])) {
                $product->tags()->sync($validatedData['selected_tag_ids']); // Attach tags
            }

            if (isset($validatedData['brand'])) {
                $product->brands()->sync($validatedData['brand']); // Attach brands
            }

            if (isset($validatedData['unit'])) {
                $product->units()->sync($validatedData['unit']); // Attach units
            }

            if (isset($validatedData['warehouse'])) {
                $product->warehouses()->sync($validatedData['warehouse']); // Attach warehouses
            }

            return redirect()->back()->with('success', 'Product created successfully!');
      }
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
        $product = Product::find($id);
       return view('product.edit')->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'product_name' => 'required|max:255|unique:products,name,' . $id, // Allow updating the name but ensure uniqueness excluding the current product
            'description' => 'nullable|string',
            'meta_tag_title' => 'nullable|string|max:255',
            'meta_tag_description' => 'nullable|string',
            'status' => 'required|string|in:published,draft',
            'category' => 'required|exists:categories,id', // Validating category ID
            'unit' => 'required|exists:units,id', // Unit ID should exist in the units table
            'brand' => 'required|exists:brands,id', // Brand ID should exist in the brands table
            'warehouse' => 'required|exists:warehouses,id', // Warehouse ID should exist in the warehouses table
            'sku' => 'required|unique:products,sku,' . $id . '|max:255', // Ensure SKU is unique except for the current product
            'barcode' => 'nullable|string|max:255',
            'stock' => 'required|integer|min:0',
            'stock_alert' => 'nullable|integer|min:0',
            'price' => 'required|numeric|min:0',
            'tax' => 'nullable|numeric|min:0|max:100',
            'vat_amount' => 'nullable|numeric|min:0|max:100',
            'manufacture' => 'nullable|date',
            'expiry' => 'nullable|date|after_or_equal:manufacture',
            'selected_tag_ids' => 'nullable|json', // Ensure this is a valid JSON string
            'meta_title' => 'nullable|string|max:255', // Meta title is optional
            'kt_ecommerce_add_product_meta_keywords' => 'nullable|string', // Meta keywords are optional
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Image validation for the thumbnail
        ]);

        // Find the product by ID
        $product = Product::findOrFail($id);

        // Update product fields
        $product->name = $validatedData['product_name'];
        $product->description = $validatedData['description'];
        $product->status = $validatedData['status'];
        $product->sku = $validatedData['sku'];
        $product->barcode = $validatedData['barcode'];
        $product->stock = $validatedData['stock'];
        $product->stock_alert = $validatedData['stock_alert'];
        $product->base_price = $validatedData['price'];
        $product->tax = $validatedData['tax'];
        $product->vat_amount = $validatedData['vat_amount'];
        $product->manufactured = $validatedData['manufacture'];
        $product->expiry = $validatedData['expiry'];
        $product->meta_tag_title = $validatedData['meta_title'];
        $product->meta_tag_description = $validatedData['meta_tag_description'];
        $product->meta_tag_keywords = $validatedData['kt_ecommerce_add_product_meta_keywords'];

        // Handle the thumbnail upload if exists
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');

            // Store the file using Laravel's storage system
            $path = $file->storeAs('uploads', uniqid() . '.' . $file->getClientOriginalExtension(), 'public');

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

            // Update the product's thumbnail field if a new thumbnail was uploaded
            $product->thumbnail_path = $path;
        }

        // Update relationships (tags, brands, units, warehouses)
        if (isset($validatedData['selected_tag_ids'])) {
            $tagIds = json_decode($validatedData['selected_tag_ids'], true);
            if (is_array($tagIds)) {
                $product->tags()->sync($tagIds); // Sync tags
            }
        }

        // Sync other relationships
        if (isset($validatedData['brand'])) {
            $product->brands()->sync($validatedData['brand']);
        }

        if (isset($validatedData['unit'])) {
            $product->units()->sync($validatedData['unit']);
        }

        if (isset($validatedData['warehouse'])) {
            $product->warehouses()->sync($validatedData['warehouse']);
        }

        // Save the updated product
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
      }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the product by ID
    $product = Product::findOrFail($id);

    // Delete associated data if necessary (e.g., product tags, brand, etc.)
    $product->tags()->detach();
    $product->brands()->detach();
    $product->units()->detach();
    $product->warehouses()->detach();

    // Optionally, delete the product's thumbnail file from storage
    // if ($product->thumbnail_path) {
    //     Storage::disk('public')->delete($product->thumbnail_path);
    // }

    // Delete the product
    $product->delete();

    return response()->json(['success' => true, 'message' => 'Product deleted successfully.']);
    }
}
