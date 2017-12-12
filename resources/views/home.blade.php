@extends('layouts.app')
@section('player')

    <div id="mainContainer">
        <div id="topContainer">
            <div id="navBarContainer">
                <nav class="navBar">
                    @if(count($tracks) > 0)
                        <ul class="songs-list" id="play-list">
                            @foreach($tracks as $track)
                                <li id="{{ $track->id }}">
                                    <h5>{{ $track->title }}</h5>
                                    {{-- Access album details from the track --}}
                                    <p>{{ $track->album->title }}</p>
                                    {{-- Access artist details from the track --}}
                                    <p><i>{{ $track->artist->name }}</i></p>

                                     {{-- **************************
                                     Get all the tracks for album:
                                     $track ->album->track

                                     Get all the tracks for artist:
                                     $track->artist->track

                                     ******************************* --}}

                                </li>

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
                            <span id="current" class="progressTime current">0.00</span>
                            <div id="progressBar" class="progressBar">
                                <div class="progressBarBg">
                                    <div id="progress" class="progress">

                                    </div>
                                </div>
                            </div>
                            <span id="remaining" class="progressTime remaining">0.00</span>
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

            // Current and total time elements
            var current = document.getElementById('current');
            var remaining = document.getElementById('remaining');


            // Audio player element
            var audioElement = new Audio();
            // Initial value
            var playing = false;
            // Sets the total song's duration
            audioElement.addEventListener('canplay', function () {
                remaining.innerHTML = (this.duration/60).toFixed(2).replace('.',' : ');
            });

            // Updates the progress bar on song progression
            audioElement.addEventListener('timeupdate', function () {
                if(this.duration){
                    current.innerHTML = (this.currentTime/60).toFixed(2).replace('.', ' : ');
                    remaining.innerHTML = (this.duration/60 - this.currentTime/60).toFixed(2).replace('.', ' : ');

                    var progress = this.currentTime / this.duration * 100;

                    document.getElementById('progress').setAttribute('style', 'width: ' + progress + '%;');
                }
            });

            var mousedown = false;

            var progressBar = document.getElementById('progressBar');
            // Updates the song progress bar on user click
            progressBar.addEventListener('mousedown', function () {
                mousedown = true;
            });


            progressBar.addEventListener('mousemove', function (e) {
                if(mousedown){
                    timeFromOffset(e, this);
                }
            });

            progressBar.addEventListener('mouseup', function (e) {
                if(mousedown){
                    timeFromOffset(e, this, audioElement);
                }
            });

            document.addEventListener('mouseup', function () {
               mousedown = false;
            });

            function timeFromOffset(mouse, progressBar) {
                var percentage = mouse.offsetX / progressBar.offsetWidth * 100;
                var seconds = audioElement.duration * (percentage / 100);
                audioElement.setTime(seconds);
            }


            // Play button element
            var play = document.getElementById('play');
            play.addEventListener('click', function () {
                switchPlayPause();
            });

            // Pause button element
            var pause = document.getElementById('pause');
            pause.addEventListener('click', function () {
                switchPlayPause();
            });

            // Event listener for click on list item
            document.getElementById('play-list').addEventListener('click', function (e) {

                current.innerHTML = 0.00;
                audioElement.pause();
                audioElement.currentTime = 0;
                audioElement.src = "{{ asset('storage/music/Fall' ) }}" + "/" + e.target.innerHTML + ".mp3";
                audioElement.play();
                play.setAttribute('style', 'display: none;');
                pause.setAttribute('style', 'display: inline;');
                playing = true;
            });



            // Switch play/pause
            function switchPlayPause() {
                if(playing){
                    audioElement.pause();
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