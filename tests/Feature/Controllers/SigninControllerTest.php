<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Verification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class SigninControllerTest extends TestCase
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
    protected $csrf;
    
    protected function setUp(): void{
        parent::setUp();
        $this->email = 'daniba6710@keyido.com';
        $this->nickname = 'badjick12';
        $this->password = 'qwerty1234';
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
            'phone' => '999999999999',
            'remember_token' => Str::random(10),
            'selector' => null,
        ]);
        $this->user->register_verified = true;
        $this->user->save();
        Verification::create([
            'password_selector' => null,
            'user_id' => $this->user->id,
        ]);
    }

    public function test_signin_page_show()
    {
        $response = $this->get(route('signin'));
        $response->assertStatus(200);
    }

    public function test_signin_page_show_being_auth()
    {
        $response = $this->actingAs($this->user)->get(route('signin'));
        $response->assertStatus(302);
        $response->assertRedirect(route('main'));
    }

    public function test_signin_handler_with_correct_data()
    {
        $response = $this->post(route('signin.handler'), [

            'nickname' => $this->nickname,
            'password' => $this->password
            
        ]);
        $response->assertStatus(302);
        $this->assertAuthenticated();
        $response->assertRedirect(route('main'));
    }

    public function test_signin_handler_with_wrong_data()
    {
        $response = $this->post(route('signin.handler'), [

            'nickname' => $this->nickname.'1',
            'password' => $this->password.'1'
            
        ]);
        $response->assertStatus(302);
        //$response->assertViewHas('signin');
        $response->assertSessionHas('flash', 'Неправильный логин или пароль.');
        $response->assertRedirect(route('signin'));
    }

    public function test_signin_handler_being_not_verificated()
    {
        $this->user->register_verified = false;
        $this->user->save();
        $response = $this->post(route('signin.handler'), [
            'nickname' => $this->nickname,
            'password' => $this->password
        ]);
        $response->assertStatus(302);
        $response->assertSessionHas('flash', 'Неправильный логин или пароль.');
        $response->assertRedirect(route('signin'));
    }

}