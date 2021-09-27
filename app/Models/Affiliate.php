<?php

namespace App\Models;

use App\Http\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    use HasFactory;
    use UuidTrait;

    protected $primaryKey = 'id';
    protected $keyType = 'uuid';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
    ];
}
