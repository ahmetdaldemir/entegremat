<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use LaravelEasyRepository\Traits\FileUpload;

class Customer extends BaseModel
{
    use FileUpload,HasFactory,SoftDeletes;


    protected $fillable = [
        'code',
        'fullname',
        'tc',
        'iban',
        'phone1',
        'phone2',
        'address',
        'city',
        'district',
        'email',
        'note',
        'type',
        'company_id',
        'seller_id',
        'user_id',
        'is_status',
        'is_danger'
    ];
    protected function fileSettings()
    {
        // TODO: Implement fileSettings() method.
    }

    public function hasSeller($id): string
    {
        return $this->seller_id == $id ? 'true':'false';
    }

    public function city(): HasOne
    {
        return $this->hasOne(City::class, 'id', 'city');
    }

    public function town(): HasOne
    {
        return $this->hasOne(Town::class, 'id', 'district');
    }


}
