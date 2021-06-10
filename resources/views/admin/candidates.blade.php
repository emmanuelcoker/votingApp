<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
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
                        <a href="{{route('admin.index')}}"><i class="fa fa-bar-chart-o"></i>Students</a>
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

 <form action="" class="contact" onsubmit="return false;">
  <fieldset class="contact-inner">
  <p class="contact-input">
      <input type="text" name="regno" placeholder="Registration number" autofocus>
    </p>
    <p class="contact-input">
      <input type="text" name="firstName" placeholder="First name…" autofocus>
    </p>
    <p class="contact-input">
      <input type="text" name="secondName" placeholder="Secondname…" autofocus>
    </p>
    <p class="contact-input">
      <input type="text" name="lastName" placeholder="Last name" autofocus>
    </p>

    <p class="contact-input">
      <label for="select" class="select">
        <select name="subject" id="select">
          <option value="1" selected>Which campus?</option>
          <option value="1">Main</option>
          <option value="1">Karen</option>
           <option value="1">Karen</option>
          <option value="1">Westlands</option>
        </select>
      </label>
    </p>
    <p class="contact-submit">
      <input type="submit" value="Add Candidate">
    </p>
  </fieldset>
</form>













<div id="constrainer2">
<h3>All Candidates</h3>
    <table>
        <thead>
        <th>Reg no.</th><th>Name</th><th>Seat</th><th>Votes</th>
        </thead>
        <tbody>
        @foreach($candidates as $candidate)
        <tr><td>{{$candidate->regno}}</td><td>{{$candidate->name}}</td><td>{{$candidate->seat}}</td><td>{{$candidate->votes}}</td></tr>
        @endforeach
       
     
        </tbody>
    </table>
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
