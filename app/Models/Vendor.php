<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Vendor extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'vendors';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_RADIO = [
        'pending'   => 'pending',
        'active'    => 'active',
        'suspended' => 'suspended',
    ];

    public const PAYOUT_METHOD_RADIO = [
        'bank_transfer'  => 'bank_transfer',
        'stripe_connect' => 'stripe_connect',
    ];

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'description',
        'status',
        'support_email',
        'support_phone',
        'tax',
        'invoice_name',
        'payout_method',
        'payout_data',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
