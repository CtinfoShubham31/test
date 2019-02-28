<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <base href="<?php echo base_url(); ?>" />
        <title>Admin Kaseidon</title>
        <link rel="icon" href="images/favicon.ico" type="x-icon">
        <!-- Bootstrap Core CSS -->
        <link href="admin_design/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="admin_design/css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="admin_design/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="admin_design/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery -->
        <script src="admin_design/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="admin_design/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="admin_design/js/jquery.validate.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="admin_design/js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="admin_design/js/sb-admin-2.js"></script>
    <script>
    $(function() {
        $("#admin_login").submit(function(event) {
            /* stop form from submitting normally or prevent default action */
            event.preventDefault();
            var form_data = $(this).serialize(); //Encode form elements for submit
            
            $.ajax({
                url : 'ks_admin/admin_home/login',
                type: "POST",
                data : form_data,
                dataType: "json",
                success: function(response){
                    if(response.errors.email){
                        $("#email_error").fadeIn().html(response.errors.email);
                        setTimeout(function() {
                            $('#email_error').fadeOut("slow");
                        }, 3000 );
                    }
                    else if(response.errors.password){
                        $("#pass_error").fadeIn().html(response.errors.password);
                        setTimeout(function() {
                            $('#pass_error').fadeOut("slow");
                        }, 3000 );
                        
                    }
                    else if(response.success){
                        
                        //window.location.href = "jadah_admin/admin_dashboard/landing_page";
                        window.location.href = "ks_admin/admin_user/user_lists";
                    }
                },
                error: function(){
                   alert("failure");
                }
            });
           // event.unbind(); //unbind. to stop multiple form submit.
        });
    });
    </script>
    

    <style>
        body {
            background-color: #333;
        }
    </style>
    </head>
    <body class="body-bg">

        
        <div class="container">
            <div class="login-area">
                <form name="admin_login" id="admin_login">
                    <div class="form-group text-center"> 
                        <center><img src="images/logo.png" class="img-responsive"></center> <br/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control sign-control" name="email" id="email" placeholder="Email">
                        <span id="email_error" class="error_msg"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control sign-control" name="password" id="password" placeholder="Password">
                        <span id="pass_error" class="error_msg"></span>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success btn-full" type="submit" > Login </button>
                    </div>

                </form>
            </div>
        </div>
        
    </body>
</html>
