    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <title text-color-while>手と手整骨院予約サイト</title>
    </head>
    <body>
        <header class="bg-info border border-primary border: 100px">
            手と手整骨院予約サイト
            <div class="h-100"> 
                <div class="text-right">
                    <a class="btn btn-primary　border-right white border: 100px" href="">
                        ログイン
                    </a>
                    <a class="btn btn-primary" href="">
                        新規登録
                    </a>
                </div>
            </div>
        </header>


        <main>
            @yield('content')
        </main>



        <footer>

            <div>
                <p>©2020 volcite,Allrights reserved</p>
            </div>

        </footer>
 
    </body>
    </html>