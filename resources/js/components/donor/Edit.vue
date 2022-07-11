<template>
  <div>
        <div class="header bg-red pb-6 pt-5 pt-md-6"></div>
        <div class="container-fluid mt--7">
            <!-- Table -->
            <div class="row mt-5">
                <div class="col">

                        <div class="card shadow">
                        <div class="card-header">
                        <div class="row align-items-center">
                        <div class="col-8">
                        <h3 class="mb-0">Donor's Profile </h3>
                        </div>
                        <div class="col-4 text-right">
                        <button @click="updateDonorsProfile(donor)" class="btn btn-sm btn-primary">Update</button>
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

                        <h6 class="heading-small text-muted mb-4">Donor Information</h6>
                                <div class="pl-lg-4">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">First Name</label>
                                                <input type="text" id="input-username" class="form-control form-control-alternative" v-model="donor.first_name">
                                                <!-- <span class="text-danger" v-if="errors.first_name">{{ errors.first_name[0] }}</span> -->
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
                                                    <option v-for="(gender,g) in genders" v-bind:key="g" :value="gender.id"> {{ gender.name }}</option>
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
                                                <label class="form-control-label" for="input-username">Height (cm)</label>
                                                <input type="text" id="input-username" class="form-control form-control-alternative" v-model="donor.height">
                                                <!-- <span class="text-danger" v-if="errors.first_name">{{ errors.first_name[0] }}</span> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Weight (kg)</label>
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

                                     <hr/>
                                    <h6 class="heading-small text-muted mb-4">Donor User</h6>


                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Email</label>
                                                <input type="text" id="input-username" placeholder="Enter Email" class="form-control form-control-alternative" v-model="donor.email">
                                                <span class="text-danger" v-if="errors.email">{{ errors.email[0] }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="form-group">
                                                <label class="form-control-label" for="role">Role</label>
                                                <select class="form-control" v-model="donor.role_id">
                                                    <option value="">Select Role</option>
                                                    <option v-for="(role,g) in roles" v-bind:key="g" :value="role.id"> {{ role.name }}</option>
                                                </select>
                                                <span class="text-danger" v-if="errors.role_id  ">{{ errors.role_id[0] }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Password</label>
                                                <input type="password" id="input-username" placeholder="Enter Password" class="form-control form-control-alternative" v-model="donor.password">
                                                <span class="text-danger" v-if="errors.password">{{ errors.password[0] }}</span>
                                            </div>
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

<script>
export default {

    props: ['donor_id'],

    data() {
        return {
            errors: [],
            donors: [],
            keywords: '',
            currentPage: 0,
            itemsPerPage: 10,
            donor: {},
            genders: [],
            bloodtypes: [],
            rhgroups: [],
            submitted: false,
            roles: [],
        }
    },

    mounted() {
        this.getDonors()
        this.fetchGenders();
        this.fetchBloodTypes();
        this.fetchrhgroups();
        this.fetchRole();
    },

    computed: {
        createLink(){
            return window.location.origin+'/donors/create';
        },
    },

    methods: {

        updateDonorsProfile(data) {
            console.log('donor donor: ', data)
            axios.post(`/api/donors/${data.id}`, data)
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

        getDonors() {
            axios.get(`/api/donors/${this.donor_id}`)
                .then(response => {
                    this.donor = response.data.data;
                    // console.log('check blood request: ', this.donors)
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                })
        },

        fetchRole(){
            axios.get('/api/roles')
            .then(response => { 
                this.roles = response.data;
            })
        },
    }
}
</script>