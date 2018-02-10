@php
use App\Models\User\ChitsModel;
$chitsModel = new ChitsModel;
@endphp

<input class="playlist" type="text" style="display:none;"/>
<div id="player" style="display:none;"></div>

@if($chitsModel->has_default_chits($user))
    <div class="row row-group" id="group-id-0">
            <div class="panel panel-default panel-group">
              <div class="panel-body">Default</div>
            </div>
    </div>
    <div class="row row-chits-list" id="group-id-0-list">
        @foreach ($userChits as $chits)
            @if($chits->group_id == 0)
                @if( is_youtube($chits->address) == 'yes')

                    <div class="chits-column-parent chit-code-{{ getcode_youtube($chits->address) }} col-md-3 col-sm-3 col-xs-3" id="{{ $chits->id }}">

                        <div class="chits-player">
                            <!-- Плеер -->
                            <div class="playerblock" id="player-id-{{ getcode_youtube($chits->address) }}" data-video="{{ getcode_youtube($chits->address) }}">
                            </div>
                            <!-- Превью -->
                            <div class="playerpreview" id="playerpreview">
                                <div class="previewplayimg">
                                    <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                </div>
                                <img src="//img.youtube.com/vi/{{ getcode_youtube($chits->address) }}/mqdefault.jpg" width="100%" height="150px">
                            </div>
                        </div>

                        <div class="chits-events">

                            <div class="chits-description-area" data-toggle="tooltip" title="{{ $chits->opg_title }}">
                                <div class="playerpreview-text" >{{ $chits->opg_title }}</div>
                            </div>


                            <div class="chits-events-area">
                                <i class="fa fa-archive fa-delete-chits chits-delete-button" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    @else
                        <div class="chits-column-parent col-lg-3 col-md-3 col-sm-3" id="{{ $chits->id }}">
                            <div class="chits-column-block">
                                <a class="chits-child" href="{{ $chits->address }}" target="_blank">
                                    <div>
                                        <img src="{{ $chits->opg_image }}" class="opg-image"/>
                                        <div class="opg_sitename">{{ $chits->opg_sitename }}</div>
                                        <div class="opg_title"><b>{{ $chits->opg_title }}</b></div>
                                    </div>
                                </a>
                            </div>
                            <div class="chits-events">

                                <div class="chits-description-area-basic" data-toggle="tooltip" title="{{ $chits->opg_title }}">
                                    <div class="preview-text">{{ $chits->opg_title }}</div>
                                </div>


                                <div class="chits-events-area">
                                    <i class="fa fa-archive fa-delete-chits chits-delete-button" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                @endif
            @endif
        @endforeach
    </div>
@endif


@foreach ($userGroups as $userGroup)
    <div class="row row-group" id="group-id-{{ $userGroup['id'] }}">
        <div class="panel panel-default panel-group" id="{{ $userGroup['id'] }}">
          <div class="panel-body">
              {{ $userGroup['name'] }}
              <i class="fa fa-window-close fa-delete-group chits-group-delete-button" aria-hidden="true"></i>
          </div>
        </div>
    </div>
        @if($chitsByGroup = $chitsModel->getChitsByGroup($user, $userGroup['id']))
            <div class="row row-chits-list" id="group-id-{{ $userGroup['id']}}-list">
                @foreach ($chitsByGroup as $chits)
                    @if( is_youtube($chits->address) == 'yes')
                        <div class="chits-column-parent chit-code-{{ getcode_youtube($chits->address) }} col-md-3 col-sm-3 col-xs-3" id="{{ $chits->id }}">

                            <div class="chits-player">
                                <!-- Плеер -->
                                <div class="playerblock" id="player-id-{{ getcode_youtube($chits->address) }}" data-video="{{ getcode_youtube($chits->address) }}">
                                </div>
                                <!-- Превью -->
                                <div class="playerpreview" id="playerpreview">
                                    <img src="//img.youtube.com/vi/{{ getcode_youtube($chits->address) }}/mqdefault.jpg" width="100%" height="150px">
                                </div>
                            </div>

                            <div class="chits-events">

                                <div class="chits-description-area" data-toggle="tooltip" title="{{ $chits->opg_title }}">
                                    <div class="playerpreview-text">{{ $chits->opg_title }}</div>
                                </div>


                                <div class="chits-events-area">
                                    <i class="fa fa-archive fa-delete-chits chits-delete-button" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    @else


                    <div class="chits-column-parent col-lg-3 col-md-3 col-sm-3" id="{{ $chits->id }}">
                        <div class="chits-column-block">
                            <a class="chits-child" href="{{ $chits->address }}" target="_blank">
                                <div>
                                    <img src="{{ $chits->opg_image }}" class="opg-image"/>
                                    <div class="opg_sitename">{{ $chits->opg_sitename }}</div>
                                    <div class="opg_title"><b>{{ $chits->opg_title }}</b></div>
                                </div>
                            </a>
                        </div>
                        <div class="chits-events">

                            <div class="chits-description-area-basic" data-toggle="tooltip" title="{{ $chits->opg_title }}">
                                <div class="preview-text">{{ $chits->opg_title }}</div>
                            </div>


                            <div class="chits-events-area">
                                <i class="fa fa-archive fa-delete-chits chits-delete-button" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>



                        <!-- <div class="chits-column-parent col-lg-3 col-md-3 col-sm-3" id="{{ $chits->id }}">
                            <div class="chits-column-block">
                                <a class="chits-child" href="{{ $chits->address }}" target="_blank">
                                    <div>
                                        <img src="{{ $chits->opg_image }}" class="opg-image"/>
                                        <div class="opg_sitename">{{ $chits->opg_sitename }}</div>
                                        <div class="opg_title"><b>{{ $chits->opg_title }}</b></div>
                                    </div>
                                </a>
                            </div>
                            <div class="chits-events">
                                <i class="fa fa-archive fa-delete-chits chits-delete-button" aria-hidden="true"></i>
                            </div>
                        </div> -->
                    @endif
                @endforeach
            </div>
        @endif
@endforeach

<script src="http://localhost:8000/js/youtube.js"></script>
