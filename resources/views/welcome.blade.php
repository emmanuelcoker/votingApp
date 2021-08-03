<!DOCTYPE html>

<head>
    <title>Vote online</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="css/creative.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">

            <div class="navbar-header">
                
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span><i class="fas fa-bars"></i>
                </button>
            
                <a class="navbar-brand  page-scroll" href="#page-top">
                        <img src="{{asset('img/ivote2.png')}}" style="width: 70px; height:35px;" class="pr-1" alt="Ivote Logo">
                    </a>

    
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    @if(Auth::check())
                    @if(auth()->user()->role_id == 1)
                    <li>
                        <a class="page-scroll" href="{{route('admin.index')}}">Dashboard</a>
                    </li>
                    @endif
                    @endif

                    @if(!Auth::check())
                    <li>
                        <a class="page-scroll" href="{{route('login')}}">Login</a>
                    </li>
                    @else
                    <li>
                        <a href="{{route('logout')}}" href="#about">Logout</a>
                    </li>
                    @endif

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">
                    @if(date('H') < 12)
                        <l>Ekaro</l>.
                        @elseif(date('H') < 17 )
                        <l>Ekaa San</l>.

                        @elseif(date('H') > 17 )
                        <l>Eku Irole</l>.
                    @endif
                    
                </h1>
                <h3>@include('inc.messages')</h3>
                <p>Welcome to <b>ivote</b> where you <b>easily</b> place your vote from <b>anywhere</b>.
                <h1>We are Lasu, we are Proud</h1> .</p>
                <br> <a href="{{route('show')}}" class="btn btn-primary btn-xl page-scroll">vote</a>
                <br>
                <br> <a href="{{route('results')}}" class="btn btn-primary btn-xl page-scroll">see results</a>
                <br>
            </div>
        </div>
    </header>

    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">The fastest and easiest way to vote!</h2>

                    <p class="text-faded">This project entails an online system that allows registered voters to log in and vote wisely for the candidate agreed upon. The voters will be able to vote at ease and efficiently at any area provided there is internet connection.
                        This website system allows voters to view the lists of candidates in the area. The voters will also be able to see detailed information of each candidate (e.g. their CV) which will enable them to vote wisely. Voters will be required to register online using their identity cards. Admin log in will be handled by the electoral commission. Each voter will have a unique password which will be used in liaison with his/her ID number when logging in the system. The voters will only be allowed to vote once, afterwards the system will not allow logging in a voter who has already voted, therefore reducing double voting irregularities. The software system allows the Candidate to login in to their profiles and upload all their details including their previous milestone onto the system. The admin can check each Candidate details and verify the documents, only after verifying Candidate’s ID and Password will be generated, and can remove faulty accounts The system will also be summing up the voting results in real time hence reducing the time taken calculating the total votes.
                    </p>

                </div>
            </div>
        </div>
    </section>
    <section id="contact">
        <div class="container">
            <div id="footer">
                <p>Copyright.2021 <b>Ivote, ENT Project</b>Group 6</p>
            </div>
        </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>s

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/creative.min.js"></script>

</body>

</html>