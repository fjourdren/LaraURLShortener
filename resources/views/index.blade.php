<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="/public/img/icone.png" />

        <title>{{ config('app.name') }}</title>

        <!-- Styles -->
        <style>
            html, body{
                margin: 0;
                padding: 0;
                background-color: lightgrey;
            }

            .content {
                display: block;
                margin-left: auto;
                margin-right: auto;
                text-align: center;
                margin-top: 10%;
            }

            .content input[type="text"] {
                width: 40%;
                height: 17px;
                border: 1px solid black;
                background-color: #ababab;
                margin-left: 0px;
            }

            .content input[type="submit"] {
                border: 1px solid black;
                background-color: #ababab;
                margin-top: 10px;
            }

            .content label {
                font-weight: 600;
                border-top: 1px solid black;
                border-left: 1px solid black;
                border-bottom: 1px solid black;
                padding: 0 5px;

                background-color: #878787;
                margin-right: -4px;
            }

            div.logo {
                display: block;
                margin-left: auto;
                margin-right: auto;
                margin-bottom: 15px;
                border: 1px dotted black;
                min-width: 200px;
                width: 25%;
                font-weight: 900;
                padding: 10px;
                margin-top: 50px;
                background-color: #676767;
            }

            .flash {
                width: auto;
                padding: 5px;
                margin-left: 30px;
                margin-right: 30px;
                margin-bottom: 20px;
                text-align: center;
            }

            .error {
                background-color: red;
                color: #fff;
            }

            .sucess {
                background-color: green;
                color: #fff;
            }

            .sucess a {
                color: #fff;
            }

            .sucess a:hover {
                color: #D3CCC1;
            }

            .footer {
                position: fixed;
                bottom: 0;

                padding: 5px 0;
                width: 100%;
                text-align: center;
                background-color: #878787;
                border-top: 1px dotted black;
            }
        </style>
    </head>
    <body>

        <div class="content">

                @if (Session::has('error'))
                    <div class="flash error"><?php echo session('error'); ?></div>
                @endif
                
                @if (Session::has('sucessId'))
                    <div class="flash sucess"><a href="<?php echo url(session('sucessId')); ?>"><?php echo url(session('sucessId')); ?></a></div>
                @endif

                <div class="logo">{{ config('app.name') }}</div>

                <form action="post" method="post">
                       
                       <label for="url">URL</label>
                       <input type="text" name="url"/><br />
                        

                        {{ csrf_field() }}

                        <input type="submit" value="Shorten URL !"/>
                </form>
        </div>

        <div class="footer">
            <p>Dev by <a href="https://github.com/fjourdren" target="_blank">Flavien Jourdren</a></p>
        </div>

    </body>
</html>
