<?php

namespace App\Filament\Pages\Auth;

use Filament\Actions\Action;
use Filament\Auth\Pages\EditProfile as BaseEditProfile;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use LogicException;

class EditProfile extends BaseEditProfile
{
    protected static ?string $title = 'Profil Admin';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Akun')
                    ->description('Perbarui nama dan alamat email yang digunakan untuk masuk ke panel admin.')
                    ->schema([
                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                    ])
                    ->columns(2),
                Section::make('Ubah Password')
                    ->description('Kosongkan bagian ini apabila Anda tidak ingin mengganti password.')
                    ->schema([
                        $this->getCurrentPasswordFormComponent()
                            ->columnSpanFull(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                    ])
                    ->columns(2),
            ]);
    }

    protected function getNameFormComponent(): Component
    {
        return $this->asTextInput(parent::getNameFormComponent())
            ->label('Nama admin');
    }

    protected function getEmailFormComponent(): Component
    {
        return $this->asTextInput(parent::getEmailFormComponent())
            ->label('Alamat email');
    }

    protected function getPasswordFormComponent(): Component
    {
        return $this->asTextInput(parent::getPasswordFormComponent())
            ->label('Password baru')
            ->validationAttribute('password baru')
            ->belowContent('Gunakan minimal 8 karakter.');
    }

    protected function getPasswordConfirmationFormComponent(): Component
    {
        return $this->asTextInput(parent::getPasswordConfirmationFormComponent())
            ->label('Konfirmasi password baru')
            ->validationAttribute('konfirmasi password baru');
    }

    protected function getCurrentPasswordFormComponent(): Component
    {
        return $this->asTextInput(parent::getCurrentPasswordFormComponent())
            ->label('Password saat ini')
            ->validationAttribute('password saat ini')
            ->belowContent('Masukkan password saat ini untuk mengonfirmasi perubahan password atau email.');
    }

    protected function getSaveFormAction(): Action
    {
        return parent::getSaveFormAction()
            ->label('Simpan perubahan');
    }

    protected function getCancelFormAction(): Action
    {
        return parent::getCancelFormAction()
            ->label('Batal');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Profil berhasil diperbarui';
    }

    private function asTextInput(Component $component): TextInput
    {
        if (! $component instanceof TextInput) {
            throw new LogicException('Komponen profil harus berupa text input.');
        }

        return $component;
    }
}
