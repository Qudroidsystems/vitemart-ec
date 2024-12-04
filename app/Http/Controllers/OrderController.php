<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Order;
use App\Models\Orders;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log; // Import Log Facade

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



    public function store(Request $request)
        {
            //Log::info('Incoming request data', $request->all());

            $validated = $request->validate([
                'items' => 'required|array|min:1',
                'items.*.productId' => 'required|integer|exists:products,id',
                'items.*.quantity' => 'required|integer|min:1',
                'payment_method' => 'required|string|in:cash,card,transfer',
                'customer_id' => 'nullable|integer|exists:customers,id', // Keep nullable if it's optional
            ]);

            DB::beginTransaction();

            try {
                $orderId = (string) Str::uuid();
                $totalAmount = $this->calculateTotalAmount($validated['items']);

                // Log::info('Validation passed, proceeding with order creation.', [
                //     'validated_data' => $validated,
                //     'total_amount' => $totalAmount,
                // ]);

                $order = Orders::create([
                    'genOrderId' => $orderId,
                    'customer_id' => $request->customer_id ?? null,
                    'total_amount' => $totalAmount,
                    'status' => 'Pending',
                ]);

                        $orderDetails = []; // Initialize an array to hold order details

                        foreach ($validated['items'] as $item) {
                            $product = Product::findOrFail($item['productId']); // Retrieve product details

                            // Add the product details to the orderDetails array
                            $orderDetails[] = [
                                'product_name' => $product->name,
                                'quantity' => $item['quantity'],
                                'price' => $product->base_price,
                                'total' => $product->base_price * $item['quantity'],
                            ];

                            $order->items()->create([
                                'product_id' => $item['productId'],
                                'quantity' => $item['quantity'],
                                'price' => $product->base_price, // Include the price field
                                'total' => $product->base_price * $item['quantity'],
                            ]);

                        // Create corresponding sales record
                        Sale::create([
                            'product_id' => $item['productId'],
                            'order_id' => $order->id,
                            'user_id' => auth()->id(),
                            'quantity' => $item['quantity'],
                            'price' => $product->base_price,
                            'total' => $product->base_price * $item['quantity'],
                        ]);
                }

                $order->payment()->create([
                    'order_id' => $order->id, // Ensure this matches your payments table schema
                    'customer_id' => $validated['customer_id'] ?? null, // Ensure null is acceptable
                    'payment_method' => $validated['payment_method'],
                    'amount' => $totalAmount,
                    'status' => 'Pending',
                ]);

                $invoice = Invoice::create([
                    'invoice_no' => 'CS' . str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT),
                    'order_id' => $order->id,
                    'issued_at' => now(),
                ]);

                DB::commit();

                return response()->json([
                    'message' => 'Order created successfully.',
                    'order_id' => $orderId,
                    'invoice_id'=> $invoice,
                    'items' => $orderDetails,
                    'total_amount' => $totalAmount,
                ], 201);
             } catch (\Exception $e) {
                DB::rollBack();

                // Log::error('Failed to create order.', [
                //     'error_message' => $e->getMessage(),
                //     'stack_trace' => $e->getTraceAsString(),
                // ]);

                return response()->json([
                    'error' => 'Failed to create order.',
                    'details' => $e->getMessage(),
                ], 500);
            }
    }
     /**
      * Calculate the total amount for the order items.
      *
      * @param array $items
      * @return float
      * @throws \Exception
      */
     private function calculateTotalAmount(array $items): float
     {
         $total = 0;

         foreach ($items as $item) {
             $product = Product::find($item['productId']);
             if (!$product) {
                 throw new \Exception("Product with ID {$item['productId']} not found.");
             }

             if (is_null($product->base_price)) {
                //  Log::error("Product price is null", [
                //      'product_id' => $item['productId'],
                //      'product_name' => $product->name ?? 'Unknown',
                //  ]);
                //  throw new \Exception("Product with ID {$item['productId']} has no price.");
             }

             $itemTotal = $product->base_price * $item['quantity'];
             $total += $itemTotal;

             //Log the details for debugging
            //  Log::info("Calculating total for item", [
            //      'product_id' => $item['productId'],
            //      'price' => $product->base_price,
            //      'quantity' => $item['quantity'],
            //      'item_total' => $itemTotal,
            //  ]);
         }

         //Log::info("Total amount calculated: {$total}");

         return $total;
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
