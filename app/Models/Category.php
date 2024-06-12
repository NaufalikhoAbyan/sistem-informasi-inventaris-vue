<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

/**
 * @method static create(array $rules);
 * @method static filters(array $filters)
 */
class Category extends Model
{
    protected $fillable = [
        'description',
        'category'
    ];

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function scopeFilters(Builder $query, array $filters): Builder
    {
        if(isset($filters['A'] ) && $filters['A']){
            $query->orWhere('category', '=', 'A');
        }
        if(isset($filters['M']) && $filters['M']){
            $query->orWhere('category', '=', 'M');
        }
        if(isset($filters['BHP']) && $filters['BHP']){
            $query->orWhere('category', '=', 'BHP');
        }
        if(isset($filters['BTHP']) && $filters['BTHP']){
            $query->orWhere('category', '=', 'BTHP');
        }
        if(isset($filters['search'])){
            $query->where('description', 'like', '%'.$filters['search'].'%');
        }
        return $query;
    }
}
