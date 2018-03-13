<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibraryindexTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'Libraryindex';

    /**
     * Run the migrations.
     * @table Libraryindex
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('Id');
            $table->integer('libraryid')->unsigned();
            $table->integer('gameid')->unsigned();

            $table->index(["libraryid"], 'libraryid_idx');

            $table->index(["gameid"], 'gameid_idx');


            $table->foreign('libraryid', 'libraryid_idx')
                ->references('Id')->on('Library')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('gameid', 'gameid_idx')
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
