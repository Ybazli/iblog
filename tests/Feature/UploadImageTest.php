<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadImageTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;
    /** @test */
    public function it_upload_image_most_upload_image_and_image_most_be_exists_in_dir()
    {
        $this->loginAsAdmin();
        Storage::fake('disks.public_uploads');

        $response = $this->json('POST', route('posts.image.upload'), [
            'image' => UploadedFile::fake()->image('image.jpg')
        ])->getOriginalContent();

        $this->assertFileExists(public_path($response));

    }
}
