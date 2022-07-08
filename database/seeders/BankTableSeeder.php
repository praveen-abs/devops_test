<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
  
class BankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bank_list')->insert([
            ['bank_name'=> 'ANDHRA BANK', 'min_length' => '15', 'max_length' => '15'],
            ['bank_name'=> 'ANDHRA PRADESH GRAMEENA VIKAS BANK', 'min_length' => '11', 'max_length' => '11'],
            ['bank_name'=> 'ALLAHABAD BANK', 'min_length' => '11', 'max_length' => '11'],
            ['bank_name'=> 'ASSAM GRAMIN VIKASH BANK', 'min_length' => '13', 'max_length' => '13'],
            ['bank_name'=> 'ARYAVART BANK', 'min_length' => '15', 'max_length' => '15'],
            ['bank_name'=> 'AU SMALL FINANCE BANK', 'min_length' => '16', 'max_length' => '16'],
            ['bank_name'=> 'AXIS BANK', 'min_length' => '15', 'max_length' => '15'],
            ['bank_name'=> 'BANDHAN BANK', 'min_length' => '14', 'max_length' => '14'],
            ['bank_name'=> 'BANK OF BARODA', 'min_length' => '14', 'max_length' => '14'],
            ['bank_name'=> 'BANK OF INDIA', 'min_length' => '15', 'max_length' => '15'],
            ['bank_name'=> 'BANK OF MAHARASHTRA', 'min_length' => '11', 'max_length' => '11'],
            ['bank_name'=> 'BARODA RAJASTHAN KSHETRIYA GRAMIN BANK', 'min_length' => '14', 'max_length' => '14'],
            ['bank_name'=> 'BARODA UP GRAMIN BANK', 'min_length' => '11', 'max_length' => '11'],
            ['bank_name'=> 'BANGIYA GRAMIN VIKASH BANK', 'min_length' => '11', 'max_length' => '11'],
            ['bank_name'=> 'CENTRAL BANK OF INDIA', 'min_length' => '10', 'max_length' => '10'],
            ['bank_name'=> 'CANARA BANK', 'min_length' => '13', 'max_length' => '13'],
            ['bank_name'=> 'CATHOLIC SYRIAN BANK', 'min_length' => '18', 'max_length' => '18'],
            ['bank_name'=> 'CITI BANK', 'min_length' => '10', 'max_length' => '10'],
            ['bank_name'=> 'CITY UNION BANK', 'min_length' => '15', 'max_length' => '15'],
            ['bank_name'=> 'CORPORATION BAN', 'min_length' => '	8', 'max_length' => '	8'],
            ['bank_name'=> 'DCB BANK', 'min_length' => '14', 'max_length' => '14'],
            ['bank_name'=> 'DENA BANK', 'min_length' => '12', 'max_length' => '12'],
            ['bank_name'=> 'DHANALAKSHMI BANK', 'min_length' => '16', 'max_length' => '16'],
            ['bank_name'=> 'EQUITAS SMALL FINANCE BANK', 'min_length' => '12', 'max_length' => '12'],
            ['bank_name'=> 'FEDERAL BANK', 'min_length' => '14', 'max_length' => '14'],
            ['bank_name'=> 'HDFC BANK', 'min_length' => '13', 'max_length' => '14'],
            ['bank_name'=> 'HSBC BANK', 'min_length' => '12', 'max_length' => '12'],
            ['bank_name'=> 'ICICI BANK', 'min_length' => '12', 'max_length' => '12'],
            ['bank_name'=> 'IDFC FIRST BANK', 'min_length' => '11', 'max_length' => '11'],
            ['bank_name'=> 'INDIAN BANK', 'min_length' => '	9', 'max_length' => '	9'],
            ['bank_name'=> 'INDIAN OVERSEAS BANK', 'min_length' => '15', 'max_length' => '15'],
            ['bank_name'=> 'INDUSIND BANK', 'min_length' => '13', 'max_length' => '13'],
            ['bank_name'=> 'IDBI BANK', 'min_length' => '13', 'max_length' => '16'],
            ['bank_name'=> 'JAMMU AND KASHMIR BANK', 'min_length' => '16', 'max_length' => '16'],
            ['bank_name'=> 'KARNATAKA BANK', 'min_length' => '16', 'max_length' => '16'],
            ['bank_name'=> 'KARUR VYSYA BANK', 'min_length' => '16', 'max_length' => '16'],
            ['bank_name'=> 'KARNATAKA VIKAS GRAMEENA BANK', 'min_length' => '16', 'max_length' => '16'],
            ['bank_name'=> 'KERALA GRAMIN BANK', 'min_length' => '14', 'max_length' => '14'],
            ['bank_name'=> 'KOTAK MAHINDRA BANK', 'min_length' => '14', 'max_length' => '14'],
            ['bank_name'=> 'LAKSHMI VILAS BANK', 'min_length' => '16', 'max_length' => '16'],
            ['bank_name'=> 'NAINITAL BANK', 'min_length' => '16', 'max_length' => '16'],
            ['bank_name'=> 'MADHYANCHAL GRAMIN BANK', 'min_length' => '10', 'max_length' => '10'],
            ['bank_name'=> 'ORIENTAL BANK OF COMMERCE', 'min_length' => '14', 'max_length' => '14'],
            ['bank_name'=> 'ODISHA GRAMYA BANK', 'min_length' => '11', 'max_length' => '11'],
            ['bank_name'=> 'PUNJAB NATIONAL BANK', 'min_length' => '16', 'max_length' => '16'],
            ['bank_name'=> 'PUNJAB & SIND BANK', 'min_length' => '14', 'max_length' => '14'],
            ['bank_name'=> 'Prathama UP Gramin Bank', 'min_length' => '14', 'max_length' => '14'],
            ['bank_name'=> 'RBL BANK', 'min_length' => '12', 'max_length' => '12'],
            ['bank_name'=> 'RAJASTHAN MARUDHARA GRAMIN BANK', 'min_length' => '12', 'max_length' => '12'],
            ['bank_name'=> 'STANDARD CHARTERED BANK', 'min_length' => '11', 'max_length' => '11'],
            ['bank_name'=> 'STATE BANK OF BIKANER AND JAIPUR', 'min_length' => '11', 'max_length' => '11'],
            ['bank_name'=> 'SAPTAGIRI GRAMIN BANK', 'min_length' => '11', 'max_length' => '11'],
            ['bank_name'=> 'SARVA HARYANA GRAMIN BANK', 'min_length' => '14', 'max_length' => '14'],
            ['bank_name'=> 'STATE BANK OF INDIA', 'min_length' => '11', 'max_length' => '11'],
            ['bank_name'=> 'STATE BANK OF HYDERABAD', 'min_length' => '11', 'max_length' => '11'],
            ['bank_name'=> 'STATE BANK OF TRAVANCORE', 'min_length' => '11', 'max_length' => '11'],
            ['bank_name'=> 'SOUTH INDIAN BANK', 'min_length' => '16', 'max_length' => '16'],
            ['bank_name'=> 'SYNDICATE BANK', 'min_length' => '14', 'max_length' => '14'],
            ['bank_name'=> 'TAMILNADU MERCANTILE BANK', 'min_length' => '6', 'max_length' => '15'],
            ['bank_name'=> 'UNION BANK OF INDIA', 'min_length' => '15', 'max_length' => '15'],
            ['bank_name'=> 'UNITED BANK OF INDIA', 'min_length' => '13', 'max_length' => '13'],
            ['bank_name'=> 'UCO BANK', 'min_length' => '14', 'max_length' => '14'],
            ['bank_name'=> 'UTTAR BIHAR GRAMIN BANK', 'min_length' => '16', 'max_length' => '16'],
            ['bank_name'=> 'UTKAL GRAMEEN BANK', 'min_length' => '12', 'max_length' => '12'],
            ['bank_name'=> 'VIJAYA BANK(Now BoB)', 'min_length' => '15', 'max_length' => '15'],
            ['bank_name'=> 'YES BANK', 'min_length' => '15', 'max_length' => '15'],
        ]);
    }
}