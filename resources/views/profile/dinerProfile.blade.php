@extends('layouts.master')

@section('title', 'Your Profile')

@section('styles')
<link rel="stylesheet" type="text/css" href="{!! asset('css/auth.css') !!}">
<link rel="stylesheet" type="text/css" href="{!! asset('css/diner-profile.css') !!}">
@endsection

@section('content')

    <div class="container  white">
        <div class="row">
            <div class="col-xs-6 col-sm-3"> 
                <ul class="list-unstyled">
                    <li>
                        <a href="#" class="img-thumbnail"><img src="/img/picture.jpg" width = "160" height ="200" alt="Diner picture"></a>
                    </li>
                    <li><strong>Name:</strong> {{$name->fname ." ".$name->lname}}</li>
                    <li><strong>Username:</strong> {{$name->fname}}</li>
                </ul>
            </div>

            <div class="right">
                <a href="#edit-profile" class="btn btn-default">
                       <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    Edit profile
                </a>
            </div>

            <div class="col-xs-6 col-sm-3">
                <ul class="nav nav-tabs">
                   <li class="active"><a href="#reserve" data-toggle = "tab">Reservations</a></li>
                   <li><a href="#cancel"  data-toggle = "tab">Cancellation</a></li>
                </ul>
                <div class="content-diner-tab">
                    <div class="tab-content">
                        <div class="tab-pane active" id="reserve">
                            <div class = "profile">
                                <div class="panel panel-primary left-half">
                                    <div class="panel-heading"> Past reservations</div>
                                    <ul class="list-group">
                                        <li class="list-group-item">XX restaurant</li>
                                        <li class="list-group-item">qui restaurant</li>
                                        <li class="list-group-item">zzz restaurant</li>
                                    </ul>
                                </div> <!--.left-half-->

                                <div class="panel panel-primary right-half">
                                    <div class="panel-heading"> Future reservations</div>
                                    <div class="list-group">
                                        <a href ="#" class="list-group-item">YU restaurant</a>
                                        <a  href ="#" class="list-group-item">cui restaurant</a>
                                        <a href ="#" class="list-group-item">yzz restaurant</a>
                                    </div>
                                </div> <!--.right-half-->
                            </div> <!---.profile-->
                        </div> <!---.tab-pane #reserve-->   

                        <div class="tab-pane" id="cancel">
                            <div class="cancel-tab">
                                <ul class="list-unstyled">
                                    <li><a href = "#">Restaurant 1</a></li>
                                    <hr class="thematic-style">
                                    <li><a href="#">Restaurant 2</a></li>
                                    <hr class="thematic-style">
                                    <li><a href="#">Restaurant 3</a></li>
                                    <hr class="thematic-style">
                                </ul>
                            </div>
                        </div> <!--.tab-pane #cancel-->
                    </div> <!---.tab-content-->      
                </div> <!---.content-diner-tab-->
            </div> <!---.col-xs-6 .col-sm-3-->
        </div><!---.row-->
    </div><!---.container-->
    
@endsection