<template>
    <div>
    <div class="header bg-danger pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Default</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <!-- <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a> -->
            </div>
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Approved</h5>
                      <span class="h2 font-weight-bold mb-0">{{ totalApprovedRequests }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                  <!-- <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p> -->
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Pending</h5>
                      <span class="h2 font-weight-bold mb-0">{{ totalPending }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                  <!-- <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p> -->
                </div>
              </div>
            </div>
          </div>

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
      </div>
    </div>

    <!-- Page content -->
     

        <footer></footer>
    </div>
</template>

<script>

import Footer from './util/Footer.vue';

export default {
    // code here
    components: {
      Footer
    },

    data() {
      return {
        totalApprovedBags: 0,
        totalApprovedRequests: 0,
        totalPending: 0,
        bloodTypeCount: {
            a: 0,
            b: 0,
            ab: 0,
            o: 0,
        },
      }
    },

    mounted() {
        this.getApprovedBags()
        this.getApprovedRequests()
        this.getTotalPending()
        this.fetchBloodTypeCount()
    },

    methods: {
      fetchBloodTypeCount() {
          axios.get('/api/blood-banks/count')
              .then(response => {
                  this.bloodTypeCount = response.data;
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
