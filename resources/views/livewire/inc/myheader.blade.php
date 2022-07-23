<div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
  integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">


<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


  
@auth
  
    <div>

<nav class="navbar navbar-expand-lg navbar-light bg-primary p-0 m-0 " v-show="token !=null">
  <a class="navbar-brand" href="#"> Salary </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ">
      
      <li class="nav-item dropdown">
        <a  class="nav-link btn btn-primary " href="/home"><h5 style="color:white">   الرئيسية  </h5></a> 
      </li>
     
      </ul>




  <div class="btn-group  " >
  <button type="button" class="btn btn-primary dropdown-toggle   " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       
      @if (auth()->user())
      <span>{{auth()->user()->name}}</span>

         <img style="width:30px;height:30px;border-radius:30px ;" src="{{asset('images/profiles/'.auth()->user()->image)}}" id="profileimage">
        @endif

  </button>
  <div class="dropdown-menu">
   
    <a class="dropdown-item" wire:click.prevent="logout">تسجيل الخروج </a>   
 
  </div>
</div>

             
  </div>
</nav>

 

    </div>


    @endauth



</div>
