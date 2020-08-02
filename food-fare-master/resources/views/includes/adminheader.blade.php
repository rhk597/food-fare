<nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top">
	FOODMARKETI
    <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon text-white"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link text-white" href="/adminhomepage">Home </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link text-white" href="/addnewenvent">Add New Events</a>
            </li>
			<li class="nav-item ">
                <a class="nav-link text-white" href="/magazinelist">Magazines List</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link text-white" href="/adminmagazines">Add Magazines</a>
            </li>
        </ul>
        <ul class="navbar-nav navbar-right my-2 my-lg-0">

            <li class="nav-item active">
  
                @if(Session::has('name'))
                     <a class="nav-link text-white" href="/editadminprofile">{{ Session::get('name') }}</a>
                @endif
               
            </li>
            <li class="nav-item"><a class="nav-link text-white my-2 my-sm-0" href="/logout">Logout</a></li>
        </ul>
    </div>

</nav>
<br><br><br><br><br>