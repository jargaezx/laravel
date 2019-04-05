<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Filters\Filterable;

class Bank extends Model
{
    use Filterable;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'banks';

    /**
     * The connection name for the model.
     *
     * @var string
     */
    //protected $connection = 'connection-name';

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    //protected $dateFormat = 'U';

    //const CREATED_AT = 'creation_date';
    //const UPDATED_AT = 'last_update';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'active' => true,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected $fillable = ['active'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['price'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($bank) {
            $bank->{$bank->getKeyName()} = (string) Str::uuid();
        });
    }

    
}
