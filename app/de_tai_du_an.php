<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;
class de_tai_du_an extends Model
{
    use ElasticquentTrait;
    protected $table = 'de_tai_du_an';
    public $timestamps = false;
    public $fillable = ['ho_va_ten', 'tinh_thanh', 'hoc_vi'];
    protected $mappingProperties = array(
        'id' => array(
            'type' => 'integer',
            'analyzer' => 'standard',
        ),
        'ma_so_de_tai' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'tinh' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'ten_bao_cao' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'co_quan_chu_tri' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'cap_quan_ly_de_tai' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'co_quan_quan_ly_de_tai' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'linh_vuc_nghien_cuu' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'thoi_gian_bat_dau' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'thoi_gian_ket_thuc' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'kinh_phi' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'tom_tat' => array(
            'type' => 'text',
            'analyzer' => 'standard',
        ),
        'tu_khoa' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'trang_thai' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'link' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
    );
}
