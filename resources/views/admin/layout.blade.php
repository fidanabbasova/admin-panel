<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
    <script src="{{ asset('js/main.js') }}">
    </script>
</head>
<body>
    <div class="col-xs-2 col-sm-3" id="admin-nav">
        <nav class="navbar">  
            <div class="navbar-header">
                <a class="navbar-brand text-center" href="{{ url('admin') }}">Admin Panel</a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="{{ Route::currentRouteName() == ('articles') ? 'active' : '' }}">
                        <a href="{{ url('admin/articles') }}"><i class="fas fa-edit" aria-hidden="true"></i><span class="hidden-xs">Məqalələr</span></a>
                    </li>
                    <li class="{{ Route::currentRouteName() == 'categories' ? 'active' : '' }}">
                        <a href="{{ url('admin/categories') }}"><i class="fas fa-table" aria-hidden="true"></i><span class="hidden-xs">Kateqoriyalar</span></a>
                    </li>
                    <li class="{{ Route::currentRouteName() == 'users' ? 'active' : '' }}">
                        <a href="{{ url('admin/users') }}"><i class="fas fa-address-card" aria-hidden="true"></i><span class="hidden-xs">İstifadəçilər</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="row">            
            @yield('right-section')
        </div>
        @yield('modal')
    </div>
</body>
</html>
