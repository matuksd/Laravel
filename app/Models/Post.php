<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //Table name
    protected $table = 'posts';
    // Primary Key
    public $primaryKey = 'id';

    public $name = 'Name';

    public $sku = 'SKU';

    public $price = 'Price';

    public $type = 'Type';

    public $attribute = 'Attribute';

    public $timestamps = false;
}
