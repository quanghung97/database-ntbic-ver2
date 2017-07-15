<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;

class de_tai_du_an_cac_cap extends Model
{
    use ElasticquentTrait;

    protected $table = 'de_tai_du_an_cac_cap';
    public $fillable = ['ho_va_ten', 'tinh_thanh', 'hoc_vi'];
    public $timestamps = false;
    protected $mappingProperties = array(
        'ten_de_tai' => array(
            'type' => 'text',
            'analyzer' => 'standard',
        ),
        'maso_kyhieu' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'linh_vuc' => array(
            'type' => 'text',
            'analyzer' => 'standard',
        ),
        'chuyen_nganh_khcn' => array(
            'type' => 'integer',
            'analyzer' => 'standard',
        ),
        'nam_bat_dau' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'nam_ket_thuc' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'co_quan' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'chu_nhiem_detai' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'diem_noi_bat' => array(
            'type' => 'text',
            'analyzer' => 'standard',
        ),
        'mota_chung' => array(
            'type' => 'text',
            'analyzer' => 'standard',
        ),
        'mota_quytrinh_chuyengiao' => array(
            'type' => 'text',
            'analyzer' => 'standard',
        ),
        'ket_qua_thuc_hien_ung_dung' => array(
            'type' => 'text',
            'analyzer' => 'standard',
        ),
        'id' => array(
            'type' => 'integer',
            'analyzer' => 'standard',
        ),
        'link' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        
    );
}
