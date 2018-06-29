<div class="sidebar-sticky">
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link @if(request()->url() == route('admin.dashboard')) {{'active'}} @endif" href="{{route('admin.dashboard')}}">
        <span data-feather="home"></span>
        Dashboard <span class="sr-only">(current)</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span data-feather="file"></span>
        Orders
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link @if(request()->url() == route('admin.product.index')) {{'active'}} @endif" href="{{route('admin.product.index')}}">
        <span data-feather="shopping-cart"></span>
        Products
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if(request()->url() == route('admin.category.index')) {{'active'}} @else {{''}} @endif" href="{{route('admin.category.index')}}">
        <span data-feather="bar-chart-2"></span>
        Categories
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span data-feather="users"></span>
        Customers
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span data-feather="layers"></span>
        Integrations
      </a>
    </li>
  </ul>
  <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
  <span>Saved reports</span>
  <a class="d-flex align-items-center text-muted" href="#">
    <span data-feather="plus-circle"></span>
  </a>
  </h6>
  <ul class="nav flex-column mb-2">
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span data-feather="file-text"></span>
        Current month
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span data-feather="file-text"></span>
        Last quarter
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span data-feather="file-text"></span>
        Social engagement
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span data-feather="file-text"></span>
        Year-end sale
      </a>
    </li>
  </ul>
</div>