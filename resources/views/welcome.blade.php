@extends('layouts.master')

@section('title', 'welcome')

@section('styles')
  <link rel="stylesheet" type="text/css" href="{!! asset('css/welcome.css') !!}">
  <link rel="stylesheet" type="text/css" href="{!! asset('font-awesome/css/font-awesome.min.css') !!}">
@endsection

@section('content')
@include ('partials.alerts');
  <div class="home">
    <div class="home-info">
      <h1>The new way of dining</h1>
      <h4><em>Make a reservation</em></h4>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class = "search-form">
            <form role="form" action="{{ route('searchsite') }}">
              <div class="form-group">
               <div class="input-group input-group-lg col-lg-12 searching">
                 <span class="input-group-addon">
                   <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                 </span>
                 <input type="text" name="query" class="form-control" placeholder="Location or Restaurant" dir = "auto">
                 <span class = "input-group-btn">
                    <button type="submit" class="btn btn-primary">Find</button>
                 </span>
               </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="content">
    <div class="container">
      <div class="row">
        <div class="col-xs-6 col-md-3">
          <div class="cell">
              <a href="#" class="thumbnail">
                <img src="/img/search.jpg" alt="...">
              </a>
          </div>
        </div>
        <div class="col-xs-6 col-md-3">
          <div class="cell">
              <a href="#" class="thumbnail">
                <img src="/img/reservation.jpg" alt="...">
              </a>
          </div>
        </div>
        <div class="col-xs-6 col-md-3">
          <div class="cell">
             <a href="#" class="thumbnail">
               <img src="/img/menu.jpg" alt="...">
             </a>
          </div>
        </div>
        <div class="col-xs-6 col-md-3">
          <div class="cell">
            <a href="#" class="thumbnail">
              <img src="/img/wine.jpg" alt="...">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="content">
    <div class="container">
      <div class="row">
        <div class="col-xs-6 col-md-3">
          <div class="cell">
              <a href="#" class="thumbnail">
                <img src="/img/pe.jpg" alt="...">
              </a>
          </div>
        </div>
        <div class="col-xs-6 col-md-3">
          <div class="cell">
              <a href="#" class="thumbnail">
                <img src="/img/eating.jpg" alt="...">
              </a>
          </div>
        </div>
        <div class="col-xs-6 col-md-3">
          <div class="cell">
           <a href="#" class="thumbnail">
             <img src="/img/vintage.jpeg" alt="...">
           </a>
          </div>
        </div>
        <div class="col-xs-6 col-md-3">
          <div class="cell">
            <a href="#" class="thumbnail">
              <img src="/img/image.jpg" alt="...">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection