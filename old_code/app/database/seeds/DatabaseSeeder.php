<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Eloquent::unguard();

        $this->call('Altertable');
    }

}

class Altertable extends Seeder {

    public function run() {
//$tableNames = Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();
//foreach ($tableNames as $name) {
//DB::statement('ALTER TABLE '.$name.' CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci');
//}
//   DB::statement('ALTER TABLE countries change id id INT NOT NULL AUTO_INCREMENT PRIMARY KEY');
//   DB::insert('insert into countries(`id`, `countryid`, `countrycode`, `countrymobilecode`, `countryname`, `currencytype`, `currencysymbol`, `paypalsupport`, `status`, `createdon`, `defaultcurrency`) values (?, ?,?,?,?,?,?,?,?,?,?)', array(215, 'NA', 'US', '+1', 'United States', 'USD', '$', 1, 'active', '2015-05-04 01:00:33', 'No'));
//
//DB::statement('ALTER TABLE users
//ADD COLUMN  `paypalemail` varchar(255) NOT NULL,
//ADD COLUMN  `prooftype` varchar(125) NOT NULL,
//ADD COLUMN  `idproof` varchar(125) NOT NULL,
//ADD COLUMN  `accountverified` tinyint(4) NOT NULL,
//ADD COLUMN `sandbox_stripe_access_token` varchar(255) NOT NULL,
// ADD COLUMN `sandbox_stripe_refresh_token` varchar(255) NOT NULL,
//ADD COLUMN  `sandbox_stripe_publishable_key` varchar(255) NOT NULL,
// ADD COLUMN `sandbox_stripe_user_id` varchar(255) NOT NULL,
// ADD COLUMN `sandbox_stripe_token_type` varchar(255) NOT NULL,
//ADD COLUMN  `live_stripe_access_token` varchar(255) NOT NULL,
// ADD COLUMN `live_stripe_refresh_token` varchar(255) NOT NULL,
//ADD COLUMN  `live_stripe_publishable_key` varchar(255) NOT NULL,
//ADD COLUMN  `live_stripe_user_id` varchar(255) NOT NULL,
//ADD COLUMN  `live_stripe_token_type` varchar(255) NOT NULL,
//ADD COLUMN  `stripe_customerId` varchar(255) NOT NULL');
//
//DB::statement("ALTER TABLE projects
//  ADD COLUMN  `fundingtype` enum('fixed','flexible') NOT NULL,	
// ADD COLUMN  `projectverified` tinyint(4) NOT NULL");
//
//DB::statement('ALTER TABLE newsletters
//ADD COLUMN `subscription` tinyint(4) NOT NULL');
//
//DB::statement('ALTER TABLE backings
// ADD COLUMN `stripecustomerid` varchar(255) NOT NULL,
// ADD COLUMN `stripetoken` varchar(255) NOT NULL,
//ADD COLUMN  `stripechargeid` varchar(255) NOT NULL');
//
//DB::statement('ALTER table backings MODIFY `cardnumber` bigint(125)');
//
// DB::statement('ALTER table sliders ADD COLUMN  `sliderurl` varchar(255) NOT NULL');   
        // DB::statement('ALTER table projects MODIFY `fundinggoal` double');
//        DB::statement('ALTER TABLE adminsettings
//        ADD COLUMN  `facebookaccesstoken` varchar(255) NOT NULL');

        DB::statement('ALTER TABLE `categories` ADD COLUMN `deleted_at` DATETIME NOT NULL');

        DB::statement('ALTER TABLE `projects` ADD COLUMN `deleted_at` DATETIME NOT NULL');

        DB::statement('ALTER TABLE `users` ADD COLUMN `deleted_at` DATETIME NOT NULL');
    }

}
