<?php

namespace App\Filament\Actions\TableActions;

use Filament\Notifications\Notification;
use Filament\Support\Facades\FilamentIcon;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Model;

class SecureDeleteAction extends DeleteAction
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->action(function (): void {
            try {
                $this->process(static fn (Model $record) => $record->delete());
                $this->success();
            } catch (\Exception $e) {
                Notification::make()
                    ->title(__('Unable to Delete Record'))
                    ->body(__('This record cannot be deleted because it is associated with other data'))
                    ->danger()
                    ->send();
            }
        });
    }
}
