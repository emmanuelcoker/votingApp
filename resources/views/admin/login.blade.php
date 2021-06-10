<!DOCTYPE html> 
<html>
    <head>
        <title>Administrator login</title>
        
       
       {{Html::style("/admin/css/mycss.css" )}}
        
    </head>
    <body class="bg-cyan">
        <div class="body body-s">
        
            <form action="{{route('login')}}" method="POST" class="sky-form">
                {{ csrf_field() }}
                <header>Administrator login {{Html::image('img/logo.png','',['padding'=>'200px'])}}</header>
                
                <fieldset>                  
                    <section>
                        <div class="row">
                            <label class="label col col-4">User name</label>
                            <div class="col col-8">
                                <label class="input">
                                    
                                    <input type="email" required="" name="email" required>
                                </label>
                            </div>
                        </div>
                    </section>
                     <section>
                        <div class="row">
                            <label class="label col col-4">password</label>
                            <div class="col col-8">
                                <label class="input">
                                    
                                    <input type="password" required="" name="password" required>
                                </label>
                                
                    </section>
                    
                  
                </fieldset>
                <footer>
                    <button type="submit" name="login" class="button">login</button >
                </footer>
            </form>
            
        </div>
    </body>
</html>