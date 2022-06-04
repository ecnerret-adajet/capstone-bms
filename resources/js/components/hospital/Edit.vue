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
                                    <h3 class="mb-0">Update Hospital Details</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <h6 class="heading-small text-muted mb-4">Hospital Form</h6>

                                <div class="pl-lg-4">

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Hospital Name</label>
                                                <input type="text" id="input-username" placeholder="Enter Hospital Name" class="form-control form-control-alternative" v-model="hospital.hospital_name">
                                                <span class="text-danger" v-if="errors.hospital_name">{{ errors.hospital_name[0] }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Addres</label>
                                                <input type="text" id="input-username" placeholder="Enter Address" class="form-control form-control-alternative" v-model="hospital.address">
                                                <span class="text-danger" v-if="errors.address">{{ errors.address[0] }}</span>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <hr/>
                                <h6 class="heading-small text-muted mb-4">Hospital User</h6>

                                <div class="pl-lg-4">

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Name</label>
                                                <input type="text" id="input-username" placeholder="Enter Name" class="form-control form-control-alternative" v-model="hospital.name">
                                                <span class="text-danger" v-if="errors.name">{{ errors.name[0] }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Email</label>
                                                <input type="text" id="input-username" placeholder="Enter Email" class="form-control form-control-alternative" v-model="hospital.email">
                                                <span class="text-danger" v-if="errors.email">{{ errors.email[0] }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="form-group">
                                                <label class="form-control-label" for="role">Role</label>
                                                <select class="form-control" v-model="hospital.role_id">
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
                                                <input type="password" id="input-username" placeholder="Enter Password" class="form-control form-control-alternative" v-model="hospital.password">
                                                <span class="text-danger" v-if="errors.password">{{ errors.password[0] }}</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="text">
                                            <button @click="submitForm(hospital)" type="button" class="btn btn-primary mt-4">Save</button>
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
    props: ['hospital_id'],
    data(){
        return{
            errors: [],
            // hospital:{
            //     name: '',
            //     email: '',
            //     password: '',
            //     role_id: '',
            //     hospital_name: '',
            //     address: '',
            // },
            hospital: {},
            roles: [],
        }
    },
    mounted(){
        this.fetchHospitalDetail();
        this.fetchRole();
    },

    methods:{

        fetchHospitalDetail() {
            axios.get(`/api/hospitals/${this.hospital_id}`)
            .then(response => { 
                this.hospital = response.data.data;
                console.log('rest hostpoital: ', this.hospital)
            })
            .catch(error => { 
                this.errors = error.response.data.errors;
            })
        },

        submitForm(data) {
            console.log('check data: ', data)
            axios.post(`/api/hospitals/${this.hospital_id}`, data)
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

        fetchRole(){
            axios.get('/api/roles')
            .then(response => { 
                this.roles = response.data;
            })
        },
    }
}
</script>
