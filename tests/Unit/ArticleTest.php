<?php
declare(strict_types=1);
namespace App\Tests\Unit;

use App\Entity\Article;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    private Article $article;

    public function setUp(): void
    {
        parent::setUp();

        $this->article = new Article();
    }

    public function testGetName() : void
    {
        $value = 'Super name de test';

        $response = $this->article->setName($value);

        self::assertInstanceOf(Article::class, $response);
        self::assertEquals($value, $this->article->getName());
    }

    public function testGetContent() : void
    {
        $value = 'Super content de test';

        $response = $this->article->setContent($value);

        self::assertInstanceOf(Article::class, $response);
        self::assertEquals($value, $this->article->getContent());
    }

    public function testGetAuthor() : void
    {
        $value = new User();

        $response = $this->article->setAuthor($value);

        self::assertInstanceOf(Article::class, $response);
        self::assertInstanceOf(User::class, $this->article->getAuthor());
    }
}