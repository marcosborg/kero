<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payout extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'payouts';

    protected $dates = [
        'period_start',
        'period_end',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_RADIO = [
        'pending'   => 'pending',
        'in_review' => 'in_review',
        'paid'      => 'paid',
    ];

    protected $fillable = [
        'vendor_id',
        'period_start',
        'period_end',
        'gross_cents',
        'commissions_cents',
        'refunds_cents',
        'net_cents',
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

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function getPeriodStartAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPeriodStartAttribute($value)
    {
        $this->attributes['period_start'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPeriodEndAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPeriodEndAttribute($value)
    {
        $this->attributes['period_end'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
