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
                                    <h3 class="mb-0">Blood Request Details</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div v-if="submitted" class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-inner--icon"><i class="ni ni-support-16"></i></span>
                            <span class="alert-inner--text">
                                Profile successfully updated!
                            </span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                            </div>

                            <form>
                                <h6 class="heading-small text-muted mb-4">Blood Requests Information</h6>
                                <div class="pl-lg-4">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Patient Name</label>
                                                <input type="text" id="input-username" class="form-control form-control-alternative" v-model="bloodrequest.patient_name">
                                                <!-- <span class="text-danger" v-if="errors.patient_name">{{ errors.patient_name[0] }}</span> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Diagnosies</label>
                                                <input type="text" id="input-username" class="form-control form-control-alternative" v-model="bloodrequest.diagnosies">
                                                <!-- <span class="text-danger" v-if="errors.patient_name">{{ errors.patient_name[0] }}</span> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Bag Quantiy</label>
                                                <input type="number" id="input-username" class="form-control form-control-alternative" v-model="bloodrequest.bag_quantity">
                                                <!-- <span class="text-danger" v-if="errors.patient_name">{{ errors.patient_name[0] }}</span> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="role">Purpose</label>
                                                <select class="form-control" v-model="bloodrequest.purpose_id">
                                                    <option v-for="(purpose,b) in purposes" v-bind:key="b" :value="purpose.id"> {{ purpose.name }}</option>
                                                </select>
                                                <!-- <span class="text-danger" v-if="errors.purpose_id  ">{{ errors.purpose_id[0] }}</span> -->
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="role">Blood Type</label>
                                                <select class="form-control" v-model="bloodrequest.blood_type_id">
                                                    <option v-for="(blood,b) in bloodtypes" v-bind:key="b" :value="blood.id"> {{ blood.name }}</option>
                                                </select>
                                                <!-- <span class="text-danger" v-if="errors.blood_type_id  ">{{ errors.blood_type_id[0] }}</span> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="role">Hospital</label>
                                                <select class="form-control" v-model="bloodrequest.hospital_id">
                                                    <option v-for="(hospital,b) in hospitals" v-bind:key="b" :value="hospital.id"> {{ hospital.hospital_name }}</option>
                                                </select>
                                                <!-- <span class="text-danger" v-if="errors.hospital_id  ">{{ errors.hospital_id[0] }}</span> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="role">RH group</label>
                                                <select class="form-control" v-model="bloodrequest.rh_group_id">
                                                    <option v-for="(rhgroup,b) in rhgroups" v-bind:key="b" :value="rhgroup.id"> {{ rhgroup.name }}</option>
                                                </select>
                                                <!-- <span class="text-danger" v-if="errors.rh_group_id  ">{{ errors.rh_group_id[0] }}</span> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="role">Urgency</label>
                                                <select class="form-control" v-model="bloodrequest.urgency_id">
                                                    <option v-for="(urgency,b) in urgencies" v-bind:key="b" :value="urgency.id"> {{ urgency.name }}</option>
                                                </select>
                                                <!-- <span class="text-danger" v-if="errors.urgency_id  ">{{ errors.urgency_id[0] }}</span> -->
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
    // props: ['bloodrequest_id'],
    data(){
        return{
            errors: [],
            bloodrequest:{},
            // bloodrequest:{
            //     patient_name: '',
            //     blood_type_id: '',
            //     rh_group_id: '',
            //     purpose_id: '',
            //     hospital_id: '',
            //     urgency_id: '',
            //     diagnosies: '',
            //     bag_quantity: '',
            //     attachment: ''
            // },
            hospitals: [],
            bloodtypes: [],
            purposes: [],
            rhgroups: [],
            urgencies: [],
            submitted: false
        }
    },
    mounted(){
        this.fetchBloodRequest();
        this.fetchHospitalsData();
        this.fetchBloodTypes();
        this.fetchPurposes();
        this.fetchrhgroups();
        this.fetchUrgencies();
    },

    methods:{

        fetchBloodRequest() {
            axios.get('/api/blood-requests/profile')
                .then(response => {
                    this.bloodrequest = response.data;
                    console.log('check blood request: ', this.bloodrequest)
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                })
        },

        // fetchBloodRequest(){
        //     axios.get(`/api/blood-requests/${this.bloodrequest_id}`)
        //     .then(response => { 
        //         this.bloodrequest = response.data.data;
        //     })
        //     .catch(error => { 
        //         this.errors = error.response.data.errors;
        //     })
        // },

        submitForm(data) {
            // console.log(data)
            // console.log('blood type id ', data.blood_type_id,)
            axios.post(`/api/blood-requests/${data.id}`, {
                patient_name: data.patient_name,
                blood_type_id: data.blood_type_id,
                rh_group_id: data.rh_group_id,
                purpose_id: data.purpose_id,
                hospital_id: data.hospital_id,
                urgency_id: data.urgency_id,
                diagnosies: data.diagnosies,
                bag_quantity: data.bag_quantity,
                // attachment: data.attachment,
            })
            .then(response => {
                console.log('response: ', response.status)
                if(response.status === 200) {
                    // window.location.href = response.data.redirect;
                    this.submitted = true;
                }
            })
            .catch(error => {
                this.errors = error.response.data.errors;
            })
        },

        fetchHospitalsData(){
            axios.get('/api/hospitals')
            .then(response => { 
                console.log('check hospitals: ', response.data)
                this.hospitals = response.data.data;
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

        fetchPurposes(){
            axios.get('/api/purposes')
            .then(response => { 
                this.purposes = response.data;
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

        fetchUrgencies(){
            axios.get('/api/urgencies')
            .then(response => { 
                this.urgencies = response.data;
            })
            .catch(error => { 
                this.errors = error.response.data.errors;
            })
        },
    }
}
</script>
