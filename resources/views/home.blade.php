@extends('layouts.app')
@section('player')
<div id="mainContainer">
    <div id="topContainer">
        <div id="navBarContainer">
            <nav class="navBar">

            </nav>
        </div>
    </div>
    <div id="nowPlayingBarContainer">
        <div id="nowPlayingBar">
            <div id="nowPlayingLeft">
                <div class="content">
                    <span class="albumLink">
                        <img src="http://www.freeiconspng.com/uploads/red-square-png-14.png" alt="" class="albumArtwork">
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
                            <img src="{{ asset('images/icons/shuffle.png') }}" alt="Shuffle" />
                        </button>
                        <button class="control-button previous" title="Previous button">
                            <img src="{{ asset('images/icons/previous.png') }}" alt="Previous" />
                        </button>
                        <button class="control-button play" title="Play button">
                            <img src="{{ asset('images/icons/play.png') }}" alt="Play" />
                        </button>
                        <button class="control-button pause" title="Pause button" style="display: none;">
                            <img src="{{ asset('images/icons/pause.png') }}" alt="Pause" />
                        </button>
                        <button class="control-button next" title="Next button">
                            <img src="{{ asset('images/icons/next.png') }}" alt="Next" />
                        </button>
                        <button class="control-button repeat" title="Repeat button">
                            <img src="{{ asset('images/icons/repeat.png') }}" alt="Repeat" />
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

@endsection