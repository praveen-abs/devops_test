import axios from "axios";

export async function getMaritalStatus(){
    const response=await axios.get('/fetch-marital-details');
    return response.data;
}


export async function getBloodGroups(){
    const response=await axios.get('/fetch-blood-groups');
    return response.data;
}


