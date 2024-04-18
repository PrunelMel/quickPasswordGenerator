<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/assets/css/style.css">
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="/assets/js/main.js"></script>
        <title>Home page</title>
    </head>
    <body class="bg-blue-700 h-screen">
        <div class="container flex flex-row content-center gap-x-4 w-full h-full bg-blue-700">
                <div class="text-container text-white w-1/2 grid grid-cols-1 content-center" >
                <p class="hidde text-center text-lg w-full">
                    <span class="tracking-widest text-5xl font-bold">Error!</span>  <br>
                    <?php echo $message?>

                    </p>
                </div>
                <div class="hiddeImg img-container grid grid-cols-1 content-center  w-1/2">
                    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 

                    <dotlottie-player src="https://lottie.host/7b002cd7-6b5f-492c-89bc-ab0f6408376b/9VTgpZBqJe.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>
                </div>
            </div>
    </body>
</html>