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
                             
                            <a href="{{url('/wp-admin/master/dashboard')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Main Category Info<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/wp-admin/master/category/main/add')}}">Add Main Category</a>
                                </li>
                                <li>
                                    <a href="{{url('/wp-admin/master/category/main/manage')}}">Manage Main Category</a>
                                </li>
                            </ul>
                        </li>
                          <li>
                            <a href="#"><i class="fa fa-anchor fa-fw"></i>Sub Category Info<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/wp-admin/master/category/sub/add')}}">Add Sub Category</a>
                                </li>
                                <li>
                                    <a href="{{url('/wp-admin/master/category/sub/manage')}}">Manage Sub Category</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-anchor fa-fw"></i>Mini Category Info<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/wp-admin/master/category/mini/add')}}">Add Mini Category</a>
                                </li>
                                <li>
                                    <a href="{{url('/wp-admin/master/category/mini/manage')}}">Manage Mini Category</a>
                                </li>
                            </ul>
                        </li>
                     
                        <li>
                            <a href="#"><i class="fa fa-bookmark fa-fw"></i> Manufacture Info<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('wp-admin/master/manufacture/add')}}">Add Manufacture</a>
                                </li>
                                <li>
                                    <a href="{{url('/wp-admin/master/manufacture/manage')}}">Manage Manufacture</a>
                                </li>
                            </ul>
                          
                        </li>
                        
                  
                         <li>
                            <a href="#"><i class="fa fa-phone fa-fw"></i> Product Info<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/wp-admin/master/product/add')}}">Add Product</a>
                                </li>
                                <li>
                                    <a href="{{url('/wp-admin/master/product/manage')}}">Manage Product</a>
                                </li>
                            </ul>
                          
                        </li>
                        
                           <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Order Info<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/wp-admin/master/all/order/view')}}">View All Order</a>
                                </li>                            
                            </ul>
                          
                        </li>
                        
                 
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>