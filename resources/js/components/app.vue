<script>
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ColumnGroup from 'primevue/columngroup';     
import Row from 'primevue/row';           
import {FilterMatchMode} from 'primevue/api';    

 export default{
   data(){
    return{
      cars:null,
      brands: [
                {brand: 'Audi', value: 'Audi'},
                {brand: 'BMW', value: 'BMW'},
                {brand: 'Fiat', value: 'Fiat'},
                {brand: 'Honda', value: 'Honda'},
                {brand: 'Jaguar', value: 'Jaguar'},
                {brand: 'Mercedes', value: 'Mercedes'},
                {brand: 'Renault', value: 'Renault'},
                {brand: 'Volkswagen', value: 'Volkswagen'},
                {brand: 'Volvo', value: 'Volvo'}
            ],
      selectedCar: null,
            menuModel: [
                {label: 'View', icon: 'pi pi-fw pi-search', command: () => this.viewCar(this.selectedCar)},
                {label: 'Delete', icon: 'pi pi-fw pi-times', command: () => this.deleteCar(this.selectedCar)}
            ],
      multiSortMeta: [
            {field: 'year', order: 1},
            {field: 'brand', order: -1}

      ],
      customers: null,
            filters: {
                'name': {value: null, matchMode: FilterMatchMode.STARTS_WITH}
    }
   }
  },
 components:{
      DataTable,Column,Row,ColumnGroup
   },
   methods: {
        onRowContextMenu(event) {
            this.$refs.cm.show(event.originalEvent);
        },
        onCellEditComplete(event) {
            let { data, newValue, field } = event;

            switch (event.field) {
                case 'year':
                    if (this.isPositiveInteger(newValue))
                        data[field] = newValue;
                    else
                        event.preventDefault();
                break;

                default:
                    if (newValue.trim().length > 0)
                        data[field] = newValue;
                    else
                        event.preventDefault();
                break;
            }
        },
        isPositiveInteger(val) {
            let str = String(val);
            str = str.trim();
            if (!str) {
                return false;
            }
            str = str.replace(/^0+/, "") || "0";
            var n = Math.floor(Number(str));
            return n !== Infinity && String(n) === str && n >= 0;
        }
    }

 }
</script>
<template>
  <DataTable :value="cars" sortMode="multiple" :multiSortMeta="multiSortMeta">
  <Column field="vin" header="Vin" :sortable="true"></Column>
  <Column field="year" header="Year" :sortable="true"></Column>
  <Column field="brand" header="Brand" :sortable="true"></Column>
  <Column field="color" header="Color" :sortable="true"></Column>
</DataTable>


</template>


