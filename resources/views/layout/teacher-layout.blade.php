<!doctype html>
<html lang="en">
  <head>
  	<title>OEMS Teacher</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
	  		<h1><a href="/teacher/dashboard" class="logo">Teacher Dashboard</a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="/teacher/dashboard"><span class="fa fa-home mr-3"></span> Subjects</a>
          </li>
          <li class="active">
            <a href="/teacher/exam"><span class="fa fa-tasks mr-3"></span>Exams</a>
          </li>
          <li>
              <a href="/logout"><span class="fa fa-user mr-3"></span> Logout</a>
          </li>
          
        </ul>

    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
           @yield('space-work')
      </div>
    </div>

    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    
  </body>
</html>