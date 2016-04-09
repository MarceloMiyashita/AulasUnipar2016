<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">PHP MVC SMarty</a>
    </div>

    <div class="collapse navbar-collapse" id="nav1">
      <ul class="nav navbar-nav">
        <li><a href="./">Home</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categorias <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="categorias-cadastrar.php">Cadastrar</a></li>
            <li><a href="categorias.php">Pesquisar</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Posts <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="posts-cadastrar.php">Cadastrar</a></li>
            <li><a href="posts.php">Pesquisar</a></li>
          </ul>
        </li>
        {*<li><a href="logout.php">Sair</a></li>*}
      </ul>
  </div>
</nav>