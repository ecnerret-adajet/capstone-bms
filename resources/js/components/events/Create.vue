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
                                    <h3 class="mb-0">Add Event</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <h6 class="heading-small text-muted mb-4">Event Form</h6>

                                <div class="pl-lg-4">

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Title</label>
                                                <input type="text" id="input-username" placeholder="Enter Event Title" class="form-control form-control-alternative" v-model="event.title">
                                                <span class="text-danger" v-if="errors.title">{{ errors.title[0] }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                            <label class="form-control-label">Description</label>
                                            <textarea  v-model="event.description" rows="4" class="form-control" placeholder="Enter Description ..." spellcheck="false">Enter Description</textarea>
                                            <span class="text-danger" v-if="errors.description">{{ errors.description[0] }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                            <label class="form-control-label">Location</label>
                                            <input type="text" id="input-username" class="form-control form-control-alternative" v-model="event.location">
                                            <span class="text-danger" v-if="errors.location">{{ errors.location[0] }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                           <div class="form-group">
                                                <label class="form-control-label" for="input-username">Start date</label>
                                                <input type="date" id="input-username" class="form-control form-control-alternative" v-model="event.start_date">
                                                <span class="text-danger" v-if="errors.start_date">{{ errors.start_date[0] }}</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                           <div class="form-group">
                                                <label class="form-control-label" for="input-username">End date</label>
                                                <input type="date" id="input-username" class="form-control form-control-alternative" v-model="event.end_date">
                                                <span class="text-danger" v-if="errors.end_date">{{ errors.end_date[0] }}</span>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                     <hr/>

                                <div class="pl-lg-4">
                                    <h6 class="heading-small text-muted mb-4">Event User</h6>


                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Representative Name</label>
                                                <input type="text" id="input-username" placeholder="Enter Representataive Name" class="form-control form-control-alternative" v-model="event.representative_name">
                                                <span class="text-danger" v-if="errors.representative_name">{{ errors.representative_name[0] }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Email</label>
                                                <input type="text" id="input-username" placeholder="Enter Email" class="form-control form-control-alternative" v-model="event.email">
                                                <span class="text-danger" v-if="errors.email">{{ errors.email[0] }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="row">
                                        <div class="col-lg">
                                            <div class="form-group">
                                                <label class="form-control-label" for="role">Role</label>
                                                <select class="form-control" v-model="event.role_id">
                                                    <option value="">Select Role</option>
                                                    <option v-for="(role,g) in roles" v-bind:key="g" :value="role.id"> {{ role.name }}</option>
                                                </select>
                                                <span class="text-danger" v-if="errors.role_id  ">{{ errors.role_id[0] }}</span>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Password</label>
                                                <input type="password" id="input-username" placeholder="Enter Password" class="form-control form-control-alternative" v-model="event.password">
                                                <span class="text-danger" v-if="errors.password">{{ errors.password[0] }}</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="text">
                                            <button @click="submitForm(event)" type="button" class="btn btn-primary mt-4">Save</button>
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
            event:{
                title: '',
                descripton: '',
                start_date: '',
                end_date: '',
                location: '',
                email: '',
                password: '',
                representative_name: '',
            },
            roles: [],
        }
    },
    mounted(){
        this.fetchRole();
    },

    methods:{

        submitForm(data) {
            console.log('check data: ', data)
            axios.post(`/api/events`, data)
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
