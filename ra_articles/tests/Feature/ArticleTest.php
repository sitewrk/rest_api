<?php

namespace Tests\Feature;

use App\Http\Middleware\ApiAuthentication;
use Composer\Config;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleTest extends TestCase
{

    /**
     * HK
     *!!!!!!!!!!!!!!!!
     * Если захочется каждый раз при запуске тестов очищать БД ^^
     *!!!!!!!!!!!!!!!!
     */
    //use RefreshDatabase;

    public function setUp():void {
        parent::setUp();

       // $this->refreshDatabase();
    }

    public function testFalseAuthentication() {
        $response = $this->get('/');
        $response->assertStatus(401);
    }

    public function testTrueAuthentication(){
        $response = $this->get('/', self::getToken());
        $response->assertStatus(200);
    }

    public function testAuthenticationArticles() {
        $response = $this->get('/api/v1/articles');
        $response->assertStatus(401);
    }

    public function testGetArticles(){
       $response = $this->get('/api/v1/articles', self::getToken());
        $response->assertStatus(200);
    }

   /*public function testCreateArticles(){
        $data = [];
        $response = $this->post('/api/v1/articles', $data, self::getToken());
        $response->assertStatus(422);
        $data = [
            'name' => 'Samsung на Exynos или на Snapdragon?',
            'message' => ' Буквально вчера компания Samsung представила десятое поколение смартфонов линейки Note. Как обычно во флагманских смартфонах Samsung, ожидается несколько версий, аппаратно различающихся как объемом постоянной и оперативной памяти, так и версиями чипсетов (процессоров). О том, каким Note 10 получился с точки зрения дизайна, восприятия, и потребительских качеств, вам расскажут мои коллеги.',
            'tags'=>'Galaxy S10'
        ];
        $response = $this->post('/api/v1/articles', $data, self::getToken());
       $response->assertStatus(201);

    }*/

/*
    public function testDeleteArticle(){
        $response = $this->delete('/api/v1/articles/delete/6', self::getToken());
        //$response = $this->get('/api/v1/articles', ['x-api-key' => 'asd']);

        $response->assertStatus(204);
    }*/
   /* public function testUpdateArticle(){
   //     $data = [];
    //    $response = $this->post('/api/v1/articles/4/', $data, self::getToken());
    //    $response->assertStatus(422);
        $data = [
            'name' => 'Ctatya 3',
            'message' => 'trest3 fdsadsadasd asdриятия, и потребительских качеств, вам расскажут мои коллеги.',
            'tags'=>'trest3 apple'
        ];
        $response = $this->put('/api/v1/articles/4', $data, self::getToken());
        $response->assertStatus(204);

    }*/

   /* public function testCreateTags(){
           $data = [];
           $response = $this->post('/api/v1/tags', $data, self::getToken());
           $response->assertStatus(422);
       $data = [
            'tag'=>'dfff'
        ];
        $response = $this->post('/api/v1/tags', $data, self::getToken());
        $response->assertStatus(201);

    }*/
    private static function getToken() {
        // return [ApiAuthentication::API_KEY_HEADER => config('services.api.token')];
        // return [ApiAuthentication::API_KEY_HEADER => config('app.token')];

        return [ApiAuthentication::API_KEY_HEADER => 'asd'];
    }

}
