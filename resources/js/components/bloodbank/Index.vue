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
                      <h5 class="card-title text-uppercase text-muted mb-0">A+</h5>
                      <span class="h1 font-weight-bold mb-0">{{ bloodTypeCount.a_pos }}</span>
                    </div>
                    <div class="col">
                       <h5 class="card-title text-uppercase text-muted mb-0">A-</h5>
                      <span class="h1 font-weight-bold mb-0">{{ bloodTypeCount.a_neg }}</span>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <!-- <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span> -->
                    <span class="text-nowrap">Since last month</span>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">B+</h5>
                      <span class="h2 font-weight-bold mb-0">{{ bloodTypeCount.b_pos }}</span>
                    </div>
                    <div class="col">
                       <h5 class="card-title text-uppercase text-muted mb-0">B-</h5>
                      <span class="h1 font-weight-bold mb-0">{{ bloodTypeCount.b_neg }}</span>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <!-- <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span> -->
                    <span class="text-nowrap">Since last month</span>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">AB+</h5>
                      <span class="h2 font-weight-bold mb-0">{{ bloodTypeCount.ab_pos }}</span>
                    </div>
                    <div class="col">
                       <h5 class="card-title text-uppercase text-muted mb-0">AB-</h5>
                      <span class="h1 font-weight-bold mb-0">{{ bloodTypeCount.ab_neg }}</span>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <!-- <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span> -->
                    <span class="text-nowrap">Since last month</span>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">O+</h5>
                      <span class="h2 font-weight-bold mb-0">{{ bloodTypeCount.o_pos }}</span>
                    </div>
                    <div class="col">
                       <h5 class="card-title text-uppercase text-muted mb-0">O-</h5>
                      <span class="h1 font-weight-bold mb-0">{{ bloodTypeCount.o_neg }}</span>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <!-- <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span> -->
                    <span class="text-nowrap">Since last month</span>
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
                                    <h3 class="mb-0">Blood Inventory</h3>
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
                                    <th scope="col">Blood Type</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Remarks</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="bloodbanks.length === 0">
                                        <td  colspan="3">
                                            <h3 class="text-muted text-center pt-3 pb-3">No Data</h3>
                                        </td>
                                    </tr>
                                    <tr v-else v-for="(bloodbank, a) in bloodbanks" v-bind:key="a">
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
                                        <td>{{ bloodbank.blood_type ? bloodbank.blood_type.name : 'N/A' }}</td>
                                        <td>{{ bloodbank.quantity }}</td>
                                        <td>{{ bloodbank.remarks }}</td>
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
            bloodbanks: [],
            keywords: '',
            bloodTypeCount: {
                a: 0,
                b: 0,
                ab: 0,
                o: 0,
            },
            currentPage: 0,
            itemsPerPage: 10,
        }
    },

    mounted() {
        this.fetchBloodBank()
        this.fetchBloodTypeCount()
    },

    computed: {
        createLink(){
            return window.location.origin+'/blood-banks/create';
        },
    },

    methods: {
        fetchBloodBank() {
            axios.get('/api/blood-banks')
                .then(response => {
                    this.bloodbanks = response.data;
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                })
        },
        fetchBloodTypeCount() {
            axios.get('/api/blood-banks/count')
                .then(response => {
                    this.bloodTypeCount = response.data;
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                })
        }
    }
}
</script>