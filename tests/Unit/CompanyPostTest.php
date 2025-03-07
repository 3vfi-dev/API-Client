<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Tests\TestCase;
use TruckersMP\APIClient\Models\CompanyPost;

class CompanyPostTest extends TestCase
{
    /**
     * The ID of the company to use in the tests.
     */
    private const TEST_COMPANY = 2;

    /**
     * The ID of the post to use in the tests.
     */
    private const TEST_POST = 13254;

    /** @test */
    public function it_can_get_all_the_news_posts()
    {
        $posts = $this->companyPosts(self::TEST_COMPANY);

        $this->assertInstanceOf(Collection::class, $posts);

        if ($posts->count() > 0) {
            $post = $posts[0];

            $this->assertInstanceOf(CompanyPost::class, $post);
        }
    }

    /** @test */
    public function it_can_get_a_specific_news_post()
    {
        $post = $this->companyPost(self::TEST_COMPANY, self::TEST_POST);

        $this->assertInstanceOf(CompanyPost::class, $post);
    }

    /** @test */
    public function it_has_an_id()
    {
        $post = $this->companyPost(self::TEST_COMPANY, self::TEST_POST);

        $this->assertIsInt($post->getId());
    }

    /** @test */
    public function it_has_a_title()
    {
        $post = $this->companyPost(self::TEST_COMPANY, self::TEST_POST);

        $this->assertIsString($post->getTitle());
    }

    /** @test */
    public function it_has_a_summary()
    {
        $post = $this->companyPost(self::TEST_COMPANY, self::TEST_POST);

        $this->assertIsString($post->getSummary());
    }

    /** @test */
    public function it_has_a_content()
    {
        $post = $this->companyPost(self::TEST_COMPANY, self::TEST_POST);

        $this->assertIsString($post->getContent());
    }

    /** @test */
    public function it_has_an_author_id()
    {
        $post = $this->companyPost(self::TEST_COMPANY, self::TEST_POST);

        $this->assertIsInt($post->getAuthorId());
    }

    /** @test */
    public function it_has_an_author()
    {
        $post = $this->companyPost(self::TEST_COMPANY, self::TEST_POST);

        $this->assertIsString($post->getAuthor());
    }

    /** @test */
    public function it_is_pinned()
    {
        $post = $this->companyPost(self::TEST_COMPANY, self::TEST_POST);

        $this->assertIsBool($post->isPinned());
    }

    /** @test */
    public function it_has_an_updated_at()
    {
        $post = $this->companyPost(self::TEST_COMPANY, self::TEST_POST);

        $this->assertInstanceOf(Carbon::class, $post->getUpdatedAt());
    }

    /** @test */
    public function it_has_a_published_at()
    {
        $post = $this->companyPost(self::TEST_COMPANY, self::TEST_POST);

        $this->assertInstanceOf(Carbon::class, $post->getPublishedAt());
    }
}
