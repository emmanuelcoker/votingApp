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
                <header>   Student Verification <img src="img/logo.png"></header>

                <fieldset>
                    <section>
                        <div class="row">
                            <label class="label col col-4">Your Email</label>
                            <div class="col col-8">
                                <label class="input">

                                    <input type="email" required="" name="email" >
                                </label>
                            </div>
                        </div>
                    </section>

                    <section>
                        <div class="row">
                            <label class="label col col-4">Password</label>
                            <div class="col col-8">
                                <label class="input">

                                    <input type="password" required="" name="password">
                                </label>

                    </section>

                </fieldset>
                <footer>
                    <button type="submit" name="verBtn" class="button">Login</button >
                </footer>
            </form>

        </div>
    </body>
</html>