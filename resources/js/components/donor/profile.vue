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
                        <h6 class="heading-small text-muted mb-4">User information</h6>
                        <div class="pl-lg-4">
                        <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label class="form-control-label" for="input-username">First Name</label>
                            <input type="text" id="input-username" class="form-control form-control-alternative" v-model="donor.first_name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label class="form-control-label" for="input-email">Last Name</label>
                            <input type="text" id="input-username" class="form-control form-control-alternative" v-model="donor.last_name">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label
                                        class="form-control-label"
                                        for="input-username"
                                        >Email</label
                                    >
                                    <input
                                        disabled
                                        type="email"
                                        id="input-username"
                                        placeholder="Enter Password"
                                        class="form-control form-control-alternative"
                                        v-model="donor.email"
                                    />
                                    <span
                                        class="text-danger"
                                        v-if="errors.email"
                                        >{{
                                            errors.email[0]
                                        }}</span
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label
                                        class="form-control-label"
                                        for="input-username"
                                        >Password</label
                                    >
                                    <input
                                        type="password"
                                        id="input-username"
                                        placeholder="Enter Password"
                                        class="form-control form-control-alternative"
                                        v-model="donor.password"
                                    />
                                    <span
                                        class="text-danger"
                                        v-if="errors.password"
                                        >{{
                                            errors.password[0]
                                        }}</span
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-first-name">Gender</label>
                                <select class="form-control" v-model="donor.gender_id">
                                    <option v-for="(gender,g) in genders" v-bind:key="g" :value="gender.id"> {{ gender.name }}</option>
                                </select>
                                <!-- <label class="form-control-label" for="input-first-name">Phone Number</label>
                                <input type="number" id="input-username" class="form-control form-control-alternative" v-model="donor.phone_number"> -->

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-last-name">Birthdate</label>
                                <input type="date" id="input-username" class="form-control form-control-alternative" v-model="donor.birthdate">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-last-name">Age</label>
                                <input type="text" id="input-username" class="form-control form-control-alternative" v-model="donor.age">
                            </div>
                        </div>
                        </div>
                        </div>

                        <div class="pl-lg-4">
                       
                        <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Height (cm)</label>
                            <input type="text" id="input-username" class="form-control form-control-alternative" v-model="donor.height">
                            <!-- <label class="form-control-label" for="input-first-name">Phone Number</label>
                            <input type="number" id="input-username" class="form-control form-control-alternative" v-model="donor.phone_number"> -->

                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Weight (kg)</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" v-model="donor.weight">
                        </div>
                        </div>
                        </div>
                        </div>

                        <hr class="my-4">

                        <h6 class="heading-small text-muted mb-4">Other information</h6>
                        <div class="pl-lg-4">
                        <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input id="input-address" class="form-control" placeholder="Home Address"  v-model="donor.address" type="text">
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label" for="input-city">Blood Type</label>
                        <!-- <input type="text" id="input-city" class="form-control" placeholder="City" value="New York"> -->
                        <select class="form-control" v-model="donor.blood_type_id">
                            <option v-for="(blood,b) in bloodtypes" v-bind:key="b" :value="blood.id"> {{ blood.name }}</option>
                        </select>
                        </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label class="form-control-label" for="input-country">RH group</label>
                            <!-- <input type="text" id="input-country" class="form-control" placeholder="Country" value="United States"> -->
                            <select class="form-control" v-model="donor.rh_group_id">
                                <option v-for="(rhgroup,b) in rhgroups" v-bind:key="b" :value="rhgroup.id"> {{ rhgroup.name }}</option>
                            </select>
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
            submitted: false
        }
    },

    mounted() {
        this.getDonors()
        this.fetchGenders();
        this.fetchBloodTypes();
        this.fetchrhgroups();
    },

    computed: {
        createLink(){
            return window.location.origin+'/donors/create';
        },
    },

    methods: {

        updateDonorsProfile(data) {
            console.log('check data to send: ', data)
            axios.post(`/api/donors/${data.id}`, data)
            .then(response => {
                console.log('response: ', response.status)
                if(response.status === 200) {
                    this.submitted = true;
                    // window.location.reload;
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
            axios.get('/api/donors-profile')
                .then(response => {
                    this.donor = response.data.data;
                    console.log('check blood request: ', this.donors)
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                })
        }
    }
}
</script>