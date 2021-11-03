{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Blank Page')

{{-- page content --}}
@section('content')
<div class="section">
    <div class="card">
        <div class="card-content">
            <p class="caption mb-0">
                Sample blank page for getting start!! Created and designed by Google, Material Design is a design
                language that combines the classic principles of successful design along with innovation and
                technology.
            </p>
        </div>
         <form class = "">
               <label>Materialize DatePicker</label>              
               <input type = "text" class = "datepicker" />    
         </form>     
         Logut
         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                              
    </div>
</div>
@endsection