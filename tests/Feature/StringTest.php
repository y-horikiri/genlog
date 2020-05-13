<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StringTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed('DatabaseSeeder');
    }

    /**
     * @test
     */
    public function 新規弦登録_正常()
    {
        $user = factory(User::class)->create();
        $data = [
            'gear_id' => '1',
            'brand' => 'ダダリオ',
            'gauge_1' => '09',
            'gauge_2' => '11',
            'gauge_3' => '16',
            'gauge_4' => '24',
            'gauge_5' => '32',
            'gauge_6' => '42',
            'change_date' => '2000/01/01',
            'comment' => 'テストコメント',
            'action' => '登録'
        ];
        $response = $this->actingAs($user)->post('/newstring', $data);

        $response->assertRedirect('newstring/complete?gear_id=1');
        $this->assertDatabaseHas('string_histories', [
            'brand' => 'ダダリオ',
            'gauge_1' => '09',
            'gauge_2' => '11',
            'gauge_3' => '16',
            'gauge_4' => '24',
            'gauge_5' => '32',
            'gauge_6' => '42',
            'change_date' => '2000-01-01',
            'comment' => 'テストコメント',
        ]);
    }

    /**
     * @test
     */
    public function 新規弦登録_異常_バリデーションエラー_ブランド()
    {
        $this->get('/newstring?gear_id=1');

        $string = [
            'gear_id' => '1',
            'brand' => '',
            'gauge_1' => '09',
            'gauge_2' => '11',
            'gauge_3' => '16',
            'gauge_4' => '24',
            'gauge_5' => '32',
            'gauge_6' => '42',
            'change_date' => '2000/01/01',
            'comment' => 'テストコメント',
            'action' => '登録'
        ];
        $response = $this->post('/newstring', $string);

        $response->assertRedirect('/newstring?gear_id=1');
        $hoge = $this->get('/newstring?gear_id=1');
        $hoge->assertSee('ブランドを入力してください。');

        $this->assertDatabaseMissing('string_histories', [
            'brand' => '',
            'gauge_1' => '09',
            'gauge_2' => '11',
            'gauge_3' => '16',
            'gauge_4' => '24',
            'gauge_5' => '32',
            'gauge_6' => '42',
            'change_date' => '2000-01-01',
            'comment' => 'テストコメント',
        ]);
    }
}
