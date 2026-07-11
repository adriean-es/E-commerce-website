I am working on a Laravel ecommerce application. Here is my folder structure and file contents to help you understand my project. Please review this context and wait for my next question.

### Directory Structure
```text
ecommerce-app/
|-- app/
|   |-- Actions/
|   |   |-- Fortify/
|   |   |   |-- CreateNewUser.php
|   |   |   |-- PasswordValidationRules.php
|   |   |   |-- ResetUserPassword.php
|   |   |   |-- UpdateUserPassword.php
|   |   |   \-- UpdateUserProfileInformation.php
|   |   \-- Jetstream/
|   |       \-- DeleteUser.php
|   |-- Http/
|   |   |-- Controllers/
|   |   |   \-- Controller.php
|   |   \-- Middleware/
|   |       \-- HandleInertiaRequests.php
|   |-- Models/
|   |   \-- User.php
|   \-- Providers/
|       |-- AppServiceProvider.php
|       |-- FortifyServiceProvider.php
|       \-- JetstreamServiceProvider.php
|-- bootstrap/
|   |-- cache/
|   |   |-- .gitignore
|   |   |-- packages.php
|   |   \-- services.php
|   |-- app.php
|   \-- providers.php
|-- config/
|   |-- app.php
|   |-- auth.php
|   |-- cache.php
|   |-- database.php
|   |-- filesystems.php
|   |-- fortify.php
|   |-- jetstream.php
|   |-- logging.php
|   |-- mail.php
|   |-- queue.php
|   |-- sanctum.php
|   |-- services.php
|   \-- session.php
|-- database/
|   |-- factories/
|   |   \-- UserFactory.php
|   |-- migrations/
|   |   |-- 0001_01_01_000000_create_users_table.php
|   |   |-- 0001_01_01_000001_create_cache_table.php
|   |   |-- 0001_01_01_000002_create_jobs_table.php
|   |   |-- 2026_07_10_052522_add_two_factor_columns_to_users_table.php
|   |   |-- 2026_07_10_052523_create_passkeys_table.php
|   |   \-- 2026_07_10_052642_create_personal_access_tokens_table.php
|   |-- seeders/
|   |   \-- DatabaseSeeder.php
|   |-- .gitignore
|   \-- database.sqlite
|-- node_modules/
|   (contents skipped)
|-- public/
|   |-- build/
|   |   |-- assets/
|   |   |   |-- _plugin-vue_export-helper-DlAUqK2U.js
|   |   |   |-- ActionMessage-Sx1QBVLc.js
|   |   |   |-- ApiTokenManager-BoAe04Rs.js
|   |   |   |-- app-BG2D7S1e.css
|   |   |   |-- app-DsJ4COlh.js
|   |   |   |-- AppLayout-CAyVts_J.js
|   |   |   |-- AuthenticationCard-4unKHv8U.js
|   |   |   |-- AuthenticationCardLogo-Bf4LXq0U.js
|   |   |   |-- Checkbox-wi5km-BR.js
|   |   |   |-- ConfirmPassword-29glrrbY.js
|   |   |   |-- DangerButton-C-A6Br7h.js
|   |   |   |-- Dashboard-HkkJ6dgb.js
|   |   |   |-- DeleteUserForm-Cd43s3Aj.js
|   |   |   |-- DialogModal-C4rPUjBQ.js
|   |   |   |-- ForgotPassword-cA5791Fc.js
|   |   |   |-- FormSection-BC1oNm55.js
|   |   |   |-- Index-BQzIMDvX.js
|   |   |   |-- InputLabel-DC5S04v5.js
|   |   |   |-- Login-oQqoZMW1.js
|   |   |   |-- LogoutOtherBrowserSessionsForm-CsF3Gqig.js
|   |   |   |-- PrimaryButton-CJUs8_6-.js
|   |   |   |-- PrivacyPolicy-De-9ANHG.js
|   |   |   |-- Register-CwD4erIF.js
|   |   |   |-- ResetPassword-BLJpmhx6.js
|   |   |   |-- SecondaryButton-CYz5U_mB.js
|   |   |   |-- SectionBorder-JGFhNou_.js
|   |   |   |-- SectionTitle-DnptEXNM.js
|   |   |   |-- Show-BiQ8Kecq.js
|   |   |   |-- TermsOfService-ClxGAi5H.js
|   |   |   |-- TextInput-CfODIaKr.js
|   |   |   |-- TwoFactorAuthenticationForm-682eSr_g.js
|   |   |   |-- TwoFactorChallenge-Ro_5n22q.js
|   |   |   |-- UpdatePasswordForm-D2QLGNYa.js
|   |   |   |-- UpdateProfileInformationForm-9ZGZsXeb.js
|   |   |   |-- VerifyEmail-B8G3hGIK.js
|   |   |   \-- Welcome-Djmx4OVq.js
|   |   \-- manifest.json
|   |-- storage/
|   |   (contents skipped)
|   |-- .htaccess
|   |-- favicon.ico
|   |-- index.php
|   \-- robots.txt
|-- resources/
|   |-- css/
|   |   \-- app.css
|   |-- js/
|   |   |-- Components/
|   |   |   |-- ActionMessage.vue
|   |   |   |-- ActionSection.vue
|   |   |   |-- ApplicationLogo.vue
|   |   |   |-- ApplicationMark.vue
|   |   |   |-- AuthenticationCard.vue
|   |   |   |-- AuthenticationCardLogo.vue
|   |   |   |-- Banner.vue
|   |   |   |-- Checkbox.vue
|   |   |   |-- ConfirmationModal.vue
|   |   |   |-- ConfirmsPassword.vue
|   |   |   |-- DangerButton.vue
|   |   |   |-- DialogModal.vue
|   |   |   |-- Dropdown.vue
|   |   |   |-- DropdownLink.vue
|   |   |   |-- FormSection.vue
|   |   |   |-- InputError.vue
|   |   |   |-- InputLabel.vue
|   |   |   |-- Modal.vue
|   |   |   |-- NavLink.vue
|   |   |   |-- PrimaryButton.vue
|   |   |   |-- ResponsiveNavLink.vue
|   |   |   |-- SecondaryButton.vue
|   |   |   |-- SectionBorder.vue
|   |   |   |-- SectionTitle.vue
|   |   |   |-- TextInput.vue
|   |   |   \-- Welcome.vue
|   |   |-- Layouts/
|   |   |   \-- AppLayout.vue
|   |   |-- Pages/
|   |   |   |-- API/
|   |   |   |   |-- Partials/
|   |   |   |   |   \-- ApiTokenManager.vue
|   |   |   |   \-- Index.vue
|   |   |   |-- Auth/
|   |   |   |   |-- ConfirmPassword.vue
|   |   |   |   |-- ForgotPassword.vue
|   |   |   |   |-- Login.vue
|   |   |   |   |-- Register.vue
|   |   |   |   |-- ResetPassword.vue
|   |   |   |   |-- TwoFactorChallenge.vue
|   |   |   |   \-- VerifyEmail.vue
|   |   |   |-- Profile/
|   |   |   |   |-- Partials/
|   |   |   |   |   |-- DeleteUserForm.vue
|   |   |   |   |   |-- LogoutOtherBrowserSessionsForm.vue
|   |   |   |   |   |-- TwoFactorAuthenticationForm.vue
|   |   |   |   |   |-- UpdatePasswordForm.vue
|   |   |   |   |   \-- UpdateProfileInformationForm.vue
|   |   |   |   \-- Show.vue
|   |   |   |-- Dashboard.vue
|   |   |   |-- PrivacyPolicy.vue
|   |   |   |-- TermsOfService.vue
|   |   |   \-- Welcome.vue
|   |   |-- app.js
|   |   \-- bootstrap.js
|   |-- markdown/
|   |   |-- policy.md
|   |   \-- terms.md
|   \-- views/
|       |-- emails/
|       |   \-- team-invitation.blade.php
|       \-- app.blade.php
|-- routes/
|   |-- api.php
|   |-- console.php
|   \-- web.php
|-- storage/
|   (contents skipped)
|-- tests/
|   |-- Feature/
|   |   |-- ApiTokenPermissionsTest.php
|   |   |-- AuthenticationTest.php
|   |   |-- BrowserSessionsTest.php
|   |   |-- CreateApiTokenTest.php
|   |   |-- DeleteAccountTest.php
|   |   |-- DeleteApiTokenTest.php
|   |   |-- EmailVerificationTest.php
|   |   |-- ExampleTest.php
|   |   |-- PasswordConfirmationTest.php
|   |   |-- PasswordResetTest.php
|   |   |-- ProfileInformationTest.php
|   |   |-- RegistrationTest.php
|   |   |-- TwoFactorAuthenticationSettingsTest.php
|   |   \-- UpdatePasswordTest.php
|   |-- Unit/
|   |   \-- ExampleTest.php
|   \-- TestCase.php
|-- vendor/
|   (contents skipped)
|-- .editorconfig
|-- .env
|-- .env.example
|-- .gitattributes
|-- .gitignore
|-- artisan
|-- composer.json
|-- composer.lock
|-- jsconfig.json
|-- package.json
|-- package-lock.json
|-- phpunit.xml
|-- postcss.config.js
|-- README.md
|-- tailwind.config.js
\-- vite.config.js
```

### File Contents

#### app/Actions/Fortify/CreateNewUser.php
```php
<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}

```

#### app/Actions/Fortify/PasswordValidationRules.php
```php
<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array<int, Rule|array<mixed>|string>
     */
    protected function passwordRules(): array
    {
        return ['required', 'string', Password::default(), 'confirmed'];
    }
}

```

#### app/Actions/Fortify/ResetUserPassword.php
```php
<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\ResetsUserPasswords;

class ResetUserPassword implements ResetsUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and reset the user's forgotten password.
     *
     * @param  array<string, string>  $input
     *
     * @throws ValidationException
     */
    public function reset(User $user, array $input): void
    {
        Validator::make($input, [
            'password' => $this->passwordRules(),
        ])->validate();

        $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();
    }
}

```

#### app/Actions/Fortify/UpdateUserPassword.php
```php
<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class UpdateUserPassword implements UpdatesUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and update the user's password.
     *
     * @param  array<string, string>  $input
     *
     * @throws ValidationException
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'current_password' => ['required', 'string', 'current_password:web'],
            'password' => $this->passwordRules(),
        ], [
            'current_password.current_password' => __('The provided password does not match your current password.'),
        ])->validateWithBag('updatePassword');

        $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();
    }
}

```

#### app/Actions/Fortify/UpdateUserProfileInformation.php
```php
<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, mixed>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}

```

#### app/Actions/Jetstream/DeleteUser.php
```php
<?php

namespace App\Actions\Jetstream;

use App\Models\User;
use Laravel\Jetstream\Contracts\DeletesUsers;

class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     */
    public function delete(User $user): void
    {
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        $user->delete();
    }
}

```

#### app/Http/Controllers/Controller.php
```php
<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
}

```

#### app/Http/Middleware/HandleInertiaRequests.php
```php
<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            //
        ];
    }
}

```

#### app/Models/User.php
```php
<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    /** @use HasFactory<UserFactory> */
    use HasFactory;

    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}

```

#### app/Providers/AppServiceProvider.php
```php
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

```

#### app/Providers/FortifyServiceProvider.php
```php
<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::redirectUserForTwoFactorAuthenticationUsing(RedirectIfTwoFactorAuthenticatable::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        RateLimiter::for('passkeys', function (Request $request) {
            $credentialId = $request->input('credential.id');

            return Limit::perMinute(10)->by(
                ($credentialId ?: $request->session()->getId()).'|'.$request->ip()
            );
        });
    }
}

```

#### app/Providers/JetstreamServiceProvider.php
```php
<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);

        Vite::prefetch(concurrency: 3);
    }

    /**
     * Configure the permissions that are available within the application.
     */
    protected function configurePermissions(): void
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}

```

#### bootstrap/cache/.gitignore
```gitignore
*
!.gitignore

```

#### bootstrap/cache/packages.php
```php
<?php return array (
  'inertiajs/inertia-laravel' => 
  array (
    'providers' => 
    array (
      0 => 'Inertia\\ServiceProvider',
    ),
  ),
  'laravel/fortify' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Fortify\\FortifyServiceProvider',
    ),
  ),
  'laravel/jetstream' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Jetstream\\JetstreamServiceProvider',
    ),
  ),
  'laravel/pail' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Pail\\PailServiceProvider',
    ),
  ),
  'laravel/passkeys' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Passkeys\\PasskeysServiceProvider',
    ),
  ),
  'laravel/sail' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Sail\\SailServiceProvider',
    ),
  ),
  'laravel/sanctum' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Sanctum\\SanctumServiceProvider',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'nunomaduro/collision' => 
  array (
    'providers' => 
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
  'nunomaduro/termwind' => 
  array (
    'providers' => 
    array (
      0 => 'Termwind\\Laravel\\TermwindServiceProvider',
    ),
  ),
  'tightenco/ziggy' => 
  array (
    'providers' => 
    array (
      0 => 'Tighten\\Ziggy\\ZiggyServiceProvider',
    ),
  ),
);
```

#### bootstrap/cache/services.php
```php
<?php return array (
  'providers' => 
  array (
    0 => 'Illuminate\\Auth\\AuthServiceProvider',
    1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
    2 => 'Illuminate\\Bus\\BusServiceProvider',
    3 => 'Illuminate\\Cache\\CacheServiceProvider',
    4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    5 => 'Illuminate\\Concurrency\\ConcurrencyServiceProvider',
    6 => 'Illuminate\\Cookie\\CookieServiceProvider',
    7 => 'Illuminate\\Database\\DatabaseServiceProvider',
    8 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
    9 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
    10 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
    11 => 'Illuminate\\Hashing\\HashServiceProvider',
    12 => 'Illuminate\\Mail\\MailServiceProvider',
    13 => 'Illuminate\\Notifications\\NotificationServiceProvider',
    14 => 'Illuminate\\Pagination\\PaginationServiceProvider',
    15 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
    16 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
    17 => 'Illuminate\\Queue\\QueueServiceProvider',
    18 => 'Illuminate\\Redis\\RedisServiceProvider',
    19 => 'Illuminate\\Session\\SessionServiceProvider',
    20 => 'Illuminate\\Translation\\TranslationServiceProvider',
    21 => 'Illuminate\\Validation\\ValidationServiceProvider',
    22 => 'Illuminate\\View\\ViewServiceProvider',
    23 => 'Inertia\\ServiceProvider',
    24 => 'Laravel\\Fortify\\FortifyServiceProvider',
    25 => 'Laravel\\Jetstream\\JetstreamServiceProvider',
    26 => 'Laravel\\Pail\\PailServiceProvider',
    27 => 'Laravel\\Passkeys\\PasskeysServiceProvider',
    28 => 'Laravel\\Sail\\SailServiceProvider',
    29 => 'Laravel\\Sanctum\\SanctumServiceProvider',
    30 => 'Laravel\\Tinker\\TinkerServiceProvider',
    31 => 'Carbon\\Laravel\\ServiceProvider',
    32 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    33 => 'Termwind\\Laravel\\TermwindServiceProvider',
    34 => 'Tighten\\Ziggy\\ZiggyServiceProvider',
    35 => 'App\\Providers\\AppServiceProvider',
    36 => 'App\\Providers\\FortifyServiceProvider',
    37 => 'App\\Providers\\JetstreamServiceProvider',
  ),
  'eager' => 
  array (
    0 => 'Illuminate\\Auth\\AuthServiceProvider',
    1 => 'Illuminate\\Cookie\\CookieServiceProvider',
    2 => 'Illuminate\\Database\\DatabaseServiceProvider',
    3 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
    4 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
    5 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
    6 => 'Illuminate\\Notifications\\NotificationServiceProvider',
    7 => 'Illuminate\\Pagination\\PaginationServiceProvider',
    8 => 'Illuminate\\Session\\SessionServiceProvider',
    9 => 'Illuminate\\View\\ViewServiceProvider',
    10 => 'Inertia\\ServiceProvider',
    11 => 'Laravel\\Fortify\\FortifyServiceProvider',
    12 => 'Laravel\\Jetstream\\JetstreamServiceProvider',
    13 => 'Laravel\\Pail\\PailServiceProvider',
    14 => 'Laravel\\Passkeys\\PasskeysServiceProvider',
    15 => 'Laravel\\Sanctum\\SanctumServiceProvider',
    16 => 'Carbon\\Laravel\\ServiceProvider',
    17 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    18 => 'Termwind\\Laravel\\TermwindServiceProvider',
    19 => 'Tighten\\Ziggy\\ZiggyServiceProvider',
    20 => 'App\\Providers\\AppServiceProvider',
    21 => 'App\\Providers\\FortifyServiceProvider',
    22 => 'App\\Providers\\JetstreamServiceProvider',
  ),
  'deferred' => 
  array (
    'Illuminate\\Broadcasting\\BroadcastManager' => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
    'Illuminate\\Contracts\\Broadcasting\\Factory' => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
    'Illuminate\\Contracts\\Broadcasting\\Broadcaster' => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
    'Illuminate\\Bus\\Dispatcher' => 'Illuminate\\Bus\\BusServiceProvider',
    'Illuminate\\Contracts\\Bus\\Dispatcher' => 'Illuminate\\Bus\\BusServiceProvider',
    'Illuminate\\Contracts\\Bus\\QueueingDispatcher' => 'Illuminate\\Bus\\BusServiceProvider',
    'Illuminate\\Bus\\BatchRepository' => 'Illuminate\\Bus\\BusServiceProvider',
    'Illuminate\\Bus\\DatabaseBatchRepository' => 'Illuminate\\Bus\\BusServiceProvider',
    'cache' => 'Illuminate\\Cache\\CacheServiceProvider',
    'cache.store' => 'Illuminate\\Cache\\CacheServiceProvider',
    'cache.psr6' => 'Illuminate\\Cache\\CacheServiceProvider',
    'memcached.connector' => 'Illuminate\\Cache\\CacheServiceProvider',
    'Illuminate\\Cache\\RateLimiter' => 'Illuminate\\Cache\\CacheServiceProvider',
    'Illuminate\\Foundation\\Console\\AboutCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Cache\\Console\\ClearCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Cache\\Console\\ForgetCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\ClearCompiledCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Auth\\Console\\ClearResetsCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\ConfigCacheCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\ConfigClearCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\ConfigShowCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Database\\Console\\DbCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Database\\Console\\MonitorCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Database\\Console\\PruneCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Database\\Console\\ShowCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Database\\Console\\TableCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Database\\Console\\WipeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\DownCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\EnvironmentCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\EnvironmentDecryptCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\EnvironmentEncryptCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\EventCacheCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\EventClearCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\EventListCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Concurrency\\Console\\InvokeSerializedClosureCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\KeyGenerateCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\OptimizeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\OptimizeClearCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\PackageDiscoverCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Cache\\Console\\PruneStaleTagsCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Queue\\Console\\ClearCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Queue\\Console\\ListFailedCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Queue\\Console\\FlushFailedCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Queue\\Console\\ForgetFailedCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Queue\\Console\\ListenCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Queue\\Console\\MonitorCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Queue\\Console\\PauseCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Queue\\Console\\PruneBatchesCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Queue\\Console\\PruneFailedJobsCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Queue\\Console\\RestartCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Queue\\Console\\ResumeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Queue\\Console\\RetryCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Queue\\Console\\RetryBatchCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Queue\\Console\\WorkCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\ReloadCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\RouteCacheCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\RouteClearCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\RouteListCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Database\\Console\\DumpCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Database\\Console\\Seeds\\SeedCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Console\\Scheduling\\ScheduleFinishCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Console\\Scheduling\\ScheduleListCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Console\\Scheduling\\ScheduleRunCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Console\\Scheduling\\ScheduleClearCacheCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Console\\Scheduling\\ScheduleTestCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Console\\Scheduling\\ScheduleWorkCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Console\\Scheduling\\ScheduleInterruptCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Database\\Console\\ShowModelCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\StorageLinkCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\StorageUnlinkCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\UpCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\ViewCacheCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\ViewClearCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\ApiInstallCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\BroadcastingInstallCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Cache\\Console\\CacheTableCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\CastMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\ChannelListCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\ChannelMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\ClassMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\ComponentMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\ConfigMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\ConfigPublishCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\ConsoleMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Routing\\Console\\ControllerMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\DocsCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\EnumMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\EventGenerateCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\EventMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\ExceptionMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Database\\Console\\Factories\\FactoryMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\InterfaceMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\JobMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\JobMiddlewareMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\LangPublishCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\ListenerMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\MailMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Routing\\Console\\MiddlewareMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\ModelMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\NotificationMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Notifications\\Console\\NotificationTableCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\ObserverMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\PolicyMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\ProviderMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Queue\\Console\\FailedTableCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Queue\\Console\\TableCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Queue\\Console\\BatchesTableCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\RequestMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\ResourceMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\RuleMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\ScopeMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Database\\Console\\Seeds\\SeederMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Session\\Console\\SessionTableCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\ServeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\StubPublishCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\TestMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\TraitMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\VendorPublishCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Foundation\\Console\\ViewMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'migrator' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'migration.repository' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'migration.creator' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Database\\Migrations\\Migrator' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Database\\Console\\Migrations\\MigrateCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Database\\Console\\Migrations\\FreshCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Database\\Console\\Migrations\\InstallCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Database\\Console\\Migrations\\RefreshCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Database\\Console\\Migrations\\ResetCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Database\\Console\\Migrations\\RollbackCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Database\\Console\\Migrations\\StatusCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Database\\Console\\Migrations\\MigrateMakeCommand' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'composer' => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
    'Illuminate\\Concurrency\\ConcurrencyManager' => 'Illuminate\\Concurrency\\ConcurrencyServiceProvider',
    'hash' => 'Illuminate\\Hashing\\HashServiceProvider',
    'hash.driver' => 'Illuminate\\Hashing\\HashServiceProvider',
    'mail.manager' => 'Illuminate\\Mail\\MailServiceProvider',
    'mailer' => 'Illuminate\\Mail\\MailServiceProvider',
    'Illuminate\\Mail\\Markdown' => 'Illuminate\\Mail\\MailServiceProvider',
    'auth.password' => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
    'auth.password.broker' => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
    'Illuminate\\Contracts\\Pipeline\\Hub' => 'Illuminate\\Pipeline\\PipelineServiceProvider',
    'pipeline' => 'Illuminate\\Pipeline\\PipelineServiceProvider',
    'queue' => 'Illuminate\\Queue\\QueueServiceProvider',
    'queue.connection' => 'Illuminate\\Queue\\QueueServiceProvider',
    'queue.failer' => 'Illuminate\\Queue\\QueueServiceProvider',
    'queue.listener' => 'Illuminate\\Queue\\QueueServiceProvider',
    'queue.worker' => 'Illuminate\\Queue\\QueueServiceProvider',
    'redis' => 'Illuminate\\Redis\\RedisServiceProvider',
    'redis.connection' => 'Illuminate\\Redis\\RedisServiceProvider',
    'translator' => 'Illuminate\\Translation\\TranslationServiceProvider',
    'translation.loader' => 'Illuminate\\Translation\\TranslationServiceProvider',
    'validator' => 'Illuminate\\Validation\\ValidationServiceProvider',
    'validation.presence' => 'Illuminate\\Validation\\ValidationServiceProvider',
    'Illuminate\\Contracts\\Validation\\UncompromisedVerifier' => 'Illuminate\\Validation\\ValidationServiceProvider',
    'Laravel\\Sail\\Console\\InstallCommand' => 'Laravel\\Sail\\SailServiceProvider',
    'Laravel\\Sail\\Console\\PublishCommand' => 'Laravel\\Sail\\SailServiceProvider',
    'command.tinker' => 'Laravel\\Tinker\\TinkerServiceProvider',
  ),
  'when' => 
  array (
    'Illuminate\\Broadcasting\\BroadcastServiceProvider' => 
    array (
    ),
    'Illuminate\\Bus\\BusServiceProvider' => 
    array (
    ),
    'Illuminate\\Cache\\CacheServiceProvider' => 
    array (
    ),
    'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider' => 
    array (
    ),
    'Illuminate\\Concurrency\\ConcurrencyServiceProvider' => 
    array (
    ),
    'Illuminate\\Hashing\\HashServiceProvider' => 
    array (
    ),
    'Illuminate\\Mail\\MailServiceProvider' => 
    array (
    ),
    'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider' => 
    array (
    ),
    'Illuminate\\Pipeline\\PipelineServiceProvider' => 
    array (
    ),
    'Illuminate\\Queue\\QueueServiceProvider' => 
    array (
    ),
    'Illuminate\\Redis\\RedisServiceProvider' => 
    array (
    ),
    'Illuminate\\Translation\\TranslationServiceProvider' => 
    array (
    ),
    'Illuminate\\Validation\\ValidationServiceProvider' => 
    array (
    ),
    'Laravel\\Sail\\SailServiceProvider' => 
    array (
    ),
    'Laravel\\Tinker\\TinkerServiceProvider' => 
    array (
    ),
  ),
);
```

#### bootstrap/app.php
```php
<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            \App\Http\Middleware\HandleInertiaRequests::class,
            \Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets::class,
        ]);

        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

```

#### bootstrap/providers.php
```php
<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\FortifyServiceProvider::class,
    App\Providers\JetstreamServiceProvider::class,
];

```

#### config/app.php
```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application, which will be used when the
    | framework needs to place the application's name in a notification or
    | other UI elements where an application name needs to be displayed.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | the application so that it's available within Artisan commands.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. The timezone
    | is set to "UTC" by default as it is suitable for most use cases.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by Laravel's translation / localization methods. This option can be
    | set to any locale for which you plan to have translation strings.
    |
    */

    'locale' => env('APP_LOCALE', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is utilized by Laravel's encryption services and should be set
    | to a random, 32 character string to ensure that all encrypted values
    | are secure. You should do this prior to deploying the application.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];

```

#### config/auth.php
```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option defines the default authentication "guard" and password
    | reset "broker" for your application. You may change these values
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | which utilizes session storage plus the Eloquent user provider.
    |
    | All authentication guards have a user provider, which defines how the
    | users are actually retrieved out of your database or other storage
    | system used by the application. Typically, Eloquent is utilized.
    |
    | Supported: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication guards have a user provider, which defines how the
    | users are actually retrieved out of your database or other storage
    | system used by the application. Typically, Eloquent is utilized.
    |
    | If you have multiple user tables or models you may configure multiple
    | providers to represent the model / table. These providers may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', App\Models\User::class),
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | These configuration options specify the behavior of Laravel's password
    | reset functionality, including the table utilized for token storage
    | and the user provider that is invoked to actually retrieve users.
    |
    | The expiry time is the number of minutes that each reset token will be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    | The throttle setting is the number of seconds a user must wait before
    | generating more password reset tokens. This prevents the user from
    | quickly generating a very large amount of password reset tokens.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may define the amount of seconds before a password confirmation
    | window expires and users are asked to re-enter their password via the
    | confirmation screen. By default, the timeout lasts for three hours.
    |
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];

```

#### config/cache.php
```php
<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Cache Store
    |--------------------------------------------------------------------------
    |
    | This option controls the default cache store that will be used by the
    | framework. This connection is utilized if another isn't explicitly
    | specified when running a cache operation inside the application.
    |
    */

    'default' => env('CACHE_STORE', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Cache Stores
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the cache "stores" for your application as
    | well as their drivers. You may even define multiple stores for the
    | same cache driver to group types of items stored in your caches.
    |
    | Supported drivers: "array", "database", "file", "memcached",
    |                    "redis", "dynamodb", "octane", "null"
    |
    */

    'stores' => [

        'array' => [
            'driver' => 'array',
            'serialize' => false,
        ],

        'database' => [
            'driver' => 'database',
            'connection' => env('DB_CACHE_CONNECTION'),
            'table' => env('DB_CACHE_TABLE', 'cache'),
            'lock_connection' => env('DB_CACHE_LOCK_CONNECTION'),
            'lock_table' => env('DB_CACHE_LOCK_TABLE'),
        ],

        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache/data'),
            'lock_path' => storage_path('framework/cache/data'),
        ],

        'memcached' => [
            'driver' => 'memcached',
            'persistent_id' => env('MEMCACHED_PERSISTENT_ID'),
            'sasl' => [
                env('MEMCACHED_USERNAME'),
                env('MEMCACHED_PASSWORD'),
            ],
            'options' => [
                // Memcached::OPT_CONNECT_TIMEOUT => 2000,
            ],
            'servers' => [
                [
                    'host' => env('MEMCACHED_HOST', '127.0.0.1'),
                    'port' => env('MEMCACHED_PORT', 11211),
                    'weight' => 100,
                ],
            ],
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => env('REDIS_CACHE_CONNECTION', 'cache'),
            'lock_connection' => env('REDIS_CACHE_LOCK_CONNECTION', 'default'),
        ],

        'dynamodb' => [
            'driver' => 'dynamodb',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'table' => env('DYNAMODB_CACHE_TABLE', 'cache'),
            'endpoint' => env('DYNAMODB_ENDPOINT'),
        ],

        'octane' => [
            'driver' => 'octane',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Cache Key Prefix
    |--------------------------------------------------------------------------
    |
    | When utilizing the APC, database, memcached, Redis, and DynamoDB cache
    | stores, there might be other applications using the same cache. For
    | that reason, you may prefix every cache key to avoid collisions.
    |
    */

    'prefix' => env('CACHE_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_cache_'),

];

```

#### config/database.php
```php
<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for database operations. This is
    | the connection which will be utilized unless another connection
    | is explicitly specified when you execute a query / statement.
    |
    */

    'default' => env('DB_CONNECTION', 'sqlite'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Below are all of the database connections defined for your application.
    | An example configuration is provided for each database system which
    | is supported by Laravel. You're free to add / remove connections.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DB_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
            'busy_timeout' => null,
            'journal_mode' => null,
            'synchronous' => null,
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'mariadb' => [
            'driver' => 'mariadb',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => env('DB_CHARSET', 'utf8'),
            'prefix' => '',
            'prefix_indexes' => true,
            'search_path' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => env('DB_CHARSET', 'utf8'),
            'prefix' => '',
            'prefix_indexes' => true,
            // 'encrypt' => env('DB_ENCRYPT', 'yes'),
            // 'trust_server_certificate' => env('DB_TRUST_SERVER_CERTIFICATE', 'false'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run on the database.
    |
    */

    'migrations' => [
        'table' => 'migrations',
        'update_date_on_publish' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as Memcached. You may define your connection settings here.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
            'persistent' => env('REDIS_PERSISTENT', false),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];

```

#### config/filesystems.php
```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application for file storage.
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Below you may configure as many filesystem disks as necessary, and you
    | may even configure multiple disks for the same driver. Examples for
    | most supported storage drivers are configured here for reference.
    |
    | Supported drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/private'),
            'serve' => true,
            'throw' => false,
            'report' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
            'report' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];

```

#### config/fortify.php
```php
<?php

use Laravel\Fortify\Features;

return [

    /*
    |--------------------------------------------------------------------------
    | Fortify Guard
    |--------------------------------------------------------------------------
    |
    | Here you may specify which authentication guard Fortify will use while
    | authenticating users. This value should correspond with one of your
    | guards that is already present in your "auth" configuration file.
    |
    */

    'guard' => 'web',

    /*
    |--------------------------------------------------------------------------
    | Fortify Password Broker
    |--------------------------------------------------------------------------
    |
    | Here you may specify which password broker Fortify can use when a user
    | is resetting their password. This configured value should match one
    | of your password brokers setup in your "auth" configuration file.
    |
    */

    'passwords' => 'users',

    /*
    |--------------------------------------------------------------------------
    | Username / Email
    |--------------------------------------------------------------------------
    |
    | This value defines which model attribute should be considered as your
    | application's "username" field. Typically, this might be the email
    | address of the users but you are free to change this value here.
    |
    | Out of the box, Fortify expects forgot password and reset password
    | requests to have a field named 'email'. If the application uses
    | another name for the field you may define it below as needed.
    |
    */

    'username' => 'email',

    'email' => 'email',

    /*
    |--------------------------------------------------------------------------
    | Lowercase Usernames
    |--------------------------------------------------------------------------
    |
    | This value defines whether usernames should be lowercased before saving
    | them in the database, as some database system string fields are case
    | sensitive. You may disable this for your application if necessary.
    |
    */

    'lowercase_usernames' => true,

    /*
    |--------------------------------------------------------------------------
    | Home Path
    |--------------------------------------------------------------------------
    |
    | Here you may configure the path where users will get redirected during
    | authentication or password reset when the operations are successful
    | and the user is authenticated. You are free to change this value.
    |
    */

    'home' => '/dashboard',

    /*
    |--------------------------------------------------------------------------
    | Fortify Routes Prefix / Subdomain
    |--------------------------------------------------------------------------
    |
    | Here you may specify which prefix Fortify will assign to all the routes
    | that it registers with the application. If necessary, you may change
    | subdomain under which all of the Fortify routes will be available.
    |
    */

    'prefix' => '',

    'domain' => null,

    /*
    |--------------------------------------------------------------------------
    | Fortify Routes Middleware
    |--------------------------------------------------------------------------
    |
    | Here you may specify which middleware Fortify will assign to the routes
    | that it registers with the application. If necessary, you may change
    | these middleware but typically this provided default is preferred.
    |
    */

    'middleware' => ['web'],

    /*
    |--------------------------------------------------------------------------
    | Rate Limiting
    |--------------------------------------------------------------------------
    |
    | By default, Fortify will throttle logins to five requests per minute for
    | every email and IP address combination. However, if you would like to
    | specify a custom rate limiter to call then you may specify it here.
    |
    */

    'limiters' => [
        'login' => 'login',
        'two-factor' => 'two-factor',
        'passkeys' => 'passkeys',
    ],

    /*
    |--------------------------------------------------------------------------
    | Register View Routes
    |--------------------------------------------------------------------------
    |
    | Here you may specify if the routes returning views should be disabled as
    | you may not need them when building your own application. This may be
    | especially true if you're writing a custom single-page application.
    |
    */

    'views' => true,

    /*
    |--------------------------------------------------------------------------
    | Passkeys
    |--------------------------------------------------------------------------
    |
    | These settings configure Fortify's passkey (WebAuthn) support. Passkeys
    | allow users to sign in without needing to remember credentials since
    | they use public-key cryptography - making them immune to breaches.
    |
    */

    'passkeys' => [
        'relying_party_id' => parse_url(config('app.url'), PHP_URL_HOST),
        'allowed_origins' => [config('app.url')],
        'timeout' => 60000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Features
    |--------------------------------------------------------------------------
    |
    | Some of the Fortify features are optional. You may disable the features
    | by removing them from this array. You're free to only remove some of
    | these features or you can even remove all of these if you need to.
    |
    */

    'features' => [
        Features::registration(),
        Features::resetPasswords(),
        // Features::emailVerification(),
        Features::updateProfileInformation(),
        Features::updatePasswords(),
        Features::twoFactorAuthentication([
            'confirm' => true,
            'confirmPassword' => true,
            // 'window' => 0,
        ]),
        Features::passkeys([
            'confirmPassword' => true,
        ]),
    ],

];

```

#### config/jetstream.php
```php
<?php

use Laravel\Jetstream\Features;
use Laravel\Jetstream\Http\Middleware\AuthenticateSession;

return [

    /*
    |--------------------------------------------------------------------------
    | Jetstream Stack
    |--------------------------------------------------------------------------
    |
    | This configuration value informs Jetstream which "stack" you will be
    | using for your application. In general, this value is set for you
    | during installation and will not need to be changed after that.
    |
    */

    'stack' => 'inertia',

    /*
    |--------------------------------------------------------------------------
    | Jetstream Route Middleware
    |--------------------------------------------------------------------------
    |
    | Here you may specify which middleware Jetstream will assign to the routes
    | that it registers with the application. When necessary, you may modify
    | these middleware; however, this default value is usually sufficient.
    |
    */

    'middleware' => ['web'],

    'auth_session' => AuthenticateSession::class,

    /*
    |--------------------------------------------------------------------------
    | Jetstream Guard
    |--------------------------------------------------------------------------
    |
    | Here you may specify the authentication guard Jetstream will use while
    | authenticating users. This value should correspond with one of your
    | guards that is already present in your "auth" configuration file.
    |
    */

    'guard' => 'sanctum',

    /*
    |--------------------------------------------------------------------------
    | Features
    |--------------------------------------------------------------------------
    |
    | Some of Jetstream's features are optional. You may disable the features
    | by removing them from this array. You're free to only remove some of
    | these features or you can even remove all of these if you need to.
    |
    */

    'features' => [
        // Features::termsAndPrivacyPolicy(),
        // Features::profilePhotos(),
        // Features::api(),
        // Features::teams(['invitations' => true]),
        Features::accountDeletion(),
    ],

    /*
    |--------------------------------------------------------------------------
    | Profile Photo Disk
    |--------------------------------------------------------------------------
    |
    | This configuration value determines the default disk that will be used
    | when storing profile photos for your application's users. Typically
    | this will be the "public" disk but you may adjust this if needed.
    |
    */

    'profile_photo_disk' => 'public',

];

```

#### config/logging.php
```php
<?php

use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;
use Monolog\Processor\PsrLogMessageProcessor;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | This option defines the default log channel that is utilized to write
    | messages to your logs. The value provided here should match one of
    | the channels present in the list of "channels" configured below.
    |
    */

    'default' => env('LOG_CHANNEL', 'stack'),

    /*
    |--------------------------------------------------------------------------
    | Deprecations Log Channel
    |--------------------------------------------------------------------------
    |
    | This option controls the log channel that should be used to log warnings
    | regarding deprecated PHP and library features. This allows you to get
    | your application ready for upcoming major versions of dependencies.
    |
    */

    'deprecations' => [
        'channel' => env('LOG_DEPRECATIONS_CHANNEL', 'null'),
        'trace' => env('LOG_DEPRECATIONS_TRACE', false),
    ],

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log channels for your application. Laravel
    | utilizes the Monolog PHP logging library, which includes a variety
    | of powerful log handlers and formatters that you're free to use.
    |
    | Available drivers: "single", "daily", "slack", "syslog",
    |                    "errorlog", "monolog", "custom", "stack"
    |
    */

    'channels' => [

        'stack' => [
            'driver' => 'stack',
            'channels' => explode(',', env('LOG_STACK', 'single')),
            'ignore_exceptions' => false,
        ],

        'single' => [
            'driver' => 'single',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            'replace_placeholders' => true,
        ],

        'daily' => [
            'driver' => 'daily',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => env('LOG_DAILY_DAYS', 14),
            'replace_placeholders' => true,
        ],

        'slack' => [
            'driver' => 'slack',
            'url' => env('LOG_SLACK_WEBHOOK_URL'),
            'username' => env('LOG_SLACK_USERNAME', 'Laravel Log'),
            'emoji' => env('LOG_SLACK_EMOJI', ':boom:'),
            'level' => env('LOG_LEVEL', 'critical'),
            'replace_placeholders' => true,
        ],

        'papertrail' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
            'handler' => env('LOG_PAPERTRAIL_HANDLER', SyslogUdpHandler::class),
            'handler_with' => [
                'host' => env('PAPERTRAIL_URL'),
                'port' => env('PAPERTRAIL_PORT'),
                'connectionString' => 'tls://'.env('PAPERTRAIL_URL').':'.env('PAPERTRAIL_PORT'),
            ],
            'processors' => [PsrLogMessageProcessor::class],
        ],

        'stderr' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
            'handler' => StreamHandler::class,
            'formatter' => env('LOG_STDERR_FORMATTER'),
            'with' => [
                'stream' => 'php://stderr',
            ],
            'processors' => [PsrLogMessageProcessor::class],
        ],

        'syslog' => [
            'driver' => 'syslog',
            'level' => env('LOG_LEVEL', 'debug'),
            'facility' => env('LOG_SYSLOG_FACILITY', LOG_USER),
            'replace_placeholders' => true,
        ],

        'errorlog' => [
            'driver' => 'errorlog',
            'level' => env('LOG_LEVEL', 'debug'),
            'replace_placeholders' => true,
        ],

        'null' => [
            'driver' => 'monolog',
            'handler' => NullHandler::class,
        ],

        'emergency' => [
            'path' => storage_path('logs/laravel.log'),
        ],

    ],

];

```

#### config/mail.php
```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Mailer
    |--------------------------------------------------------------------------
    |
    | This option controls the default mailer that is used to send all email
    | messages unless another mailer is explicitly specified when sending
    | the message. All additional mailers can be configured within the
    | "mailers" array. Examples of each type of mailer are provided.
    |
    */

    'default' => env('MAIL_MAILER', 'log'),

    /*
    |--------------------------------------------------------------------------
    | Mailer Configurations
    |--------------------------------------------------------------------------
    |
    | Here you may configure all of the mailers used by your application plus
    | their respective settings. Several examples have been configured for
    | you and you are free to add your own as your application requires.
    |
    | Laravel supports a variety of mail "transport" drivers that can be used
    | when delivering an email. You may specify which one you're using for
    | your mailers below. You may also add additional mailers if needed.
    |
    | Supported: "smtp", "sendmail", "mailgun", "ses", "ses-v2",
    |            "postmark", "resend", "log", "array",
    |            "failover", "roundrobin"
    |
    */

    'mailers' => [

        'smtp' => [
            'transport' => 'smtp',
            'scheme' => env('MAIL_SCHEME'),
            'url' => env('MAIL_URL'),
            'host' => env('MAIL_HOST', '127.0.0.1'),
            'port' => env('MAIL_PORT', 2525),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url(env('APP_URL', 'http://localhost'), PHP_URL_HOST)),
        ],

        'ses' => [
            'transport' => 'ses',
        ],

        'postmark' => [
            'transport' => 'postmark',
            // 'message_stream_id' => env('POSTMARK_MESSAGE_STREAM_ID'),
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],

        'resend' => [
            'transport' => 'resend',
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp',
                'log',
            ],
        ],

        'roundrobin' => [
            'transport' => 'roundrobin',
            'mailers' => [
                'ses',
                'postmark',
            ],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
    | You may wish for all emails sent by your application to be sent from
    | the same address. Here you may specify a name and address that is
    | used globally for all emails that are sent by your application.
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],

];

```

#### config/queue.php
```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Queue Connection Name
    |--------------------------------------------------------------------------
    |
    | Laravel's queue supports a variety of backends via a single, unified
    | API, giving you convenient access to each backend using identical
    | syntax for each. The default queue connection is defined below.
    |
    */

    'default' => env('QUEUE_CONNECTION', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Queue Connections
    |--------------------------------------------------------------------------
    |
    | Here you may configure the connection options for every queue backend
    | used by your application. An example configuration is provided for
    | each backend supported by Laravel. You're also free to add more.
    |
    | Drivers: "sync", "database", "beanstalkd", "sqs", "redis", "null"
    |
    */

    'connections' => [

        'sync' => [
            'driver' => 'sync',
        ],

        'database' => [
            'driver' => 'database',
            'connection' => env('DB_QUEUE_CONNECTION'),
            'table' => env('DB_QUEUE_TABLE', 'jobs'),
            'queue' => env('DB_QUEUE', 'default'),
            'retry_after' => (int) env('DB_QUEUE_RETRY_AFTER', 90),
            'after_commit' => false,
        ],

        'beanstalkd' => [
            'driver' => 'beanstalkd',
            'host' => env('BEANSTALKD_QUEUE_HOST', 'localhost'),
            'queue' => env('BEANSTALKD_QUEUE', 'default'),
            'retry_after' => (int) env('BEANSTALKD_QUEUE_RETRY_AFTER', 90),
            'block_for' => 0,
            'after_commit' => false,
        ],

        'sqs' => [
            'driver' => 'sqs',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'prefix' => env('SQS_PREFIX', 'https://sqs.us-east-1.amazonaws.com/your-account-id'),
            'queue' => env('SQS_QUEUE', 'default'),
            'suffix' => env('SQS_SUFFIX'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'after_commit' => false,
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => env('REDIS_QUEUE_CONNECTION', 'default'),
            'queue' => env('REDIS_QUEUE', 'default'),
            'retry_after' => (int) env('REDIS_QUEUE_RETRY_AFTER', 90),
            'block_for' => null,
            'after_commit' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Job Batching
    |--------------------------------------------------------------------------
    |
    | The following options configure the database and table that store job
    | batching information. These options can be updated to any database
    | connection and table which has been defined by your application.
    |
    */

    'batching' => [
        'database' => env('DB_CONNECTION', 'sqlite'),
        'table' => 'job_batches',
    ],

    /*
    |--------------------------------------------------------------------------
    | Failed Queue Jobs
    |--------------------------------------------------------------------------
    |
    | These options configure the behavior of failed queue job logging so you
    | can control how and where failed jobs are stored. Laravel ships with
    | support for storing failed jobs in a simple file or in a database.
    |
    | Supported drivers: "database-uuids", "dynamodb", "file", "null"
    |
    */

    'failed' => [
        'driver' => env('QUEUE_FAILED_DRIVER', 'database-uuids'),
        'database' => env('DB_CONNECTION', 'sqlite'),
        'table' => 'failed_jobs',
    ],

];

```

#### config/sanctum.php
```php
<?php

use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Laravel\Sanctum\Http\Middleware\AuthenticateSession;
use Laravel\Sanctum\Sanctum;

return [

    /*
    |--------------------------------------------------------------------------
    | Stateful Domains
    |--------------------------------------------------------------------------
    |
    | Requests from the following domains / hosts will receive stateful API
    | authentication cookies. Typically, these should include your local
    | and production domains which access your API via a frontend SPA.
    |
    */

    'stateful' => explode(',', env('SANCTUM_STATEFUL_DOMAINS', sprintf(
        '%s%s',
        'localhost,localhost:3000,127.0.0.1,127.0.0.1:8000,::1',
        Sanctum::currentApplicationUrlWithPort(),
        // Sanctum::currentRequestHost(),
    ))),

    /*
    |--------------------------------------------------------------------------
    | Sanctum Guards
    |--------------------------------------------------------------------------
    |
    | This array contains the authentication guards that will be checked when
    | Sanctum is trying to authenticate a request. If none of these guards
    | are able to authenticate the request, Sanctum will use the bearer
    | token that's present on an incoming request for authentication.
    |
    */

    'guard' => ['web'],

    /*
    |--------------------------------------------------------------------------
    | Expiration Minutes
    |--------------------------------------------------------------------------
    |
    | This value controls the number of minutes until an issued token will be
    | considered expired. This will override any values set in the token's
    | "expires_at" attribute, but first-party sessions are not affected.
    |
    */

    'expiration' => null,

    /*
    |--------------------------------------------------------------------------
    | Token Prefix
    |--------------------------------------------------------------------------
    |
    | Sanctum can prefix new tokens in order to take advantage of numerous
    | security scanning initiatives maintained by open source platforms
    | that notify developers if they commit tokens into repositories.
    |
    | See: https://docs.github.com/en/code-security/secret-scanning/about-secret-scanning
    |
    */

    'token_prefix' => env('SANCTUM_TOKEN_PREFIX', ''),

    /*
    |--------------------------------------------------------------------------
    | Sanctum Middleware
    |--------------------------------------------------------------------------
    |
    | When authenticating your first-party SPA with Sanctum you may need to
    | customize some of the middleware Sanctum uses while processing the
    | request. You may change the middleware listed below as required.
    |
    */

    'middleware' => [
        'authenticate_session' => AuthenticateSession::class,
        'encrypt_cookies' => EncryptCookies::class,
        'validate_csrf_token' => ValidateCsrfToken::class,
    ],

];

```

#### config/services.php
```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

];

```

#### config/session.php
```php
<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Session Driver
    |--------------------------------------------------------------------------
    |
    | This option determines the default session driver that is utilized for
    | incoming requests. Laravel supports a variety of storage options to
    | persist session data. Database storage is a great default choice.
    |
    | Supported: "file", "cookie", "database", "apc",
    |            "memcached", "redis", "dynamodb", "array"
    |
    */

    'driver' => env('SESSION_DRIVER', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Session Lifetime
    |--------------------------------------------------------------------------
    |
    | Here you may specify the number of minutes that you wish the session
    | to be allowed to remain idle before it expires. If you want them
    | to expire immediately when the browser is closed then you may
    | indicate that via the expire_on_close configuration option.
    |
    */

    'lifetime' => (int) env('SESSION_LIFETIME', 120),

    'expire_on_close' => env('SESSION_EXPIRE_ON_CLOSE', false),

    /*
    |--------------------------------------------------------------------------
    | Session Encryption
    |--------------------------------------------------------------------------
    |
    | This option allows you to easily specify that all of your session data
    | should be encrypted before it's stored. All encryption is performed
    | automatically by Laravel and you may use the session like normal.
    |
    */

    'encrypt' => env('SESSION_ENCRYPT', false),

    /*
    |--------------------------------------------------------------------------
    | Session File Location
    |--------------------------------------------------------------------------
    |
    | When utilizing the "file" session driver, the session files are placed
    | on disk. The default storage location is defined here; however, you
    | are free to provide another location where they should be stored.
    |
    */

    'files' => storage_path('framework/sessions'),

    /*
    |--------------------------------------------------------------------------
    | Session Database Connection
    |--------------------------------------------------------------------------
    |
    | When using the "database" or "redis" session drivers, you may specify a
    | connection that should be used to manage these sessions. This should
    | correspond to a connection in your database configuration options.
    |
    */

    'connection' => env('SESSION_CONNECTION'),

    /*
    |--------------------------------------------------------------------------
    | Session Database Table
    |--------------------------------------------------------------------------
    |
    | When using the "database" session driver, you may specify the table to
    | be used to store sessions. Of course, a sensible default is defined
    | for you; however, you're welcome to change this to another table.
    |
    */

    'table' => env('SESSION_TABLE', 'sessions'),

    /*
    |--------------------------------------------------------------------------
    | Session Cache Store
    |--------------------------------------------------------------------------
    |
    | When using one of the framework's cache driven session backends, you may
    | define the cache store which should be used to store the session data
    | between requests. This must match one of your defined cache stores.
    |
    | Affects: "apc", "dynamodb", "memcached", "redis"
    |
    */

    'store' => env('SESSION_STORE'),

    /*
    |--------------------------------------------------------------------------
    | Session Sweeping Lottery
    |--------------------------------------------------------------------------
    |
    | Some session drivers must manually sweep their storage location to get
    | rid of old sessions from storage. Here are the chances that it will
    | happen on a given request. By default, the odds are 2 out of 100.
    |
    */

    'lottery' => [2, 100],

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Name
    |--------------------------------------------------------------------------
    |
    | Here you may change the name of the session cookie that is created by
    | the framework. Typically, you should not need to change this value
    | since doing so does not grant a meaningful security improvement.
    |
    */

    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug(env('APP_NAME', 'laravel'), '_').'_session'
    ),

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Path
    |--------------------------------------------------------------------------
    |
    | The session cookie path determines the path for which the cookie will
    | be regarded as available. Typically, this will be the root path of
    | your application, but you're free to change this when necessary.
    |
    */

    'path' => env('SESSION_PATH', '/'),

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Domain
    |--------------------------------------------------------------------------
    |
    | This value determines the domain and subdomains the session cookie is
    | available to. By default, the cookie will be available to the root
    | domain and all subdomains. Typically, this shouldn't be changed.
    |
    */

    'domain' => env('SESSION_DOMAIN'),

    /*
    |--------------------------------------------------------------------------
    | HTTPS Only Cookies
    |--------------------------------------------------------------------------
    |
    | By setting this option to true, session cookies will only be sent back
    | to the server if the browser has a HTTPS connection. This will keep
    | the cookie from being sent to you when it can't be done securely.
    |
    */

    'secure' => env('SESSION_SECURE_COOKIE'),

    /*
    |--------------------------------------------------------------------------
    | HTTP Access Only
    |--------------------------------------------------------------------------
    |
    | Setting this value to true will prevent JavaScript from accessing the
    | value of the cookie and the cookie will only be accessible through
    | the HTTP protocol. It's unlikely you should disable this option.
    |
    */

    'http_only' => env('SESSION_HTTP_ONLY', true),

    /*
    |--------------------------------------------------------------------------
    | Same-Site Cookies
    |--------------------------------------------------------------------------
    |
    | This option determines how your cookies behave when cross-site requests
    | take place, and can be used to mitigate CSRF attacks. By default, we
    | will set this value to "lax" to permit secure cross-site requests.
    |
    | See: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Set-Cookie#samesitesamesite-value
    |
    | Supported: "lax", "strict", "none", null
    |
    */

    'same_site' => env('SESSION_SAME_SITE', 'lax'),

    /*
    |--------------------------------------------------------------------------
    | Partitioned Cookies
    |--------------------------------------------------------------------------
    |
    | Setting this value to true will tie the cookie to the top-level site for
    | a cross-site context. Partitioned cookies are accepted by the browser
    | when flagged "secure" and the Same-Site attribute is set to "none".
    |
    */

    'partitioned' => env('SESSION_PARTITIONED_COOKIE', false),

];

```

#### database/factories/UserFactory.php
```php
<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Indicate that the user should have a personal team.
     */
    public function withPersonalTeam(?callable $callback = null): static
    {
        if (! Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(fn (array $attributes, User $user) => [
                    'name' => $user->name.'\'s Team',
                    'user_id' => $user->id,
                    'personal_team' => true,
                ])
                ->when(is_callable($callback), $callback),
            'ownedTeams'
        );
    }
}

```

#### database/migrations/0001_01_01_000000_create_users_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};

```

#### database/migrations/0001_01_01_000001_create_cache_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->mediumText('value');
            $table->integer('expiration');
        });

        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('owner');
            $table->integer('expiration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
};

```

#### database/migrations/0001_01_01_000002_create_jobs_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('queue')->index();
            $table->longText('payload');
            $table->unsignedTinyInteger('attempts');
            $table->unsignedInteger('reserved_at')->nullable();
            $table->unsignedInteger('available_at');
            $table->unsignedInteger('created_at');
        });

        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->integer('total_jobs');
            $table->integer('pending_jobs');
            $table->integer('failed_jobs');
            $table->longText('failed_job_ids');
            $table->mediumText('options')->nullable();
            $table->integer('cancelled_at')->nullable();
            $table->integer('created_at');
            $table->integer('finished_at')->nullable();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('failed_jobs');
    }
};

```

#### database/migrations/2026_07_10_052522_add_two_factor_columns_to_users_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('two_factor_secret')
                ->after('password')
                ->nullable();

            $table->text('two_factor_recovery_codes')
                ->after('two_factor_secret')
                ->nullable();

            $table->timestamp('two_factor_confirmed_at')
                ->after('two_factor_recovery_codes')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'two_factor_secret',
                'two_factor_recovery_codes',
                'two_factor_confirmed_at',
            ]);
        });
    }
};

```

#### database/migrations/2026_07_10_052523_create_passkeys_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Passkeys\Passkeys;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('passkeys', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Passkeys::userModel(), 'user_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('credential_id')->unique();
            $table->json('credential');
            $table->timestamp('last_used_at')->nullable();
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passkeys');
    }
};

```

#### database/migrations/2026_07_10_052642_create_personal_access_tokens_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->text('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};

```

#### database/seeders/DatabaseSeeder.php
```php
<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}

```

#### database/.gitignore
```gitignore
*.sqlite*

```

#### database/database.sqlite
```sqlite
(File too large, truncated to first 50k characters...)
SQLite format 3   @     S                                                               S ._   û    ûUA6
Ê
L	
!±	X­X¾!“›M                                                                                                          ‚c…tablepasskeyspasskeysCREATE TABLE "passkeys" ("id" integer primary key autoincrement not null, "user_id" integer not null, "name" varchar not null, "credential_id" varchar not null, "credential" text not null, "last_used_at" datetime, "created_at" datetime, "updated_at" datetime, foreign key("user_id") references "users"("id") on delete cascade)ƒ,†7tableusersusersCREATE TABLE "users" ("id" integer primary key autoincrement not null, "name" varchar not null, "email" varchar not null, "email_verified_at" datetime, "password" varchar not null, "remember_token" varchar, "current_team_id" integer, "profile_photo_path" varchar, "created_at" datetime, "updated_at" datetime, "two_factor_secret" text, "two_factor_recovery_codes" text, "two_factor_confirmed_at" datetime)v;#indexfailed_jobs_uuid_uniquefailed_jobsCREATE UNIQUE INDEX "failed_jobs_uuid_unique" on "failed_jobs" ("uuid")‚(##„tablefailed_jobsfailed_jobsCREATE TABLE "failed_jobs" ("id" integer primary key autoincrement not null, "uuid" varchar not null, "connection" text not null, "queue" text not null, "payload" text not null, "exception" text not null, "failed_at" datetime not null default CURRENT_TIMESTAMP)‚`##…tablejob_batchesjob_batchesCREATE TABLE "job_batches" ("id" varchar not null, "name" varchar not null, "total_jobs" integer not null, "pending_jobs" integer not null, "failed_jobs" integer not null, "failed_job_ids" text not null, "options" text, "cancelled_at" integer, "created_at" integer not null, "finished_at" integer, primary key ("id"))5I# indexsqlite_autoindex_job_batches_1job_batchesS-sindexjobs_queue_indexjobsCREATE INDEX "jobs_queue_index" on "jobs" ("queue")‚ƒetablejobsjobsCREATE TABLE "jobs" ("id" integer primary key autoincrement not null, "queue" varchar not null, "payload" text not null, "attempts" integer not null, "reserved_at" integer, "available_at" integer not null, "created_at" integer not null)$##‚tablecache_lockscache_locksCREATE TABLE "cache_locks" ("key" varchar not null, "owner" varchar not null, "expiration" integer not null, primary key ("key"))5I# indexsqlite_autoindex_cache_locks_1cache_locks}tablecachecacheCREATE TABLE "cache" ("key" varchar not null, "value" text not null, "expiration" integer not null, primary key ("key")))= indexsqlite_autoindex_cache_1cache|
E#indexsessions_last_activity_indexsessionsCREATE INDEX "sessions_last_activity_index" on "sessions" ("last_activity")j	9indexsessions_user_id_indexsessions
CREATE INDEX "sessions_user_id_index" on "sessions" ("user_id")WƒtablesessionssessionsCREATE TABLE "sessions" ("id" varchar not null, "user_id" integer, "ip_address" varchar, "user_agent" text, "payload" text not null, "last_activity" integer not null, primary key ("id"))/C indexsqlite_autoindex_sessions_1sessions	>77‚tablepassword_reset_tokenspassword_reset_tokensCREATE TABLE "password_reset_tokens" ("email" varchar not null, "token" varchar not null, "created_at" datetime, primary key ("email"))I]7 indexsqlite_autoindex_password_reset_tokens_1password_reset_tokens¸     a1indexusers_email_uniqueusersCREATE UNIQUE INDEX "users_email_unique" on "users" ("email")   [„wtableusersusersCREATE TABLE "users" ("id" integer primary key autoincrement not G3indexpasskeys_credential_id_uniquepasskeysCREATE UNIQUE INDEX "passkeys_credential_id_unique" on "passkeys" ("credential_id")j9indexpasskeys_user_id_indexpasskeysCREATE INDEX "passkeys_user_id_index" on "passkeys" ("user_id")P++Ytablesqlite_sequencesqlite_sequenceCREATE TABLE sqlite_sequence(name,seq)$!!‚tablemigrationsmigrationsCREATE TABLE "migrations" ("id" integer primary key autoincrement not null, "migration" varchar not null, "batch" integer not       Þ Ö¬ƒFÞ                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          9 w	2026_07_10_052642_create_personal_access_tokens_table+ [	2026_07_10_052523_create_passkeys_table; {	2026_07_10_052522_add_two_factor_columns_to_users_table' S	0001_01_01_000002_create_jobs_table( U	0001_01_01_000001_create_cache_table( U	0001_01_01_000000_create_users_table   æ ðæ                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          	users!migrations   - -                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   P C   33   adrieanadrieanespiritu19@gmail.com$2y$12$FLFAfNZvMcSkVZ0lWLtRPub2GSffc/RxZFAfObQo7fLEDluMw4mx6W9ANGK65nWQunzTvvThtTvnFUTB4326eGUvHaiqBR52nZucu6quLLiVeBisv2026-07-10 05:42:432026-07-10 05:42:43
   á á                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       C	adrieanespiritu19@gmail.com                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 † †                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             +á] ‚-Œ-beOKbu31UZujxxhHFg0hJ85PjqRQDyR9AdVpzaiR127.0.0.1Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.127.0 Chrome/148.0.7778.97 Electron/42.2.0 Safari/537.36YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUzlXbFhwekNsdVJNNmlQWDBrNkI1OExqWHF3ZjIyanVtT1NRTHl2aCI7czo5OiJfcHJldml+­]	‚-‡EZWyv37SUWeUYCJ52q9P6Fo0HwXxCe814ozf6IefB127.0.0.1Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.127.0 Chrome/148.0.7778.97 Electron/42.2.0 Safari/537.36YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSkVHUE13MWtmSzlSdW5YeUZuWlBuVHpMYkQxcHYwNnB2alBseDNWQSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjQ6IjNiZTVmZmYwNTRmNzBjNjRkNjFmODE0ZDJiYzczMTc2NjUyOGYyMzAzY2M0YjRlZTQyNzdhNTZjNGNkZmRiNjYiO30=jP†ì  ]	-ˆ-ef25dV9Cdg7Ji1eV7zFJ6IlqZWMzaZRx7lsbCsiX127.0.0.1Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:153.0) Gecko/20100101 Firefox/153.0YTo2OntzOjY6Il90b2tlbiI7czo0MDoieGZqY2FtUUhFY0phcVpqeENXYjg0bWo1anVja0RocWVuazJIRkgzTCI7czo  ] -†%LEFmh2uR„	] -…}LEFmh2uRz8dPd0d4jXS2ZjdQeBBqQoYLuIUIvIRU127.0.0.1Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:153.0) Gecko/20100101 Firefox/153.0YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOHh1aWtCNldGdnE2VW4wVUFEbnNaa2Z5R0dTZ01zMkhpckNyWHVicSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3VzZXIvcHJvZmlsZSI7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbG9naW4iO3M6NToicm91dGUiO3M6NToibG9naW4iO319jPˆ&‚n	] ‚-‚MVCH3XyJToccWbkBsIhWm8v1mGjWKYX7kVyPLKj7B127.0.0.1Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.127.0 Chrome/148.0.7778.97 Electron/42.2.0 Safari/537.36YToyOntzOjY6Il90b2tlbiI7czo0MDoiVHpHTDBLUUlTd1cyYmxEcWJkTzhuQVF3YWRWYUtUUEZtRjlIOTNUSiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==jP†ó
§ z Óz                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              ,]VCH3XyJToccWbkBsIhWm8v1mGjWKYX7kVyPLKj7B   ,ef25dV9Cdg7Ji1eV7zFJ6IlqZWMzaZRx7lsbCsiX,]LEFmh2uRz8dPd0d4jXS2ZjdQeBBqQoYLuIUIvIRU
÷ ò òû                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
ï æ æ÷                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          jP†ó   jP†‚jPˆ&   y µy)è                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           Alaravel_cache_adrieanespiritu19@gmail.com|127.0.0.1i:1;jP‡   P'laravel_cache_adrieanespiritu19@gmail.com|127.0.0.1:timeri:1783662366;jP‡:ilaravel_cache_d7952ff7047716760c605d913b3863fei:2;jP‡Iu'laravel_cache_d7952ff7047716760c605d913b3863fe:timeri:1783662365;jP‡
   • •ÈÈÈ                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
```

#### public/build/assets/ActionMessage-Sx1QBVLc.js
```javascript
import{d as s,b as t,w as o,m as n,a as r,r as c,C as i,T as l,o as d}from"./app-DsJ4COlh.js";const _={class:"text-sm text-gray-600"},v={__name:"ActionMessage",props:{on:Boolean},setup(e){return(a,m)=>(d(),s("div",null,[t(l,{"leave-active-class":"transition ease-in duration-1000","leave-from-class":"opacity-100","leave-to-class":"opacity-0"},{default:o(()=>[n(r("div",_,[c(a.$slots,"default")],512),[[i,e.on]])]),_:3})]))}};export{v as _};

```

#### public/build/assets/ApiTokenManager-BoAe04Rs.js
```javascript
import{c as M,w as s,a as o,r as b,o as a,u as _,d as m,b as l,e as i,f as n,n as $,F as w,g as C,t as y,h as x,i as A}from"./app-DsJ4COlh.js";import{_ as N}from"./ActionMessage-Sx1QBVLc.js";import{_ as L,a as U,b as S}from"./DialogModal-C4rPUjBQ.js";import{_ as h}from"./Checkbox-wi5km-BR.js";import{_ as W}from"./DangerButton-C-A6Br7h.js";import{_ as E}from"./FormSection-BC1oNm55.js";import{_ as H,a as Y}from"./TextInput-CfODIaKr.js";import{_ as B}from"./InputLabel-DC5S04v5.js";import{_ as F}from"./PrimaryButton-CJUs8_6-.js";import{_ as P}from"./SecondaryButton-CYz5U_mB.js";import{S as q}from"./SectionBorder-JGFhNou_.js";import"./SectionTitle-DnptEXNM.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const G={class:"bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4"},J={class:"sm:flex sm:items-start"},K={class:"mt-3 text-center sm:mt-0 sm:ms-4 sm:text-start"},O={class:"text-lg font-medium text-gray-900"},Q={class:"mt-4 text-sm text-gray-600"},R={class:"flex flex-row justify-end px-6 py-4 bg-gray-100 text-end"},X={__name:"ConfirmationModal",props:{show:{type:Boolean,default:!1},maxWidth:{type:String,default:"2xl"},closeable:{type:Boolean,default:!0}},emits:["close"],setup(d,{emit:T}){const r=T,u=()=>{r("close")};return(p,c)=>(a(),M(L,{show:d.show,"max-width":d.maxWidth,closeable:d.closeable,onClose:u},{default:s(()=>[o("div",G,[o("div",J,[c[0]||(c[0]=o("div",{class:"mx-auto shrink-0 flex items-center justify-center size-12 rounded-full bg-red-100 sm:mx-0 sm:size-10"},[o("svg",{class:"size-6 text-red-600",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor"},[o("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"})])],-1)),o("div",K,[o("h3",O,[b(p.$slots,"title")]),o("div",Q,[b(p.$slots,"content")])])])]),o("div",R,[b(p.$slots,"footer")])]),_:3},8,["show","max-width","closeable"]))}},Z={class:"col-span-6 sm:col-span-4"},ee={key:0,class:"col-span-6"},se={class:"mt-2 grid grid-cols-1 md:grid-cols-2 gap-4"},te={class:"flex items-center"},oe={class:"ms-2 text-sm text-gray-600"},le={key:0},ne={class:"mt-10 sm:mt-0"},ie={class:"space-y-6"},ae={class:"break-all"},re={class:"flex items-center ms-2"},me={key:0,class:"text-sm text-gray-400"},de=["onClick"],ue=["onClick"],pe={key:0,class:"mt-4 bg-gray-100 px-4 py-2 rounded font-mono text-sm text-gray-500 break-all"},ce={class:"grid grid-cols-1 md:grid-cols-2 gap-4"},fe={class:"flex items-center"},ve={class:"ms-2 text-sm text-gray-600"},he={__name:"ApiTokenManager",props:{tokens:Array,availablePermissions:Array,defaultPermissions:Array},setup(d){const r=_({name:"",permissions:d.defaultPermissions}),u=_({permissions:[]}),p=_({}),c=A(!1),v=A(null),k=A(null),I=()=>{r.post(route("api-tokens.store"),{preserveScroll:!0,onSuccess:()=>{c.value=!0,r.reset()}})},V=f=>{u.permissions=f.abilities,v.value=f},j=()=>{u.put(route("api-tokens.update",v.value),{preserveScroll:!0,preserveState:!0,onSuccess:()=>v.value=null})},z=f=>{k.value=f},D=()=>{p.delete(route("api-tokens.destroy",k.value),{preserveScroll:!0,preserveState:!0,onSuccess:()=>k.value=null})};return(f,e)=>(a(),m("div",null,[l(E,{onSubmitted:I},{title:s(()=>[...e[9]||(e[9]=[n(" Create API Token ",-1)])]),description:s(()=>[...e[10]||(e[10]=[n(" API tokens allow third-party services to authenticate with our application on your behalf. ",-1)])]),form:s(()=>[o("div",Z,[l(B,{for:"name",value:"Name"}),l(H,{id:"name",modelValue:i(r).name,"onUpdate:modelValue":e[0]||(e[0]=t=>i(r).name=t),type:"text",class:"mt-1 block w-full",autofocus:""},null,8,["modelValue"]),l(Y,{message:i(r).errors.name,class:"mt-2"},null,8,["message"])]),d.availablePermissions.length>0?(a(),m("div",ee,[l(B,{for:"permissions",value:"Permissions"}),o("div",se,[(a(!0),m(w,null,C(d.availablePermissions,t=>(a(),m("div",{key:t},[o("label",te,[l(h,{checked:i(r).permissions,"onUpdate:checked":e[1]||(e[1]=g=>i(r).permissions=g),value:t},null,8,["checked","value"]),o("span",oe,y(t),1)])]))),128))])])):x("",!0)]),actions:s(()=>[l(N,{on:i(r).recentlySuccessful,class:"me-3"},{default:s(()=>[...e[11]||(e[11]=[n(" Created. ",-1)])]),_:1},8,["on"]),l(F,{class:$({"opacity-25":i(r).processing}),disabled:i(r).processing},{default:s(()=>[...e[12]||(e[12]=[n(" Create ",-1)])]),_:1},8,["class","disabled"])]),_:1}),d.tokens.length>0?(a(),m("div",le,[l(q),o("div",ne,[l(U,null,{title:s(()=>[...e[13]||(e[13]=[n(" Manage API Tokens ",-1)])]),description:s(()=>[...e[14]||(e[14]=[n(" You may delete any of your existing tokens if they are no longer needed. ",-1)])]),content:s(()=>[o("div",ie,[(a(!0),m(w,null,C(d.tokens,t=>(a(),m("div",{key:t.id,class:"flex items-center justify-between"},[o("div",ae,y(t.name),1),o("div",re,[t.last_used_ago?(a(),m("div",me," Last used "+y(t.last_used_ago),1)):x("",!0),d.availablePermissions.length>0?(a(),m("button",{key:1,class:"cursor-pointer ms-6 text-sm text-gray-400 underline",onClick:g=>V(t)}," Permissions ",8,de)):x("",!0),o("button",{class:"cursor-pointer ms-6 text-sm text-red-500",onClick:g=>z(t)}," Delete ",8,ue)])]))),128))])]),_:1})])])):x("",!0),l(S,{show:c.value,onClose:e[3]||(e[3]=t=>c.value=!1)},{title:s(()=>[...e[15]||(e[15]=[n(" API Token ",-1)])]),content:s(()=>[e[16]||(e[16]=o("div",null," Please copy your new API token. For your security, it won't be shown again. ",-1)),f.$page.props.jetstream.flash.token?(a(),m("div",pe,y(f.$page.props.jetstream.flash.token),1)):x("",!0)]),footer:s(()=>[l(P,{onClick:e[2]||(e[2]=t=>c.value=!1)},{default:s(()=>[...e[17]||(e[17]=[n(" Close ",-1)])]),_:1})]),_:1},8,["show"]),l(S,{show:v.value!=null,onClose:e[6]||(e[6]=t=>v.value=null)},{title:s(()=>[...e[18]||(e[18]=[n(" API Token Permissions ",-1)])]),content:s(()=>[o("div",ce,[(a(!0),m(w,null,C(d.availablePermissions,t=>(a(),m("div",{key:t},[o("label",fe,[l(h,{checked:i(u).permissions,"onUpdate:checked":e[4]||(e[4]=g=>i(u).permissions=g),value:t},null,8,["checked","value"]),o("span",ve,y(t),1)])]))),128))])]),footer:s(()=>[l(P,{onClick:e[5]||(e[5]=t=>v.value=null)},{default:s(()=>[...e[19]||(e[19]=[n(" Cancel ",-1)])]),_:1}),l(F,{class:$(["ms-3",{"opacity-25":i(u).processing}]),disabled:i(u).processing,onClick:j},{default:s(()=>[...e[20]||(e[20]=[n(" Save ",-1)])]),_:1},8,["class","disabled"])]),_:1},8,["show"]),l(X,{show:k.value!=null,onClose:e[8]||(e[8]=t=>k.value=null)},{title:s(()=>[...e[21]||(e[21]=[n(" Delete API Token ",-1)])]),content:s(()=>[...e[22]||(e[22]=[n(" Are you sure you would like to delete this API token? ",-1)])]),footer:s(()=>[l(P,{onClick:e[7]||(e[7]=t=>k.value=null)},{default:s(()=>[...e[23]||(e[23]=[n(" Cancel ",-1)])]),_:1}),l(W,{class:$(["ms-3",{"opacity-25":i(p).processing}]),disabled:i(p).processing,onClick:D},{default:s(()=>[...e[24]||(e[24]=[n(" Delete ",-1)])]),_:1},8,["class","disabled"])]),_:1},8,["show"])]))}};export{he as default};

```

#### public/build/assets/app-BG2D7S1e.css
```css
(File too large, truncated to first 50k characters...)
*,:before,:after{--tw-border-spacing-x: 0;--tw-border-spacing-y: 0;--tw-translate-x: 0;--tw-translate-y: 0;--tw-rotate: 0;--tw-skew-x: 0;--tw-skew-y: 0;--tw-scale-x: 1;--tw-scale-y: 1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness: proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width: 0px;--tw-ring-offset-color: #fff;--tw-ring-color: rgb(59 130 246 / .5);--tw-ring-offset-shadow: 0 0 #0000;--tw-ring-shadow: 0 0 #0000;--tw-shadow: 0 0 #0000;--tw-shadow-colored: 0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: ;--tw-contain-size: ;--tw-contain-layout: ;--tw-contain-paint: ;--tw-contain-style: }::backdrop{--tw-border-spacing-x: 0;--tw-border-spacing-y: 0;--tw-translate-x: 0;--tw-translate-y: 0;--tw-rotate: 0;--tw-skew-x: 0;--tw-skew-y: 0;--tw-scale-x: 1;--tw-scale-y: 1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness: proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width: 0px;--tw-ring-offset-color: #fff;--tw-ring-color: rgb(59 130 246 / .5);--tw-ring-offset-shadow: 0 0 #0000;--tw-ring-shadow: 0 0 #0000;--tw-shadow: 0 0 #0000;--tw-shadow-colored: 0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: ;--tw-contain-size: ;--tw-contain-layout: ;--tw-contain-paint: ;--tw-contain-style: }*,:before,:after{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}:before,:after{--tw-content: ""}html,:host{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;-o-tab-size:4;tab-size:4;font-family:Figtree,ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji",Segoe UI Symbol,"Noto Color Emoji";font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,samp,pre{font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,Liberation Mono,Courier New,monospace;font-feature-settings:normal;font-variation-settings:normal;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;letter-spacing:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}button,input:where([type=button]),input:where([type=reset]),input:where([type=submit]){-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dl,dd,h1,h2,h3,h4,h5,h6,hr,figure,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}ol,ul,menu{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::-moz-placeholder,textarea::-moz-placeholder{opacity:1;color:#9ca3af}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}button,[role=button]{cursor:pointer}:disabled{cursor:default}img,svg,video,canvas,audio,iframe,embed,object{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]:where(:not([hidden=until-found])){display:none}input:where([type=text]),input:where(:not([type])),input:where([type=email]),input:where([type=url]),input:where([type=password]),input:where([type=number]),input:where([type=date]),input:where([type=datetime-local]),input:where([type=month]),input:where([type=search]),input:where([type=tel]),input:where([type=time]),input:where([type=week]),select:where([multiple]),textarea,select{-webkit-appearance:none;-moz-appearance:none;appearance:none;background-color:#fff;border-color:#6b7280;border-width:1px;border-radius:0;padding:.5rem .75rem;font-size:1rem;line-height:1.5rem;--tw-shadow: 0 0 #0000}input:where([type=text]):focus,input:where(:not([type])):focus,input:where([type=email]):focus,input:where([type=url]):focus,input:where([type=password]):focus,input:where([type=number]):focus,input:where([type=date]):focus,input:where([type=datetime-local]):focus,input:where([type=month]):focus,input:where([type=search]):focus,input:where([type=tel]):focus,input:where([type=time]):focus,input:where([type=week]):focus,select:where([multiple]):focus,textarea:focus,select:focus{outline:2px solid transparent;outline-offset:2px;--tw-ring-inset: var(--tw-empty, );--tw-ring-offset-width: 0px;--tw-ring-offset-color: #fff;--tw-ring-color: #2563eb;--tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow);border-color:#2563eb}input::-moz-placeholder,textarea::-moz-placeholder{color:#6b7280;opacity:1}input::placeholder,textarea::placeholder{color:#6b7280;opacity:1}::-webkit-datetime-edit-fields-wrapper{padding:0}::-webkit-date-and-time-value{min-height:1.5em;text-align:inherit}::-webkit-datetime-edit{display:inline-flex}::-webkit-datetime-edit,::-webkit-datetime-edit-year-field,::-webkit-datetime-edit-month-field,::-webkit-datetime-edit-day-field,::-webkit-datetime-edit-hour-field,::-webkit-datetime-edit-minute-field,::-webkit-datetime-edit-second-field,::-webkit-datetime-edit-millisecond-field,::-webkit-datetime-edit-meridiem-field{padding-top:0;padding-bottom:0}select{background-image:url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");background-position:right .5rem center;background-repeat:no-repeat;background-size:1.5em 1.5em;padding-right:2.5rem;-webkit-print-color-adjust:exact;print-color-adjust:exact}select:where([multiple]),select:where([size]:not([size="1"])){background-image:initial;background-position:initial;background-repeat:unset;background-size:initial;padding-right:.75rem;-webkit-print-color-adjust:unset;print-color-adjust:unset}input:where([type=checkbox]),input:where([type=radio]){-webkit-appearance:none;-moz-appearance:none;appearance:none;padding:0;-webkit-print-color-adjust:exact;print-color-adjust:exact;display:inline-block;vertical-align:middle;background-origin:border-box;-webkit-user-select:none;-moz-user-select:none;user-select:none;flex-shrink:0;height:1rem;width:1rem;color:#2563eb;background-color:#fff;border-color:#6b7280;border-width:1px;--tw-shadow: 0 0 #0000}input:where([type=checkbox]){border-radius:0}input:where([type=radio]){border-radius:100%}input:where([type=checkbox]):focus,input:where([type=radio]):focus{outline:2px solid transparent;outline-offset:2px;--tw-ring-inset: var(--tw-empty, );--tw-ring-offset-width: 2px;--tw-ring-offset-color: #fff;--tw-ring-color: #2563eb;--tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}input:where([type=checkbox]):checked,input:where([type=radio]):checked{border-color:transparent;background-color:currentColor;background-size:100% 100%;background-position:center;background-repeat:no-repeat}input:where([type=checkbox]):checked{background-image:url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M12.207 4.793a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-2-2a1 1 0 011.414-1.414L6.5 9.086l4.293-4.293a1 1 0 011.414 0z'/%3e%3c/svg%3e")}@media(forced-colors:active){input:where([type=checkbox]):checked{-webkit-appearance:auto;-moz-appearance:auto;appearance:auto}}input:where([type=radio]):checked{background-image:url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e")}@media(forced-colors:active){input:where([type=radio]):checked{-webkit-appearance:auto;-moz-appearance:auto;appearance:auto}}input:where([type=checkbox]):checked:hover,input:where([type=checkbox]):checked:focus,input:where([type=radio]):checked:hover,input:where([type=radio]):checked:focus{border-color:transparent;background-color:currentColor}input:where([type=checkbox]):indeterminate{background-image:url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 16 16'%3e%3cpath stroke='white' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M4 8h8'/%3e%3c/svg%3e");border-color:transparent;background-color:currentColor;background-size:100% 100%;background-position:center;background-repeat:no-repeat}@media(forced-colors:active){input:where([type=checkbox]):indeterminate{-webkit-appearance:auto;-moz-appearance:auto;appearance:auto}}input:where([type=checkbox]):indeterminate:hover,input:where([type=checkbox]):indeterminate:focus{border-color:transparent;background-color:currentColor}input:where([type=file]){background:unset;border-color:inherit;border-width:0;border-radius:0;padding:0;font-size:unset;line-height:inherit}input:where([type=file]):focus{outline:1px solid ButtonText;outline:1px auto -webkit-focus-ring-color}.prose{color:var(--tw-prose-body);max-width:65ch}.prose :where(p):not(:where([class~=not-prose],[class~=not-prose] *)){margin-top:1.25em;margin-bottom:1.25em}.prose :where([class~=lead]):not(:where([class~=not-prose],[class~=not-prose] *)){color:var(--tw-prose-lead);font-size:1.25em;line-height:1.6;margin-top:1.2em;margin-bottom:1.2em}.prose :where(a):not(:where([class~=not-prose],[class~=not-prose] *)){color:var(--tw-prose-links);text-decoration:underline;font-weight:500}.prose :where(strong):not(:where([class~=not-prose],[class~=not-prose] *)){color:var(--tw-prose-bold);font-weight:600}.prose :where(a strong):not(:where([class~=not-prose],[class~=not-prose] *)){color:inherit}.prose :where(blockquote strong):not(:where([class~=not-prose],[class~=not-prose] *)){color:inherit}.prose :where(thead th strong):not(:where([class~=not-prose],[class~=not-prose] *)){color:inherit}.prose :where(ol):not(:where([class~=not-prose],[class~=not-prose] *)){list-style-type:decimal;margin-top:1.25em;margin-bottom:1.25em;padding-inline-start:1.625em}.prose :where(ol[type=A]):not(:where([class~=not-prose],[class~=not-prose] *)){list-style-type:upper-alpha}.prose :where(ol[type=a]):not(:where([class~=not-prose],[class~=not-prose] *)){list-style-type:lower-alpha}.prose :where(ol[type=A s]):not(:where([class~=not-prose],[class~=not-prose] *)){list-style-type:upper-alpha}.prose :where(ol[type=a s]):not(:where([class~=not-prose],[class~=not-prose] *)){list-style-type:lower-alpha}.prose :where(ol[type=I]):not(:where([class~=not-prose],[class~=not-prose] *)){list-style-type:upper-roman}.prose :where(ol[type=i]):not(:where([class~=not-prose],[class~=not-prose] *)){list-style-type:lower-roman}.prose :where(ol[type=I s]):not(:where([class~=not-prose],[class~=not-prose] *)){list-style-type:upper-roman}.prose :where(ol[type=i s]):not(:where([class~=not-prose],[class~=not-prose] *)){list-style-type:lower-roman}.prose :where(ol[type="1"]):not(:where([class~=not-prose],[class~=not-prose] *)){list-style-type:decimal}.prose :where(ul):not(:where([class~=not-prose],[class~=not-prose] *)){list-style-type:disc;margin-top:1.25em;margin-bottom:1.25em;padding-inline-start:1.625em}.prose :where(ol>li):not(:where([class~=not-prose],[class~=not-prose] *))::marker{font-weight:400;color:var(--tw-prose-counters)}.prose :where(ul>li):not(:where([class~=not-prose],[class~=not-prose] *))::marker{color:var(--tw-prose-bullets)}.prose :where(dt):not(:where([class~=not-prose],[class~=not-prose] *)){color:var(--tw-prose-headings);font-weight:600;margin-top:1.25em}.prose :where(hr):not(:where([class~=not-prose],[class~=not-prose] *)){border-color:var(--tw-prose-hr);border-top-width:1px;margin-top:3em;margin-bottom:3em}.prose :where(blockquote):not(:where([class~=not-prose],[class~=not-prose] *)){font-weight:500;font-style:italic;color:var(--tw-prose-quotes);border-inline-start-width:.25rem;border-inline-start-color:var(--tw-prose-quote-borders);quotes:"â€œ""â€""â€˜""â€™";margin-top:1.6em;margin-bottom:1.6em;padding-inline-start:1em}.prose :where(blockquote p:first-of-type):not(:where([class~=not-prose],[class~=not-prose] *)):before{content:open-quote}.prose :where(blockquote p:last-of-type):not(:where([class~=not-prose],[class~=not-prose] *)):after{content:close-quote}.prose :where(h1):not(:where([class~=not-prose],[class~=not-prose] *)){color:var(--tw-prose-headings);font-weight:800;font-size:2.25em;margin-top:0;margin-bottom:.8888889em;line-height:1.1111111}.prose :where(h1 strong):not(:where([class~=not-prose],[class~=not-prose] *)){font-weight:900;color:inherit}.prose :where(h2):not(:where([class~=not-prose],[class~=not-prose] *)){color:var(--tw-prose-headings);font-weight:700;font-size:1.5em;margin-top:2em;margin-bottom:1em;line-height:1.3333333}.prose :where(h2 strong):not(:where([class~=not-prose],[class~=not-prose] *)){font-weight:800;color:inherit}.prose :where(h3):not(:where([class~=not-prose],[class~=not-prose] *)){color:var(--tw-prose-headings);font-weight:600;font-size:1.25em;margin-top:1.6em;margin-bottom:.6em;line-height:1.6}.prose :where(h3 strong):not(:where([class~=not-prose],[class~=not-prose] *)){font-weight:700;color:inherit}.prose :where(h4):not(:where([class~=not-prose],[class~=not-prose] *)){color:var(--tw-prose-headings);font-weight:600;margin-top:1.5em;margin-bottom:.5em;line-height:1.5}.prose :where(h4 strong):not(:where([class~=not-prose],[class~=not-prose] *)){font-weight:700;color:inherit}.prose :where(img):not(:where([class~=not-prose],[class~=not-prose] *)){margin-top:2em;margin-bottom:2em}.prose :where(picture):not(:where([class~=not-prose],[class~=not-prose] *)){display:block;margin-top:2em;margin-bottom:2em}.prose :where(video):not(:where([class~=not-prose],[class~=not-prose] *)){margin-top:2em;margin-bottom:2em}.prose :where(kbd):not(:where([class~=not-prose],[class~=not-prose] *)){font-weight:500;font-family:inherit;color:var(--tw-prose-kbd);box-shadow:0 0 0 1px var(--tw-prose-kbd-shadows),0 3px 0 var(--tw-prose-kbd-shadows);font-size:.875em;border-radius:.3125rem;padding-top:.1875em;padding-inline-end:.375em;padding-bottom:.1875em;padding-inline-start:.375em}.prose :where(code):not(:where([class~=not-prose],[class~=not-prose] *)){color:var(--tw-prose-code);font-weight:600;font-size:.875em}.prose :where(code):not(:where([class~=not-prose],[class~=not-prose] *)):before{content:"`"}.prose :where(code):not(:where([class~=not-prose],[class~=not-prose] *)):after{content:"`"}.prose :where(a code):not(:where([class~=not-prose],[class~=not-prose] *)){color:inherit}.prose :where(h1 code):not(:where([class~=not-prose],[class~=not-prose] *)){color:inherit}.prose :where(h2 code):not(:where([class~=not-prose],[class~=not-prose] *)){color:inherit;font-size:.875em}.prose :where(h3 code):not(:where([class~=not-prose],[class~=not-prose] *)){color:inherit;font-size:.9em}.prose :where(h4 code):not(:where([class~=not-prose],[class~=not-prose] *)){color:inherit}.prose :where(blockquote code):not(:where([class~=not-prose],[class~=not-prose] *)){color:inherit}.prose :where(thead th code):not(:where([class~=not-prose],[class~=not-prose] *)){color:inherit}.prose :where(pre):not(:where([class~=not-prose],[class~=not-prose] *)){color:var(--tw-prose-pre-code);background-color:var(--tw-prose-pre-bg);overflow-x:auto;font-weight:400;font-size:.875em;line-height:1.7142857;margin-top:1.7142857em;margin-bottom:1.7142857em;border-radius:.375rem;padding-top:.8571429em;padding-inline-end:1.1428571em;padding-bottom:.8571429em;padding-inline-start:1.1428571em}.prose :where(pre code):not(:where([class~=not-prose],[class~=not-prose] *)){background-color:transparent;border-width:0;border-radius:0;padding:0;font-weight:inherit;color:inherit;font-size:inherit;font-family:inherit;line-height:inherit}.prose :where(pre code):not(:where([class~=not-prose],[class~=not-prose] *)):before{content:none}.prose :where(pre code):not(:where([class~=not-prose],[class~=not-prose] *)):after{content:none}.prose :where(table):not(:where([class~=not-prose],[class~=not-prose] *)){width:100%;table-layout:auto;margin-top:2em;margin-bottom:2em;font-size:.875em;line-height:1.7142857}.prose :where(thead):not(:where([class~=not-prose],[class~=not-prose] *)){border-bottom-width:1px;border-bottom-color:var(--tw-prose-th-borders)}.prose :where(thead th):not(:where([class~=not-prose],[class~=not-prose] *)){color:var(--tw-prose-headings);font-weight:600;vertical-align:bottom;padding-inline-end:.5714286em;padding-bottom:.5714286em;padding-inline-start:.5714286em}.prose :where(tbody tr):not(:where([class~=not-prose],[class~=not-prose] *)){border-bottom-width:1px;border-bottom-color:var(--tw-prose-td-borders)}.prose :where(tbody tr:last-child):not(:where([class~=not-prose],[class~=not-prose] *)){border-bottom-width:0}.prose :where(tbody td):not(:where([class~=not-prose],[class~=not-prose] *)){vertical-align:baseline}.prose :where(tfoot):not(:where([class~=not-prose],[class~=not-prose] *)){border-top-width:1px;border-top-color:var(--tw-prose-th-borders)}.prose :where(tfoot td):not(:where([class~=not-prose],[class~=not-prose] *)){vertical-align:top}.prose :where(th,td):not(:where([class~=not-prose],[class~=not-prose] *)){text-align:start}.prose :where(figure>*):not(:where([class~=not-prose],[class~=not-prose] *)){margin-top:0;margin-bottom:0}.prose :where(figcaption):not(:where([class~=not-prose],[class~=not-prose] *)){color:var(--tw-prose-captions);font-size:.875em;line-height:1.4285714;margin-top:.8571429em}.prose{--tw-prose-body: #374151;--tw-prose-headings: #111827;--tw-prose-lead: #4b5563;--tw-prose-links: #111827;--tw-prose-bold: #111827;--tw-prose-counters: #6b7280;--tw-prose-bullets: #d1d5db;--tw-prose-hr: #e5e7eb;--tw-prose-quotes: #111827;--tw-prose-quote-borders: #e5e7eb;--tw-prose-captions: #6b7280;--tw-prose-kbd: #111827;--tw-prose-kbd-shadows: rgb(17 24 39 / 10%);--tw-prose-code: #111827;--tw-prose-pre-code: #e5e7eb;--tw-prose-pre-bg: #1f2937;--tw-prose-th-borders: #d1d5db;--tw-prose-td-borders: #e5e7eb;--tw-prose-invert-body: #d1d5db;--tw-prose-invert-headings: #fff;--tw-prose-invert-lead: #9ca3af;--tw-prose-invert-links: #fff;--tw-prose-invert-bold: #fff;--tw-prose-invert-counters: #9ca3af;--tw-prose-invert-bullets: #4b5563;--tw-prose-invert-hr: #374151;--tw-prose-invert-quotes: #f3f4f6;--tw-prose-invert-quote-borders: #374151;--tw-prose-invert-captions: #9ca3af;--tw-prose-invert-kbd: #fff;--tw-prose-invert-kbd-shadows: rgb(255 255 255 / 10%);--tw-prose-invert-code: #fff;--tw-prose-invert-pre-code: #d1d5db;--tw-prose-invert-pre-bg: rgb(0 0 0 / 50%);--tw-prose-invert-th-borders: #4b5563;--tw-prose-invert-td-borders: #374151;font-size:1rem;line-height:1.75}.prose :where(picture>img):not(:where([class~=not-prose],[class~=not-prose] *)){margin-top:0;margin-bottom:0}.prose :where(li):not(:where([class~=not-prose],[class~=not-prose] *)){margin-top:.5em;margin-bottom:.5em}.prose :where(ol>li):not(:where([class~=not-prose],[class~=not-prose] *)){padding-inline-start:.375em}.prose :where(ul>li):not(:where([class~=not-prose],[class~=not-prose] *)){padding-inline-start:.375em}.prose :where(.prose>ul>li p):not(:where([class~=not-prose],[class~=not-prose] *)){margin-top:.75em;margin-bottom:.75em}.prose :where(.prose>ul>li>p:first-child):not(:where([class~=not-prose],[class~=not-prose] *)){margin-top:1.25em}.prose :where(.prose>ul>li>p:last-child):not(:where([class~=not-prose],[class~=not-prose] *)){margin-bottom:1.25em}.prose :where(.prose>ol>li>p:first-child):not(:where([class~=not-prose],[class~=not-prose] *)){margin-top:1.25em}.prose :where(.prose>ol>li>p:last-child):not(:where([class~=not-prose],[class~=not-prose] *)){margin-bottom:1.25em}.prose :where(ul ul,ul ol,ol ul,ol ol):not(:where([class~=not-prose],[class~=not-prose] *)){margin-top:.75em;margin-bottom:.75em}.prose :where(dl):not(:where([class~=not-prose],[class~=not-prose] *)){margin-top:1.25em;margin-bottom:1.25em}.prose :where(dd):not(:where([class~=not-prose],[class~=not-prose] *)){margin-top:.5em;padding-inline-start:1.625em}.prose :where(hr+*):not(:where([class~=not-prose],[class~=not-prose] *)){margin-top:0}.prose :where(h2+*):not(:where([class~=not-prose],[class~=not-prose] *)){margin-top:0}.prose :where(h3+*):not(:where([class~=not-prose],[class~=not-prose] *)){margin-top:0}.prose :where(h4+*):not(:where([class~=not-prose],[class~=not-prose] *)){margin-top:0}.prose :where(thead th:first-child):not(:where([class~=not-prose],[class~=not-prose] *)){padding-inline-start:0}.prose :where(thead th:last-child):not(:where([class~=not-prose],[class~=not-prose] *)){padding-inline-end:0}.prose :where(tbody td,tfoot td):not(:where([class~=not-prose],[class~=not-prose] *)){padding-top:.5714286em;padding-inline-end:.5714286em;padding-bottom:.5714286em;padding-inline-start:.5714286em}.prose :where(tbody td:first-child,tfoot td:first-child):not(:where([class~=not-prose],[class~=not-prose] *)){padding-inline-start:0}.prose :where(tbody td:last-child,tfoot td:last-child):not(:where([class~=not-prose],[class~=not-prose] *)){padding-inline-end:0}.prose :where(figure):not(:where([class~=not-prose],[class~=not-prose] *)){margin-top:2em;margin-bottom:2em}.prose :where(.prose>:first-child):not(:where([class~=not-prose],[class~=not-prose] *)){margin-top:0}.prose :where(.prose>:last-child):not(:where([class~=not-prose],[class~=not-prose] *)){margin-bottom:0}.fixed{position:fixed}.absolute{position:absolute}.relative{position:relative}.inset-0{top:0;right:0;bottom:0;left:0}.-bottom-16{bottom:-4rem}.-left-16{left:-4rem}.-left-20{left:-5rem}.end-0{inset-inline-end:0px}.start-0{inset-inline-start:0px}.top-0{top:0}.z-0{z-index:0}.z-40{z-index:40}.z-50{z-index:50}.col-span-6{grid-column:span 6 / span 6}.\!row-span-1{grid-row:span 1 / span 1!important}.m-0{margin:0}.-mx-3{margin-left:-.75rem;margin-right:-.75rem}.mx-auto{margin-left:auto;margin-right:auto}.-me-0\.5{margin-inline-end:-.125rem}.-me-1{margin-inline-end:-.25rem}.-me-2{margin-inline-end:-.5rem}.-ml-px{margin-left:-1px}.mb-4{margin-bottom:1rem}.mb-6{margin-bottom:1.5rem}.me-2{margin-inline-end:.5rem}.me-3{margin-inline-end:.75rem}.ms-1{margin-inline-start:.25rem}.ms-2{margin-inline-start:.5rem}.ms-3{margin-inline-start:.75rem}.ms-4{margin-inline-start:1rem}.ms-6{margin-inline-start:1.5rem}.mt-1{margin-top:.25rem}.mt-10{margin-top:2.5rem}.mt-2{margin-top:.5rem}.mt-3{margin-top:.75rem}.mt-4{margin-top:1rem}.mt-5{margin-top:1.25rem}.mt-6{margin-top:1.5rem}.mt-8{margin-top:2rem}.block{display:block}.inline-block{display:inline-block}.inline{display:inline}.flex{display:flex}.inline-flex{display:inline-flex}.grid{display:grid}.\!hidden{display:none!important}.hidden{display:none}.aspect-video{aspect-ratio:16 / 9}.size-10{width:2.5rem;height:2.5rem}.size-12{width:3rem;height:3rem}.size-16{width:4rem;height:4rem}.size-20{width:5rem;height:5rem}.size-4{width:1rem;height:1rem}.size-5{width:1.25rem;height:1.25rem}.size-6{width:1.5rem;height:1.5rem}.size-8{width:2rem;height:2rem}.h-12{height:3rem}.h-16{height:4rem}.h-40{height:10rem}.h-5{height:1.25rem}.h-9{height:2.25rem}.h-full{height:100%}.min-h-full{min-height:100%}.min-h-screen{min-height:100vh}.w-0{width:0px}.w-1\/2{width:50%}.w-3\/4{width:75%}.w-48{width:12rem}.w-5{width:1.25rem}.w-60{width:15rem}.w-\[calc\(100\%\+8rem\)\]{width:calc(100% + 8rem)}.w-auto{width:auto}.w-full{width:100%}.min-w-0{min-width:0px}.min-w-full{min-width:100%}.max-w-2xl{max-width:42rem}.max-w-7xl{max-width:80rem}.max-w-\[877px\]{max-width:877px}.max-w-screen-xl{max-width:1280px}.max-w-xl{max-width:36rem}.flex-1{flex:1 1 0%}.shrink-0{flex-shrink:0}.origin-top{transform-origin:top}.translate-y-0{--tw-translate-y: 0px;transform:translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.translate-y-4{--tw-translate-y: 1rem;transform:translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.scale-100{--tw-scale-x: 1;--tw-scale-y: 1;transform:translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.scale-95{--tw-scale-x: .95;--tw-scale-y: .95;transform:translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.transform{transform:translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.cursor-default{cursor:default}.cursor-not-allowed{cursor:not-allowed}.cursor-pointer{cursor:pointer}.list-inside{list-style-position:inside}.list-disc{list-style-type:disc}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}.grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}.grid-cols-6{grid-template-columns:repeat(6,minmax(0,1fr))}.\!flex-row{flex-direction:row!important}.flex-row{flex-direction:row}.flex-col{flex-direction:column}.flex-wrap{flex-wrap:wrap}.items-start{align-items:flex-start}.items-center{align-items:center}.items-stretch{align-items:stretch}.justify-end{justify-content:flex-end}.justify-center{justify-content:center}.justify-between{justify-content:space-between}.justify-items-center{justify-items:center}.gap-1{gap:.25rem}.gap-2{gap:.5rem}.gap-4{gap:1rem}.gap-6{gap:1.5rem}.space-x-8>:not([hidden])~:not([hidden]){--tw-space-x-reverse: 0;margin-right:calc(2rem * var(--tw-space-x-reverse));margin-left:calc(2rem * calc(1 - var(--tw-space-x-reverse)))}.space-y-1>:not([hidden])~:not([hidden]){--tw-space-y-reverse: 0;margin-top:calc(.25rem * calc(1 - var(--tw-space-y-reverse)));margin-bottom:calc(.25rem * var(--tw-space-y-reverse))}.space-y-6>:not([hidden])~:not([hidden]){--tw-space-y-reverse: 0;margin-top:calc(1.5rem * calc(1 - var(--tw-space-y-reverse)));margin-bottom:calc(1.5rem * var(--tw-space-y-reverse))}.self-center{align-self:center}.overflow-hidden{overflow:hidden}.overflow-y-auto{overflow-y:auto}.truncate{overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.break-all{word-break:break-all}.rounded{border-radius:.25rem}.rounded-\[10px\]{border-radius:10px}.rounded-full{border-radius:9999px}.rounded-lg{border-radius:.5rem}.rounded-md{border-radius:.375rem}.rounded-sm{border-radius:.125rem}.rounded-b-none{border-bottom-right-radius:0;border-bottom-left-radius:0}.rounded-l-md{border-top-left-radius:.375rem;border-bottom-left-radius:.375rem}.rounded-r-md{border-top-right-radius:.375rem;border-bottom-right-radius:.375rem}.rounded-t-none{border-top-left-radius:0;border-top-right-radius:0}.border{border-width:1px}.border-2{border-width:2px}.border-b{border-bottom-width:1px}.border-b-2{border-bottom-width:2px}.border-l-4{border-left-width:4px}.border-t{border-top-width:1px}.border-gray-100{--tw-border-opacity: 1;border-color:rgb(243 244 246 / var(--tw-border-opacity, 1))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity, 1))}.border-gray-300{--tw-border-opacity: 1;border-color:rgb(209 213 219 / var(--tw-border-opacity, 1))}.border-indigo-400{--tw-border-opacity: 1;border-color:rgb(129 140 248 / var(--tw-border-opacity, 1))}.border-transparent{border-color:transparent}.bg-\[\#FF2D20\]\/10{background-color:#ff2d201a}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity, 1))}.bg-gray-200{--tw-bg-opacity: 1;background-color:rgb(229 231 235 / var(--tw-bg-opacity, 1))}.bg-gray-50{--tw-bg-opacity: 1;background-color:rgb(249 250 251 / var(--tw-bg-opacity, 1))}.bg-gray-500{--tw-bg-opacity: 1;background-color:rgb(107 114 128 / var(--tw-bg-opacity, 1))}.bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity, 1))}.bg-indigo-50{--tw-bg-opacity: 1;background-color:rgb(238 242 255 / var(--tw-bg-opacity, 1))}.bg-indigo-500{--tw-bg-opacity: 1;background-color:rgb(99 102 241 / var(--tw-bg-opacity, 1))}.bg-indigo-600{--tw-bg-opacity: 1;background-color:rgb(79 70 229 / var(--tw-bg-opacity, 1))}.bg-red-100{--tw-bg-opacity: 1;background-color:rgb(254 226 226 / var(--tw-bg-opacity, 1))}.bg-red-600{--tw-bg-opacity: 1;background-color:rgb(220 38 38 / var(--tw-bg-opacity, 1))}.bg-red-700{--tw-bg-opacity: 1;background-color:rgb(185 28 28 / var(--tw-bg-opacity, 1))}.bg-transparent{background-color:transparent}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity, 1))}.bg-yellow-500{--tw-bg-opacity: 1;background-color:rgb(234 179 8 / var(--tw-bg-opacity, 1))}.bg-yellow-600{--tw-bg-opacity: 1;background-color:rgb(202 138 4 / var(--tw-bg-opacity, 1))}.bg-opacity-25{--tw-bg-opacity: .25}.bg-gradient-to-b{background-image:linear-gradient(to bottom,var(--tw-gradient-stops))}.from-transparent{--tw-gradient-from: transparent var(--tw-gradient-from-position);--tw-gradient-to: rgb(0 0 0 / 0) var(--tw-gradient-to-position);--tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to)}.via-white{--tw-gradient-to: rgb(255 255 255 / 0) var(--tw-gradient-to-position);--tw-gradient-stops: var(--tw-gradient-from), #fff var(--tw-gradient-via-position), var(--tw-gradient-to)}.to-white{--tw-gradient-to: #fff var(--tw-gradient-to-position)}.bg-cover{background-size:cover}.bg-center{background-position:center}.bg-no-repeat{background-repeat:no-repeat}.fill-black{fill:#000}.fill-indigo-500{fill:#6366f1}.stroke-\[\#FF2D20\]{stroke:#ff2d20}.stroke-gray-400{stroke:#9ca3af}.object-cover{-o-object-fit:cover;object-fit:cover}.object-top{-o-object-position:top;object-position:top}.p-2{padding:.5rem}.p-6{padding:1.5rem}.px-1{padding-left:.25rem;padding-right:.25rem}.px-2{padding-left:.5rem;padding-right:.5rem}.px-3{padding-left:.75rem;padding-right:.75rem}.px-4{padding-left:1rem;padding-right:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.py-1{padding-top:.25rem;padding-bottom:.25rem}.py-10{padding-top:2.5rem;padding-bottom:2.5rem}.py-12{padding-top:3rem;padding-bottom:3rem}.py-16{padding-top:4rem;padding-bottom:4rem}.py-2{padding-top:.5rem;padding-bottom:.5rem}.py-3{padding-top:.75rem;padding-bottom:.75rem}.py-4{padding-top:1rem;padding-bottom:1rem}.py-5{padding-top:1.25rem;padding-bottom:1.25rem}.py-6{padding-top:1.5rem;padding-bottom:1.5rem}.py-8{padding-top:2rem;padding-bottom:2rem}.pb-1{padding-bottom:.25rem}.pb-3{padding-bottom:.75rem}.pb-4{padding-bottom:1rem}.pe-4{padding-inline-end:1rem}.ps-3{padding-inline-start:.75rem}.pt-1{padding-top:.25rem}.pt-2{padding-top:.5rem}.pt-3{padding-top:.75rem}.pt-4{padding-top:1rem}.pt-5{padding-top:1.25rem}.pt-6{padding-top:1.5rem}.text-center{text-align:center}.text-start{text-align:start}.text-end{text-align:end}.font-mono{font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,Liberation Mono,Courier New,monospace}.font-sans{font-family:Figtree,ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji",Segoe UI Symbol,"Noto Color Emoji"}.text-2xl{font-size:1.5rem;line-height:2rem}.text-base{font-size:1rem;line-height:1.5rem}.text-lg{font-size:1.125rem;line-height:1.75rem}.text-sm{font-size:.875rem;line-height:1.25rem}.text-sm\/relaxed{font-size:.875rem;line-height:1.625}.text-xl{font-size:1.25rem;line-height:1.75rem}.text-xs{font-size:.75rem;line-height:1rem}.font-medium{font-weight:500}.font-semibold{font-weight:600}.uppercase{text-transform:uppercase}.leading-4{line-height:1rem}.leading-5{line-height:1.25rem}.leading-relaxed{line-height:1.625}.leading-tight{line-height:1.25}.tracking-widest{letter-spacing:.1em}.text-black{--tw-text-opacity: 1;color:rgb(0 0 0 / var(--tw-text-opacity, 1))}.text-black\/50{color:#00000080}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity, 1))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity, 1))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity, 1))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity, 1))}.text-gray-800{--tw-text-opacity: 1;color:rgb(31 41 55 / var(--tw-text-opacity, 1))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity, 1))}.text-green-400{--tw-text-opacity: 1;color:rgb(74 222 128 / var(--tw-text-opacity, 1))}.text-green-500{--tw-text-opacity: 1;color:rgb(34 197 94 / var(--tw-text-opacity, 1))}.text-green-600{--tw-text-opacity: 1;color:rgb(22 163 74 / var(--tw-text-opacity, 1))}.text-indigo-600{--tw-text-opacity: 1;color:rgb(79 70 229 / var(--tw-text-opacity, 1))}.text-indigo-700{--tw-text-opacity: 1;color:rgb(67 56 202 / var(--tw-text-opacity, 1))}.text-red-500{--tw-text-opacity: 1;color:rgb(239 68 68 / var(--tw-text-opacity, 1))}.text-red-600{--tw-text-opacity: 1;color:rgb(220 38 38 / var(--tw-text-opacity, 1))}.text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity, 1))}.underline{text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.opacity-0{opacity:0}.opacity-100{opacity:1}.opacity-25{opacity:.25}.opacity-50{opacity:.5}.opacity-75{opacity:.75}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.shadow-\[0px_14px_34px_0px_rgba\(0\,0\,0\,0\.08\)\]{--tw-shadow: 0px 14px 34px 0px rgba(0,0,0,.08);--tw-shadow-colored: 0px 14px 34px 0px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.shadow-lg{--tw-shadow: 0 10px 15px -3px rgb(0 0 0 / .1), 0 4px 6px -4px rgb(0 0 0 / .1);--tw-shadow-colored: 0 10px 15px -3px var(--tw-shadow-color), 0 4px 6px -4px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.shadow-md{--tw-shadow: 0 4px 6px -1px rgb(0 0 0 / .1), 0 2px 4px -2px rgb(0 0 0 / .1);--tw-shadow-colored: 0 4px 6px -1px var(--tw-shadow-color), 0 2px 4px -2px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.shadow-sm{--tw-shadow: 0 1px 2px 0 rgb(0 0 0 / .05);--tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.shadow-xl{--tw-shadow: 0 20px 25px -5px rgb(0 0 0 / .1), 0 8px 10px -6px rgb(0 0 0 / .1);--tw-shadow-colored: 0 20px 25px -5px var(--tw-shadow-color), 0 8px 10px -6px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.ring-1{--tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow, 0 0 #0000)}.ring-black{--tw-ring-opacity: 1;--tw-ring-color: rgb(0 0 0 / var(--tw-ring-opacity, 1))}.ring-gray-300{--tw-ring-opacity: 1;--tw-ring-color: rgb(209 213 219 / var(--tw-ring-opacity, 1))}.ring-transparent{--tw-ring-color: transparent}.ring-white\/\[0\.05\]{--tw-ring-color: rgb(255 255 255 / .05)}.ring-opacity-5{--tw-ring-opacity: .05}.drop-shadow-\[0px_4px_34px_rgba\(0\,0\,0\,0\.06\)\]{--tw-drop-shadow: drop-shadow(0px 4px 34px rgba(0,0,0,.06));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.drop-shadow-\[0px_4px_34px_rgba\(0\,0\,0\,0\.25\)\]{--tw-drop-shadow: drop-shadow(0px 4px 34px rgba(0,0,0,.25));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.transition{transition-property:color,background-color,border-color,text-decoration-color,fill,stroke,opacity,box-shadow,transform,filter,backdrop-filter;transition-timing-function:cubic-bezier(.4,0,.2,1);transition-duration:.15s}.transition-all{transition-property:all;transition-timing-function:cubic-bezier(.4,0,.2,1);transition-duration:.15s}.duration-1000{transition-duration:1s}.duration-150{transition-duration:.15s}.duration-200{transition-duration:.2s}.duration-300{transition-duration:.3s}.duration-75{transition-duration:75ms}.ease-in{transition-timing-function:cubic-bezier(.4,0,1,1)}.ease-in-out{transition-timing-function:cubic-bezier(.4,0,.2,1)}.ease-out{transition-timing-function:cubic-bezier(0,0,.2,1)}[x-cloak]{display:none}@media(prefers-color-scheme:dark){.dark\:prose-invert{--tw-prose-body: var(--tw-prose-invert-body);--tw-prose-headings: var(--tw-prose-invert-headings);--tw-prose-lead: var(--tw-prose-invert-lead);--tw-prose-links: var(--tw-prose-invert-links);--tw-prose-bold: var(--tw-prose-invert-bold);--tw-prose-counters: var(--tw-prose-invert-counters);--tw-prose-bullets: var(--tw-prose-invert-bullets);--tw-prose-hr: var(--tw-prose-invert-hr);--tw-prose-quotes: var(--tw-prose-invert-quotes);--tw-prose-quote-borders: var(--tw-prose-invert-quote-borders);--tw-prose-captions: var(--tw-prose-invert-captions);--tw-prose-kbd: var(--tw-prose-invert-kbd);--tw-prose-kbd-shadows: var(--tw-prose-invert-kbd-shadows);--tw-prose-code: var(--tw-prose-invert-code);--tw-prose-pre-code: var(--tw-prose-invert-pre-code);--tw-prose-pre-bg: var(--tw-prose-invert-pre-bg);--tw-prose-th-borders: var(--tw-prose-invert-th-borders);--tw-prose-td-borders: var(--tw-prose-invert-td-borders)}}.selection\:bg-\[\#FF2D20\] *::-moz-selection{--tw-bg-opacity: 1;background-color:rgb(255 45 32 / var(--tw-bg-opacity, 1))}.selection\:bg-\[\#FF2D20\] *::selection{--tw-bg-opacity: 1;background-color:rgb(255 45 32 / var(--tw-bg-opacity, 1))}.selection\:text-white *::-moz-selection{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity, 1))}.selection\:text-white *::selection{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity, 1))}.selection\:bg-\[\#FF2D20\]::-moz-selection{--tw-bg-opacity: 1;background-color:rgb(255 45 32 / var(--tw-bg-opacity, 1))}.selection\:bg-\[\#FF2D20\]::selection{--tw-bg-opacity: 1;background-color:rgb(255 45 32 / var(--tw-bg-opacity, 1))}.selection\:text-white::-moz-selection{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity, 1))}.selection\:text-white::selection{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity, 1))}.backdrop\:bg-transparent::backdrop{background-color:transparent}.hover\:border-gray-300:hover{--tw-border-opacity: 1;border-color:rgb(209 213 219 / var(--tw-border-opacity, 1))}.hover\:bg-gray-100:hover{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity, 1))}.hover\:bg-gray-50:hover{--tw-bg-opacity: 1;background-color:rgb(249 250 251 / var(--tw-bg-opacity, 1))}.hover\:bg-gray-700:hover{--tw-bg-opacity: 1;background-color:rgb(55 65 81 / var(--tw-bg-opacity, 1))}.hover\:bg-indigo-600:hover{--tw-bg-opacity: 1;background-color:rgb(79 70 229 / var(--tw-bg-opacity, 1))}.hover\:bg-red-500:hover{--tw-bg-opacity: 1;background-color:rgb(239 68 68 / var(--tw-bg-opacity, 1))}.hover\:bg-red-600:hover{--tw-bg-opacity: 1;background-color:rgb(220 38 38 / var(--tw-bg-opacity, 1))}.hover\:bg-yellow-600:hover{--tw-bg-opacity: 1;background-color:rgb(202 138 4 / var(--tw-bg-opacity, 1))}.hover\:text-black:hover{--tw-text-opacity: 1;color:rgb(0 0 0 / var(--tw-text-opacity, 1))}.hover\:text-black\/70:hover{color:#000000b3}.hover\:text-gray-400:hover{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity, 1))}.hover\:text-gray-500:hover{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity, 1))}.hover\:text-gray-700:hover{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity, 1))}.hover\:text-gray-800:hover{--tw-text-opacity: 1;color:rgb(31 41 55 / var(--tw-text-opacity, 1))}.hover\:text-gray-900:hover{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity, 1))}.hover\:ring-black\/20:hover{--tw-ring-color: rgb(0 0 0 / .2)}.focus\:z-10:focus{z-index:10}.focus\:border-none:focus{border-style:none}.focus\:border-blue-300:focus{--tw-border-opacity: 1;border-color:rgb(147 197 253 / var(--tw-border-opacity, 1))}.focus\:border-gray-300:focus{--tw-border-opacity: 1;border-color:rgb(209 213 219 / var(--tw-border-opacity, 1))}.focus\:border-indigo-500:focus{--tw-border-opacity: 1;border-color:rgb(99 102 241 / var(--tw-border-opacity, 1))}.focus\:border-indigo-700:focus{--tw-border-opacity: 1;border-color:rgb(67 56 202 / var(--tw-border-opacity, 1))}.focus\:bg-gray-100:focus{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity, 1))}.focus\:bg-gray-50:focus{--tw-bg-opacity: 1;background-color:rgb(249 250 251 / var(--tw-bg-opacity, 1))}.focus\:bg-gray-700:focus{--tw-bg-opacity: 1;background-color:rgb(55 65 81 / var(--tw-bg-opacity, 1))}.focus\:bg-indigo-100:focus{--tw-bg-opacity: 1;background-color:rgb(224 231 255 / var(--tw-bg-opacity, 1))}.focus\:bg-indigo-600:focus{--tw-bg-opacity: 1;background-color:rgb(79 70 229 / var(--tw-bg-opacity, 1))}.focus\:bg-red-600:focus{--tw-bg-opacity: 1;background-color:rgb(220 38 38 / var(--tw-bg-opacity, 1))}.focus\:bg-yellow-600:focus{--tw-bg-opacity: 1;background-color:rgb(202 138 4 / var(--tw-bg-opacity, 1))}.focus\:text-gray-500:focus{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity, 1))}.focus\:text-gray-700:focus{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity, 1))}.focus\:text-gray-800:focus{--tw-text-opacity: 1;color:rgb(31 41 55 / var(--tw-text-opacity, 1))}.focus\:text-indigo-800:focus{--tw-text-opacity: 1;color:rgb(55 48 163 / var(--tw-text-opacity, 1))}.focus\:outline-none:focus{outline:2px solid transparent;outline-offset:2px}.focus\:ring:focus{--tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(3px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow, 0 0 #0000)}.focus\:ring-2:focus{--tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow, 0 0 #0000)}.focus\:ring-indigo-500:focus{--tw-ring-opacity: 1;--tw-ring-color: rgb(99 102 241 / var(--tw-ring-opacity, 1))}.focus\:ring-red-500:focus{--tw-ring-opacity: 1;--tw-ring-color: rgb(239 68 68 / var(--tw-ring-opacity, 1))}.focus\:ring-offset-2:focus{--tw-ring-offset-width: 2px}.focus-visible\:ring-1:focus-visible{--tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow, 0 0 #0000)}.focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity: 1;--tw-ring-color: rgb(255 45 32 / var(--tw-ring-opacity, 1))}.active\:bg-gray-100:active{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity, 1))}.active\:bg-gray-50:active{--tw-bg-opacity: 1;background-color:rgb(249 250 251 / var(--tw-bg-opacity, 1))}.active\:bg-gray-900:active{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity, 1))}.active\:bg-red-700:active{--tw-bg-opacity: 1;background-color:rgb(185 28 28 / var(--tw-bg-opacity, 1))}.active\:text-gray-500:active{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity, 1))}.active\:text-gray-700:active{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity, 1))}.active\:text-gray-800:active{--tw-text-opacity: 1;color:rgb(31 41 55 / var(--tw-text-opacity, 1))}.disabled\:opacity-25:disabled{opacity:.25}.disabled\:opacity-50:disabled{opacity:.5}@media(min-width:640px){.sm\:col-span-4{grid-column:span 4 / span 4}.sm\:-my-px{margin-top:-1px;margin-bottom:-1px}.sm\:mx-0{margin-left:0;margin-right:0}.sm\:mx-auto{margin-left:auto;margin-right:auto}.sm\:-me-2{margin-inline-end:-.5rem}.sm\:ms-10{margin-inline-start:2.5rem}.sm\:ms-3{margin-inline-start:.75rem}.sm\:ms-4{margin-inline-start:1rem}.sm\:ms-6{margin-inline-start:1.5rem}.sm\:mt-0{margin-top:0}.sm\:block{display:block}.sm\:flex{display:flex}.sm\:hidden{display:none}.sm\:size-10{width:2.5rem;height:2.5rem}.sm\:size-16{width:4rem;height:4rem}.sm\:size-6{width:1.5rem;height:1.5rem}.sm\:w-full{width:100%}.sm\:max-w-2xl{max-width:42rem}.sm\:max-w-lg{max-width:32rem}.sm\:max-w-md{max-width:28rem}.sm\:max-w-sm{max-width:24rem}.sm\:max-w-xl{max-width:36rem}.sm\:flex-1{flex:1 1 0%}.sm\:translate-y-0{--tw-translate-y: 0px;transform:translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.sm\:scale-100{--tw-scale-x: 1;--tw-scale-y: 1;transform:translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.sm\:scale-95{--tw-scale-x: .95;--tw-scale-y: .95;transform:translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.sm\:items-start{align-items:flex-start}.sm\:items-center{align-items:center}.sm\:justify-center{justify-content:center}.sm\:justify-between{justify-content:space-between}.sm\:gap-2{gap:.5rem}.sm\:rounded-lg{border-radius:.5rem}.sm\:rounded-md{border-radius:.375rem}.sm\:rounded-bl-md{border-bottom-left-radius:.375rem}.sm\:rounded-br-md{border-bottom-right-radius:.375rem}.sm\:rounded-tl-md{border-top-left-radius:.375rem}.sm\:rounded-tr-md{border-top-right-radius:.375rem}.sm\:p-6{padding:1.5rem}.sm\:px-0{padding-left:0;padding-right:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pb-4{padding-bottom:1rem}.sm\:pt-0{padding-top:0}.sm\:pt-5{padding-top:1.25rem}.sm\:text-start{text-align:start}}@media(min-width:768px){.md\:col-span-1{grid-column:span 1 / span 1}.md\:col-span-2{grid-column:span 2 / span 2}.md\:row-span-3{grid-row:span 3 / span 3}.md\:mt-0{margin-top:0}.md\:grid{display:grid}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}.md\:grid-cols-3{grid-template-columns:repeat(3,minmax(0,1fr))}.md\:gap-6{gap:1.5rem}}@media(min-width:1024px){.lg\:col-span-4{grid-column:span 4 / span 4}.lg\:col-start-2{grid-column-start:2}.lg\:h-16{height:4rem}.lg\:max-w-7xl{max-width:80rem}.lg\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}.lg\:grid-cols-3{grid-template-columns:repeat(3,minmax(0,1fr))}.lg\:flex-col{flex-direction:column}.lg\:items-end{align-items:flex-end}.lg\:justify-center{justify-content:center}.lg\:gap-8{gap:2rem}.lg\:p-10{padding:2.5rem}.lg\:p-8{padding:2rem}.lg\:px-8{padding-left:2rem;padding-right:2rem}.lg\:pb-10{padding-bottom:2.5rem}.lg\:pt-0{padding-top:0}.lg\:text-\[\#FF2D20\]{--tw-text-opacity: 1;color:rgb(255 45 32 / var(--tw-text-opacity, 1))}}.ltr\:origin-top-left:where([dir=ltr],[dir=ltr] *){transform-origin:top left}.ltr\:origin-top-right:where([dir=ltr],[dir=ltr] *){transform-origin:top right}.rtl\:origin-top-left:where([dir=rtl],[dir=rtl] *){transform-origin:top left}.rtl\:origin-top-right:where([dir=rtl],[dir=rtl] *){transform-origin:top right}.rtl\:flex-row-reverse:where([dir=rtl],[dir=rtl] *){flex-direction:row-reverse}@media(prefers-color-scheme:dark){.dark\:block{display:block}.dark\:hidden{display:none}.dark\:border-gray-500{--tw-border-opacity: 1;border-color:rgb(107 114 128 / var(--tw-border-opacity, 1))}.dark\:border-gray-600{--tw-border-opacity: 1;border-color:rgb(75 85 99 / var(--tw-border-opacity, 1))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opac
```

#### public/build/assets/app-DsJ4COlh.js
```javascript
(File too large, truncated to first 50k characters...)
const __vite__mapDeps=(i,m=__vite__mapDeps,d=(m.f||(m.f=["assets/Index-BQzIMDvX.js","assets/ApiTokenManager-BoAe04Rs.js","assets/ActionMessage-Sx1QBVLc.js","assets/DialogModal-C4rPUjBQ.js","assets/SectionTitle-DnptEXNM.js","assets/_plugin-vue_export-helper-DlAUqK2U.js","assets/Checkbox-wi5km-BR.js","assets/DangerButton-C-A6Br7h.js","assets/FormSection-BC1oNm55.js","assets/TextInput-CfODIaKr.js","assets/InputLabel-DC5S04v5.js","assets/PrimaryButton-CJUs8_6-.js","assets/SecondaryButton-CYz5U_mB.js","assets/SectionBorder-JGFhNou_.js","assets/AppLayout-CAyVts_J.js","assets/ConfirmPassword-29glrrbY.js","assets/AuthenticationCard-4unKHv8U.js","assets/AuthenticationCardLogo-Bf4LXq0U.js","assets/ForgotPassword-cA5791Fc.js","assets/Login-oQqoZMW1.js","assets/Register-CwD4erIF.js","assets/ResetPassword-BLJpmhx6.js","assets/TwoFactorChallenge-Ro_5n22q.js","assets/VerifyEmail-B8G3hGIK.js","assets/Dashboard-HkkJ6dgb.js","assets/PrivacyPolicy-De-9ANHG.js","assets/DeleteUserForm-Cd43s3Aj.js","assets/LogoutOtherBrowserSessionsForm-CsF3Gqig.js","assets/TwoFactorAuthenticationForm-682eSr_g.js","assets/UpdatePasswordForm-D2QLGNYa.js","assets/UpdateProfileInformationForm-9ZGZsXeb.js","assets/Show-BiQ8Kecq.js","assets/TermsOfService-ClxGAi5H.js"])))=>i.map(i=>d[i]);
const Pp="modulepreload",_p=function(e){return"/build/"+e},xl={},De=function(t,r,n){let i=Promise.resolve();if(r&&r.length>0){let o=function(u){return Promise.all(u.map(c=>Promise.resolve(c).then(f=>({status:"fulfilled",value:f}),f=>({status:"rejected",reason:f}))))};document.getElementsByTagName("link");const a=document.querySelector("meta[property=csp-nonce]"),l=(a==null?void 0:a.nonce)||(a==null?void 0:a.getAttribute("nonce"));i=o(r.map(u=>{if(u=_p(u),u in xl)return;xl[u]=!0;const c=u.endsWith(".css"),f=c?'[rel="stylesheet"]':"";if(document.querySelector(`link[href="${u}"]${f}`))return;const g=document.createElement("link");if(g.rel=c?"stylesheet":Pp,c||(g.as="script"),g.crossOrigin="",g.href=u,l&&g.setAttribute("nonce",l),document.head.appendChild(g),c)return new Promise((v,d)=>{g.addEventListener("load",v),g.addEventListener("error",()=>d(new Error(`Unable to preload CSS for ${u}`)))})}))}function s(o){const a=new Event("vite:preloadError",{cancelable:!0});if(a.payload=o,window.dispatchEvent(a),!a.defaultPrevented)throw o}return i.then(o=>{for(const a of o||[])a.status==="rejected"&&s(a.reason);return t().catch(s)})};function pf(e,t){return function(){return e.apply(t,arguments)}}const{toString:Op}=Object.prototype,{getPrototypeOf:Zr}=Object,{iterator:Wn,toStringTag:yf}=Symbol,Oi=(({hasOwnProperty:e})=>(t,r)=>e.call(t,r))(Object.prototype),Fn=(e,t)=>{let r=e;const n=[];for(;r!=null&&r!==Object.prototype;){if(n.indexOf(r)!==-1)return!1;if(n.push(r),Oi(r,t))return!0;r=Zr(r)}return!1},Ap=(e,t)=>e!=null&&Fn(e,t)?e[t]:void 0,Ca=(e=>t=>{const r=Op.call(t);return e[r]||(e[r]=r.slice(8,-1).toLowerCase())})(Object.create(null)),It=e=>(e=e.toLowerCase(),t=>Ca(t)===e),zi=e=>t=>typeof t===e,{isArray:$r}=Array,Yr=zi("undefined");function on(e){return e!==null&&!Yr(e)&&e.constructor!==null&&!Yr(e.constructor)&&ct(e.constructor.isBuffer)&&e.constructor.isBuffer(e)}const gf=It("ArrayBuffer");function Tp(e){let t;return typeof ArrayBuffer<"u"&&ArrayBuffer.isView?t=ArrayBuffer.isView(e):t=e&&e.buffer&&gf(e.buffer),t}const xp=zi("string"),ct=zi("function"),mf=zi("number"),an=e=>e!==null&&typeof e=="object",Rp=e=>e===!0||e===!1,pi=e=>{if(!an(e))return!1;const t=Zr(e);return(t===null||t===Object.prototype||Zr(t)===null)&&!Fn(e,yf)&&!Fn(e,Wn)},Cp=e=>{if(!an(e)||on(e))return!1;try{return Object.keys(e).length===0&&Object.getPrototypeOf(e)===Object.prototype}catch{return!1}},Fp=It("Date"),Ip=It("File"),$p=e=>!!(e&&typeof e.uri<"u"),Dp=e=>e&&typeof e.getParts<"u",Lp=It("Blob"),Np=It("FileList"),Mp=e=>an(e)&&ct(e.pipe);function jp(){return typeof globalThis<"u"?globalThis:typeof self<"u"?self:typeof window<"u"?window:typeof global<"u"?global:{}}const Rl=jp(),Cl=typeof Rl.FormData<"u"?Rl.FormData:void 0,qp=e=>{if(!e)return!1;if(Cl&&e instanceof Cl)return!0;const t=Zr(e);if(!t||t===Object.prototype||!ct(e.append))return!1;const r=Ca(e);return r==="formdata"||r==="object"&&ct(e.toString)&&e.toString()==="[object FormData]"},Up=It("URLSearchParams"),[Bp,Hp,kp,Vp]=["ReadableStream","Request","Response","Headers"].map(It),Wp=e=>e.trim?e.trim():e.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,"");function Kn(e,t,{allOwnKeys:r=!1}={}){if(e===null||typeof e>"u")return;let n,i;if(typeof e!="object"&&(e=[e]),$r(e))for(n=0,i=e.length;n<i;n++)t.call(null,e[n],n,e);else{if(on(e))return;const s=r?Object.getOwnPropertyNames(e):Object.keys(e),o=s.length;let a;for(n=0;n<o;n++)a=s[n],t.call(null,e[a],a,e)}}function vf(e,t){if(on(e))return null;t=t.toLowerCase();const r=Object.keys(e);let n=r.length,i;for(;n-- >0;)if(i=r[n],t===i.toLowerCase())return i;return null}const Ar=typeof globalThis<"u"?globalThis:typeof self<"u"?self:typeof window<"u"?window:global,bf=e=>!Yr(e)&&e!==Ar;function Ko(...e){const{caseless:t,skipUndefined:r}=bf(this)&&this||{},n={},i=(s,o)=>{if(o==="__proto__"||o==="constructor"||o==="prototype")return;const a=t&&typeof o=="string"&&vf(n,o)||o,l=Oi(n,a)?n[a]:void 0;pi(l)&&pi(s)?n[a]=Ko(l,s):pi(s)?n[a]=Ko({},s):$r(s)?n[a]=s.slice():(!r||!Yr(s))&&(n[a]=s)};for(let s=0,o=e.length;s<o;s++){const a=e[s];if(!a||on(a)||(Kn(a,i),typeof a!="object"||$r(a)))continue;const l=Object.getOwnPropertySymbols(a);for(let u=0;u<l.length;u++){const c=l[u];ny.call(a,c)&&i(a[c],c)}}return n}const Kp=(e,t,r,{allOwnKeys:n}={})=>(Kn(t,(i,s)=>{r&&ct(i)?Object.defineProperty(e,s,{__proto__:null,value:pf(i,r),writable:!0,enumerable:!0,configurable:!0}):Object.defineProperty(e,s,{__proto__:null,value:i,writable:!0,enumerable:!0,configurable:!0})},{allOwnKeys:n}),e),Gp=e=>(e.charCodeAt(0)===65279&&(e=e.slice(1)),e),zp=(e,t,r,n)=>{e.prototype=Object.create(t.prototype,n),Object.defineProperty(e.prototype,"constructor",{__proto__:null,value:e,writable:!0,enumerable:!1,configurable:!0}),Object.defineProperty(e,"super",{__proto__:null,value:t.prototype}),r&&Object.assign(e.prototype,r)},Jp=(e,t,r,n)=>{let i,s,o;const a={};if(t=t||{},e==null)return t;do{for(i=Object.getOwnPropertyNames(e),s=i.length;s-- >0;)o=i[s],(!n||n(o,e,t))&&!a[o]&&(t[o]=e[o],a[o]=!0);e=r!==!1&&Zr(e)}while(e&&(!r||r(e,t))&&e!==Object.prototype);return t},Qp=(e,t,r)=>{e=String(e),(r===void 0||r>e.length)&&(r=e.length),r-=t.length;const n=e.indexOf(t,r);return n!==-1&&n===r},Xp=e=>{if(!e)return null;if($r(e))return e;let t=e.length;if(!mf(t))return null;const r=new Array(t);for(;t-- >0;)r[t]=e[t];return r},Zp=(e=>t=>e&&t instanceof e)(typeof Uint8Array<"u"&&Zr(Uint8Array)),Yp=(e,t)=>{const n=(e&&e[Wn]).call(e);let i;for(;(i=n.next())&&!i.done;){const s=i.value;t.call(e,s[0],s[1])}},ey=(e,t)=>{let r;const n=[];for(;(r=e.exec(t))!==null;)n.push(r);return n},ty=It("HTMLFormElement"),ry=e=>e.toLowerCase().replace(/[-_\s]([a-z\d])(\w*)/g,function(r,n,i){return n.toUpperCase()+i}),{propertyIsEnumerable:ny}=Object.prototype,iy=It("RegExp"),wf=(e,t)=>{const r=Object.getOwnPropertyDescriptors(e),n={};Kn(r,(i,s)=>{let o;(o=t(i,s,e))!==!1&&(n[s]=o||i)}),Object.defineProperties(e,n)},sy=e=>{wf(e,(t,r)=>{if(ct(e)&&["arguments","caller","callee"].includes(r))return!1;const n=e[r];if(ct(n)){if(t.enumerable=!1,"writable"in t){t.writable=!1;return}t.set||(t.set=()=>{throw Error("Can not rewrite read-only method '"+r+"'")})}})},oy=(e,t)=>{const r={},n=i=>{i.forEach(s=>{r[s]=!0})};return $r(e)?n(e):n(String(e).split(t)),r},ay=()=>{},ly=(e,t)=>e!=null&&Number.isFinite(e=+e)?e:t;function cy(e){return!!(e&&ct(e.append)&&e[yf]==="FormData"&&e[Wn])}const uy=e=>{const t=new WeakSet,r=n=>{if(an(n)){if(t.has(n))return;if(on(n))return n;if(!("toJSON"in n)){t.add(n);const i=$r(n)?[]:{};return Kn(n,(s,o)=>{const a=r(s);!Yr(a)&&(i[o]=a)}),t.delete(n),i}}return n};return r(e)},fy=It("AsyncFunction"),dy=e=>e&&(an(e)||ct(e))&&ct(e.then)&&ct(e.catch),Sf=((e,t)=>e?setImmediate:t?((r,n)=>(Ar.addEventListener("message",({source:i,data:s})=>{i===Ar&&s===r&&n.length&&n.shift()()},!1),i=>{n.push(i),Ar.postMessage(r,"*")}))(`axios@${Math.random()}`,[]):r=>setTimeout(r))(typeof setImmediate=="function",ct(Ar.postMessage)),hy=typeof queueMicrotask<"u"?queueMicrotask.bind(Ar):typeof process<"u"&&process.nextTick||Sf,Ef=e=>e!=null&&ct(e[Wn]),py=e=>e!=null&&Fn(e,Wn)&&Ef(e),A={isArray:$r,isArrayBuffer:gf,isBuffer:on,isFormData:qp,isArrayBufferView:Tp,isString:xp,isNumber:mf,isBoolean:Rp,isObject:an,isPlainObject:pi,isEmptyObject:Cp,isReadableStream:Bp,isRequest:Hp,isResponse:kp,isHeaders:Vp,isUndefined:Yr,isDate:Fp,isFile:Ip,isReactNativeBlob:$p,isReactNative:Dp,isBlob:Lp,isRegExp:iy,isFunction:ct,isStream:Mp,isURLSearchParams:Up,isTypedArray:Zp,isFileList:Np,forEach:Kn,merge:Ko,extend:Kp,trim:Wp,stripBOM:Gp,inherits:zp,toFlatObject:Jp,kindOf:Ca,kindOfTest:It,endsWith:Qp,toArray:Xp,forEachEntry:Yp,matchAll:ey,isHTMLForm:ty,hasOwnProperty:Oi,hasOwnProp:Oi,hasOwnInPrototypeChain:Fn,getSafeProp:Ap,reduceDescriptors:wf,freezeMethods:sy,toObjectSet:oy,toCamelCase:ry,noop:ay,toFiniteNumber:ly,findKey:vf,global:Ar,isContextDefined:bf,isSpecCompliantForm:cy,toJSONObject:uy,isAsyncFn:fy,isThenable:dy,setImmediate:Sf,asap:hy,isIterable:Ef,isSafeIterable:py},yy=A.toObjectSet(["age","authorization","content-length","content-type","etag","expires","from","host","if-modified-since","if-unmodified-since","last-modified","location","max-forwards","proxy-authorization","referer","retry-after","user-agent"]),gy=e=>{const t={};let r,n,i;return e&&e.split(`
`).forEach(function(o){i=o.indexOf(":"),r=o.substring(0,i).trim().toLowerCase(),n=o.substring(i+1).trim(),!(!r||t[r]&&yy[r])&&(r==="set-cookie"?t[r]?t[r].push(n):t[r]=[n]:t[r]=t[r]?t[r]+", "+n:n)}),t};function my(e){let t=0,r=e.length;for(;t<r;){const n=e.charCodeAt(t);if(n!==9&&n!==32)break;t+=1}for(;r>t;){const n=e.charCodeAt(r-1);if(n!==9&&n!==32)break;r-=1}return t===0&&r===e.length?e:e.slice(t,r)}const vy=new RegExp("[\\u0000-\\u0008\\u000a-\\u001f\\u007f]+","g"),by=new RegExp("[^\\u0009\\u0020-\\u007e\\u0080-\\u00ff]+","g");function Fa(e,t){return A.isArray(e)?e.map(r=>Fa(r,t)):my(String(e).replace(t,""))}const wy=e=>Fa(e,vy),Sy=e=>Fa(e,by);function Pf(e){const t=Object.create(null);return A.forEach(e.toJSON(),(r,n)=>{t[n]=Sy(r)}),t}const Fl=Symbol("internals");function un(e){return e&&String(e).trim().toLowerCase()}function yi(e){return e===!1||e==null?e:A.isArray(e)?e.map(yi):wy(String(e))}function Ey(e){const t=Object.create(null),r=/([^\s,;=]+)\s*(?:=\s*([^,;]+))?/g;let n;for(;n=r.exec(e);)t[n[1]]=n[2];return t}const Py=e=>/^[-_a-zA-Z0-9^`|~,!#$%&'*+.]+$/.test(e.trim());function Ps(e,t,r,n,i){if(A.isFunction(n))return n.call(this,t,r);if(i&&(t=r),!!A.isString(t)){if(A.isString(n))return t.indexOf(n)!==-1;if(A.isRegExp(n))return n.test(t)}}function _y(e){return e.trim().toLowerCase().replace(/([a-z\d])(\w*)/g,(t,r,n)=>r.toUpperCase()+n)}function Oy(e,t){const r=A.toCamelCase(" "+t);["get","set","has"].forEach(n=>{Object.defineProperty(e,n+r,{__proto__:null,value:function(i,s,o){return this[n].call(this,t,i,s,o)},configurable:!0})})}let Qe=class{constructor(t){t&&this.set(t)}set(t,r,n){const i=this;function s(a,l,u){const c=un(l);if(!c)return;const f=A.findKey(i,c);(!f||i[f]===void 0||u===!0||u===void 0&&i[f]!==!1)&&(i[f||l]=yi(a))}const o=(a,l)=>A.forEach(a,(u,c)=>s(u,c,l));if(A.isPlainObject(t)||t instanceof this.constructor)o(t,r);else if(A.isString(t)&&(t=t.trim())&&!Py(t))o(gy(t),r);else if(A.isObject(t)&&A.isSafeIterable(t)){let a=Object.create(null),l,u;for(const c of t){if(!A.isArray(c))throw new TypeError("Object iterator must return a key-value pair");u=c[0],A.hasOwnProp(a,u)?(l=a[u],a[u]=A.isArray(l)?[...l,c[1]]:[l,c[1]]):a[u]=c[1]}o(a,r)}else t!=null&&s(r,t,n);return this}get(t,r){if(t=un(t),t){const n=A.findKey(this,t);if(n){const i=this[n];if(!r)return i;if(r===!0)return Ey(i);if(A.isFunction(r))return r.call(this,i,n);if(A.isRegExp(r))return r.exec(i);throw new TypeError("parser must be boolean|regexp|function")}}}has(t,r){if(t=un(t),t){const n=A.findKey(this,t);return!!(n&&this[n]!==void 0&&(!r||Ps(this,this[n],n,r)))}return!1}delete(t,r){const n=this;let i=!1;function s(o){if(o=un(o),o){const a=A.findKey(n,o);a&&(!r||Ps(n,n[a],a,r))&&(delete n[a],i=!0)}}return A.isArray(t)?t.forEach(s):s(t),i}clear(t){const r=Object.keys(this);let n=r.length,i=!1;for(;n--;){const s=r[n];(!t||Ps(this,this[s],s,t,!0))&&(delete this[s],i=!0)}return i}normalize(t){const r=this,n={};return A.forEach(this,(i,s)=>{const o=A.findKey(n,s);if(o){r[o]=yi(i),delete r[s];return}const a=t?_y(s):String(s).trim();a!==s&&delete r[s],r[a]=yi(i),n[a]=!0}),this}concat(...t){return this.constructor.concat(this,...t)}toJSON(t){const r=Object.create(null);return A.forEach(this,(n,i)=>{n!=null&&n!==!1&&(r[i]=t&&A.isArray(n)?n.join(", "):n)}),r}[Symbol.iterator](){return Object.entries(this.toJSON())[Symbol.iterator]()}toString(){return Object.entries(this.toJSON()).map(([t,r])=>t+": "+r).join(`
`)}getSetCookie(){return this.get("set-cookie")||[]}get[Symbol.toStringTag](){return"AxiosHeaders"}static from(t){return t instanceof this?t:new this(t)}static concat(t,...r){const n=new this(t);return r.forEach(i=>n.set(i)),n}static accessor(t){const n=(this[Fl]=this[Fl]={accessors:{}}).accessors,i=this.prototype;function s(o){const a=un(o);n[a]||(Oy(i,o),n[a]=!0)}return A.isArray(t)?t.forEach(s):s(t),this}};Qe.accessor(["Content-Type","Content-Length","Accept","Accept-Encoding","User-Agent","Authorization"]);A.reduceDescriptors(Qe.prototype,({value:e},t)=>{let r=t[0].toUpperCase()+t.slice(1);return{get:()=>e,set(n){this[r]=n}}});A.freezeMethods(Qe);const Ay="[REDACTED ****]";function Ty(e){if(A.hasOwnProp(e,"toJSON"))return!0;let t=Object.getPrototypeOf(e);for(;t&&t!==Object.prototype;){if(A.hasOwnProp(t,"toJSON"))return!0;t=Object.getPrototypeOf(t)}return!1}function xy(e,t){const r=new Set(t.map(s=>String(s).toLowerCase())),n=[],i=s=>{if(s===null||typeof s!="object"||A.isBuffer(s))return s;if(n.indexOf(s)!==-1)return;s instanceof Qe&&(s=s.toJSON()),n.push(s);let o;if(A.isArray(s))o=[],s.forEach((a,l)=>{const u=i(a);A.isUndefined(u)||(o[l]=u)});else{if(!A.isPlainObject(s)&&Ty(s))return n.pop(),s;o=Object.create(null);for(const[a,l]of Object.entries(s)){const u=r.has(a.toLowerCase())?Ay:i(l);A.isUndefined(u)||(o[a]=u)}}return n.pop(),o};return i(e)}let z=class _f extends Error{static from(t,r,n,i,s,o){const a=new _f(t.message,r||t.code,n,i,s);return Object.defineProperty(a,"cause",{__proto__:null,value:t,writable:!0,enumerable:!1,configurable:!0}),a.name=t.name,t.status!=null&&a.status==null&&(a.status=t.status),o&&Object.assign(a,o),a}constructor(t,r,n,i,s){super(t),Object.defineProperty(this,"message",{__proto__:null,value:t,enumerable:!0,writable:!0,configurable:!0}),this.name="AxiosError",this.isAxiosError=!0,r&&(this.code=r),n&&(this.config=n),i&&(this.request=i),s&&(this.response=s,this.status=s.status)}toJSON(){const t=this.config,r=t&&A.hasOwnProp(t,"redact")?t.redact:void 0,n=A.isArray(r)&&r.length>0?xy(t,r):A.toJSONObject(t);return{message:this.message,name:this.name,description:this.description,number:this.number,fileName:this.fileName,lineNumber:this.lineNumber,columnNumber:this.columnNumber,stack:this.stack,config:n,code:this.code,status:this.status}}};z.ERR_BAD_OPTION_VALUE="ERR_BAD_OPTION_VALUE";z.ERR_BAD_OPTION="ERR_BAD_OPTION";z.ECONNABORTED="ECONNABORTED";z.ETIMEDOUT="ETIMEDOUT";z.ECONNREFUSED="ECONNREFUSED";z.ERR_NETWORK="ERR_NETWORK";z.ERR_FR_TOO_MANY_REDIRECTS="ERR_FR_TOO_MANY_REDIRECTS";z.ERR_DEPRECATED="ERR_DEPRECATED";z.ERR_BAD_RESPONSE="ERR_BAD_RESPONSE";z.ERR_BAD_REQUEST="ERR_BAD_REQUEST";z.ERR_CANCELED="ERR_CANCELED";z.ERR_NOT_SUPPORT="ERR_NOT_SUPPORT";z.ERR_INVALID_URL="ERR_INVALID_URL";z.ERR_FORM_DATA_DEPTH_EXCEEDED="ERR_FORM_DATA_DEPTH_EXCEEDED";const Ry=null,Of=100;function Go(e){return A.isPlainObject(e)||A.isArray(e)}function Af(e){return A.endsWith(e,"[]")?e.slice(0,-2):e}function _s(e,t,r){return e?e.concat(t).map(function(i,s){return i=Af(i),!r&&s?"["+i+"]":i}).join(r?".":""):t}function Cy(e){return A.isArray(e)&&!e.some(Go)}const Fy=A.toFlatObject(A,{},null,function(t){return/^is[A-Z]/.test(t)});function Ji(e,t,r){if(!A.isObject(e))throw new TypeError("target must be an object");t=t||new FormData,r=A.toFlatObject(r,{metaTokens:!0,dots:!1,indexes:!1},!1,function(S,p){return!A.isUndefined(p[S])});const n=r.metaTokens,i=r.visitor||d,s=r.dots,o=r.indexes,a=r.Blob||typeof Blob<"u"&&Blob,l=r.maxDepth===void 0?Of:r.maxDepth,u=a&&A.isSpecCompliantForm(t),c=[];if(!A.isFunction(i))throw new TypeError("visitor must be a function");function f(m){if(m===null)return"";if(A.isDate(m))return m.toISOString();if(A.isBoolean(m))return m.toString();if(!u&&A.isBlob(m))throw new z("Blob is not supported. Use a Buffer instead.");if(A.isArrayBuffer(m)||A.isTypedArray(m)){if(u&&typeof a=="function")return new a([m]);if(typeof Buffer<"u")return Buffer.from(m);throw new z("Blob is not supported. Use a Buffer instead.",z.ERR_NOT_SUPPORT)}return m}function g(m){if(m>l)throw new z("Object is too deeply nested ("+m+" levels). Max depth: "+l,z.ERR_FORM_DATA_DEPTH_EXCEEDED)}function v(m,S){if(l===1/0)return JSON.stringify(m);const p=[];return JSON.stringify(m,function(R,$){if(!A.isObject($))return $;for(;p.length&&p[p.length-1]!==this;)p.pop();return p.push($),g(S+p.length-1),$})}function d(m,S,p){let E=m;if(A.isReactNative(t)&&A.isReactNativeBlob(m))return t.append(_s(p,S,s),f(m)),!1;if(m&&!p&&typeof m=="object"){if(A.endsWith(S,"{}"))S=n?S:S.slice(0,-2),m=v(m,1);else if(A.isArray(m)&&Cy(m)||(A.isFileList(m)||A.endsWith(S,"[]"))&&(E=A.toArray(m)))return S=Af(S),E.forEach(function($,j){!(A.isUndefined($)||$===null)&&t.append(o===!0?_s([S],j,s):o===null?S:S+"[]",f($))}),!1}return Go(m)?!0:(t.append(_s(p,S,s),f(m)),!1)}const h=Object.assign(Fy,{defaultVisitor:d,convertValue:f,isVisitable:Go});function y(m,S,p=0){if(!A.isUndefined(m)){if(g(p),c.indexOf(m)!==-1)throw new Error("Circular reference detected in "+S.join("."));c.push(m),A.forEach(m,function(R,$){(!(A.isUndefined(R)||R===null)&&i.call(t,R,A.isString($)?$.trim():$,S,h))===!0&&y(R,S?S.concat($):[$],p+1)}),c.pop()}}if(!A.isObject(e))throw new TypeError("data must be an object");return y(e),t}function Il(e){const t={"!":"%21","'":"%27","(":"%28",")":"%29","~":"%7E","%20":"+"};return encodeURIComponent(e).replace(/[!'()~]|%20/g,function(n){return t[n]})}function Ia(e,t){this._pairs=[],e&&Ji(e,this,t)}const Tf=Ia.prototype;Tf.append=function(t,r){this._pairs.push([t,r])};Tf.toString=function(t){const r=t?n=>t.call(this,n,Il):Il;return this._pairs.map(function(i){return r(i[0])+"="+r(i[1])},"").join("&")};function Iy(e){return encodeURIComponent(e).replace(/%3A/gi,":").replace(/%24/g,"$").replace(/%2C/gi,",").replace(/%20/g,"+")}function xf(e,t,r){if(!t)return e;e=e||"";const n=A.isFunction(r)?{serialize:r}:r,i=A.getSafeProp(n,"encode")||Iy,s=A.getSafeProp(n,"serialize");let o;if(s?o=s(t,n):o=A.isURLSearchParams(t)?t.toString():new Ia(t,n).toString(i),o){const a=e.indexOf("#");a!==-1&&(e=e.slice(0,a)),e+=(e.indexOf("?")===-1?"?":"&")+o}return e}class $l{constructor(){this.handlers=[]}use(t,r,n){return this.handlers.push({fulfilled:t,rejected:r,synchronous:n?n.synchronous:!1,runWhen:n?n.runWhen:null}),this.handlers.length-1}eject(t){this.handlers[t]&&(this.handlers[t]=null)}clear(){this.handlers&&(this.handlers=[])}forEach(t){A.forEach(this.handlers,function(n){n!==null&&t(n)})}}const $a={silentJSONParsing:!0,forcedJSONParsing:!0,clarifyTimeoutError:!1,legacyInterceptorReqResOrdering:!0,advertiseZstdAcceptEncoding:!1,validateStatusUndefinedResolves:!0},$y=typeof URLSearchParams<"u"?URLSearchParams:Ia,Dy=typeof FormData<"u"?FormData:null,Ly=typeof Blob<"u"?Blob:null,Ny={isBrowser:!0,classes:{URLSearchParams:$y,FormData:Dy,Blob:Ly},protocols:["http","https","file","blob","url","data"]},Da=typeof window<"u"&&typeof document<"u",zo=typeof navigator=="object"&&navigator||void 0,My=Da&&(!zo||["ReactNative","NativeScript","NS"].indexOf(zo.product)<0),jy=typeof WorkerGlobalScope<"u"&&self instanceof WorkerGlobalScope&&typeof self.importScripts=="function",qy=Da&&window.location.href||"http://localhost",Uy=Object.freeze(Object.defineProperty({__proto__:null,hasBrowserEnv:Da,hasStandardBrowserEnv:My,hasStandardBrowserWebWorkerEnv:jy,navigator:zo,origin:qy},Symbol.toStringTag,{value:"Module"})),ke={...Uy,...Ny};function By(e,t){return Ji(e,new ke.classes.URLSearchParams,{visitor:function(r,n,i,s){return ke.isNode&&A.isBuffer(r)?(this.append(n,r.toString("base64")),!1):s.defaultVisitor.apply(this,arguments)},...t})}const Dl=Of;function Rf(e){if(e>Dl)throw new z("FormData field is too deeply nested ("+e+" levels). Max depth: "+Dl,z.ERR_FORM_DATA_DEPTH_EXCEEDED)}function Hy(e){const t=[],r=/\w+|\[(\w*)]/g;let n;for(;(n=r.exec(e))!==null;)Rf(t.length),t.push(n[0]==="[]"?"":n[1]||n[0]);return t}function ky(e){const t={},r=Object.keys(e);let n;const i=r.length;let s;for(n=0;n<i;n++)s=r[n],t[s]=e[s];return t}function Cf(e){function t(r,n,i,s){Rf(s);let o=r[s++];if(o==="__proto__")return!0;const a=Number.isFinite(+o),l=s>=r.length;return o=!o&&A.isArray(i)?i.length:o,l?(A.hasOwnProp(i,o)?i[o]=A.isArray(i[o])?i[o].concat(n):[i[o],n]:i[o]=n,!a):((!A.hasOwnProp(i,o)||!A.isObject(i[o]))&&(i[o]=[]),t(r,n,i[o],s)&&A.isArray(i[o])&&(i[o]=ky(i[o])),!a)}if(A.isFormData(e)&&A.isFunction(e.entries)){const r={};return A.forEachEntry(e,(n,i)=>{t(Hy(n),i,r,0)}),r}return null}const Hr=(e,t)=>e!=null&&A.hasOwnProp(e,t)?e[t]:void 0;function Vy(e,t,r){if(A.isString(e))try{return(t||JSON.parse)(e),A.trim(e)}catch(n){if(n.name!=="SyntaxError")throw n}return(r||JSON.stringify)(e)}const Gn={transitional:$a,adapter:["xhr","http","fetch"],transformRequest:[function(t,r){const n=r.getContentType()||"",i=n.indexOf("application/json")>-1,s=A.isObject(t);if(s&&A.isHTMLForm(t)&&(t=new FormData(t)),A.isFormData(t))return i?JSON.stringify(Cf(t)):t;if(A.isArrayBuffer(t)||A.isBuffer(t)||A.isStream(t)||A.isFile(t)||A.isBlob(t)||A.isReadableStream(t))return t;if(A.isArrayBufferView(t))return t.buffer;if(A.isURLSearchParams(t))return r.setContentType("application/x-www-form-urlencoded;charset=utf-8",!1),t.toString();let a;if(s){const l=Hr(this,"formSerializer");if(n.indexOf("application/x-www-form-urlencoded")>-1)return By(t,l).toString();if((a=A.isFileList(t))||n.indexOf("multipart/form-data")>-1){const u=Hr(this,"env"),c=u&&u.FormData;return Ji(a?{"files[]":t}:t,c&&new c,l)}}return s||i?(r.setContentType("application/json",!1),Vy(t)):t}],transformResponse:[function(t){const r=Hr(this,"transitional")||Gn.transitional,n=r&&r.forcedJSONParsing,i=Hr(this,"responseType"),s=i==="json";if(A.isResponse(t)||A.isReadableStream(t))return t;if(t&&A.isString(t)&&(n&&!i||s)){const a=!(r&&r.silentJSONParsing)&&s;try{return JSON.parse(t,Hr(this,"parseReviver"))}catch(l){if(a)throw l.name==="SyntaxError"?z.from(l,z.ERR_BAD_RESPONSE,this,null,Hr(this,"response")):l}}return t}],timeout:0,xsrfCookieName:"XSRF-TOKEN",xsrfHeaderName:"X-XSRF-TOKEN",maxContentLength:-1,maxBodyLength:-1,env:{FormData:ke.classes.FormData,Blob:ke.classes.Blob},validateStatus:function(t){return t>=200&&t<300},headers:{common:{Accept:"application/json, text/plain, */*","Content-Type":void 0}}};A.forEach(["delete","get","head","post","put","patch","query"],e=>{Gn.headers[e]={}});function Os(e,t){const r=this||Gn,n=t||r,i=Qe.from(n.headers);let s=n.data;return A.forEach(e,function(a){s=a.call(r,s,i.normalize(),t?t.status:void 0)}),i.normalize(),s}function Ff(e){return!!(e&&e.__CANCEL__)}let zn=class extends z{constructor(t,r,n){super(t??"canceled",z.ERR_CANCELED,r,n),this.name="CanceledError",this.__CANCEL__=!0}};function If(e,t,r){const n=r.config.validateStatus;!r.status||!n||n(r.status)?e(r):t(new z("Request failed with status code "+r.status,r.status>=400&&r.status<500?z.ERR_BAD_REQUEST:z.ERR_BAD_RESPONSE,r.config,r.request,r))}function Wy(e){const t=/^([-+\w]{1,25}):(?:\/\/)?/.exec(e);return t&&t[1]||""}function Ky(e,t){e=e||10;const r=new Array(e),n=new Array(e);let i=0,s=0,o;return t=t!==void 0?t:1e3,function(l){const u=Date.now(),c=n[s];o||(o=u),r[i]=l,n[i]=u;let f=s,g=0;for(;f!==i;)g+=r[f++],f=f%e;if(i=(i+1)%e,i===s&&(s=(s+1)%e),u-o<t)return;const v=c&&u-c;return v?Math.round(g*1e3/v):void 0}}function Gy(e,t){let r=0,n=1e3/t,i,s;const o=(u,c=Date.now())=>{r=c,i=null,s&&(clearTimeout(s),s=null),e(...u)};return[(...u)=>{const c=Date.now(),f=c-r;f>=n?o(u,c):(i=u,s||(s=setTimeout(()=>{s=null,o(i)},n-f)))},()=>i&&o(i)]}const Ai=(e,t,r=3)=>{let n=0;const i=Ky(50,250);return Gy(s=>{if(!s||typeof s.loaded!="number")return;const o=s.loaded,a=s.lengthComputable?s.total:void 0,l=a!=null?Math.min(o,a):o,u=Math.max(0,l-n),c=i(u);n=Math.max(n,l);const f={loaded:l,total:a,progress:a?l/a:void 0,bytes:u,rate:c||void 0,estimated:c&&a?(a-l)/c:void 0,event:s,lengthComputable:a!=null,[t?"download":"upload"]:!0};e(f)},r)},Ll=(e,t)=>{const r=e!=null;return[n=>t[0]({lengthComputable:r,total:e,loaded:n}),t[1]]},Nl=e=>(...t)=>A.asap(()=>e(...t)),zy=ke.hasStandardBrowserEnv?((e,t)=>r=>(r=new URL(r,ke.origin),e.protocol===r.protocol&&e.host===r.host&&(t||e.port===r.port)))(new URL(ke.origin),ke.navigator&&/(msie|trident)/i.test(ke.navigator.userAgent)):()=>!0,Jy=ke.hasStandardBrowserEnv?{write(e,t,r,n,i,s,o){if(typeof document>"u")return;const a=[`${e}=${encodeURIComponent(t)}`];A.isNumber(r)&&a.push(`expires=${new Date(r).toUTCString()}`),A.isString(n)&&a.push(`path=${n}`),A.isString(i)&&a.push(`domain=${i}`),s===!0&&a.push("secure"),A.isString(o)&&a.push(`SameSite=${o}`),document.cookie=a.join("; ")},read(e){if(typeof document>"u")return null;const t=document.cookie.split(";");for(let r=0;r<t.length;r++){const n=t[r].replace(/^\s+/,""),i=n.indexOf("=");if(i!==-1&&n.slice(0,i)===e)try{return decodeURIComponent(n.slice(i+1))}catch{return n.slice(i+1)}}return null},remove(e){this.write(e,"",Date.now()-864e5,"/")}}:{write(){},read(){return null},remove(){}};function Qy(e){return typeof e!="string"?!1:/^([a-z][a-z\d+\-.]*:)?\/\//i.test(e)}function Xy(e,t){return t?e.replace(/\/?\/$/,"")+"/"+t.replace(/^\/+/,""):e}const Zy=/^https?:(?!\/\/)/i,Yy=/[\t\n\r]/g;function eg(e){let t=0;for(;t<e.length&&e.charCodeAt(t)<=32;)t++;return e.slice(t)}function tg(e){return eg(e).replace(Yy,"")}function Ml(e,t){if(typeof e=="string"&&Zy.test(tg(e)))throw new z('Invalid URL: missing "//" after protocol',z.ERR_INVALID_URL,t)}function $f(e,t,r,n){Ml(t,n);let i=!Qy(t);return e&&(i||r===!1)?(Ml(e,n),Xy(e,t)):t}const jl=e=>e instanceof Qe?{...e}:e;function Dr(e,t){e=e||{},t=t||{};const r=Object.create(null);Object.defineProperty(r,"hasOwnProperty",{__proto__:null,value:Object.prototype.hasOwnProperty,enumerable:!1,writable:!0,configurable:!0});function n(c,f,g,v){return A.isPlainObject(c)&&A.isPlainObject(f)?A.merge.call({caseless:v},c,f):A.isPlainObject(f)?A.merge({},f):A.isArray(f)?f.slice():f}function i(c,f,g,v){if(A.isUndefined(f)){if(!A.isUndefined(c))return n(void 0,c,g,v)}else return n(c,f,g,v)}function s(c,f){if(!A.isUndefined(f))return n(void 0,f)}function o(c,f){if(A.isUndefined(f)){if(!A.isUndefined(c))return n(void 0,c)}else return n(void 0,f)}function a(c){const f=A.hasOwnProp(t,"transitional")?t.transitional:void 0;if(!A.isUndefined(f))if(A.isPlainObject(f)){if(A.hasOwnProp(f,c))return f[c]}else return;const g=A.hasOwnProp(e,"transitional")?e.transitional:void 0;if(A.isPlainObject(g)&&A.hasOwnProp(g,c))return g[c]}function l(c,f,g){if(A.hasOwnProp(t,g))return n(c,f);if(A.hasOwnProp(e,g))return n(void 0,c)}const u={url:s,method:s,data:s,baseURL:o,transformRequest:o,transformResponse:o,paramsSerializer:o,timeout:o,timeoutMessage:o,withCredentials:o,withXSRFToken:o,adapter:o,responseType:o,xsrfCookieName:o,xsrfHeaderName:o,onUploadProgress:o,onDownloadProgress:o,decompress:o,maxContentLength:o,maxBodyLength:o,beforeRedirect:o,transport:o,httpAgent:o,httpsAgent:o,cancelToken:o,socketPath:o,allowedSocketPaths:o,responseEncoding:o,validateStatus:l,headers:(c,f,g)=>i(jl(c),jl(f),g,!0)};return A.forEach(Object.keys({...e,...t}),function(f){if(f==="__proto__"||f==="constructor"||f==="prototype")return;const g=A.hasOwnProp(u,f)?u[f]:i,v=A.hasOwnProp(e,f)?e[f]:void 0,d=A.hasOwnProp(t,f)?t[f]:void 0,h=g(v,d,f);A.isUndefined(h)&&g!==l||(r[f]=h)}),A.hasOwnProp(t,"validateStatus")&&A.isUndefined(t.validateStatus)&&a("validateStatusUndefinedResolves")===!1&&(A.hasOwnProp(e,"validateStatus")?r.validateStatus=n(void 0,e.validateStatus):delete r.validateStatus),r}const rg=["content-type","content-length"];function ng(e,t,r){if(r!=="content-only"){e.set(t);return}Object.entries(t||{}).forEach(([n,i])=>{rg.includes(n.toLowerCase())&&e.set(n,i)})}const ig=e=>encodeURIComponent(e).replace(/%([0-9A-F]{2})/gi,(t,r)=>String.fromCharCode(parseInt(r,16)));function Df(e){const t=Dr({},e),r=g=>A.hasOwnProp(t,g)?t[g]:void 0,n=r("data");let i=r("withXSRFToken");const s=r("xsrfHeaderName"),o=r("xsrfCookieName");let a=r("headers");const l=r("auth"),u=r("baseURL"),c=r("allowAbsoluteUrls"),f=r("url");if(t.headers=a=Qe.from(a),t.url=xf($f(u,f,c,t),r("params"),r("paramsSerializer")),l){const g=A.getSafeProp(l,"username")||"",v=A.getSafeProp(l,"password")||"";try{a.set("Authorization","Basic "+btoa(g+":"+(v?ig(v):"")))}catch(d){throw z.from(d,z.ERR_BAD_OPTION_VALUE,e)}}if(A.isFormData(n)&&(ke.hasStandardBrowserEnv||ke.hasStandardBrowserWebWorkerEnv||A.isReactNative(n)?a.setContentType(void 0):A.isFunction(n.getHeaders)&&ng(a,n.getHeaders(),r("formDataHeaderPolicy"))),ke.hasStandardBrowserEnv&&(A.isFunction(i)&&(i=i(t)),i===!0||i==null&&zy(t.url))){const v=s&&o&&Jy.read(o);v&&a.set(s,v)}return t}const sg=typeof XMLHttpRequest<"u",og=sg&&function(e){return new Promise(function(r,n){const i=Df(e);let s=i.data;const o=Qe.from(i.headers).normalize();let{responseType:a,onUploadProgress:l,onDownloadProgress:u}=i,c,f,g,v,d;function h(){v&&v(),d&&d(),i.cancelToken&&i.cancelToken.unsubscribe(c),i.signal&&i.signal.removeEventListener("abort",c)}let y=new XMLHttpRequest;y.open(i.method.toUpperCase(),i.url,!0),y.timeout=i.timeout;function m(){if(!y)return;const p=Qe.from("getAllResponseHeaders"in y&&y.getAllResponseHeaders()),R={data:!a||a==="text"||a==="json"?y.responseText:y.response,status:y.status,statusText:y.statusText,headers:p,config:e,request:y};If(function(j){r(j),h()},function(j){n(j),h()},R),y=null}"onloadend"in y?y.onloadend=m:y.onreadystatechange=function(){!y||y.readyState!==4||y.status===0&&!(y.responseURL&&y.responseURL.startsWith("file:"))||setTimeout(m)},y.onabort=function(){y&&(n(new z("Request aborted",z.ECONNABORTED,e,y)),h(),y=null)},y.onerror=function(E){const R=E&&E.message?E.message:"Network Error",$=new z(R,z.ERR_NETWORK,e,y);$.event=E||null,n($),h(),y=null},y.ontimeout=function(){let E=i.timeout?"timeout of "+i.timeout+"ms exceeded":"timeout exceeded";const R=i.transitional||$a;i.timeoutErrorMessage&&(E=i.timeoutErrorMessage),n(new z(E,R.clarifyTimeoutError?z.ETIMEDOUT:z.ECONNABORTED,e,y)),h(),y=null},s===void 0&&o.setContentType(null),"setRequestHeader"in y&&A.forEach(Pf(o),function(E,R){y.setRequestHeader(R,E)}),A.isUndefined(i.withCredentials)||(y.withCredentials=!!i.withCredentials),a&&a!=="json"&&(y.responseType=i.responseType),u&&([g,d]=Ai(u,!0),y.addEventListener("progress",g)),l&&y.upload&&([f,v]=Ai(l),y.upload.addEventListener("progress",f),y.upload.addEventListener("loadend",v)),(i.cancelToken||i.signal)&&(c=p=>{y&&(n(!p||p.type?new zn(null,e,y):p),y.abort(),h(),y=null)},i.cancelToken&&i.cancelToken.subscribe(c),i.signal&&(i.signal.aborted?c():i.signal.addEventListener("abort",c)));const S=Wy(i.url);if(S&&!ke.protocols.includes(S)){n(new z("Unsupported protocol "+S+":",z.ERR_BAD_REQUEST,e)),h();return}y.send(s||null)})},ag=(e,t)=>{if(e=e?e.filter(Boolean):[],!t&&!e.length)return;const r=new AbortController;let n=!1;const i=function(l){if(!n){n=!0,o();const u=l instanceof Error?l:this.reason;r.abort(u instanceof z?u:new zn(u instanceof Error?u.message:u))}};let s=t&&setTimeout(()=>{s=null,i(new z(`timeout of ${t}ms exceeded`,z.ETIMEDOUT))},t);const o=()=>{e&&(s&&clearTimeout(s),s=null,e.forEach(l=>{l.unsubscribe?l.unsubscribe(i):l.removeEventListener("abort",i)}),e=null)};e.forEach(l=>l.addEventListener("abort",i,{once:!0}));const{signal:a}=r;return a.unsubscribe=()=>A.asap(o),a},lg=function*(e,t){let r=e.byteLength;if(r<t){yield e;return}let n=0,i;for(;n<r;)i=n+t,yield e.slice(n,i),n=i},cg=async function*(e,t){for await(const r of ug(e))yield*lg(r,t)},ug=async function*(e){if(e[Symbol.asyncIterator]){yield*e;return}const t=e.getReader();try{for(;;){const{done:r,value:n}=await t.read();if(r)break;yield n}}finally{await t.cancel()}},ql=(e,t,r,n)=>{const i=cg(e,t);let s=0,o,a=l=>{o||(o=!0,n&&n(l))};return new ReadableStream({async pull(l){try{const{done:u,value:c}=await i.next();if(u){a(),l.close();return}let f=c.byteLength;if(r){let g=s+=f;r(g)}l.enqueue(new Uint8Array(c))}catch(u){throw a(u),u}},cancel(l){return a(l),i.return()}},{highWaterMark:2})},Ti=e=>e>=48&&e<=57||e>=65&&e<=70||e>=97&&e<=102,fg=(e,t,r)=>t+2<r&&Ti(e.charCodeAt(t+1))&&Ti(e.charCodeAt(t+2));function dg(e){if(!e||typeof e!="string"||!e.startsWith("data:"))return 0;const t=e.indexOf(",");if(t<0)return 0;const r=e.slice(5,t),n=e.slice(t+1);if(/;base64/i.test(r)){let o=n.length;const a=n.length;for(let v=0;v<a;v++)if(n.charCodeAt(v)===37&&v+2<a){const d=n.charCodeAt(v+1),h=n.charCodeAt(v+2);Ti(d)&&Ti(h)&&(o-=2,v+=2)}let l=0,u=a-1;const c=v=>v>=2&&n.charCodeAt(v-2)===37&&n.charCodeAt(v-1)===51&&(n.charCodeAt(v)===68||n.charCodeAt(v)===100);u>=0&&(n.charCodeAt(u)===61?(l++,u--):c(u)&&(l++,u-=3)),l===1&&u>=0&&(n.charCodeAt(u)===61||c(u))&&l++;const g=Math.floor(o/4)*3-(l||0);return g>0?g:0}let s=0;for(let o=0,a=n.length;o<a;o++){const l=n.charCodeAt(o);if(l===37&&fg(n,o,a))s+=1,o+=2;else if(l<128)s+=1;else if(l<2048)s+=2;else if(l>=55296&&l<=56319&&o+1<a){const u=n.charCodeAt(o+1);u>=56320&&u<=57343?(s+=4,o++):s+=3}else s+=3}return s}const La="1.18.1",Ul=64*1024,{isFunction:ii}=A,hg=e=>encodeURIComponent(e).replace(/%([0-9A-F]{2})/gi,(t,r)=>String.fromCharCode(parseInt(r,16))),Bl=e=>{if(!A.isString(e))return e;try{return decodeURIComponent(e)}catch{return e}},Hl=(e,...t)=>{try{return!!e(...t)}catch{return!1}},pg=e=>{const t=e.indexOf("://");let r=e;return t!==-1&&(r=r.slice(t+3)),r.includes("@")||r.includes(":")},yg=e=>{const t=A.global!==void 0&&A.global!==null?A.global:globalThis,{ReadableStream:r,TextEncoder:n}=t;e=A.merge.call({skipUndefined:!0},{Request:t.Request,Response:t.Response},e);const{fetch:i,Request:s,Response:o}=e,a=i?ii(i):typeof fetch=="function",l=ii(s),u=ii(o);if(!a)return!1;const c=a&&ii(r),f=a&&(typeof n=="function"?(m=>S=>m.encode(S))(new n):async m=>new Uint8Array(await new s(m).arrayBuffer())),g=l&&c&&Hl(()=>{let m=!1;const S=new s(ke.origin,{body:new r,method:"POST",get duplex(){return m=!0,"half"}}),p=S.headers.has("Content-Type");return S.body!=null&&S.body.cancel(),m&&!p}),v=u&&c&&Hl(()=>A.isReadableStream(new o("").body)),d={stream:v&&(m=>m.body)};a&&["text","arrayBuffer","blob","formData","stream"].forEach(m=>{!d[m]&&(d[m]=(S,p)=>{let E=S&&S[m];if(E)return E.call(S);throw new z(`Response type '${m}' is not supported`,z.ERR_NOT_SUPPORT,p)})});const h=async m=>{if(m==null)return 0;if(A.isBlob(m))return m.size;if(A.isSpecCompliantForm(m))return(await new s(ke.origin,{method:"POST",body:m}).arrayBuffer()).byteLength;if(A.isArrayBufferView(m)||A.isArrayBuffer(m))return m.byteLength;if(A.isURLSearchParams(m)&&(m=m+""),A.isString(m))return(await f(m)).byteLength},y=async(m,S)=>{const p=A.toFiniteNumber(m.getContentLength());return p??h(S)};return async m=>{let{url:S,method:p,data:E,signal:R,cancelToken:$,timeout:j,onDownloadProgress:q,onUploadProgress:P,responseType:T,headers:w,withCredentials:O="same-origin",fetchOptions:L,maxContentLength:M,maxBodyLength:X}=Df(m);const B=A.isNumber(M)&&M>-1,J=A.isNumber(X)&&X>-1,H=ie=>A.hasOwnProp(m,ie)?m[ie]:void 0;let te=i||fetch;T=T?(T+"").toLowerCase():"text";let Q=ag([R,$&&$.toAbortSignal()],j),V=null;const ce=Q&&Q.unsubscribe&&(()=>{Q.unsubscribe()});let Re,Ke=null;const it=()=>new z("Request body larger than maxBodyLength limit",z.ERR_BAD_REQUEST,m,V);try{let ie;const Se=H("auth");if(Se){const C=A.getSafeProp(Se,"username")||"",D=A.getSafeProp(Se,"password")||"";ie={username:C,password:D}}if(pg(S)){const C=new URL(S,ke.origin);if(!ie&&(C.username||C.password)){const D=Bl(C.username),N=Bl(C.password);ie={username:D,password:N}}(C.username||C.password)&&(C.username="",C.password="",S=C.href)}if(ie&&(w.delete("authorization"),w.set("Authorization","Basic "+btoa(hg((ie.username||"")+":"+(ie.password||""))))),B&&typeof S=="string"&&S.startsWith("data:")&&dg(S)>M)throw new z("maxContentLength size of "+M+" exceeded",z.ERR_BAD_RESPONSE,m,V);if(J&&p!=="get"&&p!=="head"){const C=await h(E);if(typeof C=="number"&&isFinite(C)&&(Re=C,C>X))throw it()}const Be=J&&(A.isReadableStream(E)||A.isStream(E)),Ce=(C,D,N)=>ql(C,Ul,K=>{if(J&&K>X)throw Ke=it();D&&D(K)},N);if(g&&p!=="get"&&p!=="head"&&(P||Be)){if(Re=Re??await y(w,E),Re!==0||Be){let C=new s(S,{method:"POST",body:E,duplex:"half"}),D;if(A.isFormData(E)&&(D=C.headers.get("content-type"))&&w.setContentType(D),C.body){const[N,K]=P&&Ll(Re,Ai(Nl(P)))||[];E=Ce(C.body,N,K)}}}else if(Be&&!l&&c&&p!=="get"&&p!=="head")E=Ce(E);else if(Be&&l&&!g&&p!=="get"&&p!=="head")throw new z("Stream request bodies are not supported by the current fetch implementation",z.ERR_NOT_SUPPORT,m,V);A.isString(O)||(O=O?"include":"omit");const oe=l&&"credentials"in s.prototype;if(A.isFormData(E)){const C=w.getContentType();C&&/^multipart\/form-data/i.test(C)&&!/boundary=/i.test(C)&&w.delete("content-type")}w.set("User-Agent","axios/"+La,!1);const be={...L,signal:Q,method:p.toUpperCase(),headers:Pf(w.normalize()),body:E,duplex:"half",credentials:oe?O:void 0};V=l&&new s(S,be);let ae=await(l?te(V,L):te(S,be));const b=Qe.from(ae.headers);if(B){const C=A.toFiniteNumber(b.getContentLength());if(C!=null&&C>M)throw new z("maxContentLength size of "+M+" exceeded",z.ERR_BAD_RESPONSE,m,V)}const _=v&&(T==="stream"||T==="response");if(v&&ae.body&&(q||B||_&&ce)){const C={};["status","statusText","headers"].forEach(U=>{C[U]=ae[U]});const D=A.toFiniteNumber(b.getContentLength()),[N,K]=q&&Ll(D,Ai(Nl(q),!0))||[];let W=0;const k=U=>{if(B&&(W=U,W>M))throw new z("maxContentLength size of "+M+" exceeded",z.ERR_BAD_RESPONSE,m,V);N&&N(U)};ae=new o(ql(ae.body,Ul,k,()=>{K&&K(),ce&&ce()}),C)}T=T||"text";let F=await d[A.findKey(d,T)||"text"](ae,m);if(B&&!v&&!_){let C;if(F!=null&&(typeof F.byteLength=="number"?C=F.byteLength:typeof F.size=="number"?C=F.size:typeof F=="string"&&(C=typeof n=="function"?new n().encode(F).byteLength:F.length)),typeof C=="number"&&C>M)throw new z("maxContentLength size of "+M+" exceeded",z.ERR_BAD_RESPONSE,m,V)}return!_&&ce&&ce(),await new Promise((C,D)=>{If(C,D,{data:F,headers:Qe.from(ae.headers),status:ae.status,statusText:ae.statusText,config:m,request:V})})}catch(ie){if(ce&&ce(),Q&&Q.aborted&&Q.reason instanceof z){const Se=Q.reason;throw Se.config=m,V&&(Se.request=V),ie!==Se&&Object.defineProperty(Se,"cause",{__proto__:null,value:ie,writable:!0,enumerable:!1,configurable:!0}),Se}if(Ke)throw V&&!Ke.request&&(Ke.request=V),Ke;if(ie instanceof z)throw V&&!ie.request&&(ie.request=V),ie;if(ie&&ie.name==="TypeError"&&/Load failed|fetch/i.test(ie.message)){const Se=new z("Network Error",z.ERR_NETWORK,m,V,ie&&ie.response);throw Object.defineProperty(Se,"cause",{__proto__:null,value:ie.cause||ie,writable:!0,enumerable:!1,configurable:!0}),Se}throw z.from(ie,ie&&ie.code,m,V,ie&&ie.response)}}},gg=new Map,Lf=e=>{let t=e&&e.env||{};const{fetch:r,Request:n,Response:i}=t,s=[n,i,r];let o=s.length,a=o,l,u,c=gg;for(;a--;)l=s[a],u=c.get(l),u===void 0&&c.set(l,u=a?new Map:yg(t)),c=u;return u};Lf();const Na={http:Ry,xhr:og,fetch:{get:Lf}};A.forEach(Na,(e,t)=>{if(e){try{Object.defineProperty(e,"name",{__proto__:null,value:t})}catch{}Object.defineProperty(e,"adapterName",{__proto__:null,value:t})}});const kl=e=>`- ${e}`,mg=e=>A.isFunction(e)||e===null||e===!1;function vg(e,t){e=A.isArray(e)?e:[e];const{length:r}=e;let n,i;const s={};for(let o=0;o<r;o++){n=e[o];let a;if(i=n,!mg(n)&&(i=Na[(a=String(n)).toLowerCase()],i===void 0))throw new z(`Unknown adapter '${a}'`);if(i&&(A.isFunction(i)||(i=i.get(t))))break;s[a||"#"+o]=i}if(!i){const o=Object.entries(s).map(([l,u])=>`adapter ${l} `+(u===!1?"is not supported by the environment":"is not available in the build"));let a=r?o.length>1?`since :
`+o.map(kl).join(`
`):" "+kl(o[0]):"as no adapter specified";throw new z("There is no suitable adapter to dispatch the request "+a,z.ERR_NOT_SUPPORT)}return i}const Nf={getAdapter:vg,adapters:Na};function As(e){if(e.cancelToken&&e.cancelToken.throwIfRequested(),e.signal&&e.signal.aborted)throw new zn(null,e)}function Vl(e){return As(e),e.headers=Qe.from(e.headers),e.data=Os.call(e,e.transformRequest),["post","put","patch"].indexOf(e.method)!==-1&&e.headers.setContentType("application/x-www-form-urlencoded",!1),Nf.getAdapter(e.adapter||Gn.adapter,e)(e).then(function(n){As(e),e.response=n;try{n.data=Os.call(e,e.transformResponse,n)}finally{delete e.response}return n.headers=Qe.from(n.headers),n},function(n){if(!Ff(n)&&(As(e),n&&n.response)){e.response=n.response;try{n.response.data=Os.call(e,e.transformResponse,n.response)}finally{delete e.response}n.response.headers=Qe.from(n.response.headers)}return Promise.reject(n)})}const Qi={};["object","boolean","number","function","string","symbol"].forEach((e,t)=>{Qi[e]=function(n){return typeof n===e||"a"+(t<1?"n ":" ")+e}});const Wl={};Qi.transitional=function(t,r,n){function i(s,o){return"[Axios v"+La+"] Transitional option '"+s+"'"+o+(n?". "+n:"")}return(s,o,a)=>{if(t===!1)throw new z(i(o," has been removed"+(r?" in "+r:"")),z.ERR_DEPRECATED);return r&&!Wl[o]&&(Wl[o]=!0,console.warn(i(o," has been deprecated since v"+r+" and will be removed in the near future"))),t?t(s,o,a):!0}};Qi.spelling=function(t){return(r,n)=>(console.warn(`${n} is likely a misspelling of ${t}`),!0)};function bg(e,t,r){if(typeof e!="object"||e===null)throw new z("options must be an object",z.ERR_BAD_OPTION_VALUE);const n=Object.keys(e);let i=n.length;for(;i-- >0;){const s=n[i],o=Object.prototype.hasOwnProperty.call(t,s)?t[s]:void 0;if(o){const a=e[s],l=a===void 0||o(a,s,e);if(l!==!0)throw new z("option "+s+" must be "+l,z.ERR_BAD_OPTION_VALUE);continue}if(r!==!0)throw new z("Unknown option "+s,z.ERR_BAD_OPTION)}}const gi={assertOptions:bg,validators:Qi},Ge=gi.validators;let Tr=class{constructor(t){this.defaults=t||{},this.interceptors={request:new $l,response:new $l}}async request(t,r){try{return await this._request(t,r)}catch(n){if(n instanceof Error){let i={};Error.captureStackTrace?Error.captureStackTrace(i):i=new Error;const s=(()=>{if(!i.stack)return"";const o=i.stack.indexOf(`
`);return o===-1?"":i.stack.slice(o+1)})();try{if(!n.stack)n.stack=s;else if(s){const o=s.indexOf(`
`),a=o===-1?-1:s.indexOf(`
`,o+1),l=a===-1?"":s.slice(a+1);String(n.stack).endsWith(l)||(n.stack+=`
`+s)}}catch{}}throw n}}_request(t,r){typeof t=="string"?(r=r||{},r.url=t):r=t||{},r=Dr(this.defaults,r);const{transitional:n,paramsSerializer:i,headers:s}=r;n!==void 0&&gi.assertOptions(n,{silentJSONParsing:Ge.transitional(Ge.boolean),forcedJSONParsing:Ge.transitional(Ge.boolean),clarifyTimeoutError:Ge.transitional(Ge.boolean),legacyInterceptorReqResOrdering:Ge.transitional(Ge.boolean),advertiseZstdAcceptEncoding:Ge.transitional(Ge.boolean),validateStatusUndefinedResolves:Ge.transitional(Ge.boolean)},!1),i!=null&&(A.isFunction(i)?r.paramsSerializer={serialize:i}:gi.assertOptions(i,{encode:Ge.function,serialize:Ge.function},!0)),r.allowAbsoluteUrls!==void 0||(this.defaults.allowAbsoluteUrls!==void 0?r.allowAbsoluteUrls=this.defaults.allowAbsoluteUrls:r.allowAbsoluteUrls=!0),gi.assertOptions(r,{baseUrl:Ge.spelling("baseURL"),withXsrfToken:Ge.spelling("withXSRFToken")},!0),r.method=(r.method||this.defaults.method||"get").toLowerCase();let o=s&&A.merge(s.common,s[r.method]);s&&A.forEach(["delete","get","head","post","put","patch","query","common"],d=>{delete s[d]}),r.headers=Qe.concat(o,s);const a=[];let l=!0;this.interceptors.request.forEach(function(h){if(typeof h.runWhen=="function"&&h.runWhen(r)===!1)return;l=l&&h.synchronous;const y=r.transitional||$a;y&&y.legacyInterceptorReqResOrdering?a.unshift(h.fulfilled,h.rejected):a.push(h.fulfilled,h.rejected)});const u=[];this.interceptors.response.forEach(function(h){u.push(h.fulfilled,h.rejected)});let c,f=0,g;if(!l){const d=[Vl.bind(this),void 0];for(d.unshift(...a),d.push(...u),g=d.length,c=Promise.resolve(r);f<g;)c=c.then(d[f++],d[f++]);return c}g=a.length;let v=r;for(;f<g;){const d=a[f++],h=a[f++];try{v=d(v)}catch(y){h.call(this,y);break}}try{c=Vl.call(this,v)}catch(d){return Promise.reject(d)}for(f=0,g=u.length;f<g;)c=c.then(u[f++],u[f++]);return c}getUri(t){t=Dr(this.defaults,t);const r=$f(t.baseURL,t.url,t.allowAbsoluteUrls,t);return xf(r,t.params,t.paramsSerializer)}};A.forEach(["delete","get","head","options"],function(t){Tr.prototype[t]=function(r,n){return this.request(Dr(n||{},{method:t,url:r,data:n&&A.hasOwnProp(n,"data")?n.data:void 0}))}});A.forEach(["post","put","patch","query"],function(t){function r(n){return function(s,o,a){return this.request(Dr(a||{},{method:t,headers:n?{"Content-Type":"multipart/form-data"}:{},url:s,data:o}))}}Tr.prototype[t]=r(),t!=="query"&&(Tr.prototype[t+"Form"]=r(!0))});let wg=class Mf{constructor(t){if(typeof t!="function")throw new TypeError("executor must be a function.");let r;this.promise=new Promise(function(s){r=s});const n=this;this.promise.then(i=>{if(!n._listeners)return;let s=n._listeners.length;for(;s-- >0;)n._listeners[s](i);n._listeners=null}),this.promise.then=i=>{let s;const o=new Promise(a=>{n.subscribe(a),s=a}).then(i);return o.cancel=function(){n.unsubscribe(s)},o},t(function(s,o,a){n.reason||(n.reason=new zn(s,o,a),r(n.reason))})}throwIfRequested(){if(this.reason)throw this.reason}subscribe(t){if(this.reason){t(this.reason);return}this._listeners?this._listeners.push(t):this._listeners=[t]}unsubscribe(t){if(!this._listeners)return;const r=this._listeners.indexOf(t);r!==-1&&this._listeners.splice(r,1)}toAbortSignal(){const t=new AbortController,r=n=>{t.abort(n)};return this.subscribe(r),t.signal.unsubscribe=()=>this.unsubscribe(r),t.signal}static source(){let t;return{token:new Mf(function(i){t=i}),cancel:t}}};function Sg(e){return function(r){return e.apply(null,r)}}function Eg(e){return A.isObject(e)&&e.isAxiosError===!0}const Jo={Continue:100,SwitchingProtocols:101,Processing:102,EarlyHints:103,Ok:200,Created:201,Accepted:202,NonAuthoritativeInformation:203,NoContent:204,ResetContent:205,PartialContent:206,MultiStatus:207,AlreadyReported:208,ImUsed:226,MultipleChoices:300,MovedPermanently:301,Found:302,SeeOther:303,NotModified:304,UseProxy:305,Unused:306,TemporaryRedirect:307,PermanentRedirect:308,BadRequest:400,Unauthorized:401,PaymentRequired:402,Forbidden:403,NotFound:404,MethodNotAllowed:405,NotAcceptable:406,ProxyAuthenticationRequired:407,RequestTimeout:408,Conflict:409,Gone:410,LengthRequired:411,PreconditionFailed:412,PayloadTooLarge:413,UriTooLong:414,UnsupportedMediaType:415,RangeNotSatisfiable:416,ExpectationFailed:417,ImATeapot:418,MisdirectedRequest:421,UnprocessableEntity:422,Locked:423,FailedDependency:424,TooEarly:425,UpgradeRequired:426,PreconditionRequired:428,TooManyRequests:429,RequestHeaderFieldsTooLarge:431,UnavailableForLegalReasons:451,InternalServerError:500,NotImplemented:501,BadGateway:502,ServiceUnavailable:503,GatewayTimeout:504,HttpVersionNotSupported:505,VariantAlsoNegotiates:506,InsufficientStorage:507,LoopDetected:508,NotExtended:510,NetworkAuthenticationRequired:511,WebServerIsDown:521,ConnectionTimedOut:522,OriginIsUnreachable:523,TimeoutOccurred:524,SslHandshakeFailed:525,InvalidSslCertificate:526};Object.entries(Jo).forEach(([e,t])=>{Jo[t]=e});function jf(e){const t=new Tr(e),r=pf(Tr.prototype.request,t);return A.extend(r,Tr.prototype,t,{allOwnKeys:!0}),A.extend(r,t,null,{allOwnKeys:!0}),r.create=function(i){return jf(Dr(e,i))},r}const xe=jf(Gn);xe.Axios=Tr;xe.CanceledError=zn;xe.CancelToken=wg;xe.isCancel=Ff;xe.VERSION=La;xe.toFormData=Ji;xe.AxiosError=z;xe.Cancel=xe.CanceledError;xe.all=function(t){return Promise.all(t)};xe.spread=Sg;xe.isAxiosError=Eg;xe.mergeConfig=Dr;xe.AxiosHeaders=Qe;xe.formToJSON=e=>Cf(A.isHTMLForm(e)?new FormData(e):e);xe.getAdapter=Nf.getAdapter;xe.HttpStatusCode=Jo;xe.default=xe;const{Axios:mO,AxiosError:vO,CanceledError:bO,isCancel:qf,CancelToken:wO,VERSION:SO,all:EO,Cancel:PO,isAxiosError:Uf,spread:_O,toFormData:OO,AxiosHeaders:AO,HttpStatusCode:TO,formToJSON:xO,getAdapter:RO,mergeConfig:Pg,create:CO}=xe;window.axios=xe;window.axios.defaults.headers.common["X-Requested-With"]="XMLHttpRequest";/**
* @vue/shared v3.5.39
* (c) 2018-present Yuxi (Evan) You and Vue contributors
* @license MIT
**/function Ma(e){const t=Object.create(null);for(const r of e.split(","))t[r]=1;return r=>r in t}const we={},Gr=[],Vt=()=>{},Bf=()=>!1,Jn=e=>e.charCodeAt(0)===111&&e.charCodeAt(1)===110&&(e.charCodeAt(2)>122||e.charCodeAt(2)<97),Xi=e=>e.startsWith("onUpdate:"),je=Object.assign,ja=(e,t)=>{const r=e.indexOf(t);r>-1&&e.splice(r,1)},_g=Object.prototype.hasOwnProperty,ye=(e,t)=>_g.call(e,t),re=Array.isArray,zr=e=>Qn(e)==="[object Map]",Zi=e=>Qn(e)==="[object Set]",Kl=e=>Qn(e)==="[object Date]",se=e=>typeof e=="function",Fe=e=>typeof e=="string",Rt=e=>typeof e=="symbol",ge=e=>e!==null&&typeof e=="object",Hf=e=>(ge(e)||se(e))&&se(e.then)&&se(e.catch),kf=Object.prototype.toString,Qn=e=>kf.call(e),Og=e=>Qn(e).slice(8,-1),Vf=e=>Qn(e)==="[object Object]",qa=e=>Fe(e)&&e!=="NaN"&&e[0]!=="-"&&""+parseInt(e,10)===e,xr=Ma(",key,ref,ref_for,ref_key,onVnodeBeforeMount,onVnodeMounted,onVnodeBeforeUpdate,onVnodeUpdated,onVnodeBeforeUnmount,onVnodeUnmounted"),Yi=e=>{const t=Object.create(null);return(r=>t[r]||(t[r]=e(r)))},Ag=/-\w/g,Tt=Yi(e=>e.replace(Ag,t=>t.slice(1).toUpperCase())),Tg=/\B([A-Z])/g,mr=Yi(e=>e.replace(Tg,"-$1").toLowerCase()),Wf=Yi(e=>e.charAt(0).toUpp
```

#### public/build/assets/AppLayout-CAyVts_J.js
```javascript
import{o as r,d as a,a as e,x as P,n as m,h as g,t as w,k as $,i as _,y as D,z as N,A as F,r as c,B as M,e as h,m as z,C as T,b as p,w as l,T as E,p as C,c as b,l as j,j as O,f,F as x,g as L,D as B}from"./app-DsJ4COlh.js";import{_ as V}from"./_plugin-vue_export-helper-DlAUqK2U.js";const I={},R={viewBox:"0 0 48 48",fill:"none",xmlns:"http://www.w3.org/2000/svg"};function H(d,i){return r(),a("svg",R,[...i[0]||(i[0]=[e("path",{d:"M11.395 44.428C4.557 40.198 0 32.632 0 24 0 10.745 10.745 0 24 0a23.891 23.891 0 0113.997 4.502c-.2 17.907-11.097 33.245-26.602 39.926z",fill:"#6875F5"},null,-1),e("path",{d:"M14.134 45.885A23.914 23.914 0 0024 48c13.255 0 24-10.745 24-24 0-3.516-.756-6.856-2.115-9.866-4.659 15.143-16.608 27.092-31.75 31.751z",fill:"#6875F5"},null,-1)])])}const U=V(I,[["render",H]]),q={class:"max-w-screen-xl mx-auto py-2 px-3 sm:px-6 lg:px-8"},G={class:"flex items-center justify-between flex-wrap"},J={class:"w-0 flex-1 flex items-center min-w-0"},K={key:0,class:"size-5 text-white",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor"},Q={key:1,class:"size-5 text-white",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor"},W={class:"ms-3 font-medium text-sm text-white truncate"},X={class:"shrink-0 sm:ms-3"},Y={__name:"Banner",setup(d){const i=D(),o=_(!0),u=_("success"),s=_("");return P(async()=>{var t,n;u.value=((t=i.props.jetstream.flash)==null?void 0:t.bannerStyle)||"success",s.value=((n=i.props.jetstream.flash)==null?void 0:n.banner)||"",o.value=!0}),(t,n)=>(r(),a("div",null,[o.value&&s.value?(r(),a("div",{key:0,class:m({"bg-indigo-500":u.value=="success","bg-red-700":u.value=="danger"})},[e("div",q,[e("div",G,[e("div",J,[e("span",{class:m(["flex p-2 rounded-lg",{"bg-indigo-600":u.value=="success","bg-red-600":u.value=="danger"}])},[u.value=="success"?(r(),a("svg",K,[...n[1]||(n[1]=[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"},null,-1)])])):g("",!0),u.value=="danger"?(r(),a("svg",Q,[...n[2]||(n[2]=[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"},null,-1)])])):g("",!0)],2),e("p",W,w(s.value),1)]),e("div",X,[e("button",{type:"button",class:m(["-me-1 flex p-2 rounded-md focus:outline-none sm:-me-2 transition",{"hover:bg-indigo-600 focus:bg-indigo-600":u.value=="success","hover:bg-red-600 focus:bg-red-600":u.value=="danger"}]),"aria-label":"Dismiss",onClick:n[0]||(n[0]=$(v=>o.value=!1,["prevent"]))},[...n[3]||(n[3]=[e("svg",{class:"size-5 text-white",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M6 18L18 6M6 6l12 12"})],-1)])],2)])])])],2)):g("",!0)]))}},Z={class:"relative"},A={__name:"Dropdown",props:{align:{type:String,default:"right"},width:{type:String,default:"48"},contentClasses:{type:Array,default:()=>["py-1","bg-white"]}},setup(d){const i=d;let o=_(!1);const u=n=>{o.value&&n.key==="Escape"&&(o.value=!1)};N(()=>document.addEventListener("keydown",u)),F(()=>document.removeEventListener("keydown",u));const s=C(()=>({48:"w-48"})[i.width.toString()]),t=C(()=>i.align==="left"?"ltr:origin-top-left rtl:origin-top-right start-0":i.align==="right"?"ltr:origin-top-right rtl:origin-top-left end-0":"origin-top");return(n,v)=>(r(),a("div",Z,[e("div",{onClick:v[0]||(v[0]=S=>M(o)?o.value=!h(o):o=!h(o))},[c(n.$slots,"trigger")]),z(e("div",{class:"fixed inset-0 z-40",onClick:v[1]||(v[1]=S=>M(o)?o.value=!1:o=!1)},null,512),[[T,h(o)]]),p(E,{"enter-active-class":"transition ease-out duration-200","enter-from-class":"transform opacity-0 scale-95","enter-to-class":"transform opacity-100 scale-100","leave-active-class":"transition ease-in duration-75","leave-from-class":"transform opacity-100 scale-100","leave-to-class":"transform opacity-0 scale-95"},{default:l(()=>[z(e("div",{class:m(["absolute z-50 mt-2 rounded-md shadow-lg",[s.value,t.value]]),style:{display:"none"},onClick:v[2]||(v[2]=S=>M(o)?o.value=!1:o=!1)},[e("div",{class:m(["rounded-md ring-1 ring-black ring-opacity-5",d.contentClasses])},[c(n.$slots,"content")],2)],2),[[T,h(o)]])]),_:3})]))}},ee={key:0,type:"submit",class:"block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"},te=["href"],k={__name:"DropdownLink",props:{href:String,as:String},setup(d){return(i,o)=>(r(),a("div",null,[d.as=="button"?(r(),a("button",ee,[c(i.$slots,"default")])):d.as=="a"?(r(),a("a",{key:1,href:d.href,class:"block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"},[c(i.$slots,"default")],8,te)):(r(),b(h(j),{key:2,href:d.href,class:"block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"},{default:l(()=>[c(i.$slots,"default")]),_:3},8,["href"]))]))}},se={__name:"NavLink",props:{href:String,active:Boolean},setup(d){const i=d,o=C(()=>i.active?"inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out":"inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out");return(u,s)=>(r(),b(h(j),{href:d.href,class:m(o.value)},{default:l(()=>[c(u.$slots,"default")]),_:3},8,["href","class"]))}},re=["href"],y={__name:"ResponsiveNavLink",props:{active:Boolean,href:String,as:String},setup(d){const i=d,o=C(()=>i.active?"block w-full ps-3 pe-4 py-2 border-l-4 border-indigo-400 text-start text-base font-medium text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out":"block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out");return(u,s)=>(r(),a("div",null,[d.as=="button"?(r(),a("button",{key:0,class:m([o.value,"w-full text-start"])},[c(u.$slots,"default")],2)):d.as=="a"?(r(),a("a",{key:1,class:m([o.value,"w-full text-start"]),href:d.href},[c(u.$slots,"default")],10,re)):(r(),b(h(j),{key:2,href:d.href,class:m(o.value)},{default:l(()=>[c(u.$slots,"default")]),_:3},8,["href","class"]))]))}},oe={class:"min-h-screen bg-gray-100"},ne={class:"bg-white border-b border-gray-100"},ae={class:"max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"},ie={class:"flex justify-between h-16"},le={class:"flex"},ue={class:"shrink-0 flex items-center"},de={class:"hidden space-x-8 sm:-my-px sm:ms-10 sm:flex"},pe={class:"hidden sm:flex sm:items-center sm:ms-6"},ge={class:"ms-3 relative"},fe={class:"inline-flex rounded-md"},me={type:"button",class:"inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150"},ce={class:"w-60"},ve=["onSubmit"],he={class:"flex items-center"},be={key:0,class:"me-2 size-5 text-green-400",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor"},ye={class:"ms-3 relative"},we={key:0,class:"flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition"},ke=["src","alt"],xe={key:1,class:"inline-flex rounded-md"},$e={type:"button",class:"inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150"},_e={class:"-me-2 flex items-center sm:hidden"},Ce={class:"size-6",stroke:"currentColor",fill:"none",viewBox:"0 0 24 24"},je={class:"pt-2 pb-3 space-y-1"},Me={class:"pt-4 pb-1 border-t border-gray-200"},Se={class:"flex items-center px-4"},ze={key:0,class:"shrink-0 me-3"},Te=["src","alt"],Le={class:"font-medium text-base text-gray-800"},Be={class:"font-medium text-sm text-gray-500"},Ae={class:"mt-3 space-y-1"},Pe=["onSubmit"],De={class:"flex items-center"},Ne={key:0,class:"me-2 size-5 text-green-400",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor"},Fe={key:0,class:"bg-white shadow"},Ee={class:"max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8"},Ie={__name:"AppLayout",props:{title:String},setup(d){const i=_(!1),o=s=>{B.put(route("current-team.update"),{team_id:s.id},{preserveState:!1})},u=()=>{B.post(route("logout"))};return(s,t)=>(r(),a("div",null,[p(h(O),{title:d.title},null,8,["title"]),p(Y),e("div",oe,[e("nav",ne,[e("div",ae,[e("div",ie,[e("div",le,[e("div",ue,[p(h(j),{href:s.route("dashboard")},{default:l(()=>[p(U,{class:"block h-9 w-auto"})]),_:1},8,["href"])]),e("div",de,[p(se,{href:s.route("dashboard"),active:s.route().current("dashboard")},{default:l(()=>[...t[1]||(t[1]=[f(" Dashboard ",-1)])]),_:1},8,["href","active"])])]),e("div",pe,[e("div",ge,[s.$page.props.jetstream.hasTeamFeatures?(r(),b(A,{key:0,align:"right",width:"60"},{trigger:l(()=>[e("span",fe,[e("button",me,[f(w(s.$page.props.auth.user.current_team.name)+" ",1),t[2]||(t[2]=e("svg",{class:"ms-2 -me-0.5 size-4",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"})],-1))])])]),content:l(()=>[e("div",ce,[t[8]||(t[8]=e("div",{class:"block px-4 py-2 text-xs text-gray-400"}," Manage Team ",-1)),p(k,{href:s.route("teams.show",s.$page.props.auth.user.current_team)},{default:l(()=>[...t[3]||(t[3]=[f(" Team Settings ",-1)])]),_:1},8,["href"]),s.$page.props.jetstream.canCreateTeams?(r(),b(k,{key:0,href:s.route("teams.create")},{default:l(()=>[...t[4]||(t[4]=[f(" Create New Team ",-1)])]),_:1},8,["href"])):g("",!0),s.$page.props.auth.user.all_teams.length>1?(r(),a(x,{key:1},[t[6]||(t[6]=e("div",{class:"border-t border-gray-200"},null,-1)),t[7]||(t[7]=e("div",{class:"block px-4 py-2 text-xs text-gray-400"}," Switch Teams ",-1)),(r(!0),a(x,null,L(s.$page.props.auth.user.all_teams,n=>(r(),a("form",{key:n.id,onSubmit:$(v=>o(n),["prevent"])},[p(k,{as:"button"},{default:l(()=>[e("div",he,[n.id==s.$page.props.auth.user.current_team_id?(r(),a("svg",be,[...t[5]||(t[5]=[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"},null,-1)])])):g("",!0),e("div",null,w(n.name),1)])]),_:2},1024)],40,ve))),128))],64)):g("",!0)])]),_:1})):g("",!0)]),e("div",ye,[p(A,{align:"right",width:"48"},{trigger:l(()=>[s.$page.props.jetstream.managesProfilePhotos?(r(),a("button",we,[e("img",{class:"size-8 rounded-full object-cover",src:s.$page.props.auth.user.profile_photo_url,alt:s.$page.props.auth.user.name},null,8,ke)])):(r(),a("span",xe,[e("button",$e,[f(w(s.$page.props.auth.user.name)+" ",1),t[9]||(t[9]=e("svg",{class:"ms-2 -me-0.5 size-4",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M19.5 8.25l-7.5 7.5-7.5-7.5"})],-1))])]))]),content:l(()=>[t[13]||(t[13]=e("div",{class:"block px-4 py-2 text-xs text-gray-400"}," Manage Account ",-1)),p(k,{href:s.route("profile.show")},{default:l(()=>[...t[10]||(t[10]=[f(" Profile ",-1)])]),_:1},8,["href"]),s.$page.props.jetstream.hasApiFeatures?(r(),b(k,{key:0,href:s.route("api-tokens.index")},{default:l(()=>[...t[11]||(t[11]=[f(" API Tokens ",-1)])]),_:1},8,["href"])):g("",!0),t[14]||(t[14]=e("div",{class:"border-t border-gray-200"},null,-1)),e("form",{onSubmit:$(u,["prevent"])},[p(k,{as:"button"},{default:l(()=>[...t[12]||(t[12]=[f(" Log Out ",-1)])]),_:1})],32)]),_:1})])]),e("div",_e,[e("button",{class:"inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out",onClick:t[0]||(t[0]=n=>i.value=!i.value)},[(r(),a("svg",Ce,[e("path",{class:m({hidden:i.value,"inline-flex":!i.value}),"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M4 6h16M4 12h16M4 18h16"},null,2),e("path",{class:m({hidden:!i.value,"inline-flex":i.value}),"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M6 18L18 6M6 6l12 12"},null,2)]))])])])]),e("div",{class:m([{block:i.value,hidden:!i.value},"sm:hidden"])},[e("div",je,[p(y,{href:s.route("dashboard"),active:s.route().current("dashboard")},{default:l(()=>[...t[15]||(t[15]=[f(" Dashboard ",-1)])]),_:1},8,["href","active"])]),e("div",Me,[e("div",Se,[s.$page.props.jetstream.managesProfilePhotos?(r(),a("div",ze,[e("img",{class:"size-10 rounded-full object-cover",src:s.$page.props.auth.user.profile_photo_url,alt:s.$page.props.auth.user.name},null,8,Te)])):g("",!0),e("div",null,[e("div",Le,w(s.$page.props.auth.user.name),1),e("div",Be,w(s.$page.props.auth.user.email),1)])]),e("div",Ae,[p(y,{href:s.route("profile.show"),active:s.route().current("profile.show")},{default:l(()=>[...t[16]||(t[16]=[f(" Profile ",-1)])]),_:1},8,["href","active"]),s.$page.props.jetstream.hasApiFeatures?(r(),b(y,{key:0,href:s.route("api-tokens.index"),active:s.route().current("api-tokens.index")},{default:l(()=>[...t[17]||(t[17]=[f(" API Tokens ",-1)])]),_:1},8,["href","active"])):g("",!0),e("form",{method:"POST",onSubmit:$(u,["prevent"])},[p(y,{as:"button"},{default:l(()=>[...t[18]||(t[18]=[f(" Log Out ",-1)])]),_:1})],32),s.$page.props.jetstream.hasTeamFeatures?(r(),a(x,{key:1},[t[24]||(t[24]=e("div",{class:"border-t border-gray-200"},null,-1)),t[25]||(t[25]=e("div",{class:"block px-4 py-2 text-xs text-gray-400"}," Manage Team ",-1)),p(y,{href:s.route("teams.show",s.$page.props.auth.user.current_team),active:s.route().current("teams.show")},{default:l(()=>[...t[19]||(t[19]=[f(" Team Settings ",-1)])]),_:1},8,["href","active"]),s.$page.props.jetstream.canCreateTeams?(r(),b(y,{key:0,href:s.route("teams.create"),active:s.route().current("teams.create")},{default:l(()=>[...t[20]||(t[20]=[f(" Create New Team ",-1)])]),_:1},8,["href","active"])):g("",!0),s.$page.props.auth.user.all_teams.length>1?(r(),a(x,{key:1},[t[22]||(t[22]=e("div",{class:"border-t border-gray-200"},null,-1)),t[23]||(t[23]=e("div",{class:"block px-4 py-2 text-xs text-gray-400"}," Switch Teams ",-1)),(r(!0),a(x,null,L(s.$page.props.auth.user.all_teams,n=>(r(),a("form",{key:n.id,onSubmit:$(v=>o(n),["prevent"])},[p(y,{as:"button"},{default:l(()=>[e("div",De,[n.id==s.$page.props.auth.user.current_team_id?(r(),a("svg",Ne,[...t[21]||(t[21]=[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"},null,-1)])])):g("",!0),e("div",null,w(n.name),1)])]),_:2},1024)],40,Pe))),128))],64)):g("",!0)],64)):g("",!0)])])],2)]),s.$slots.header?(r(),a("header",Fe,[e("div",Ee,[c(s.$slots,"header")])])):g("",!0),e("main",null,[c(s.$slots,"default")])])]))}};export{Ie as _};

```

#### public/build/assets/AuthenticationCard-4unKHv8U.js
```javascript
import{_ as t}from"./_plugin-vue_export-helper-DlAUqK2U.js";import{d as r,a as s,r as o,o as n}from"./app-DsJ4COlh.js";const a={},c={class:"min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"},d={class:"w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"};function l(e,i){return n(),r("div",c,[s("div",null,[o(e.$slots,"logo")]),s("div",d,[o(e.$slots,"default")])])}const _=t(a,[["render",l]]);export{_ as A};

```

#### public/build/assets/AuthenticationCardLogo-Bf4LXq0U.js
```javascript
import{c as t,w as s,a,e as o,l,o as r}from"./app-DsJ4COlh.js";const f={__name:"AuthenticationCardLogo",setup(n){return(i,e)=>(r(),t(o(l),{href:"/"},{default:s(()=>[...e[0]||(e[0]=[a("svg",{class:"size-16",viewBox:"0 0 48 48",fill:"none",xmlns:"http://www.w3.org/2000/svg"},[a("path",{d:"M11.395 44.428C4.557 40.198 0 32.632 0 24 0 10.745 10.745 0 24 0a23.891 23.891 0 0113.997 4.502c-.2 17.907-11.097 33.245-26.602 39.926z",fill:"#6875F5"}),a("path",{d:"M14.134 45.885A23.914 23.914 0 0024 48c13.255 0 24-10.745 24-24 0-3.516-.756-6.856-2.115-9.866-4.659 15.143-16.608 27.092-31.75 31.751z",fill:"#6875F5"})],-1)])]),_:1}))}};export{f as _};

```

#### public/build/assets/Checkbox-wi5km-BR.js
```javascript
import{m as l,v as r,d as u,p as i,o as p}from"./app-DsJ4COlh.js";const m=["value"],k={__name:"Checkbox",props:{checked:{type:[Array,Boolean],default:!1},value:{type:String,default:null}},emits:["update:checked"],setup(e,{emit:c}){const s=c,n=e,t=i({get(){return n.checked},set(o){s("update:checked",o)}});return(o,a)=>l((p(),u("input",{"onUpdate:modelValue":a[0]||(a[0]=d=>t.value=d),type:"checkbox",value:e.value,class:"rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"},null,8,m)),[[r,t.value]])}};export{k as _};

```

#### public/build/assets/ConfirmPassword-29glrrbY.js
```javascript
import{u as m,d,b as a,e as o,j as u,w as t,a as r,k as f,n as p,f as c,F as _,i as w,o as b}from"./app-DsJ4COlh.js";import{A as g}from"./AuthenticationCard-4unKHv8U.js";import{_ as x}from"./AuthenticationCardLogo-Bf4LXq0U.js";import{_ as v,a as y}from"./TextInput-CfODIaKr.js";import{_ as V}from"./InputLabel-DC5S04v5.js";import{_ as k}from"./PrimaryButton-CJUs8_6-.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const C={class:"flex justify-end mt-4"},S={__name:"ConfirmPassword",setup($){const s=m({password:""}),i=w(null),n=()=>{s.post(route("password.confirm"),{onFinish:()=>{s.reset(),i.value.focus()}})};return(F,e)=>(b(),d(_,null,[a(o(u),{title:"Secure Area"}),a(g,null,{logo:t(()=>[a(x)]),default:t(()=>[e[2]||(e[2]=r("div",{class:"mb-4 text-sm text-gray-600"}," This is a secure area of the application. Please confirm your password before continuing. ",-1)),r("form",{onSubmit:f(n,["prevent"])},[r("div",null,[a(V,{for:"password",value:"Password"}),a(v,{id:"password",ref_key:"passwordInput",ref:i,modelValue:o(s).password,"onUpdate:modelValue":e[0]||(e[0]=l=>o(s).password=l),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"current-password",autofocus:""},null,8,["modelValue"]),a(y,{class:"mt-2",message:o(s).errors.password},null,8,["message"])]),r("div",C,[a(k,{class:p(["ms-4",{"opacity-25":o(s).processing}]),disabled:o(s).processing},{default:t(()=>[...e[1]||(e[1]=[c(" Confirm ",-1)])]),_:1},8,["class","disabled"])])],32)]),_:1})],64))}};export{S as default};

```

#### public/build/assets/DangerButton-C-A6Br7h.js
```javascript
import{d as r,r as n,o}from"./app-DsJ4COlh.js";const s=["type"],c={__name:"DangerButton",props:{type:{type:String,default:"button"}},setup(e){return(t,i)=>(o(),r("button",{type:e.type,class:"inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"},[n(t.$slots,"default")],8,s))}};export{c as _};

```

#### public/build/assets/Dashboard-HkkJ6dgb.js
```javascript
import{_ as n}from"./AppLayout-CAyVts_J.js";import{_ as c}from"./_plugin-vue_export-helper-DlAUqK2U.js";import{o as s,d as i,a as e,b as r,s as d,c as h,w as o}from"./app-DsJ4COlh.js";const v={},m={viewBox:"0 0 317 48",fill:"none",xmlns:"http://www.w3.org/2000/svg"};function p(l,a){return s(),i("svg",m,[...a[0]||(a[0]=[e("path",{d:"M74.09 30.04V13h-4.14v21H82.1v-3.96h-8.01zM95.379 19v1.77c-1.08-1.35-2.7-2.19-4.89-2.19-3.99 0-7.29 3.45-7.29 7.92s3.3 7.92 7.29 7.92c2.19 0 3.81-.84 4.89-2.19V34h3.87V19h-3.87zm-4.17 11.73c-2.37 0-4.14-1.71-4.14-4.23 0-2.52 1.77-4.23 4.14-4.23 2.4 0 4.17 1.71 4.17 4.23 0 2.52-1.77 4.23-4.17 4.23zM106.628 21.58V19h-3.87v15h3.87v-7.17c0-3.15 2.55-4.05 4.56-3.81V18.7c-1.89 0-3.78.84-4.56 2.88zM124.295 19v1.77c-1.08-1.35-2.7-2.19-4.89-2.19-3.99 0-7.29 3.45-7.29 7.92s3.3 7.92 7.29 7.92c2.19 0 3.81-.84 4.89-2.19V34h3.87V19h-3.87zm-4.17 11.73c-2.37 0-4.14-1.71-4.14-4.23 0-2.52 1.77-4.23 4.14-4.23 2.4 0 4.17 1.71 4.17 4.23 0 2.52-1.77 4.23-4.17 4.23zM141.544 19l-3.66 10.5-3.63-10.5h-4.26l5.7 15h4.41l5.7-15h-4.26zM150.354 28.09h11.31c.09-.51.15-1.02.15-1.59 0-4.41-3.15-7.92-7.59-7.92-4.71 0-7.92 3.45-7.92 7.92s3.18 7.92 8.22 7.92c2.88 0 5.13-1.17 6.54-3.21l-3.12-1.8c-.66.87-1.86 1.5-3.36 1.5-2.04 0-3.69-.84-4.23-2.82zm-.06-3c.45-1.92 1.86-3.03 3.93-3.03 1.62 0 3.24.87 3.72 3.03h-7.65zM164.516 34h3.87V12.1h-3.87V34zM185.248 34.36c3.69 0 6.9-2.01 6.9-6.3V13h-2.1v15.06c0 3.03-2.07 4.26-4.8 4.26-2.19 0-3.93-.78-4.62-2.61l-1.77 1.05c1.05 2.43 3.57 3.6 6.39 3.6zM203.124 18.64c-4.65 0-7.83 3.45-7.83 7.86 0 4.53 3.24 7.86 7.98 7.86 3.03 0 5.34-1.41 6.6-3.45l-1.74-1.02c-.81 1.44-2.46 2.55-4.83 2.55-3.18 0-5.55-1.89-5.97-4.95h13.17c.03-.3.06-.63.06-.93 0-4.11-2.85-7.92-7.44-7.92zm0 1.92c2.58 0 4.98 1.71 5.4 5.01h-11.19c.39-2.94 2.64-5.01 5.79-5.01zM221.224 20.92V19h-4.32v-4.2l-1.98.6V19h-3.15v1.92h3.15v9.09c0 3.6 2.25 4.59 6.3 3.99v-1.74c-2.91.12-4.32.33-4.32-2.25v-9.09h4.32zM225.176 22.93c0-1.62 1.59-2.37 3.15-2.37 1.44 0 2.97.57 3.6 2.1l1.65-.96c-.87-1.86-2.79-3.06-5.25-3.06-3 0-5.13 1.89-5.13 4.29 0 5.52 8.76 3.39 8.76 7.11 0 1.77-1.68 2.4-3.45 2.4-2.01 0-3.57-.99-4.11-2.52l-1.68.99c.75 1.92 2.79 3.45 5.79 3.45 3.21 0 5.43-1.77 5.43-4.32 0-5.52-8.76-3.39-8.76-7.11zM244.603 20.92V19h-4.32v-4.2l-1.98.6V19h-3.15v1.92h3.15v9.09c0 3.6 2.25 4.59 6.3 3.99v-1.74c-2.91.12-4.32.33-4.32-2.25v-9.09h4.32zM249.883 21.49V19h-1.98v15h1.98v-8.34c0-3.72 2.34-4.98 4.74-4.98v-1.92c-1.92 0-3.69.63-4.74 2.73zM263.358 18.64c-4.65 0-7.83 3.45-7.83 7.86 0 4.53 3.24 7.86 7.98 7.86 3.03 0 5.34-1.41 6.6-3.45l-1.74-1.02c-.81 1.44-2.46 2.55-4.83 2.55-3.18 0-5.55-1.89-5.97-4.95h13.17c.03-.3.06-.63.06-.93 0-4.11-2.85-7.92-7.44-7.92zm0 1.92c2.58 0 4.98 1.71 5.4 5.01h-11.19c.39-2.94 2.64-5.01 5.79-5.01zM286.848 19v2.94c-1.26-2.01-3.39-3.3-6.06-3.3-4.23 0-7.74 3.42-7.74 7.86s3.51 7.86 7.74 7.86c2.67 0 4.8-1.29 6.06-3.3V34h1.98V19h-1.98zm-5.91 13.44c-3.33 0-5.91-2.61-5.91-5.94 0-3.33 2.58-5.94 5.91-5.94s5.91 2.61 5.91 5.94c0 3.33-2.58 5.94-5.91 5.94zM309.01 18.64c-1.92 0-3.75.87-4.86 2.73-.84-1.74-2.46-2.73-4.56-2.73-1.8 0-3.42.72-4.59 2.55V19h-1.98v15H295v-8.31c0-3.72 2.16-5.13 4.32-5.13 2.13 0 3.51 1.41 3.51 4.08V34h1.98v-8.31c0-3.72 1.86-5.13 4.17-5.13 2.13 0 3.66 1.41 3.66 4.08V34h1.98v-9.36c0-3.75-2.31-6-5.61-6z",class:"fill-black"},null,-1),e("path",{d:"M11.395 44.428C4.557 40.198 0 32.632 0 24 0 10.745 10.745 0 24 0a23.891 23.891 0 0113.997 4.502c-.2 17.907-11.097 33.245-26.602 39.926z",fill:"#6875F5"},null,-1),e("path",{d:"M14.134 45.885A23.914 23.914 0 0024 48c13.255 0 24-10.745 24-24 0-3.516-.756-6.856-2.115-9.866-4.659 15.143-16.608 27.092-31.75 31.751z",fill:"#6875F5"},null,-1)])])}const g=c(v,[["render",p]]),u={class:"p-6 lg:p-8 bg-white border-b border-gray-200"},f={__name:"Welcome",setup(l){return(a,t)=>(s(),i("div",null,[e("div",u,[r(g,{class:"block h-12 w-auto"}),t[0]||(t[0]=e("h1",{class:"mt-8 text-2xl font-medium text-gray-900"}," Welcome to your Jetstream application! ",-1)),t[1]||(t[1]=e("p",{class:"mt-6 text-gray-500 leading-relaxed"}," Laravel Jetstream provides a beautiful, robust starting point for your next Laravel application. Laravel is designed to help you build your application using a development environment that is simple, powerful, and enjoyable. We believe you should love expressing your creativity through programming, so we have spent time carefully crafting the Laravel ecosystem to be a breath of fresh air. We hope you love it. ",-1))]),t[2]||(t[2]=d('<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8"><div><div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="size-6 stroke-gray-400"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"></path></svg><h2 class="ms-3 text-xl font-semibold text-gray-900"><a href="https://laravel.com/docs">Documentation</a></h2></div><p class="mt-4 text-gray-500 text-sm leading-relaxed"> Laravel has wonderful documentation covering every aspect of the framework. Whether you&#39;re new to the framework or have previous experience, we recommend reading all of the documentation from beginning to end. </p><p class="mt-4 text-sm"><a href="https://laravel.com/docs" class="inline-flex items-center font-semibold text-indigo-700"> Explore the documentation <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 size-5 fill-indigo-500"><path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd"></path></svg></a></p></div><div><div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="size-6 stroke-gray-400"><path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z"></path></svg><h2 class="ms-3 text-xl font-semibold text-gray-900"><a href="https://laracasts.com">Laracasts</a></h2></div><p class="mt-4 text-gray-500 text-sm leading-relaxed"> Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process. </p><p class="mt-4 text-sm"><a href="https://laracasts.com" class="inline-flex items-center font-semibold text-indigo-700"> Start watching Laracasts <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 size-5 fill-indigo-500"><path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd"></path></svg></a></p></div><div><div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="size-6 stroke-gray-400"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"></path></svg><h2 class="ms-3 text-xl font-semibold text-gray-900"><a href="https://tailwindcss.com/">Tailwind</a></h2></div><p class="mt-4 text-gray-500 text-sm leading-relaxed"> Laravel Jetstream is built with Tailwind, an amazing utility first CSS framework that doesn&#39;t get in your way. You&#39;ll be amazed how easily you can build and maintain fresh, modern designs with this wonderful framework at your fingertips. </p></div><div><div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="size-6 stroke-gray-400"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"></path></svg><h2 class="ms-3 text-xl font-semibold text-gray-900"> Authentication </h2></div><p class="mt-4 text-gray-500 text-sm leading-relaxed"> Authentication and registration views are included with Laravel Jetstream, as well as support for user email verification and resetting forgotten passwords. So, you&#39;re free to get started with what matters most: building your application. </p></div></div>',1))]))}},x={class:"py-12"},w={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},y={class:"bg-white overflow-hidden shadow-xl sm:rounded-lg"},k={__name:"Dashboard",setup(l){return(a,t)=>(s(),h(n,{title:"Dashboard"},{header:o(()=>[...t[0]||(t[0]=[e("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Dashboard ",-1)])]),default:o(()=>[e("div",x,[e("div",w,[e("div",y,[r(f)])])])]),_:1}))}};export{k as default};

```

#### public/build/assets/DeleteUserForm-Cd43s3Aj.js
```javascript
import{u as w,c as y,w as o,a as d,b as r,f as t,e as a,n as _,E as v,i as m,o as k}from"./app-DsJ4COlh.js";import{b as x,a as b}from"./DialogModal-C4rPUjBQ.js";import{_ as c}from"./DangerButton-C-A6Br7h.js";import{_ as g,a as C}from"./TextInput-CfODIaKr.js";import{_ as D}from"./SecondaryButton-CYz5U_mB.js";import"./SectionTitle-DnptEXNM.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const V={class:"mt-5"},$={class:"mt-4"},O={__name:"DeleteUserForm",setup(A){const l=m(!1),n=m(null),s=w({password:""}),p=()=>{l.value=!0,setTimeout(()=>n.value.focus(),250)},i=()=>{s.delete(route("current-user.destroy"),{preserveScroll:!0,onSuccess:()=>u(),onError:()=>n.value.focus(),onFinish:()=>s.reset()})},u=()=>{l.value=!1,s.reset()};return(U,e)=>(k(),y(b,null,{title:o(()=>[...e[1]||(e[1]=[t(" Delete Account ",-1)])]),description:o(()=>[...e[2]||(e[2]=[t(" Permanently delete your account. ",-1)])]),content:o(()=>[e[8]||(e[8]=d("div",{class:"max-w-xl text-sm text-gray-600"}," Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain. ",-1)),d("div",V,[r(c,{onClick:p},{default:o(()=>[...e[3]||(e[3]=[t(" Delete Account ",-1)])]),_:1})]),r(x,{show:l.value,onClose:u},{title:o(()=>[...e[4]||(e[4]=[t(" Delete Account ",-1)])]),content:o(()=>[e[5]||(e[5]=t(" Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account. ",-1)),d("div",$,[r(g,{ref_key:"passwordInput",ref:n,modelValue:a(s).password,"onUpdate:modelValue":e[0]||(e[0]=f=>a(s).password=f),type:"password",class:"mt-1 block w-3/4",placeholder:"Password",autocomplete:"current-password",onKeyup:v(i,["enter"])},null,8,["modelValue"]),r(C,{message:a(s).errors.password,class:"mt-2"},null,8,["message"])])]),footer:o(()=>[r(D,{onClick:u},{default:o(()=>[...e[6]||(e[6]=[t(" Cancel ",-1)])]),_:1}),r(c,{class:_(["ms-3",{"opacity-25":a(s).processing}]),disabled:a(s).processing,onClick:i},{default:o(()=>[...e[7]||(e[7]=[t(" Delete Account ",-1)])]),_:1},8,["class","disabled"])]),_:1},8,["show"])]),_:1}))}};export{O as default};

```

#### public/build/assets/DialogModal-C4rPUjBQ.js
```javascript
import{S as _}from"./SectionTitle-DnptEXNM.js";import{d as x,b as m,w as c,r as n,a as e,o as u,i as y,H as b,z as $,A as k,m as h,C as w,T as v,n as B,h as S,p as C,c as E}from"./app-DsJ4COlh.js";const W={class:"md:grid md:grid-cols-3 md:gap-6"},z={class:"mt-5 md:mt-0 md:col-span-2"},M={class:"px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg"},O={__name:"ActionSection",setup(t){return(a,s)=>(u(),x("div",W,[m(_,null,{title:c(()=>[n(a.$slots,"title")]),description:c(()=>[n(a.$slots,"description")]),_:3}),e("div",z,[e("div",M,[n(a.$slots,"content")])])]))}},T={class:"fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50","scroll-region":""},D={__name:"Modal",props:{show:{type:Boolean,default:!1},maxWidth:{type:String,default:"2xl"},closeable:{type:Boolean,default:!0}},emits:["close"],setup(t,{emit:a}){const s=t,d=a,o=y(),r=y(s.show);b(()=>s.show,()=>{var l;s.show?(document.body.style.overflow="hidden",r.value=!0,(l=o.value)==null||l.showModal()):(document.body.style.overflow=null,setTimeout(()=>{var i;(i=o.value)==null||i.close(),r.value=!1},200))});const f=()=>{s.closeable&&d("close")},p=l=>{l.key==="Escape"&&(l.preventDefault(),s.show&&f())};$(()=>document.addEventListener("keydown",p)),k(()=>{document.removeEventListener("keydown",p),document.body.style.overflow=null});const g=C(()=>({sm:"sm:max-w-sm",md:"sm:max-w-md",lg:"sm:max-w-lg",xl:"sm:max-w-xl","2xl":"sm:max-w-2xl"})[s.maxWidth]);return(l,i)=>(u(),x("dialog",{class:"z-50 m-0 min-h-full min-w-full overflow-y-auto bg-transparent backdrop:bg-transparent",ref_key:"dialog",ref:o},[e("div",T,[m(v,{"enter-active-class":"ease-out duration-300","enter-from-class":"opacity-0","enter-to-class":"opacity-100","leave-active-class":"ease-in duration-200","leave-from-class":"opacity-100","leave-to-class":"opacity-0"},{default:c(()=>[h(e("div",{class:"fixed inset-0 transform transition-all",onClick:f},[...i[0]||(i[0]=[e("div",{class:"absolute inset-0 bg-gray-500 opacity-75"},null,-1)])],512),[[w,t.show]])]),_:1}),m(v,{"enter-active-class":"ease-out duration-300","enter-from-class":"opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95","enter-to-class":"opacity-100 translate-y-0 sm:scale-100","leave-active-class":"ease-in duration-200","leave-from-class":"opacity-100 translate-y-0 sm:scale-100","leave-to-class":"opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"},{default:c(()=>[h(e("div",{class:B(["mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto",g.value])},[r.value?n(l.$slots,"default",{key:0}):S("",!0)],2),[[w,t.show]])]),_:3})])],512))}},N={class:"px-6 py-4"},V={class:"text-lg font-medium text-gray-900"},A={class:"mt-4 text-sm text-gray-600"},L={class:"flex flex-row justify-end px-6 py-4 bg-gray-100 text-end"},U={__name:"DialogModal",props:{show:{type:Boolean,default:!1},maxWidth:{type:String,default:"2xl"},closeable:{type:Boolean,default:!0}},emits:["close"],setup(t,{emit:a}){const s=a,d=()=>{s("close")};return(o,r)=>(u(),E(D,{show:t.show,"max-width":t.maxWidth,closeable:t.closeable,onClose:d},{default:c(()=>[e("div",N,[e("div",V,[n(o.$slots,"title")]),e("div",A,[n(o.$slots,"content")])]),e("div",L,[n(o.$slots,"footer")])]),_:3},8,["show","max-width","closeable"]))}};export{D as _,O as a,U as b};

```

#### public/build/assets/ForgotPassword-cA5791Fc.js
```javascript
import{u as d,d as m,b as s,e as t,j as f,w as l,a as o,o as i,t as c,h as p,k as _,n as w,f as g,F as y}from"./app-DsJ4COlh.js";import{A as b}from"./AuthenticationCard-4unKHv8U.js";import{_ as x}from"./AuthenticationCardLogo-Bf4LXq0U.js";import{_ as k,a as V}from"./TextInput-CfODIaKr.js";import{_ as v}from"./InputLabel-DC5S04v5.js";import{_ as F}from"./PrimaryButton-CJUs8_6-.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const N={key:0,class:"mb-4 font-medium text-sm text-green-600"},$={class:"flex items-center justify-end mt-4"},q={__name:"ForgotPassword",props:{status:String},setup(r){const e=d({email:""}),n=()=>{e.post(route("password.email"))};return(h,a)=>(i(),m(y,null,[s(t(f),{title:"Forgot Password"}),s(b,null,{logo:l(()=>[s(x)]),default:l(()=>[a[2]||(a[2]=o("div",{class:"mb-4 text-sm text-gray-600"}," Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one. ",-1)),r.status?(i(),m("div",N,c(r.status),1)):p("",!0),o("form",{onSubmit:_(n,["prevent"])},[o("div",null,[s(v,{for:"email",value:"Email"}),s(k,{id:"email",modelValue:t(e).email,"onUpdate:modelValue":a[0]||(a[0]=u=>t(e).email=u),type:"email",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),s(V,{class:"mt-2",message:t(e).errors.email},null,8,["message"])]),o("div",$,[s(F,{class:w({"opacity-25":t(e).processing}),disabled:t(e).processing},{default:l(()=>[...a[1]||(a[1]=[g(" Email Password Reset Link ",-1)])]),_:1},8,["class","disabled"])])],32)]),_:1})],64))}};export{q as default};

```

#### public/build/assets/FormSection-BC1oNm55.js
```javascript
import{d as i,b as a,w as m,r as e,a as t,k as n,n as l,h as c,p,J as u,o as r}from"./app-DsJ4COlh.js";import{S as _}from"./SectionTitle-DnptEXNM.js";const h={class:"md:grid md:grid-cols-3 md:gap-6"},g={class:"mt-5 md:mt-0 md:col-span-2"},v={class:"grid grid-cols-6 gap-6"},b={key:0,class:"flex items-center justify-end px-4 py-3 bg-gray-50 text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md"},y={__name:"FormSection",emits:["submitted"],setup(f){const o=p(()=>!!u().actions);return(s,d)=>(r(),i("div",h,[a(_,null,{title:m(()=>[e(s.$slots,"title")]),description:m(()=>[e(s.$slots,"description")]),_:3}),t("div",g,[t("form",{onSubmit:d[0]||(d[0]=n(w=>s.$emit("submitted"),["prevent"]))},[t("div",{class:l(["px-4 py-5 bg-white sm:p-6 shadow",o.value?"sm:rounded-tl-md sm:rounded-tr-md":"sm:rounded-md"])},[t("div",v,[e(s.$slots,"form")])],2),o.value?(r(),i("div",b,[e(s.$slots,"actions")])):c("",!0)],32)])]))}};export{y as _};

```

#### public/build/assets/Index-BQzIMDvX.js
```javascript
import o from"./ApiTokenManager-BoAe04Rs.js";import{_ as a}from"./AppLayout-CAyVts_J.js";import{c as r,w as i,a as t,b as m,o as l}from"./app-DsJ4COlh.js";import"./ActionMessage-Sx1QBVLc.js";import"./DialogModal-C4rPUjBQ.js";import"./SectionTitle-DnptEXNM.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";import"./Checkbox-wi5km-BR.js";import"./DangerButton-C-A6Br7h.js";import"./FormSection-BC1oNm55.js";import"./TextInput-CfODIaKr.js";import"./InputLabel-DC5S04v5.js";import"./PrimaryButton-CJUs8_6-.js";import"./SecondaryButton-CYz5U_mB.js";import"./SectionBorder-JGFhNou_.js";const n={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},B={__name:"Index",props:{tokens:Array,availablePermissions:Array,defaultPermissions:Array},setup(s){return(p,e)=>(l(),r(a,{title:"API Tokens"},{header:i(()=>[...e[0]||(e[0]=[t("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," API Tokens ",-1)])]),default:i(()=>[t("div",null,[t("div",n,[m(o,{tokens:s.tokens,"available-permissions":s.availablePermissions,"default-permissions":s.defaultPermissions},null,8,["tokens","available-permissions","default-permissions"])])])]),_:1}))}};export{B as default};

```

#### public/build/assets/InputLabel-DC5S04v5.js
```javascript
import{d as e,t as o,r as n,o as t}from"./app-DsJ4COlh.js";const l={class:"block font-medium text-sm text-gray-700"},r={key:0},c={key:1},u={__name:"InputLabel",props:{value:String},setup(s){return(a,_)=>(t(),e("label",l,[s.value?(t(),e("span",r,o(s.value),1)):(t(),e("span",c,[n(a.$slots,"default")]))]))}};export{u as _};

```

#### public/build/assets/Login-oQqoZMW1.js
```javascript
import{u as w,d,b as t,e as a,j as b,w as m,o as i,t as k,h as u,a as o,k as x,c as y,l as V,f,n as v,F as h}from"./app-DsJ4COlh.js";import{A as $}from"./AuthenticationCard-4unKHv8U.js";import{_ as B}from"./AuthenticationCardLogo-Bf4LXq0U.js";import{_ as F}from"./Checkbox-wi5km-BR.js";import{_ as c,a as p}from"./TextInput-CfODIaKr.js";import{_ as g}from"./InputLabel-DC5S04v5.js";import{_ as C}from"./PrimaryButton-CJUs8_6-.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const N={key:0,class:"mb-4 font-medium text-sm text-green-600"},q={class:"mt-4"},L={class:"block mt-4"},P={class:"flex items-center"},R={class:"flex items-center justify-end mt-4"},T={__name:"Login",props:{canResetPassword:Boolean,status:String},setup(l){const e=w({email:"",password:"",remember:!1}),_=()=>{e.transform(n=>({...n,remember:e.remember?"on":""})).post(route("login"),{onFinish:()=>e.reset("password")})};return(n,s)=>(i(),d(h,null,[t(a(b),{title:"Log in"}),t($,null,{logo:m(()=>[t(B)]),default:m(()=>[l.status?(i(),d("div",N,k(l.status),1)):u("",!0),o("form",{onSubmit:x(_,["prevent"])},[o("div",null,[t(g,{for:"email",value:"Email"}),t(c,{id:"email",modelValue:a(e).email,"onUpdate:modelValue":s[0]||(s[0]=r=>a(e).email=r),type:"email",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),t(p,{class:"mt-2",message:a(e).errors.email},null,8,["message"])]),o("div",q,[t(g,{for:"password",value:"Password"}),t(c,{id:"password",modelValue:a(e).password,"onUpdate:modelValue":s[1]||(s[1]=r=>a(e).password=r),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"current-password"},null,8,["modelValue"]),t(p,{class:"mt-2",message:a(e).errors.password},null,8,["message"])]),o("div",L,[o("label",P,[t(F,{checked:a(e).remember,"onUpdate:checked":s[2]||(s[2]=r=>a(e).remember=r),name:"remember"},null,8,["checked"]),s[3]||(s[3]=o("span",{class:"ms-2 text-sm text-gray-600"},"Remember me",-1))])]),o("div",R,[l.canResetPassword?(i(),y(a(V),{key:0,href:n.route("password.request"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},{default:m(()=>[...s[4]||(s[4]=[f(" Forgot your password? ",-1)])]),_:1},8,["href"])):u("",!0),t(C,{class:v(["ms-4",{"opacity-25":a(e).processing}]),disabled:a(e).processing},{default:m(()=>[...s[5]||(s[5]=[f(" Log in ",-1)])]),_:1},8,["class","disabled"])])],32)]),_:1})],64))}};export{T as default};

```

#### public/build/assets/LogoutOtherBrowserSessionsForm-CsF3Gqig.js
```javascript
import{u as k,c as x,w as o,a as t,o as a,d as l,F as h,g as b,t as d,f as n,h as V,b as i,e as u,n as B,E as S,i as g}from"./app-DsJ4COlh.js";import{_ as C}from"./ActionMessage-Sx1QBVLc.js";import{b as L,a as A}from"./DialogModal-C4rPUjBQ.js";import{_ as O,a as $}from"./TextInput-CfODIaKr.js";import{_ as y}from"./PrimaryButton-CJUs8_6-.js";import{_ as F}from"./SecondaryButton-CYz5U_mB.js";import"./SectionTitle-DnptEXNM.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const H={key:0,class:"mt-5 space-y-6"},I={key:0,class:"size-8 text-gray-500",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor"},M={key:1,class:"size-8 text-gray-500",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor"},N={class:"ms-3"},z={class:"text-sm text-gray-600"},E={class:"text-xs text-gray-500"},T={key:0,class:"text-green-500 font-semibold"},U={key:1},j={class:"flex items-center mt-5"},D={class:"mt-4"},Y={__name:"LogoutOtherBrowserSessionsForm",props:{sessions:Array},setup(p){const m=g(!1),c=g(null),r=k({password:""}),v=()=>{m.value=!0,setTimeout(()=>c.value.focus(),250)},w=()=>{r.delete(route("other-browser-sessions.destroy"),{preserveScroll:!0,onSuccess:()=>f(),onError:()=>c.value.focus(),onFinish:()=>r.reset()})},f=()=>{m.value=!1,r.reset()};return(K,s)=>(a(),x(A,null,{title:o(()=>[...s[1]||(s[1]=[n(" Browser Sessions ",-1)])]),description:o(()=>[...s[2]||(s[2]=[n(" Manage and log out your active sessions on other browsers and devices. ",-1)])]),content:o(()=>[s[11]||(s[11]=t("div",{class:"max-w-xl text-sm text-gray-600"}," If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password. ",-1)),p.sessions.length>0?(a(),l("div",H,[(a(!0),l(h,null,b(p.sessions,(e,_)=>(a(),l("div",{key:_,class:"flex items-center"},[t("div",null,[e.agent.is_desktop?(a(),l("svg",I,[...s[3]||(s[3]=[t("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25"},null,-1)])])):(a(),l("svg",M,[...s[4]||(s[4]=[t("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3"},null,-1)])]))]),t("div",N,[t("div",z,d(e.agent.platform?e.agent.platform:"Unknown")+" - "+d(e.agent.browser?e.agent.browser:"Unknown"),1),t("div",null,[t("div",E,[n(d(e.ip_address)+", ",1),e.is_current_device?(a(),l("span",T,"This device")):(a(),l("span",U,"Last active "+d(e.last_active),1))])])])]))),128))])):V("",!0),t("div",j,[i(y,{onClick:v},{default:o(()=>[...s[5]||(s[5]=[n(" Log Out Other Browser Sessions ",-1)])]),_:1}),i(C,{on:u(r).recentlySuccessful,class:"ms-3"},{default:o(()=>[...s[6]||(s[6]=[n(" Done. ",-1)])]),_:1},8,["on"])]),i(L,{show:m.value,onClose:f},{title:o(()=>[...s[7]||(s[7]=[n(" Log Out Other Browser Sessions ",-1)])]),content:o(()=>[s[8]||(s[8]=n(" Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices. ",-1)),t("div",D,[i(O,{ref_key:"passwordInput",ref:c,modelValue:u(r).password,"onUpdate:modelValue":s[0]||(s[0]=e=>u(r).password=e),type:"password",class:"mt-1 block w-3/4",placeholder:"Password",autocomplete:"current-password",onKeyup:S(w,["enter"])},null,8,["modelValue"]),i($,{message:u(r).errors.password,class:"mt-2"},null,8,["message"])])]),footer:o(()=>[i(F,{onClick:f},{default:o(()=>[...s[9]||(s[9]=[n(" Cancel ",-1)])]),_:1}),i(y,{class:B(["ms-3",{"opacity-25":u(r).processing}]),disabled:u(r).processing,onClick:w},{default:o(()=>[...s[10]||(s[10]=[n(" Log Out Other Browser Sessions ",-1)])]),_:1},8,["class","disabled"])]),_:1},8,["show"])]),_:1}))}};export{Y as default};

```

#### public/build/assets/PrimaryButton-CJUs8_6-.js
```javascript
import{d as r,r as o,o as n}from"./app-DsJ4COlh.js";const s=["type"],c={__name:"PrimaryButton",props:{type:{type:String,default:"submit"}},setup(e){return(t,a)=>(n(),r("button",{type:e.type,class:"inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"},[o(t.$slots,"default")],8,s))}};export{c as _};

```

#### public/build/assets/PrivacyPolicy-De-9ANHG.js
```javascript
import{d as a,b as s,e as o,j as n,a as e,F as i,o as l}from"./app-DsJ4COlh.js";import{_ as c}from"./AuthenticationCardLogo-Bf4LXq0U.js";const r={class:"font-sans text-gray-900 antialiased"},d={class:"pt-4 bg-gray-100"},_={class:"min-h-screen flex flex-col items-center pt-6 sm:pt-0"},m=["innerHTML"],v={__name:"PrivacyPolicy",props:{policy:String},setup(t){return(p,f)=>(l(),a(i,null,[s(o(n),{title:"Privacy Policy"}),e("div",r,[e("div",d,[e("div",_,[e("div",null,[s(c)]),e("div",{class:"w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose",innerHTML:t.policy},null,8,m)])])])],64))}};export{v as default};

```

#### public/build/assets/Register-CwD4erIF.js
```javascript
import{u as g,d as f,b as e,e as o,j as _,w as l,a as r,k as w,o as c,f as d,h as v,l as y,n as V,F as h}from"./app-DsJ4COlh.js";import{A as k}from"./AuthenticationCard-4unKHv8U.js";import{_ as x}from"./AuthenticationCardLogo-Bf4LXq0U.js";import{_ as b}from"./Checkbox-wi5km-BR.js";import{_ as u,a as m}from"./TextInput-CfODIaKr.js";import{_ as n}from"./InputLabel-DC5S04v5.js";import{_ as $}from"./PrimaryButton-CJUs8_6-.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const P={class:"mt-4"},q={class:"mt-4"},C={class:"mt-4"},F={key:0,class:"mt-4"},N={class:"flex items-center"},U={class:"ms-2"},A=["href"],j=["href"],B={class:"flex items-center justify-end mt-4"},H={__name:"Register",setup(R){const s=g({name:"",email:"",password:"",password_confirmation:"",terms:!1}),p=()=>{s.post(route("register"),{onFinish:()=>s.reset("password","password_confirmation")})};return(i,a)=>(c(),f(h,null,[e(o(_),{title:"Register"}),e(k,null,{logo:l(()=>[e(x)]),default:l(()=>[r("form",{onSubmit:w(p,["prevent"])},[r("div",null,[e(n,{for:"name",value:"Name"}),e(u,{id:"name",modelValue:o(s).name,"onUpdate:modelValue":a[0]||(a[0]=t=>o(s).name=t),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"name"},null,8,["modelValue"]),e(m,{class:"mt-2",message:o(s).errors.name},null,8,["message"])]),r("div",P,[e(n,{for:"email",value:"Email"}),e(u,{id:"email",modelValue:o(s).email,"onUpdate:modelValue":a[1]||(a[1]=t=>o(s).email=t),type:"email",class:"mt-1 block w-full",required:"",autocomplete:"username"},null,8,["modelValue"]),e(m,{class:"mt-2",message:o(s).errors.email},null,8,["message"])]),r("div",q,[e(n,{for:"password",value:"Password"}),e(u,{id:"password",modelValue:o(s).password,"onUpdate:modelValue":a[2]||(a[2]=t=>o(s).password=t),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"new-password"},null,8,["modelValue"]),e(m,{class:"mt-2",message:o(s).errors.password},null,8,["message"])]),r("div",C,[e(n,{for:"password_confirmation",value:"Confirm Password"}),e(u,{id:"password_confirmation",modelValue:o(s).password_confirmation,"onUpdate:modelValue":a[3]||(a[3]=t=>o(s).password_confirmation=t),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"new-password"},null,8,["modelValue"]),e(m,{class:"mt-2",message:o(s).errors.password_confirmation},null,8,["message"])]),i.$page.props.jetstream.hasTermsAndPrivacyPolicyFeature?(c(),f("div",F,[e(n,{for:"terms"},{default:l(()=>[r("div",N,[e(b,{id:"terms",checked:o(s).terms,"onUpdate:checked":a[4]||(a[4]=t=>o(s).terms=t),name:"terms",required:""},null,8,["checked"]),r("div",U,[a[5]||(a[5]=d(" I agree to the ",-1)),r("a",{target:"_blank",href:i.route("terms.show"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},"Terms of Service",8,A),a[6]||(a[6]=d(" and ",-1)),r("a",{target:"_blank",href:i.route("policy.show"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},"Privacy Policy",8,j)])]),e(m,{class:"mt-2",message:o(s).errors.terms},null,8,["message"])]),_:1})])):v("",!0),r("div",B,[e(o(y),{href:i.route("login"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},{default:l(()=>[...a[7]||(a[7]=[d(" Already registered? ",-1)])]),_:1},8,["href"]),e($,{class:V(["ms-4",{"opacity-25":o(s).processing}]),disabled:o(s).processing},{default:l(()=>[...a[8]||(a[8]=[d(" Register ",-1)])]),_:1},8,["class","disabled"])])],32)]),_:1})],64))}};export{H as default};

```

#### public/build/assets/ResetPassword-BLJpmhx6.js
```javascript
import{u as f,d as c,b as e,e as o,j as w,w as l,a as t,k as _,n as g,f as V,F as k,o as b}from"./app-DsJ4COlh.js";import{A as v}from"./AuthenticationCard-4unKHv8U.js";import{_ as x}from"./AuthenticationCardLogo-Bf4LXq0U.js";import{_ as m,a as i}from"./TextInput-CfODIaKr.js";import{_ as n}from"./InputLabel-DC5S04v5.js";import{_ as y}from"./PrimaryButton-CJUs8_6-.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const P={class:"mt-4"},$={class:"mt-4"},C={class:"flex items-center justify-end mt-4"},A={__name:"ResetPassword",props:{email:String,token:String},setup(u){const d=u,s=f({token:d.token,email:d.email,password:"",password_confirmation:""}),p=()=>{s.post(route("password.update"),{onFinish:()=>s.reset("password","password_confirmation")})};return(F,a)=>(b(),c(k,null,[e(o(w),{title:"Reset Password"}),e(v,null,{logo:l(()=>[e(x)]),default:l(()=>[t("form",{onSubmit:_(p,["prevent"])},[t("div",null,[e(n,{for:"email",value:"Email"}),e(m,{id:"email",modelValue:o(s).email,"onUpdate:modelValue":a[0]||(a[0]=r=>o(s).email=r),type:"email",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),e(i,{class:"mt-2",message:o(s).errors.email},null,8,["message"])]),t("div",P,[e(n,{for:"password",value:"Password"}),e(m,{id:"password",modelValue:o(s).password,"onUpdate:modelValue":a[1]||(a[1]=r=>o(s).password=r),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"new-password"},null,8,["modelValue"]),e(i,{class:"mt-2",message:o(s).errors.password},null,8,["message"])]),t("div",$,[e(n,{for:"password_confirmation",value:"Confirm Password"}),e(m,{id:"password_confirmation",modelValue:o(s).password_confirmation,"onUpdate:modelValue":a[2]||(a[2]=r=>o(s).password_confirmation=r),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"new-password"},null,8,["modelValue"]),e(i,{class:"mt-2",message:o(s).errors.password_confirmation},null,8,["message"])]),t("div",C,[e(y,{class:g({"opacity-25":o(s).processing}),disabled:o(s).processing},{default:l(()=>[...a[3]||(a[3]=[V(" Reset Password ",-1)])]),_:1},8,["class","disabled"])])],32)]),_:1})],64))}};export{A as default};

```

#### public/build/assets/SecondaryButton-CYz5U_mB.js
```javascript
import{d as o,r as n,o as r}from"./app-DsJ4COlh.js";const s=["type"],c={__name:"SecondaryButton",props:{type:{type:String,default:"button"}},setup(e){return(t,a)=>(r(),o("button",{type:e.type,class:"inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"},[n(t.$slots,"default")],8,s))}};export{c as _};

```

#### public/build/assets/SectionBorder-JGFhNou_.js
```javascript
import{_ as r}from"./_plugin-vue_export-helper-DlAUqK2U.js";import{d as s,a as o,o as t}from"./app-DsJ4COlh.js";const c={},a={class:"hidden sm:block"};function d(n,e){return t(),s("div",a,[...e[0]||(e[0]=[o("div",{class:"py-8"},[o("div",{class:"border-t border-gray-200"})],-1)])])}const l=r(c,[["render",d]]);export{l as S};

```

#### public/build/assets/SectionTitle-DnptEXNM.js
```javascript
import{_ as o}from"./_plugin-vue_export-helper-DlAUqK2U.js";import{o as c,d as a,a as s,r as e}from"./app-DsJ4COlh.js";const n={},i={class:"md:col-span-1 flex justify-between"},r={class:"px-4 sm:px-0"},d={class:"text-lg font-medium text-gray-900"},l={class:"mt-1 text-sm text-gray-600"},_={class:"px-4 sm:px-0"};function m(t,p){return c(),a("div",i,[s("div",r,[s("h3",d,[e(t.$slots,"title")]),s("p",l,[e(t.$slots,"description")])]),s("div",_,[e(t.$slots,"aside")])])}const h=o(n,[["render",m]]);export{h as S};

```

#### public/build/assets/Show-BiQ8Kecq.js
```javascript
import{_ as c}from"./AppLayout-CAyVts_J.js";import l from"./DeleteUserForm-Cd43s3Aj.js";import f from"./LogoutOtherBrowserSessionsForm-CsF3Gqig.js";import{S as s}from"./SectionBorder-JGFhNou_.js";import u from"./TwoFactorAuthenticationForm-682eSr_g.js";import d from"./UpdatePasswordForm-D2QLGNYa.js";import _ from"./UpdateProfileInformationForm-9ZGZsXeb.js";import{c as h,w as p,a as i,o as e,d as r,b as t,h as a,F as g}from"./app-DsJ4COlh.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";import"./DialogModal-C4rPUjBQ.js";import"./SectionTitle-DnptEXNM.js";import"./DangerButton-C-A6Br7h.js";import"./TextInput-CfODIaKr.js";import"./SecondaryButton-CYz5U_mB.js";import"./ActionMessage-Sx1QBVLc.js";import"./PrimaryButton-CJUs8_6-.js";import"./InputLabel-DC5S04v5.js";import"./FormSection-BC1oNm55.js";const $={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},w={key:0},k={key:1},y={key:2},M={__name:"Show",props:{confirmsTwoFactorAuthentication:Boolean,sessions:Array},setup(m){return(o,n)=>(e(),h(c,{title:"Profile"},{header:p(()=>[...n[0]||(n[0]=[i("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Profile ",-1)])]),default:p(()=>[i("div",null,[i("div",$,[o.$page.props.jetstream.canUpdateProfileInformation?(e(),r("div",w,[t(_,{user:o.$page.props.auth.user},null,8,["user"]),t(s)])):a("",!0),o.$page.props.jetstream.canUpdatePassword?(e(),r("div",k,[t(d,{class:"mt-10 sm:mt-0"}),t(s)])):a("",!0),o.$page.props.jetstream.canManageTwoFactorAuthentication?(e(),r("div",y,[t(u,{"requires-confirmation":m.confirmsTwoFactorAuthentication,class:"mt-10 sm:mt-0"},null,8,["requires-confirmation"]),t(s)])):a("",!0),t(f,{sessions:m.sessions,class:"mt-10 sm:mt-0"},null,8,["sessions"]),o.$page.props.jetstream.hasAccountDeletionFeatures?(e(),r(g,{key:3},[t(s),t(l,{class:"mt-10 sm:mt-0"})],64)):a("",!0)])])]),_:1}))}};export{M as default};

```

#### public/build/assets/TermsOfService-ClxGAi5H.js
```javascript
import{d as a,b as s,e as r,j as n,a as e,F as o,o as i}from"./app-DsJ4COlh.js";import{_ as l}from"./AuthenticationCardLogo-Bf4LXq0U.js";const c={class:"font-sans text-gray-900 antialiased"},d={class:"pt-4 bg-gray-100"},m={class:"min-h-screen flex flex-col items-center pt-6 sm:pt-0"},_=["innerHTML"],v={__name:"TermsOfService",props:{terms:String},setup(t){return(f,p)=>(i(),a(o,null,[s(r(n),{title:"Terms of Service"}),e("div",c,[e("div",d,[e("div",m,[e("div",null,[s(l)]),e("div",{class:"w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose",innerHTML:t.terms},null,8,_)])])])],64))}};export{v as default};

```

#### public/build/assets/TextInput-CfODIaKr.js
```javascript
import{m as i,C as l,d as o,a as c,t as d,o as u,z as m,i as p}from"./app-DsJ4COlh.js";const f={class:"text-sm text-red-600"},v={__name:"InputError",props:{message:String},setup(t){return(s,e)=>i((u(),o("div",null,[c("p",f,d(t.message),1)],512)),[[l,t.message]])}},_=["value"],h={__name:"TextInput",props:{modelValue:String},emits:["update:modelValue"],setup(t,{expose:s}){const e=p(null);return m(()=>{e.value.hasAttribute("autofocus")&&e.value.focus()}),s({focus:()=>e.value.focus()}),(n,a)=>(u(),o("input",{ref_key:"input",ref:e,class:"border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm",value:t.modelValue,onInput:a[0]||(a[0]=r=>n.$emit("update:modelValue",r.target.value))},null,40,_))}};export{h as _,v as a};

```

#### public/build/assets/TwoFactorAuthenticationForm-682eSr_g.js
```javascript
import{d as a,a as i,r as N,b as n,w as s,f as l,n as x,t as S,E as B,q as D,G as Q,i as v,o,u as Y,H as G,c as g,h as m,e as b,F as I,g as U,p as z,D as R,y as O}from"./app-DsJ4COlh.js";import{b as W,a as j}from"./DialogModal-C4rPUjBQ.js";import{_ as q,a as E}from"./TextInput-CfODIaKr.js";import{_ as P}from"./PrimaryButton-CJUs8_6-.js";import{_ as T}from"./SecondaryButton-CYz5U_mB.js";import{_ as J}from"./DangerButton-C-A6Br7h.js";import{_ as X}from"./InputLabel-DC5S04v5.js";import"./SectionTitle-DnptEXNM.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const Z={class:"mt-4"},_={__name:"ConfirmsPassword",props:{title:{type:String,default:"Confirm Password"},content:{type:String,default:"For your security, please confirm your password to continue."},button:{type:String,default:"Confirm"}},emits:["confirmed"],setup(h,{emit:F}){const k=F,u=v(!1),e=Q({password:"",error:"",processing:!1}),d=v(null),w=()=>{axios.get(route("password.confirmation")).then(r=>{r.data.confirmed?k("confirmed"):(u.value=!0,setTimeout(()=>d.value.focus(),250))})},y=()=>{e.processing=!0,axios.post(route("password.confirm"),{password:e.password}).then(()=>{e.processing=!1,f(),D().then(()=>k("confirmed"))}).catch(r=>{e.processing=!1,e.error=r.response.data.errors.password[0],d.value.focus()})},f=()=>{u.value=!1,e.password="",e.error=""};return(r,c)=>(o(),a("span",null,[i("span",{onClick:w},[N(r.$slots,"default")]),n(W,{show:u.value,onClose:f},{title:s(()=>[l(S(h.title),1)]),content:s(()=>[l(S(h.content)+" ",1),i("div",Z,[n(q,{ref_key:"passwordInput",ref:d,modelValue:e.password,"onUpdate:modelValue":c[0]||(c[0]=$=>e.password=$),type:"password",class:"mt-1 block w-3/4",placeholder:"Password",autocomplete:"current-password",onKeyup:B(y,["enter"])},null,8,["modelValue"]),n(E,{message:e.error,class:"mt-2"},null,8,["message"])])]),footer:s(()=>[n(T,{onClick:f},{default:s(()=>[...c[1]||(c[1]=[l(" Cancel ",-1)])]),_:1}),n(P,{class:x(["ms-3",{"opacity-25":e.processing}]),disabled:e.processing,onClick:y},{default:s(()=>[l(S(h.button),1)]),_:1},8,["class","disabled"])]),_:1},8,["show"])]))}},ee={key:0,class:"text-lg font-medium text-gray-900"},te={key:1,class:"text-lg font-medium text-gray-900"},oe={key:2,class:"text-lg font-medium text-gray-900"},se={key:3},ae={key:0},ne={class:"mt-4 max-w-xl text-sm text-gray-600"},re={key:0,class:"font-semibold"},le={key:1},ie=["innerHTML"],ue={key:0,class:"mt-4 max-w-xl text-sm text-gray-600"},ce={class:"font-semibold"},de=["innerHTML"],me={key:1,class:"mt-4"},fe={key:1},pe={class:"grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg"},ve={class:"mt-5"},ye={key:0},we={key:1},Fe={__name:"TwoFactorAuthenticationForm",props:{requiresConfirmation:Boolean},setup(h){const F=h,k=O(),u=v(!1),e=v(!1),d=v(!1),w=v(null),y=v(null),f=v([]),r=Y({code:""}),c=z(()=>{var p;return!u.value&&((p=k.props.auth.user)==null?void 0:p.two_factor_enabled)});G(c,()=>{c.value||(r.reset(),r.clearErrors())});const $=()=>{u.value=!0,R.post(route("two-factor.enable"),{},{preserveScroll:!0,onSuccess:()=>Promise.all([H(),L(),V()]),onFinish:()=>{u.value=!1,e.value=F.requiresConfirmation}})},H=()=>axios.get(route("two-factor.qr-code")).then(p=>{w.value=p.data.svg}),L=()=>axios.get(route("two-factor.secret-key")).then(p=>{y.value=p.data.secretKey}),V=()=>axios.get(route("two-factor.recovery-codes")).then(p=>{f.value=p.data}),A=()=>{r.post(route("two-factor.confirm"),{errorBag:"confirmTwoFactorAuthentication",preserveScroll:!0,preserveState:!0,onSuccess:()=>{e.value=!1,w.value=null,y.value=null}})},M=()=>{axios.post(route("two-factor.recovery-codes")).then(()=>V())},K=()=>{d.value=!0,R.delete(route("two-factor.disable"),{preserveScroll:!0,onSuccess:()=>{d.value=!1,e.value=!1}})};return(p,t)=>(o(),g(j,null,{title:s(()=>[...t[1]||(t[1]=[l(" Two Factor Authentication ",-1)])]),description:s(()=>[...t[2]||(t[2]=[l(" Add additional security to your account using two factor authentication. ",-1)])]),content:s(()=>[c.value&&!e.value?(o(),a("h3",ee," You have enabled two factor authentication. ")):c.value&&e.value?(o(),a("h3",te," Finish enabling two factor authentication. ")):(o(),a("h3",oe," You have not enabled two factor authentication. ")),t[11]||(t[11]=i("div",{class:"mt-3 max-w-xl text-sm text-gray-600"},[i("p",null," When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone's Google Authenticator application. ")],-1)),c.value?(o(),a("div",se,[w.value?(o(),a("div",ae,[i("div",ne,[e.value?(o(),a("p",re," To finish enabling two factor authentication, scan the following QR code using your phone's authenticator application or enter the setup key and provide the generated OTP code. ")):(o(),a("p",le," Two factor authentication is now enabled. Scan the following QR code using your phone's authenticator application or enter the setup key. "))]),i("div",{class:"mt-4 p-2 inline-block bg-white",innerHTML:w.value},null,8,ie),y.value?(o(),a("div",ue,[i("p",ce,[t[3]||(t[3]=l(" Setup Key: ",-1)),i("span",{innerHTML:y.value},null,8,de)])])):m("",!0),e.value?(o(),a("div",me,[n(X,{for:"code",value:"Code"}),n(q,{id:"code",modelValue:b(r).code,"onUpdate:modelValue":t[0]||(t[0]=C=>b(r).code=C),type:"text",name:"code",class:"block mt-1 w-1/2",inputmode:"numeric",autofocus:"",autocomplete:"one-time-code",onKeyup:B(A,["enter"])},null,8,["modelValue"]),n(E,{message:b(r).errors.code,class:"mt-2"},null,8,["message"])])):m("",!0)])):m("",!0),f.value.length>0&&!e.value?(o(),a("div",fe,[t[4]||(t[4]=i("div",{class:"mt-4 max-w-xl text-sm text-gray-600"},[i("p",{class:"font-semibold"}," Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost. ")],-1)),i("div",pe,[(o(!0),a(I,null,U(f.value,C=>(o(),a("div",{key:C},S(C),1))),128))])])):m("",!0)])):m("",!0),i("div",ve,[c.value?(o(),a("div",we,[n(_,{onConfirmed:A},{default:s(()=>[e.value?(o(),g(P,{key:0,type:"button",class:x(["me-3",{"opacity-25":u.value||b(r).processing}]),disabled:u.value||b(r).processing},{default:s(()=>[...t[6]||(t[6]=[l(" Confirm ",-1)])]),_:1},8,["class","disabled"])):m("",!0)]),_:1}),n(_,{onConfirmed:M},{default:s(()=>[f.value.length>0&&!e.value?(o(),g(T,{key:0,class:"me-3"},{default:s(()=>[...t[7]||(t[7]=[l(" Regenerate Recovery Codes ",-1)])]),_:1})):m("",!0)]),_:1}),n(_,{onConfirmed:V},{default:s(()=>[f.value.length===0&&!e.value?(o(),g(T,{key:0,class:"me-3"},{default:s(()=>[...t[8]||(t[8]=[l(" Show Recovery Codes ",-1)])]),_:1})):m("",!0)]),_:1}),n(_,{onConfirmed:K},{default:s(()=>[e.value?(o(),g(T,{key:0,class:x({"opacity-25":d.value}),disabled:d.value},{default:s(()=>[...t[9]||(t[9]=[l(" Cancel ",-1)])]),_:1},8,["class","disabled"])):m("",!0)]),_:1}),n(_,{onConfirmed:K},{default:s(()=>[e.value?m("",!0):(o(),g(J,{key:0,class:x({"opacity-25":d.value}),disabled:d.value},{default:s(()=>[...t[10]||(t[10]=[l(" Disable ",-1)])]),_:1},8,["class","disabled"]))]),_:1})])):(o(),a("div",ye,[n(_,{onConfirmed:$},{default:s(()=>[n(P,{type:"button",class:x({"opacity-25":u.value}),disabled:u.value},{default:s(()=>[...t[5]||(t[5]=[l(" Enable ",-1)])]),_:1},8,["class","disabled"])]),_:1})]))])]),_:1}))}};export{Fe as default};

```

#### public/build/assets/TwoFactorChallenge-Ro_5n22q.js
```javascript
import{u as x,d as s,b as o,e as t,j as C,w as d,a as i,o as a,F as n,f as l,k as _,n as h,i as m,q as w}from"./app-DsJ4COlh.js";import{A as V}from"./AuthenticationCard-4unKHv8U.js";import{_ as $}from"./AuthenticationCardLogo-Bf4LXq0U.js";import{_ as p,a as v}from"./TextInput-CfODIaKr.js";import{_ as g}from"./InputLabel-DC5S04v5.js";import{_ as F}from"./PrimaryButton-CJUs8_6-.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const I={class:"mb-4 text-sm text-gray-600"},T={key:0},U={key:1},B={class:"flex items-center justify-end mt-4"},M={__name:"TwoFactorChallenge",setup(N){const c=m(!1),e=x({code:"",recovery_code:""}),f=m(null),y=m(null),k=async()=>{c.value^=!0,await w(),c.value?(f.value.focus(),e.code=""):(y.value.focus(),e.recovery_code="")},b=()=>{e.post(route("two-factor.login"))};return(j,r)=>(a(),s(n,null,[o(t(C),{title:"Two-factor Confirmation"}),o(V,null,{logo:d(()=>[o($)]),default:d(()=>[i("div",I,[c.value?(a(),s(n,{key:1},[l(" Please confirm access to your account by entering one of your emergency recovery codes. ")],64)):(a(),s(n,{key:0},[l(" Please confirm access to your account by entering the authentication code provided by your authenticator application. ")],64))]),i("form",{onSubmit:_(b,["prevent"])},[c.value?(a(),s("div",U,[o(g,{for:"recovery_code",value:"Recovery Code"}),o(p,{id:"recovery_code",ref_key:"recoveryCodeInput",ref:f,modelValue:t(e).recovery_code,"onUpdate:modelValue":r[1]||(r[1]=u=>t(e).recovery_code=u),type:"text",class:"mt-1 block w-full",autocomplete:"one-time-code"},null,8,["modelValue"]),o(v,{class:"mt-2",message:t(e).errors.recovery_code},null,8,["message"])])):(a(),s("div",T,[o(g,{for:"code",value:"Code"}),o(p,{id:"code",ref_key:"codeInput",ref:y,modelValue:t(e).code,"onUpdate:modelValue":r[0]||(r[0]=u=>t(e).code=u),type:"text",inputmode:"numeric",class:"mt-1 block w-full",autofocus:"",autocomplete:"one-time-code"},null,8,["modelValue"]),o(v,{class:"mt-2",message:t(e).errors.code},null,8,["message"])])),i("div",B,[i("button",{type:"button",class:"text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer",onClick:_(k,["prevent"])},[c.value?(a(),s(n,{key:1},[l(" Use an authentication code ")],64)):(a(),s(n,{key:0},[l(" Use a recovery code ")],64))]),o(F,{class:h(["ms-4",{"opacity-25":t(e).processing}]),disabled:t(e).processing},{default:d(()=>[...r[2]||(r[2]=[l(" Log in ",-1)])]),_:1},8,["class","disabled"])])],32)]),_:1})],64))}};export{M as default};

```

#### public/build/assets/UpdatePasswordForm-D2QLGNYa.js
```javascript
import{u as f,c as _,w as e,b as a,e as r,f as n,n as V,a as l,i as c,o as g}from"./app-DsJ4COlh.js";import{_ as v}from"./ActionMessage-Sx1QBVLc.js";import{_ as y}from"./FormSection-BC1oNm55.js";import{_ as d,a as p}from"./TextInput-CfODIaKr.js";import{_ as u}from"./InputLabel-DC5S04v5.js";import{_ as P}from"./PrimaryButton-CJUs8_6-.js";import"./SectionTitle-DnptEXNM.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const b={class:"col-span-6 sm:col-span-4"},k={class:"col-span-6 sm:col-span-4"},S={class:"col-span-6 sm:col-span-4"},T={__name:"UpdatePasswordForm",setup($){const m=c(null),i=c(null),s=f({current_password:"",password:"",password_confirmation:""}),w=()=>{s.put(route("user-password.update"),{errorBag:"updatePassword",preserveScroll:!0,onSuccess:()=>s.reset(),onError:()=>{s.errors.password&&(s.reset("password","password_confirmation"),m.value.focus()),s.errors.current_password&&(s.reset("current_password"),i.value.focus())}})};return(U,o)=>(g(),_(y,{onSubmitted:w},{title:e(()=>[...o[3]||(o[3]=[n(" Update Password ",-1)])]),description:e(()=>[...o[4]||(o[4]=[n(" Ensure your account is using a long, random password to stay secure. ",-1)])]),form:e(()=>[l("div",b,[a(u,{for:"current_password",value:"Current Password"}),a(d,{id:"current_password",ref_key:"currentPasswordInput",ref:i,modelValue:r(s).current_password,"onUpdate:modelValue":o[0]||(o[0]=t=>r(s).current_password=t),type:"password",class:"mt-1 block w-full",autocomplete:"current-password"},null,8,["modelValue"]),a(p,{message:r(s).errors.current_password,class:"mt-2"},null,8,["message"])]),l("div",k,[a(u,{for:"password",value:"New Password"}),a(d,{id:"password",ref_key:"passwordInput",ref:m,modelValue:r(s).password,"onUpdate:modelValue":o[1]||(o[1]=t=>r(s).password=t),type:"password",class:"mt-1 block w-full",autocomplete:"new-password"},null,8,["modelValue"]),a(p,{message:r(s).errors.password,class:"mt-2"},null,8,["message"])]),l("div",S,[a(u,{for:"password_confirmation",value:"Confirm Password"}),a(d,{id:"password_confirmation",modelValue:r(s).password_confirmation,"onUpdate:modelValue":o[2]||(o[2]=t=>r(s).password_confirmation=t),type:"password",class:"mt-1 block w-full",autocomplete:"new-password"},null,8,["modelValue"]),a(p,{message:r(s).errors.password_confirmation,class:"mt-2"},null,8,["message"])])]),actions:e(()=>[a(v,{on:r(s).recentlySuccessful,class:"me-3"},{default:e(()=>[...o[5]||(o[5]=[n(" Saved. ",-1)])]),_:1},8,["on"]),a(P,{class:V({"opacity-25":r(s).processing}),disabled:r(s).processing},{default:e(()=>[...o[6]||(o[6]=[n(" Save ",-1)])]),_:1},8,["class","disabled"])]),_:1}))}};export{T as default};

```

#### public/build/assets/UpdateProfileInformationForm-9ZGZsXeb.js
```javascript
import{u as B,c as w,w as l,b as t,e as s,f as n,n as j,o as c,d as S,a as r,m as f,C as p,I as z,k as v,h as _,l as E,i as g,D as F}from"./app-DsJ4COlh.js";import{_ as A}from"./ActionMessage-Sx1QBVLc.js";import{_ as D}from"./FormSection-BC1oNm55.js";import{a as h,_ as V}from"./TextInput-CfODIaKr.js";import{_ as k}from"./InputLabel-DC5S04v5.js";import{_ as R}from"./PrimaryButton-CJUs8_6-.js";import{_ as C}from"./SecondaryButton-CYz5U_mB.js";import"./SectionTitle-DnptEXNM.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const q={key:0,class:"col-span-6 sm:col-span-4"},L={class:"mt-2"},T=["src","alt"],M={class:"mt-2"},O={class:"col-span-6 sm:col-span-4"},Y={class:"col-span-6 sm:col-span-4"},G={key:0},H={class:"text-sm mt-2"},J={class:"mt-2 font-medium text-sm text-green-600"},ae={__name:"UpdateProfileInformationForm",props:{user:Object},setup(u){const y=u,o=B({_method:"PUT",name:y.user.name,email:y.user.email,photo:null}),b=g(null),m=g(null),i=g(null),$=()=>{i.value&&(o.photo=i.value.files[0]),o.post(route("user-profile-information.update"),{errorBag:"updateProfileInformation",preserveScroll:!0,onSuccess:()=>P()})},x=()=>{b.value=!0},I=()=>{i.value.click()},N=()=>{const a=i.value.files[0];if(!a)return;const e=new FileReader;e.onload=d=>{m.value=d.target.result},e.readAsDataURL(a)},U=()=>{F.delete(route("current-user-photo.destroy"),{preserveScroll:!0,onSuccess:()=>{m.value=null,P()}})},P=()=>{var a;(a=i.value)!=null&&a.value&&(i.value.value=null)};return(a,e)=>(c(),w(D,{onSubmitted:$},{title:l(()=>[...e[2]||(e[2]=[n(" Profile Information ",-1)])]),description:l(()=>[...e[3]||(e[3]=[n(" Update your account's profile information and email address. ",-1)])]),form:l(()=>[a.$page.props.jetstream.managesProfilePhotos?(c(),S("div",q,[r("input",{id:"photo",ref_key:"photoInput",ref:i,type:"file",class:"hidden",onChange:N},null,544),t(k,{for:"photo",value:"Photo"}),f(r("div",L,[r("img",{src:u.user.profile_photo_url,alt:u.user.name,class:"rounded-full size-20 object-cover"},null,8,T)],512),[[p,!m.value]]),f(r("div",M,[r("span",{class:"block rounded-full size-20 bg-cover bg-no-repeat bg-center",style:z("background-image: url('"+m.value+"');")},null,4)],512),[[p,m.value]]),t(C,{class:"mt-2 me-2",type:"button",onClick:v(I,["prevent"])},{default:l(()=>[...e[4]||(e[4]=[n(" Select A New Photo ",-1)])]),_:1}),u.user.profile_photo_path?(c(),w(C,{key:0,type:"button",class:"mt-2",onClick:v(U,["prevent"])},{default:l(()=>[...e[5]||(e[5]=[n(" Remove Photo ",-1)])]),_:1})):_("",!0),t(h,{message:s(o).errors.photo,class:"mt-2"},null,8,["message"])])):_("",!0),r("div",O,[t(k,{for:"name",value:"Name"}),t(V,{id:"name",modelValue:s(o).name,"onUpdate:modelValue":e[0]||(e[0]=d=>s(o).name=d),type:"text",class:"mt-1 block w-full",required:"",autocomplete:"name"},null,8,["modelValue"]),t(h,{message:s(o).errors.name,class:"mt-2"},null,8,["message"])]),r("div",Y,[t(k,{for:"email",value:"Email"}),t(V,{id:"email",modelValue:s(o).email,"onUpdate:modelValue":e[1]||(e[1]=d=>s(o).email=d),type:"email",class:"mt-1 block w-full",required:"",autocomplete:"username"},null,8,["modelValue"]),t(h,{message:s(o).errors.email,class:"mt-2"},null,8,["message"]),a.$page.props.jetstream.hasEmailVerification&&u.user.email_verified_at===null?(c(),S("div",G,[r("p",H,[e[7]||(e[7]=n(" Your email address is unverified. ",-1)),t(s(E),{href:a.route("verification.send"),method:"post",as:"button",class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500",onClick:v(x,["prevent"])},{default:l(()=>[...e[6]||(e[6]=[n(" Click here to re-send the verification email. ",-1)])]),_:1},8,["href"])]),f(r("div",J," A new verification link has been sent to your email address. ",512),[[p,b.value]])])):_("",!0)])]),actions:l(()=>[t(A,{on:s(o).recentlySuccessful,class:"me-3"},{default:l(()=>[...e[8]||(e[8]=[n(" Saved. ",-1)])]),_:1},8,["on"]),t(R,{class:j({"opacity-25":s(o).processing}),disabled:s(o).processing},{default:l(()=>[...e[9]||(e[9]=[n(" Save ",-1)])]),_:1},8,["class","disabled"])]),_:1}))}};export{ae as default};

```

#### public/build/assets/VerifyEmail-B8G3hGIK.js
```javascript
import{u as p,d as l,b as t,e as o,j as y,w as s,a as i,o as u,h as v,k as h,n as x,f as r,l as d,F as _,p as b}from"./app-DsJ4COlh.js";import{A as k}from"./AuthenticationCard-4unKHv8U.js";import{_ as w}from"./AuthenticationCardLogo-Bf4LXq0U.js";import{_ as V}from"./PrimaryButton-CJUs8_6-.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const E={key:0,class:"mb-4 font-medium text-sm text-green-600"},B={class:"mt-4 flex items-center justify-between"},S={__name:"VerifyEmail",props:{status:String},setup(f){const m=f,n=p({}),c=()=>{n.post(route("verification.send"))},g=b(()=>m.status==="verification-link-sent");return(a,e)=>(u(),l(_,null,[t(o(y),{title:"Email Verification"}),t(k,null,{logo:s(()=>[t(w)]),default:s(()=>[e[3]||(e[3]=i("div",{class:"mb-4 text-sm text-gray-600"}," Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another. ",-1)),g.value?(u(),l("div",E," A new verification link has been sent to the email address you provided in your profile settings. ")):v("",!0),i("form",{onSubmit:h(c,["prevent"])},[i("div",B,[t(V,{class:x({"opacity-25":o(n).processing}),disabled:o(n).processing},{default:s(()=>[...e[0]||(e[0]=[r(" Resend Verification Email ",-1)])]),_:1},8,["class","disabled"]),i("div",null,[t(o(d),{href:a.route("profile.show"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},{default:s(()=>[...e[1]||(e[1]=[r(" Edit Profile",-1)])]),_:1},8,["href"]),t(o(d),{href:a.route("logout"),method:"post",as:"button",class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ms-2"},{default:s(()=>[...e[2]||(e[2]=[r(" Log Out ",-1)])]),_:1},8,["href"])])])],32)]),_:1})],64))}};export{S as default};

```

#### public/build/assets/Welcome-Djmx4OVq.js
```javascript
import{d as l,b as v,e as i,j as w,a as t,c as g,w as o,f as n,l as c,F as u,h as p,s as f,t as x,o as a}from"./app-DsJ4COlh.js";const k={class:"bg-gray-50 text-black/50 dark:bg-black dark:text-white/50"},b={class:"relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white"},F={class:"relative w-full max-w-2xl px-6 lg:max-w-7xl"},L={class:"grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3"},C={key:0,class:"-mx-3 flex flex-1 justify-end"},y={class:"mt-6"},M={class:"grid gap-6 lg:grid-cols-2 lg:gap-8"},D={href:"https://laravel.com/docs",id:"docs-card",class:"flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"},Z={id:"screenshot-container",class:"relative flex w-full flex-1 items-stretch"},V={class:"py-16 text-center text-sm text-black dark:text-white/70"},_={__name:"Welcome",props:{canLogin:{type:Boolean},canRegister:{type:Boolean},laravelVersion:{type:String,required:!0},phpVersion:{type:String,required:!0}},setup(r){function m(){var s,e,d,h;(s=document.getElementById("screenshot-container"))==null||s.classList.add("!hidden"),(e=document.getElementById("docs-card"))==null||e.classList.add("!row-span-1"),(d=document.getElementById("docs-card-content"))==null||d.classList.add("!flex-row"),(h=document.getElementById("background"))==null||h.classList.add("!hidden")}return(s,e)=>(a(),l(u,null,[v(i(w),{title:"Welcome"}),t("div",k,[e[8]||(e[8]=t("img",{id:"background",class:"absolute -left-20 top-0 max-w-[877px]",src:"https://laravel.com/assets/img/welcome/background.svg"},null,-1)),t("div",b,[t("div",F,[t("header",L,[e[3]||(e[3]=t("div",{class:"flex lg:justify-center lg:col-start-2"},[t("svg",{class:"h-12 w-auto text-white lg:h-16 lg:text-[#FF2D20]",viewBox:"0 0 62 65",fill:"none",xmlns:"http://www.w3.org/2000/svg"},[t("path",{d:"M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257786 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257786 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9193 7.84602C25.9423 7.93096 25.954 8.01853 25.9542 8.10652V33.7317L35.9355 27.9844V14.8846C35.9355 14.7973 35.948 14.7088 35.9704 14.6253C35.9792 14.5954 35.9954 14.5692 36.0053 14.5405C36.0253 14.4882 36.0427 14.4346 36.0702 14.386C36.0888 14.3536 36.1163 14.3274 36.1375 14.2975C36.1674 14.2576 36.1923 14.2165 36.2272 14.1816C36.2559 14.1529 36.292 14.1317 36.3244 14.1068C36.3618 14.0769 36.3942 14.0445 36.4341 14.0208L48.4147 7.12434C48.5663 7.03694 48.7383 6.99094 48.9133 6.99094C49.0883 6.99094 49.2602 7.03694 49.4118 7.12434L61.3899 14.0208C61.4323 14.0457 61.4647 14.0769 61.5021 14.1055C61.5333 14.1305 61.5694 14.1529 61.5981 14.1803C61.633 14.2165 61.6579 14.2576 61.6878 14.2975C61.7103 14.3274 61.7377 14.3536 61.7551 14.386C61.7838 14.4346 61.8 14.4882 61.8199 14.5405C61.8312 14.5692 61.8474 14.5954 61.8548 14.6253ZM59.893 27.9844V16.6121L55.7013 19.0252L49.9104 22.3593V33.7317L59.8942 27.9844H59.893ZM47.9149 48.5566V37.1768L42.2187 40.4299L25.953 49.7133V61.2003L47.9149 48.5566ZM1.99677 9.83281V48.5566L23.9562 61.199V49.7145L12.4841 43.2219L12.4804 43.2194L12.4754 43.2169C12.4368 43.1945 12.4044 43.1621 12.3682 43.1347C12.3371 43.1097 12.3009 43.0898 12.2735 43.0624L12.271 43.0586C12.2386 43.0275 12.2162 42.9888 12.1887 42.9539C12.1638 42.9203 12.1339 42.8916 12.114 42.8567L12.1127 42.853C12.0903 42.8156 12.0766 42.7707 12.0604 42.7283C12.0442 42.6909 12.023 42.656 12.013 42.6161C12.0005 42.5688 11.998 42.5177 11.9931 42.4691C11.9881 42.4317 11.9781 42.3943 11.9781 42.3569V15.5801L6.18848 12.2446L1.99677 9.83281ZM12.9777 2.36177L2.99764 8.10652L12.9752 13.8513L22.9541 8.10527L12.9752 2.36177H12.9777ZM18.1678 38.2138L23.9574 34.8809V9.83281L19.7657 12.2459L13.9749 15.5801V40.6281L18.1678 38.2138ZM48.9133 9.14105L38.9344 14.8858L48.9133 20.6305L58.8909 14.8846L48.9133 9.14105ZM47.9149 22.3593L42.124 19.0252L37.9323 16.6121V27.9844L43.7219 31.3174L47.9149 33.7317V22.3593ZM24.9533 47.987L39.59 39.631L46.9065 35.4555L36.9352 29.7145L25.4544 36.3242L14.9907 42.3482L24.9533 47.987Z",fill:"currentColor"})])],-1)),r.canLogin?(a(),l("nav",C,[s.$page.props.auth.user?(a(),g(i(c),{key:0,href:s.route("dashboard"),class:"rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"},{default:o(()=>[...e[0]||(e[0]=[n(" Dashboard ",-1)])]),_:1},8,["href"])):(a(),l(u,{key:1},[v(i(c),{href:s.route("login"),class:"rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"},{default:o(()=>[...e[1]||(e[1]=[n(" Log in ",-1)])]),_:1},8,["href"]),r.canRegister?(a(),g(i(c),{key:0,href:s.route("register"),class:"rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"},{default:o(()=>[...e[2]||(e[2]=[n(" Register ",-1)])]),_:1},8,["href"])):p("",!0)],64))])):p("",!0)]),t("main",y,[t("div",M,[t("a",D,[t("div",Z,[t("img",{src:"https://laravel.com/assets/img/welcome/docs-light.svg",alt:"Laravel documentation screenshot",class:"aspect-video h-full w-full flex-1 rounded-[10px] object-top object-cover drop-shadow-[0px_4px_34px_rgba(0,0,0,0.06)] dark:hidden",onError:m},null,32),e[4]||(e[4]=t("img",{src:"https://laravel.com/assets/img/welcome/docs-dark.svg",alt:"Laravel documentation screenshot",class:"hidden aspect-video h-full w-full flex-1 rounded-[10px] object-top object-cover drop-shadow-[0px_4px_34px_rgba(0,0,0,0.25)] dark:block"},null,-1)),e[5]||(e[5]=t("div",{class:"absolute -bottom-16 -left-16 h-40 w-[calc(100%+8rem)] bg-gradient-to-b from-transparent via-white to-white dark:via-zinc-900 dark:to-zinc-900"},null,-1))]),e[6]||(e[6]=f('<div class="relative flex items-center gap-6 lg:items-end"><div id="docs-card-content" class="flex items-start gap-6 lg:flex-col"><div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16"><svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><path fill="#FF2D20" d="M23 4a1 1 0 0 0-1.447-.894L12.224 7.77a.5.5 0 0 1-.448 0L2.447 3.106A1 1 0 0 0 1 4v13.382a1.99 1.99 0 0 0 1.105 1.79l9.448 4.728c.14.065.293.1.447.1.154-.005.306-.04.447-.105l9.453-4.724a1.99 1.99 0 0 0 1.1-1.789V4ZM3 6.023a.25.25 0 0 1 .362-.223l7.5 3.75a.251.251 0 0 1 .138.223v11.2a.25.25 0 0 1-.362.224l-7.5-3.75a.25.25 0 0 1-.138-.22V6.023Zm18 11.2a.25.25 0 0 1-.138.224l-7.5 3.75a.249.249 0 0 1-.329-.099.249.249 0 0 1-.033-.12V9.772a.251.251 0 0 1 .138-.224l7.5-3.75a.25.25 0 0 1 .362.224v11.2Z"></path><path fill="#FF2D20" d="m3.55 1.893 8 4.048a1.008 1.008 0 0 0 .9 0l8-4.048a1 1 0 0 0-.9-1.785l-7.322 3.706a.506.506 0 0 1-.452 0L4.454.108a1 1 0 0 0-.9 1.785H3.55Z"></path></svg></div><div class="pt-3 sm:pt-5 lg:pt-0"><h2 class="text-xl font-semibold text-black dark:text-white">Documentation</h2><p class="mt-4 text-sm/relaxed"> Laravel has wonderful documentation covering every aspect of the framework. Whether you are a newcomer or have prior experience with Laravel, we recommend reading our documentation from beginning to end. </p></div></div><svg class="size-6 shrink-0 stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path></svg></div>',1))]),e[7]||(e[7]=f('<a href="https://laracasts.com" class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"><div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16"><svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><g fill="#FF2D20"><path d="M24 8.25a.5.5 0 0 0-.5-.5H.5a.5.5 0 0 0-.5.5v12a2.5 2.5 0 0 0 2.5 2.5h19a2.5 2.5 0 0 0 2.5-2.5v-12Zm-7.765 5.868a1.221 1.221 0 0 1 0 2.264l-6.626 2.776A1.153 1.153 0 0 1 8 18.123v-5.746a1.151 1.151 0 0 1 1.609-1.035l6.626 2.776ZM19.564 1.677a.25.25 0 0 0-.177-.427H15.6a.106.106 0 0 0-.072.03l-4.54 4.543a.25.25 0 0 0 .177.427h3.783c.027 0 .054-.01.073-.03l4.543-4.543ZM22.071 1.318a.047.047 0 0 0-.045.013l-4.492 4.492a.249.249 0 0 0 .038.385.25.25 0 0 0 .14.042h5.784a.5.5 0 0 0 .5-.5v-2a2.5 2.5 0 0 0-1.925-2.432ZM13.014 1.677a.25.25 0 0 0-.178-.427H9.101a.106.106 0 0 0-.073.03l-4.54 4.543a.25.25 0 0 0 .177.427H8.4a.106.106 0 0 0 .073-.03l4.54-4.543ZM6.513 1.677a.25.25 0 0 0-.177-.427H2.5A2.5 2.5 0 0 0 0 3.75v2a.5.5 0 0 0 .5.5h1.4a.106.106 0 0 0 .073-.03l4.54-4.543Z"></path></g></svg></div><div class="pt-3 sm:pt-5"><h2 class="text-xl font-semibold text-black dark:text-white">Laracasts</h2><p class="mt-4 text-sm/relaxed"> Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process. </p></div><svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path></svg></a><a href="https://laravel-news.com" class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"><div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16"><svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><g fill="#FF2D20"><path d="M8.75 4.5H5.5c-.69 0-1.25.56-1.25 1.25v4.75c0 .69.56 1.25 1.25 1.25h3.25c.69 0 1.25-.56 1.25-1.25V5.75c0-.69-.56-1.25-1.25-1.25Z"></path><path d="M24 10a3 3 0 0 0-3-3h-2V2.5a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2V20a3.5 3.5 0 0 0 3.5 3.5h17A3.5 3.5 0 0 0 24 20V10ZM3.5 21.5A1.5 1.5 0 0 1 2 20V3a.5.5 0 0 1 .5-.5h14a.5.5 0 0 1 .5.5v17c0 .295.037.588.11.874a.5.5 0 0 1-.484.625L3.5 21.5ZM22 20a1.5 1.5 0 1 1-3 0V9.5a.5.5 0 0 1 .5-.5H21a1 1 0 0 1 1 1v10Z"></path><path d="M12.751 6.047h2a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-2A.75.75 0 0 1 12 7.3v-.5a.75.75 0 0 1 .751-.753ZM12.751 10.047h2a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-2A.75.75 0 0 1 12 11.3v-.5a.75.75 0 0 1 .751-.753ZM4.751 14.047h10a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-10A.75.75 0 0 1 4 15.3v-.5a.75.75 0 0 1 .751-.753ZM4.75 18.047h7.5a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-7.5A.75.75 0 0 1 4 19.3v-.5a.75.75 0 0 1 .75-.753Z"></path></g></svg></div><div class="pt-3 sm:pt-5"><h2 class="text-xl font-semibold text-black dark:text-white">Laravel News</h2><p class="mt-4 text-sm/relaxed"> Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials. </p></div><svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path></svg></a><div class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800"><div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16"><svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><g fill="#FF2D20"><path d="M16.597 12.635a.247.247 0 0 0-.08-.237 2.234 2.234 0 0 1-.769-1.68c.001-.195.03-.39.084-.578a.25.25 0 0 0-.09-.267 8.8 8.8 0 0 0-4.826-1.66.25.25 0 0 0-.268.181 2.5 2.5 0 0 1-2.4 1.824.045.045 0 0 0-.045.037 12.255 12.255 0 0 0-.093 3.86.251.251 0 0 0 .208.214c2.22.366 4.367 1.08 6.362 2.118a.252.252 0 0 0 .32-.079 10.09 10.09 0 0 0 1.597-3.733ZM13.616 17.968a.25.25 0 0 0-.063-.407A19.697 19.697 0 0 0 8.91 15.98a.25.25 0 0 0-.287.325c.151.455.334.898.548 1.328.437.827.981 1.594 1.619 2.28a.249.249 0 0 0 .32.044 29.13 29.13 0 0 0 2.506-1.99ZM6.303 14.105a.25.25 0 0 0 .265-.274 13.048 13.048 0 0 1 .205-4.045.062.062 0 0 0-.022-.07 2.5 2.5 0 0 1-.777-.982.25.25 0 0 0-.271-.149 11 11 0 0 0-5.6 2.815.255.255 0 0 0-.075.163c-.008.135-.02.27-.02.406.002.8.084 1.598.246 2.381a.25.25 0 0 0 .303.193 19.924 19.924 0 0 1 5.746-.438ZM9.228 20.914a.25.25 0 0 0 .1-.393 11.53 11.53 0 0 1-1.5-2.22 12.238 12.238 0 0 1-.91-2.465.248.248 0 0 0-.22-.187 18.876 18.876 0 0 0-5.69.33.249.249 0 0 0-.179.336c.838 2.142 2.272 4 4.132 5.353a.254.254 0 0 0 .15.048c1.41-.01 2.807-.282 4.117-.802ZM18.93 12.957l-.005-.008a.25.25 0 0 0-.268-.082 2.21 2.21 0 0 1-.41.081.25.25 0 0 0-.217.2c-.582 2.66-2.127 5.35-5.75 7.843a.248.248 0 0 0-.09.299.25.25 0 0 0 .065.091 28.703 28.703 0 0 0 2.662 2.12.246.246 0 0 0 .209.037c2.579-.701 4.85-2.242 6.456-4.378a.25.25 0 0 0 .048-.189 13.51 13.51 0 0 0-2.7-6.014ZM5.702 7.058a.254.254 0 0 0 .2-.165A2.488 2.488 0 0 1 7.98 5.245a.093.093 0 0 0 .078-.062 19.734 19.734 0 0 1 3.055-4.74.25.25 0 0 0-.21-.41 12.009 12.009 0 0 0-10.4 8.558.25.25 0 0 0 .373.281 12.912 12.912 0 0 1 4.826-1.814ZM10.773 22.052a.25.25 0 0 0-.28-.046c-.758.356-1.55.635-2.365.833a.25.25 0 0 0-.022.48c1.252.43 2.568.65 3.893.65.1 0 .2 0 .3-.008a.25.25 0 0 0 .147-.444c-.526-.424-1.1-.917-1.673-1.465ZM18.744 8.436a.249.249 0 0 0 .15.228 2.246 2.246 0 0 1 1.352 2.054c0 .337-.08.67-.23.972a.25.25 0 0 0 .042.28l.007.009a15.016 15.016 0 0 1 2.52 4.6.25.25 0 0 0 .37.132.25.25 0 0 0 .096-.114c.623-1.464.944-3.039.945-4.63a12.005 12.005 0 0 0-5.78-10.258.25.25 0 0 0-.373.274c.547 2.109.85 4.274.901 6.453ZM9.61 5.38a.25.25 0 0 0 .08.31c.34.24.616.561.8.935a.25.25 0 0 0 .3.127.631.631 0 0 1 .206-.034c2.054.078 4.036.772 5.69 1.991a.251.251 0 0 0 .267.024c.046-.024.093-.047.141-.067a.25.25 0 0 0 .151-.23A29.98 29.98 0 0 0 15.957.764a.25.25 0 0 0-.16-.164 11.924 11.924 0 0 0-2.21-.518.252.252 0 0 0-.215.076A22.456 22.456 0 0 0 9.61 5.38Z"></path></g></svg></div><div class="pt-3 sm:pt-5"><h2 class="text-xl font-semibold text-black dark:text-white">Vibrant Ecosystem</h2><p class="mt-4 text-sm/relaxed"> Laravel&#39;s robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white dark:focus-visible:ring-[#FF2D20]">Forge</a>, <a href="https://vapor.laravel.com" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Vapor</a>, <a href="https://nova.laravel.com" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Nova</a>, and <a href="https://envoyer.io" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Envoyer</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel.com/docs/billing" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Cashier</a>, <a href="https://laravel.com/docs/dusk" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Dusk</a>, <a href="https://laravel.com/docs/broadcasting" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Echo</a>, <a href="https://laravel.com/docs/horizon" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Horizon</a>, <a href="https://laravel.com/docs/sanctum" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Sanctum</a>, <a href="https://laravel.com/docs/telescope" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Telescope</a>, and more. </p></div></div>',3))])]),t("footer",V," Laravel v"+x(r.laravelVersion)+" (PHP v"+x(r.phpVersion)+") ",1)])])])],64))}};export{_ as default};

```

#### public/build/assets/_plugin-vue_export-helper-DlAUqK2U.js
```javascript
const s=(t,r)=>{const o=t.__vccOpts||t;for(const[c,e]of r)o[c]=e;return o};export{s as _};

```

#### public/build/manifest.json
```javascripton
{
  "_ActionMessage-Sx1QBVLc.js": {
    "file": "assets/ActionMessage-Sx1QBVLc.js",
    "name": "ActionMessage",
    "imports": [
      "resources/js/app.js"
    ]
  },
  "_AppLayout-CAyVts_J.js": {
    "file": "assets/AppLayout-CAyVts_J.js",
    "name": "AppLayout",
    "imports": [
      "resources/js/app.js",
      "__plugin-vue_export-helper-DlAUqK2U.js"
    ]
  },
  "_AuthenticationCard-4unKHv8U.js": {
    "file": "assets/AuthenticationCard-4unKHv8U.js",
    "name": "AuthenticationCard",
    "imports": [
      "__plugin-vue_export-helper-DlAUqK2U.js",
      "resources/js/app.js"
    ]
  },
  "_AuthenticationCardLogo-Bf4LXq0U.js": {
    "file": "assets/AuthenticationCardLogo-Bf4LXq0U.js",
    "name": "AuthenticationCardLogo",
    "imports": [
      "resources/js/app.js"
    ]
  },
  "_Checkbox-wi5km-BR.js": {
    "file": "assets/Checkbox-wi5km-BR.js",
    "name": "Checkbox",
    "imports": [
      "resources/js/app.js"
    ]
  },
  "_DangerButton-C-A6Br7h.js": {
    "file": "assets/DangerButton-C-A6Br7h.js",
    "name": "DangerButton",
    "imports": [
      "resources/js/app.js"
    ]
  },
  "_DialogModal-C4rPUjBQ.js": {
    "file": "assets/DialogModal-C4rPUjBQ.js",
    "name": "DialogModal",
    "imports": [
      "_SectionTitle-DnptEXNM.js",
      "resources/js/app.js"
    ]
  },
  "_FormSection-BC1oNm55.js": {
    "file": "assets/FormSection-BC1oNm55.js",
    "name": "FormSection",
    "imports": [
      "resources/js/app.js",
      "_SectionTitle-DnptEXNM.js"
    ]
  },
  "_InputLabel-DC5S04v5.js": {
    "file": "assets/InputLabel-DC5S04v5.js",
    "name": "InputLabel",
    "imports": [
      "resources/js/app.js"
    ]
  },
  "_PrimaryButton-CJUs8_6-.js": {
    "file": "assets/PrimaryButton-CJUs8_6-.js",
    "name": "PrimaryButton",
    "imports": [
      "resources/js/app.js"
    ]
  },
  "_SecondaryButton-CYz5U_mB.js": {
    "file": "assets/SecondaryButton-CYz5U_mB.js",
    "name": "SecondaryButton",
    "imports": [
      "resources/js/app.js"
    ]
  },
  "_SectionBorder-JGFhNou_.js": {
    "file": "assets/SectionBorder-JGFhNou_.js",
    "name": "SectionBorder",
    "imports": [
      "__plugin-vue_export-helper-DlAUqK2U.js",
      "resources/js/app.js"
    ]
  },
  "_SectionTitle-DnptEXNM.js": {
    "file": "assets/SectionTitle-DnptEXNM.js",
    "name": "SectionTitle",
    "imports": [
      "__plugin-vue_export-helper-DlAUqK2U.js",
      "resources/js/app.js"
    ]
  },
  "_TextInput-CfODIaKr.js": {
    "file": "assets/TextInput-CfODIaKr.js",
    "name": "TextInput",
    "imports": [
      "resources/js/app.js"
    ]
  },
  "__plugin-vue_export-helper-DlAUqK2U.js": {
    "file": "assets/_plugin-vue_export-helper-DlAUqK2U.js",
    "name": "_plugin-vue_export-helper"
  },
  "resources/js/Pages/API/Index.vue": {
    "file": "assets/Index-BQzIMDvX.js",
    "name": "Index",
    "src": "resources/js/Pages/API/Index.vue",
    "isDynamicEntry": true,
    "imports": [
      "resources/js/Pages/API/Partials/ApiTokenManager.vue",
      "_AppLayout-CAyVts_J.js",
      "resources/js/app.js",
      "_ActionMessage-Sx1QBVLc.js",
      "_DialogModal-C4rPUjBQ.js",
      "_SectionTitle-DnptEXNM.js",
      "__plugin-vue_export-helper-DlAUqK2U.js",
      "_Checkbox-wi5km-BR.js",
      "_DangerButton-C-A6Br7h.js",
      "_FormSection-BC1oNm55.js",
      "_TextInput-CfODIaKr.js",
      "_InputLabel-DC5S04v5.js",
      "_PrimaryButton-CJUs8_6-.js",
      "_SecondaryButton-CYz5U_mB.js",
      "_SectionBorder-JGFhNou_.js"
    ]
  },
  "resources/js/Pages/API/Partials/ApiTokenManager.vue": {
    "file": "assets/ApiTokenManager-BoAe04Rs.js",
    "name": "ApiTokenManager",
    "src": "resources/js/Pages/API/Partials/ApiTokenManager.vue",
    "isDynamicEntry": true,
    "imports": [
      "resources/js/app.js",
      "_ActionMessage-Sx1QBVLc.js",
      "_DialogModal-C4rPUjBQ.js",
      "_Checkbox-wi5km-BR.js",
      "_DangerButton-C-A6Br7h.js",
      "_FormSection-BC1oNm55.js",
      "_TextInput-CfODIaKr.js",
      "_InputLabel-DC5S04v5.js",
      "_PrimaryButton-CJUs8_6-.js",
      "_SecondaryButton-CYz5U_mB.js",
      "_SectionBorder-JGFhNou_.js",
      "_SectionTitle-DnptEXNM.js",
      "__plugin-vue_export-helper-DlAUqK2U.js"
    ]
  },
  "resources/js/Pages/Auth/ConfirmPassword.vue": {
    "file": "assets/ConfirmPassword-29glrrbY.js",
    "name": "ConfirmPassword",
    "src": "resources/js/Pages/Auth/ConfirmPassword.vue",
    "isDynamicEntry": true,
    "imports": [
      "resources/js/app.js",
      "_AuthenticationCard-4unKHv8U.js",
      "_AuthenticationCardLogo-Bf4LXq0U.js",
      "_TextInput-CfODIaKr.js",
      "_InputLabel-DC5S04v5.js",
      "_PrimaryButton-CJUs8_6-.js",
      "__plugin-vue_export-helper-DlAUqK2U.js"
    ]
  },
  "resources/js/Pages/Auth/ForgotPassword.vue": {
    "file": "assets/ForgotPassword-cA5791Fc.js",
    "name": "ForgotPassword",
    "src": "resources/js/Pages/Auth/ForgotPassword.vue",
    "isDynamicEntry": true,
    "imports": [
      "resources/js/app.js",
      "_AuthenticationCard-4unKHv8U.js",
      "_AuthenticationCardLogo-Bf4LXq0U.js",
      "_TextInput-CfODIaKr.js",
      "_InputLabel-DC5S04v5.js",
      "_PrimaryButton-CJUs8_6-.js",
      "__plugin-vue_export-helper-DlAUqK2U.js"
    ]
  },
  "resources/js/Pages/Auth/Login.vue": {
    "file": "assets/Login-oQqoZMW1.js",
    "name": "Login",
    "src": "resources/js/Pages/Auth/Login.vue",
    "isDynamicEntry": true,
    "imports": [
      "resources/js/app.js",
      "_AuthenticationCard-4unKHv8U.js",
      "_AuthenticationCardLogo-Bf4LXq0U.js",
      "_Checkbox-wi5km-BR.js",
      "_TextInput-CfODIaKr.js",
      "_InputLabel-DC5S04v5.js",
      "_PrimaryButton-CJUs8_6-.js",
      "__plugin-vue_export-helper-DlAUqK2U.js"
    ]
  },
  "resources/js/Pages/Auth/Register.vue": {
    "file": "assets/Register-CwD4erIF.js",
    "name": "Register",
    "src": "resources/js/Pages/Auth/Register.vue",
    "isDynamicEntry": true,
    "imports": [
      "resources/js/app.js",
      "_AuthenticationCard-4unKHv8U.js",
      "_AuthenticationCardLogo-Bf4LXq0U.js",
      "_Checkbox-wi5km-BR.js",
      "_TextInput-CfODIaKr.js",
      "_InputLabel-DC5S04v5.js",
      "_PrimaryButton-CJUs8_6-.js",
      "__plugin-vue_export-helper-DlAUqK2U.js"
    ]
  },
  "resources/js/Pages/Auth/ResetPassword.vue": {
    "file": "assets/ResetPassword-BLJpmhx6.js",
    "name": "ResetPassword",
    "src": "resources/js/Pages/Auth/ResetPassword.vue",
    "isDynamicEntry": true,
    "imports": [
      "resources/js/app.js",
      "_AuthenticationCard-4unKHv8U.js",
      "_AuthenticationCardLogo-Bf4LXq0U.js",
      "_TextInput-CfODIaKr.js",
      "_InputLabel-DC5S04v5.js",
      "_PrimaryButton-CJUs8_6-.js",
      "__plugin-vue_export-helper-DlAUqK2U.js"
    ]
  },
  "resources/js/Pages/Auth/TwoFactorChallenge.vue": {
    "file": "assets/TwoFactorChallenge-Ro_5n22q.js",
    "name": "TwoFactorChallenge",
    "src": "resources/js/Pages/Auth/TwoFactorChallenge.vue",
    "isDynamicEntry": true,
    "imports": [
      "resources/js/app.js",
      "_AuthenticationCard-4unKHv8U.js",
      "_AuthenticationCardLogo-Bf4LXq0U.js",
      "_TextInput-CfODIaKr.js",
      "_InputLabel-DC5S04v5.js",
      "_PrimaryButton-CJUs8_6-.js",
      "__plugin-vue_export-helper-DlAUqK2U.js"
    ]
  },
  "resources/js/Pages/Auth/VerifyEmail.vue": {
    "file": "assets/VerifyEmail-B8G3hGIK.js",
    "name": "VerifyEmail",
    "src": "resources/js/Pages/Auth/VerifyEmail.vue",
    "isDynamicEntry": true,
    "imports": [
      "resources/js/app.js",
      "_AuthenticationCard-4unKHv8U.js",
      "_AuthenticationCardLogo-Bf4LXq0U.js",
      "_PrimaryButton-CJUs8_6-.js",
      "__plugin-vue_export-helper-DlAUqK2U.js"
    ]
  },
  "resources/js/Pages/Dashboard.vue": {
    "file": "assets/Dashboard-HkkJ6dgb.js",
    "name": "Dashboard",
    "src": "resources/js/Pages/Dashboard.vue",
    "isDynamicEntry": true,
    "imports": [
      "_AppLayout-CAyVts_J.js",
      "__plugin-vue_export-helper-DlAUqK2U.js",
      "resources/js/app.js"
    ]
  },
  "resources/js/Pages/PrivacyPolicy.vue": {
    "file": "assets/PrivacyPolicy-De-9ANHG.js",
    "name": "PrivacyPolicy",
    "src": "resources/js/Pages/PrivacyPolicy.vue",
    "isDynamicEntry": true,
    "imports": [
      "resources/js/app.js",
      "_AuthenticationCardLogo-Bf4LXq0U.js"
    ]
  },
  "resources/js/Pages/Profile/Partials/DeleteUserForm.vue": {
    "file": "assets/DeleteUserForm-Cd43s3Aj.js",
    "name": "DeleteUserForm",
    "src": "resources/js/Pages/Profile/Partials/DeleteUserForm.vue",
    "isDynamicEntry": true,
    "imports": [
      "resources/js/app.js",
      "_DialogModal-C4rPUjBQ.js",
      "_DangerButton-C-A6Br7h.js",
      "_TextInput-CfODIaKr.js",
      "_SecondaryButton-CYz5U_mB.js",
      "_SectionTitle-DnptEXNM.js",
      "__plugin-vue_export-helper-DlAUqK2U.js"
    ]
  },
  "resources/js/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue": {
    "file": "assets/LogoutOtherBrowserSessionsForm-CsF3Gqig.js",
    "name": "LogoutOtherBrowserSessionsForm",
    "src": "resources/js/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue",
    "isDynamicEntry": true,
    "imports": [
      "resources/js/app.js",
      "_ActionMessage-Sx1QBVLc.js",
      "_DialogModal-C4rPUjBQ.js",
      "_TextInput-CfODIaKr.js",
      "_PrimaryButton-CJUs8_6-.js",
      "_SecondaryButton-CYz5U_mB.js",
      "_SectionTitle-DnptEXNM.js",
      "__plugin-vue_export-helper-DlAUqK2U.js"
    ]
  },
  "resources/js/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue": {
    "file": "assets/TwoFactorAuthenticationForm-682eSr_g.js",
    "name": "TwoFactorAuthenticationForm",
    "src": "resources/js/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue",
    "isDynamicEntry": true,
    "imports": [
      "resources/js/app.js",
      "_DialogModal-C4rPUjBQ.js",
      "_TextInput-CfODIaKr.js",
      "_PrimaryButton-CJUs8_6-.js",
      "_SecondaryButton-CYz5U_mB.js",
      "_DangerButton-C-A6Br7h.js",
      "_InputLabel-DC5S04v5.js",
      "_SectionTitle-DnptEXNM.js",
      "__plugin-vue_export-helper-DlAUqK2U.js"
    ]
  },
  "resources/js/Pages/Profile/Partials/UpdatePasswordForm.vue": {
    "file": "assets/UpdatePasswordForm-D2QLGNYa.js",
    "name": "UpdatePasswordForm",
    "src": "resources/js/Pages/Profile/Partials/UpdatePasswordForm.vue",
    "isDynamicEntry": true,
    "imports": [
      "resources/js/app.js",
      "_ActionMessage-Sx1QBVLc.js",
      "_FormSection-BC1oNm55.js",
      "_TextInput-CfODIaKr.js",
      "_InputLabel-DC5S04v5.js",
      "_PrimaryButton-CJUs8_6-.js",
      "_SectionTitle-DnptEXNM.js",
      "__plugin-vue_export-helper-DlAUqK2U.js"
    ]
  },
  "resources/js/Pages/Profile/Partials/UpdateProfileInformationForm.vue": {
    "file": "assets/UpdateProfileInformationForm-9ZGZsXeb.js",
    "name": "UpdateProfileInformationForm",
    "src": "resources/js/Pages/Profile/Partials/UpdateProfileInformationForm.vue",
    "isDynamicEntry": true,
    "imports": [
      "resources/js/app.js",
      "_ActionMessage-Sx1QBVLc.js",
      "_FormSection-BC1oNm55.js",
      "_TextInput-CfODIaKr.js",
      "_InputLabel-DC5S04v5.js",
      "_PrimaryButton-CJUs8_6-.js",
      "_SecondaryButton-CYz5U_mB.js",
      "_SectionTitle-DnptEXNM.js",
      "__plugin-vue_export-helper-DlAUqK2U.js"
    ]
  },
  "resources/js/Pages/Profile/Show.vue": {
    "file": "assets/Show-BiQ8Kecq.js",
    "name": "Show",
    "src": "resources/js/Pages/Profile/Show.vue",
    "isDynamicEntry": true,
    "imports": [
      "_AppLayout-CAyVts_J.js",
      "resources/js/Pages/Profile/Partials/DeleteUserForm.vue",
      "resources/js/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue",
      "_SectionBorder-JGFhNou_.js",
      "resources/js/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue",
      "resources/js/Pages/Profile/Partials/UpdatePasswordForm.vue",
      "resources/js/Pages/Profile/Partials/UpdateProfileInformationForm.vue",
      "resources/js/app.js",
      "__plugin-vue_export-helper-DlAUqK2U.js",
      "_DialogModal-C4rPUjBQ.js",
      "_SectionTitle-DnptEXNM.js",
      "_DangerButton-C-A6Br7h.js",
      "_TextInput-CfODIaKr.js",
      "_SecondaryButton-CYz5U_mB.js",
      "_ActionMessage-Sx1QBVLc.js",
      "_PrimaryButton-CJUs8_6-.js",
      "_InputLabel-DC5S04v5.js",
      "_FormSection-BC1oNm55.js"
    ]
  },
  "resources/js/Pages/TermsOfService.vue": {
    "file": "assets/TermsOfService-ClxGAi5H.js",
    "name": "TermsOfService",
    "src": "resources/js/Pages/TermsOfService.vue",
    "isDynamicEntry": true,
    "imports": [
      "resources/js/app.js",
      "_AuthenticationCardLogo-Bf4LXq0U.js"
    ]
  },
  "resources/js/Pages/Welcome.vue": {
    "file": "assets/Welcome-Djmx4OVq.js",
    "name": "Welcome",
    "src": "resources/js/Pages/Welcome.vue",
    "isDynamicEntry": true,
    "imports": [
      "resources/js/app.js"
    ]
  },
  "resources/js/app.js": {
    "file": "assets/app-DsJ4COlh.js",
    "name": "app",
    "src": "resources/js/app.js",
    "isEntry": true,
    "dynamicImports": [
      "resources/js/Pages/API/Index.vue",
      "resources/js/Pages/API/Partials/ApiTokenManager.vue",
      "resources/js/Pages/Auth/ConfirmPassword.vue",
      "resources/js/Pages/Auth/ForgotPassword.vue",
      "resources/js/Pages/Auth/Login.vue",
      "resources/js/Pages/Auth/Register.vue",
      "resources/js/Pages/Auth/ResetPassword.vue",
      "resources/js/Pages/Auth/TwoFactorChallenge.vue",
      "resources/js/Pages/Auth/VerifyEmail.vue",
      "resources/js/Pages/Dashboard.vue",
      "resources/js/Pages/PrivacyPolicy.vue",
      "resources/js/Pages/Profile/Partials/DeleteUserForm.vue",
      "resources/js/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue",
      "resources/js/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue",
      "resources/js/Pages/Profile/Partials/UpdatePasswordForm.vue",
      "resources/js/Pages/Profile/Partials/UpdateProfileInformationForm.vue",
      "resources/js/Pages/Profile/Show.vue",
      "resources/js/Pages/TermsOfService.vue",
      "resources/js/Pages/Welcome.vue"
    ],
    "css": [
      "assets/app-BG2D7S1e.css"
    ]
  }
}
```

#### public/.htaccess
```htaccess
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Handle X-XSRF-Token Header
    RewriteCond %{HTTP:x-xsrf-token} .
    RewriteRule .* - [E=HTTP_X_XSRF_TOKEN:%{HTTP:X-XSRF-Token}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>

```

#### public/index.php
```php
<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());

```

#### public/robots.txt
```txt
User-agent: *
Disallow:

```

#### resources/css/app.css
```css
@tailwind base;
@tailwind components;
@tailwind utilities;

[x-cloak] {
    display: none;
}

```

#### resources/js/Components/ActionMessage.vue
```vue
<script setup>
defineProps({
    on: Boolean,
});
</script>

<template>
    <div>
        <transition leave-active-class="transition ease-in duration-1000" leave-from-class="opacity-100" leave-to-class="opacity-0">
            <div v-show="on" class="text-sm text-gray-600">
                <slot />
            </div>
        </transition>
    </div>
</template>

```

#### resources/js/Components/ActionSection.vue
```vue
<script setup>
import SectionTitle from './SectionTitle.vue';
</script>

<template>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <SectionTitle>
            <template #title>
                <slot name="title" />
            </template>
            <template #description>
                <slot name="description" />
            </template>
        </SectionTitle>

        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
                <slot name="content" />
            </div>
        </div>
    </div>
</template>

```

#### resources/js/Components/ApplicationLogo.vue
```vue
<template>
    <svg viewBox="0 0 317 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M74.09 30.04V13h-4.14v21H82.1v-3.96h-8.01zM95.379 19v1.77c-1.08-1.35-2.7-2.19-4.89-2.19-3.99 0-7.29 3.45-7.29 7.92s3.3 7.92 7.29 7.92c2.19 0 3.81-.84 4.89-2.19V34h3.87V19h-3.87zm-4.17 11.73c-2.37 0-4.14-1.71-4.14-4.23 0-2.52 1.77-4.23 4.14-4.23 2.4 0 4.17 1.71 4.17 4.23 0 2.52-1.77 4.23-4.17 4.23zM106.628 21.58V19h-3.87v15h3.87v-7.17c0-3.15 2.55-4.05 4.56-3.81V18.7c-1.89 0-3.78.84-4.56 2.88zM124.295 19v1.77c-1.08-1.35-2.7-2.19-4.89-2.19-3.99 0-7.29 3.45-7.29 7.92s3.3 7.92 7.29 7.92c2.19 0 3.81-.84 4.89-2.19V34h3.87V19h-3.87zm-4.17 11.73c-2.37 0-4.14-1.71-4.14-4.23 0-2.52 1.77-4.23 4.14-4.23 2.4 0 4.17 1.71 4.17 4.23 0 2.52-1.77 4.23-4.17 4.23zM141.544 19l-3.66 10.5-3.63-10.5h-4.26l5.7 15h4.41l5.7-15h-4.26zM150.354 28.09h11.31c.09-.51.15-1.02.15-1.59 0-4.41-3.15-7.92-7.59-7.92-4.71 0-7.92 3.45-7.92 7.92s3.18 7.92 8.22 7.92c2.88 0 5.13-1.17 6.54-3.21l-3.12-1.8c-.66.87-1.86 1.5-3.36 1.5-2.04 0-3.69-.84-4.23-2.82zm-.06-3c.45-1.92 1.86-3.03 3.93-3.03 1.62 0 3.24.87 3.72 3.03h-7.65zM164.516 34h3.87V12.1h-3.87V34zM185.248 34.36c3.69 0 6.9-2.01 6.9-6.3V13h-2.1v15.06c0 3.03-2.07 4.26-4.8 4.26-2.19 0-3.93-.78-4.62-2.61l-1.77 1.05c1.05 2.43 3.57 3.6 6.39 3.6zM203.124 18.64c-4.65 0-7.83 3.45-7.83 7.86 0 4.53 3.24 7.86 7.98 7.86 3.03 0 5.34-1.41 6.6-3.45l-1.74-1.02c-.81 1.44-2.46 2.55-4.83 2.55-3.18 0-5.55-1.89-5.97-4.95h13.17c.03-.3.06-.63.06-.93 0-4.11-2.85-7.92-7.44-7.92zm0 1.92c2.58 0 4.98 1.71 5.4 5.01h-11.19c.39-2.94 2.64-5.01 5.79-5.01zM221.224 20.92V19h-4.32v-4.2l-1.98.6V19h-3.15v1.92h3.15v9.09c0 3.6 2.25 4.59 6.3 3.99v-1.74c-2.91.12-4.32.33-4.32-2.25v-9.09h4.32zM225.176 22.93c0-1.62 1.59-2.37 3.15-2.37 1.44 0 2.97.57 3.6 2.1l1.65-.96c-.87-1.86-2.79-3.06-5.25-3.06-3 0-5.13 1.89-5.13 4.29 0 5.52 8.76 3.39 8.76 7.11 0 1.77-1.68 2.4-3.45 2.4-2.01 0-3.57-.99-4.11-2.52l-1.68.99c.75 1.92 2.79 3.45 5.79 3.45 3.21 0 5.43-1.77 5.43-4.32 0-5.52-8.76-3.39-8.76-7.11zM244.603 20.92V19h-4.32v-4.2l-1.98.6V19h-3.15v1.92h3.15v9.09c0 3.6 2.25 4.59 6.3 3.99v-1.74c-2.91.12-4.32.33-4.32-2.25v-9.09h4.32zM249.883 21.49V19h-1.98v15h1.98v-8.34c0-3.72 2.34-4.98 4.74-4.98v-1.92c-1.92 0-3.69.63-4.74 2.73zM263.358 18.64c-4.65 0-7.83 3.45-7.83 7.86 0 4.53 3.24 7.86 7.98 7.86 3.03 0 5.34-1.41 6.6-3.45l-1.74-1.02c-.81 1.44-2.46 2.55-4.83 2.55-3.18 0-5.55-1.89-5.97-4.95h13.17c.03-.3.06-.63.06-.93 0-4.11-2.85-7.92-7.44-7.92zm0 1.92c2.58 0 4.98 1.71 5.4 5.01h-11.19c.39-2.94 2.64-5.01 5.79-5.01zM286.848 19v2.94c-1.26-2.01-3.39-3.3-6.06-3.3-4.23 0-7.74 3.42-7.74 7.86s3.51 7.86 7.74 7.86c2.67 0 4.8-1.29 6.06-3.3V34h1.98V19h-1.98zm-5.91 13.44c-3.33 0-5.91-2.61-5.91-5.94 0-3.33 2.58-5.94 5.91-5.94s5.91 2.61 5.91 5.94c0 3.33-2.58 5.94-5.91 5.94zM309.01 18.64c-1.92 0-3.75.87-4.86 2.73-.84-1.74-2.46-2.73-4.56-2.73-1.8 0-3.42.72-4.59 2.55V19h-1.98v15H295v-8.31c0-3.72 2.16-5.13 4.32-5.13 2.13 0 3.51 1.41 3.51 4.08V34h1.98v-8.31c0-3.72 1.86-5.13 4.17-5.13 2.13 0 3.66 1.41 3.66 4.08V34h1.98v-9.36c0-3.75-2.31-6-5.61-6z" class="fill-black" />
        <path d="M11.395 44.428C4.557 40.198 0 32.632 0 24 0 10.745 10.745 0 24 0a23.891 23.891 0 0113.997 4.502c-.2 17.907-11.097 33.245-26.602 39.926z" fill="#6875F5" />
        <path d="M14.134 45.885A23.914 23.914 0 0024 48c13.255 0 24-10.745 24-24 0-3.516-.756-6.856-2.115-9.866-4.659 15.143-16.608 27.092-31.75 31.751z" fill="#6875F5" />
    </svg>
</template>

```

#### resources/js/Components/ApplicationMark.vue
```vue
<template>
    <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M11.395 44.428C4.557 40.198 0 32.632 0 24 0 10.745 10.745 0 24 0a23.891 23.891 0 0113.997 4.502c-.2 17.907-11.097 33.245-26.602 39.926z" fill="#6875F5" />
        <path d="M14.134 45.885A23.914 23.914 0 0024 48c13.255 0 24-10.745 24-24 0-3.516-.756-6.856-2.115-9.866-4.659 15.143-16.608 27.092-31.75 31.751z" fill="#6875F5" />
    </svg>
</template>

```

#### resources/js/Components/AuthenticationCard.vue
```vue
<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <slot name="logo" />
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <slot />
        </div>
    </div>
</template>

```

#### resources/js/Components/AuthenticationCardLogo.vue
```vue
<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Link :href="'/'">
        <svg
            class="size-16"
            viewBox="0 0 48 48"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path d="M11.395 44.428C4.557 40.198 0 32.632 0 24 0 10.745 10.745 0 24 0a23.891 23.891 0 0113.997 4.502c-.2 17.907-11.097 33.245-26.602 39.926z" fill="#6875F5" />
            <path d="M14.134 45.885A23.914 23.914 0 0024 48c13.255 0 24-10.745 24-24 0-3.516-.756-6.856-2.115-9.866-4.659 15.143-16.608 27.092-31.75 31.751z" fill="#6875F5" />
        </svg>
    </Link>
</template>

```

#### resources/js/Components/Banner.vue
```vue
<script setup>
import { ref, watchEffect } from 'vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
const show = ref(true);
const style = ref('success');
const message = ref('');

watchEffect(async () => {
    style.value = page.props.jetstream.flash?.bannerStyle || 'success';
    message.value = page.props.jetstream.flash?.banner || '';
    show.value = true;
});
</script>

<template>
    <div>
        <div v-if="show && message" :class="{ 'bg-indigo-500': style == 'success', 'bg-red-700': style == 'danger' }">
            <div class="max-w-screen-xl mx-auto py-2 px-3 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between flex-wrap">
                    <div class="w-0 flex-1 flex items-center min-w-0">
                        <span class="flex p-2 rounded-lg" :class="{ 'bg-indigo-600': style == 'success', 'bg-red-600': style == 'danger' }">
                            <svg v-if="style == 'success'" class="size-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>

                            <svg v-if="style == 'danger'" class="size-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                            </svg>
                        </span>

                        <p class="ms-3 font-medium text-sm text-white truncate">
                            {{ message }}
                        </p>
                    </div>

                    <div class="shrink-0 sm:ms-3">
                        <button
                            type="button"
                            class="-me-1 flex p-2 rounded-md focus:outline-none sm:-me-2 transition"
                            :class="{ 'hover:bg-indigo-600 focus:bg-indigo-600': style == 'success', 'hover:bg-red-600 focus:bg-red-600': style == 'danger' }"
                            aria-label="Dismiss"
                            @click.prevent="show = false"
                        >
                            <svg class="size-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

```

#### resources/js/Components/Checkbox.vue
```vue
<script setup>
import { computed } from 'vue';

const emit = defineEmits(['update:checked']);

const props = defineProps({
    checked: {
        type: [Array, Boolean],
        default: false,
    },
    value: {
        type: String,
        default: null,
    },
});

const proxyChecked = computed({
    get() {
        return props.checked;
    },

    set(val) {
        emit('update:checked', val);
    },
});
</script>


<template>
    <input
        v-model="proxyChecked"
        type="checkbox"
        :value="value"
        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
    >
</template>

```

#### resources/js/Components/ConfirmationModal.vue
```vue
<script setup>
import Modal from './Modal.vue';

const emit = defineEmits(['close']);

defineProps({
    show: {
        type: Boolean,
        default: false,
    },
    maxWidth: {
        type: String,
        default: '2xl',
    },
    closeable: {
        type: Boolean,
        default: true,
    },
});

const close = () => {
    emit('close');
};
</script>

<template>
    <Modal
        :show="show"
        :max-width="maxWidth"
        :closeable="closeable"
        @close="close"
    >
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
                <div class="mx-auto shrink-0 flex items-center justify-center size-12 rounded-full bg-red-100 sm:mx-0 sm:size-10">
                    <svg class="size-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                </div>

                <div class="mt-3 text-center sm:mt-0 sm:ms-4 sm:text-start">
                    <h3 class="text-lg font-medium text-gray-900">
                        <slot name="title" />
                    </h3>

                    <div class="mt-4 text-sm text-gray-600">
                        <slot name="content" />
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-end">
            <slot name="footer" />
        </div>
    </Modal>
</template>

```

#### resources/js/Components/ConfirmsPassword.vue
```vue
<script setup>
import { ref, reactive, nextTick } from 'vue';
import DialogModal from './DialogModal.vue';
import InputError from './InputError.vue';
import PrimaryButton from './PrimaryButton.vue';
import SecondaryButton from './SecondaryButton.vue';
import TextInput from './TextInput.vue';

const emit = defineEmits(['confirmed']);

defineProps({
    title: {
        type: String,
        default: 'Confirm Password',
    },
    content: {
        type: String,
        default: 'For your security, please confirm your password to continue.',
    },
    button: {
        type: String,
        default: 'Confirm',
    },
});

const confirmingPassword = ref(false);

const form = reactive({
    password: '',
    error: '',
    processing: false,
});

const passwordInput = ref(null);

const startConfirmingPassword = () => {
    axios.get(route('password.confirmation')).then(response => {
        if (response.data.confirmed) {
            emit('confirmed');
        } else {
            confirmingPassword.value = true;

            setTimeout(() => passwordInput.value.focus(), 250);
        }
    });
};

const confirmPassword = () => {
    form.processing = true;

    axios.post(route('password.confirm'), {
        password: form.password,
    }).then(() => {
        form.processing = false;

        closeModal();
        nextTick().then(() => emit('confirmed'));

    }).catch(error => {
        form.processing = false;
        form.error = error.response.data.errors.password[0];
        passwordInput.value.focus();
    });
};

const closeModal = () => {
    confirmingPassword.value = false;
    form.password = '';
    form.error = '';
};
</script>

<template>
    <span>
        <span @click="startConfirmingPassword">
            <slot />
        </span>

        <DialogModal :show="confirmingPassword" @close="closeModal">
            <template #title>
                {{ title }}
            </template>

            <template #content>
                {{ content }}

                <div class="mt-4">
                    <TextInput
                        ref="passwordInput"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-3/4"
                        placeholder="Password"
                        autocomplete="current-password"
                        @keyup.enter="confirmPassword"
                    />

                    <InputError :message="form.error" class="mt-2" />
                </div>
            </template>

            <template #footer>
                <SecondaryButton @click="closeModal">
                    Cancel
                </SecondaryButton>

                <PrimaryButton
                    class="ms-3"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    @click="confirmPassword"
                >
                    {{ button }}
                </PrimaryButton>
            </template>
        </DialogModal>
    </span>
</template>

```

#### resources/js/Components/DangerButton.vue
```vue
<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
        <slot />
    </button>
</template>

```

#### resources/js/Components/DialogModal.vue
```vue
<script setup>
import Modal from './Modal.vue';

const emit = defineEmits(['close']);

defineProps({
    show: {
        type: Boolean,
        default: false,
    },
    maxWidth: {
        type: String,
        default: '2xl',
    },
    closeable: {
        type: Boolean,
        default: true,
    },
});

const close = () => {
    emit('close');
};
</script>

<template>
    <Modal
        :show="show"
        :max-width="maxWidth"
        :closeable="closeable"
        @close="close"
    >
        <div class="px-6 py-4">
            <div class="text-lg font-medium text-gray-900">
                <slot name="title" />
            </div>

            <div class="mt-4 text-sm text-gray-600">
                <slot name="content" />
            </div>
        </div>

        <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-end">
            <slot name="footer" />
        </div>
    </Modal>
</template>

```

#### resources/js/Components/Dropdown.vue
```vue
<script setup>
import { computed, onMounted, onUnmounted, ref } from 'vue';

const props = defineProps({
    align: {
        type: String,
        default: 'right',
    },
    width: {
        type: String,
        default: '48',
    },
    contentClasses: {
        type: Array,
        default: () => ['py-1', 'bg-white'],
    },
});

let open = ref(false);

const closeOnEscape = (e) => {
    if (open.value && e.key === 'Escape') {
        open.value = false;
    }
};

onMounted(() => document.addEventListener('keydown', closeOnEscape));
onUnmounted(() => document.removeEventListener('keydown', closeOnEscape));

const widthClass = computed(() => {
    return {
        '48': 'w-48',
    }[props.width.toString()];
});

const alignmentClasses = computed(() => {
    if (props.align === 'left') {
        return 'ltr:origin-top-left rtl:origin-top-right start-0';
    }

    if (props.align === 'right') {
        return 'ltr:origin-top-right rtl:origin-top-left end-0';
    }

    return 'origin-top';
});
</script>

<template>
    <div class="relative">
        <div @click="open = ! open">
            <slot name="trigger" />
        </div>

        <!-- Full Screen Dropdown Overlay -->
        <div v-show="open" class="fixed inset-0 z-40" @click="open = false" />

        <transition
            enter-active-class="transition ease-out duration-200"
            enter-from-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95"
        >
            <div
                v-show="open"
                class="absolute z-50 mt-2 rounded-md shadow-lg"
                :class="[widthClass, alignmentClasses]"
                style="display: none;"
                @click="open = false"
            >
                <div class="rounded-md ring-1 ring-black ring-opacity-5" :class="contentClasses">
                    <slot name="content" />
                </div>
            </div>
        </transition>
    </div>
</template>

```

#### resources/js/Components/DropdownLink.vue
```vue
<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    href: String,
    as: String,
});
</script>

<template>
    <div>
        <button v-if="as == 'button'" type="submit" class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
            <slot />
        </button>

        <a v-else-if="as =='a'" :href="href" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
            <slot />
        </a>

        <Link v-else :href="href" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
            <slot />
        </Link>
    </div>
</template>

```

#### resources/js/Components/FormSection.vue
```vue
<script setup>
import { computed, useSlots } from 'vue';
import SectionTitle from './SectionTitle.vue';

defineEmits(['submitted']);

const hasActions = computed(() => !! useSlots().actions);
</script>

<template>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <SectionTitle>
            <template #title>
                <slot name="title" />
            </template>
            <template #description>
                <slot name="description" />
            </template>
        </SectionTitle>

        <div class="mt-5 md:mt-0 md:col-span-2">
            <form @submit.prevent="$emit('submitted')">
                <div
                    class="px-4 py-5 bg-white sm:p-6 shadow"
                    :class="hasActions ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md'"
                >
                    <div class="grid grid-cols-6 gap-6">
                        <slot name="form" />
                    </div>
                </div>

                <div v-if="hasActions" class="flex items-center justify-end px-4 py-3 bg-gray-50 text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    <slot name="actions" />
                </div>
            </form>
        </div>
    </div>
</template>

```

#### resources/js/Components/InputError.vue
```vue
<script setup>
defineProps({
    message: String,
});
</script>

<template>
    <div v-show="message">
        <p class="text-sm text-red-600">
            {{ message }}
        </p>
    </div>
</template>

```

#### resources/js/Components/InputLabel.vue
```vue
<script setup>
defineProps({
    value: String,
});
</script>

<template>
    <label class="block font-medium text-sm text-gray-700">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>

```

#### resources/js/Components/Modal.vue
```vue
<script setup>
import { computed, onMounted, onUnmounted, ref, watch } from 'vue';

const props = defineProps({
    show: {
        type: Boolean,
        default: false,
    },
    maxWidth: {
        type: String,
        default: '2xl',
    },
    closeable: {
        type: Boolean,
        default: true,
    },
});

const emit = defineEmits(['close']);
const dialog = ref();
const showSlot = ref(props.show);

watch(() => props.show, () => {
    if (props.show) {
        document.body.style.overflow = 'hidden';
        showSlot.value = true;
        dialog.value?.showModal();
    } else {
        document.body.style.overflow = null;
        setTimeout(() => {
            dialog.value?.close();
            showSlot.value = false;
        }, 200);
    }
});

const close = () => {
    if (props.closeable) {
        emit('close');
    }
};

const closeOnEscape = (e) => {
    if (e.key === 'Escape') {
        e.preventDefault();

        if (props.show) {
            close();
        }
    }
};

onMounted(() => document.addEventListener('keydown', closeOnEscape));

onUnmounted(() => {
    document.removeEventListener('keydown', closeOnEscape);
    document.body.style.overflow = null;
});

const maxWidthClass = computed(() => {
    return {
        'sm': 'sm:max-w-sm',
        'md': 'sm:max-w-md',
        'lg': 'sm:max-w-lg',
        'xl': 'sm:max-w-xl',
        '2xl': 'sm:max-w-2xl',
    }[props.maxWidth];
});
</script>

<template>
    <dialog class="z-50 m-0 min-h-full min-w-full overflow-y-auto bg-transparent backdrop:bg-transparent" ref="dialog">
        <div class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50" scroll-region>
            <transition
                enter-active-class="ease-out duration-300"
                enter-from-class="opacity-0"
                enter-to-class="opacity-100"
                leave-active-class="ease-in duration-200"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
            >
                <div v-show="show" class="fixed inset-0 transform transition-all" @click="close">
                    <div class="absolute inset-0 bg-gray-500 opacity-75" />
                </div>
            </transition>

            <transition
                enter-active-class="ease-out duration-300"
                enter-from-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                enter-to-class="opacity-100 translate-y-0 sm:scale-100"
                leave-active-class="ease-in duration-200"
                leave-from-class="opacity-100 translate-y-0 sm:scale-100"
                leave-to-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            >
                <div v-show="show" class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto" :class="maxWidthClass">
                    <slot v-if="showSlot"/>
                </div>
            </transition>
        </div>
    </dialog>
</template>

```

#### resources/js/Components/NavLink.vue
```vue
<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: String,
    active: Boolean,
});

const classes = computed(() => {
    return props.active
        ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
        : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
});
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>

```

#### resources/js/Components/PrimaryButton.vue
```vue
<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150">
        <slot />
    </button>
</template>

```

#### resources/js/Components/ResponsiveNavLink.vue
```vue
<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    active: Boolean,
    href: String,
    as: String,
});

const classes = computed(() => {
    return props.active
        ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-indigo-400 text-start text-base font-medium text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out'
        : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out';
});
</script>

<template>
    <div>
        <button v-if="as == 'button'" :class="classes" class="w-full text-start">
            <slot />
        </button>

        <a v-else-if="as == 'a'" :class="classes" class="w-full text-start" :href="href">
            <slot />
        </a>

        <Link v-else :href="href" :class="classes">
            <slot />
        </Link>
    </div>
</template>

```

#### resources/js/Components/SecondaryButton.vue
```vue
<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
        <slot />
    </button>
</template>

```

#### resources/js/Components/SectionBorder.vue
```vue
<template>
    <div class="hidden sm:block">
        <div class="py-8">
            <div class="border-t border-gray-200" />
        </div>
    </div>
</template>

```

#### resources/js/Components/SectionTitle.vue
```vue
<template>
    <div class="md:col-span-1 flex justify-between">
        <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium text-gray-900">
                <slot name="title" />
            </h3>

            <p class="mt-1 text-sm text-gray-600">
                <slot name="description" />
            </p>
        </div>

        <div class="px-4 sm:px-0">
            <slot name="aside" />
        </div>
    </div>
</template>

```

#### resources/js/Components/TextInput.vue
```vue
<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: String,
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        ref="input"
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
    >
</template>

```

#### resources/js/Components/Welcome.vue
```vue
<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    <div>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            <ApplicationLogo class="block h-12 w-auto" />

            <h1 class="mt-8 text-2xl font-medium text-gray-900">
                Welcome to your Jetstream application!
            </h1>

            <p class="mt-6 text-gray-500 leading-relaxed">
                Laravel Jetstream provides a beautiful, robust starting point for your next Laravel application. Laravel is designed
                to help you build your application using a development environment that is simple, powerful, and enjoyable. We believe
                you should love expressing your creativity through programming, so we have spent time carefully crafting the Laravel
                ecosystem to be a breath of fresh air. We hope you love it.
            </p>
        </div>

        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
            <div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="size-6 stroke-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>
                    <h2 class="ms-3 text-xl font-semibold text-gray-900">
                        <a href="https://laravel.com/docs">Documentation</a>
                    </h2>
                </div>

                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                    Laravel has wonderful documentation covering every aspect of the framework. Whether you're new to the framework or have previous experience, we recommend reading all of the documentation from beginning to end.
                </p>

                <p class="mt-4 text-sm">
                    <a href="https://laravel.com/docs" class="inline-flex items-center font-semibold text-indigo-700">
                        Explore the documentation

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 size-5 fill-indigo-500">
                            <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </p>
            </div>

            <div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="size-6 stroke-gray-400">
                        <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                    </svg>
                    <h2 class="ms-3 text-xl font-semibold text-gray-900">
                        <a href="https://laracasts.com">Laracasts</a>
                    </h2>
                </div>

                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                    Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                </p>

                <p class="mt-4 text-sm">
                    <a href="https://laracasts.com" class="inline-flex items-center font-semibold text-indigo-700">
                        Start watching Laracasts

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 size-5 fill-indigo-500">
                            <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </p>
            </div>

            <div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="size-6 stroke-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                    <h2 class="ms-3 text-xl font-semibold text-gray-900">
                        <a href="https://tailwindcss.com/">Tailwind</a>
                    </h2>
                </div>

                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                    Laravel Jetstream is built with Tailwind, an amazing utility first CSS framework that doesn't get in your way. You'll be amazed how easily you can build and maintain fresh, modern designs with this wonderful framework at your fingertips.
                </p>
            </div>

            <div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="size-6 stroke-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                    </svg>
                    <h2 class="ms-3 text-xl font-semibold text-gray-900">
                        Authentication
                    </h2>
                </div>

                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                    Authentication and registration views are included with Laravel Jetstream, as well as support for user email verification and resetting forgotten passwords. So, you're free to get started with what matters most: building your application.
                </p>
            </div>
        </div>
    </div>
</template>

```

#### resources/js/Layouts/AppLayout.vue
```vue
<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    router.put(route('current-team.update'), {
        team_id: team.id,
    }, {
        preserveState: false,
    });
};

const logout = () => {
    router.post(route('logout'));
};
</script>

<template>
    <div>
        <Head :title="title" />

        <Banner />

        <div class="min-h-screen bg-gray-100">
            <nav class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('dashboard')">
                                    <ApplicationMark class="block h-9 w-auto" />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                    Dashboard
                                </NavLink>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <div class="ms-3 relative">
                                <!-- Teams Dropdown -->
                                <Dropdown v-if="$page.props.jetstream.hasTeamFeatures" align="right" width="60">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                                {{ $page.props.auth.user.current_team.name }}

                                                <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <div class="w-60">
                                            <!-- Team Management -->
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                Manage Team
                                            </div>

                                            <!-- Team Settings -->
                                            <DropdownLink :href="route('teams.show', $page.props.auth.user.current_team)">
                                                Team Settings
                                            </DropdownLink>

                                            <DropdownLink v-if="$page.props.jetstream.canCreateTeams" :href="route('teams.create')">
                                                Create New Team
                                            </DropdownLink>

                                            <!-- Team Switcher -->
                                            <template v-if="$page.props.auth.user.all_teams.length > 1">
                                                <div class="border-t border-gray-200" />

                                                <div class="block px-4 py-2 text-xs text-gray-400">
                                                    Switch Teams
                                                </div>

                                                <template v-for="team in $page.props.auth.user.all_teams" :key="team.id">
                                                    <form @submit.prevent="switchToTeam(team)">
                                                        <DropdownLink as="button">
                                                            <div class="flex items-center">
                                                                <svg v-if="team.id == $page.props.auth.user.current_team_id" class="me-2 size-5 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                </svg>

                                                                <div>{{ team.name }}</div>
                                                            </div>
                                                        </DropdownLink>
                                                    </form>
                                                </template>
                                            </template>
                                        </div>
                                    </template>
                                </Dropdown>
                            </div>

                            <!-- Settings Dropdown -->
                            <div class="ms-3 relative">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <button v-if="$page.props.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="size-8 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name">
                                        </button>

                                        <span v-else class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                                {{ $page.props.auth.user.name }}

                                                <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            Manage Account
                                        </div>

                                        <DropdownLink :href="route('profile.show')">
                                            Profile
                                        </DropdownLink>

                                        <DropdownLink v-if="$page.props.jetstream.hasApiFeatures" :href="route('api-tokens.index')">
                                            API Tokens
                                        </DropdownLink>

                                        <div class="border-t border-gray-200" />

                                        <!-- Authentication -->
                                        <form @submit.prevent="logout">
                                            <DropdownLink as="button">
                                                Log Out
                                            </DropdownLink>
                                        </form>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out" @click="showingNavigationDropdown = ! showingNavigationDropdown">
                                <svg
                                    class="size-6"
                                    stroke="currentColor"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="flex items-center px-4">
                            <div v-if="$page.props.jetstream.managesProfilePhotos" class="shrink-0 me-3">
                                <img class="size-10 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name">
                            </div>

                            <div>
                                <div class="font-medium text-base text-gray-800">
                                    {{ $page.props.auth.user.name }}
                                </div>
                                <div class="font-medium text-sm text-gray-500">
                                    {{ $page.props.auth.user.email }}
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.show')" :active="route().current('profile.show')">
                                Profile
                            </ResponsiveNavLink>

                            <ResponsiveNavLink v-if="$page.props.jetstream.hasApiFeatures" :href="route('api-tokens.index')" :active="route().current('api-tokens.index')">
                                API Tokens
                            </ResponsiveNavLink>

                            <!-- Authentication -->
                            <form method="POST" @submit.prevent="logout">
                                <ResponsiveNavLink as="button">
                                    Log Out
                                </ResponsiveNavLink>
                            </form>

                            <!-- Team Management -->
                            <template v-if="$page.props.jetstream.hasTeamFeatures">
                                <div class="border-t border-gray-200" />

                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    Manage Team
                                </div>

                                <!-- Team Settings -->
                                <ResponsiveNavLink :href="route('teams.show', $page.props.auth.user.current_team)" :active="route().current('teams.show')">
                                    Team Settings
                                </ResponsiveNavLink>

                                <ResponsiveNavLink v-if="$page.props.jetstream.canCreateTeams" :href="route('teams.create')" :active="route().current('teams.create')">
                                    Create New Team
                                </ResponsiveNavLink>

                                <!-- Team Switcher -->
                                <template v-if="$page.props.auth.user.all_teams.length > 1">
                                    <div class="border-t border-gray-200" />

                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        Switch Teams
                                    </div>

                                    <template v-for="team in $page.props.auth.user.all_teams" :key="team.id">
                                        <form @submit.prevent="switchToTeam(team)">
                                            <ResponsiveNavLink as="button">
                                                <div class="flex items-center">
                                                    <svg v-if="team.id == $page.props.auth.user.current_team_id" class="me-2 size-5 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    <div>{{ team.name }}</div>
                                                </div>
                                            </ResponsiveNavLink>
                                        </form>
                                    </template>
                                </template>
                            </template>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header v-if="$slots.header" class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>

```

#### resources/js/Pages/API/Partials/ApiTokenManager.vue
```vue
<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import ActionSection from '@/Components/ActionSection.vue';
import Checkbox from '@/Components/Checkbox.vue';
import ConfirmationModal from '@/Components/ConfirmationModal.vue';
import DangerButton from '@/Components/DangerButton.vue';
import DialogModal from '@/Components/DialogModal.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    tokens: Array,
    availablePermissions: Array,
    defaultPermissions: Array,
});

const createApiTokenForm = useForm({
    name: '',
    permissions: props.defaultPermissions,
});

const updateApiTokenForm = useForm({
    permissions: [],
});

const deleteApiTokenForm = useForm({});

const displayingToken = ref(false);
const managingPermissionsFor = ref(null);
const apiTokenBeingDeleted = ref(null);

const createApiToken = () => {
    createApiTokenForm.post(route('api-tokens.store'), {
        preserveScroll: true,
        onSuccess: () => {
            displayingToken.value = true;
            createApiTokenForm.reset();
        },
    });
};

const manageApiTokenPermissions = (token) => {
    updateApiTokenForm.permissions = token.abilities;
    managingPermissionsFor.value = token;
};

const updateApiToken = () => {
    updateApiTokenForm.put(route('api-tokens.update', managingPermissionsFor.value), {
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => (managingPermissionsFor.value = null),
    });
};

const confirmApiTokenDeletion = (token) => {
    apiTokenBeingDeleted.value = token;
};

const deleteApiToken = () => {
    deleteApiTokenForm.delete(route('api-tokens.destroy', apiTokenBeingDeleted.value), {
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => (apiTokenBeingDeleted.value = null),
    });
};
</script>

<template>
    <div>
        <!-- Generate API Token -->
        <FormSection @submitted="createApiToken">
            <template #title>
                Create API Token
            </template>

            <template #description>
                API tokens allow third-party services to authenticate with our application on your behalf.
            </template>

            <template #form>
                <!-- Token Name -->
                <div class="col-span-6 sm:col-span-4">
                    <InputLabel for="name" value="Name" />
                    <TextInput
                        id="name"
                        v-model="createApiTokenForm.name"
                        type="text"
                        class="mt-1 block w-full"
                        autofocus
                    />
                    <InputError :message="createApiTokenForm.errors.name" class="mt-2" />
                </div>

                <!-- Token Permissions -->
                <div v-if="availablePermissions.length > 0" class="col-span-6">
                    <InputLabel for="permissions" value="Permissions" />

                    <div class="mt-2 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div v-for="permission in availablePermissions" :key="permission">
                            <label class="flex items-center">
                                <Checkbox v-model:checked="createApiTokenForm.permissions" :value="permission" />
                                <span class="ms-2 text-sm text-gray-600">{{ permission }}</span>
                            </label>
                        </div>
                    </div>
                </div>
            </template>

            <template #actions>
                <ActionMessage :on="createApiTokenForm.recentlySuccessful" class="me-3">
                    Created.
                </ActionMessage>

                <PrimaryButton :class="{ 'opacity-25': createApiTokenForm.processing }" :disabled="createApiTokenForm.processing">
                    Create
                </PrimaryButton>
            </template>
        </FormSection>

        <div v-if="tokens.length > 0">
            <SectionBorder />

            <!-- Manage API Tokens -->
            <div class="mt-10 sm:mt-0">
                <ActionSection>
                    <template #title>
                        Manage API Tokens
                    </template>

                    <template #description>
                        You may delete any of your existing tokens if they are no longer needed.
                    </template>

                    <!-- API Token List -->
                    <template #content>
                        <div class="space-y-6">
                            <div v-for="token in tokens" :key="token.id" class="flex items-center justify-between">
                                <div class="break-all">
                                    {{ token.name }}
                                </div>

                                <div class="flex items-center ms-2">
                                    <div v-if="token.last_used_ago" class="text-sm text-gray-400">
                                        Last used {{ token.last_used_ago }}
                                    </div>

                                    <button
                                        v-if="availablePermissions.length > 0"
                                        class="cursor-pointer ms-6 text-sm text-gray-400 underline"
                                        @click="manageApiTokenPermissions(token)"
                                    >
                                        Permissions
                                    </button>

                                    <button class="cursor-pointer ms-6 text-sm text-red-500" @click="confirmApiTokenDeletion(token)">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>
                </ActionSection>
            </div>
        </div>

        <!-- Token Value Modal -->
        <DialogModal :show="displayingToken" @close="displayingToken = false">
            <template #title>
                API Token
            </template>

            <template #content>
                <div>
                    Please copy your new API token. For your security, it won't be shown again.
                </div>

                <div v-if="$page.props.jetstream.flash.token" class="mt-4 bg-gray-100 px-4 py-2 rounded font-mono text-sm text-gray-500 break-all">
                    {{ $page.props.jetstream.flash.token }}
                </div>
            </template>

            <template #footer>
                <SecondaryButton @click="displayingToken = false">
                    Close
                </SecondaryButton>
            </template>
        </DialogModal>

        <!-- API Token Permissions Modal -->
        <DialogModal :show="managingPermissionsFor != null" @close="managingPermissionsFor = null">
            <template #title>
                API Token Permissions
            </template>

            <template #content>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div v-for="permission in availablePermissions" :key="permission">
                        <label class="flex items-center">
                            <Checkbox v-model:checked="updateApiTokenForm.permissions" :value="permission" />
                            <span class="ms-2 text-sm text-gray-600">{{ permission }}</span>
                        </label>
                    </div>
                </div>
            </template>

            <template #footer>
                <SecondaryButton @click="managingPermissionsFor = null">
                    Cancel
                </SecondaryButton>

                <PrimaryButton
                    class="ms-3"
                    :class="{ 'opacity-25': updateApiTokenForm.processing }"
                    :disabled="updateApiTokenForm.processing"
                    @click="updateApiToken"
                >
                    Save
                </PrimaryButton>
            </template>
        </DialogModal>

        <!-- Delete Token Confirmation Modal -->
        <ConfirmationModal :show="apiTokenBeingDeleted != null" @close="apiTokenBeingDeleted = null">
            <template #title>
                Delete API Token
            </template>

            <template #content>
                Are you sure you would like to delete this API token?
            </template>

            <template #footer>
                <SecondaryButton @click="apiTokenBeingDeleted = null">
                    Cancel
                </SecondaryButton>

                <DangerButton
                    class="ms-3"
                    :class="{ 'opacity-25': deleteApiTokenForm.processing }"
                    :disabled="deleteApiTokenForm.processing"
                    @click="deleteApiToken"
                >
                    Delete
                </DangerButton>
            </template>
        </ConfirmationModal>
    </div>
</template>

```

#### resources/js/Pages/API/Index.vue
```vue
<script setup>
import ApiTokenManager from '@/Pages/API/Partials/ApiTokenManager.vue';
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    tokens: Array,
    availablePermissions: Array,
    defaultPermissions: Array,
});
</script>

<template>
    <AppLayout title="API Tokens">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                API Tokens
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <ApiTokenManager
                    :tokens="tokens"
                    :available-permissions="availablePermissions"
                    :default-permissions="defaultPermissions"
                />
            </div>
        </div>
    </AppLayout>
</template>

```

#### resources/js/Pages/Auth/ConfirmPassword.vue
```vue
<script setup>
import { ref } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    password: '',
});

const passwordInput = ref(null);

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => {
            form.reset();

            passwordInput.value.focus();
        },
    });
};
</script>

<template>
    <Head title="Secure Area" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div class="mb-4 text-sm text-gray-600">
            This is a secure area of the application. Please confirm your password before continuing.
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="password" value="Password" />
                <TextInput
                    id="password"
                    ref="passwordInput"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="current-password"
                    autofocus
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="flex justify-end mt-4">
                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Confirm
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>

```

#### resources/js/Pages/Auth/ForgotPassword.vue
```vue
<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <Head title="Forgot Password" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div class="mb-4 text-sm text-gray-600">
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="username"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Email Password Reset Link
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>

```

#### resources/js/Pages/Auth/Login.vue
```vue
<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Log in" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="username"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />
                <TextInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="current-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox v-model:checked="form.remember" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Forgot your password?
                </Link>

                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>

```

#### resources/js/Pages/Auth/Register.vue
```vue
<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Register" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="name"
                />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autocomplete="username"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />
                <TextInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />
                <TextInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
                <InputLabel for="terms">
                    <div class="flex items-center">
                        <Checkbox id="terms" v-model:checked="form.terms" name="terms" required />

                        <div class="ms-2">
                            I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Privacy Policy</a>
                        </div>
                    </div>
                    <InputError class="mt-2" :message="form.errors.terms" />
                </InputLabel>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Already registered?
                </Link>

                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>

```

#### resources/js/Pages/Auth/ResetPassword.vue
```vue
<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    email: String,
    token: String,
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.update'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Reset Password" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="username"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />
                <TextInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />
                <TextInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Reset Password
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>

```

#### resources/js/Pages/Auth/TwoFactorChallenge.vue
```vue
<script setup>
import { nextTick, ref } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const recovery = ref(false);

const form = useForm({
    code: '',
    recovery_code: '',
});

const recoveryCodeInput = ref(null);
const codeInput = ref(null);

const toggleRecovery = async () => {
    recovery.value ^= true;

    await nextTick();

    if (recovery.value) {
        recoveryCodeInput.value.focus();
        form.code = '';
    } else {
        codeInput.value.focus();
        form.recovery_code = '';
    }
};

const submit = () => {
    form.post(route('two-factor.login'));
};
</script>

<template>
    <Head title="Two-factor Confirmation" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div class="mb-4 text-sm text-gray-600">
            <template v-if="! recovery">
                Please confirm access to your account by entering the authentication code provided by your authenticator application.
            </template>

            <template v-else>
                Please confirm access to your account by entering one of your emergency recovery codes.
            </template>
        </div>

        <form @submit.prevent="submit">
            <div v-if="! recovery">
                <InputLabel for="code" value="Code" />
                <TextInput
                    id="code"
                    ref="codeInput"
                    v-model="form.code"
                    type="text"
                    inputmode="numeric"
                    class="mt-1 block w-full"
                    autofocus
                    autocomplete="one-time-code"
                />
                <InputError class="mt-2" :message="form.errors.code" />
            </div>

            <div v-else>
                <InputLabel for="recovery_code" value="Recovery Code" />
                <TextInput
                    id="recovery_code"
                    ref="recoveryCodeInput"
                    v-model="form.recovery_code"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="one-time-code"
                />
                <InputError class="mt-2" :message="form.errors.recovery_code" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer" @click.prevent="toggleRecovery">
                    <template v-if="! recovery">
                        Use a recovery code
                    </template>

                    <template v-else>
                        Use an authentication code
                    </template>
                </button>

                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>

```

#### resources/js/Pages/Auth/VerifyEmail.vue
```vue
<script setup>
import { computed } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    status: String,
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>
    <Head title="Email Verification" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div class="mb-4 text-sm text-gray-600">
            Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
        </div>

        <div v-if="verificationLinkSent" class="mb-4 font-medium text-sm text-green-600">
            A new verification link has been sent to the email address you provided in your profile settings.
        </div>

        <form @submit.prevent="submit">
            <div class="mt-4 flex items-center justify-between">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Resend Verification Email
                </PrimaryButton>

                <div>
                    <Link
                        :href="route('profile.show')"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Edit Profile</Link>

                    <Link
                        :href="route('logout')"
                        method="post"
                        as="button"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ms-2"
                    >
                        Log Out
                    </Link>
                </div>
            </div>
        </form>
    </AuthenticationCard>
</template>

```

#### resources/js/Pages/Profile/Partials/DeleteUserForm.vue
```vue
<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import ActionSection from '@/Components/ActionSection.vue';
import DangerButton from '@/Components/DangerButton.vue';
import DialogModal from '@/Components/DialogModal.vue';
import InputError from '@/Components/InputError.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    setTimeout(() => passwordInput.value.focus(), 250);
};

const deleteUser = () => {
    form.delete(route('current-user.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.reset();
};
</script>

<template>
    <ActionSection>
        <template #title>
            Delete Account
        </template>

        <template #description>
            Permanently delete your account.
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
            </div>

            <div class="mt-5">
                <DangerButton @click="confirmUserDeletion">
                    Delete Account
                </DangerButton>
            </div>

            <!-- Delete Account Confirmation Modal -->
            <DialogModal :show="confirmingUserDeletion" @close="closeModal">
                <template #title>
                    Delete Account
                </template>

                <template #content>
                    Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.

                    <div class="mt-4">
                        <TextInput
                            ref="passwordInput"
                            v-model="form.password"
                            type="password"
                            class="mt-1 block w-3/4"
                            placeholder="Password"
                            autocomplete="current-password"
                            @keyup.enter="deleteUser"
                        />

                        <InputError :message="form.errors.password" class="mt-2" />
                    </div>
                </template>

                <template #footer>
                    <SecondaryButton @click="closeModal">
                        Cancel
                    </SecondaryButton>

                    <DangerButton
                        class="ms-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                    >
                        Delete Account
                    </DangerButton>
                </template>
            </DialogModal>
        </template>
    </ActionSection>
</template>

```

#### resources/js/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue
```vue
<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import ActionSection from '@/Components/ActionSection.vue';
import DialogModal from '@/Components/DialogModal.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    sessions: Array,
});

const confirmingLogout = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmLogout = () => {
    confirmingLogout.value = true;

    setTimeout(() => passwordInput.value.focus(), 250);
};

const logoutOtherBrowserSessions = () => {
    form.delete(route('other-browser-sessions.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingLogout.value = false;

    form.reset();
};
</script>

<template>
    <ActionSection>
        <template #title>
            Browser Sessions
        </template>

        <template #description>
            Manage and log out your active sessions on other browsers and devices.
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.
            </div>

            <!-- Other Browser Sessions -->
            <div v-if="sessions.length > 0" class="mt-5 space-y-6">
                <div v-for="(session, i) in sessions" :key="i" class="flex items-center">
                    <div>
                        <svg v-if="session.agent.is_desktop" class="size-8 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                        </svg>

                        <svg v-else class="size-8 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                        </svg>
                    </div>

                    <div class="ms-3">
                        <div class="text-sm text-gray-600">
                            {{ session.agent.platform ? session.agent.platform : 'Unknown' }} - {{ session.agent.browser ? session.agent.browser : 'Unknown' }}
                        </div>

                        <div>
                            <div class="text-xs text-gray-500">
                                {{ session.ip_address }},

                                <span v-if="session.is_current_device" class="text-green-500 font-semibold">This device</span>
                                <span v-else>Last active {{ session.last_active }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center mt-5">
                <PrimaryButton @click="confirmLogout">
                    Log Out Other Browser Sessions
                </PrimaryButton>

                <ActionMessage :on="form.recentlySuccessful" class="ms-3">
                    Done.
                </ActionMessage>
            </div>

            <!-- Log Out Other Devices Confirmation Modal -->
            <DialogModal :show="confirmingLogout" @close="closeModal">
                <template #title>
                    Log Out Other Browser Sessions
                </template>

                <template #content>
                    Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.

                    <div class="mt-4">
                        <TextInput
                            ref="passwordInput"
                            v-model="form.password"
                            type="password"
                            class="mt-1 block w-3/4"
                            placeholder="Password"
                            autocomplete="current-password"
                            @keyup.enter="logoutOtherBrowserSessions"
                        />

                        <InputError :message="form.errors.password" class="mt-2" />
                    </div>
                </template>

                <template #footer>
                    <SecondaryButton @click="closeModal">
                        Cancel
                    </SecondaryButton>

                    <PrimaryButton
                        class="ms-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="logoutOtherBrowserSessions"
                    >
                        Log Out Other Browser Sessions
                    </PrimaryButton>
                </template>
            </DialogModal>
        </template>
    </ActionSection>
</template>

```

#### resources/js/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue
```vue
<script setup>
import { ref, computed, watch } from 'vue';
import { router, useForm, usePage } from '@inertiajs/vue3';
import ActionSection from '@/Components/ActionSection.vue';
import ConfirmsPassword from '@/Components/ConfirmsPassword.vue';
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    requiresConfirmation: Boolean,
});

const page = usePage();
const enabling = ref(false);
const confirming = ref(false);
const disabling = ref(false);
const qrCode = ref(null);
const setupKey = ref(null);
const recoveryCodes = ref([]);

const confirmationForm = useForm({
    code: '',
});

const twoFactorEnabled = computed(
    () => ! enabling.value && page.props.auth.user?.two_factor_enabled,
);

watch(twoFactorEnabled, () => {
    if (! twoFactorEnabled.value) {
        confirmationForm.reset();
        confirmationForm.clearErrors();
    }
});

const enableTwoFactorAuthentication = () => {
    enabling.value = true;

    router.post(route('two-factor.enable'), {}, {
        preserveScroll: true,
        onSuccess: () => Promise.all([
            showQrCode(),
            showSetupKey(),
            showRecoveryCodes(),
        ]),
        onFinish: () => {
            enabling.value = false;
            confirming.value = props.requiresConfirmation;
        },
    });
};

const showQrCode = () => {
    return axios.get(route('two-factor.qr-code')).then(response => {
        qrCode.value = response.data.svg;
    });
};

const showSetupKey = () => {
    return axios.get(route('two-factor.secret-key')).then(response => {
        setupKey.value = response.data.secretKey;
    });
}

const showRecoveryCodes = () => {
    return axios.get(route('two-factor.recovery-codes')).then(response => {
        recoveryCodes.value = response.data;
    });
};

const confirmTwoFactorAuthentication = () => {
    confirmationForm.post(route('two-factor.confirm'), {
        errorBag: "confirmTwoFactorAuthentication",
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            confirming.value = false;
            qrCode.value = null;
            setupKey.value = null;
        },
    });
};

const regenerateRecoveryCodes = () => {
    axios
        .post(route('two-factor.recovery-codes'))
        .then(() => showRecoveryCodes());
};

const disableTwoFactorAuthentication = () => {
    disabling.value = true;

    router.delete(route('two-factor.disable'), {
        preserveScroll: true,
        onSuccess: () => {
            disabling.value = false;
            confirming.value = false;
        },
    });
};
</script>

<template>
    <ActionSection>
        <template #title>
            Two Factor Authentication
        </template>

        <template #description>
            Add additional security to your account using two factor authentication.
        </template>

        <template #content>
            <h3 v-if="twoFactorEnabled && ! confirming" class="text-lg font-medium text-gray-900">
                You have enabled two factor authentication.
            </h3>

            <h3 v-else-if="twoFactorEnabled && confirming" class="text-lg font-medium text-gray-900">
                Finish enabling two factor authentication.
            </h3>

            <h3 v-else class="text-lg font-medium text-gray-900">
                You have not enabled two factor authentication.
            </h3>

            <div class="mt-3 max-w-xl text-sm text-gray-600">
                <p>
                    When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone's Google Authenticator application.
                </p>
            </div>

            <div v-if="twoFactorEnabled">
                <div v-if="qrCode">
                    <div class="mt-4 max-w-xl text-sm text-gray-600">
                        <p v-if="confirming" class="font-semibold">
                            To finish enabling two factor authentication, scan the following QR code using your phone's authenticator application or enter the setup key and provide the generated OTP code.
                        </p>

                        <p v-else>
                            Two factor authentication is now enabled. Scan the following QR code using your phone's authenticator application or enter the setup key.
                        </p>
                    </div>

                    <div class="mt-4 p-2 inline-block bg-white" v-html="qrCode" />

                    <div v-if="setupKey" class="mt-4 max-w-xl text-sm text-gray-600">
                        <p class="font-semibold">
                            Setup Key: <span v-html="setupKey"></span>
                        </p>
                    </div>

                    <div v-if="confirming" class="mt-4">
                        <InputLabel for="code" value="Code" />

                        <TextInput
                            id="code"
                            v-model="confirmationForm.code"
                            type="text"
                            name="code"
                            class="block mt-1 w-1/2"
                            inputmode="numeric"
                            autofocus
                            autocomplete="one-time-code"
                            @keyup.enter="confirmTwoFactorAuthentication"
                        />

                        <InputError :message="confirmationForm.errors.code" class="mt-2" />
                    </div>
                </div>

                <div v-if="recoveryCodes.length > 0 && ! confirming">
                    <div class="mt-4 max-w-xl text-sm text-gray-600">
                        <p class="font-semibold">
                            Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.
                        </p>
                    </div>

                    <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
                        <div v-for="code in recoveryCodes" :key="code">
                            {{ code }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <div v-if="! twoFactorEnabled">
                    <ConfirmsPassword @confirmed="enableTwoFactorAuthentication">
                        <PrimaryButton type="button" :class="{ 'opacity-25': enabling }" :disabled="enabling">
                            Enable
                        </PrimaryButton>
                    </ConfirmsPassword>
                </div>

                <div v-else>
                    <ConfirmsPassword @confirmed="confirmTwoFactorAuthentication">
                        <PrimaryButton
                            v-if="confirming"
                            type="button"
                            class="me-3"
                            :class="{ 'opacity-25': enabling || confirmationForm.processing }"
                            :disabled="enabling || confirmationForm.processing"
                        >
                            Confirm
                        </PrimaryButton>
                    </ConfirmsPassword>

                    <ConfirmsPassword @confirmed="regenerateRecoveryCodes">
                        <SecondaryButton
                            v-if="recoveryCodes.length > 0 && ! confirming"
                            class="me-3"
                        >
                            Regenerate Recovery Codes
                        </SecondaryButton>
                    </ConfirmsPassword>

                    <ConfirmsPassword @confirmed="showRecoveryCodes">
                        <SecondaryButton
                            v-if="recoveryCodes.length === 0 && ! confirming"
                            class="me-3"
                        >
                            Show Recovery Codes
                        </SecondaryButton>
                    </ConfirmsPassword>

                    <ConfirmsPassword @confirmed="disableTwoFactorAuthentication">
                        <SecondaryButton
                            v-if="confirming"
                            :class="{ 'opacity-25': disabling }"
                            :disabled="disabling"
                        >
                            Cancel
                        </SecondaryButton>
                    </ConfirmsPassword>

                    <ConfirmsPassword @confirmed="disableTwoFactorAuthentication">
                        <DangerButton
                            v-if="! confirming"
                            :class="{ 'opacity-25': disabling }"
                            :disabled="disabling"
                        >
                            Disable
                        </DangerButton>
                    </ConfirmsPassword>
                </div>
            </div>
        </template>
    </ActionSection>
</template>

```

#### resources/js/Pages/Profile/Partials/UpdatePasswordForm.vue
```vue
<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('user-password.update'), {
        errorBag: 'updatePassword',
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }

            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <FormSection @submitted="updatePassword">
        <template #title>
            Update Password
        </template>

        <template #description>
            Ensure your account is using a long, random password to stay secure.
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="current_password" value="Current Password" />
                <TextInput
                    id="current_password"
                    ref="currentPasswordInput"
                    v-model="form.current_password"
                    type="password"
                    class="mt-1 block w-full"
                    autocomplete="current-password"
                />
                <InputError :message="form.errors.current_password" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="password" value="New Password" />
                <TextInput
                    id="password"
                    ref="passwordInput"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    autocomplete="new-password"
                />
                <InputError :message="form.errors.password" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />
                <TextInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    autocomplete="new-password"
                />
                <InputError :message="form.errors.password_confirmation" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="me-3">
                Saved.
            </ActionMessage>

            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </PrimaryButton>
        </template>
    </FormSection>
</template>

```

#### resources/js/Pages/Profile/Partials/UpdateProfileInformationForm.vue
```vue
<script setup>
import { ref } from 'vue';
import { Link, router, useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    user: Object,
});

const form = useForm({
    _method: 'PUT',
    name: props.user.name,
    email: props.user.email,
    photo: null,
});

const verificationLinkSent = ref(null);
const photoPreview = ref(null);
const photoInput = ref(null);

const updateProfileInformation = () => {
    if (photoInput.value) {
        form.photo = photoInput.value.files[0];
    }

    form.post(route('user-profile-information.update'), {
        errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () => clearPhotoFileInput(),
    });
};

const sendEmailVerification = () => {
    verificationLinkSent.value = true;
};

const selectNewPhoto = () => {
    photoInput.value.click();
};

const updatePhotoPreview = () => {
    const photo = photoInput.value.files[0];

    if (! photo) return;

    const reader = new FileReader();

    reader.onload = (e) => {
        photoPreview.value = e.target.result;
    };

    reader.readAsDataURL(photo);
};

const deletePhoto = () => {
    router.delete(route('current-user-photo.destroy'), {
        preserveScroll: true,
        onSuccess: () => {
            photoPreview.value = null;
            clearPhotoFileInput();
        },
    });
};

const clearPhotoFileInput = () => {
    if (photoInput.value?.value) {
        photoInput.value.value = null;
    }
};
</script>

<template>
    <FormSection @submitted="updateProfileInformation">
        <template #title>
            Profile Information
        </template>

        <template #description>
            Update your account's profile information and email address.
        </template>

        <template #form>
            <!-- Profile Photo -->
            <div v-if="$page.props.jetstream.managesProfilePhotos" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input
                    id="photo"
                    ref="photoInput"
                    type="file"
                    class="hidden"
                    @change="updatePhotoPreview"
                >

                <InputLabel for="photo" value="Photo" />

                <!-- Current Profile Photo -->
                <div v-show="! photoPreview" class="mt-2">
                    <img :src="user.profile_photo_url" :alt="user.name" class="rounded-full size-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div v-show="photoPreview" class="mt-2">
                    <span
                        class="block rounded-full size-20 bg-cover bg-no-repeat bg-center"
                        :style="'background-image: url(\'' + photoPreview + '\');'"
                    />
                </div>

                <SecondaryButton class="mt-2 me-2" type="button" @click.prevent="selectNewPhoto">
                    Select A New Photo
                </SecondaryButton>

                <SecondaryButton
                    v-if="user.profile_photo_path"
                    type="button"
                    class="mt-2"
                    @click.prevent="deletePhoto"
                >
                    Remove Photo
                </SecondaryButton>

                <InputError :message="form.errors.photo" class="mt-2" />
            </div>

            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="name" value="Name" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autocomplete="name"
                />
                <InputError :message="form.errors.name" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autocomplete="username"
                />
                <InputError :message="form.errors.email" class="mt-2" />

                <div v-if="$page.props.jetstream.hasEmailVerification && user.email_verified_at === null">
                    <p class="text-sm mt-2">
                        Your email address is unverified.

                        <Link
                            :href="route('verification.send')"
                            method="post"
                            as="button"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            @click.prevent="sendEmailVerification"
                        >
                            Click here to re-send the verification email.
                        </Link>
                    </p>

                    <div v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                        A new verification link has been sent to your email address.
                    </div>
                </div>
            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="me-3">
                Saved.
            </ActionMessage>

            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </PrimaryButton>
        </template>
    </FormSection>
</template>

```

#### resources/js/Pages/Profile/Show.vue
```vue
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import DeleteUserForm from '@/Pages/Profile/Partials/DeleteUserForm.vue';
import LogoutOtherBrowserSessionsForm from '@/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
import TwoFactorAuthenticationForm from '@/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue';
import UpdatePasswordForm from '@/Pages/Profile/Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from '@/Pages/Profile/Partials/UpdateProfileInformationForm.vue';

defineProps({
    confirmsTwoFactorAuthentication: Boolean,
    sessions: Array,
});
</script>

<template>
    <AppLayout title="Profile">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Profile
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div v-if="$page.props.jetstream.canUpdateProfileInformation">
                    <UpdateProfileInformationForm :user="$page.props.auth.user" />

                    <SectionBorder />
                </div>

                <div v-if="$page.props.jetstream.canUpdatePassword">
                    <UpdatePasswordForm class="mt-10 sm:mt-0" />

                    <SectionBorder />
                </div>

                <div v-if="$page.props.jetstream.canManageTwoFactorAuthentication">
                    <TwoFactorAuthenticationForm
                        :requires-confirmation="confirmsTwoFactorAuthentication"
                        class="mt-10 sm:mt-0"
                    />

                    <SectionBorder />
                </div>

                <LogoutOtherBrowserSessionsForm :sessions="sessions" class="mt-10 sm:mt-0" />

                <template v-if="$page.props.jetstream.hasAccountDeletionFeatures">
                    <SectionBorder />

                    <DeleteUserForm class="mt-10 sm:mt-0" />
                </template>
            </div>
        </div>
    </AppLayout>
</template>

```

#### resources/js/Pages/Dashboard.vue
```vue
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Welcome />
                </div>
            </div>
        </div>
    </AppLayout>
</template>

```

#### resources/js/Pages/PrivacyPolicy.vue
```vue
<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';

defineProps({
    policy: String,
});
</script>

<template>
    <Head title="Privacy Policy" />

    <div class="font-sans text-gray-900 antialiased">
        <div class="pt-4 bg-gray-100">
            <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
                <div>
                    <AuthenticationCardLogo />
                </div>

                <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose" v-html="policy" />
            </div>
        </div>
    </div>
</template>

```

#### resources/js/Pages/TermsOfService.vue
```vue
<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';

defineProps({
    terms: String,
});
</script>

<template>
    <Head title="Terms of Service" />

    <div class="font-sans text-gray-900 antialiased">
        <div class="pt-4 bg-gray-100">
            <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
                <div>
                    <AuthenticationCardLogo />
                </div>

                <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose" v-html="terms" />
            </div>
        </div>
    </div>
</template>

```

#### resources/js/Pages/Welcome.vue
```vue
<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" />
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <div class="flex lg:justify-center lg:col-start-2">
                        <svg class="h-12 w-auto text-white lg:h-16 lg:text-[#FF2D20]" viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257786 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257786 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9193 7.84602C25.9423 7.93096 25.954 8.01853 25.9542 8.10652V33.7317L35.9355 27.9844V14.8846C35.9355 14.7973 35.948 14.7088 35.9704 14.6253C35.9792 14.5954 35.9954 14.5692 36.0053 14.5405C36.0253 14.4882 36.0427 14.4346 36.0702 14.386C36.0888 14.3536 36.1163 14.3274 36.1375 14.2975C36.1674 14.2576 36.1923 14.2165 36.2272 14.1816C36.2559 14.1529 36.292 14.1317 36.3244 14.1068C36.3618 14.0769 36.3942 14.0445 36.4341 14.0208L48.4147 7.12434C48.5663 7.03694 48.7383 6.99094 48.9133 6.99094C49.0883 6.99094 49.2602 7.03694 49.4118 7.12434L61.3899 14.0208C61.4323 14.0457 61.4647 14.0769 61.5021 14.1055C61.5333 14.1305 61.5694 14.1529 61.5981 14.1803C61.633 14.2165 61.6579 14.2576 61.6878 14.2975C61.7103 14.3274 61.7377 14.3536 61.7551 14.386C61.7838 14.4346 61.8 14.4882 61.8199 14.5405C61.8312 14.5692 61.8474 14.5954 61.8548 14.6253ZM59.893 27.9844V16.6121L55.7013 19.0252L49.9104 22.3593V33.7317L59.8942 27.9844H59.893ZM47.9149 48.5566V37.1768L42.2187 40.4299L25.953 49.7133V61.2003L47.9149 48.5566ZM1.99677 9.83281V48.5566L23.9562 61.199V49.7145L12.4841 43.2219L12.4804 43.2194L12.4754 43.2169C12.4368 43.1945 12.4044 43.1621 12.3682 43.1347C12.3371 43.1097 12.3009 43.0898 12.2735 43.0624L12.271 43.0586C12.2386 43.0275 12.2162 42.9888 12.1887 42.9539C12.1638 42.9203 12.1339 42.8916 12.114 42.8567L12.1127 42.853C12.0903 42.8156 12.0766 42.7707 12.0604 42.7283C12.0442 42.6909 12.023 42.656 12.013 42.6161C12.0005 42.5688 11.998 42.5177 11.9931 42.4691C11.9881 42.4317 11.9781 42.3943 11.9781 42.3569V15.5801L6.18848 12.2446L1.99677 9.83281ZM12.9777 2.36177L2.99764 8.10652L12.9752 13.8513L22.9541 8.10527L12.9752 2.36177H12.9777ZM18.1678 38.2138L23.9574 34.8809V9.83281L19.7657 12.2459L13.9749 15.5801V40.6281L18.1678 38.2138ZM48.9133 9.14105L38.9344 14.8858L48.9133 20.6305L58.8909 14.8846L48.9133 9.14105ZM47.9149 22.3593L42.124 19.0252L37.9323 16.6121V27.9844L43.7219 31.3174L47.9149 33.7317V22.3593ZM24.9533 47.987L39.59 39.631L46.9065 35.4555L36.9352 29.7145L25.4544 36.3242L14.9907 42.3482L24.9533 47.987Z" fill="currentColor"/></svg>
                    </div>
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </Link>

                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </Link>

                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </Link>
                        </template>
                    </nav>
                </header>

                <main class="mt-6">
                    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                        <a
                            href="https://laravel.com/docs"
                            id="docs-card"
                            class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                        >
                            <div id="screenshot-container" class="relative flex w-full flex-1 items-stretch">
                                <img
                                    src="https://laravel.com/assets/img/welcome/docs-light.svg"
                                    alt="Laravel documentation screenshot"
                                    class="aspect-video h-full w-full flex-1 rounded-[10px] object-top object-cover drop-shadow-[0px_4px_34px_rgba(0,0,0,0.06)] dark:hidden"
                                    @error="handleImageError"
                                />
                                <img
                                    src="https://laravel.com/assets/img/welcome/docs-dark.svg"
                                    alt="Laravel documentation screenshot"
                                    class="hidden aspect-video h-full w-full flex-1 rounded-[10px] object-top object-cover drop-shadow-[0px_4px_34px_rgba(0,0,0,0.25)] dark:block"
                                />
                                <div
                                    class="absolute -bottom-16 -left-16 h-40 w-[calc(100%+8rem)] bg-gradient-to-b from-transparent via-white to-white dark:via-zinc-900 dark:to-zinc-900"
                                ></div>
                            </div>

                            <div class="relative flex items-center gap-6 lg:items-end">
                                <div id="docs-card-content" class="flex items-start gap-6 lg:flex-col">
                                    <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                        <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><path fill="#FF2D20" d="M23 4a1 1 0 0 0-1.447-.894L12.224 7.77a.5.5 0 0 1-.448 0L2.447 3.106A1 1 0 0 0 1 4v13.382a1.99 1.99 0 0 0 1.105 1.79l9.448 4.728c.14.065.293.1.447.1.154-.005.306-.04.447-.105l9.453-4.724a1.99 1.99 0 0 0 1.1-1.789V4ZM3 6.023a.25.25 0 0 1 .362-.223l7.5 3.75a.251.251 0 0 1 .138.223v11.2a.25.25 0 0 1-.362.224l-7.5-3.75a.25.25 0 0 1-.138-.22V6.023Zm18 11.2a.25.25 0 0 1-.138.224l-7.5 3.75a.249.249 0 0 1-.329-.099.249.249 0 0 1-.033-.12V9.772a.251.251 0 0 1 .138-.224l7.5-3.75a.25.25 0 0 1 .362.224v11.2Z"/><path fill="#FF2D20" d="m3.55 1.893 8 4.048a1.008 1.008 0 0 0 .9 0l8-4.048a1 1 0 0 0-.9-1.785l-7.322 3.706a.506.506 0 0 1-.452 0L4.454.108a1 1 0 0 0-.9 1.785H3.55Z"/></svg>
                                    </div>

                                    <div class="pt-3 sm:pt-5 lg:pt-0">
                                        <h2 class="text-xl font-semibold text-black dark:text-white">Documentation</h2>

                                        <p class="mt-4 text-sm/relaxed">
                                            Laravel has wonderful documentation covering every aspect of the framework. Whether you are a newcomer or have prior experience with Laravel, we recommend reading our documentation from beginning to end.
                                        </p>
                                    </div>
                                </div>

                                <svg class="size-6 shrink-0 stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                            </div>
                        </a>

                        <a
                            href="https://laracasts.com"
                            class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                        >
                            <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><g fill="#FF2D20"><path d="M24 8.25a.5.5 0 0 0-.5-.5H.5a.5.5 0 0 0-.5.5v12a2.5 2.5 0 0 0 2.5 2.5h19a2.5 2.5 0 0 0 2.5-2.5v-12Zm-7.765 5.868a1.221 1.221 0 0 1 0 2.264l-6.626 2.776A1.153 1.153 0 0 1 8 18.123v-5.746a1.151 1.151 0 0 1 1.609-1.035l6.626 2.776ZM19.564 1.677a.25.25 0 0 0-.177-.427H15.6a.106.106 0 0 0-.072.03l-4.54 4.543a.25.25 0 0 0 .177.427h3.783c.027 0 .054-.01.073-.03l4.543-4.543ZM22.071 1.318a.047.047 0 0 0-.045.013l-4.492 4.492a.249.249 0 0 0 .038.385.25.25 0 0 0 .14.042h5.784a.5.5 0 0 0 .5-.5v-2a2.5 2.5 0 0 0-1.925-2.432ZM13.014 1.677a.25.25 0 0 0-.178-.427H9.101a.106.106 0 0 0-.073.03l-4.54 4.543a.25.25 0 0 0 .177.427H8.4a.106.106 0 0 0 .073-.03l4.54-4.543ZM6.513 1.677a.25.25 0 0 0-.177-.427H2.5A2.5 2.5 0 0 0 0 3.75v2a.5.5 0 0 0 .5.5h1.4a.106.106 0 0 0 .073-.03l4.54-4.543Z"/></g></svg>
                            </div>

                            <div class="pt-3 sm:pt-5">
                                <h2 class="text-xl font-semibold text-black dark:text-white">Laracasts</h2>

                                <p class="mt-4 text-sm/relaxed">
                                    Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                                </p>
                            </div>

                            <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                        </a>

                        <a
                            href="https://laravel-news.com"
                            class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                        >
                            <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><g fill="#FF2D20"><path d="M8.75 4.5H5.5c-.69 0-1.25.56-1.25 1.25v4.75c0 .69.56 1.25 1.25 1.25h3.25c.69 0 1.25-.56 1.25-1.25V5.75c0-.69-.56-1.25-1.25-1.25Z"/><path d="M24 10a3 3 0 0 0-3-3h-2V2.5a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2V20a3.5 3.5 0 0 0 3.5 3.5h17A3.5 3.5 0 0 0 24 20V10ZM3.5 21.5A1.5 1.5 0 0 1 2 20V3a.5.5 0 0 1 .5-.5h14a.5.5 0 0 1 .5.5v17c0 .295.037.588.11.874a.5.5 0 0 1-.484.625L3.5 21.5ZM22 20a1.5 1.5 0 1 1-3 0V9.5a.5.5 0 0 1 .5-.5H21a1 1 0 0 1 1 1v10Z"/><path d="M12.751 6.047h2a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-2A.75.75 0 0 1 12 7.3v-.5a.75.75 0 0 1 .751-.753ZM12.751 10.047h2a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-2A.75.75 0 0 1 12 11.3v-.5a.75.75 0 0 1 .751-.753ZM4.751 14.047h10a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-10A.75.75 0 0 1 4 15.3v-.5a.75.75 0 0 1 .751-.753ZM4.75 18.047h7.5a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-7.5A.75.75 0 0 1 4 19.3v-.5a.75.75 0 0 1 .75-.753Z"/></g></svg>
                            </div>

                            <div class="pt-3 sm:pt-5">
                                <h2 class="text-xl font-semibold text-black dark:text-white">Laravel News</h2>

                                <p class="mt-4 text-sm/relaxed">
                                    Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                                </p>
                            </div>

                            <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                        </a>

                        <div class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800">
                            <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <g fill="#FF2D20">
                                        <path
                                            d="M16.597 12.635a.247.247 0 0 0-.08-.237 2.234 2.234 0 0 1-.769-1.68c.001-.195.03-.39.084-.578a.25.25 0 0 0-.09-.267 8.8 8.8 0 0 0-4.826-1.66.25.25 0 0 0-.268.181 2.5 2.5 0 0 1-2.4 1.824.045.045 0 0 0-.045.037 12.255 12.255 0 0 0-.093 3.86.251.251 0 0 0 .208.214c2.22.366 4.367 1.08 6.362 2.118a.252.252 0 0 0 .32-.079 10.09 10.09 0 0 0 1.597-3.733ZM13.616 17.968a.25.25 0 0 0-.063-.407A19.697 19.697 0 0 0 8.91 15.98a.25.25 0 0 0-.287.325c.151.455.334.898.548 1.328.437.827.981 1.594 1.619 2.28a.249.249 0 0 0 .32.044 29.13 29.13 0 0 0 2.506-1.99ZM6.303 14.105a.25.25 0 0 0 .265-.274 13.048 13.048 0 0 1 .205-4.045.062.062 0 0 0-.022-.07 2.5 2.5 0 0 1-.777-.982.25.25 0 0 0-.271-.149 11 11 0 0 0-5.6 2.815.255.255 0 0 0-.075.163c-.008.135-.02.27-.02.406.002.8.084 1.598.246 2.381a.25.25 0 0 0 .303.193 19.924 19.924 0 0 1 5.746-.438ZM9.228 20.914a.25.25 0 0 0 .1-.393 11.53 11.53 0 0 1-1.5-2.22 12.238 12.238 0 0 1-.91-2.465.248.248 0 0 0-.22-.187 18.876 18.876 0 0 0-5.69.33.249.249 0 0 0-.179.336c.838 2.142 2.272 4 4.132 5.353a.254.254 0 0 0 .15.048c1.41-.01 2.807-.282 4.117-.802ZM18.93 12.957l-.005-.008a.25.25 0 0 0-.268-.082 2.21 2.21 0 0 1-.41.081.25.25 0 0 0-.217.2c-.582 2.66-2.127 5.35-5.75 7.843a.248.248 0 0 0-.09.299.25.25 0 0 0 .065.091 28.703 28.703 0 0 0 2.662 2.12.246.246 0 0 0 .209.037c2.579-.701 4.85-2.242 6.456-4.378a.25.25 0 0 0 .048-.189 13.51 13.51 0 0 0-2.7-6.014ZM5.702 7.058a.254.254 0 0 0 .2-.165A2.488 2.488 0 0 1 7.98 5.245a.093.093 0 0 0 .078-.062 19.734 19.734 0 0 1 3.055-4.74.25.25 0 0 0-.21-.41 12.009 12.009 0 0 0-10.4 8.558.25.25 0 0 0 .373.281 12.912 12.912 0 0 1 4.826-1.814ZM10.773 22.052a.25.25 0 0 0-.28-.046c-.758.356-1.55.635-2.365.833a.25.25 0 0 0-.022.48c1.252.43 2.568.65 3.893.65.1 0 .2 0 .3-.008a.25.25 0 0 0 .147-.444c-.526-.424-1.1-.917-1.673-1.465ZM18.744 8.436a.249.249 0 0 0 .15.228 2.246 2.246 0 0 1 1.352 2.054c0 .337-.08.67-.23.972a.25.25 0 0 0 .042.28l.007.009a15.016 15.016 0 0 1 2.52 4.6.25.25 0 0 0 .37.132.25.25 0 0 0 .096-.114c.623-1.464.944-3.039.945-4.63a12.005 12.005 0 0 0-5.78-10.258.25.25 0 0 0-.373.274c.547 2.109.85 4.274.901 6.453ZM9.61 5.38a.25.25 0 0 0 .08.31c.34.24.616.561.8.935a.25.25 0 0 0 .3.127.631.631 0 0 1 .206-.034c2.054.078 4.036.772 5.69 1.991a.251.251 0 0 0 .267.024c.046-.024.093-.047.141-.067a.25.25 0 0 0 .151-.23A29.98 29.98 0 0 0 15.957.764a.25.25 0 0 0-.16-.164 11.924 11.924 0 0 0-2.21-.518.252.252 0 0 0-.215.076A22.456 22.456 0 0 0 9.61 5.38Z"
                                        />
                                    </g>
                                </svg>
                            </div>

                            <div class="pt-3 sm:pt-5">
                                <h2 class="text-xl font-semibold text-black dark:text-white">Vibrant Ecosystem</h2>

                                <p class="mt-4 text-sm/relaxed">
                                    Laravel's robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white dark:focus-visible:ring-[#FF2D20]">Forge</a>, <a href="https://vapor.laravel.com" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Vapor</a>, <a href="https://nova.laravel.com" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Nova</a>, and <a href="https://envoyer.io" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Envoyer</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel.com/docs/billing" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Cashier</a>, <a href="https://laravel.com/docs/dusk" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Dusk</a>, <a href="https://laravel.com/docs/broadcasting" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Echo</a>, <a href="https://laravel.com/docs/horizon" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Horizon</a>, <a href="https://laravel.com/docs/sanctum" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Sanctum</a>, <a href="https://laravel.com/docs/telescope" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Telescope</a>, and more.
                                </p>
                            </div>
                        </div>
                    </div>
                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </footer>
            </div>
        </div>
    </div>
</template>

```

#### resources/js/app.js
```javascript
import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});

```

#### resources/js/bootstrap.js
```javascript
import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

```

#### resources/markdown/policy.md
```md
# Privacy Policy

Edit this file to define the privacy policy for your application.

```

#### resources/markdown/terms.md
```md
# Terms of Service

Edit this file to define the terms of service for your application.

```

#### resources/views/emails/team-invitation.blade.php
```php
@component('mail::message')
{{ __('You have been invited to join the :team team!', ['team' => $invitation->team->name]) }}

@if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::registration()))
{{ __('If you do not have an account, you may create one by clicking the button below. After creating an account, you may click the invitation acceptance button in this email to accept the team invitation:') }}

@component('mail::button', ['url' => route('register')])
{{ __('Create Account') }}
@endcomponent

{{ __('If you already have an account, you may accept this invitation by clicking the button below:') }}

@else
{{ __('You may accept this invitation by clicking the button below:') }}
@endif


@component('mail::button', ['url' => $acceptUrl])
{{ __('Accept Invitation') }}
@endcomponent

{{ __('If you did not expect to receive an invitation to this team, you may discard this email.') }}
@endcomponent

```

#### resources/views/app.blade.php
```php
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>

```

#### routes/api.php
```php
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

```

#### routes/console.php
```php
<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

```

#### routes/web.php
```php
<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

```

#### tests/Feature/ApiTokenPermissionsTest.php
```php
<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
use Tests\TestCase;

class ApiTokenPermissionsTest extends TestCase
{
    use RefreshDatabase;

    public function test_api_token_permissions_can_be_updated(): void
    {
        if (! Features::hasApiFeatures()) {
            $this->markTestSkipped('API support is not enabled.');
        }

        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        $token = $user->tokens()->create([
            'name' => 'Test Token',
            'token' => Str::random(40),
            'abilities' => ['create', 'read'],
        ]);

        $this->put('/user/api-tokens/'.$token->id, [
            'name' => $token->name,
            'permissions' => [
                'delete',
                'missing-permission',
            ],
        ]);

        $this->assertTrue($user->fresh()->tokens->first()->can('delete'));
        $this->assertFalse($user->fresh()->tokens->first()->can('read'));
        $this->assertFalse($user->fresh()->tokens->first()->can('missing-permission'));
    }
}

```

#### tests/Feature/AuthenticationTest.php
```php
<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }
}

```

#### tests/Feature/BrowserSessionsTest.php
```php
<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BrowserSessionsTest extends TestCase
{
    use RefreshDatabase;

    public function test_other_browser_sessions_can_be_logged_out(): void
    {
        $this->actingAs(User::factory()->create());

        $response = $this->delete('/user/other-browser-sessions', [
            'password' => 'password',
        ]);

        $response->assertSessionHasNoErrors();
    }
}

```

#### tests/Feature/CreateApiTokenTest.php
```php
<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Features;
use Tests\TestCase;

class CreateApiTokenTest extends TestCase
{
    use RefreshDatabase;

    public function test_api_tokens_can_be_created(): void
    {
        if (! Features::hasApiFeatures()) {
            $this->markTestSkipped('API support is not enabled.');
        }

        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        $this->post('/user/api-tokens', [
            'name' => 'Test Token',
            'permissions' => [
                'read',
                'update',
            ],
        ]);

        $this->assertCount(1, $user->fresh()->tokens);
        $this->assertEquals('Test Token', $user->fresh()->tokens->first()->name);
        $this->assertTrue($user->fresh()->tokens->first()->can('read'));
        $this->assertFalse($user->fresh()->tokens->first()->can('delete'));
    }
}

```

#### tests/Feature/DeleteAccountTest.php
```php
<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Features;
use Tests\TestCase;

class DeleteAccountTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_accounts_can_be_deleted(): void
    {
        if (! Features::hasAccountDeletionFeatures()) {
            $this->markTestSkipped('Account deletion is not enabled.');
        }

        $this->actingAs($user = User::factory()->create());

        $this->delete('/user', [
            'password' => 'password',
        ]);

        $this->assertNull($user->fresh());
    }

    public function test_correct_password_must_be_provided_before_account_can_be_deleted(): void
    {
        if (! Features::hasAccountDeletionFeatures()) {
            $this->markTestSkipped('Account deletion is not enabled.');
        }

        $this->actingAs($user = User::factory()->create());

        $this->delete('/user', [
            'password' => 'wrong-password',
        ]);

        $this->assertNotNull($user->fresh());
    }
}

```

#### tests/Feature/DeleteApiTokenTest.php
```php
<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
use Tests\TestCase;

class DeleteApiTokenTest extends TestCase
{
    use RefreshDatabase;

    public function test_api_tokens_can_be_deleted(): void
    {
        if (! Features::hasApiFeatures()) {
            $this->markTestSkipped('API support is not enabled.');
        }

        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        $token = $user->tokens()->create([
            'name' => 'Test Token',
            'token' => Str::random(40),
            'abilities' => ['create', 'read'],
        ]);

        $this->delete('/user/api-tokens/'.$token->id);

        $this->assertCount(0, $user->fresh()->tokens);
    }
}

```

#### tests/Feature/EmailVerificationTest.php
```php
<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Laravel\Fortify\Features;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_email_verification_screen_can_be_rendered(): void
    {
        if (! Features::enabled(Features::emailVerification())) {
            $this->markTestSkipped('Email verification not enabled.');
        }

        $user = User::factory()->withPersonalTeam()->unverified()->create();

        $response = $this->actingAs($user)->get('/email/verify');

        $response->assertStatus(200);
    }

    public function test_email_can_be_verified(): void
    {
        if (! Features::enabled(Features::emailVerification())) {
            $this->markTestSkipped('Email verification not enabled.');
        }

        Event::fake();

        $user = User::factory()->unverified()->create();

        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1($user->email)]
        );

        $response = $this->actingAs($user)->get($verificationUrl);

        Event::assertDispatched(Verified::class);

        $this->assertTrue($user->fresh()->hasVerifiedEmail());
        $response->assertRedirect(route('dashboard', absolute: false).'?verified=1');
    }

    public function test_email_can_not_verified_with_invalid_hash(): void
    {
        if (! Features::enabled(Features::emailVerification())) {
            $this->markTestSkipped('Email verification not enabled.');
        }

        $user = User::factory()->unverified()->create();

        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1('wrong-email')]
        );

        $this->actingAs($user)->get($verificationUrl);

        $this->assertFalse($user->fresh()->hasVerifiedEmail());
    }
}

```

#### tests/Feature/ExampleTest.php
```php
<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}

```

#### tests/Feature/PasswordConfirmationTest.php
```php
<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PasswordConfirmationTest extends TestCase
{
    use RefreshDatabase;

    public function test_confirm_password_screen_can_be_rendered(): void
    {
        $user = User::factory()->withPersonalTeam()->create();

        $response = $this->actingAs($user)->get('/user/confirm-password');

        $response->assertStatus(200);
    }

    public function test_password_can_be_confirmed(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/user/confirm-password', [
            'password' => 'password',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }

    public function test_password_is_not_confirmed_with_invalid_password(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/user/confirm-password', [
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors();
    }
}

```

#### tests/Feature/PasswordResetTest.php
```php
<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Laravel\Fortify\Features;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_reset_password_link_screen_can_be_rendered(): void
    {
        if (! Features::enabled(Features::resetPasswords())) {
            $this->markTestSkipped('Password updates are not enabled.');
        }

        $response = $this->get('/forgot-password');

        $response->assertStatus(200);
    }

    public function test_reset_password_link_can_be_requested(): void
    {
        if (! Features::enabled(Features::resetPasswords())) {
            $this->markTestSkipped('Password updates are not enabled.');
        }

        Notification::fake();

        $user = User::factory()->create();

        $this->post('/forgot-password', [
            'email' => $user->email,
        ]);

        Notification::assertSentTo($user, ResetPassword::class);
    }

    public function test_reset_password_screen_can_be_rendered(): void
    {
        if (! Features::enabled(Features::resetPasswords())) {
            $this->markTestSkipped('Password updates are not enabled.');
        }

        Notification::fake();

        $user = User::factory()->create();

        $this->post('/forgot-password', [
            'email' => $user->email,
        ]);

        Notification::assertSentTo($user, ResetPassword::class, function (object $notification) {
            $response = $this->get('/reset-password/'.$notification->token);

            $response->assertStatus(200);

            return true;
        });
    }

    public function test_password_can_be_reset_with_valid_token(): void
    {
        if (! Features::enabled(Features::resetPasswords())) {
            $this->markTestSkipped('Password updates are not enabled.');
        }

        Notification::fake();

        $user = User::factory()->create();

        $this->post('/forgot-password', [
            'email' => $user->email,
        ]);

        Notification::assertSentTo($user, ResetPassword::class, function (object $notification) use ($user) {
            $response = $this->post('/reset-password', [
                'token' => $notification->token,
                'email' => $user->email,
                'password' => 'password',
                'password_confirmation' => 'password',
            ]);

            $response->assertSessionHasNoErrors();

            return true;
        });
    }
}

```

#### tests/Feature/ProfileInformationTest.php
```php
<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileInformationTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile_information_can_be_updated(): void
    {
        $this->actingAs($user = User::factory()->create());

        $this->put('/user/profile-information', [
            'name' => 'Test Name',
            'email' => 'test@example.com',
        ]);

        $this->assertEquals('Test Name', $user->fresh()->name);
        $this->assertEquals('test@example.com', $user->fresh()->email);
    }
}

```

#### tests/Feature/RegistrationTest.php
```php
<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Fortify\Features;
use Laravel\Jetstream\Jetstream;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        if (! Features::enabled(Features::registration())) {
            $this->markTestSkipped('Registration support is not enabled.');
        }

        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_registration_screen_cannot_be_rendered_if_support_is_disabled(): void
    {
        if (Features::enabled(Features::registration())) {
            $this->markTestSkipped('Registration support is enabled.');
        }

        $response = $this->get('/register');

        $response->assertStatus(404);
    }

    public function test_new_users_can_register(): void
    {
        if (! Features::enabled(Features::registration())) {
            $this->markTestSkipped('Registration support is not enabled.');
        }

        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature(),
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));
    }
}

```

#### tests/Feature/TwoFactorAuthenticationSettingsTest.php
```php
<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Fortify\Features;
use Tests\TestCase;

class TwoFactorAuthenticationSettingsTest extends TestCase
{
    use RefreshDatabase;

    public function test_two_factor_authentication_can_be_enabled(): void
    {
        if (! Features::canManageTwoFactorAuthentication()) {
            $this->markTestSkipped('Two factor authentication is not enabled.');
        }

        $this->actingAs($user = User::factory()->create());

        $this->withSession(['auth.password_confirmed_at' => time()]);

        $this->post('/user/two-factor-authentication');

        $this->assertNotNull($user->fresh()->two_factor_secret);
        $this->assertCount(8, $user->fresh()->recoveryCodes());
    }

    public function test_recovery_codes_can_be_regenerated(): void
    {
        if (! Features::canManageTwoFactorAuthentication()) {
            $this->markTestSkipped('Two factor authentication is not enabled.');
        }

        $this->actingAs($user = User::factory()->create());

        $this->withSession(['auth.password_confirmed_at' => time()]);

        $this->post('/user/two-factor-authentication');
        $this->post('/user/two-factor-recovery-codes');

        $user = $user->fresh();

        $this->post('/user/two-factor-recovery-codes');

        $this->assertCount(8, $user->recoveryCodes());
        $this->assertCount(8, array_diff($user->recoveryCodes(), $user->fresh()->recoveryCodes()));
    }

    public function test_two_factor_authentication_can_be_disabled(): void
    {
        if (! Features::canManageTwoFactorAuthentication()) {
            $this->markTestSkipped('Two factor authentication is not enabled.');
        }

        $this->actingAs($user = User::factory()->create());

        $this->withSession(['auth.password_confirmed_at' => time()]);

        $this->post('/user/two-factor-authentication');

        $this->assertNotNull($user->fresh()->two_factor_secret);

        $this->delete('/user/two-factor-authentication');

        $this->assertNull($user->fresh()->two_factor_secret);
    }
}

```

#### tests/Feature/UpdatePasswordTest.php
```php
<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UpdatePasswordTest extends TestCase
{
    use RefreshDatabase;

    public function test_password_can_be_updated(): void
    {
        $this->actingAs($user = User::factory()->create());

        $this->put('/user/password', [
            'current_password' => 'password',
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ]);

        $this->assertTrue(Hash::check('new-password', $user->fresh()->password));
    }

    public function test_current_password_must_be_correct(): void
    {
        $this->actingAs($user = User::factory()->create());

        $response = $this->put('/user/password', [
            'current_password' => 'wrong-password',
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ]);

        $response->assertSessionHasErrors();

        $this->assertTrue(Hash::check('password', $user->fresh()->password));
    }

    public function test_new_passwords_must_match(): void
    {
        $this->actingAs($user = User::factory()->create());

        $response = $this->put('/user/password', [
            'current_password' => 'password',
            'password' => 'new-password',
            'password_confirmation' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors();

        $this->assertTrue(Hash::check('password', $user->fresh()->password));
    }
}

```

#### tests/Unit/ExampleTest.php
```php
<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }
}

```

#### tests/TestCase.php
```php
<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    //
}

```

#### .editorconfig
```editorconfig
root = true

[*]
charset = utf-8
end_of_line = lf
indent_size = 4
indent_style = space
insert_final_newline = true
trim_trailing_whitespace = true

[*.md]
trim_trailing_whitespace = false

[*.{yml,yaml}]
indent_size = 2

[docker-compose.yml]
indent_size = 4

```

#### .env
```env
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:/+qWoWxl2yLa1i0ABXNn0XBJLnOHglgvaAP+bur8K9U=
APP_DEBUG=true
APP_URL=http://localhost

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
# APP_MAINTENANCE_STORE=database

PHP_CLI_SERVER_WORKERS=4

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
# CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_SCHEME=null
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"

```

#### .env.example
```example
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
# APP_MAINTENANCE_STORE=database

PHP_CLI_SERVER_WORKERS=4

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
# CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_SCHEME=null
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"

```

#### .gitattributes
```gitattributes
* text=auto eol=lf

*.blade.php diff=html
*.css diff=css
*.html diff=html
*.md diff=markdown
*.php diff=php

/.github export-ignore
CHANGELOG.md export-ignore
.styleci.yml export-ignore

```

#### .gitignore
```gitignore
/.phpunit.cache
/node_modules
/public/build
/public/hot
/public/storage
/storage/*.key
/storage/pail
/vendor
.env
.env.backup
.env.production
.phpactor.json
.phpunit.result.cache
Homestead.json
Homestead.yaml
npm-debug.log
yarn-error.log
/auth.json
/.fleet
/.idea
/.nova
/.vscode
/.zed

```

#### artisan
```
#!/usr/bin/env php
<?php

use Illuminate\Foundation\Application;
use Symfony\Component\Console\Input\ArgvInput;

define('LARAVEL_START', microtime(true));

// Register the Composer autoloader...
require __DIR__.'/vendor/autoload.php';

// Bootstrap Laravel and handle the command...
/** @var Application $app */
$app = require_once __DIR__.'/bootstrap/app.php';

$status = $app->handleCommand(new ArgvInput);

exit($status);

```

#### composer.json
```javascripton
{
    "$schema": "https://getcomposer.org/schema.json",
    "name": "laravel/laravel",
    "type": "project",
    "description": "The skeleton application for the Laravel framework.",
    "keywords": ["laravel", "framework"],
    "license": "MIT",
    "require": {
        "php": "^8.2",
        "inertiajs/inertia-laravel": "^2.0",
        "laravel/framework": "^12.0",
        "laravel/jetstream": "^5.5",
        "laravel/sanctum": "^4.0",
        "laravel/tinker": "^2.10.1",
        "tightenco/ziggy": "^2.0"
    },
    "require-dev": {
        "fakerphp/faker": "^1.23",
        "laravel/pail": "^1.2.2",
        "laravel/pint": "^1.13",
        "laravel/sail": "^1.41",
        "mockery/mockery": "^1.6",
        "nunomaduro/collision": "^8.6",
        "phpunit/phpunit": "^11.5.3"
    },
    "autoload": {
        "psr-4": {
            "App\\": "app/",
            "Database\\Factories\\": "database/factories/",
            "Database\\Seeders\\": "database/seeders/"
        }
    },
    "autoload-dev": {
        "psr-4": {
            "Tests\\": "tests/"
        }
    },
    "scripts": {
        "post-autoload-dump": [
            "Illuminate\\Foundation\\ComposerScripts::postAutoloadDump",
            "@php artisan package:discover --ansi"
        ],
        "post-update-cmd": [
            "@php artisan vendor:publish --tag=laravel-assets --ansi --force"
        ],
        "post-root-package-install": [
            "@php -r \"file_exists('.env') || copy('.env.example', '.env');\""
        ],
        "post-create-project-cmd": [
            "@php artisan key:generate --ansi",
            "@php -r \"file_exists('database/database.sqlite') || touch('database/database.sqlite');\"",
            "@php artisan migrate --graceful --ansi"
        ],
        "dev": [
            "Composer\\Config::disableProcessTimeout",
            "npx concurrently -c \"#93c5fd,#c4b5fd,#fb7185,#fdba74\" \"php artisan serve\" \"php artisan queue:listen --tries=1\" \"php artisan pail --timeout=0\" \"npm run dev\" --names=server,queue,logs,vite"
        ]
    },
    "extra": {
        "branch-alias": {
            "dev-master": "12.x-dev"
        },
        "laravel": {
            "dont-discover": []
        }
    },
    "config": {
        "optimize-autoloader": true,
        "preferred-install": "dist",
        "sort-packages": true,
        "allow-plugins": {
            "pestphp/pest-plugin": true,
            "php-http/discovery": true
        }
    },
    "minimum-stability": "dev",
    "prefer-stable": true
}

```

#### jsconfig.json
```javascripton
{
    "compilerOptions": {
        "baseUrl": ".",
        "paths": {
            "@/*": ["resources/js/*"]
        }
    },
    "exclude": ["node_modules", "public"]
}

```

#### package.json
```javascripton
{
    "private": true,
    "type": "module",
    "scripts": {
        "build": "vite build",
        "dev": "vite"
    },
    "devDependencies": {
        "@inertiajs/vue3": "^2.0",
        "@tailwindcss/forms": "^0.5.7",
        "@tailwindcss/typography": "^0.5.10",
        "@tailwindcss/vite": "^4.0.0",
        "@vitejs/plugin-vue": "^6.0.4",
        "autoprefixer": "^10.4.16",
        "axios": "^1.7.4",
        "concurrently": "^9.0.1",
        "laravel-vite-plugin": "^1.2.0",
        "postcss": "^8.4.32",
        "tailwindcss": "^3.4.0",
        "vite": "^6.0.11",
        "vue": "^3.3.13"
    }
}

```

#### phpunit.xml
```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:noNamespaceSchemaLocation="vendor/phpunit/phpunit/phpunit.xsd"
         bootstrap="vendor/autoload.php"
         colors="true"
>
    <testsuites>
        <testsuite name="Unit">
            <directory>tests/Unit</directory>
        </testsuite>
        <testsuite name="Feature">
            <directory>tests/Feature</directory>
        </testsuite>
    </testsuites>
    <source>
        <include>
            <directory>app</directory>
        </include>
    </source>
    <php>
        <env name="APP_ENV" value="testing"/>
        <env name="APP_MAINTENANCE_DRIVER" value="file"/>
        <env name="BCRYPT_ROUNDS" value="4"/>
        <env name="CACHE_STORE" value="array"/>
        <!-- <env name="DB_CONNECTION" value="sqlite"/> -->
        <!-- <env name="DB_DATABASE" value=":memory:"/> -->
        <env name="MAIL_MAILER" value="array"/>
        <env name="PULSE_ENABLED" value="false"/>
        <env name="QUEUE_CONNECTION" value="sync"/>
        <env name="SESSION_DRIVER" value="array"/>
        <env name="TELESCOPE_ENABLED" value="false"/>
    </php>
</phpunit>

```

#### postcss.config.js
```javascript
export default {
    plugins: {
        tailwindcss: {},
        autoprefixer: {},
    },
};

```

#### README.md
```md
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

```

#### tailwind.config.js
```javascript
import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography],
};

```

#### vite.config.js
```javascript
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
});

```

