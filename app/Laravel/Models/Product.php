<?php

namespace App\Laravel\Models;

use Illuminate\Database\Eloquent\Model;
use App\Laravel\Traits\DateFormatterTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use DateFormatterTrait,SoftDeletes;

	protected $table = "product";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','description' ,'category','status','price','directory','file_name','full_path','user_id'
    ];

    public $timestamps = true;

    public function category() {
        return $this->BelongsTo("App\Laravel\Models\Category", "category", "id");
    }

    public function user() {
        return $this->BelongsTo("App\Laravel\Models\User", "user_id", "id");
    }


   
}
