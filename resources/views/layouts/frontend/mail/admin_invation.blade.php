<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    
    
    

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="card">
                <img src="https://teambuilding.com/wp-content/uploads/2020/10/festive-virtual-holidy-party-invitation.jpg" class="card-img-top" alt="admin Photo">
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            Admin invitation Send By {{ $creator_name }}
                        </h5>
                    </div>
                    <div class="py-5">
                        <p>Your Email : {{ $email }}</p>
                        <p>Your Password : {{ $password }}</p>
                        <a href="{{ route('login') }}" target="_blank" class="btn btn-primary btn-sm">Login to Dashbord</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
