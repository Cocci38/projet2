<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="CSS\style.css">
    <title>Document</title>
</head>

<body class='main-bg'>

    <!--Login forme-->

    <div class='container'>
        <div class='row justify-content-center mt-5'>
            <div class='col-lg-4 col-md-8 col-sm-8'>
                <div class='card shadow'>
                    <div class='card-title text-center border-bottom'>
                        <h2 class='p-3'>Login</h2>
                    </div>
                    <div class='card-body'>
                        <form>
                            <div class='mb-4'>
                                <label for='username' class='form-label'>Username/Email</label>
                                <input type='text' class='form-control' id='username'>
                            </div>
                            <div class='mb-4'>
                                <label for='password' class='form-label'>Password</label>
                                <input type='password' class='form-control' id='password'>
                            </div>

                            <div class='mb-4'>
                                <input type='checkbox' class='form-check-input' id='remember'>
                                <label for='remember'>Remember Me</label>
                            </div>

                            <div class='d-grid'>
                                <button type='submit' class='btn main-bg text-light'>Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>