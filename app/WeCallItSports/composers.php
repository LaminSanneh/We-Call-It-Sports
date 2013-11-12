<?php 

// In here , we will declare our view compositions for 
// Modules views for e.g. Football module, Tennis Module

View::composer('partials._sidebar', 'WeCallItSports\Football\Composers\SidebarComposer');
