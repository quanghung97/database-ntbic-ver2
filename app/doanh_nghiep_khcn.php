<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;
class doanh_nghiep_khcn extends Model
{
     use ElasticquentTrait;

    protected $table = 'doanh_nghiep_khcn';
    public $timestamps = false;
    public $fillable = ['ho_va_ten', 'tinh_thanh', 'hoc_vi'];
    protected $mappingProperties = array(
        'id' => array(
            'type' => 'text',
            'analyzer' => 'standard',
        ),
        'ma_so_doanh_nghiep' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'ten_doanh_nghiep' => array(
            'type' => 'text',
            'analyzer' => 'standard',
        ),
        'logo' => array(
            'type' => 'integer',
            'analyzer' => 'standard',
        ),
        'ngay_cap_nhat' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'linh_vuc' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'tinh_thanh_pho' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'dia_chi' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'email' => array(
            'type' => 'text',
            'analyzer' => 'standard',
        ),
        'phone' => array(
            'type' => 'text',
            'analyzer' => 'standard',
        ),
        'fax' => array(
            'type' => 'text',
            'analyzer' => 'standard',
        ),
        'website' => array(
            'type' => 'text',
            'analyzer' => 'standard',
        ),
        'ma_so_thue' => array(
            'type' => 'integer',
            'analyzer' => 'standard',
        ),
        'loai_hinh' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'ngay_dang_ky' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        
    );
}
