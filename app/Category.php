<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'parent_id',
        'lever',
        'deleted_at'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'cate_id', 'id');

        // lấy được list post theo cate rồi
        
    }
    
}
