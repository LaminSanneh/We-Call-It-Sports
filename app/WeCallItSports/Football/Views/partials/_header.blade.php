<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        {{ HTML::style('css/main.css') }}
        {{ HTML::script('js/vendor/modernizr-2.6.2.min.js')}}
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!------------------------ Header ------------------------>
        <header class="layout-header">
            <div class="columns-no-gutter">
                <h1 class="logo grid-8 baby-12 child-12">We Call It Sports</h1>
                <div class="social-links baby-12 grid-4 child-12">
                    <a href="">Link</a>
                    <a href="">Link</a>
                    <a href="">Link</a>
                    <a href="">Link</a>
                    <a href="">Link</a>
                    <a href="">Link</a>
                </div>
            </div>

            @include('partials._nav')
        </header>
        <!------------------------ /Header ------------------------>