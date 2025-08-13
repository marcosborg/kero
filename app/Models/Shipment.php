<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipment extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'shipments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_RADIO = [
        'pending'    => 'pending',
        'in_transit' => 'in_transit',
        'delivered'  => 'delivered',
        'returned'   => 'returned',
    ];

    protected $fillable = [
        'order_id',
        'carrier',
        'tracking_code',
        'status',
        'cost_cents',
        'label_url',
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
