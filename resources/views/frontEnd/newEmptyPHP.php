
 
    <body>
        <!--header-->
        <div class="header">
             @include('frontEnd.includes.header-top')
             
             @include('frontEnd.includes.header-bottom')
      
        </div>
        <!--header-->
        
        <!--content-->
        @yield('mainContent')
        <!--content-->
        
        <!---footer--->
         @include('frontEnd.includes.footer')
        <!---footer--->
     
  
 
        
        
        
   

    </body> 