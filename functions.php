<?php
function inverteData($data){    
   $parteData = explode("-", $data);    
   $dataInvertida = $parteData[2] . "/" . $parteData[1] . "/" . $parteData[0];
   return $dataInvertida;			
}

function footer(){
	echo "<footer class=\"py-5 bg-black\">
    		<div class=\"container2\">
        		<p class=\"m-0 text-center text-gray small\" style=\"font-size:13px\">&copy; ". date("Y") ." By Rarduer Labs</p>
    		</div>
			</footer>";
}

function search(){
	echo "
<script>
(function(document) {
  'use strict';

  var LightTableFilter = (function(Arr) {

    var _input;

    function _onInputEvent(e) {
      _input = e.target;
      var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
      Arr.forEach.call(tables, function(table) {
        Arr.forEach.call(table.tBodies, function(tbody) {
          Arr.forEach.call(tbody.rows, _filter);
        });
      });
    }

    function _filter(row) {
      var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
      row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
    }

    return {
      init: function() {
        var inputs = document.getElementsByClassName('light-table-filter');
        Arr.forEach.call(inputs, function(input) {
          input.oninput = _onInputEvent;
        });
      }
    };
  })(Array.prototype);

  document.addEventListener('readystatechange', function() {
    if (document.readyState === 'complete') {
      LightTableFilter.init();
    }
  });

})(document);
</script>

	";
}

function inicio_nav(){
  echo "
    <nav class='navbar navbar-expand-lg navbar-dark bg-dark top' role='navigation' style='margin: -5px -3px 5px -3px;'>
    <div class='container' style='width: 95%'>
        <a class='navbar-brand' href='#'><i class='fas fa-bolt' style='font-size: 40px; color: #6c757d'></i></a>
        <button class='navbar-toggler border-0' type='button' data-toggle='collapse' data-target='#exCollapsingNavbar'>
            &#9776;
        </button>
        <div class='collapse navbar-collapse' id='exCollapsingNavbar'>";
}

function fim_nav(){
  echo "

  <ul class='nav navbar-nav flex-row justify-content-between ml-auto'>
      <form class='form-inline my-2 my-lg-0' method='get' action='search_page.php?pagina=1'>
        <input class='form-control mr-sm-2' type='search' placeholder='Procurar' aria-label='Search' name='cx_search'>
         <button type='submit' class='btn btn-md btn btn-link d-none d-sm-block' 
         style='font-size: 25px; color: #007bff; padding: 0px 20px 0px -0px;'><i class='fas fa-search'></i></button>
      </form>
                <!--<li class='nav-item order-2 order-md-1'><a href='#' class='nav-link' title='settings'><i class='fa fa-cog fa-fw fa-lg'></i></a></li>-->
                <li class='dropdown order-1'>
                    <button type='button' id='dropdownMenu1' data-toggle='dropdown' class='btn btn-outline-secondary dropdown-toggle'>". ucwords(strtolower($_SESSION['nome'])) ."<span class='caret'></span></button>
                    <ul class='dropdown-menu dropdown-menu-right mt-2'>
                       <li class='px-3 py-2'>
                           <form class='form' role='form'>
                                <!--<div class='form-group'>
                                    <input id='emailInput' placeholder='Email' class='form-control form-control-sm' type='text' required=''>
                                </div>
                                <div class='form-group'>
                                    <input id='passwordInput' placeholder='Password' class='form-control form-control-sm' type='text' required=''>
                                </div>
                                <div class='form-group'>
                                    <button type='submit' class='btn btn-primary btn-block'>Login</button>
                                </div>
                                <div class='form-group text-center'>-->
                                    <a href='login/logout.php'><i class='fas fa-sign-out-alt' style='font-size: 18px; float: left; margin: 5px 1px'>
                                      
                                    </i> Sair </a></li>
                                </div>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>";
}

?>