<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Istate extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->truncate();
        $isstausers = [
            "states"=>
            [
              "name" =>  "Andaman and Nicobar Islands"
            ],
            [
                "name" =>  "Andhra Pradesh"
            ],
            [
              "name"=> "Assam"
            ],
            [
              
              "name"=> "Bihar"
            ],
            [
              
              "name"=> "Chandigarh"
            ],
            [
              "name"=> "Chhattisgarh"
            ],
             [
              
              "name"=> "Dadra and Nagar Haveli"
        ],
            [
              
              "name"=> "Daman and Diu"
            ],
            [
              
              "name"=> "Delhi"
            ],
            [
              "code"=> "+1 268",
              "name"=> "Antigua and Barbuda"
            ],
            [
              "name"=> "Goa"
            ],
            [
              "name"=> "Gujarat"
            ],
            [
              "name"=> "Haryana"
            ],
            [
              "name"=> "Himachal Pradesh"
            ],
            [
              "name"=> "Jammu and Kashmir"
            ],
            [
              "name"=> "Jharkhand"
            ],
            [
              "name"=> "Karnataka"
            ],
            [
              "name"=> "Kenmore"
            ],
            [
              "name"=> "Kerala"
            ],
            [
              "name"=> "Lakshadweep"
            ],
            [
              "name"=> "Madhya Pradesh"
            ],
            [
              "name"=> "Maharashtra"
            ],
            [
              "name"=> "Manipur"
            ],
            [
              "name"=> "Meghalaya"
            ],
            [
              
              "name"=> "Mizoram"
            ],
            [
              "name"=> "Nagaland"
            ],
            [
              "name"=> "Narora"
            ],
            [
              "name"=> "Natwar"
            ],
            [
              "name"=> "Odisha"
            ],
            [
              "name"=> "Paschim Medinipur"
            ],
            [
              "name"=> "Pondicherry"
            ],
            [
              "name"=> "Punjab"
            ],
            [
              "name"=> "Rajasthan"
            ],
            [
              "name"=> "Sikkim"
            ],
            [
              "name"=> "Tamil Nadu"
            ],
            [
              "name"=> "Telangana"
            ],
            [
              "name"=> "Tripura"
            ],
            [
              "name"=> "Uttar Pradesh"
            ],
            [
              "name"=> "Uttarakhand"
            ],
            [
              "name"=> "Vaishali"
            ],
            [
              "name"=> "West Bengal"
            ],
            [
              "name"=> "Badakhshan"
            ],
            [
              "name"=> "Badgis"
            ],
            [
              "name"=> "Baglan"
            ],
            [
              "name"=> "Balkh"
            ],
            [
              "name"=> "Bamiyan"
            ],
            [
              "name"=> "Farah"
            ],
            [
              "name"=> "Faryab"
            ],
            [
              "name"=> "Gawr"
            ],
            [
              "name"=> "Gazni"
            ],
            [
              "name"=> "Herat"
            ],
            [
              "name"=> "Hilmand"
            ],
            [
              "name"=> "Jawzjan"
            ],
            [
              "name"=> "Kabul"
            ],
            [
              
              "name"=> "Kapisa"
            ],
            [
              
              "name"=> "Khawst"
            ],
            [
              "name"=> "Kunar"
            ],
            [
              "name"=> "Lagman"
            ],
            [
              
              "name"=> "Lawghar"
            ],
            [
              "name"=> "Nangarhar"
            ],
            [
              "name"=> "Nimruz"
            ],
            [
              "name"=> "Nuristan"
            ],
            [
              "code"=> "+246",
              "name"=> "Diego Garcia"
            ],
            [
              "name"=> "Paktika"
            ],
            [
              "name"=> "Parwan"
            ],
            [
              "name"=> "Qandahar"
            ],
            [
              "name"=> "Qunduz"
            ],
            [
              "name"=> "Samangan"
            ],
            [
              "name"=> "Sar-e Pul"
            ],
            [
              
              "name"=> "Takhar"
            ],
            [
              "name"=> "Uruzgan"
            ],
            [
              "name"=> "Wardag"
            ],
            [
              "name"=> "Zabul"
            ],
            [
              "name"=> "Berat"
            ],
            [
              "name"=> "Bulqize"
            ],
            [
              "name"=> "Delvine"
            ],
            [
              "name"=> "Devoll"
            ],
            [
              "name"=> "Dibre"
            ],
            [
              "name"=> "Durres"
            ],
            [
              "name"=> "Elbasan"
            ],
            [
              "name"=> "Fier"
            ],
            [
              "name"=> "Gjirokaster"
            ],
            [
              "name"=> "Gramsh"
            ],
            [
              "name"=> "Has"
            ],
            [
              "name"=> "Kavaje"
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

    }
}
