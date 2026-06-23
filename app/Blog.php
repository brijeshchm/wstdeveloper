<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Blog extends Authenticatable
{

protected $fillable = [
    'title',
    'sub_title',
    'slug',
    'category',
    'author',   
    'blog_image',
    'image_banner',
    'rating',
    'total_rating',
    'about_heading',
    'about_blog',
    'paragraph1',
    'paragraph2',
    'paragraph3',
    'paragraph4',
    'paragraph5',
    'paragraph6',
    'meta_title',
    'meta_keywords',
    'meta_description',
    'heading',
    'blog_description',
    'conclusion',    
    'blog_content',
    'top_heading',
    'top_content',
    'bottom_heading',
    'bottom_content',
    'faqq1',
    'faqa1',
    'faqq2',
    'faqa2',
    'faqq3',
    'faqa3',
    'faqq4',
    'faqa4',
    'faqq5',
    'faqa5',    
    'status',
    'created_by',
    'updated_by',
];

protected $connection = 'mysql';
   protected $table = 'web_blog';
}
