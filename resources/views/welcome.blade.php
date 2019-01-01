<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Laravel</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div id="app">
            <router-view></router-view>
            <!-- <example-component></example-component> -->
            <!-- <my-component></my-component> -->
            <!-- <conditional-component></conditional-component> -->
            <!-- <list-rendering></list-rendering> -->
            <!-- <user-dashboard></user-dashboard> -->
            <!-- <binding-html></binding-html> -->
            <!-- <event-handling></event-handling> -->
            <!-- <api-calling></api-calling> -->
            <!-- <user-component></user-component> -->
            <!-- <crud-component></crud-component> -->
        </div>
        <script src="/js/app.js"></script>
    </body>
</html>