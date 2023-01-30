<template>
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
                        <FileUpload style="height: 2.5em;" mode="basic" name="demo[]" url="./upload.php" class="p-button-sm" accept="image/*" :maxFileSize="1000000" :auto="true" chooseLabel="Browse" />
                        <Button type="file" label="Upload" icon="pi pi-upload" iconPos="right"  @click="onUpload" class="p-button-sm p-button-success"  />
                    </div>
                </div>
                <!-- Aadhar Back -->
                <div style="display: flex;margin-top: 20px;"  > 
                    <span class="label" style="line-height: 35px;"><strong>Aadhar Card Back</strong></span>
                    <div class="AadharCardFront" style="display: flex;gap: 30px;">
                        <Button label="view" icon="pi pi-eye" iconPos="right" class="p-button-sm p-button-primary" />
                        <!-- <Button label="choose" icon="pi pi-plus" iconPos="right" class="p-button-sm p-button-danger" /> -->
                        <FileUpload style="height: 2.5em;" mode="basic" name="demo[]" url="./upload.php" class="p-button-sm" accept="image/*" :maxFileSize="1000000" @upload="onUpload" :auto="true" chooseLabel="Browse" />
                        <Button type="file" label="Upload" icon="pi pi-upload" iconPos="right" class="p-button-sm p-button-success"  />
                    </div>
                </div>
                <!-- Pan card -->
                <div style="display: flex;margin-top: 20px;"  > 
                    <span class="label" style="line-height: 35px;"><strong>pan Card</strong></span>
                    <div class="AadharCardFront" style="display: flex;gap: 30px;">
                        <Button label="view" icon="pi pi-eye" iconPos="right" class="p-button-sm p-button-primary" />
                        <!-- <Button label="choose" icon="pi pi-plus" iconPos="right" class="p-button-sm p-button-danger" /> -->
                        <FileUpload style="height: 2.5em;" mode="basic" name="demo[]" url="./upload.php" class="p-button-sm" accept="image/*" :maxFileSize="1000000" @upload="onUpload" :auto="true" chooseLabel="Browse" />
                        <Button type="file" label="Upload" icon="pi pi-upload" iconPos="right" class="p-button-sm p-button-success"  />
                    </div>
                </div>
                <div style="display: flex;margin-top: 20px;"  > 
                    <span class="label"  style="line-height: 35px;"><strong>Aadhar Card Back</strong></span>
                    <div class="AadharCardFront" style="display: flex;gap: 30px;">
                        <Button label="view" icon="pi pi-eye" iconPos="right" class="p-button-sm p-button-primary" />
                        <!-- <Button label="choose" icon="pi pi-plus" iconPos="right" class="p-button-sm p-button-danger" /> -->
                        <FileUpload style="height: 2.5em;" mode="basic" name="demo[]" url="./upload.php" class="p-button-sm" accept="image/*" :maxFileSize="1000000" @upload="onUpload" :auto="true" chooseLabel="Browse" />
                        <Button type="file" label="Upload" icon="pi pi-upload" iconPos="right" class="p-button-sm p-button-success"  />
                    </div>
                </div>
                <div style="display: flex;margin-top: 20px;"  > 
                    <span class="label"  style="line-height: 35px;"><strong>Aadhar Card Back</strong></span>
                    <div class="AadharCardFront" style="display: flex;gap: 30px;">
                        <Button label="view" icon="pi pi-eye" iconPos="right" class="p-button-sm p-button-primary" />
                        <!-- <Button label="choose" icon="pi pi-plus" iconPos="right" class="p-button-sm p-button-danger" /> -->
                        <FileUpload style="height: 2.5em;" mode="basic" name="demo[]" url="./upload.php" class="p-button-sm" accept="image/*" :maxFileSize="1000000" @upload="onUpload" :auto="true" chooseLabel="Browse" />
                        <Button type="file" label="Upload" icon="pi pi-upload" iconPos="right" class="p-button-sm p-button-success"  />
                    </div>
                </div>
                <div style="display: flex;margin-top: 20px;"  > 
                    <span class="label"  style="line-height: 35px;"><strong>Aadhar Card Back</strong></span>
                    <div class="AadharCardFront" style="display: flex;gap: 30px;">
                        <Button label="view" icon="pi pi-eye" iconPos="right" class="p-button-sm p-button-primary" />
                        <!-- <Button label="choose" icon="pi pi-plus" iconPos="right" class="p-button-sm p-button-danger" /> -->
                        <FileUpload style="height: 2.5em;" mode="basic" name="demo[]" url="./upload.php" class="p-button-sm" accept="image/*" :maxFileSize="1000000" @upload="onUpload" :auto="true" chooseLabel="Browse" />
                        <Button type="file" label="Upload" icon="pi pi-upload" iconPos="right" class="p-button-sm p-button-success"  />
                    </div>
                </div>
                <div style="display: flex;margin-top: 20px;"  > 
                    <span class="label"  style="line-height: 35px;"><strong>Aadhar Card Back</strong></span>
                    <div class="AadharCardFront" style="display: flex;gap: 30px;">
                        <Button label="view" icon="pi pi-eye" iconPos="right" class="p-button-sm p-button-primary" />
                        <!-- <Button label="choose" icon="pi pi-plus" iconPos="right" class="p-button-sm p-button-danger" /> -->
                        <FileUpload style="height: 2.5em;" mode="basic" name="demo[]" url="./upload.php" class="p-button-sm" accept="image/*" :maxFileSize="1000000" @upload="onUpload" :auto="true" chooseLabel="Browse" />
                        <Button type="file" label="Upload" icon="pi pi-upload" iconPos="right" class="p-button-sm p-button-success"  />
                    </div>
                </div>
                <div style="display: flex;margin-top: 20px;"  > 
                    <span class="label"  style="line-height: 35px;"><strong>Aadhar Card Back</strong></span>
                    <div class="AadharCardFront" style="display: flex;gap: 30px;">
                        <Button label="view" icon="pi pi-eye" iconPos="right" class="p-button-sm p-button-primary" />
                        <!-- <Button label="choose" icon="pi pi-plus" iconPos="right" class="p-button-sm p-button-danger" /> -->
                        <FileUpload style="height: 2.5em;" mode="basic" name="demo[]" url="./upload.php" class="p-button-sm" accept="image/*" :maxFileSize="1000000" @upload="onUpload" :auto="true" chooseLabel="Browse" />
                        <Button type="file" label="Upload" icon="pi pi-upload" iconPos="right" class="p-button-sm p-button-success"  />
                    </div>
                </div>
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
<script>

import { ref } from 'vue';

export default {
    setup() {
        const active1 = ref(0);
        const active2 = ref(0);
        const tabs = ref([
            {
                title: 'Header I',
                content: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
            },
            {
                title: 'Header II',
                content: "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Consectetur, adipisci velit, sed quia non numquam eius modi."
            },
            {
                title: 'Header III',
                content: "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus."
            }
        ]);
        const scrollableTabs = ref(Array.from({ length: 50 }, (_, i) => ({ title: `Tab ${i + 1}`, content: `Tab ${i + 1} Content` })));

        
        const onUpload = () => {
            console.log("Successfully");
        }
       
        return { active1, active2, tabs, scrollableTabs,onUpload }
    }
}


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
