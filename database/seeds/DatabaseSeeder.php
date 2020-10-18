<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\UserType;
use App\Model\LedgerGroup;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */



    public function run()
    {
        //person_types table data
        UserType::create(['user_type_name' => 'Owner']);
        UserType::create(['user_type_name' => 'Manager']);
        UserType::create(['user_type_name' => 'Manager Sales']);
        UserType::create(['user_type_name' => 'Manager Accounts']);
        UserType::create(['user_type_name' => 'Office Staff']);
        UserType::create(['user_type_name' => 'Worker']);
        UserType::create(['user_type_name' => 'Developer']);
        UserType::create(['user_type_name' => 'Customer']);


        // user
        User::create(['user_name'=>'Arindam Biswas','mobile1'=>'9836444999','mobile2'=>'','email'=>'arindam','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'user_type_id'=>1]);
        //Ledger Groups
        LedgerGroup::insert([
                    ['ledger_group_name'=>'Current Assets'],           //1
                    ['ledger_group_name'=>'Indirect Expenses'],        //2
                    ['ledger_group_name'=>'Current Liabilities'],      //3
                    ['ledger_group_name'=>'Fixed Assets'],             //4
                    ['ledger_group_name'=>'Direct Incomes'],           //5
                    ['ledger_group_name'=>'Indirect Incomes'],         //6
                    ['ledger_group_name'=>'Bank Account'],             //7
                    ['ledger_group_name'=>'Loans & Liabilities'],      //8
                    ['ledger_group_name'=>'Bank OD'],                  //9
                    ['ledger_group_name'=>'Branch & Division'],        //10
                    ['ledger_group_name'=>'Capital Account'],          //11
                    ['ledger_group_name'=>'Direct Expenses'],          //12
                    ['ledger_group_name'=>'Cash in Hand'],             //13
                    ['ledger_group_name'=>'Stock in Hand'],            //14
                    ['ledger_group_name'=>'Sundry Creditors'],         //15
                    ['ledger_group_name'=>'Sundry Debtors'],           //16
                    ['ledger_group_name'=>'Suspense Account'],         //17
                    ['ledger_group_name'=>'Indirect Income'],          //18
                    ['ledger_group_name'=>'Sales Account'],            //19
                    ['ledger_group_name'=>'Duties & Taxes'],           //20
                    ['ledger_group_name'=>'Investment'],               //21
                    ['ledger_group_name'=>'Purchase Account'],         //22
                    ['ledger_group_name'=>'Investments']               //23
                ]);
    }
}


