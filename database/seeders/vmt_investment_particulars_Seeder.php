<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class vmt_investment_particulars_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vmt_investment_particulars')->insert([
            ['id' => '1', 'particular_name' => 'Vehicle Reimbursement' ,'references' => 'If Cubic Capacity is below 1.6 ltrs (1600CC) expenses can be considered upto 1800pm & If Cubic Capacity is above 1.6 ltrs then  expenses can be considered upto 2400pm' , 'amount_max_limit' => '28800'],
            ['id' => '2', 'particular_name' => 'Driver Reimbursement' ,'references' => 'Maximum exemption will be restricted to Rs.900/- per month or amount paid under CTC  whichever is less.' , 'amount_max_limit' => '10800'],
            ['id' => '3', 'particular_name' => 'Telephone Reimbursement' ,'references' => 'Exemption will be restricted to the extend of bills provided or as per CTC, whichever is less. Maximum amount of exemption is ' , 'amount_max_limit' => '36000'],
            ['id' => '4', 'particular_name' => 'House Rent Allowance' ,'references' => 'Exemption will be provide the Least of:
            a) Actual HRA paid
            b) Rent paid subtract (-)10% of Basic salary
            c) for Metro 50% of Basic salary (Mumbai, Kolkata, Delhi or Chennai)
            For non metro 40% of Basic salary ' , 'amount_max_limit' => ''],
            ['id' => '5', 'particular_name' => 'Children Education Allowance' ,'references' => 'Up to Rs. 100 per month per child up to a maximum of 2 children is exempt' , 'amount_max_limit' => '2400'],
            ['id' => '6', 'particular_name' => 'Hostel Expenditure Allowance' ,'references' => 'Up to Rs. 300 per month per child up to a maximum of 2 children is exempt' , 'amount_max_limit' => '7200'],
            ['id' => '7', 'particular_name' => 'Leave Travel Allowance' ,'references' => 'a) The exemption shall be limited to fare for going anywhere in India along with family twice in a block of four years: b) Current Block Years – 2022 – 2025·            c) Two journeys in a block of 4 calendar years is exempt.  d) Exemption limit where journey is performed by Air - Air fare of economy class in the National Carrier by the shortest route or the amount spent, whichever is less. e) Exemption limit where journey is performed by Rail - Air-conditioned first class rail fare by the shortest route or the amount spent, whichever is less. f) Exemption limit if places of origin of journey and destination are connected by rail but the journey is performed by any other mode of transport - Air-conditioned first class rail fare by the shortest route or the amount spent, whichever is less. g) LTA Includes family  means : Spouse, Children, Parents, brothers and sisters wholly or mainly dependent on the individual ' , 'amount_max_limit' => 'one month of Basic'],
            ['id' => '8', 'particular_name' => 'Previous Employer Gross' ,'references' => 'Please refer "Gross Income" in your last month Tax Sheet provided by your previous employer' , 'amount_max_limit' => 'Actual'],
            ['id' => '9', 'particular_name' => 'Previous Employer Standard Deduction' ,'references' => 'Please refer "Standard Deduction Column" in your last month Tax Sheet provided by your previous employer' , 'amount_max_limit' => 'Actual'],
            ['id' => '10', 'particular_name' => 'Previous Employer PT' ,'references' => 'Please refer "Profession Tax" in your last month Tax Sheet provided by your previous employer' , 'amount_max_limit' => 'Actual'],
            ['id' => '11', 'particular_name' => 'Previous Employer PF' ,'references' => ' Please refer "Employee PF Deduction" in your last month Tax Sheet provided by your previous employer' , 'amount_max_limit' => 'Actual'],
            ['id' => '12', 'particular_name' => 'Previous Employer TDS' ,'references' => ' Please refer "TDS Deducted" in your last month Tax Sheet provided by your previous employer' , 'amount_max_limit' => 'Actual'],
            ['id' => '13', 'particular_name' => 'Income earned from other sources' ,'references' => ' Income earned from other sources within the financial year' , 'amount_max_limit' => 'Actual'],
            ['id' => '14', 'particular_name' => 'Interest from Savings' ,'references' => ' Interest income earned from a saving account, Post office and FD' , 'amount_max_limit' => 'Actual'],
            ['id' => '15', 'particular_name' => 'Interest from Savings' ,'references' => ' Interest income earned from a saving account, Post office and FD Senior Citizen' , 'amount_max_limit' => 'Actual'],
            ['id' => '16', 'particular_name' => 'Self Occupied Property' ,'references' => ' Exemption on Interest on Housing Property:

            a) House Property – Self – Maximum limit of Rs.200000/- is eligible.
            b) House Property – Deemed Let-out – (Nominal Rent Received – Municipal Tax)- 30% of (Rent Received – Municipal Tax) – Interest Amount (Maximum Limit up to Rs.200000 ) after considering the calculation
            c) House Property – Let-out – (Rent Received – Municipal Tax)- 30% of (Rent Received – Municipal Tax) – Interest Amount. Interest Amount (Maximum Limit up to Rs.200000 ) after considering the calculation' , 'amount_max_limit' => '200000'],
            ['id' => '17', 'particular_name' => 'Employee PF (Deducted from Salary)' ,'references' => ' Employee’s PF contribution is eligible for deduction under section 80C of Income tax Act. This means that your PF contribution is exempted under section 80C. Maximum exemption of 1.5 lakh per annum is fixed for all investments under Section 80C.' , 'amount_max_limit' => '150000'],
            ['id' => '18', 'particular_name' => 'Voluntary Provident Fund (Deducted from Salary)' ,'references' => ' Employee’s VPF contribution is eligible for deduction under section 80C of Income tax Act. This means that your VPF contribution is exempted under section 80C. Maximum exemption of 1.5 lakh per annum is fixed for all investments under Section 80C.' , 'amount_max_limit' => '150000'],
            ['id' => '19', 'particular_name' => 'Public Provident Fund' ,'references' => 'All deposits made in Public Provident Fund (PPF) are deductible under Section 80C of the Income Tax Act. Also, the accumulated amount and interest is exempted from tax at the time of withdrawal.' , 'amount_max_limit' => '15000'],
            ['id' => '20', 'particular_name' => 'Previous PF' ,'references' => 'Provident Fund deducted by the previous Employer' , 'amount_max_limit' => '150000'],
            ['id' => '21', 'particular_name' => 'Life Insurance Policy' ,'references' => 'You can claim deduction from your taxable income on account of premium paid towards life insurance for self, spouse or children. In case of insurance policies issued on or after 1st April, 2012, deduction of 10% of the sum assured will be allowed up to a maximum of Rs. 1.5 lac.' , 'amount_max_limit' => '150000'],
            ['id' => '22', 'particular_name' => 'Housing Loan Principal' ,'references' => 'For Home Loan, u/s 80C, deduction upto Rs. 1,50,000 is allowed on Principal repayment, stamp duty & registration charges, in the year in which actual principal amount is pai' , 'amount_max_limit' => '150000'],
            ['id' => '23', 'particular_name' => 'Mutual Funds' ,'references' => 'Investment in mutual funds for tax saving purpose is called Equity Linked Saving Schemes (ELSS) which qualifies for Section 80C deduction. Not all mutual funds can provide 80C deduction. Examples of ELSS: SBI Magnum Tax Gain, HDFC Tax Saver, Fidelity Tax Advantage, etc.' , 'amount_max_limit' => '150000'],
            ['id' => '24', 'particular_name' => 'National Saving Certificate' ,'references' => 'The National Savings Certificate (NSC) is an investment scheme floated by the Government of India. It offers guaranteed interest and capital protection. NSC can be bought from most post offices in India, and is easily accessible. Investments of up to Rs 1.5 lakh in the scheme qualifies for deduction u/s 80C of the Income Tax Act. Furthermore, the interest earned on the certificates are also added back to the initial investment and qualify for a tax exemption as well.' , 'amount_max_limit' => '150000'],
            ['id' => '25', 'particular_name' => 'Unit Linked Investment Plan' ,'references' => 'Unit Linked Insurance Plan (ULIP) is a combination of insurance and investment. The goal of ULIP is to provide wealth creation along with life cover. ULIP provider invests a portion of your investment towards life insurance and rest into a fund. All ULIPs qualify as life insurance policy and the premiums are exempted from income tax benefit. Deduction is available on ULIPS under Section 80C, provided the sum assured is at least 10 times the annual premium.' , 'amount_max_limit' => '150000'],
            ['id' => '26', 'particular_name' => 'Tuition Fees' ,'references' => 'Any amount paid as tuition fee for the education of the first two children of the employee/tax payer is eligible for deduction u/s 80C of Income Tax Act. A parent can claim a deduction on the amount paid as tuition fees to any university, college, school or any other educational institution. Other components of fees such as development fees, transport fees are not eligible for deduction u/s 80C. Only tuition fees part of the total fees paid is allowed for deduction.' , 'amount_max_limit' => '150000'],
            ['id' => '27', 'particular_name' => 'Fixed Deposit' ,'references' => 'The amount invested in Scheduled Bank FD is exempted u/s 80C of the Income Tax Act. There is a compulsory lock-in of five years under Scheduled Bank FD and the fund cannot be withdrawn before completion of the period. Also, the interest earned under an FD is taxable under "income from other sources".' , 'amount_max_limit' => '150000'],
            ['id' => '28', 'particular_name' => 'Post Office Deposit' ,'references' => 'Post Office Time Deposit is one of the Post Office scheme and is similar to fixed deposit in bank. Time deposit of 5 years is eligible for tax rebate under 80C of Income Tax Act. Interest earned under Post Office Time Deposit would be taxable.' , 'amount_max_limit' => '150000'],
            ['id' => '29', 'particular_name' => 'Deferred Annuity' ,'references' => 'Sum paid under non-commutable deferred annuity for an individual on the life of the taxpayer, spouse or any child is allowed for deduction. This is nothing but a standard pension plan eligible for tax exemption under Section 80C. Example of such schemes are, Jeevan Dhara, Jeevan Akshay, Jeeven Suraksha etc. by LIC or Pension Plus plan by HDFC Standard Life.' , 'amount_max_limit' => '150000'],
            ['id' => '30', 'particular_name' => 'Super Annuation Fund' ,'references' => 'A superannuation fund is a retirement fund offered by your employer. The employer contributes 15% of your basic salary to this fund. It is not mandatory for you as an employee to contribute to the fund, but you may do so if you wish. Employee’s contribution is exempt from taxation u/s 80C of Income Tax Act.' , 'amount_max_limit' => '150000'],
            ['id' => '31', 'particular_name' => 'Sukanya Samriddhi Scheme' ,'references' => 'Also referred to as the girl child prosperity scheme. Only one account per girl child is allowed to a maximum of two girl children.' , 'amount_max_limit' => '150000'],
            ['id' => '32', 'particular_name' => 'NABARD Notified Bonds' ,'references' => 'NABARD is an apex development institution, owned by Government of India and works towards the development and upliftment of rural India. The bonds are issued by NABARD (National Bank for Agriculture and Rural Development) and an Investment in NABARD Rural Bonds or NABARD tax free bonds qualifies for Deduction u/s 80 C.' , 'amount_max_limit' => '150000'],
            ['id' => '33', 'particular_name' => 'Mutual Pension Scheme' ,'references' => 'There are a few retirement schemes from mutual funds that would help you to save taxes under Section 80C. Example of such schemes are, Franklin India Pension Fund, UTI Retirement Benefit Pension Fund, Reliance Retirement Fund, HDFC Retirement Savings Fund and Tata Retirement Savings Fund.' , 'amount_max_limit' => '150000'],
            ['id' => '34', 'particular_name' => 'NPS Employee Contribution' ,'references' => 'Additional exemption up to Rs 50,000 in NPS is eligible for income tax deduction. It is irrespective of the type of employment, i.e., a government employee, a private sector employee, or self-employed can claim benefit of Rs 50,000 under Section 80CCD(1B).' , 'amount_max_limit' => '50000'],
            ['id' => '35', 'particular_name' => 'NPS Employer Contribution' ,'references' => 'Employer’s contribution up to 10% of (Basic + DA) is eligible for deduction under this section, it is an additional deduction as it is not part of deduction under section 80CCE = [80C + 80CCC + 80CCD(1)]. In the Union Budget 2020, It has been proposed that an aggregate limit of Rs 7.5 lakh covering employer contributions to the Provident fund (PF), National Pension System (NPS) and superannuation fund. Any contribution beyond this limit will, therefore, will be taxable' , 'amount_max_limit' => 'Actual'],
            ['id' => '36', 'particular_name' => 'Medical Insurance Premium' ,'references' => 'You can claim a deduction up to Rs. 25,000 per year for medical insurance premium. The premium can be for you, your spouse, and dependent children. In case, you or your spouse is 60 years or above, you can claim a deduction up to Rs. 50,000.' , 'amount_max_limit' => ''],
            ['id' => '37', 'particular_name' => 'Preventive Health Check Up' ,'references' => 'You can claim deduction up to Rs. 5,000 per year on preventive health check-ups.' , 'amount_max_limit' => ''],
            ['id' => '38', 'particular_name' => 'Parents Medical Insurance Premium' ,'references' => 'You can claim a deduction up to Rs. 25,000 per year for medical insurance premium for your parents. In case, your father or mother, or either of them is a senior citizen, you can claim a deduction up to Rs. 50,000.' , 'amount_max_limit' => ''],
            ['id' => '39', 'particular_name' => 'Parents Preventive Health Check Up' ,'references' => 'You can claim deduction up to Rs. 5,000 per year on preventive health check-ups.' , 'amount_max_limit' => ''],
            ['id' => '40', 'particular_name' => 'Medical Expenditure for a Disabled Dependant  Disability>40% <80%   >80%  ' ,'references' => '• Deduction allowed up to Rs.75,000 for taking care of disabled persons with 40% or more of one or more disability.
            • Deduction allowed up to Rs.1.25 lakhs p.a. for taking care of disabled persons with 80% or more of one or more disability.
            • Dependents imply spouse, children, siblings or parents of an individual or any member of the family in an HUF.' , 'amount_max_limit' => '75000'],
            ['id' => '41', 'particular_name' => 'Medical Expenditure on Self or Dependant for Specified Disease Age <60 yrs  > 60 yrs' ,'references' => 'Deduction under section 80DDB is allowed for medical expenses incurred for medical treatment of specified diseases or ailments. The nature of diseases and ailments which are included for deduction under Section 80DDB are mentioned below:
                1. Neurological Diseases as identified by a specialist ,where the level of disability has been certified to be of 40% and above and covers Dementia, Dystonia Musculorum Deformans, Chorea, Motor Neuron Disease, Ataxia, Aphasia, Parkinson’s Disease and Hemiballismus.
                2. Malignant Cancer
                3. AIDS- Acquired Immuno-Deficiency Syndrome
                4. Chronic Renal failure
                5. Hematological disorders like Hemophilia or Thalassaemia.
                ' , 'amount_max_limit' => '100000'],
            ['id' => '42', 'particular_name' => 'Repayment of Interest on Higher Education' ,'references' => 'You can claim deduction of Interest paid on a loan taken for pursuing higher education from taxable* income under section 80E of the Income Tax Act, 1961*.
            According to Section 80E*, the deduction is allowed on the total interest amount of the EMI paid during the financial year. The loan has to be taken from a bank or financial institution to pursue higher studies.
            Interest amount paid during the financial year is allowable as deduction from taxable* income. There is no limit on the deduction amount. The benefit of deduction is available for a maximum of 8 years or till the interest is paid- whichever is earlier. It is applicable even when you have taken an education loan for your spouse, children or for a student for whom you are legal guardian.' , 'amount_max_limit' => 'Actual'],
            ['id' => '43', 'particular_name' => 'Additional Relief on home loan interest (First-home Buyers FY 2016-2017) ' ,'references' => '• The deduction is up to Rs 50,000. It is over and above the Rs 2 lakh limit under Section 24 of the Income Tax Act.
            • Value of the House should be Rs.50 Lacs or less
            • Loan taken for the house must be Rs.35 lakhs or less
            • The loan must be sanctioned by a financial institution or a housing finance company
            • The loan must be sanctioned between FY 01.04.2016 to 31.03.2017 (AY 2017 – 2018) and the deduction is allowed for up to Rs.50000 per year until the loan is repaid.
            ' , 'amount_max_limit' => '50000'],
            ['id' => '44', 'particular_name' => 'Additional Relief on home loan interest (First-home Buyers FY 2019-2020)' ,'references' => '• Section 80EEA has been inserted to allow for an interest deduction from FY - 1st April 2019 and 31st March 2022.
            • A deduction for interest payments up to Rs 1,50,000 is available under Section 80EEA. This deduction is over and above the deduction of Rs 2 lakh for interest payments available under Section 24(b) of the Income Tax Act.
            • Housing loan must be taken from a financial institution or a housing finance company for buying a residential house property.
            • The loan should be sanctioned during the period 1st April 2019 and 31st March 2022.
            • Stamp duty value of the house property should be Rs 45 lakhs or less.
            • The individual taxpayer should not be eligible to claim deduction under the existing Section 80EE.
            • The taxpayer should be a first-time home buyer. The taxpayer should not own any residential house property as on the date of sanction of the loan.
            • This deduction can be claimed until you have repaid the housing loan.' , 'amount_max_limit' => '150000'],
            ['id' => '45', 'particular_name' => 'Dedution of Interest on loan acquiring Electric Vehicle' ,'references' => 'a) The loan must be taken from a financial institution or a non-banking financial company for buying an electric vehicle.
            b) The loan must be sanctioned anytime during the period starting from 1 April 2019 till 31 March 2023.
            c) “Electric vehicle” has been defined to mean a vehicle which is powered exclusively by an electric motor whose traction energy is supplied exclusively by traction battery installed in the vehicle and has such electric regenerative braking system, which during braking provides for the conversion of vehicle kinetic energy into electrical energy.
            d) A deduction for interest payments up to Rs 1,50,000 is available under Section 80EEB' , 'amount_max_limit' => '150000'],




        ]);

    }
}
