import { defineStore } from "pinia";
import { ref } from "vue";

export const payrunMainStore = defineStore("payrunMainStore", () => {

    const currentActiveScreen = ref(0)
    
    return{
        currentActiveScreen
    }

})