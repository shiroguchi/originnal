<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>BookShelf</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
       
       <style>
.jumbotron {
	background-image: url(image/book4.jpg);
	background-repeat:repeat;
	}
.details{
  list-style: none;
}
.details li{
    position: relative;
}
.details dl{
    position: absolute;
	top: 0;
	margin: 0;
	padding: 16px 24px;

	color: #fff;
	background: rgba(112, 191, 63,.9);
	
	overflow: hidden;
	transition: opacity .6s, transform .6s cubic-bezier(0.215, 0.61, 0.355, 1);
}
.details:not(:hover) dl {
	opacity: 0;
	transform: translateY(100%);
}
</style>
    </head>

    <body>
        @include('commons.navbar')
        
        <div class="container">
            @include('commons.error_messages')
            
            @yield('content')
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
        <script>
            $(function(){
                $(".btn-dell").click(function(){
                    if(confirm("本当に削除しますか？")){
                     //そのままsubmit（削除）
                    }else{
                    //cancel
                    return false;
                    }
                });
            });
        </script>
    </body>
</html>