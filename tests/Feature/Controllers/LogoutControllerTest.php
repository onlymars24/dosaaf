<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Verification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LogoutControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    protected $user;
    protected $email;
    protected $nickname;
    protected $password;
    protected $phone;
    protected $csrf;
    protected $signup_data;
    
    protected function setUp(): void{
        parent::setUp();
        $this->email = 'daniba6710@keyido.com';
        $this->nickname = 'badjick12';
        $this->password = 'qwerty1234';
        $this->phone = '999999999999';
        //$this->csrf = csrf_token();
        $this->user = User::create([
            'nickname' => $this->nickname,
            'name' => 'Артём',
            'surname' => 'Баджиев',
            'patronymic' => '',
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'organization' => '',
            'region' => 'Краснодарский край',
            'city' => 'Кропоткин',
            'address' => 'ул. Пушкина, д.12. кв.34',
            'postcode' => '9876564',
            'phone' => $this->phone,
            'remember_token' => Str::random(10),
            'selector' => null,
        ]);
        $this->user->register_verified = true;
        $this->user->save();
        Verification::create([
            'password_selector' => null,
            'user_id' => $this->user->id,
        ]);
        $this->signup_data = 
        [
            'nickname' => 'badjick12',
            'name' => 'Артём',
            'surname' => 'Баджиев',
            'patronymic' => '',
            'email' => 'daniba67101@keyido.com',
            'organization' => '',
            'region' => 'Краснодарский край',
            'city' => 'Кропоткин',
            'address' => 'ул. Пушкина, д.12. кв.34',
            'postcode' => '9876564',
            'phone' => '888888888888',
        ];
    }

    public function test_logout()
    {
        $response = $this->actingAs($this->user)->get(route('logout'));
        $response->assertStatus(302);
        $response->assertRedirect(route('main'));
    }
}
