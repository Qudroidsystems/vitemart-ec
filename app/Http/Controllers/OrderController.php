<?php

namespace App\Http\Controllers;

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

    /**
     * Store a newly created resource in storage.
     */

    //  public function store(Request $request)
    //  {
    //      // Wrap the operation in a database transaction for safety
    //      DB::beginTransaction();

    //      try {
    //          // Validate the request
    //          $validated = $request->validate([
    //              'items' => 'required|array|min:1', // Ensure at least one item is sent
    //              'items.*.product_id' => 'required|integer|exists:products,id', // Validate each product
    //              'items.*.quantity' => 'required|integer|min:1', // Ensure valid quantities
    //              'paymentmethod' => 'required|string|in:cash,card,transfer', // Validate payment method
    //              'customer_id' => 'nullable|integer|exists:customers,id', // Validate optional customer ID
    //          ]);

    //          // Generate a unique Order ID
    //          $orderId = (string) Str::uuid();

    //          // Calculate total amount for the order
    //          $totalAmount = $this->calculateTotalAmount($validated['items']);

    //          // Create a new order
    //          $order = Order::create([
    //              'order_id' => $orderId,
    //              'customer_id' => $validated['customer_id'] ?? null, // Optional customer reference
    //              'total_amount' => $totalAmount,
    //              'status' => 'Pending',
    //          ]);

    //          // Save the sales (order items)
    //          foreach ($validated['items'] as $item) {
    //              $product = Product::findOrFail($item['product_id']);

    //              Sale::create([
    //                  'product_id' => $item['product_id'],
    //                  'quantity' => $item['quantity'],
    //                  'price' => $product->price,
    //                  'total' => $product->price * $item['quantity'],
    //                  'order_id' => $order->id,
    //              ]);
    //          }

    //          // Optionally create a payment record
    //          $order->payment()->create([
    //              'payment_method' => $validated['payment_method'],
    //              'amount' => $totalAmount,
    //              'status' => 'Pending', // Default payment status
    //          ]);

    //          // Commit the transaction
    //          DB::commit();

    //          // Return success response
    //          return response()->json([
    //              'message' => 'Order created successfully.',
    //              'order_id' => $orderId,
    //              'total_amount' => $totalAmount,
    //          ], 201);
    //      } catch (\Exception $e) {
    //          // Roll back the transaction in case of an error
    //          DB::rollBack();



    //     // Log the error
    //     \Log::error('Order creation failed.', [
    //         'error' => $e->getMessage(),
    //         'trace' => $e->getTraceAsString(), // Optional: Include the stack trace
    //         'request_data' => $request->all(), // Optional: Log the request data
    //     ]);
    //          // Return error response
    //          return response()->json([
    //              'error' => 'Failed to create order.',
    //              'details' => $e->getMessage(),
    //          ], 500);
    //      }
    //  }

    public function store(Request $request)
    {
        Log::info('Incoming request data:', $request->all());
        // // or
        // dd($request->all());
        // Log::info('Processing order creation request.', [
        //     'customer_id' => $request->customer_id,
        //     'items' => $request->items,
        // ]);

        try {
            $validated = $request->validate([
                'items' => 'required|array|min:1',
                'items.*.product_id' => 'required|integer|exists:products,id',
                'items.*.quantity' => 'required|integer|min:1',
                'payment_method' => 'required|string',
            ]);

            Log::debug('Validation passed, proceeding with order creation.', [
                'validated_data' => $validated,
            ]);

            DB::beginTransaction();

            // Generate Order ID and other logic...
            $orderId = (string) Str::uuid();
            Log::info('Generated order ID: ' . $orderId);

            // Create Order, Save Order Items, and Create Payment Record...
            // More logic here...

            DB::commit();

            Log::info('Order created successfully.', [
                'order_id' => $orderId,
                'total_amount' => $validated['total_amount'],
            ]);

            return response()->json([
                'message' => 'Order created successfully.',
                'order_id' => $orderId,
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to create order.', [
                'error_message' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString(),
            ]);

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
     private function calculateTotalAmount(array $items)
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
