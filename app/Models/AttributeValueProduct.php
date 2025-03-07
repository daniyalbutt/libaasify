<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attribute;


class AttributeValueProduct extends Model
{
    use HasFactory;
     /**
     * AttributeValues that should be mass-assignable.
     *
     * @var array
     */
    protected $table = 'attribute_value_product';

    protected $guarded = [];

    
    public function setImagesAttribute($value)
    {
        return $this->attributes['images'] = json_encode($value);
    }

    public function get_attribute(){
        return $this->belongsTo(AttributeValue::class, 'attribute_value_id');
    }

}
