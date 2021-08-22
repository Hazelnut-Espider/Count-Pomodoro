<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;

class TimerTest extends TestCase
{

    private $user;
    
    use DatabaseMigrations;

    public function setUp(): void 
    {
        parent::setUp();
        
        $data = (array) [
            'name' => 'Elder',
            'email' => 'testing@gmail.com',
            'password' => Hash::make('12345678')
        ];

        $this->user = User::create($data);
    }

    
    public function testIfCreated()
    {
        $this->assertEquals('Elder', $this->user->name);
        $this->assertEquals('testing@gmail.com', $this->user->email);
    }

    public function testTotalTimeIsIncreasing()
    {
        $this->user->totalTime++;
        $this->user->save();
        $this->assertEquals(1, $this->user->totalTime);
    }
}
