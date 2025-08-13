<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'payments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const PROVIDER_RADIO = [
        'mbway'      => 'mbway',
        'multibanco' => 'multibanco',
        'paypal'     => 'paypal',
    ];

    public const STATUS_RADIO = [
        'pending'   => 'pending',
        'succeeded' => 'succeeded',
        'failed'    => 'failed',
        'refunded'  => 'refunded',
    ];

    protected $fillable = [
        'order_id',
        'provider',
        'provider_ref',
        'amount_cents',
        'status',
        'payload',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
