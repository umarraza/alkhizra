
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Signin Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
    <link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
    .form-signin {

        margin-top: 200px;

    }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
    <body class="text-center">
        <div class="row">
            <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form class="form-signin" action="{{url('new-password')}}" method="post">

                    {{ csrf_field() }}

                        <img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">

                            {{--  <h1 class="h3 mb-3 font-weight-normal">Please Enter Your Password</h1>  --}}
                            <label class="form-check-label" for="exampleCheck1">Please Enter Your Password</label>
                            
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter Your Password" required> <br>
                                <label class="form-check-label" for="exampleCheck1">Confirm Password</label>

                            <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password" required> <br>
                            <input type="hidden" id="userId" name="userId" value="{{$userId}}" class="form-control" placeholder="Confirm Password" required> <br>

                            <button class="btn btn-sm btn-primary btn-block" type="submit">Submit</button>
                    
                        <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
                    </form>
                </div>
            <div class="col-md-4"></div>
        </div>
    </body>
</html>
