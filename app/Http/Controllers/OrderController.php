<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('sales.product')->get();
        return response()->json($orders);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'items' => 'required|array|min:1', // Ensure at least one item is sent
            'items.*.product_id' => 'required|integer|exists:products,id', // Validate each product
            'items.*.quantity' => 'required|integer|min:1', // Ensure valid quantities
            'payment_method' => 'required|string|in:cash,card,transfer', // Validate payment method
            'customer_id' => 'nullable|integer|exists:customers,id', // Validate optional customer ID
        ]);

        // Generate a unique Order ID
        $orderId = (string) Str::uuid();

        // Calculate total amount
        $totalAmount = $this->calculateTotalAmount($validated['items']);

        // Process the order and save to the database
        $order = Order::create([
            'order_id' => $orderId,
            'customer_id' => $validated['customer_id'] ?? null, // Optional, depending on setup
            'total_amount' => $totalAmount,
            'status' => 'Pending',
        ]);

        // Save sales (order items)
        foreach ($validated['items'] as $item) {
            $product = Product::findOrFail($item['product_id']);
            $sale = Sale::create([
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $product->price,
                'total' => $product->price * $item['quantity'],
                'order_id' => $order->id,
            ]);
        }

        // Return response
        return response()->json([
            'message' => 'Order created successfully.',
            'order_id' => $orderId,
            'total_amount' => $totalAmount,
        ], 201);
    }

    /**
     * Show an order.
     */
    public function show($id)
    {
        $order = Order::with(['sales.product', 'payment'])->find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found.'], 404);
        }

        return response()->json($order, 200);
    }

    private function calculateTotalAmount($items)
    {
        $productIds = array_column($items, 'product_id');
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

        $total = 0;
        foreach ($items as $item) {
            if (!isset($products[$item['product_id']])) {
                throw new \Exception('Product not found.');
            }
            $total += $products[$item['product_id']]->price * $item['quantity'];
        }

        return $total;
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
