<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="public/css/styles.css" type="text/css">
        <!-- Styles -->
        <style>
   .textfield{
     height: 20px;width: 150px;color: red;  font-size: 23px;padding:10px;padding-top: 15px;padding-bottom: 15px;
      position: relative;top: 10px;
   }
   #style_existing_carts{
     position: relative;left: 40%;top: -155px;
   }
   #table_existing_products{
      position: relative;left: 50%;top: -100px;
   }
   #already_added_products{
     position: relative;left: 45%;top:-187px;
   }
        .text1{
          font-size: 21px;color: black;font-weight: bold;
        }
        .text2{
          color: red;  font-size: 23px;
        }
        .text3{
          color: black;  font-size: 19px;
        }
        #leftdistance{
          margin-left: 40px;
        }
        #butcarttype{
          background-color: red;color: black;border: 3px solid red;
         font-size: 19px;font-weight: bolder;text-decoration: none;
       }
        .but{
          position: absolute;left: 127px; background-color: red;color: black;border: 3px solid red;
          font-size: 19px;font-weight: bolder;text-decoration: none;
        }
      #septyecart{
        margin-left: 50px;      margin-top: 15px;
      }
        .sep{
          margin-top: 15px;
        }
        .drop{
               width: 200px;height: 44px;font-size: 21px;background-color: ;
        }

            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .links > a {
                color: red;
                padding: 0 25px;
                font-size: 14px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: capitalize;
                margin-top: 300px;


            }
            .clear{
              padding: 10px; color: white;font-size: 13px; font-weight: bolder;
              background-color: border: 1px solid #333333; border-radius: 3px 3px 3px 3px;
             color: #f5f5f5; padding: 5px;
            }
            .tables{
              background: #fe921f; color: #ffffff; display: inline-block; font-family: 'Lato',
              sans-serif; font-size: 12px; font-weight: bold;
               line-height: 12px; letter-spacing: 1px; margin: 0 0 30px; padding: 10px 15px 8px; text-transform: uppercase
              background-color:  #93291b;   box-shadow: 0 0 1px #93291b inset;
            }
      .cont{
        margin-top: 100px;border: 2px red solid;
      }
      .footer{
        background-color: black;margin-top: 100px;color:white;margin-bottom: 0px;
      }
        #linkscontainer{
          background-color: black;height: 67px;
        }
.inpt{
height: 37px;
}
        </style>
    </head>
    <body>

          <div id='linkscontainer'>
            <div class="links" >
                <a href="carts">Control Carts</a>
                <a href="product">Control Products</a>
                <a href="">About</a>

            </div>
          </div>

          <div class='cont'>
            @yield('content')
          </div>

          <div class='footer'>
all rights are reserved for @us.com
          </div>


    </body>
</html>
