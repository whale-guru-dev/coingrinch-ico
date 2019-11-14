<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
 	protected $table = 'blog_posts';
 	public $timestamps = false;
 	protected $primaryKey = 'postID';
}
