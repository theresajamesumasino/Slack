<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStubColumnToFieldType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('field_types', function (Blueprint $table) {
			$table->string('stub')->nullable();
        });

	    \App\FieldType::where('name', 'Text Input')->update(['stub' => 'TextInputControl']);
	    \App\FieldType::where('name', 'Text Area')->update(['stub' => 'TextAreaControl']);
	    \App\FieldType::where('name', 'Color Control')->update(['stub' => 'ColorPickerControl']);
	    \App\FieldType::where('name', 'Upload Control')->update(['stub' => 'UploadControl']);
	    \App\FieldType::where('name', 'Image Control')->update(['stub' => 'ImageControl']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::table('field_types', function (Blueprint $table) {
		    $table->dropColumn('stub');
	    });
    }
}
