<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testSave()
    {
    	$user = factory(\App\User::class)->make();
        $user->save();
        $profile = factory(\App\Profile::class)->make();
        $profile->user()->associate($user);
        $this->assertTrue($profile->save());
    }
   
    /**
     * A basic unit test To save Question.
     *
     * @return void
     */
    public function testQuestionSave()
    {
        $user = factory(\App\User::class)->make();
        $this->assertTrue(is_object($user->questions()->get()));
    }

     /**
     * A basic unit test To save Answers relationship with User.
     *
     * @return void
     */
    public function testAnswers()
    {
        $user = factory(\App\User::class)->make();
        $this->assertTrue(is_object($user->answers()->get()));
    }

}
