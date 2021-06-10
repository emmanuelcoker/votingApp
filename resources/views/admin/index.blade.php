<!DOCTYPE html>
<html>
<head>

    <title> Admin</title>
    {{Html::style("admin/assets/css/bootstrap.css" )}}
    {{Html::style("admin/assets/css/custom.css" )}}
    {{Html::style("admin/assets/css/table.css" )}}

   <!--The Add/delete form-->
    {{Html::style("admin/mycss/reset.css" )}}
    {{Html::style("admin/mycss/style.css" )}}


</head>
<body>



    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">

                    </button>
                    <a class="navbar-brand" href=>
                        <h1>IVOTE</h1>

                    </a>

                </div>

                <span class="logout-spn" >
                  <a href="{{route('logout')}}" style="color:#fff;">LOGOUT {{Auth::user()->name}}</a>

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a ><i class="fa fa-qrcode "></i></a>
                    </li>
                    <li>
                        <a href="index"><i class="fa fa-bar-chart-o"></i>Students</a>
                    </li>

                    <li>
                        <a href="{{route('admin.candidates')}}"><i class="fa fa-edit "></i>Candidates</a>
                    </li>
                    

                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">



  <form action="{{route('register')}}" method="POST" class="contact">
  {{ csrf_field() }}
  <fieldset class="contact-inner">
  <p class="contact-input">
      <input type="text" name="regno" placeholder="Registration number" required>
    </p>
    <p class="contact-input">
      <input type="text" name="name" placeholder="Name" required>
    </p>
    <p class="contact-input">
      <input type="text" name="email" placeholder="email" required>
    </p>
    <p class="contact-input">
      <input type="password" name="password" placeholder="password" required>
    </p>
    
    <p class="contact-submit">
      <input type="submit" value="Add Student">
    </p>
  </fieldset>
</form>

<div id="constrainer1">
<h3>Students Voters</h3>
    <table>
        <thead>
        <th>Reg no.</th><th>Name</th><th>Email</th><th>action</th>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->regno}}</td><td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <form action="{{route('candidate.add')}}" method="POST">
                    @if(empty($user->candidate)) {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <select name="seat">
                        <option value="president">President</option>
                        <option value="vice-chair">Vice Chair</option>
                        <option value="finance">Finance</option>
                        <option value="sec-general">Sec-general</option>
                    </select>
                    <input type="submit"value="Add Student">
                    @else
                    <input type="text"value="{{$user->candidate->seat}}" disabled>
                    @endif
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

    <div class="col-lg-12">

                    </div>
                .
				  <div class="row">
                    <div class="col-lg-12 ">


    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">


            <div class="row">
                <div class="col-lg-12" >
                   Copyright.2016Derk.All rights reserved.
                </div>
            </div>
        </div>


     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>
