<?php

namespace App\Helper;

use Illuminate\Support\Facades\Http;
use Storage;
use Str;
use GeoIp2\Database\Reader;

class Helper
{
  public static function slug($str)
  {
    $delimiter = '-';
    $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
    return $slug;
  }

  public static function upload_by_url($url, $path)
  {
    if (is_null($url)) {
      return '';
    }
    if (str_starts_with($url, 'data:image')) {
      $image_parts = explode(";base64,", $url);
      if (count($image_parts) == 2) {
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $filename = Str::random(10) . '.' . $image_type;
        if ($path) {
          $filename = 'photos/' . $path . '/' . $filename;
        }

        Storage::disk('public')->put($filename, $image_base64);

        return  Storage::disk('public')->url($filename);
      }
    }
    // Download the file from the URL
    $response = Http::get($url);
    if (!$response->ok()) {
      return null;
    }

    // Generate a filename for the downloaded file
    $filename = basename($url);
    $filename = preg_replace('/[^A-Za-z0-9_.-]+/', '_', $filename);

    // If a path is provided, include it in the final filename
    if ($path) {
      $filename = 'photos/' . $path . '/' . $filename;
    }

    // Store the file in the public disk
    Storage::disk('public')->put($filename, $response->body());

    // Return the path to the file
    return url('storage/' . $filename);
  }

  public static function getCountryFromIP($ip)
  {
    $reader = new Reader(base_path(env('GEOIP_DATABASE_PATH')));

    try {
      $record = $reader->city($ip);
      return $record->country->isoCode;
    } catch (Exception $e) {
      return null;
    }
  }
}
