<?php

namespace App\Livewire;

use AllowDynamicProperties;
use App\Enums\Rating;
use App\Models\Service;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ServiceRating extends Component
{

    #[Validate('required|min:3')]
    public $review;
    public $rating = Rating::Bad->value;

    public function submit()
    {
        $this->validate();

        $serviceRating = new \App\Models\ServiceRating();
        $serviceRating->rating = $this->rating;
        $serviceRating->review = $this->review;
        $serviceRating->service_id = $this->service->id;
        $serviceRating->user_id = auth()->id();

        $serviceRating->save();
    }

    public Service $service;
    public function render()
    {
        $ratings = $this->service->ratings;

        return view('livewire.service-rating', [
            'ratings' => $ratings
        ]);
    }
}
