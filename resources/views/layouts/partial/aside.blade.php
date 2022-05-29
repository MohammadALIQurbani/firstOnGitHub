  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="{{ asset('template/dasbhoard/dist/img/AdminLTELogo.png') }}" alt="admin Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">admin dashboard</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('template/dasbhoard/dist/img/user2-160x160.jpg') }}"
                      class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  @auth
                      <a href="#" class="d-block">{{ auth()->user()->name }}</a>

                  @endauth
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item">
                      <a href="{{ route('home') }}" class="nav-link">
                          <i class="nav-icon fas fa-list"></i>
                          <p>
                              dashboard
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('home') }}" class="nav-link">
                          <i class="nav-icon fas fa-list"></i>
                          <p>
                              cvs
                          </p>
                      </a>
                  </li>
                  @if (auth()->user()->role == 'supperAdmin')
                      <li class="nav-item">
                          <a href="{{ route('jobpost.income') }}" class="nav-link">
                              <i class="nav-icon fa fa-cog ">
                                  {{-- <i class="fa fa-cog"></i> --}}
                              </i>
                              <p>
                                  jop post income
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('send.employeer.mail') }}" class="nav-link">
                              <i class="nav-icon fa fa-cog ">
                                  {{-- <i class="fa fa-cog"></i> --}}
                              </i>
                              <p>
                                  email to employeers
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('admin.create.account') }}" class="nav-link">
                              <i class="nav-icon fas fa-user ">
                                  {{-- <i class="fa fa-cog"></i> --}}
                              </i>
                              <p>
                                  create user account
                              </p>
                          </a>
                      </li>

                      <li class="nav-item">
                          <a href="" class="nav-link">
                              <i class="nav-icon fas fa-users"></i>
                              <p>
                                  supper admins
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="" class="nav-link">
                              <i class="nav-icon fas fa-users"></i>
                              <p>
                                  sub admins
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('employeer.index') }}" class="nav-link">
                              <i class="nav-icon fas fa-users"></i>
                              <p>
                                  Employeers
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('employeerAccount.index') }}" class="nav-link">
                              <i class="nav-icon fas fa-cogs"></i>
                              <p>
                                  Add employeer account
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('employeerAccount.accountList') }}" class="nav-link">
                              <i class="nav-icon fas fa-cogs"></i>
                              <p>
                                  employeer account list
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('FunctionArea.index') }}" class="nav-link">
                              <i class="nav-icon fas fa-tags"></i>
                              <p>
                                  FunctionalArea
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('jobPost.index') }}" class="nav-link">
                              <i class="nav-icon fas fa-tasks"></i>
                              <p>
                                  job posts
                              </p>
                          </a>
                      </li>

                      <li class="nav-item">
                          <a href="{{ route('jobpost.deactive.index') }}" class="nav-link">
                              <i class="nav-icon fas fa-tasks"></i>
                              <p>
                                  deactive job posts
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('ad.index') }}" class="nav-link">
                              <i class="nav-icon fas fa-tags"></i>
                              <p>
                                  company ads
                              </p>
                          </a>
                      </li>

                      <li class="nav-item">
                          <a href="{{ route('ad.active.index') }}" class="nav-link">
                              <i class="nav-icon fas fa-tags"></i>
                              <p>
                                  company deactive ads
                              </p>
                          </a>
                      </li>
                  @elseif(auth()->user()->role == 'employeer')
                      <li class="nav-item">
                          <a href="{{ route('employeer.profile') }}" class="nav-link">
                              <i class="nav-icon fas fa-user"></i>
                              <p>
                                  profile
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('employeerPost.index') }}" class="nav-link">
                              <i class="nav-icon fas fa-tags"></i>
                              <p>
                                  your posts
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('employeerDeactivePost.index') }}" class="nav-link">
                              <i class="nav-icon fas fa-tags"></i>
                              <p>
                                  your deactive posts
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="" class="nav-link">
                              <i class="nav-icon fa fa-book"></i>
                              <p>
                                  cvs
                              </p>
                          </a>
                      </li>
                  @endif

                  <li class="nav-item mb-5">

                      <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                          <i class="nav-icon fas fa-cogs"></i>
                          {{ __('Logout') }}

                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
