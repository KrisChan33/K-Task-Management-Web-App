<?php

namespace App\Filament\Pages\Auth;
use Filament\Pages\Page;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;

class EditProfile extends BaseEditProfile
{

    //use this if you want to redirect after a successful 2fA Enable
public function boot()
{
    return redirect('admin');
}

    public function form(Form $form): Form
    {
        return $form
        ->schema([
            $this->getNameFormComponent()->label('Full Name')->columnSpan(12),
            $this->getEmailFormComponent()->columnSpan(12),
            $this->getPasswordFormComponent()->columnSpan(12)
            ->placeholder('Enter new password if you want to change it'),
            // $this->getPasswordConfirmationFormComponent()->columnSpan(12),
        ])
        ->columns(12); // Define the number of columns for the form layout
}
public function getTitle(): string
{
    return ('Update Profile Information');
}

    }
    