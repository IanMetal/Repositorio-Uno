<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Front End de Tik Tok</title>
    
    <style>
        body {
            margin: 0;
            background-color: #468;
            color: white;
            font-family: Arial, sans-serif;
            overflow: hidden;
        }
       
        .feed {
            height: 100vh;
            scroll-snap-type: y mandatory;
            overflow-y: scroll;
        }

        .video-card {
            position: relative;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            scroll-snap-align: start;
        }

        video {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .overlay {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            width: 100%;
            padding: 20px;
            background: linear-gradient(to top, rgba(0,0,0,0.6), transparent 60%);
        }

        .caption {
            max-width: 70%;
        }

        .username {
            font-weight: bold;
            margin-bottom: 8px;
        }

        .actions {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        .action-btn {
            text-align: center;
            cursor: pointer;
        }

        .action-btn img {
            width: 40px;
            height: 40px;
            filter: invert(1);
        }

        .likes {
            font-size: 12px;
            margin-top: 4px;
        }

        .hint {
            position: fixed;
            bottom: 10px;
            width: 100%;
            text-align: center;
            font-size: 14px;
            color: #ccc;
        }
    </style>

</head>
<body>

<?php

// Codigos de datos de videos (normalmente provendrían de una base de datos)
$videos = [
    [
        "usuario" => "usuario1",
        "archivo" => "https://www.youtube.com/watch?v=JTSAnYHbPrc",
        "descripcion" => "En esta seccion se debe mostrar el video numero 1",
        "likes" => 1024,
        "comentarios" => 56
    ],
    
    [
        "usuario" => "usuario2",
        "archivo" => "https://www.youtube.com/watch?v=JTSAnYHbPrc",
        "descripcion" => "En esta seccion se debe mostrar el video numero 2",
        "likes" => 780,
        "comentarios" => 20
    ],
    
    [
        "usuario" => "usuario3",
        "archivo" => "https://www.youtube.com/watch?v=JTSAnYHbPrc",
        "descripcion" => "En esta seccion se debe mostrar el video numero 3",
        "likes" => 450,
        "comentarios" => 12
    ]
];
?>

<div class="feed">
    <?php foreach($videos as $video): ?>
        <div class="video-card">
            <video src="<?= $video['archivo'] ?>" loop muted></video>
            <div class="overlay">
                <div class="caption">
                    <div class="username">@<?= $video['usuario'] ?></div>
                    <div><?= $video['descripcion'] ?></div>
                </div>
                <div class="actions">
                    <div class="action-btn">
                        <img src="https://cdn-icons-png.flaticon.com/512/833/833472.png" alt="like">
                        <div class="likes"><?= $video['likes'] ?></div>
                    </div>
                    <div class="action-btn">
                        <img src="https://cdn-icons-png.flaticon.com/512/2462/2462719.png" alt="comentario">
                        <div class="likes"><?= $video['comentarios'] ?></div>
                    </div>
                    <div class="action-btn">
                        <img src="https://cdn-icons-png.flaticon.com/512/786/786205.png" alt="compartir">
                        <div class="likes">Compartir</div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="hint">Desliza hacia arriba o abajo para cambiar de video</div>

<script>
    // Auto-reproducción del video actual visible
    const videos = document.querySelectorAll('video');
    let current = 0;

    function playCurrentVideo(index) {
        videos.forEach((v, i) => {
            if (i === index) v.play();
            else v.pause();
        });
    }

    playCurrentVideo(0);

    document.querySelector('.feed').addEventListener('scroll', () => {
        let index = Math.round(window.scrollY / window.innerHeight);
        if (index !== current) {
            current = index;
            playCurrentVideo(index);
        }
    });
</script>

</body>
</html>