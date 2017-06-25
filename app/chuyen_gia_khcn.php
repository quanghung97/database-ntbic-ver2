<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;
class chuyen_gia_khcn extends Model
{
    use ElasticquentTrait;
    protected $table = 'chuyen_gia_khcn';
    public $timestamps = false;
    public $fillable = ['ho_va_ten', 'tinh_thanh', 'hoc_vi'];
    protected $mappingProperties = array(
        'id' => array(
            'type' => 'integer',
            'analyzer' => 'standard',
        ),
        'ho_va_ten' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'hoc_vi' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'nam_sinh' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'chuyen_nganh' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'co_quan' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'dia_chi_co_quan' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'huong_nghien_cuu' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'link_anh' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'Sl_congTrinh_baiBao' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'linkid' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'tinh_thanh' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
    );
}
