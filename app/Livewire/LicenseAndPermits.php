<?php

namespace App\Livewire;

use App\Enums\RequestType;
use App\Models\Request;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\LivewireFilepond\WithFilePond;

class LicenseAndPermits extends Component
{
    use WithFilePond;
    use WithFileUploads;

    #[Validate('required|min:3')]
    public string $first_name = '';

    #[Validate('required|min:3')]
    public string $middle_name = '';

    #[Validate('required|min:3')]
    public string $last_name = '';

    #[Validate(['photos.*' => 'image|max:1024'])]
    public $photos = [];

    #[Validate('required|min:3')]
    public string $subject;


    #[Validate('required|min:3')]
    public string $message;

    public $type = RequestType::License->value;

    public $requestType;
    public $requestTypes;

    public $requirements;

    public function mount(): void
    {
       $this->fetch();
    }

    public function fetch(): void
    {
        $this->fetchRequestTypes($this->type);
        $this->requestType = $this->requestTypes->first()->id;
        $this->getRequirements($this->requestType);
    }

    public function fetchRequestTypes($type): void
    {
        $requestTypes = \App\Models\RequestType::all();

        if ($type == \App\Enums\RequestType::Permit->value) {
            $this->requestTypes  = $requestTypes->where('type', RequestType::Permit);
        } else {
            $this->requestTypes = $requestTypes->where('type', RequestType::License);
        }
    }

    public function updatedType($value): void
    {
        $this->fetch();
    }

    public function updatedRequestType($value): void
    {
        $this->getRequirements($value);
    }

    public function getRequirements($requestTypeId): void
    {
        $this->requirements = \App\Models\RequestType::find($requestTypeId)->requirements;
    }

    public function submit()
    {
        $this->validate();

        $request = Request::create([
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'subject' => $this->subject,
            'message' => $this->message,
            'request_type_id' => $this->requestType,
            'user_id' => auth()->id(),
            'municipality_id' => 1
        ]);

        foreach ($this->photos as $photo) {
            $request->addMedia($photo)
                ->toMediaCollection('userAttachments');
        }
    }

    public function render()
    {
        return view('livewire.license-and-permits');
    }
}
