<?php


namespace appstorage\Country;

use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Country;

class CountryRepository {

    public function all() {
        $country = new Country;
        return $country->orderBy('countryname','asc')->get();
    }

}
