<?php

namespace Tests\Feature;

//use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
class UserTest extends TestCase
{

    //use RefreshDatabase;
    public function test_login_redirect_to_dashboard()
    {
    $response = $this->get('/login');

    $response->assertStatus(200);
    }

    public function test_login_redirect_to_dashboard_successfuly()
    {
    User::factory()->create([
        'email' => 'test@test.com.br',
    'password' => bcrypt('12345678')]);

        $response = $this->post('/login', [
            'email' => 'test@test.com.br',
            'password' => '12345678',
        ]);
    
        $response->assertStatus(302);   
   
        $response->assertRedirect('/dashboard');
      
   
    }

    public function test_auth_con_access_dashboard()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertStatus(200);
    }
/*
    public function test_unath_user_cannot_access_dashboard()
    {
        $response = $this->get('/dashboard');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
*/
    public function test_user_has_name_attribute()
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
        ]);

        $this->assertEquals('John Doe', $user->name);
        

    }
}
