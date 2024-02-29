<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_tag', function (Blueprint $table) {

            $table->foreignId('event_id')->constrained();
            $table->foreignId('tag_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('event_tag', function (Blueprint $table) {

        //     $table->dropForeign('project_technology_project_id_foreign');
        //     $table->dropColumn('project_id');

        //     $table->dropForeign('project_technology_technology_id_foreign');
        //     $table->dropColumn('technology_id');

        // });
    }
};
