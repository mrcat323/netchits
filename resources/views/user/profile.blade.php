@extends('start.init')

@section('content')
    <page class="profilePage"></page>


    <!--Main Navbar-->
        @include('layouts.includes.navbar')
    <!--Second Navbar-->
    <div class="second-navbar-parent">
        <nav class="navbar navbar-fixed-top second-navbar">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="/">Home</a></li>
                    <li><a style="cursor:pointer" id="button-sidebar-show-friends">Friends</a></li>
                    <li><a style="cursor:pointer" id="button-sidebar-show-chits">Chits</a></li>
                </ul>
            </div>
        </nav>
    </div>



    <section class="chits-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <!-- Margin TOP FROM FIXED NAVBAR -->
                    <div class="margin-top100"></div>

                    <div class="bar search-progress-bar" style="visibility:hidden;">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="10" style="width: 100%">
                            </div>
                        </div>
                    </div>

                    <div class="row search-result-row" style="visibility:hidden;">
                        <div class="col-sm-12 search-result-col">
                            <div class="search-result-parent">
                                <img src="/storage/user-profile-images/" class="search-user-image img-circle"/>
                                <button class="btn btn-primary button-add-friend">
                                    Add Friend <span class="search-user-hashtag" id="search-user-hashtag">#user</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row row-friends" data-load="0" style="display:none;">
                        <div class="col-sm-12">
                            <div class="friends-parent">
                                Friends
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="friends-list">
                                @include('layouts.includes.friends-list');
                            </div>
                        </div>
                    </div>
                    <div class="row chits-add-row">
                        <div class="col-lg-2 col-md-2 col-sm-2 chits-add-column">
                            <button type="button" class="btn btn-success button-add-chits" id="chits-add-button">Add New</button>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                              <input type="text" class="form-control" id="chits-address-input" placeholder="https://netchits.com">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 chitsgroup-select-column">
                            @include('layouts.includes.chitsgroup-select')
                        </div>
                    </div>
                    <div class="row chits-add-group-row">
                        <div class="chits-category">
                            <div class="col-lg-2 col-md-2 col-sm-2 chits-add-column">
                                <button type="button" class="btn btn-primary" id="chits-group-button">Add Group</button>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="chits-group-input" placeholder="https://netchits.com">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row chits-row">
                            <div class="chits-list" style="visibility:hidden;">
                                @include("user.chits.chits-list")
                            </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
