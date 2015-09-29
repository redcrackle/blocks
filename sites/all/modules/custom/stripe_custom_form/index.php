<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>

    <div class="container">
        <h1 class="jumbotron">
            Choose a plan that suits you
        </h1>
        <form action="payment.php" method="post">
            <div class="form-group">
                <input type="hidden" name="plan" value="standard">
                <button type="submit" class="btn">Standard</button>
            </div>
        </form>

        <form action="payment.php" method="post">
            <div class="form-group">
                <input type="hidden" name="plan" value="professional">
                <button type="submit" class="btn">Professional</button>
            </div>
        </form>

        <form action="payment.php" method="post">
            <div class="form-group">
                <input type="hidden" name="plan" value="vip">
                <button type="submit" class="btn">VIP</button>
            </div>
        </form>
    </div>

    </body>
</html>