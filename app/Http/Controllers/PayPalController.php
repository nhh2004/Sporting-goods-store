<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\PaymentExecution;

class PayPalController extends Controller
{
    private $apiContext;

    public function __construct()
    {
        $paypalConfig = config('paypal');
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $paypalConfig['client_id'],
                $paypalConfig['secret']
            )
        );
        $this->apiContext->setConfig($paypalConfig['settings']);
    }

    public function getExpressCheckout()
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item = new Item();
        $item->setName('Example Item')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice(10);

        $itemList = new ItemList();
        $itemList->setItems([$item]);

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal(10);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription('Example Transaction');

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('paypal.success'))
            ->setCancelUrl(route('paypal.cancel'));

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions([$transaction]);

        try {
            $payment->create($this->apiContext);
            return redirect($payment->getApprovalLink());
        } catch (\Exception $e) {
            // Xử lý lỗi
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getExpressCheckoutSuccess(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');

        if (!$paymentId || !$payerId) {
            // Xử lý lỗi
            return response()->json(['error' => 'Missing payment ID or payer ID'], 400);
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            $result = $payment->execute($execution, $this->apiContext);
            // Xử lý thanh toán thành công
        } catch (\Exception $e) {
            // Xử lý lỗi
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function cancelPage()
    {
        // Xử lý khi thanh toán bị hủy
    }
}
