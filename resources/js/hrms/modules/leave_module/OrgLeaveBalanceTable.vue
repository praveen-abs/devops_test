<template>
    <div class="about">
      <!-- textbox with loading spinner -->
      <div class="AutoComplete">
      <label for="inputtext">AutoComplete</label>
      <AutoComplete v-model="selectedCountry" :suggestions="filteredCountriesBasic" @complete="searchCountry($event)" optionLabel="name" />
      </div>
      <div class="dropDown" style="margin-top: 30px;">
        <!-- dropDown with scrollBar -->
        <Dropdown v-model="selectedCity" :options="cities" optionLabel="name" placeholder="Select a City" />
        <!-- DropDown with SearchBar -->
        <Dropdown v-model="selectedCar" :options="cars" optionLabel="brand" placeholder="Select a Car" :filter="true" filterPlaceholder="Find Car"/>
      </div>
    <div class="editor" style="margin-top: 20px;">
      <!-- Text Editor -->
      <Editor v-model="value" editorStyle="height: 320px">
        <template #toolbar>
          <span class="ql-formats">
            <button class="ql-bold"></button>
            <button class="ql-italic"></button>
            <button class="ql-underline"></button>
          </span>
        </template>
      </Editor>
    </div>

    <div class="yes" style="margin-top: 20px;">
      <!-- button toogles -->
      <ToggleButton v-model="checked" onLabel="I confirm" offLabel="I reject" onIcon="pi pi-check" offIcon="pi pi-times" />
    </div>
    <div class="speedDail">
      <SpeedDial :model="items" />
    </div>
    <div style="margin-top: 20px;" class="split">
  <SplitButton label="Save" icon="pi pi-plus" :model="items"></SplitButton>
    </div>
    </div>
  </template>
  <script>
  export default {
    data() {
      return {

        checked: true,
        selectedCountry: null,
        filteredCountries: null,
        cities: [
        {name: 'New York', code: 'NY'},
        {name: 'Rome', code: 'RM'},
        {name: 'London', code: 'LDN'},
        {name: 'Istanbul', code: 'IST'},
        {name: 'Paris', code: 'PRS'},
      ],

  items: [
    {
            label: 'Update',
            icon: 'pi pi-refresh',
            command: () => {
              this.$toast.add({severity:'success', summary:'Updated', detail:'Data Updated', life: 3000});
            }
          },
          {
            label: 'Delete',
            icon: 'pi pi-times',
            command: () => {
              this.$toast.add({ severity: 'warn', summary: 'Delete', detail: 'Data Deleted', life: 3000});
            }
          },
          {
            label: 'Vue Website',
            icon: 'pi pi-external-link',
            command: () => {
              window.location.href = 'https://vuejs.org/'
            }
          },
          {
            label: 'Upload',
            icon: 'pi pi-upload',
                      to: '/fileupload'
          }
  ]
      }
    },
    countryService: null,
    methods: {
      searchCountry(event) {
              this.filteredCountriesBasic = this.countryService.search(event.query);
      }
    }
  }

  </script>
