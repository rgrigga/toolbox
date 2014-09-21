<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
        $this->call('CompanyTableSeeder');
        $this->call('AdminUserSeeder');
        $this->call('RolesTableSeeder');
        $this->call('PermissionsTableSeeder');
        $this->call('PermissionRolesTableSeeder');
        $this->call('AssignedRolesTableSeeder');
        $this->call('ProjectsTableSeeder');
	}

}
