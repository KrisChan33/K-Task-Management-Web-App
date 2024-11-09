<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Auth\EditProfile;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Filament\Enums\ThemeMode;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Filament\Navigation\MenuItem;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Joaopaulolndev\FilamentEditProfile\FilamentEditProfilePlugin;
use Joaopaulolndev\FilamentEditProfile\Pages\EditProfilePage;
use Stephenjude\FilamentTwoFactorAuthentication\TwoFactorAuthenticationPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('K-Task-Management-Web-App')
            ->brandName('K Task Management  WA')
            ->path('admin')
            //authentications
            ->login()
            ->registration()
            // ->passwordReset()
            ->emailVerification()
            ->profile(EditProfilePage::class)//->profile(isSimple: false)
            //breadcrumbs navigation upper part of page that informs the user of their current location within the application
            // ->breadcrumbs(false);
            //security check for the user
            ->authGuard('web')
            //Themes and fonts and sizes are
            ->defaultThemeMode(ThemeMode::Dark)
            ->font('Poppins')
            ->colors([
                'danger' => Color::Rose,
                'info' => Color::Blue,
                'primary' => Color::Sky,
                'success' => Color::Emerald,
                'warning' => Color::Orange,
            ])
            ->maxContentWidth(MaxWidth::SevenExtraLarge)
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])->plugins([
                FilamentShieldPlugin::make(),
                FilamentEditProfilePlugin::make()
                    ->slug('Edit My Profile')
                    ->setTitle('Edit My Profile')
                    // ->setNavigationLabel('My Profile')
                    ->setNavigationGroup('User Management')
                    ->setIcon('heroicon-o-user')
                    // ->setSort(10)
                    // ->canAccess(fn () => auth()->user()->id === 1)
                    // ->shouldRegisterNavigation(false)
                    ->shouldShowDeleteAccountForm(true)
                    ->shouldShowSanctumTokens(
                    // condition: fn() => auth()->user()->id == 1, //optional   
                        permissions: ['custom', 'abilities', 'permissions'] //optional
                    )
                    ->shouldShowBrowserSessionsForm(
                        // fn() => auth()->user()->id === 1, //optional
                        //OR
                    true //optional
                    )
                    ->shouldShowAvatarForm(
                        value: true,
                        directory: 'avatars', // image will be stored in 'storage/app/public/avatars
                        rules: 'mimes:jpeg,png|max:1024' //only accept jpeg and png files with a maximum size of 1MB
                    ),
                    // ->customProfileComponents([
                    //     \App\Livewire\CustomProfileComponent::class,])
                    
                    // Enforce 2FA setup for all users
                    // TwoFactorAuthenticationPlugin::make()
                    // ->addTwoFactorMenuItem() // Add 2FA settings to user menu items
                    // ->enforceTwoFactorSetup(
                    //     false, // Enforce 2FA setup for all users
                    // ) 
                    //add new plugin here VVV
            ])
            //for edit-profile-plugin
            ->userMenuItems([
                'profile' => MenuItem::make()
                    ->label(fn() => auth()->user()->name)
                    ->url(fn (): string => EditProfilePage::getUrl())
                    ->icon('heroicon-m-user-circle')
                //If you are using tenancy need to check with the visible method where ->company() is the relation between the user and tenancy model as you called
                    // ->visible(function (): bool {
                    //     return auth()->user()->company()->exists();
                    // }),
            ]);
            // ->userMenuItems([
            //     MenuItem::make()
            //         ->label('Profile')
            //         ->url(fn (): string => Settings::getUrl())
            //         ->icon('heroicon-o-cog-6-tooth'),
            // ]);
    }
}