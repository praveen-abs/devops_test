import axios from "axios";
import { defineStore } from "pinia";

import { ref } from "vue";

/*
    This Pinia code will store the ajax values of the
    profile page.
    This code is called from Parents onMounted method asynchronously


*/

export const investmentMainStore = defineStore("investmentMainStore", () => {
 
    const investment_exemption_steps = ref(1)



    return {

        // varaible Declarations
        investment_exemption_steps

    };
});



