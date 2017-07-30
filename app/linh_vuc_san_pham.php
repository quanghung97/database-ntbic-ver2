<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;
class linh_vuc_san_pham extends Model
{
    
    use ElasticquentTrait;
    protected $table = 'linh_vuc_san_pham';
    public $timestamps = false;
    public $fillable = ['id', 'linh_vuc'];
    protected $mappingProperties = array(
        'id' => array(
            'type' => 'integer',
            'analyzer' => 'standard',
        ),
        'linh_vuc' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        )
    );
}
