<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="brand-link d-flex align-items-center">
        <i class="bi bi-bank2 brand-icon ml-3 mr-2" style="font-size: 1.8rem; color: #ffc107;"></i>
        <span class="brand-text font-weight-bold">Gestão de Produtos</span>
    </div>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header text-uppercase">Cadastros</li>
                <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box text-info"></i>
                        <p>
                            Produtos
                            <span class="badge badge-info right">{{ \App\Models\Product::count() ?? 0 }}</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tags text-warning"></i>
                        <p>
                            Categorias
                            <span class="badge badge-warning right">{{ \App\Models\Category::count() ?? 0 }}</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<style>
    .main-sidebar .brand-link {
        padding: 0.8125rem 1rem;
        border-bottom: 1px solid #4f5962;
        background: linear-gradient(135deg, #343a40 0%, #495057 100%);
    }

    .main-sidebar .brand-text {
        font-size: 1.1rem;
        color: #ffffff !important;
    }

    .main-sidebar .nav-sidebar .nav-link.active {
        background-color: rgba(255, 193, 7, 0.2) !important;
        color: #ffc107 !important;
        border-left: 3px solid #ffc107;
    }

    .main-sidebar .nav-sidebar .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
        transition: background-color 0.3s ease;
    }

    .main-sidebar .nav-header {
        font-size: 0.75rem;
        color: #adb5bd;
        margin-top: 1rem;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    .main-sidebar .nav-treeview .nav-link {
        padding-left: 2.5rem;
    }

    .main-sidebar .badge {
        font-size: 0.65rem;
        font-weight: 600;
    }
</style>
