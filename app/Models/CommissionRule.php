<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommissionRule extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'commission_rules';

    protected $dates = [
        'valid_from',
        'valid_to',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'vendor_id',
        'rate_percent',
        'valid_from',
        'valid_to',
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

    public function getValidFromAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setValidFromAttribute($value)
    {
        $this->attributes['valid_from'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getValidToAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setValidToAttribute($value)
    {
        $this->attributes['valid_to'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
