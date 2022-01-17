<template>
    <div>
        <div class="header bg-danger pb-6 pt-5 pt-md-6"> </div>
        <!-- Page content -->
        <div class="container-fluid mt--7">
            <div class="row mt-5">
                <div class="col-xl-12 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Approval Blood Requests</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <h6 class="heading-small text-muted mb-4">Blood Requests Information</h6>
                                <div class="pl-lg-4">


                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="role">Approval Status</label>
                                                <select class="form-control" v-model="bloodrequest.status_id">
                                                    <option v-for="(approval,b) in approvals" v-bind:key="b" :value="approval.id"> {{ approval.name }}</option>
                                                </select>
                                                <!-- <span class="text-danger" v-if="errors.rh_group_id  ">{{ errors.rh_group_id[0] }}</span> -->
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="text">
                                            <button @click="submitForm(bloodrequest)" type="button" class="btn btn-primary mt-4">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<script>
import Multiselect from 'vue-multiselect';
export default {
    components:{
        Multiselect
    },
    props: {
        bloodrequest: Object
    },
    data(){
        return{
            approvals: [
                {
                    id: 1,
                    name: 'Approved',
                },
                {
                    id: 2,
                    name: 'Deny'
                }
            ],
            errors: [],
            bloodrequest:{
                status_id: '',
            },
        }
    },
    mounted(){
        console.log('check blood reques: ', this.bloodrequest)
    },

    methods:{

        submitForm(data) {
            axios.post(`/api/blood-requests/approval/${data.id}`, {
                status_id: data.status_id,
            })
            .then(response => {
                console.log('response: ', response.status)
                if(response.status === 200) {
                    window.location.href = response.data.redirect;
                }
            })
            .catch(error => {
                this.errors = error.response.data.errors;
            })
        },

    }
}
</script>
