<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeatsToBusesTable extends Migration
{
    public function up()
    {
        Schema::table('buses', function (Blueprint $table) {
            $table->integer('seats');
        });
    }

    public function down()
    {
        Schema::table('buses', function (Blueprint $table) {
            $table->dropColumn('seats');
        });
    }
}
