<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['name', 'description', 'image', 'parent_id','slug', 'status'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function product()
    {
        return $this->hasMany(Product::class);  
    }

    public function childs()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }


    public function childrenCategories()
	{
	    return $this->hasMany(Category::class, 'parent_id')->with('categories');
	}

    public function parent(){
    	return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function getParentsNames() {
	    if($this->parent) {
            return '<a href="#">'.$this->parent->getParentsNames().'</a>, <a href="#">'.$this->name.'</a>';
	    } else {
	        return '<a href="#">'.$this->name.'</a>';
	    }
	}

    public function getParentsNamesShop(){
        if($this->parent) {
            return '<li><a href="#">'.$this->parent->getParentsNamesShop().'</a></li><li><i class="far fa-long-arrow-right"></i></li><li><a href="#">'.$this->name.'</a></li>';
	    } else {
	        return '<li><i class="far fa-long-arrow-right"></i></li><li><a href="#">'.$this->name.'</a></li>';
	    }
    }

}