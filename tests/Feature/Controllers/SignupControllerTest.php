<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Verification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SignupControllerTest extends TestCase
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
            'selector' => null
        ]);
        $this->user->register_verified = true;
        $this->user->save();
        Verification::create([
            'password_selector' => null,
            'user_id' => $this->user->id,
        ]);
        $this->signup_data = 
        [
            'nickname' => 'badjick121',
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
            'check-private-policy' => 'on'
        ];
    }

    public function test_signup_page_show()
    {
        $response = $this->get(route('signup'));
        $response->assertStatus(200);
    }

    public function test_signup_page_show_being_auth()
    {
        $response = $this->actingAs($this->user)->get(route('signup'));
        $response->assertStatus(302);
        $response->assertRedirect(route('main'));
    }

    public function test_signup_handler_with_correct_data()
    {
        $response = $this->post(route('signup.handler'), $this->signup_data);
        $response->assertSessionHas('flash', 'На указанный email должна прийти ссылка с подтверждением регистрации и паролем.');
        $response->assertStatus(302);
        $response->assertRedirect(route('signup'));
    }

    public function test_signup_handler_with_empty_fields()
    {
        $response = $this->post(route('signup.handler'),
        [
            'nickname' => '',
            'name' => '',
            'surname' => '',
            'patronymic' => '',
            'email' => '',
            'password' => '',
            'organization' => '',
            'region' => '',
            'city' => '',
            'address' => '',
            'postcode' => '',
            'phone' => '',
        ]);
        $response->assertInvalid(['nickname', 'name', 'surname', 'email', 'region', 'city', 'address', 'postcode', 'phone', 'check-private-policy']);
        $response->assertValid(['patronymic', 'organization']);
        $response->assertStatus(302);
    }

    public function test_signup_handler_with_wrong_phone(){
        $this->signup_data['phone'] = '999';
        $response = $this->post(route('signup.handler'), $this->signup_data);
        $response->assertInvalid(['phone']);
        $response->assertSessionHasErrors([
            'phone' => 'Формат номера телефона неверный.',
        ]);
        $response->assertStatus(302);
    }

    public function test_signup_handler_with_existed_phone_and_email(){
        $this->signup_data['phone'] = $this->phone;
        $this->signup_data['email'] = $this->email;
        $response = $this->post(route('signup.handler'), $this->signup_data);
        $response->assertInvalid(['phone', 'email']);
        $response->assertSessionHasErrors([
            'email' => 'Данный email уже существует.',
            'phone' => 'Данный Номер телефона уже существует.',
        ]);
        $response->assertStatus(302);
    }
}