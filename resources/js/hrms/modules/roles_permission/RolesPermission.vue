<template>
    <div class="w-full">
        <!-- <div>
            <h4>Employee Roles and Permissiom</h4>
        </div>
        <div>
            <table></table>
        </div> -->

        <!-- Creating New Job Roles dailog-->

        <div class="row">
          <h3 class="text-xl font-semibold col-12">Roles Details</h3>
        </div>
        <div class="my-3 row">
            <h5 class="text-lg font-semibold col-12">Role Title</h5>
            <InputText placeholder="Role Title"  class="h-10 col-4"/>
        </div>
        <div class="my-3 row">
            <h5 class="text-lg font-semibold col-12">Role Description</h5>
            <Textarea placeholder="Role Description " autoResize  class="col-4"  />
        </div>
        <div class="my-3">
            <h5 class="text-lg font-semibold">Assign To</h5>
        </div>
    </div>
</template>