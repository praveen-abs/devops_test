<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>absmail</title>
    <!-- <link rel="stylesheet" href="./assets/css/mailstyle.css"> -->

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap');

body {

    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;

}

.content {

    width: 600px;
    height: 1000px;
    background-size: cover;

}

.content {
    background-image: url("https://demo.abshrms.com/assets/images/email/Background.jpg");
}

.banner {
    padding: 5px;
    text-align: center;

}

.banner h1 {
    line-height: 0.6em;
    margin: 0;
    font-family: 'Poppins', sans-serif;
    font-size: 36px;
    color: white;
    margin-top: 3%;

}

.banner p {
    text-align: center;
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    color: white;
    line-height: 18px;
    font-weight: 400;
}

.brand {
    width: 100%;
    height: 332px;
    background-image:url('https://demo.abshrms.com/assets/images/email/team.jpg');
    background-size: cover;
    text-align: center;
    position: relative;

}

/* .brand img {
    width: 100%;


} */

.brand .brand-content {
    position: absolute;
    padding:0px 20px ;
  bottom: 70px;
   z-index: 3;
}

.brand-content p {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-weight: 400;
    color: rgb(236, 235, 235);
    text-align: center;

}
.brand-content h2{
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size:35px;
    margin: 2px;
    font-weight: 700;
    color: white;
}

.brand-content button {
    width: 177px;
    height: 45px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 14px;
    color: white;
    margin-top: 4%;
    background: none;
    border-radius: 3px;
    font-weight: 500;
    border: 3px solid orangered;
    cursor: pointer;
    transition: .5s;

}

.brand-content button:hover {

    background-color: white;
    border: none;
    color: orangered;
}

.brand .overlay {
    position: absolute;
    width: 100%;
    height: 332px;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.587);

    z-index: 1;
    color: white;
}


.form2{
    display: flex;
    align-items: center;
    justify-content: center;
}

.card {
    text-align: center;
    background: white;
    border-radius: 10px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    
    width: 450px;
    height: 440px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    margin-top: 10%;
}

.card button {
    text-align: center;
    font-size: 14px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    width: 350px;
    height: 50px;
    background-color: #002F56;
    border: none;
    border-radius: 6px;
    color: white;
    font-weight: 500;
    margin-top: 5%;
    cursor: pointer;
    transition: .3s;
}

.card button:hover{
    box-shadow: 0px 2px 6px rgb(85, 85, 85); 
}


.card p {
    text-align: center;
    font-size: 14px;
    color: rgb(137, 136, 136); 
}
.card h5{
    color: rgb(46, 46, 46);
    font-size: 18px;
    margin: 3px;
}


.content3 button {
    width: 107px;
    height: 27px;
    background-color: #a1cf92;
    color: black;
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    font-weight: 600;
    border: none;
    border-radius: 4px;
    margin-top: 1%;
    cursor: pointer;
}

.content3 button:hover {
    box-shadow: 1px 1px 8px rgba(255, 255, 255, 0.479);
}



.card-body h3{
    line-height: 0rem;

    font-size: 15px;
    color: rgb(83, 83, 83);

}
.card-body p{
  color: #002F56;
  line-height: 1.5rem;
    margin-bottom: 20%;
    font-size: 19px;
    font-weight: bold;
}

/* --------------- footer -------------------*/

.footer{
    text-align: center;
    padding: 1px 3px;
    background-color: white;
    margin-top: 5%;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 13px;

}




.footer p {
    font-size: 14px;
    padding: 10px;
    color: rgb(90, 90, 90);
}

.footer a {
    color: orangered;
}


ul {
    padding: 0px 10px;


}

.footer li {
    display: inline-block;
    padding: 10px;


}

.footer a {
        text-decoration: none;
}



</style>
 </head>

<body>



    <div class="content">

        <div class="banner">
            <img src="{{$image_view}}" width="140px" height="40px" alt="">

        </div>

        <div class="brand">
            <div class="overlay"></div>


            <img src="{{url('assets/images/email/aerial-view-business-team.jpg')}}" alt="">

            <div class="brand-content">
                <h2 class="text-white">Get Started</h2>
                <p>ABShrms would like to invite you to join our organisation's
                    employee portal. Using the portal you can access all your payroll
                    related information.</p>
                <button class="btn">Get in touch</button>
            </div>


        </div>




<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="max-width:500px; background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0 35px;">
                                      
                                      <h5 class="card-title fw-bold text-center m-3">Login to your account</h5>
                <p class="text-start ">Please change the password immediately when you login </p>
                                        <p
                                            style="color:#455056; font-size:18px;line-height:20px; margin:0; font-weight: 500;">
                                            <strong
                                                style="display: block;font-size: 13px; margin: 0 0 4px; color:rgba(0,0,0,.64); font-weight:normal;">Employee Code</strong>{{$employeeEmpCode}}
                                            <strong
                                                style="display: block; font-size: 13px; margin: 24px 0 4px 0; font-weight:normal; color:rgba(0,0,0,.64);">Password</strong>{{$employeePassword}}
                                        </p>

                                   <button class="mt-4" type="submit" href="{{$loginLink}}">Login</button>


                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                            </table>




        <!-- footer -->

        <div class="footer">
            <p class="text-muted"> This e-mail was generated from ABShrms If you think this is SPAM, please do report to
                <a href="info@abshrms.com">info@abshrms.com</a>
            </p>





            <ul>
                <li><a href="
                    https://www.ardens.in/"><img src="{{url('assets/images/email/google.png')}}" width="30px" height="30px" ></a></li>
                <li><a href="https://www.facebook.com/ArdensHR"><img src="{{url('assets/images/email/facebook-logo-2019.png')}}" width="30px" height="30px" ></a></li>
                <li><a href="https://www.linkedin.com/company/ardenshr-services-private-limited/"><img src="{{url('assets/images/email/linkedin (1).png')}}" width="30px" height="30px" ></a></li>
                <li><a href="https://twitter.com/HrArdens"><img src="{{url('assets/images/email/twitter.png')}}" width="30px" height="30px" ></a></li>
                <li><a href="https://www.youtube.com/channel/UCgZ7XpBoJvcWWvaiBS5GxHg"><img src="{{url('assets/images/email/movie.png')}}" width="30px" height="30px" ></a></li>
                <li><a href="https://www.instagram.com/ardenshr/"><img src="{{url('assets/images/email/instagram.png')}}" width="30px" height="30px" ></a></li>

            </ul>


        </div>
<script src="{{ URL::asset('/assets/js/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/js/jquery.min.js') }}"></script>
       <!--  <script src="./Assets/js/bootstrap.min.js"></script>
        <script src="./Assets/js/jquery.min.js"></script> -->
</body>

</html>