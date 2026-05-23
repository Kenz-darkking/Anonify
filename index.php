<?php
require_once 'includes/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SendTheSong - A bunch of untold words, sent through the song</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: '#2F6A3F'
                    },
                    fontFamily: {
                        sans: ['Quicksand', 'ui-sans-serif', 'system-ui', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Quicksand', sans-serif;
        }

        body::before,
        body::after {
            content: '';
            position: fixed;
            border-radius: 9999px;
            filter: blur(84px);
            opacity: .36;
            pointer-events: none;
            z-index: -10;
        }

        body::before {
            top: -4rem;
            right: -8rem;
            width: 20rem;
            height: 20rem;
            background: rgba(47, 106, 63, .18);
        }

        body::after {
            bottom: -6rem;
            left: -8rem;
            width: 24rem;
            height: 24rem;
            background: rgba(148, 175, 155, .20);
        }

        .nav-link {
            color: #64748b;
            transition: color .2s ease, font-weight .2s ease;
        }

        .nav-link.active,
        .nav-link:hover {
            color: #2F6A3F;
            font-weight: 600;
        }

        .card-link {
            position: absolute;
            inset: 0;
            z-index: 10;
        }
    </style>
</head>

<body class="min-h-screen bg-[#f4f5fb] text-slate-900">
    <nav class="sticky top-0 z-50 border-b border-slate-200 bg-white/80 backdrop-blur-xl shadow-sm">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-5 py-4">
            <a href="index.php" class="text-2xl font-semibold tracking-tight text-[#2F6A3F]">sendthesong</a>
            <div class="hidden items-center gap-5 md:flex">
                <a href="index.php" class="nav-link active text-sm font-medium">Home</a>
                <a href="submit.php" class="nav-link text-sm font-medium">Tell Your Story</a>
                <a href="browse.php" class="nav-link text-sm font-medium">Browse</a>
                <a href="history.php" class="nav-link text-sm font-medium">History</a>
                <a href="support.php" class="nav-link text-sm font-medium">Support</a>
            </div>
        </div>
    </nav>

    <section class="mx-auto max-w-7xl px-5 py-16 sm:py-20">
        <div class="mx-auto max-w-3xl text-center">
            <h1 class="text-5xl font-bold tracking-tight text-[#2F6A3F] sm:text-6xl">a bunch of the untold words, sent through the song</h1>
            <p class="mt-4 text-lg leading-8 text-slate-600">Express your untold message through the song.</p>
        </div>

        <div class="mx-auto mt-12 max-w-4xl rounded-[32px] border border-slate-200 bg-white/90 p-8 shadow-2xl">
            <div class="flex flex-col items-center gap-4 text-center sm:flex-row sm:justify-center sm:text-left">
                <a href="submit.php" class="inline-flex items-center justify-center rounded-full bg-[#2F6A3F] px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-[#235334]">✏️ Tell Your Story</a>
                <a href="browse.php" class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-white px-6 py-3 text-sm font-semibold text-[#2F6A3F] shadow-sm transition hover:border-[#2F6A3F] hover:text-[#2F6A3F]">🔍 Browse the Stories</a>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-5 pb-16">
        <h2 class="text-3xl font-bold text-[#2F6A3F]">How It Works</h2>
        <div class="mt-8 grid gap-6 md:grid-cols-3">
            <div class="rounded-[32px] border border-slate-200 bg-white p-6 shadow-sm">
                <div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-[#eef7ee] text-lg font-semibold text-[#2F6A3F]">1</div>
                <h3 class="text-xl font-semibold text-slate-900">Share your Messages</h3>
                <p class="mt-3 text-sm leading-6 text-slate-600">Choose a song and write a heartfelt message to someone special or save it as a little gift for yourself.</p>
            </div>
            <div class="rounded-[32px] border border-slate-200 bg-white p-6 shadow-sm">
                <div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-[#eef7ee] text-lg font-semibold text-[#2F6A3F]">2</div>
                <h3 class="text-xl font-semibold text-slate-900">Browse Messages</h3>
                <p class="mt-3 text-sm leading-6 text-slate-600">Find messages that were written for you. Search your name and uncover heartfelt messages written just for you.</p>
            </div>
            <div class="rounded-[32px] border border-slate-200 bg-white p-6 shadow-sm">
                <div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-[#eef7ee] text-lg font-semibold text-[#2F6A3F]">3</div>
                <h3 class="text-xl font-semibold text-slate-900">Detail Messages</h3>
                <p class="mt-3 text-sm leading-6 text-slate-600">Tap on any message card to discover the full story behind it and listen to the song that captures the emotion.</p>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-5 pb-16">
        <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-3xl font-bold text-[#2F6A3F]">Messages Feed</h2>
            <a href="browse.php" class="rounded-full border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-[#2F6A3F] transition hover:bg-slate-50">See All Messages</a>
        </div>
        <div class="grid gap-6 xl:grid-cols-3">
            <?php
            $messages = $db->getLatestMessages(8);
            if (empty($messages)) {
                echo '<div class="rounded-[32px] border border-slate-200 bg-white p-8 text-center text-slate-600 shadow-sm"><p>No messages yet. Be the first to share!</p></div>';
            } else {
                foreach ($messages as $msg) {
                    echo '<div class="relative overflow-hidden rounded-[32px] border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">';
                    echo '<div class="mb-4"><span class="inline-flex rounded-full bg-[#eef7ee] px-4 py-2 text-sm font-semibold text-[#2F6A3F]">To: ' . htmlspecialchars($msg['to_name']) . '</span></div>';
                    echo '<div class="mb-6 min-h-[6rem] text-sm leading-7 text-slate-700">' . htmlspecialchars(substr($msg['message'], 0, 150)) . (strlen($msg['message']) > 150 ? '...' : '') . '</div>';
                    echo '<div class="flex items-center gap-4 border-t border-slate-200 pt-4">';
                    if ($msg['spotify_album_art']) {
                        echo '<img loading="lazy" src="' . htmlspecialchars($msg['spotify_album_art']) . '" alt="Album art" class="h-16 w-16 rounded-3xl object-cover">';
                    }
                    echo '<div class="min-w-0">';
                    echo '<div class="text-sm font-semibold text-slate-900">' . htmlspecialchars($msg['spotify_track_name']) . '</div>';
                    echo '<div class="mt-1 text-xs text-slate-500">' . htmlspecialchars($msg['spotify_artist']) . '</div>';
                    echo '</div>';
                    echo '<img src="assets/spotify-logo.png" alt="Spotify" class="ml-auto h-10 w-10">';
                    echo '</div>';
                    echo '<a href="detail.php?id=' . urlencode($msg['id']) . '" class="card-link"></a>';
                    echo '</div>';
                }
            }
            ?>
        </div>

        <div class="mt-8 text-center">
            <a href="browse.php" class="inline-flex rounded-full border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-[#2F6A3F] transition hover:bg-slate-50">See All Messages</a>
        </div>
    </section>

    <footer class="border-t border-slate-200 bg-white/80 py-8 text-center text-sm text-slate-500">
        <p>&copy; 2026 Anonify. This is an anonymous platform. We do not store personal identity.</p>
    </footer>
</body>

</html>