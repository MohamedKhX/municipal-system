<?php

namespace App\Livewire;

use App\Models\Report;
use App\Models\ReportType;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\LivewireFilepond\WithFilePond;

class CreateReport extends Component
{

    use WithFilePond;
    use WithFileUploads;

    #[Validate('required')]
    public $latitude;

    #[Validate('required')]
    public $longitude;

    #[Validate('required|min:3')]
    public $title;

    #[Validate('required|min:3')]
    public $description;

    #[Validate('required|min:3')]
    public $street;

    public $reportType;

    #[Validate(['photos.*' => 'image'])]
    public $photos = [];

    public function mount(): void
    {
        $this->reportType = ReportType::find(1)->id;
    }

    protected $listeners = ['updateCoordinates'];

    public function updateCoordinates($lat, $lng): void
    {
        $this->latitude = $lat;
        $this->longitude = $lng;
    }

    public function submit(): void
    {
        $this->validate();

        $report = Report::create([
            'title'              => $this->title,
            'description'        => $this->description,
            'street'             => $this->street,
            'report_type_id'     => $this->reportType,
            'location_latitude'  => $this->latitude,
            'location_longitude' => $this->longitude,
            'user_id'            => auth()->id(),
            'municipality_id'    => getCurrentMunicipality()
        ]);



        foreach ($this->photos as $photo) {
            $report->addMedia($photo)
                ->toMediaCollection('media');
        }

        $this->redirect(route('reports.show', $report));
    }
    public function render()
    {
        return view('livewire.create-report');
    }
}
