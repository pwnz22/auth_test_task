<?php

use Illuminate\Database\Seeder;

class ContactsSeeder extends Seeder
{

    public function run()
    {
        factory(App\Models\Contact::class, 15)->create();
    }
}
