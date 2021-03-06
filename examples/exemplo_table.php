<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>
<?php 
	echo "
	<body>
<div class=\"container\">
    <div class=\"row\">
        <div class=\"col-lg-12\">
            <div class=\"page-header\">
                <h1>jQuery Searchable Plugin</h1>
            </div>
        </div>
    </div>
    <div class=\"row\">
        <div class=\"col-lg-12\">
            <h3>Table / Fuzzy search example</h3>
        </div>
    </div>
    <div class=\"row\">
        <div class=\"col-lg-4 col-lg-offset-4\">
            <input type=\"search\" id=\"search\" value=\"\" class=\"form-control\" placeholder=\"Search using Fuzzy searching\">
        </div>
    </div>
    <div class=\"row\">
        <div class=\"col-lg-12\">
            <table class=\"table\" id=\"table\">
                <thead>
                    <tr>
                        <th>First column</th>
                        <th>Second column</th>
                        <th>Third column</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Introducing</td>
                        <td>jQuery</td>
                        <td>Searchable</td>
                    </tr>
                    <tr>
                        <td>Lorem</td>
                        <td>Ipsum</td>
                        <td>Dolor</td>
                    </tr>
                    <tr>
                        <td>Some</td>
                        <td>More</td>
                        <td>Data</td>
                    </tr>
                </tbody>
            </table>
            <hr>
        </div>
    </div>
</div>


	";

 ?>
 
 <script>
 	$(function () {
    $( '#table' ).searchable({
        striped: true,
        oddRow: { 'background-color': '#f5f5f5' },
        evenRow: { 'background-color': '#fff' },
        searchType: 'fuzzy'
    });
    
    $( '#searchable-container' ).searchable({
        searchField: '#container-search',
        selector: '.row',
        childSelector: '.col-xs-4',
        show: function( elem ) {
            elem.slideDown(100);
        },
        hide: function( elem ) {
            elem.slideUp( 100 );
        }
    })
});
</script>
<script src="js/jquery.searchable-1.0.0.min.js"></script>

</body>
</html>