<!DOCTYPE html>
<html lang="es-Mx">
<head>
    <!-- META SECTION -->
    <title>UMAEE | Iniciar sesión</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!--Meta Google-->
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="nofollow">
    <meta name="googlebot" content="nofollow">
    <meta name="google" content="notranslate" />
    <meta name="author" content="Chontal Developers" />
    <meta name="copyright" content="2015 c-develpers.com Todos los derechos reservados." />
    <meta name="application-name" content="C-Developers" />
    <link rel="author" href="https://plus.google.com/u/0/101316577346995540804/posts"/>

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" href="{{url('dash/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('dash/css/formValidation.min.css')}}" media="screen">
    <link rel="stylesheet" href="{{url('dash/css/signin.css')}}" media="screen">
    <!-- EOF CSS INCLUDE -->
</head>
<body>
{{ content() }}
    {% block head %}
        {{ assets.outputJs('JsIndexLogin') }}
    {% endblock %}

</body>
</html>
