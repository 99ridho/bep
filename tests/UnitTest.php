<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UnitTest extends TestCase
{

    // Test jika user tidak memilih type
    public function testRegisterTypeNotSelected() {
        $this->visit(route('register'))
             ->type('test_username1', 'username')
             ->type('123', 'password')
             ->type('aa@gmail.com', 'email')
             ->type('test', 'name')
             ->select('-1', 'type')
             ->press('Sign Up')
             ->see('Error');
    }

    // Test jika user email invalid
    public function testRegisterEmailInvalid() {
        $this->visit(route('register'))
            ->type('test_username123', 'username')
            ->type('123', 'password')
            ->type('aa', 'email')
            ->type('test', 'name')
            ->select('2', 'type')
            ->press('Sign Up')
            ->see('valid');
    }
}
