<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'category_id',
        'detail'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        if (empty($keyword)) {
            return $query;
        }
        $keyword = trim($keyword);
        return $query->where(function ($q) use ($keyword) {
            $q->where('first_name', 'like', "%{$keyword}%")->orWhere('last_name', 'like', "%{$keyword}%")->orWhere('email', 'like', "%{$keyword}%");
        });
    }

    public function scopeGenderSearch($query, $gender)
    {
        if (empty($gender)) {
            return $query;
        }
        return $query->where('gender', $gender);
    }

    public function scopeCategorySearch($query, $categoryId)
    {
        if (empty($categoryId)) {
            return $query;
        }
        return $query->where('category_id', $categoryId);
    }
}
