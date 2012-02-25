<?php
/*
Template Name: Search Form
*/
?>

<form id="searchform" method="get" action="<?php bloginfo('home'); ?>/" ><input type="text" value="search" onfocus="if (this.value == 'search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'search';}" size="18" maxlength="50" name="s" id="s" /><input name="submit" type="submit" id="submit" value="search" /></form>