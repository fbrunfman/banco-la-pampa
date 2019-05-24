<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$rows = [
    		[
	    		'nombre' => 'Anecdotario'
	    	],
	    	[
	    		'nombre' => 'Tu foto cuenta'
	    	],
	    	[
	    		'nombre' => 'Concurso Selfie'
	    	]
    	];

        DB::table('secciones')->insert($rows);
    }
}
