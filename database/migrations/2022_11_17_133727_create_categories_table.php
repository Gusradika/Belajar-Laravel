<?php

use App\Models\category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\post;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};

category::create(['name' => 'Web Design', 'slug' => 'web-design']);

post::create(['category_id' => 1, 'judul' => 'judul satu',  'slug' => 'judul-satu', 'excerpt' => 'wasdsdawdsa', 'body' => '<p>AShiappppppp</p><p>asgasf</p>']);