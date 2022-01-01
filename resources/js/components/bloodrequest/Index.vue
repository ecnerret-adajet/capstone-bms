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
                                    <h3 class="mb-0">Blood Requests</h3>
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
                                    <th scope="col"></th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Blood Type</th>
                                    <th scope="col">Hospital</th>
                                    <th scope="col">Patient Name</th>
                                    <th scope="col">Diagnosies</th>
                                    <th scope="col">Bag Quantity</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="bloodRequests.length === 0"  colspan="7">
                                        <h3 class="text-muted text-center pt-3 pb-3">No Data</h3>
                                    </tr>
                                    <tr v-else v-for="(request, a) in bloodRequests" v-bind:key="a">
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
                                        <td>{{ request.patient_name }}</td>
                                        <td>{{ request.diagnosies }}</td>
                                        <td>{{ request.bag_quantity }}</td>
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

    data() {
        return {
            errors: [],
            bloodRequests: [],
            keywords: '',
            currentPage: 0,
            itemsPerPage: 10,
        }
    },

    mounted() {
        this.getBloodRequests()
    },

    computed: {
        createLink(){
            return window.location.origin+'/blood-requests/create';
        },
    },

    methods: {
        getBloodRequests() {
            axios.get('/api/blood-requests')
                .then(response => {
                    this.bloodRequests = response.data;
                    console.log('check blood request: ', this.bloodRequests)
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                })
        }
    }
}
</script>