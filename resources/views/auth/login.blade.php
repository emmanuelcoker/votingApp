<!DOCTYPE html>
<html>
    <head>
        <title>verification form</title>

        <link rel="stylesheet" href="css/mycss.css">

    </head>
    <body class="bg-cyan">
        <div class="body body-s">

            <form action="{{route('login')}}" method="POST" class="sky-form">
                {{csrf_field()}}
                <header>   Student Verification <img src="img/ivote2.png" style="width: 90px; height:50px;"></header>

                <fieldset>
                    <section>
                        <div class="row">
                            <label class="label col col-4">Your Email</label>
                            <div class="col col-8 form-group">
                                <label class="input">

                                    <input type="email" class="form-control" required="" name="email" >
                                </label>
                            </div>
                        </div>
                    </section>

                    <section>
                        <div class="row">
                            <label class="label col col-4">Password</label>
                            <div class="col col-8 form-group">
                                <label class="input">

                                    <input type="password" class="form-control" required="" name="password">
                                </label>

                                @if (Route::has('password.request'))
                                <a class="w-100 text-center btn btn-sm btn-flat" style="text-decoration: underline;" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif

                    </section>

                </fieldset>
                <footer>
                    <button type="submit" name="verBtn" class="button">Login</button >
                </footer>
            </form>

        </div>
    </body>
</html>