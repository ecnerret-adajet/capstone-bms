<template>
  <div>
        <div class="header bg-red pb-6 pt-5 pt-md-6"></div>
        <div class="container-fluid mt--7">
            <!-- Table -->
            <div class="row mt-5">
                <div class="col">
                    <div class="card shadow">

                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Hospitals</h3>
                                </div>
                                <div class="col text-right">
                                    <a :href="createLink" class="btn btn-sm btn-primary text-white" data-toggle="modal" data-target="#addModal">Add New</a>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-md-4 float-left">
                                <input type="text" class="form-control" placeholder="Search" v-model="keywords" id="name">
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">User</th>
                                    <th scope="col"  v-if="isAuthorized(1)"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="hospitals.length === 0">
                                        <td colspan="4">
                                        <h3 class="text-muted text-center pt-3 pb-3">No Data</h3>
                                        </td>
                                    </tr>
                                    <tr v-else v-for="(hospital, a) in hospitals" v-bind:key="a">
                                        <!-- <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="javascript:void(0)" @click="copyObject(announcement)" data-toggle="modal" data-target="#editModal">Edit</a>
                                                    <a class="dropdown-item" href="#deleteModal" data-toggle="modal" @click="getAnnouncementId(announcement.id)">Delete</a>
                                                </div>
                                            </div>
                                        </td> -->
                                        <td>{{ hospital.hospital_name }}</td>
                                        <td>{{ hospital.address }}</td>
                                        <td>{{ hospital.user.name }}</td>
                                        <td  v-if="isAuthorized(1)">
                                             <a :href="`/hospitals/edit/${hospital.id }`" class="btn btn-primary btn-sm"> Edit </a>
                                            <button @click="deleteItem(hospital.id)" class="btn btn-danger btn-sm"> Delete </button>
                                        </td>
                                        <!-- <td>{{ request.created_at }}</td>
                                        <td>{{ request.updated_at }}</td> -->
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                       <!-- <div class="card-footer py-4">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-end mb-0">
                                    <li class="page-item">
                                        <button :disabled="!showPreviousLink()" class="page-link" v-on:click="setPage(currentPage - 1)"> <i class="fas fa-angle-left"></i> </button>
                                    </li>
                                    <li class="page-item">
                                        Page {{ currentPage + 1 }} of {{ totalPages }}
                                    </li>
                                    <li class="page-item">
                                        <button :disabled="!showNextLink()" class="page-link" v-on:click="setPage(currentPage + 1)"><i class="fas fa-angle-right"></i> </button>
                                    </li>
                                </ul>
                            </nav>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

    props:['roles'],

    data() {
        return {
            errors: [],
            hospitals: [],
            keywords: '',
            currentPage: 0,
            itemsPerPage: 10,
        }
    },

    mounted() {
        this.getHospitals()
    },

    computed: {
        createLink(){
            return window.location.origin+'/hospitals/create';
        },
    },

    methods: {
        getHospitals() {
            axios.get('/api/hospitals')
                .then(response => {
                    this.hospitals = response.data.data;
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                })
        },

        deleteItem(id) {

            axios.delete(`/api/hospitals/${id}`)
            .then(response => {
                if(response.status === 200) {
                    window.location.href = response.data.redirect;
                }
            })

        },

        isAuthorized(id) {
            if(this.roles) {
                if(this.roles.includes(id)) {
                    return true;
                }
                return false;
            }
            return false;
        },
    }
}
</script>