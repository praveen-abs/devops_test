

import { defineStore } from "pinia";
import { ref, reactive } from "vue";
import { useToast } from "primevue/usetoast";
import axios from "axios";
import moment from "moment";

export const Service = defineStore("Service", () => {

    const apps = reactive({
                app_name:'',
                app_logo:'',
                app_description:'',
                app_ischecked:true
            })
    const appss = reactive({
                name:'',
                logo:'',
                des:'',
                img:''
            })


            const dataa = ref([
                { id: 1, name: 'Office', img: 'https://cdn.icon-icons.com/icons2/1156/PNG/512/1486565573-microsoft-office_81557.png', des: 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.Pariatur voluptatemLorem ' },
                { id: 1, name: 'Office', img: 'https://cdn.icon-icons.com/icons2/1156/PNG/512/1486565573-microsoft-office_81557.png', des: 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.Pariatur voluptatemLorem ' },
                { id: 1, name: 'Office', img: 'https://cdn.icon-icons.com/icons2/1156/PNG/512/1486565573-microsoft-office_81557.png', des: 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.Pariatur voluptatemLorem ' },
                { id: 1, name: 'Office', img: 'https://cdn.icon-icons.com/icons2/1156/PNG/512/1486565573-microsoft-office_81557.png', des: 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.Pariatur voluptatemLorem ' },
                { id: 1, name: 'Office', img: 'https://cdn.icon-icons.com/icons2/1156/PNG/512/1486565573-microsoft-office_81557.png', des: 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.Pariatur voluptatemLorem ' },
                { id: 1, name: 'Office', img: 'https://cdn.icon-icons.com/icons2/1156/PNG/512/1486565573-microsoft-office_81557.png', des: 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.Pariatur voluptatemLorem ' },
                { id: 1, name: 'Office', img: 'https://cdn.icon-icons.com/icons2/1156/PNG/512/1486565573-microsoft-office_81557.png', des: 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.Pariatur voluptatemLorem ' },
                { id: 1, name: 'Office', img: 'https://cdn.icon-icons.com/icons2/1156/PNG/512/1486565573-microsoft-office_81557.png', des: 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.Pariatur voluptatemLorem ' },
                { id: 1, name: 'Office', img: 'https://cdn.icon-icons.com/icons2/1156/PNG/512/1486565573-microsoft-office_81557.png', des: 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.Pariatur voluptatemLorem ' },
                { id: 1, name: 'Office', img: 'https://cdn.icon-icons.com/icons2/1156/PNG/512/1486565573-microsoft-office_81557.png', des: 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.Pariatur voluptatemLorem ' },
                { id: 1, name: 'Office', img: 'https://cdn.icon-icons.com/icons2/1156/PNG/512/1486565573-microsoft-office_81557.png', des: 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.Pariatur voluptatemLorem ' },
                { id: 1, name: 'Office', img: 'https://cdn.icon-icons.com/icons2/1156/PNG/512/1486565573-microsoft-office_81557.png', des: 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.Pariatur voluptatemLorem ' },
                { id: 1, name: 'Office', img: 'https://cdn.icon-icons.com/icons2/1156/PNG/512/1486565573-microsoft-office_81557.png', des: 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.Pariatur voluptatemLorem ' },
            ])

    const SaveApps =() =>{

        console.log(appss);



       try{
        dataa.value.push(appss)

       }catch
       {
        console.log("error");

       }

    }

    const app_logo_attachment = (e) => {

        // Get uploaded file
        appss.img=URL.createObjectURL(e.target.files[0])


        // Print to console
        console.log(appss.img);
    }







            return{
                apps,
                SaveApps,
                dataa,appss,app_logo_attachment
            }
});

