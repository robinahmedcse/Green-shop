<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Admin login</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('public/admin/')}}/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('public/admin/')}}/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('public/admin/')}}/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('public/admin/')}}/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            
            
             <div class="">
                            <h4 class="tex text-center text-danger">{{Session::get('exception')}}
                             <?php 
                             Session::put('exception',NULL);
                             ?>
                            </h4>
                            <br><br>
                     </div> 
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                         {!! Form::open(['url'=>'/admin/master/login/checking/','method'=>'POST' ]) !!}
                                <div class="form-group {{ $errors->has('admin_email') ? ' has-error' : '' }}">
                                 {{Form::email('admin_email',null,['class'=>'form-control','placeholder'=>'Enter Your Email'])}}
                                 
                                 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('admin_email') }}</strong>
                                    </span>
                                @endif
                                </div>
                        
                                <div class="form-group {{ $errors->has('admin_password') ? ' has-error' : '' }}">
                                  {{Form::password('admin_password',['class'=>'form-control','placeholder'=>'Enter Your Password'])}}
                               @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('admin_password') }}</strong>
                                    </span>
                                @endif
                                </div>
                        
                                <div class="checkbox">
                                    <label>
                                        {{Form::checkbox('name','remenberMe')}}Remember Me
                                    </label>
                                </div>
                         
                           <div class="form-group">
                                {{Form::submit('login',['class'=>'btn btn-lg btn-success btn-block','name'=>'btn'])}} 
                          </div>   
                       {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('public/admin/')}}/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('public/admin/')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('public/admin/')}}/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('public/admin/')}}/dist/js/sb-admin-2.js"></script>

</body>

</html>
