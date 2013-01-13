<?php

/*
 * Editor server script for DB table venues
 * Automatically generated by http://editor.datatables.net/generator
 */

// DataTables PHP library
include( "lib/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Join,
	DataTables\Editor\Validate;


// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'venues' )
	->fields(
		Field::inst( 'venueID' )
			->set( false ),
		Field::inst( 'name' )
			->validator( 'Validate::required' ),
		Field::inst( 'description' ),
		Field::inst( 'directions' ),
		Field::inst( 'lat' ),
		Field::inst( 'lng' )
	)
	->process( $_POST )
	->json();
