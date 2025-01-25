<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    //
    protected $table = "organization";
    protected $fillable = ["nama", "deskripsi", "tanggal_berdiri"];
<<<<<<< HEAD
<<<<<<< HEAD
    
    public static function updateOrganization($id, $data)
    {
        $organization = Organization::find($id);
        $organization->nama = $data['nama'];
        $organization->tanggal_berdiri = $data['tanggal'];
        $organization->deskripsi = $data['deskripsi'];
        $organization->save();
        return $organization;
    }
=======
>>>>>>> 47b3a8f (update repo & creating login)
=======
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b
}
