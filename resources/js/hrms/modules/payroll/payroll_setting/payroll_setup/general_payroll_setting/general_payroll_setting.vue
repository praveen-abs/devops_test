<template>
  <div class="w-full">
    <div class="flex w-5 pt-4 mx-6">
      <p>Payroll and attendance end date settings</p>
      <div>icon</div>
    </div>
    <div class="flex grid-cols-2 gap-6 mx-6">
      <div class="w-6 p-4 my-4 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1">
        <div class="my-1">
          <h5 class="my-2 text-lg font-semibold">Pay Frequency</h5>
          <div class="flex gap-8 justify-evenly">
            <div class="w-6">
              <InputText class="w-full" />
            </div>
          </div>
        </div>
        <div class="my-4">
          <h5 class="my-2 text-lg font-semibold">
            When would you like to start using the ABShrms payroll?
          </h5>
          <div class="flex gap-8 justify-evenly">
            <div class="w-6">
              <InputText class="w-full" />
            </div>
          </div>
        </div>
        <div class="my-4">
          <h5 class="my-2 text-lg font-semibold">
            On which date did the pay peroid end in november >
          </h5>
          <div class="flex gap-8 justify-evenly">
            <div class="w-6">
              <InputText class="w-full" />
            </div>
          </div>
        </div>
        <div class="my-4">
          <h5 class="my-2 text-lg font-semibold">
            The payment date for the peroid of nov 1st to nov 30th is
          </h5>
          <div class="flex gap-8 justify-evenly">
            <div class="w-6">
              <InputText class="w-full" />
            </div>
          </div>
        </div>
      </div>

      <div class="w-6 p-4 my-4 border-gray-400 rounded-lg shadow-md border-1">
        <h1 class="my-2 text-xl font-bold">
          The finalized payroll peroid is <strong>JAN 1 - JAN 31</strong>
        </h1>
        <div class="my-6 w-96">
          <DataTable :value="products">
            <Column field="product" header="Code"></Column>
            <Column field="lastYearSale" header="Name"></Column>
            <Column field="thisYearSale" header="Category"></Column>
            <Column field="thisYearProfit" header="Quantity"></Column>
          </DataTable>
        </div>
      </div>
    </div>
    <div class="mx-6">
      <p>Attendance cut-off cycle</p>
    </div>
    <div class="flex grid-cols-2 gap-6 mx-6 my-4">
      <div class="w-6 p-4 my-4 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1">
        <div class="my-4">
          <h5 class="my-2 text-lg font-semibold">
            Select the attendance cut-off peroid in a month
          </h5>
          <div class="flex gap-8 justify-evenly">
            <div class="w-6">
              <Dropdown class="w-full" />
            </div>
          </div>
        </div>
        <div class="my-4">
          <div class="flex gap-8 justify-evenly">
            <h5 class="my-2 text-lg font-semibold">
              Do you want to consider new joinee post attendance cut off date ?
            </h5>
            <div class="flex">
              <div class="mr-2">
                <input
                  style="height: 20px; width: 20px"
                  class="form-check-input"
                  type="radio"
                  name=""
                  id=""
                  value=""
                />
                <label class="form-check-label leave_type" for="">Yes</label>
              </div>
              <div>
                <input
                  style="height: 20px; width: 20px"
                  class="form-check-input"
                  type="radio"
                  name=""
                  id=""
                  value=""
                />
                <label class="form-check-label leave_type" for="">NO</label>
              </div>
            </div>
          </div>
        </div>

        <div class="my-4">
          <div class="flex">
            <div>
              <Checkbox class="mx-2" :binary="true" />
            </div>
            <div>
              The employee's attendance cut-off date differs from their pay peroid end
              date
              <strong>what is Attendance cut-off date?</strong>
            </div>
          </div>
        </div>
      </div>

      <div class="w-6 p-4 my-4 border-gray-400 rounded-lg shadow-md border-1">
        <h1 class="my-2 text-xl font-bold">
          The finalized payroll peroid is <strong>26th - 25th</strong>
        </h1>

        <div class="my-6 w-96">
          <DataTable :value="products">
            <Column field="product" header="Code"></Column>
            <Column field="lastYearSale" header="Name"></Column>
            <Column field="thisYearSale" header="Category"></Column>
            <Column field="thisYearProfit" header="Quantity"></Column>
          </DataTable>
        </div>
      </div>
    </div>
    <div class="mx-6">
      <p>Pay Peroid Calculation</p>
    </div>
    <div class="flex grid-cols-2 gap-6 mx-6 my-4">
      <div class="w-6 p-4 my-4 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1">
        <div class="my-4">
          <h5 class="my-2 text-lg font-semibold">Pay days in month</h5>
          <div class="flex gap-8 justify-evenly">
            <div class="w-6">
              <InputText class="min-w-full" />
            </div>
          </div>
        </div>
        <div class="my-4">
          <h5 class="my-2 text-lg font-semibold">Pay days in month</h5>
          <div class="flex gap-8 justify-evenly">
            <div class="w-6 my-2">
              <p>Include Week Off's</p>
            </div>
            <div class="flex my-2">
              <div>
                <input
                  style="height: 20px; width: 20px"
                  class="form-check-input"
                  type="radio"
                  name=""
                  id=""
                  value=""
                />
                <label class="form-check-label leave_type" for="">Yes</label>
              </div>
              <div class="mx-4">
                <input
                  style="height: 20px; width: 20px"
                  class="form-check-input"
                  type="radio"
                  name=""
                  id=""
                  value=""
                />
                <label class="form-check-label leave_type" for="">NO</label>
              </div>
            </div>
          </div>
          <div class="flex gap-8 justify-evenly">
            <div class="w-6">
              <p>Include Holiday's</p>
            </div>
            <div class="flex">
              <div>
                <input
                  style="height: 20px; width: 20px"
                  class="form-check-input"
                  type="radio"
                  name=""
                  id=""
                  value=""
                />
                <label class="form-check-label leave_type" for="">Yes</label>
              </div>
              <div class="mx-4">
                <input
                  style="height: 20px; width: 20px"
                  class="form-check-input"
                  type="radio"
                  name=""
                  id=""
                  value=""
                />
                <label class="form-check-label leave_type" for="">NO</label>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="w-6 p-4 my-4 border-gray-400 rounded-lg shadow-md border-1">
        <div class="my-6">
          <p>
            <strong>NOTE :</strong>
            Please note that calculating the number of days for a given pay period can
            significantly impact salary deductions for loss of pay due to leave or other
            reasons. For instance, consider the example of an employee whose monthly
            salary is INR 30,000 and who takes one day of leave without pay. If we
            calculate loss of pay based on a 30-day month, the deduction would be INR
            30,000/30 = INR 1000. However, if we exclude weekends from the calculation,
            assuming 8 Saturdays and Sundays in the month, the effective number of working
            days would be 30-8 = 22 days. In this case, the deduction for one day of loss
            of pay would be INR 30,000/22 = INR 1364.
          </p>
        </div>
      </div>
    </div>
    <div class="mx-6">
      <p>Currency and Compensation</p>
    </div>
    <div class="flex grid-cols-2 gap-6 mx-6 my-4">
      <div class="w-6 p-4 my-4 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1">
        <div class="my-4">
          <h5 class="my-2 text-lg font-semibold">Currency</h5>
          <div class="flex gap-8 justify-evenly">
            <div class="w-6">
              <InputText class="w-full" />
            </div>
          </div>
        </div>
        <div class="my-4">
          <h5 class="my-2 text-lg font-semibold">Description</h5>
          <div class="my-2">
            <div>
              <input
                style="height: 20px; width: 20px"
                class="form-check-input"
                type="radio"
                name=""
                id=""
                value=""
              />
              <label class="form-check-label leave_type" for="">Yes</label>
            </div>
            <div>
              <input
                style="height: 20px; width: 20px"
                class="form-check-input"
                type="radio"
                name=""
                id=""
                value=""
              />
              <label class="form-check-label leave_type" for="">NO</label>
            </div>
          </div>
        </div>
      </div>

      <div class="w-6 p-4 my-4 border-gray-400 rounded-lg shadow-md border-1">
        <div class="my-2">
          <div>EXPLANATION :</div>
          <div class="my-3">
            Monthly : Monthly remuneration refers to the compensation paid to an employee
            in exchange for their services, which is calculated and defined on a monthly
            basis. This compensation serves as a form of payment for the employee's work
            performed throughout the month.
          </div>
          <div class="my-3">
            Daily : Daily remuneration refers to the compensation paid to an employee for
            their services, which is calculated on a per-day basis. It is the amount that
            an employee is entitled to receive for each day of work performed as per the
            agreed terms of their employment contract.
          </div>
        </div>
      </div>
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
