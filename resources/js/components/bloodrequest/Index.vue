<template>
  <div>
        <div class="header bg-red pb-6 pt-5 pt-md-6"></div>
        <div class="container-fluid mt--7">

        <div class="header-body">
         
          <!-- Card stats -->
          <div class="row">

            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Approved</h5>
                      <span class="h1 font-weight-bold mb-0">{{ totalApprovedRequests }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <!-- <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span> -->
                  </p>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Pending</h5>
                      <span class="h1 font-weight-bold mb-0">{{ totalPending }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <!-- <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                        <span class="text-nowrap">Since last month</span> -->
                  </p>
                </div>
              </div>
            </div>

            

          </div>
        </div>

            <!-- Table -->
            <div class="row ">
                <div class="col">
                    <div class="card shadow">

                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Blood Requests</h3>
                                </div>
                                <div class="col text-right">
                                    <a v-if="isAuthorized(3)" :href="createLink" class="btn btn-sm btn-primary text-white" data-toggle="modal" data-target="#addModal">Add New</a>
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
                                    <th scope="col">Patient Name</th>
                                    <th scope="col">Diagnosies</th>
                                    <th scope="col">Bag Quantiy</th>
                                    <th scope="col">Hospital</th>
                                    <th scope="col">Blood Type</th>
                                    <th scope="col">Purpose</th>
                                    <th scope="col">Status</th>
                                    <th scope="col"></th>
                                    <th scope="col" v-if="isAuthorized(1)"></th>
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
                                        <td>{{ request.hospital ? request.hospital.hospital_name : 'N/A' }}</td>
                                        <td>{{ request.hospital ? request.bloodType.name : 'N/A' }}</td>
                                        <td>{{ request.purpose ? request.purpose.name : 'N/A' }}</td>
                                        <td>{{ request.status ? request.status.name : 'Pending' }}</td>
                                        <td>
                                            <a v-if="!request.status" :href="`/blood-requests/edit/${ request.id }`" class="btn btn-primary btn-sm"> Edit </a>
                                            <button v-if="!request.status" @click="removeRequest(request.id)" class="btn btn-danger btn-sm"> Delete </button>

                                            <button v-if="request.status" disabled  class="btn btn-secondary btn-sm"> Edit </button>
                                            <button v-if="request.status" disabled class="btn btn-secondary btn-sm"> Delete </button>
                                        </td>
                                        <td v-if="isAuthorized(1)">
                                            <span v-if="!request.status">
                                            <a :href="`/blood-requests/show-approval/${ request.id }`" class="btn btn-primary btn-sm"> For Approval </a>
                                            </span>
                                            <span v-else>
                                            <a disabled href="#" class="text-uppercase btn btn-secondary btn-sm"> {{ request.status.name }} </a>
                                            </span>
                                           
                                            <!-- <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="#approveModal" data-toggle="modal">Approve</a>
                                                    <a class="dropdown-item" href="#disapproveModal" data-toggle="modal">Disapprove</a>
                                                </div>
                                            </div> -->
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


         <!-- Approve Modal-->
            <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- <input type="hidden" v-model="user_id"> -->
                            <h5 class="modal-title" id="exampleModalLabel">Approve Schedule</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        Are you sure you want to approve this Schedule?
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss='modal'>Close</button>
                            <button class="btn btn-primary" @click="confirmRequest(request, 1)">Approve</button>
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
            totalApprovedBags: 0,
            totalApprovedRequests: 0,
            totalPending: 0,
            errors: [],
            bloodRequests: [],
            keywords: '',
            currentPage: 0,
            itemsPerPage: 10,
        }
    },

    mounted() {
        this.getBloodRequests()
        this.getApprovedBags()
        this.getApprovedRequests()
        this.getTotalPending()
    },

    computed: {
        createLink(){
            return window.location.origin+'/blood-requests/create';
        },
    },

    methods: {

        removeRequest(id) {

            axios.delete(`/api/blood-requests/delete/${id}`)
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

        confirmRequest(request, status) {
            console.log('request dialog')
        },

        getBloodRequests() {
            axios.get('/api/blood-requests')
                .then(response => {
                    this.bloodRequests = response.data.data;
                    console.log('check blood request: ', this.bloodRequests)
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                })
        },

        getApprovedBags() {
            axios.get('/api/blood-requests/total-approved')
                .then(response => {
                    console.log('check blood total: ', response.data)
                    this.totalApprovedBags = response.data;
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                })
        },

        getApprovedRequests() {
            axios.get('/api/blood-requests/total-approved-req')
                .then(response => {
                    this.totalApprovedRequests = response.data;
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                })
        },

        getTotalPending() {
            axios.get('/api/blood-requests/total-pending-req')
                .then(response => {
                    this.totalPending = response.data;
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                })
        },

    }
}
</script>