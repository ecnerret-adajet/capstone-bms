<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="/img/brand/bms_logo.png" height="200px" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            @role('administrator|requestor')
            <li class="nav-item">
              <a class="nav-link active" href="{{ url('/') }}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            @endrole

            <li class="nav-item">
              <a class="nav-link" href="{{ url('/events') }}">
                <i class="ni ni-calendar-grid-58 text-primary"></i>
                <span class="nav-link-text">Events</span>
              </a>
            </li>

            @role('administrator|requestor')
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/blood-requests') }}">
                <i class="ni ni-support-16  text-red"></i>
                <span class="nav-link-text">Blood Requests</span>
              </a>
            </li>
            @endrole
      
            @role('administrator|requestor')
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/blood-banks') }}">
                <i class="ni ni-app  text-red"></i>
                <span class="nav-link-text">Blood Inventory</span>
              </a>
            </li>
            @endrole

            @role('requestor') 
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/hospitals/profile') }}">
                <i class="ni ni-circle-08  text-orange"></i>
                <span class="nav-link-text">Hospital Profile</span>
              </a>
            </li>
            @endrole

            @role('administrator')
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/donors') }}">
                <i class="ni ni-favourite-28  text-red"></i>
                <span class="nav-link-text">Donors</span>
              </a>
            </li>
            @endlevel
            @role('donor')
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/donors/profile') }}">
                <i class="ni ni-circle-08  text-blue"></i>
                <span class="nav-link-text">Donor Profile</span>
              </a>
            </li>
            @endlevel

            @role('administrator')
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/hospitals') }}">
                <i class="ni ni-building  text-red"></i>
                <span class="nav-link-text">Hospitals</span>
              </a>
            </li>
            @endrole

            @role('administrator')
            {{-- <li class="nav-item">
              <a class="nav-link" href="examples/map.html">
                <i class="ni ni-pin-3 text-primary"></i>
                <span class="nav-link-text">Blood Types</span>
              </a>
            </li> --}}

            {{-- <li class="nav-item">
              <a class="nav-link" href="examples/profile.html">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Notification</span>
              </a>
            </li> --}}
            
            {{-- <li class="nav-item">
              <a class="nav-link" href="{{ url('/users') }}">
                <i class="ni ni-circle-08  text-pink"></i>
                <span class="nav-link-text">Users</span>
              </a>
            </li> --}}
            @endrole
            {{-- <li>
              <a data-toggle="collapse" href="#Report" class="collapsed" aria-expanded="false">
                  <div class="nav-link">
                      <i class="ni ni-ruler-pencil text-pink"></i>
                      <span>Master Data</span>
                  </div>
              </a>
              <div class="collapse space-left" id="Report" style="">
                  <ul class="nav" style="list-style-type: none;">
                      <li class="nav-item">
                          <a class="nav-link" href="{{ url('/blood-types') }}">
                              <i class="ni ni-books text-gray"></i> Blood Type
                          </a>
                      </li>
                      <li>
                          <a class="nav-link" href="{{ url('/urgencies') }}">
                              <i class="ni ni-collection text-indigo"></i> Urgency Types
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ url('/rh-group') }}">
                              <i class="ni ni-spaceship text-indigo"></i>RH Group
                          </a>
                      </li>

                      <li class="nav-item">
                          <a class="nav-link" href="{{ url('/purposes') }}">
                              <i class="ni ni-chart-pie-35 text-danger"></i> Purposes
                          </a>
                      </li>
                  </ul>
              </div>
          </li> --}}
            {{-- <li class="nav-item">
              <a class="nav-link" href="examples/tables.html">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Tables</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="examples/login.html">
                <i class="ni ni-key-25 text-info"></i>
                <span class="nav-link-text">Login</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="examples/register.html">
                <i class="ni ni-circle-08 text-pink"></i>
                <span class="nav-link-text">Register</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="examples/upgrade.html">
                <i class="ni ni-send text-dark"></i>
                <span class="nav-link-text">Upgrade</span>
              </a>
            </li> --}}
          </ul>



          {{-- <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Documentation</span>
          </h6> --}}
          <!-- Navigation -->
          {{-- <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html" target="_blank">
                <i class="ni ni-spaceship"></i>
                <span class="nav-link-text">Getting started</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html" target="_blank">
                <i class="ni ni-palette"></i>
                <span class="nav-link-text">Foundation</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html" target="_blank">
                <i class="ni ni-ui-04"></i>
                <span class="nav-link-text">Components</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/plugins/charts.html" target="_blank">
                <i class="ni ni-chart-pie-35"></i>
                <span class="nav-link-text">Plugins</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link active active-pro" href="examples/upgrade.html">
                <i class="ni ni-send text-dark"></i>
                <span class="nav-link-text">Upgrade to PRO</span>
              </a>
            </li>
          </ul> --}}
        </div>
      </div>
    </div>
  </nav>