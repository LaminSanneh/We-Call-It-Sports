        <!------------------------ Footer ------------------------>
        <div class="layout-footer">

        </div>
        <!------------------------ /Footer ------------------------>
        

        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>-->
        {{ HTML::script('js/vendor/jquery-1.10.1.min.js') }}
        {{ HTML::script('js/vendor/bootstrap.min.js') }}
        {{ HTML::script('js/vendor/knockout-3.0.0.js') }}
        {{ HTML::script('js/vendor/dropzone.js') }}
        {{ HTML::script('js/admin/create-edit-article.js') }}

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>