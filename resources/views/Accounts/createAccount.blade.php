<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/hmac-sha256.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/components/enc-base64-min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>

    <!-- CSRF Token -->
    <script src="{{ asset('/public/js/app.js') }}"></script>
    
</head>
    <body>
        <form action="{{url('create-account')}}" method="post">
        {{ csrf_field() }}
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <h4>Create Account</h4>

                        <label class="form-check-label" for="exampleCheck1">First Name</label>
                        <input class="form-control form-control-sm" name="first_name" type="text" placeholder="" required>

                        <label class="form-check-label" for="exampleCheck1">Last Name</label>
                        <input class="form-control form-control-sm" name="last_name" type="text" placeholder="" required>

                        <label class="form-check-label" for="exampleCheck1">Email</label>
                        <input class="form-control form-control-sm" name="email" type="text" placeholder="" required>

                        <label class="form-check-label" for="exampleCheck1">Password</label>
                        <input class="form-control form-control-sm" name="password" type="password" placeholder="" required>

                        <input class="form-control form-control-sm" id="api_key" type="hidden" value="{{$api_key}}">
                        <input class="form-control form-control-sm" id="api_secret" type="hidden" value="{{$api_secret}}">
                        <input class="form-control form-control-sm" id="client_secret" type="hidden" value="{{$client_secret}}">

                        <br>
                        <button type="submit" class="btn btn-primary btn-sm">Create Account</button>

                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </form>
        <br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-md-4"></div>
        </div>
        <script>
            // Defining our token parts

            const $api_key = document.getElementById('api_key').value;
            const $api_secret = document.getElementById('api_secret').value;
    
           var header = {
            "alg": "HS256",
            "typ": "JWT"
            };

            var data = {
            "iss": api_key,
            "exp": 1516239022
            };


            function base64url(source) {
                // Encode in classical base64
                encodedSource = CryptoJS.enc.Base64.stringify(source);
                // Remove padding equal characters
                encodedSource = encodedSource.replace(/=+$/, '');
                
                // Replace characters according to base64url specifications
                encodedSource = encodedSource.replace(/\+/g, '-');
                encodedSource = encodedSource.replace(/\//g, '_');
                
                return encodedSource;
            }

            var stringifiedHeader = CryptoJS.enc.Utf8.parse(JSON.stringify(header));
            var encodedHeader = base64url(stringifiedHeader);

            var stringifiedData = CryptoJS.enc.Utf8.parse(JSON.stringify(data));
            var encodedData = base64url(stringifiedData);

            var signature = encodedHeader + "." + encodedData;
            signature = CryptoJS.HmacSHA256(signature, api_secret);
            signature = base64url(signature);

            const jwt_token = encodedHeader + '.' + '.' encodedData + '.' signature;
        </script>
    </body>
</html>
