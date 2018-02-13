<?php

namespace Bantenprov\JPJenisKelamin\Models\Bantenprov\JPJenisKelamin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JPJenisKelamin extends Model
{

    protected $table = 'jumlah_penduduk_jenis_kelamins';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('negara', 'province_id', 'kab_kota', 'regency_id', 'tahun', 'data');

    public function getProvince()
    {
        return $this->hasOne('Bantenprov\JPJenisKelamin\Models\Bantenprov\JPJenisKelamin\Province','id','province_id');
    }

    public function getRegency()
    {
        return $this->hasOne('Bantenprov\JPJenisKelamin\Models\Bantenprov\JPJenisKelamin\Regency','id','regency_id');
    }

}

