<template>
    <div class="w-full">
        <div class="float-right">
            toggle button
        </div>
      <div class="flex w-5 pt-4 mx-6">
        <p>EPF Details</p>
        <div>icon</div>
      </div>
      <div class="flex gap-6 mx-6">
        <div class="flex w-6 p-4 my-4 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1">
        <div class="w-12">
            <div class="my-1">
            <h5 class="my-2 text-lg font-semibold">EPF Number</h5>
            <div class="flex gap-8 justify-evenly">
              <div class="w-8">
                <InputText class="w-full" />
              </div>
            </div>
          </div>
          <div class="my-4">
            <h5 class="my-2 text-lg font-semibold">
              Deduction Cycle
            </h5>
            <div class="flex gap-8 justify-evenly">
              <div class="w-8">
                <InputText class="w-full" />
              </div>
            </div>
          </div>
        </div>
        <div class="w-6">
            <input type="checkbox" name="" id="">
            <label for="">Is Default</label>

            <p>
                (Note: Once employees are onboarded they will be automatically enrolled in this PF scheme. Any modifications to the enrolement can only be made before the start of payroll processing )
            </p>
        </div>
          
        </div>
  
        <div class="w-6 p-4 my-4 border-gray-400 rounded-lg shadow-md border-1">
             <div class="mx-2 my-4">
                <input type="checkbox" name="" id="">
                 <label for="">Employer's Contribution is included in the CTC.</label>
             </div>
             <div class="mx-2 my-4">
                <input type="checkbox" name="" id="">
                 <label for="">Employer's EDLI Contribution is included in the CTC.</label>
             </div>
             <div class="mx-2 my-4">
                <input type="checkbox" name="" id="">
                 <label for="">Admin Charges  is included in the CTC.</label>
             </div>
             <div class="mx-2 my-4">
                <input type="checkbox" name="" id="">
                 <label for="">Override PF Contribution rate at employee level</label>
             </div>
        </div>
      </div>
      <div class="mx-6">
        <p>Employee/employeer contribution</p>
        <p>Note: The Contribution made by both employers and employees will remain the same</p>
      </div >
      <div class="flex gap-6 mx-6 my-4">
     <div class="w-6">
        <div class="p-4 my-4 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1">
          <div class="my-4">
            <h5 class="my-2 text-lg font-semibold">
              Select the Rule
            </h5>
            <div class="flex gap-8 justify-evenly">
              <div class="w-6">
                <Dropdown class="w-full" />
              </div>
            </div>
          </div>
          <div class="my-4">
            <h5 class="my-2 text-lg font-semibold">
              Select the Contribution Tye
            </h5>
            <div class="flex gap-8 justify-evenly">
              <div class="w-6">
                <Dropdown class="w-full" />
              </div>
            </div>
          </div>
        </div>
        <div class="p-4 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1">
        <div class="my-4">
            <input type="checkbox" name="" id="">
            <label for="">
                Pro-rate restricted PF Wage When LOP Applied
            </label>
        </div>
        <div class="my-4">
            <input type="checkbox" name="" id="">
            <label for="">
                Consider all applicable salary components if PF Wage is less tham 15,000 after loss of pay
            </label>
        </div>
        </div>
        
     </div>
  
        <div class="w-6 p-4 my-4 border-gray-400 rounded-lg shadow-md border-1">
          <h1 class="my-2 text-xl font-bold">
            Example
          </h1>

          <p>Let's assume the Gross Wages = <strong>50,000</strong>
           and HRA=<strong>4000</strong>
           ,then the breakup of contribution will be:</p>
  
          <div class="my-6 w-96">
            <DataTable :value="products">
              <Column field="product" header="Code"></Column>
              <Column field="lastYearSale" header="Name"></Column>
              <Column field="thisYearSale" header="Category"></Column>
              <Column field="thisYearProfit" header="Quantity"></Column>
            </DataTable>
          </div>

          <div class="border-gray-300 border-1">
            <p><strong>Note:</strong>This Condition Works</p>
            <p>if</p>
            <p><strong>Gross(-)HRA </strong> is Greater than <strong>15,000</strong>
            ,then PF deduction will be 15,000(*) 12%</p>
            <p>Else</p>
            <p><strong>Gross(-)HRA </strong> is Lesser than <strong>15,000</strong>
            ,then PF deduction will be 15,000(*) 12%</p>
          </div>
        </div>
      </div>

      <div>
        <div>icon</div>
        <div>
            <p>Assign Employees</p>
        </div>
      </div>
      <div>
        <p><Strong>40</Strong>
        Employees Assigned 
        <button>View/Edit</button></p>
      </div>
      </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from "vue";
  
  const products = ref([
    {
      product: "Bamboo Watch",
      lastYearSale: 51,
      thisYearSale: 40,
      lastYearProfit: 54406,
      thisYearProfit: 43342,
    },
    {
      product: "Black Watch",
      lastYearSale: 83,
      thisYearSale: 9,
      lastYearProfit: 423132,
      thisYearProfit: 312122,
    },
    {
      product: "Blue Band",
      lastYearSale: 38,
      thisYearSale: 5,
      lastYearProfit: 12321,
      thisYearProfit: 8500,
    },
  ]);
  </script>
  