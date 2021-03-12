<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Admin;
class AdminSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
	$newAdmin = new Admin;
	$newAdmin->name = 'admin';
	$newAdmin->email = 'admin@admin.com';
	$newAdmin->password = Hash::make('password');
	$newAdmin->save();

	}
}
