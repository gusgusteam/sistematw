<div class="sidebar">
    <div class="pb-3 mt-3 mb-3 user-panel d-flex">
        <div class="image">
            <img src="{{ asset(Auth::user()->avatar) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('repartidor.pedido') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pedido</p>
                </a>
            </li>
        </ul>
    </nav>
</div>
