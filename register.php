<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    
    <?php include './templates/nav.php'?>
    
    <div class = "container mt-5">
        <div class = "row justify-content-md-center">
            <div class = "col col-md-6">
                    <h3>Nueva cuenta</h3><hr/>
                    <form id = "register-form">
                        <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" >
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" >
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" >
                            </div>
                            <button type="submit" class="btn btn-primary">Crear cuenta</button>
                    </form>
                    <div class = "alert alert-danger mt-4 d-none" id="errormessage"></div>
            </div>
        </div>
    </div>

    <script src = https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js ></script>
    <script>
        document.getElementById('register-form').onsubmit = (e) => {
            e.preventDefault();
            
            const errorMessage= document.getElementById('errormessage');
            errorMessage.classList.add('d-none');

            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            
            if (!email || !name || !password) {
                return;
            }

            axios.post('api/register.php', { email: email, name: name, password: password})
                .then(res => {
                    //redireccionamos a panel de php
                    console.log(res);
                })
                .catch(err => {
                    //errorMessage.innerText = err.response.data;
                    //errorMessage.classList.remove('d-none');
                    console.log(err.response.data);
                });

        }
    </script>

</body>
</html>

