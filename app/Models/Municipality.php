<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Municipality extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function boundary(): Attribute
    {
        return Attribute::get(fn($value) => json_decode($value, true));
    }


    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function findNearestMunicipality($latitude, $longitude)
    {
        $municipalities = DB::table('municipalities')->get();

        foreach ($municipalities as $municipality) {
            $boundary = $municipality->boundary;

            if ($this->isPointInPolygon($latitude, $longitude, $boundary)) {
                return $municipality->name;
            }
        }

        return 'Location not in any municipality';
    }

    private function isPointInPolygon($lat, $lng, $polygon): bool
    {
        $inside = false;
        $j = count($polygon) - 1;

        for ($i = 0; $i < count($polygon); $i++) {
            if (($polygon[$i][1] > $lat) != ($polygon[$j][1] > $lat) &&
                ($lng < ($polygon[$j][0] - $polygon[$i][0]) * ($lat - $polygon[$i][1]) / ($polygon[$j][1] - $polygon[$i][1]) + $polygon[$i][0])) {
                $inside = !$inside;
            }
            $j = $i;
        }

        return $inside;
    }
}
