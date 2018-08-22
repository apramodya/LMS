@extends('layouts.app')
@section('title')
    Home
@endsection
@section('content')
<style>
/* * {box-sizing: border-box;}
ul {list-style-type: none;}
body {font-family: Verdana, sans-serif;} */

.month {
    padding: 7px 25px;
    width: 100%;
    background: #4f323b94;
    text-align: center;
}

.month ul {
    margin: 0;
    padding: 0;
}

.month ul li {
    color: white;
    font-size: 20px;
    text-transform: uppercase;
    letter-spacing: 3px;
}

.month .prev {
    float: left;
    padding-top: 10px;
}

.month .next {
    float: right;
    padding-top: 10px;
}

.weekdays {
    margin: 0;
    padding: 10px 0;
    background-color: #ddd;
}

.weekdays li {
    display: inline-block;
    width: 12.6%;
    color: #666;
    text-align: center;
}

.days {
    padding: 10px 0;
    background: #eee;
    margin: 0;
}

.days li {
    list-style-type: none;
    display: inline-block;
    width: 12.6%;
    text-align: center;
    margin-bottom: 5px;
    font-size:12px;
    color: #777;
}

.days li .active {
    padding: 5px;
    background: #655b8c9e;
    color: white !important
}

/* Add media queries for smaller screens */
@media screen and (max-width:720px) {
    .weekdays li, .days li {width: 13.1%;}
}

@media screen and (max-width: 420px) {
    .weekdays li, .days li {width: 12.5%;}
    .days li .active {padding: 2px;}
}

@media screen and (max-width: 290px) {
    .weekdays li, .days li {width: 12.2%;}
}
</style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        Downloads
                    </div>
                    <div class="card-body">
                        <a>UNDERGRADUATE TIME TABLE - SEMESTER 1 - 2018</a>
                        <a>UNDERGRADUATE ACADEMIC CALENDAR - 2017</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6"><h5 style="font-weight: 500;">Site Announcements</h5><br>
                @foreach($announcements as $announcement)
                <div class="card">
                    <div class="card-header">
                        {{ $announcement->title }}
                        @if(isNew($announcement->created_at))
                            <span class="badge badge-pill badge-primary ">New</span>
                        @endif
                    </div>
                        <div class="card-body">
                            <h5 class="card-title">
                            </h5>
                            <p class="card-text">{{ $announcement->content }}</p>
                            <p>Published on {{ $announcement->created_at }}</p>
                        </div>
                </div>
                    <br>
                @endforeach
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        Calender
                    </div>
                    <div class="card-body">
                        <div id="accordion">
                        <div class="month"> 
  <ul>
    <li class="prev">&#10094;</li>
    <li class="next">&#10095;</li>
    <li style="font-size:14px">August<br><span style="font-size:14px">2017</span></li>
  </ul>
</div>

<ul class="weekdays">
  <li>Mo</li>
  <li>Tu</li>
  <li>We</li>
  <li>Th</li>
  <li>Fr</li>
  <li>Sa</li>
  <li>Su</li>
</ul>

<ul class="days"> 
  <li>1</li>
  <li>2</li>
  <li>3</li>
  <li>4</li>
  <li>5</li>
  <li>6</li>
  <li>7</li>
  <li>8</li>
  <li>9</li>
  <li>10</li>
  <li>11</li>
  <li>12</li>
  <li>13</li>
  <li>14</li>
  <li>15</li>
  <li>16</li>
  <li>17</li>
  <li>18</li>
  <li>19</li>
  <li>20</li>
  <li>21</li>
  <li>22</li>
  <li><span class="active">23</span></li>
  <li>24</li>
  <li>25</li>
  <li>26</li>
  <li>27</li>
  <li>28</li>
  <li>29</li>
  <li>30</li>
  <li>31</li>
  
</ul> 
                            
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
@endsection