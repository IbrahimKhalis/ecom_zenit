<?php

namespace App\Http\Controllers\payment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Transaction;
use App\Http\Controllers\Controller;
use App\Http\Controllers\payment;

class TripayCallbackController extends Controller
{
    // Isi dengan private key anda
    protected $privateKey = 'oQO7B-cZPQU-npXoc-eQ83j-UvYCs';
    public function handle(Request $request)
    {
        $callbackSignature = $request->server('HTTP_X_CALLBACK_SIGNATURE');
        $json = $request->getContent();
        $signature = hash_hmac('sha256' , $json, $this->privateKey);

        if ($signature !== (string) $callbackSignature) {
            return Response::json([
                'success' => false,
                'message' => 'Invalid signature',
            ]);
        }

        if ('payment_status' !== (string) $request->server('HTTP_X_CALLBACK_EVENT')) {
            return Response::json([
                'success' => false,
                'message' => 'Invalid callback event, no action was taken',
            ]);
        }

        $data = json_decode($json);

        if (JSON_ERROR_NONE !== json_last_error()) {
            return Response::json([
                'success' => false,
                'message' => 'Invalid data sent by tripay',
            ]);
        }


        $reference = $data->reference;

        $status = strtoupper((string) $data->status);


        /*
        |--------------------------------------------------------------------------
        | Proses callback untuk closed payment
        |--------------------------------------------------------------------------
        */

        if (1 === (int) $data->is_closed_payment) {
            $transaction = Transaction::where('reference', $reference)
                ->where('status', '!=', 'PAID')
                ->first();


            if (! $transaction) {
                return Response::json([
                    'success' => false,
                    'message' => 'No transaction found or already paid: ' . $reference,
                ]);
            }

            switch ($data->status) {
                case 'PAID':
                    $transaction->order->update(['status'=>'PAID']);
                    $transaction->update(['status' => 'PAID']);
                    return Response::json(['success' => true]);
    
                case 'EXPIRED':
                    $transaction->order->update(['status'=>'EXPIRED']);
                    $transaction->update(['status' => 'EXPIRED']);
                    return Response::json(['success' => true]);
    
                case 'FAILED':
                    $transaction->order->update(['status'=>'UNPAID']);
                    $transaction->update(['status' => 'UNPAID']);
                    return Response::json(['success' => true]);
    
                default:
                    return Response::json([
                        'success' => false,
                        'message' => 'Unrecognized payment status',
                    ]);
            }

            return Response::json(['success' => true]);
        }


        /*
        |--------------------------------------------------------------------------
        | Proses callback untuk open payment
        |--------------------------------------------------------------------------
        */

        $transaction = Transaction::where('reference', $reference)
            ->where('status', 'UNPAID')
            ->first();

        if (! $transaction) {
            return Response::json([
                'success' => false,
                'message' => 'transaction not found or current status is not UNPAID',
            ]);
        }

        if ((int) $data->total_amount !== (int) $transaction->total_amount) {
            return Response::json([
                'success' => false,
                'message' => 'Invalid amount. Expected: ' . $transaction->total_amount . ' - Got: ' . $data->total_amount,
            ]);
        }

        switch ($data->status) {
            case 'PAID':
                $transaction->order->update(['status'=>'PAID']);
                $transaction->update(['status' => 'PAID']);
                return Response::json(['success' => true]);

            case 'EXPIRED':
                $transaction->order->update(['status'=>'EXPIRED']);
                $transaction->update(['status' => 'EXPIRED']);
                return Response::json(['success' => true]);

            case 'FAILED':
                $transaction->order->update(['status'=>'UNPAID']);
                $transaction->update(['status' => 'UNPAID']);
                return Response::json(['success' => true]);

            default:
                return Response::json([
                    'success' => false,
                    'message' => 'Unrecognized payment status',
                ]);
        }
    }
}
