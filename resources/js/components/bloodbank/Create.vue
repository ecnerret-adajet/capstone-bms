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
                                    <h3 class="mb-0">Add Blood Inventory</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <h6 class="heading-small text-muted mb-4">Blood Inventory Form</h6>

                                <div class="pl-lg-4">

                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="form-group">
                                                <div class="form-group">
                                                <label class="form-control-label" for="role">Blood Type</label>
                                                <select class="form-control" v-model="bloodbank.blood_type_id">
                                                    <option v-for="(blood,b) in bloodtypes" v-bind:key="b" :value="blood.id"> {{ blood.name }}</option>
                                                </select>
                                                <span class="text-danger" v-if="errors.blood_type_id  ">{{ errors.blood_type_id[0] }}</span>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Quantiy</label>
                                                <input type="number" id="input-username" class="form-control form-control-alternative" v-model="bloodbank.quantity">
                                                <span class="text-danger" v-if="errors.quantity">{{ errors.quantity[0] }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Remarks</label>
                                                <input type="text" id="input-username" placeholder="Enter Name" class="form-control form-control-alternative" v-model="bloodbank.remarks">
                                                <span class="text-danger" v-if="errors.remarks">{{ errors.remarks[0] }}</span>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="text">
                                            <button @click="submitForm(bloodbank)" type="button" class="btn btn-primary mt-4">Save</button>
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
    data(){
        return{
            errors: [],
            bloodbank:{
                quantity: '',
                blood_type_id: '',
                remarks: '',
            },
            bloodtypes: [],
        }
    },
    mounted(){
         this.fetchBloodTypes();
    },

    methods:{

        fetchBloodTypes(){
            axios.get('/api/blood-types')
            .then(response => { 
                this.bloodtypes = response.data;
            })
            .catch(error => { 
                this.errors = error.response.data.errors;
            })
        },

        submitForm(data) {
            axios.post(`/api/blood-banks`, data)
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
