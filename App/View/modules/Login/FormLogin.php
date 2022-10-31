<!DOCTYPE html>
<html lang="pt-br">

<body>
    <div class="container">
        <form class="form" action="/login/auth" method="post">

            <label>E-mail:</label>
            <input class="form-control" name="email" type="text" />

            <label>Senha:</label>
            <input class="form-control" name="senha" type="password" /><br>
            
            <div class="container-login">
                <button class="btn btn-primary" type="submit">Entrar</button>
                <a href="/login/form">Registrar-se</a>
            </div>
            
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
