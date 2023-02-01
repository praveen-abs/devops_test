<template>
    <Toast />
    <div class="">
        <h6>Employee Documents</h6>
        <TabView class="tabview-custom" ref="tabview4">
            <TabPanel>
                <template #header>
                    <span>Personal Documents</span>
                </template>
                <!-- Aadhar front -->
                <div style="display: flex;"  >
                    <span class="label" style="line-height: 35px;"><strong>Aadhar Card Front</strong></span>
                    <div class="AadharCardFront" style="display: flex;gap: 30px;">
                        <Button label="view" icon="pi pi-eye" iconPos="right" class="p-button-sm p-button-primary" />
                        <!-- <Button label="choose" icon="pi pi-plus" iconPos="right" class="p-button-sm p-button-danger" /> -->
                        <FileUpload style="height: 2.5em;" mode="basic" ref="PersonalDocument"  class="p-button-sm" accept="image/*" :maxFileSize="1000000" :auto="true" chooseLabel="Browse" @change="processDocUpload($event)" />
                        <Button type="file" label="Upload" icon="pi pi-upload" iconPos="right"  @click="onUpload" class="p-button-sm p-button-success"  />
                    </div>
                </div>
                <!-- Aadhar Back --> 
               
            </TabPanel>
            <TabPanel>
                <template #header>
                    <span>Official Documents</span>
                </template>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                    architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione
                    voluptatem sequi nesciunt. Consectetur, adipisci velit, sed quia non numquam eius modi.</p>
            </TabPanel>
        </TabView>
    </div>
</template>
<script setup>

    import { ref, onMounted } from 'vue';
    import axios from 'axios'
    import { useToast } from "primevue/usetoast";

    const toast =useToast();

    const PersonalDocument =ref('');

    onMounted(() => {
        // let url = window.location.origin + '/fetch-regularization-approvals';
        // console.log("AJAX URL : " + url);
        // axios.get(url)
        //     .then((response) => {
        //         console.log("Axios : " + response.data);
        //         att_regularization.value = response.data;
        //     });
    })

  

    function processDocUpload(event) {
       // hideConfirmDialog(false);
       // canShowLoadingScreen.value = true;
       PersonalDocument.value = event.target.files[0];
       console.log(PersonalDocument.value);
      if(!PersonalDocument.value){
        toast.add({severity:'warn', summary: 'Warn Message', detail:'Required', life: 3000});
      }else{
        const formdata=new formData();
        formdata.append('file', PersonalDocument.value);
         axios.post(window.location.origin + '/profile-page/uploadEmployeeDocs',
       formdata
      )
        .then((response) => {
            console.log(response);
            //canShowLoadingScreen.value = false;
            //resetVars();
        })
        .catch((error) => {
            //canShowLoadingScreen.value = false;
            //resetVars();
            console.log(error.toJSON());
        });
    }
    }

    function onUpload(){
            console.log("Uploading file....");
            processDocUpload();
        }
    axios.get('/profile-page/uploadEmployeeDocs').then((res)=>PersonalDocument.value=res.data)
</script>

<style scoped>


       .p-button {
        height: 2.5em;
       }
      .p-button .p-fileupload-choose {
           height: 2.1em;
    }
        i, span ,.tabview-custom{
            vertical-align: middle;
        }

        span {
            margin: 0 .5rem;
        }
        .AadharCardFront{
            margin-left: 20px;
        }
        .label{
            width: 170px;
        }

    .p-tabview p {
        line-height: 1.5;
        margin: 0;
    }
</style>
