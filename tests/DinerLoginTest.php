<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DinerLoginTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A link to the diner page must be present
     *
     * On the home page there should be a link
     * to a page specifically for diners
     *
     * @return void
     **/
    public function testDinerPageExists()
    {
        $this->visit('/')
             ->click('Diner')
             ->seePageIs('/diner');
    }

    /**
     * A link to the login page must be present
     *
     * On the diner page there should be link
     * to a page specifically for the login
     * of diners.
     *
     * @return void
     **/
    public function testLoginPageExists()
    {
        $this->visit('/diner')
             ->click('Login')
             ->seePageIs('/diner/login');
    }

    /**
     * The login form should authenticate valid
     * credentials
     *
     * The login form should be able to verify
     * correct login details and redirect users
     * to the landing page.
     *
     * The landing page should be able to recognise
     * the user if they have successfuly
     * authenticated.
     *
     * @return void
     **/
    public function testLoginAcceptsCredentials()
    {
        $this->visit('/diner/login')
             ->type('diner@localhost.com', 'email')
             ->type('password', 'password')
             ->press('Sign in')
             ->seePageIs('/diner');

    }

    /**
     * The login form should reject invalid
     * credentials
     *
     * The login form should be able to recognise
     * invalid credentials and display the login
     * form again, to give the user another chance
     * to provide the correct details.
     *
     * @return void
     **/
    public function testDinerRejectsCredentials()
    {
        $this->visit('/diner/login')
             ->type('diner@localhost.com', 'email')
             ->type('wrong password', 'password')
             ->press('Sign in')
             ->seePageIs('/diner');
    }
}