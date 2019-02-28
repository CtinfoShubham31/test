<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<base href="<?php echo base_url(); ?>" />
<title>POS System</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="fonts/roboto/stylesheet.css"/>
<script src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"/></script>
<script>
$(function() {
    var isClicked = false;
    $("button#login").on('click', function () {
        if (!isClicked) {
            isClicked = true;
            $.ajax({
                type: "POST",
                url: "home/homepage/sendmail_withotp",
                data: $('form#loginform').serialize(),
                dataType: "json",
                //data: {"id":"1","_token": "{{ csrf_token() }}"},
                success: function(data){
                    if(data.errors.email){
                        $("#email_error").html(data.errors.email);
                        setInterval(function(){ $("#email_error").html(''); }, 3000);
                    }
                    else if(data.success){
                        $("#set_email").val(data.success);
                        $('#modal-otp').modal('show');
                    }
                    isClicked = false;
                    //$("#thanks").html(msg)
                    //$("#form-content").modal('hide'); 
                },
                error: function(){
                   alert("failure");
                }
            });
        }
    });
    
//    $('#email_login').keyup(function (event) {
//        if (event.keyCode == 13) { alert('z');
//            debugger
//        event.preventDefault();
//            $('button#login').trigger('click');
//        }
//    });
    
//    $("#email_login").keydown(function(e){
//        if(e.which === 13){
//            $("button#login").click();
//        }
//    });
    
    $("#modal-signup").on('hidden.bs.modal', function (e) {
        $(this).find("input,textarea,select").val('').end();
    });
    
    
    $("#modal-otp").on('hidden.bs.modal', function (e) {
        $(this).find("input,textarea,select").val('').end();
    });
    
    var isRegistered = false;
    $("button#registration").click(function(){
        if (!isRegistered) {
            isRegistered = true;
            $.ajax({
                type: "POST",
                url: "home/homepage/sendmail_withotp",
                data: $('form#regform').serialize(),
                dataType: "json",
                //data: {"id":"1","_token": "{{ csrf_token() }}"},
                success: function(data){
                    if(data.errors.email){
                        $("#regemail_error").html(data.errors.email);
                        setInterval(function(){ $("#regemail_error").html(''); }, 3000);
                    }
                    else if(data.success){
                        $('#modal-signup').modal('hide')
                        $("#set_email").val(data.success);
                        $('#modal-otp').modal('show');
                    }
                    isRegistered = false;
                    //$("#thanks").html(msg)
                    //$("#form-content").modal('hide'); 
                },
                error: function(){
                   alert("failure");
                }
            });
        }
    });
    
    //-------Send otp----------
    $("button#otpcheck").click(function(){
        $.ajax({
            type: "POST",
            url: "home/homepage/login",
            data: $('form#otpform').serialize(),
            dataType: "json",
            success: function(data){
                if(data.errors.otp){
                    $("#otp_error").html(data.errors.otp);
                    setInterval(function(){ $("#otp_error").html(''); }, 3000);
                }
                else if(data.comp_success){
                    window.location.href = 'dashboard/dashboard_setup/manage_dashboard';
                }
                else if(data.success){
                    window.location.href = 'company/companypage/add_company';
                }
                
            },
            error: function(){
               alert("failure");
            }
        });
    });
    
    var isResend = false;
    $("a#resendOtp").click(function(){
        if (!isResend) {
            email = $("#set_email").val();
            isResend = true;
            $.ajax({
                type: "POST",
                url: "home/homepage/resendmail_withotp",
                data: {email:email},
                dataType: "json",
                //data: {"id":"1","_token": "{{ csrf_token() }}"},
                success: function(data){
                    if(data.errors.email){
                        $("#otp_error").html(data.errors.email);
                        setInterval(function(){ $("#otp_error").html(''); }, 3000);
                    }
                    else if(data.success){
    //                    $('#modal-signup').modal('hide')
    //                    $("#set_email").val(data.success);
    //                    $('#modal-otp').modal('show');
                    }
                    isResend = false;
                    //$("#thanks").html(msg)
                    //$("#form-content").modal('hide'); 
                },
                error: function(){
                   alert("failure");
                }
            });
        }
    });
    
});

function sendMessage(){
    $.ajax({
        type: "POST",
        url: "home/homepage/sendmail_withotp",
        data: $('form#loginform').serialize(),
        dataType: "json",
        //data: {"id":"1","_token": "{{ csrf_token() }}"},
        success: function(data){
            if(data.errors.email){
                $("#email_error").html(data.errors.email);
                setInterval(function(){ $("#email_error").html(''); }, 3000);
            }
            else if(data.success){
                $("#set_email").val(data.success);
                $('#modal-otp').modal('show');
            }
            isClicked = false;
            //$("#thanks").html(msg)
            //$("#form-content").modal('hide'); 
        },
        error: function(){
           alert("failure");
        }
    });
}


//function resendOtp(){
//    var isResend = false;
//    
//    if (!isResend) {
//        email = $("#set_email").val();
//        isResend = true;
//        $.ajax({
//            type: "POST",
//            url: "home/homepage/resendmail_withotp",
//            data: {email:email},
//            dataType: "json",
//            //data: {"id":"1","_token": "{{ csrf_token() }}"},
//            success: function(data){
//                if(data.errors.email){
//                    $("#otp_error").html(data.errors.email);
//                    setInterval(function(){ $("#otp_error").html(''); }, 3000);
//                }
//                else if(data.success){
////                    $('#modal-signup').modal('hide')
////                    $("#set_email").val(data.success);
////                    $('#modal-otp').modal('show');
//                }
//                isResend = false;
//                //$("#thanks").html(msg)
//                //$("#form-content").modal('hide'); 
//            },
//            error: function(){
//               alert("failure");
//            }
//        });
//    }
//}
</script>
</head>
<body class="body-bg">
<div class="modal fade" id="modal-signup" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <div align="justify">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
<!--                <h5 class="text-center"> Your Email Id </h5>-->
            </div>
            
            <!----------Registration Popup--------->
            <div class="modal-body">
                <form method="post" id="regform">
                    <div class="row">
<!--                        <div class="col-md-12">
                            <p class="text-center"> Please type your valid email id for OTP.</p>
                        </div>-->
                        <div class="clearfix"> </div>
                        
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                                <span id="regemail_error" class="error_msg"></span>
                            </div>
                        </div>
                        <input type="hidden" name="registration_email" id="registration_email">
                        <div class="clearfix"> </div>
                        
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <div align="center">
<!--                                    <button type="button" class="btn btn-success success-full" data-toggle="modal" data-target="#modal-otp" id="registration" data-dismiss="modal"> Login </button>-->
                                    <button type="button" class="btn btn-success success-full" id="registration"> Register </button>
                                    <br/>
                                    <br/>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
    
<!-----  OTP modal --------->
    <div class="modal fade" id="modal-otp" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <div align="justify">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <h5 class="text-center"> Type your OTP </h5>
                </div>
                <div class="modal-body">
                    <form method="post" id="otpform">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-center"> Please don't share your OTP with anyone. </p>
                            </div>
                            <div class="clearfix"> </div>
                            
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="otpcode" id="otpcode" placeholder="Type your OTP">
                                    <span id="otp_error" class="error_msg"></span>
                                    <p class="small text-right"> <a href="javascript:;" id="resendOtp">Resend OTP </a></p>
                                </div>
                            </div>
                            
                            <input type="hidden" name="set_email" id="set_email">
                            <div class="clearfix"> </div>
                            
                            <div class="col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <div align="center">
<!--                                        <button type="button" id="otpcheck" class="btn btn-success success-full" data-dismiss="modal"> Submit </button>-->
                                        <button type="button" id="otpcheck" class="btn btn-success success-full"> Submit </button>
                                        <br/>
                                        <br/>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-----  otp modal --------->
    <header class="login-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-signup"> Register Now </button>
                </div>
            </div>
        </div>
    </header>

    <!---------Login form(Main)----------->
    <section class="login-sec">
        <div class="container">
            <div class="login-area">
                <form method="post" id="loginform" onsubmit="sendMessage();return false">
                    <div class="form-group text-center"> <img src="img/logo.png" class="img-responsive"> <br/></div>
                    <div class="form-group">
                        <input type="text" class="form-control sign-control" name="email" id="email_login" placeholder="Email">
                        <span id="email_error" class="error_msg"></span>
                    </div>
                    <div class="form-group">
<!--                        <button class="btn btn-success btn-full" id="login" type="button" data-toggle="modal" data-target="#modal-otp" data-dismiss="modal" > Login </button>-->
                        <button class="btn btn-success btn-full" id="login" type="button"> Login </button>    
                    </div>
                    <hr>
                    <div class="form-group">
                        <button class="btn btn-primary btn-full" type="button" data-toggle="modal" data-target="#modal-signup"> Login with giddh </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

</body>
</html>
