<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	use HasFactory;

	// Primero, definimos los campos que se pueden rellenar
	protected $fillable = [
		'title',
		'body',
		'image',
	];

	// En este paso, vendrian las respectivas reglas de validacion
	public static $createRules = [
		'title' => 'required|min:3|max:255',
		'body' => 'required|min:3',
	];

	public static $updateRules = [
		'title' => 'required|min:3|max:255',
		'body' => 'required|min:3',
	];
}
