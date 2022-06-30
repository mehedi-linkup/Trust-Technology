<?php

use App\Models\About;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->text('mission')->nullable();
            $table->text('trams')->nullable();
            $table->string('image');
            $table->timestamps();
        });
        $about = new About();
        $about->description = 'john donne';
        $about->image = '/noimage.png';
        $about->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abouts');
    }
}
