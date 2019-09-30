<?php 
  $cartCollection = Cart::getContent();
// echo"<pre>";
// print_r($cartCollection);
//
// exit();

?>

<header id="htc__header" class="htc__header__area header--one">
    <!-- Start Mainmenu Area -->
    <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
        <div class="container">
            <div class="row">
                <div class="menumenu__container clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                        <div class="logo">
                            <a href="{{URL::to('/')}}"><img src="{{asset('public/frontEnd/')}}/{{asset('public/frontEnd/')}}/{{asset('public/frontEnd/')}}/images/logo/4.png" alt="logo images"></a>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                        <nav class="main__menu__nav hidden-xs hidden-sm">
                            <ul class="main__menu">
                                <li class="drop"><a href="{{URL::to('/')}}">Home</a></li>
                                <?php
                                $allPublishedMainCategory = DB::table('tbl_categories')
                                        ->where('category_publicationStatus', 1)
                                        ->select('*')
                                        ->get();
                                ?>
                                @foreach($allPublishedMainCategory as $mainCategory)
                                <li class="drop">
                                    <a href="{{URL::to('/product/'.$mainCategory ->category_name.'/'.$mainCategory ->category_id)}}" target="_blank">{{$mainCategory ->category_name}}</a>




                                    <ul class="dropdown mega_dropdown">
                                        <!-- Start Single Mega MEnu -->
                                        <?php
                                        $main_category_id = $mainCategory->category_id;
                                        //echo $main_category_id;

                                        $allPublishedSubCategory = DB::table('tbl_sub_categories')
                                                ->where('category_id', $main_category_id)
                                                ->where('sub_category_publicationStatus', 1)
                                                ->select('*')
                                                ->get();
                                        ?>

                                        @foreach($allPublishedSubCategory as $subCategory)
                                        <li><a class="mega__title" href="{{$subCategory ->sub_category_id}}">{{$subCategory ->sub_category_name}}</a>
                                            <?php
                                            $sub_category_id = $subCategory->sub_category_id;

                                            $allPublishedMiniCategory = DB::table('tbl_mini_categories')
                                                    ->where('sub_category_id', $sub_category_id)
                                                    ->where('mini_category_publicationStatus', 1)
                                                    ->select('*')
                                                    ->get();
                                            ?>

                                            @foreach($allPublishedMiniCategory as $miniCategory)
                                            <ul class="mega__item">
                                                <li><a href="{{URL::to('/products/'.$miniCategory ->mini_category_name.'/'.$miniCategory ->mini_category_id)}}" target="_blank">{{$miniCategory ->mini_category_name}}</a></li>

                                            </ul>
                                            @endforeach

                                        </li>
                                        @endforeach

                                        <!-- End Single Mega MEnu -->
                                    </ul>
                                </li>
                                @endforeach










                                <li><a href="contact.html">contact</a></li>





                                <li><a href="{{URL::to('/wp/admin/master/login/form/showing')}}" target="_blank">admin</a></li>
                            </ul>
                        </nav>

                        <div class="mobile-menu clearfix visible-xs visible-sm">
                            <nav id="mobile_dropdown">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="blog.html">blog</a></li>
                                    <li><a href="#">pages</a>
                                        <ul>
                                            <li><a href="blog.html" target="_blank">Blog</a></li>
                                            <li><a href="blog-details.html" target="_blank">Blog Details</a></li>
                                            <li><a href="cart.html" target="_blank">Cart page</a></li>
                                            <li><a href="checkout.html" target="_blank">checkout</a></li>
                                            <li><a href="contact.html" target="_blank">contact</a></li>
                                            <li><a href="product-grid.html" target="_blank">product grid</a></li>
                                            <li><a href="product-details.html" target="_blank">product details</a></li>
                                            <li><a href="wishlist.html" target="_blank">wishlist</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html" target="_blank">contact</a></li>

                                </ul>
                            </nav>
                        </div>  
                    </div>
                    <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                        <div class="header__right">
                            <div class="header__search search search__open">
                                <a href="#"><i class="icon-magnifier icons"></i></a>
                            </div>
                            
                            
                            <div class="header__account">
                                                 <?php 
                           $customer_id = Session::get('user_customer_id');

                            if($customer_id != NULL){
                           ?>
                       
                            <a href="{{URL::to('customer/dashboard')}}" target="_blank"><i class="icon-user icons"></i>  {{Session::get('user_customer_name')}}</a>
                              
                                 
                             <?php                            
                             }else  {
                          ?> 
                                  <a href="{{URL::to('customer/login')}}" target="_blank"><i class="icon-login  icons"></i>login</a>
                                           <?php   }   ?>
                                
                 
                            </div>
                                         
                            
                            <div class="header__account">
                           
                                  
                 
                            </div>
                            
                            
                            <div class="htc__shopping__cart">
                                <a class="cart" href="{{URL::to('/show/cart' )}}" target="_blank">
                                    <i class="icon-handbag icons"></i>
                                </a>
                                <a href="{{URL::to('/show/cart' )}}" target="_blank">
                                    <span class="htc__qua">
                                    <?php 
                                $cartTotalQuantity = Cart::getTotalQuantity();
                                echo $cartTotalQuantity;
                                ?></span>
                                </a>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-area"></div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>