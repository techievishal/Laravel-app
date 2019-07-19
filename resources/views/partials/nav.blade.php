@inject('request', 'Illuminate\Http\Request')
<nav class="navbar navbar-expand-lg">            
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('product.index')}}">Products <span class="sr-only">(current)</span></a>
            </li>

          </ul>

          <ul class="navbar-nav navbar-right">
              <li class="nav-item">
                  <a class="nav-link" href="{{route('product.myCart')}}">Shopping Cart <span class="badge">{{Session::has('cart')?Session::get('cart')->totalQty:''}}</span> </a>
                </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    User Management
                  </a>
                  <div class="dropdown-menu profile" aria-labelledby="navbarDropdown">
                    @if (Auth::check())
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="{{route('orders.myOrders')}}">My Orders</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('auth.logout')}}" ">
                        <i class="fa fa-arrow-left"></i>
                        <span class="title">@lang('quickadmin.qa_logout')</span>
                    </a>
                    @else
                    
                    <a class="dropdown-item" href="{{route('login')}}">Login</a>
                    @endif
                    
                    
                    
                  </div>
                </li>

          </ul>  
            
          <!--<form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form> -->
        </div>
      </nav>