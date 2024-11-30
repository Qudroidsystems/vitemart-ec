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
        $validated = $request->validate([
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|integer|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'payment_method' => 'required|string|in:cash,card,transfer',
        ]);

        DB::beginTransaction();

        try {
            // Generate Order ID
            $orderId = (string) Str::uuid();

            // Calculate total amount
            $totalAmount = $this->calculateTotalAmount($validated['items']);

            // Create Order
            $order = Order::create([
                'order_id' => $orderId,
                'customer_id' => $request->customer_id ?? null,
                'total_amount' => $totalAmount,
                'status' => 'Pending',
            ]);

            // Save Order Items
            foreach ($validated['items'] as $item) {
                $order->items()->create([
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                ]);
            }

            // Create Payment Record
            $order->payment()->create([
                'customer_id' => $request->customer_id ?? null,
                'payment_method' => $validated['payment_method'],
                'amount' => $totalAmount,
                'status' => 'Pending',
            ]);

            DB::commit();

            return response()->json([
                'message' => 'Order created successfully.',
                'order_id' => $orderId,
                'total_amount' => $totalAmount,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'error' => 'Failed to create order.',
                'details' => $e->getMessage(),
            ], 500);
        }
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
