<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;

class san_pham extends Model
{
  
    use ElasticquentTrait;
    protected $table = 'san_pham';
    public $fillable = ['ten_san_pham', 'dac_diem_noi_bat', 'mo_ta_chung'];
    public $timestamps = false;
    protected $mappingProperties = array(
        'id' => array(
            'type' => 'integer',
            'analyzer' => 'standard',
        ),
        'link' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'ten_san_pham' => array(
            'type' => 'text',
            'analyzer' => 'standard',
        ),
        'linh_vuc' => array(
            'type' => 'integer',
            'analyzer' => 'standard',
        ),
        'dac_diem_noi_bat' => array(
            'type' => 'text',
            'analyzer' => 'standard',
        ),
        'mo_ta_chung' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'quy_trinh_chuyen_giao' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'kha_nang_ung_dung' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'anh_san_pham' => array(
            'type' => 'text',
            'analyzer' => 'standard',
        )
    );
}
