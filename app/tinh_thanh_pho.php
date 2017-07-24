<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;
class tinh_thanh_pho extends Model
{
    protected $table = 'tinh_thanh_pho';
    public $timestamps = false;
    use ElasticquentTrait;
    

    public $fillable = ['id', 'tinh_thanh_pho'];
    protected $mappingProperties = array(
        'id' => array(
            'type' => 'integer',
            'analyzer' => 'standard',
        ),
        'tinh_thanh_pho' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
     
    );
}
