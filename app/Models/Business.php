<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'designation',
        'sub_title',
        'description',        
        'category_id',
        'subcategory_id',        
        'branding_text',
        'banner',
        'logo',
        'card_theme',
        'theme_color',
        'links',
        'meta_keyword',
        'meta_description',
        'domains',
        'enable_businesslink',
        'subdomain',
        'enable_domain',
        'created_by'

    ];

    public function getLanguage(){
        $user = User::find($this->created_by);
        return $user->currentLanguage();
    }
}
