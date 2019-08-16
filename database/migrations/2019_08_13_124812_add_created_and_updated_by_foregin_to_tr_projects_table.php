<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreatedAndUpdatedByForeginToTrProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \App\Project::truncate();

        Schema::table('tr_projects', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->foreign('created_by') // foreign key column name.
                ->references('id') // parent table primary key.
                ->on('users') // parent table name.
                ->onDelete('cascade');
            $table->foreign('updated_by') // foreign key column name.
                ->references('id') // parent table primary key.
                ->on('users') // parent table name.
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tr_projects', function (Blueprint $table) {
            $table->dropForeign(['created_by']); // drop the foreign key.
            $table->dropColumn('created_by'); // drop the column

            $table->dropForeign(['updated_by']); // drop the foreign key.
            $table->dropColumn('updated_by'); // drop the column
        });
    }
}
