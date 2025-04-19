<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function saveImage($image, $path = 'public'){
        if (!$image) {
            return null;
        }

        $code = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 16);

        $random = rand ( 10000 , 99999 );

        $fileName =  $code. '-' . $random.'.png';
        // save image
        Storage::disk($path)->put($fileName, base64_decode($image));

        return 'storage'.'/'.$path.'/'.$fileName;
    }



}
