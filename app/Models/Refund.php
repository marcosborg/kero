<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Refund extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'refunds';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_RADIO = [
        'requested' => 'requested',
        'approved'  => 'approved',
        'rejected'  => 'rejected',
        'processed' => 'processed',
    ];

    protected $fillable = [
        'order_id',
        'amount_cents',
        'reason',
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
