@extends('layouts.default')
<div class="container">
    <div>
        @if(Auth::check())
            <p>Welcome to your profile page {{Auth::user()->first_name}} - {{Auth::user()->last_name}}</p>
        @else
            <div> Fail to login after registration or you're not logged in </div>
        @endif
    </div>
</div>