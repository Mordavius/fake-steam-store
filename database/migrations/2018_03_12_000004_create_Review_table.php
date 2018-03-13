<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'Review';

    /**
     * Run the migrations.
     * @table Review
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('Id');
            $table->integer('rating');
            $table->longText('description');
            $table->integer('userid')->unsigned();
            $table->integer('gameid')->unsigned();
            $table->integer('helpful');
            $table->integer('nothelpful');
            $table->integer('funny');

            $table->index(["userid"], 'userid_idx');

            $table->index(["gameid"], 'gameid_idx');


            $table->foreign('userid', 'userid_idx')
                ->references('id')->on('Users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('gameid', 'gameidrev_idx')
                ->references('id')->on('Games')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
