<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'orders';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const PAYMENT_STATUS_RADIO = [
        'unpaid'   => 'unpaid',
        'paid'     => 'paid',
        'refunded' => 'refunded',
        'partial'  => 'partial',
    ];

    public const STATUS_RADIO = [
        'pending'    => 'pending',
        'paid'       => 'paid',
        'processing' => 'processing',
        'shipped'    => 'shipped',
        'completed'  => 'completed',
        'cancelled'  => 'cancelled',
    ];

    protected $fillable = [
        'code',
        'user_id',
        'status',
        'currency',
        'subtotal_cents',
        'discount_cents',
        'shipping_cents',
        'tax_cents',
        'total_cents',
        'billing_address_id',
        'shipping_address_id',
        'notes',
        'payment_status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function billing_address()
    {
        return $this->belongsTo(Address::class, 'billing_address_id');
    }

    public function shipping_address()
    {
        return $this->belongsTo(Address::class, 'shipping_address_id');
    }
}
