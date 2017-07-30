<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;

class loai_phat_minh_sang_che extends Model
{
    
    use ElasticquentTrait;
    protected $table = 'loai_phat_minh_sang_che';
    public $timestamps = false;
    public $fillable = ['id', 'linh_vuc'];
    protected $mappingProperties = array(
        'id' => array(
            'type' => 'integer',
            'analyzer' => 'standard',
        ),
        'loai_phat_minh_sang_che' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        )
    );
}
