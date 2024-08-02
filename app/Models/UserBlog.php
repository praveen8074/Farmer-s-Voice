<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBlog extends Model
{
    use HasFactory;
    protected $table = 'blog_details'; // Ensure this matches the table name

    protected $fillable = [
        'title',
        'content',
        'assigned_user', // Add this if you want to assign assigned_user through mass assignment
    ];
}
