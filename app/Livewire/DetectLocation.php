<?php
namespace App\Livewire;

use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DetectLocation extends Component
{
    public $latitude;
    public $longitude;

    protected $listeners = ['detectMunicipality'];

    public function mount()
    {
        $this->latitude = null;
        $this->longitude = null;
    }

    public function detectMunicipality($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;

        $municipalities = DB::table('municipalities')->get();

        foreach ($municipalities as $municipality) {
            $boundary = json_decode($municipality->boundary, true);

            // Ensure the coordinates are in the correct order [longitude, latitude]
            if ($this->isPointInPolygon($this->latitude, $this->longitude, $boundary)) {
                return redirect()->route('home', $municipality->id);
            }
        }

        return redirect()->route('home', $municipality->id);
        //session()->flash('error', 'No municipality found for the provided location.');
    }

    private function isPointInPolygon($lng, $lat, $polygon)
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


    public function render()
    {
        return view('livewire.detect-location');
    }
}
