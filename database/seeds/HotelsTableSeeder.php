// database/seeds/HotelsTableSeeder.php

<?php

use Illuminate\Database\Seeder;
use \App\User;

class HotelsTableSeeder extends Seeder
{

  public function run()
  {
    DB::table('users')->delete();
    User::create(array(
      'username' => 'admin',
      'email'    => 'admin@admin.com',
      'password' => Hash::make('admin'),
    ));
  }

}
