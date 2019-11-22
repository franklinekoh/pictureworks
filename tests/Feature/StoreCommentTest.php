<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreCommentTest extends TestCase
{

    /** @test */
    public function it_returns_ok_on_json_post_successfully_appending_a_new_comment(){

        $data = [
            'id' => 1,
            'password' => '720DF6C2482218518FA20FDC52D4DED7ECC043AB',
            'comments' => 'This is the best comment'
        ];

        $response =$this->postJson('/comment', $data, $this->defaultHeaders);

        $response->assertStatus(200)
            ->assertSeeText("OK");

    }

    /** @test */
    public function it_returns_ok_on_form_field_post_successfully_appending_a_new_comment(){

        $data = [
            'id' => 1,
            'password' => '720DF6C2482218518FA20FDC52D4DED7ECC043AB',
            'comments' => 'This is the best comment'
        ];

        $response =$this->post('/comment', $data, $this->defaultHeaders);

        $response->assertStatus(200)
            ->assertSeeText("OK");

    }

    /** @test */
    public function it_returns_validation_error(){

        $data = [
            'id' => 1,
            'comments' => ''
        ];

        $response =$this->postJson('/comment', $data, $this->defaultHeaders);

        $response->assertStatus(422)
            ->assertJson([
                'errors' => [
                    "Missing key/value for comments",
                    "Missing key/value for password"
                ]
            ]);

    }

    /** @test */
    public function it_returns_incorrect_password(){

        $data = [
            'id' => 1,
            'comments' => 'This is the best comment',
            'password' => 'secret'
        ];

        $response =$this->postJson('/comment', $data, $this->defaultHeaders);
        $response->assertStatus(401)
            ->assertSeeText("Invalid password");

    }
}
