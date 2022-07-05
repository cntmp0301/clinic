<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrugsListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drugs_lists', function (Blueprint $table) {
            $table->id('drug_id');
            $table->char('drug_name', 50);
            $table->char('cost_price', 50);
            $table->char('sell_price', 50);
            $table->char('item_qty', 50);
            $table->char('description', 50);
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
        Schema::dropIfExists('drugs_lists');
    }
}
