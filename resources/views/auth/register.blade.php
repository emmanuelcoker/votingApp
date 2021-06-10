<!DOCTYPE html>
<html>
    <head>
        <title>verification form</title>

        <link rel="stylesheet" href="css/mycss.css">

    </head>
    <body class="bg-cyan">
        <div class="body body-s">

            <form action="" class="sky-form">
                <header>   Student Verification <img src="img/logo.png"></header>

                <fieldset>
                    <section>
                        <div class="row">
                            <label class="label col col-4">first name</label>
                            <div class="col col-8">
                                <label class="input">

                                    <input type="text" required="" name="fname" >
                                </label>
                            </div>
                        </div>
                    </section>

                    <section>
                        <div class="row">
                            <label class="label col col-4">last name</label>
                            <div class="col col-8">
                                <label class="input">

                                    <input type="text" required="" name="lname">
                                </label>

                    </section>

                     <section>
                        <div class="row">
                            <label class="label col col-4">Reg  No .<br></label>
                            <div class="col col-8">
                                <label class="input">

                                    <input type="text" required="" name="reg">
                                </label>

                    </section>


                </fieldset>
                <footer>
                    <button type="submit" name="verBtn" class="button">Verify</button >
                </footer>
            </form>

        </div>
    </body>
</html>