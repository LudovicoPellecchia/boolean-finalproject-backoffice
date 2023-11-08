<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class DropReviewUserTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('review_user');
    }

    public function down()
    {
    }
}
