<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IsCountry extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->truncate();
        $iscounrtodft = [
            "countries"=>
                [
                  "code" => "+7 840",
                  "name" =>  "Abkhazia"
                ],
                [
                  "code"=> "+93",
                  "name"=> "Afghanistan"
                ],
                [
                  "code"=> "+355",
                  "name"=> "Albania"
                ],
                [
                  "code"=> "+213",
                  "name"=> "Algeria"
                ],
                [
                  "code"=> "+1 684",
                  "name"=> "American Samoa"
                ],
                 [
                  "code"=> "+376",
                  "name"=> "Andorra"
            ],
                [
                  "code"=> "+244",
                  "name"=> "Angola"
                ],
                [
                  "code"=> "+1 264",
                  "name"=> "Anguilla"
                ],
                [
                  "code"=> "+1 268",
                  "name"=> "Antigua and Barbuda"
                ],
                [
                  "code"=> "+54",
                  "name"=> "Argentina"
                ],
                [
                  "code"=> "+374",
                  "name"=> "Armenia"
                ],
                [
                  "code"=> "+297",
                  "name"=> "Aruba"
                ],
                [
                  "code"=> "+247",
                  "name"=> "Ascension"
                ],
                [
                  "code"=> "+61",
                  "name"=> "Australia"
                ],
                [
                  "code"=> "+672",
                  "name"=> "Australian External Territories"
                ],
                [
                  "code"=> "+43",
                  "name"=> "Austria"
                ],
                [
                  "code"=> "+994",
                  "name"=> "Azerbaijan"
                ],
                [
                  "code"=> "+1 242",
                  "name"=> "Bahamas"
                ],
                [
                  "code"=> "+973",
                  "name"=> "Bahrain"
                ],
                [
                  "code"=> "+880",
                  "name"=> "Bangladesh"
                ],
                [
                  "code"=> "+1 246",
                  "name"=> "Barbados"
                ],
                [
                  "code"=> "+1 268",
                  "name"=> "Barbuda"
                ],
                [
                  "code"=> "+375",
                  "name"=> "Belarus"
                ],
                [
                  "code"=> "+32",
                  "name"=> "Belgium"
                ],
                [
                  "code"=> "+501",
                  "name"=> "Belize"
                ],
                [
                  "code"=> "+229",
                  "name"=> "Benin"
                ],
                [
                  "code"=> "+1 441",
                  "name"=> "Bermuda"
                ],
                [
                  "code"=> "+975",
                  "name"=> "Bhutan"
                ],
                [
                  "code"=> "+591",
                  "name"=> "Bolivia"
                ],
                [
                  "code"=> "+387",
                  "name"=> "Bosnia and Herzegovina"
                ],
                [
                  "code"=> "+267",
                  "name"=> "Botswana"
                ],
                [
                  "code"=> "+55",
                  "name"=> "Brazil"
                ],
                [
                  "code"=> "+246",
                  "name"=> "British Indian Ocean Territory"
                ],
                [
                  "code"=> "+1 284",
                  "name"=> "British Virgin Islands"
                ],
                [
                  "code"=> "+673",
                  "name"=> "Brunei"
                ],
                [
                  "code"=> "+359",
                  "name"=> "Bulgaria"
                ],
                [
                  "code"=> "+226",
                  "name"=> "Burkina Faso"
                ],
                [
                  "code"=> "+257",
                  "name"=> "Burundi"
                ],
                [
                  "code"=> "+855",
                  "name"=> "Cambodia"
                ],
                [
                  "code"=> "+237",
                  "name"=> "Cameroon"
                ],
                [
                  "code"=> "+1",
                  "name"=> "Canada"
                ],
                [
                  "code"=> "+238",
                  "name"=> "Cape Verde"
                ],
                [
                  "code"=> "+ 345",
                  "name"=> "Cayman Islands"
                ],
                [
                  "code"=> "+236",
                  "name"=> "Central African Republic"
                ],
                [
                  "code"=> "+235",
                  "name"=> "Chad"
                ],
                [
                  "code"=> "+56",
                  "name"=> "Chile"
                ],
                [
                  "code"=> "+86",
                  "name"=> "China"
                ],
                [
                  "code"=> "+61",
                  "name"=> "Christmas Island"
                ],
                [
                  "code"=> "+61",
                  "name"=> "Cocos-Keeling Islands"
                ],
                [
                  "code"=> "+57",
                  "name"=> "Colombia"
                ],
                [
                  "code"=> "+269",
                  "name"=> "Comoros"
                ],
                [
                  "code"=> "+242",
                  "name"=> "Congo"
                ],
                [
                  "code"=> "+243",
                  "name"=> "Congo, Dem. Rep. of (Zaire)"
                ],
                [
                  "code"=> "+682",
                  "name"=> "Cook Islands"
                ],
                [
                  "code"=> "+506",
                  "name"=> "Costa Rica"
                ],
                [
                  "code"=> "+385",
                  "name"=> "Croatia"
                ],
                [
                  "code"=> "+53",
                  "name"=> "Cuba"
                ],
                [
                  "code"=> "+599",
                  "name"=> "Curacao"
                ],
                [
                  "code"=> "+537",
                  "name"=> "Cyprus"
                ],
                [
                  "code"=> "+420",
                  "name"=> "Czech Republic"
                ],
                [
                  "code"=> "+45",
                  "name"=> "Denmark"
                ],
                [
                  "code"=> "+246",
                  "name"=> "Diego Garcia"
                ],
                [
                  "code"=> "+253",
                  "name"=> "Djibouti"
                ],
                [
                  "code"=> "+1 767",
                  "name"=> "Dominica"
                ],
                [
                  "code"=> "+1 809",
                  "name"=> "Dominican Republic"
                ],
                [
                  "code"=> "+670",
                  "name"=> "East Timor"
                ],
                [
                  "code"=> "+56",
                  "name"=> "Easter Island"
                ],
                [
                  "code"=> "+593",
                  "name"=> "Ecuador"
                ],
                [
                  "code"=> "+20",
                  "name"=> "Egypt"
                ],
                [
                  "code"=> "+503",
                  "name"=> "El Salvador"
                ],
                [
                  "code"=> "+240",
                  "name"=> "Equatorial Guinea"
                ],
                [
                  "code"=> "+291",
                  "name"=> "Eritrea"
                ],
                [
                  "code"=> "+372",
                  "name"=> "Estonia"
                ],
                [
                  "code"=> "+251",
                  "name"=> "Ethiopia"
                ],
                [
                  "code"=> "+500",
                  "name"=> "Falkland Islands"
                ],
                [
                  "code"=> "+298",
                  "name"=> "Faroe Islands"
                ],
                [
                  "code"=> "+679",
                  "name"=> "Fiji"
                ],
                [
                  "code"=> "+358",
                  "name"=> "Finland"
                ],
                [
                  "code"=> "+33",
                  "name"=> "France"
                ],
                [
                  "code"=> "+596",
                  "name"=> "French Antilles"
                ],
                [
                  "code"=> "+594",
                  "name"=> "French Guiana"
                ],
                [
                  "code"=> "+689",
                  "name"=> "French Polynesia"
                ],
                [
                  "code"=> "+241",
                  "name"=> "Gabon"
                ],
                [
                  "code"=> "+220",
                  "name"=> "Gambia"
                ],
                [
                  "code"=> "+995",
                  "name"=> "Georgia"
                ],
                [
                  "code"=> "+49",
                  "name"=> "Germany"
                ],
                [
                  "code"=> "+233",
                  "name"=> "Ghana"
                ],
                [
                  "code"=> "+350",
                  "name"=> "Gibraltar"
                ],
                [
                  "code"=> "+30",
                  "name"=> "Greece"
                ],
                [
                  "code"=> "+299",
                  "name"=> "Greenland"
                ],
                [
                  "code"=> "+1 473",
                  "name"=> "Grenada"
                ],
                [
                  "code"=> "+590",
                  "name"=> "Guadeloupe"
                ],
                [
                  "code"=> "+1 671",
                  "name"=> "Guam"
                ],
                [
                  "code"=> "+502",
                  "name"=> "Guatemala"
                ],
                [
                  "code"=> "+224",
                  "name"=> "Guinea"
                ],
                [
                  "code"=> "+245",
                  "name"=> "Guinea-Bissau"
                ],
                [
                  "code"=> "+595",
                  "name"=> "Guyana"
                ],
                [
                  "code"=> "+509",
                  "name"=> "Haiti"
                ],
                [
                  "code"=> "+504",
                  "name"=> "Honduras"
                ],
                [
                  "code"=> "+852",
                  "name"=> "Hong Kong SAR China"
                ],
        ];
        Country::insert($iscounrtodft);
    }
}
