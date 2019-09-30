<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                             
                            <a href="{{url('customer/dashboard')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Manage My Account<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('customer/profile/view')}}">Personal Profile</a>
<!--                                    <a href="{{url('customer/shipping/address')}}">Shipping Address</a>-->
                                </li>
                                
                            </ul>
                        </li>
                        
                          <li>
                            <a href="#"><i class="fa fa-anchor fa-fw"></i>My Orders<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('customer/order/view')}}">My Order</a>
<!--                                    <a href="{{url('customer/past/order/view')}}">Past Purchase</a>-->
                                </li>
                              
                            </ul>
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>