<?php

namespace Tests\Feature;

use App\Filament\Pages\Auth\EditProfile;
use App\Models\User;
use Filament\Auth\Pages\Login;
use Filament\Facades\Filament;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Tests\TestCase;

class AdminProfileTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Filament::setCurrentPanel(Filament::getPanel('admin'));
    }

    public function test_guest_is_redirected_to_login(): void
    {
        $this->get(route('filament.admin.auth.profile'))
            ->assertRedirect(route('filament.admin.auth.login'));
    }

    public function test_admin_can_log_in(): void
    {
        $admin = User::factory()->create([
            'password' => 'password-admin',
        ]);

        Livewire::test(Login::class)
            ->fillForm([
                'email' => $admin->email,
                'password' => 'password-admin',
            ])
            ->call('authenticate')
            ->assertHasNoFormErrors();

        $this->assertAuthenticatedAs($admin);
    }

    public function test_admin_can_open_profile_page(): void
    {
        $admin = User::factory()->create();

        $this->actingAs($admin)
            ->get(route('filament.admin.auth.profile'))
            ->assertOk()
            ->assertSee('Profil Admin')
            ->assertSee('Ubah Password');
    }

    public function test_admin_can_change_password(): void
    {
        $admin = User::factory()->create([
            'password' => 'password-lama',
        ]);

        $this->actingAs($admin);

        Livewire::test(EditProfile::class)
            ->fillForm([
                'name' => $admin->name,
                'email' => $admin->email,
                'currentPassword' => 'password-lama',
                'password' => 'Password-baru-123',
                'passwordConfirmation' => 'Password-baru-123',
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertTrue(Hash::check('Password-baru-123', $admin->fresh()->password));
    }

    public function test_current_password_must_be_valid(): void
    {
        $admin = User::factory()->create([
            'password' => 'password-lama',
        ]);

        $this->actingAs($admin);

        Livewire::test(EditProfile::class)
            ->fillForm([
                'name' => $admin->name,
                'email' => $admin->email,
                'currentPassword' => 'password-salah',
                'password' => 'Password-baru-123',
                'passwordConfirmation' => 'Password-baru-123',
            ])
            ->call('save')
            ->assertHasFormErrors(['currentPassword']);

        $this->assertTrue(Hash::check('password-lama', $admin->fresh()->password));
    }
}
