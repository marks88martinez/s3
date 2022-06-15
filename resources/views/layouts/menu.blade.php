<li class="side-menus {{ Request::is('home') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fas fa-fire"></i><span>Dashboard</span>
    </a>
</li>


<li class="side-menus {{ Request::is('faq') || Request::is('faq/*') ? 'active' : '' }}">
    <a class="nav-link" href="/faq">
        <i class=" fas fa-th-large"></i><span>FAQ</span>
    </a>
</li>
<li class="side-menus {{ Request::is('empresa') || Request::is('empresa/*') ? 'active' : '' }}">
    <a class="nav-link" href="/empresa">
        <i class=" fas fa-th-large"></i><span>Empresa</span>
    </a>
</li>
<li class="side-menus {{ Request::is('product') || Request::is('product/*') ? 'active' : '' }}">
    <a class="nav-link" href="/product">
        <i class=" fas fa-th-large"></i><span>Productos</span>
    </a>
</li>
@role('Admin')
    <li class="side-menus {{ Request::is('rma') || Request::is('rma/*') ? 'active' : '' }}">
        <a class="nav-link" href="/rma">
            <i class=" fas fa-building"></i><span>RMA</span>
        </a>
    </li>

@endrole





<li class="dropdown side-menus {{ Request::is('userClient') || Request::is('userClient/*')  ||  Request::is('datosEmpresa')? 'active' : '' }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-plug"></i> <span>Setup</span></a>
    <ul class="dropdown-menu">
      <li><a class="nav-link" href="/userClient">Usuario</a></li>
      <li><a class="nav-link" href="/datosEmpresa">Direccion</a></li>

    </ul>
  </li>
