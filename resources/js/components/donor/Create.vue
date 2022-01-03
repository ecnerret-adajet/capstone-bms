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
                                    <h3 class="mb-0">Create Donor</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <h6 class="heading-small text-muted mb-4">Donor Information</h6>
                                <div class="pl-lg-4">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">First Name</label>
                                                <input type="text" id="input-username" class="form-control form-control-alternative" v-model="donor.first_name">
                                                <span class="text-danger" v-if="errors.first_name">{{ errors.first_name[0] }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Last Name</label>
                                                <input type="text" id="input-username" class="form-control form-control-alternative" v-model="donor.last_name">
                                                <!-- <span class="text-danger" v-if="errors.patient_name">{{ errors.patient_name[0] }}</span> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Phone Number</label>
                                                <input type="number" id="input-username" class="form-control form-control-alternative" v-model="donor.phone_number">
                                                <!-- <span class="text-danger" v-if="errors.patient_name">{{ errors.patient_name[0] }}</span> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="role">Gender</label>
                                                <select class="form-control" v-model="donor.gender_id">
                                                    <option v-for="(gender,b) in genders" v-bind:key="b" :value="gender.id"> {{ gender.name }}</option>
                                                </select>
                                                <!-- <span class="text-danger" v-if="errors.purpose_id  ">{{ errors.purpose_id[0] }}</span> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Birth date</label>
                                                <input type="date" id="input-username" class="form-control form-control-alternative" v-model="donor.birthdate">
                                                <!-- <span class="text-danger" v-if="errors.first_name">{{ errors.first_name[0] }}</span> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Address</label>
                                                <input type="text" id="input-username" class="form-control form-control-alternative" v-model="donor.address">
                                                <!-- <span class="text-danger" v-if="errors.patient_name">{{ errors.patient_name[0] }}</span> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Height</label>
                                                <input type="text" id="input-username" class="form-control form-control-alternative" v-model="donor.height">
                                                <!-- <span class="text-danger" v-if="errors.first_name">{{ errors.first_name[0] }}</span> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Weight</label>
                                                <input type="text" id="input-username" class="form-control form-control-alternative" v-model="donor.weight">
                                                <!-- <span class="text-danger" v-if="errors.patient_name">{{ errors.patient_name[0] }}</span> -->
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="role">Blood Type</label>
                                                <select class="form-control" v-model="donor.blood_type_id">
                                                    <option v-for="(blood,b) in bloodtypes" v-bind:key="b" :value="blood.id"> {{ blood.name }}</option>
                                                </select>
                                                <!-- <span class="text-danger" v-if="errors.blood_type_id  ">{{ errors.blood_type_id[0] }}</span> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="role">RH group</label>
                                                <select class="form-control" v-model="donor.rh_group_id">
                                                    <option v-for="(rhgroup,b) in rhgroups" v-bind:key="b" :value="rhgroup.id"> {{ rhgroup.name }}</option>
                                                </select>
                                                <!-- <span class="text-danger" v-if="errors.rh_group_id  ">{{ errors.rh_group_id[0] }}</span> -->
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="text">
                                            <button @click="submitForm(donor)" type="button" class="btn btn-primary mt-4">Save</button>
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
            donor:{
                first_name: '',
                last_name: '',
                phone_number: '',
                gender_id: '',
                birthdate: '',
                address: '',
                height: '',
                weight: '',
                blood_type_id: '',
                rh_group_id: '',
            },
            genders: [],
            bloodTypes: [],
            rhgroups: [],
        }
    },
    mounted(){
        this.fetchGenders();
        this.fetchBloodTypes();
        this.fetchrhgroups();
    },

    methods:{

        submitForm(data) {
            console.log(data)
            axios.post(`/donors`, data)
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

        fetchGenders(){
            axios.get('/api/genders')
            .then(response => { 
                console.log('check genders: ', response.data)
                this.genders = response.data;
            })
            .catch(error => { 
                this.errors = error.response.data.errors;
            })
        },

        fetchBloodTypes(){
            axios.get('/api/blood-types')
            .then(response => { 
                this.bloodtypes = response.data;
            })
            .catch(error => { 
                this.errors = error.response.data.errors;
            })
        },

        fetchrhgroups(){
            axios.get('/api/rh-groups')
            .then(response => { 
                this.rhgroups = response.data;
            })
            .catch(error => { 
                this.errors = error.response.data.errors;
            })
        },

    }
}
</script>
