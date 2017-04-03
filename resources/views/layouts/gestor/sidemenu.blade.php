<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>General</h3>
    <ul class="nav side-menu">

        <li><a href="{{ url('gestor/')}}"><i class="fa fa-home"></i> Dashboard </a></li>
        <li><a href="{{ url('gestor/alunos')}}"><i class="fa fa-users"></i> Alunos </a></li>
        <li><a href="{{ url('gestor/cursos')}}"><i class="fa fa-graduation-cap"></i> Cursos </a></li>
        <li><a href="{{ url('gestor/docentes')}}"><i class="fa fa-users"></i> Docentes </a></li>
        <li><a href="{{ url('gestor/materias')}}"><i class="fa fa-book"></i> Matérias </a></li>
        <li><a href="{{ url('gestor/responsavel') }}"><i class="fa fa-users"></i> Responsáveis</a></li>
        <li><a href="{{ url('gestor/turmas')}}"><i class="fa fa-home"></i> Turmas </a></li>
        <li><a><i class="fa fa-home"></i> Relacionamentos <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ url('gestor/alunos-turma')}}">Aluno / Turma</a></li>
            <li><a href="{{ url('gestor/docente-materias')}}">Docente / Materias</a></li>
            <li><a href="{{ url('gestor/docente-turmas')}}">Docente / Turmas</a></li>
            <!-- <li><a href="{{ url('gestor/materias-turma')}}">Materias / Turma</a></li> -->
            <li><a href="{{ url('gestor/escola-estagio-educacional')}}">Estágios / Escola</a></li>
            <li><a href="{{ url('gestor/curso-materias')}}">Curso / Materias</a></li>
          </ul>
        </li>


    </ul>
  </div>
  <div class="menu_section">
    <h3>Live On</h3>
    <ul class="nav side-menu">
      <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="e_commerce.html">E-commerce</a></li>
          <li><a href="projects.html">Projects</a></li>
          <li><a href="project_detail.html">Project Detail</a></li>
          <li><a href="contacts.html">Contacts</a></li>
          <li><a href="profile.html">Profile</a></li>
        </ul>
      </li>
      <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
    </ul>
  </div>

</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
  <a data-toggle="tooltip" data-placement="top" title="Settings">
    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="FullScreen">
    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="Lock">
    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
  </a>
  <a href= "{{url('gestor/logout')}}" data-toggle="tooltip" data-placement="top" title="Logout">
    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
  </a>
</div>
<!-- /menu footer buttons -->
