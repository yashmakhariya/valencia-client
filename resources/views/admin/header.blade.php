<!-- Modal -->
<div class="modal fade" id="gst-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{url('admin/change-setting')}}" autocomplete="off" method="post">  
                @csrf
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Settings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <label for="name">Admin Name</label>
                    <input type="text" required placeholder="Your Name" name="name" value="{{Auth::guard('admin')->user()->name}}" class="input-group-text input-box" autocomplete="off">

                    <br>
                    <label for="email">Email</label>
                    <input type="email" required placeholder="Email Address" name="email" value="{{Auth::guard('admin')->user()->email}}" class="input-group-text input-box" autocomplete="off">

                    <br>
                    <label for="password">Password</label>
                    <input type="password" name="password" required placeholder="Password" class="input-group-text input-box" autocomplete="off">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if (Auth::guard('admin')->user()->role != 0)
<!-- Modal -->
<div class="modal fade" id="add-admin-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('create.admin')}}" autocomplete="off" method="post">  
                @csrf
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Admin Access</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">

                    <span id="comfirm-password-error" class="text-danger"></span>

                    <br>
                    <label for="name">Admin Name</label>
                    <input type="text" required placeholder="Your Name" name="name" class="input-group-text input-box" autocomplete="off">

                    <br>
                    <label for="email">Email</label>
                    <input type="email" required placeholder="Email Address" name="email" class="input-group-text input-box" autocomplete="off">

                    <br>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Password" class="input-group-text input-box" autocomplete="off">
                    
                    <br>
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" id="password-confirm" name="confirm-password" onkeyup="confirmPassword()" required placeholder="Confirm Password" class="input-group-text input-box" autocomplete="off">

                    <script defer>
                        function confirmPassword() {
                            var password = $('#password').val();
                            var conformPassword = $('#password-confirm').val();
                            if (password != conformPassword) {
                                $('#comfirm-password-error').html('Password not matched');
                            }
                            else {
                                $('#comfirm-password-error').html('');
                            }
                        }
                    </script>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Add admin</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif


<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <h4 class="font-weight-bold text-dark mx-2 mt-1">Admin Panel {{env('APP_NAME')}}</h4>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto bg-light rounded w-100 navbar-search">
                    <div class="input-group">
                        <input type="search" style="color: #000;" class="input-group-text"
                            placeholder="Search for...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Logged in as {{Auth::guard('admin')->user()->name}}</span>
                <i class="fas fa-user-circle fa-lg text-gray-500"></i>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a href="{{url('admin/setting')}}" class="dropdown-item">Change Settings</a>
                <div class="dropdown-divider"></div>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</button>
                </form>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->