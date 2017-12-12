@extends('layouts.app')
@section('player')

    <div id="mainContainer">
        <div id="topContainer">
            <div id="navBarContainer">
                <nav class="navBar">
                    @if(count($songs) > 0)
                        <ul class="songs-list" id="play-list">
                            @foreach($songs as $song)
                                <li>{{ $song->title  }}</li>
                            @endforeach
                        </ul>
                    @endif
                </nav>
            </div>
        </div>
        <div id="nowPlayingBarContainer">
            <div id="nowPlayingBar">
                <div id="nowPlayingLeft">
                    <div class="content">
                    <span class="albumLink">
                        <img src="http://www.freeiconspng.com/uploads/red-square-png-14.png" alt=""
                             class="albumArtwork">
                    </span>
                        <div class="trackInfo">
                        <span class="trackName">
                            <span>Happy Birthday</span>
                        </span>
                            <span class="artistName">
                            <span>Reece Kenney</span>
                        </span>
                        </div>
                    </div>
                </div>
                <div id="nowPlayingCenter">
                    <div class="content player-controls">
                        <div class="buttons">
                            <button class="control-button shuffle" title="Shuffle button">
                                <img src="{{ asset('images/icons/shuffle.png') }}" alt="Shuffle"/>
                            </button>
                            <button class="control-button previous" title="Previous button">
                                <img src="{{ asset('images/icons/previous.png') }}" alt="Previous"/>
                            </button>
                            <button id="play" class="control-button play" title="Play button">
                                <img src="{{ asset('images/icons/play.png') }}" alt="Play"/>
                            </button>
                            <button id="pause" class="control-button pause" title="Pause button" style="display: none;">
                                <img src="{{ asset('images/icons/pause.png') }}" alt="Pause"/>
                            </button>
                            <button class="control-button next" title="Next button">
                                <img src="{{ asset('images/icons/next.png') }}" alt="Next"/>
                            </button>
                            <button class="control-button repeat" title="Repeat button">
                                <img src="{{ asset('images/icons/repeat.png') }}" alt="Repeat"/>
                            </button>
                        </div>
                        <div class="playbackBar" style="color: #fff;">
                            <span class="progressTime current">0.00</span>
                            <div class="progressBar">
                                <div class="progressBarBg">
                                    <div class="progress">

                                    </div>
                                </div>
                            </div>
                            <span class="progressTime remaining">0.00</span>
                        </div>
                    </div>
                </div>
                <div id="nowPlayingRight">
                    <div class="volumeBar">
                        <button class="control-button volume" title="Volume button">
                            <img src="{{ asset('images/icons/volume.png')  }}" alt="Volume">
                        </button>
                        <div class="progressBar">
                            <div class="progressBarBg">
                                <div class="progress">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.onload = function () {

            var audioElement = new Audio();

            var playing = false;

            document.getElementById('play-list').addEventListener('click', function (e) {
                audioElement.pause();
                audioElement.currentTime = 0;
                audioElement.src = "{{ asset('storage/music/Fall' ) }}" + "/" + e.target.innerHTML + ".mp3";
                audioElement.play();
                document.getElementById('play').setAttribute('style', 'display: none;');
                document.getElementById('pause').setAttribute('style', 'display: inline;');
            });


            var play = document.getElementById('play');
            play.addEventListener('click', function () {
                switchPlayPause();
            });
            var pause = document.getElementById('pause');
            pause.addEventListener('click', function () {
                switchPlayPause();
            });

            function switchPlayPause() {
                if(playing){
                    audioElement.pause();
                    audioElement.currentTime = 0;
                    play.setAttribute('style', 'display: inline;');
                    pause.setAttribute('style', 'display: none;');
                    playing = false;
                }
                else {
                    audioElement.play();
                    play.setAttribute('style', 'display: none;');
                    pause.setAttribute('style', 'display: inline;');
                    playing = true;
                }
            }
        };
    </script>
@endsection