@extends('layouts.gestor.template')
@section('head')
<style>
.tile-stats h3 {
  font-size: 12px!important;
  font-weight: bold;
}
.tile-stats .icon i {
  font-size: 43px;
}
.tile-stats .icon {
    width: 0px;
    top: 10px;
}
</style>
@endsection
@section('content')
<div class="row">

	<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="tile-stats">
      <div class="icon"><i class="fa fa-users"></i>
      </div>
      <div class="count">590</div>
      <h3><a href="#">ESCOLA FRANCISCO LUIZ DE ALBUQUERQUE PONTES</a></h3>
      <p>Santo Antônio</p>
    </div>
  </div>

	<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="tile-stats">
      <div class="icon"><i class="fa fa-users"></i>
      </div>
      <div class="count">590</div>
      <h3><a href="#">ESCOLA ANTONIO AMANCIO DE MELO BASTOS</a></h3>
      <p>Santo Antônio</p>
    </div>
  </div>

	<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="tile-stats">
      <div class="icon"><i class="fa fa-users"></i>
      </div>
      <div class="count">590</div>
      <h3><a href="#">ESCOLA ANTONIO VIEIRA DA COSTA</a></h3>
      <p>Santo Antônio</p>
    </div>
  </div>

</div>
<div class="row">

	<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="tile-stats">
      <div class="icon"><i class="fa fa-users"></i>
      </div>
      <div class="count">590</div>
      <h3><a href="#">ESCOLA JOAQUIM FORTUNATO BITENCOURT FILHO</a></h3>
      <p>Santo Antônio</p>
    </div>
  </div>

	<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="tile-stats">
      <div class="icon"><i class="fa fa-users"></i>
      </div>
      <div class="count">590</div>
      <h3><a href="#">ESCOLA JOAO CORDEIRO DE SOUZA JUNIOR</a></h3>
      <p>Santo Antônio</p>
    </div>
  </div>

	<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="tile-stats">
      <div class="icon"><i class="fa fa-users"></i>
      </div>
      <div class="count">590</div>
      <h3><a href="#">ESCOLA JABES FRANCISCO DA SILVA</a></h3>
      <p>Santo Antônio</p>
    </div>
  </div>

</div>
<div class="row">

	<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="tile-stats">
      <div class="icon"><i class="fa fa-users"></i>
      </div>
      <div class="count">590</div>
      <h3><a href="#">ESCOLA JOSE MARTINS DE ALMEIDA</a></h3>
      <p>Santo Antônio</p>
    </div>
  </div>	

  <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="tile-stats">
      <div class="icon"><i class="fa fa-users"></i>
      </div>
      <div class="count">590</div>
      <h3><a href="#">ESCOLA PADRE MEDEIROS NETO</a></h3>
      <p>Santo Antônio</p>
    </div>
  </div>

</div> <!-- ./row -->

<div class="row">
	<div class="col-md-8 col-sm-8 col-xs-12">
	  <div class="x_panel">
	    <div class="x_title">
	      <h2>Matriculas<small>Sessions</small></h2>
	      <ul class="nav navbar-right panel_toolbox">
	        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="#">Settings 1</a>
	            </li>
	            <li><a href="#">Settings 2</a>
	            </li>
	          </ul>
	        </li>
	        <li><a class="close-link"><i class="fa fa-close"></i></a>
	        </li>
	      </ul>
	      <div class="clearfix"></div>
	    </div>
	    <div class="x_content">
	      <canvas id="lineChart"></canvas>
	    </div>
	  </div>
	</div>
	<div class="col-md-4">
    <div class="x_panel">
      <div class="x_title">
        <h2>Aniversariantes do mês <small>Sessions</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <article class="media event">
          <a class="pull-left">
            <img width="52 " src="/tema/production/images/img.jpg" alt="user" class="img-circle img-responsive">
          </a>
          <div class="media-body">
            <a class="title" href="#">John Wilker da Silva</a>
            <p>Dia 28.</p>
          </div>
        </article>
        <article class="media event">
          <a class="pull-left">
            <img width="52 " src="/tema/production/images/img.jpg" alt="user" class="img-circle img-responsive">
          </a>
          <div class="media-body">
            <a class="title" href="#">John Wilker da Silva</a>
            <p>Dia 28.</p>
          </div>
        </article>
        <article class="media event">
          <a class="pull-left">
            <img width="52 " src="/tema/production/images/img.jpg" alt="user" class="img-circle img-responsive">
          </a>
          <div class="media-body">
            <a class="title" href="#">John Wilker da Silva</a>
            <p>Dia 28.</p>
          </div>
        </article>
        <article class="media event">
          <a class="pull-left">
            <img width="52 " src="/tema/production/images/img.jpg" alt="user" class="img-circle img-responsive">
          </a>
          <div class="media-body">
            <a class="title" href="#">John Wilker da Silva</a>
            <p>Dia 28.</p>
          </div>
        </article>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script>
	// Line chart
  var ctx = document.getElementById("lineChart");
  var lineChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["January", "February", "March", "April", "May", "June", "July"],
      datasets: [{
        label: "2016",
        backgroundColor: "rgba(38, 185, 154, 0.31)",
        borderColor: "rgba(38, 185, 154, 0.7)",
        pointBorderColor: "rgba(38, 185, 154, 0.7)",
        pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
        pointHoverBackgroundColor: "#fff",
        pointHoverBorderColor: "rgba(220,220,220,1)",
        pointBorderWidth: 1,
        data: [31, 74, 6, 39, 20, 85, 7]
      }, {
        label: "2017",
        backgroundColor: "rgba(3, 88, 106, 0.3)",
        borderColor: "rgba(3, 88, 106, 0.70)",
        pointBorderColor: "rgba(3, 88, 106, 0.70)",
        pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
        pointHoverBackgroundColor: "#fff",
        pointHoverBorderColor: "rgba(151,187,205,1)",
        pointBorderWidth: 1,
        data: [82, 23, 66, 9, 99, 4, 2]
      }]
    },
  });
</script>
@endsection