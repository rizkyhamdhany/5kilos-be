<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'code',
        'origin_nama',
        'origin_perusahaan',
        'origin_country',
        'origin_alamat',
        'origin_alamat2',
        'origin_alamat3',
        'origin_kodepos',
        'origin_kota',
        'origin_negara',
        'origin_email',
        'origin_phone',
        'origin_tax_info',
        'dest_nama',
        'dest_perusahaan',
        'dest_country',
        'dest_alamat',
        'dest_alamat2',
        'dest_alamat3',
        'dest_kodepos',
        'dest_kota',
        'dest_negara',
        'dest_email',
        'dest_phone',
        'dest_tax_info',
        'nilai_barang',
        'berat_barang',
        'deskripsi_barang'
    ];

    public static function create(
        $user_id,
        $code,
        $origin_nama,
        $origin_perusahaan,
        $origin_country,
        $origin_alamat,
        $origin_alamat2,
        $origin_alamat3,
        $origin_kodepos,
        $origin_kota,
        $origin_negara,
        $origin_email,
        $origin_phone,
        $origin_tax_info,
        $dest_nama,
        $dest_perusahaan,
        $dest_country,
        $dest_alamat,
        $dest_alamat2,
        $dest_alamat3,
        $dest_kodepos,
        $dest_kota,
        $dest_negara,
        $dest_email,
        $dest_phone,
        $dest_tax_info,
        $nilai_barang,
        $berat_barang,
        $deskripsi_barang
    )
    {
        $data = new static;
        $data->user_id = $user_id;
        $data->code = $code;
        $data->origin_nama = $origin_nama;
        $data->origin_perusahaan = $origin_perusahaan;
        $data->origin_country = $origin_country;
        $data->origin_alamat = $origin_alamat;
        $data->origin_alamat2 = $origin_alamat2;
        $data->origin_alamat3 = $origin_alamat3;
        $data->origin_kodepos = $origin_kodepos;
        $data->origin_kota = $origin_kota;
        $data->origin_negara = $origin_negara;
        $data->origin_email = $origin_email;
        $data->origin_phone = $origin_phone;
        $data->origin_tax_info = $origin_tax_info;
        $data->dest_nama = $dest_nama;
        $data->dest_perusahaan = $dest_perusahaan;
        $data->dest_country = $dest_country;
        $data->dest_alamat = $dest_alamat;
        $data->dest_alamat2 = $dest_alamat2;
        $data->dest_alamat3 = $dest_alamat3;
        $data->dest_kodepos = $dest_kodepos;
        $data->dest_kota = $dest_kota;
        $data->dest_negara = $dest_negara;
        $data->dest_email = $dest_email;
        $data->dest_phone = $dest_phone;
        $data->dest_tax_info = $dest_tax_info;
        $data->nilai_barang = $nilai_barang;
        $data->berat_barang = $berat_barang;
        $data->deskripsi_barang = $deskripsi_barang;
        return $data->save() ? $data : false;
    }

    public function boxes()
    {
        return $this->hasMany(OrderBox::class, "order_id", "id");
    }
}
