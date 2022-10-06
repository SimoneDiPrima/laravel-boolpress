<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        .mail-content{
            text-align:center;
            background-color:dodgerblue;
            color:white;
        }

    </style>
    <div class="mail-content">
        <h1>è stato pubblicato un nuovo post</h1>
        <h4>{{ $post->title }}</h4>
        <h5>{{ $post->author->name }}</h5>
        <h5 >{{ $post->category->label }}</h5>

    </div>
   
    
</body>
</html>