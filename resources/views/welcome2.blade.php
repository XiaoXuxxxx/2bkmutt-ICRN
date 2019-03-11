<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    * {
        box-sizing: border-box;
    }
    body {
        margin: 0;
        font-family: Arial;
        font-size: 17px;
    }
    #myVideo {
        position: absolute;
        right: 0;
        bottom: 0;
        min-width: 100%; 
        min-height: 100%;
        opacity: 0.5;
    }

    .content {
        position: absolute;
        margin: auto;
        background: rgba(0, 0, 0, 0.5);
        color: #f1f1f1;
        width: 100%;
        height: 100%;
        text-align: center;
    }
</style>
</head>
    <body>
        <video autoplay muted loop id="myVideo">
            <source src="/video/2b14.mp4" type="video/mp4"> Your browser does not support HTML5 video.
        </video>
        <div class="content">
            <p>hello</p>
        </div>
    </body>
</html>
