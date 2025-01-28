<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    //
    protected $table = "organization";
    protected $fillable = ["nama", "deskripsi", "tanggal_berdiri"];
    
    public static function updateOrganization($id, $data)
    {
        $organization = Organization::find($id);
        $organization->nama = $data['nama'];
        $organization->tanggal_berdiri = $data['tanggal'];
        $organization->deskripsi = $data['deskripsi'];
        $organization->save();
        return $organization;
    }
    public function orgtoken()
    {
        return $this->hasMany(Orgtoken::class);
    }
}
