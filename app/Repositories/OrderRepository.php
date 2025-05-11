<?php

namespace App\Repositories;

use App\Models\ProductTransaction;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Support\Facades\Session;

class OrderRepository implements OrderRepositoryInterface
{
    public function createTransaction(array $data): ProductTransaction
    {
        return ProductTransaction::create($data);
    }

    public function findByTrxIdAndPhoneNumber(string $bookingTrxId, string $phoneNumber): ?ProductTransaction
    {
        return ProductTransaction::where('booking_trx_id', $bookingTrxId)
                                ->where('phone', $phoneNumber)
                                ->first();
    }

    public function saveToSession(array $data): void
    {
        Session::put('orderData', $data);
    }

    public function getOrderDataFromSession(): array
    {
        return Session::get('orderData', []);
    }

    public function updateSessionData(array $data): void
    {
        $orderData = Session::get('orderData', []);
        $orderData = array_merge($orderData, $data);
        Session::put('orderData', array_merge($orderData, $data));
    }

    public function clearSession(): void
    {
        Session::forget('orderData');
    }
}
