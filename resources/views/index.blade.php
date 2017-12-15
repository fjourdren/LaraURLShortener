<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/png" href="/public/img/icone.png" />

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

        <title>{{ config('app.name') }}</title>

    </head>
    <body>

        <div class="container">
            <header class="header clearfix">
                <nav>
                    <ul class="nav nav-pills float-right">
                        <li class="nav-item">
                            <a class="nav-link" href="https://github.com/fjourdren/LaraURLShortener">Github</a>
                        </li>
                    </ul>
                </nav>
                <h3 class="text-muted">{{ config('app.name') }}</h3>
            </header>

            <div class="panel panel-default">

            
                @if (Session::has('danger'))
                    <div class="flash danger"></div>
                    <div class="alert alert-danger">
                        <strong>Error !</strong> {!! Session::get('danger') !!}
                    </div>
                @endif
                
                @if (Session::has('sucess'))
                    <div class="flash sucess"></div>
                    <div class="alert alert-success">
                        <strong>Success !</strong> {!! Session::get('sucess') !!}
                    </div>
                @endif


                <form action="post" method="post">
                    
                    <div class="pb-2 pt-4 row">
                        <div class="col-lg-12">
                            <div class="input-group input-group-lg">
                                <input type="text" class="form-control input-lg" id="urltext" name="url" placeholder="Enter URL" required>

                                <span class="input-group-btn">
                                    <input type="submit" class="btn btn-primary btn-lg" value="Shorten URL !"/>
                                </span>
                            </div>
                        </div>
                    </div>

                    {{ csrf_field() }}
                
                </form>


                
            
            
            </div>


            <footer class="mt-5 footer text-center">
                <p>Developed by <a href="https://github.com/fjourdren" target="_blank">Flavien Jourdren</a></p>
            </footer>

        </div>

    </body>
</html>
