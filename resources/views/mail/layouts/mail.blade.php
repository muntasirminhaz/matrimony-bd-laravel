<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
    <style>
        html{
            width: 100%;
            background-color: gainsboro;
        }
        body{
            padding: 20px 30px 30px 30px;            
            background-color: #ffffff;                     
        }
    </style>
</head>
<body>

    <header>
        <img style="max-width: 250px; width: 100%;" src="{{ asset('assets/img/home-logo.png') }}" alt="">
    </header>

    <section class="mail-body">        
        @hasSection('mailbody')
        @yield('mailbody')
        @else
        Mail is Send from the MatrimonyBD
        @endif
    </section>
    </body>
</html>