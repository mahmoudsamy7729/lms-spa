<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
      <div>
        <img src="{{asset('assets/images/logo-icon-2.png')}}" class="logo-icon" alt="logo icon">
      </div>
      <div>
        <h4 class="logo-text">LMS</h4>
      </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
      <li>
        <a href="{{route('dashboard')}}"wire:navigate>
          <div class="parent-icon">
            <ion-icon name="home-outline"></ion-icon>
          </div>
          <div class="menu-title">Dashboard</div>
        </a>
      </li>
      <li>
        <a href="{{route('category')}}"wire:navigate>
          <div class="parent-icon">
            <ion-icon name="list-outline"></ion-icon>
          </div>
          <div class="menu-title">Categories</div>
        </a>
      </li>
      <li>
        <a href="{{route('author')}}"wire:navigate>
          <div class="parent-icon">
            <ion-icon name="pencil-outline"></ion-icon>
          </div>
          <div class="menu-title">Authors</div>
        </a>
      </li>
      <li>
        <a href="{{route('publisher')}}"wire:navigate>
          <div class="parent-icon">
            <ion-icon name="people-circle-outline"></ion-icon>
          </div>
          <div class="menu-title">Publishers</div>
        </a>
      </li>
      <li>
        <a href="{{route('book')}}"wire:navigate>
          <div class="parent-icon">
            <ion-icon name="book-outline"></ion-icon>
          </div>
          <div class="menu-title">Books</div>
        </a>
      </li>
      @livewire('logout')
      


    </ul>
    <!--end navigation-->
  </aside>