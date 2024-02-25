<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('storeId')->unique();
            $table->string('storeName');
            $table->string('siteUrl');
            $table->integer('activationCode');
            $table->boolean('affiliatizerEnabled');
            $table->string('orderConfirmationURLRegex')->nullable();
            $table->string('orderConfirmationDOMRegex')->nullable();
            $table->boolean('icbEnabled');
            $table->string('shoppingURL');
            $table->text('largeLogoUrl')->nullable();
            $table->text('squareLogoUrl')->nullable();
            $table->text('squareLogoInverseUrl')->nullable();
            $table->string('largeLogoBackgroundColor')->nullable();
            $table->string('squareLogoBackgroundColor')->nullable();
            $table->string('squareLogoInverseBackgroundColor')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
