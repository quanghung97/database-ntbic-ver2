<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;

class bang_phat_minh_sang_che extends Model
{
   
    use ElasticquentTrait;
    protected $table = 'bang_phat_minh_sang_che';
    public $timestamps = false;
    public $fillable = ['ten', 'tac_gia', 'diem_noi_bat'];
    protected $mappingProperties = array(
        'id' => array(
            'type' => 'integer',
            'analyzer' => 'standard',
        ),
        'ten' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'sobang_kyhieu' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'ngay_cong_bo' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'ngay_cap' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'chu_so_huu_chinh' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'tac_gia' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'diem_noi_bat' => array(
            'type' => 'text',
            'analyzer' => 'standard',
        ),
        'mota_sangche_phatminh_giaiphap' => array(
            'type' => 'text',
            'analyzer' => 'standard',
        ),
        'noidung_cothe_chuyengiao' => array(
            'type' => 'text',
            'analyzer' => 'standard',
        ),
        'thitruong_ungdung' => array(
            'type' => 'text',
            'analyzer' => 'standard',
        ),
        'hinh_anh_minh_hoa' => array(
            'type' => 'text',
            'analyzer' => 'standard',
        ),
        'link' => array(
            'type' => 'string',
            'analyzer' => 'standard',
        ),
        'linh_vuc_khcn' => array(
            'type' => 'integer',
            'analyzer' => 'standard',
        ),
        'loai_phat_minh_sang_che' => array(
            'type' => 'integer',
            'analyzer' => 'standard',
        ),
    );
}
