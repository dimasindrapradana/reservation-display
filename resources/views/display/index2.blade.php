<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Reservation Display - Gedung {{ $building->code }}
    </title>


    <style>

        :root {

            --navy: #003b6f;
            --navy-dark: #00294f;
            --blue: #006fae;
            --cyan: #00a8c8;
            --cyan-light: #dff7fb;

            --white: #ffffff;
            --text: #12304a;
            --muted: #668096;

            --background: #f3f7fa;
            --border: #d9e5ed;

            --radius-large: 16px;
            --radius-medium: 12px;

        }


        * {
            box-sizing: border-box;
        }


        html,
        body {

            margin: 0;
            padding: 0;

            width: 100%;
            height: 100%;

            overflow: hidden;

            font-family: "Segoe UI", Arial, sans-serif;

            background: var(--background);

            color: var(--text);

        }


        body {

            display: flex;
            flex-direction: column;

        }


        /* =========================
           HEADER
        ========================= */

        .header {

            height: 13vh;
            min-height: 100px;

            display: flex;

            align-items: center;
            justify-content: space-between;

            padding: 0 3vw;

            color: white;

            background:
                radial-gradient(
                    circle at 75% 20%,
                    rgba(0, 168, 200, 0.18),
                    transparent 30%
                ),
                linear-gradient(
                    115deg,
                    var(--navy-dark),
                    var(--navy)
                );

            position: relative;

            overflow: hidden;

        }


        .header::after {

            content: "";

            position: absolute;

            width: 45vw;
            height: 20vh;

            right: -10vw;
            top: -10vh;

            border-radius: 50%;

            background: rgba(0, 168, 200, 0.08);

            transform: rotate(-15deg);

        }


        .brand {

            display: flex;

            align-items: center;

            gap: 1.2vw;

            position: relative;

            z-index: 2;

        }


        .brand-logo {

            width: 65px;
            height: 65px;

            flex-shrink: 0;

            border-radius: 50%;

            border:
                2px solid
                rgba(255,255,255,0.25);

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 28px;

            font-weight: 700;

            background:
                rgba(255,255,255,0.08);

        }


        .brand-title {

            font-size:
                clamp(18px, 1.5vw, 28px);

            font-weight: 700;

        }


        .brand-subtitle {

            margin-top: 4px;

            font-size:
                clamp(12px, 0.9vw, 17px);

            color:
                rgba(255,255,255,0.72);

        }


        .header-divider {

            width: 1px;
            height: 50px;

            background:
                rgba(255,255,255,0.25);

            margin: 0 1vw;

        }


        .building-title {

            font-size:
                clamp(20px, 1.8vw, 34px);

            font-weight: 700;

        }


        .building-subtitle {

            margin-top: 4px;

            font-size:
                clamp(12px, 0.9vw, 17px);

            color:
                rgba(255,255,255,0.7);

        }


        .header-right {

            display: flex;

            align-items: center;

            gap: 1.8vw;

            position: relative;

            z-index: 2;

        }


        /* =========================
           LOGO ORGANISASI
        ========================= */

        .logo-area {

            width:
                clamp(180px, 15vw, 320px);

            height: 72px;

            display: flex;

            align-items: center;
            justify-content: center;

            padding: 6px 18px;

            border-left:
                1px solid
                rgba(255,255,255,0.18);

        }


        .logo-area img {

            display: block;

            max-width: 100%;
            max-height: 58px;

            width: auto;
            height: auto;

            object-fit: contain;

        }


        .logo-placeholder {

            width: 100%;
            height: 100%;

            display: flex;

            align-items: center;
            justify-content: center;

            color:
                rgba(255,255,255,0.35);

            font-size: 11px;

            font-weight: 600;

            letter-spacing: 1px;

            text-transform: uppercase;

        }


        .datetime {

            text-align: right;

        }


        .date {

            font-size:
                clamp(12px, 0.9vw, 17px);

            color:
                rgba(255,255,255,0.8);

        }


        .clock {

            margin-top: 3px;

            font-size:
                clamp(22px, 2vw, 38px);

            font-weight: 700;

            color: #69e5f5;

        }


        .system-status {

            display: flex;

            align-items: center;

            gap: 8px;

            padding: 10px 18px;

            border-radius: 999px;

            border:
                1px solid
                rgba(0, 220, 180, 0.45);

            background:
                rgba(0, 220, 180, 0.08);

            color: #79f0d0;

            font-size:
                clamp(11px, 0.8vw, 15px);

            font-weight: 700;

            white-space: nowrap;

        }


        .system-status-dot {

            width: 9px;
            height: 9px;

            border-radius: 50%;

            background: #62e8c8;

            box-shadow:
                0 0 10px
                rgba(98,232,200,0.8);

        }


        /* =========================
           MAIN
        ========================= */

        .main {

            flex: 1;

            display: grid;

            grid-template-columns:
                minmax(0, 2.2fr)
                minmax(300px, 1fr);

            gap: 1.2vw;

            padding:
                1.2vw
                2.2vw
                0;

            min-height: 0;

        }


        /* =========================
           HERO
        ========================= */

        .hero {

            position: relative;

            min-height: 0;

            border-radius:
                var(--radius-large);

            overflow: hidden;

            background:
                linear-gradient(
                    100deg,
                    rgba(0, 31, 60, 0.98) 0%,
                    rgba(0, 55, 95, 0.88) 42%,
                    rgba(0, 65, 100, 0.55) 100%
                );

            box-shadow:
                0 12px 35px
                rgba(0, 40, 75, 0.18);

            border:
                1px solid
                rgba(0, 140, 190, 0.4);

        }


        .classroom-pattern {

            position: absolute;

            inset: 0;

            background:
                radial-gradient(
                    ellipse at 80% 50%,
                    rgba(0, 180, 220, 0.18),
                    transparent 35%
                ),
                linear-gradient(
                    120deg,
                    rgba(255,255,255,0.03),
                    rgba(0,0,0,0.18)
                );

            z-index: 0;

        }


        .hero-overlay {

            position: absolute;

            inset: 0;

            background:
                linear-gradient(
                    90deg,
                    rgba(0, 27, 52, 0.98) 0%,
                    rgba(0, 45, 75, 0.82) 48%,
                    rgba(0, 60, 90, 0.35) 100%
                );

            z-index: 1;

        }


        .hero-content {

            position: relative;

            z-index: 2;

            height: 100%;

            padding: 3vw;

            display: flex;

            flex-direction: column;

            justify-content: center;

        }


        /* =========================
           HERO STATUS
        ========================= */

        .hero-status {

            align-self: flex-start;

            display: flex;

            align-items: center;

            gap: 8px;

            padding: 9px 16px;

            border-radius: 999px;

            border:
                1px solid
                rgba(90,225,245,0.8);

            background:
                rgba(0,174,210,0.16);

            color: #9beef7;

            font-size:
                clamp(12px, 0.9vw, 17px);

            font-weight: 700;

            margin-bottom: 2.2vh;

            white-space: nowrap;

        }


        .hero-status-dot {

            width: 8px;
            height: 8px;

            flex-shrink: 0;

            border-radius: 50%;

            background: #68e8f5;

            box-shadow:
                0 0 12px
                rgba(104,232,245,0.9);

        }


        .hero-status.upcoming {

            border-color:
                rgba(255, 210, 100, 0.7);

            background:
                rgba(255, 190, 70, 0.12);

            color: #ffe09a;

        }


        .hero-status.upcoming .hero-status-dot {

            background: #ffd36a;

            box-shadow:
                0 0 12px
                rgba(255,211,106,0.8);

        }


        /* =========================
           HERO CAROUSEL
        ========================= */

        .hero-carousel {

            position: relative;

            min-height: 0;

        }


        .hero-slide {

            display: none;

            animation:
                heroFade 0.5s ease;

        }


        .hero-slide.active {

            display: block;

        }


        @keyframes heroFade {

            from {

                opacity: 0;

                transform:
                    translateY(8px);

            }

            to {

                opacity: 1;

                transform:
                    translateY(0);

            }

        }


        .hero-label {

            display: inline-block;

            margin-bottom: 10px;

            font-size:
                clamp(12px, 0.85vw, 16px);

            font-weight: 700;

            letter-spacing: 1.5px;

            text-transform: uppercase;

            color: #71e5f5;

        }


        .hero-title {

            max-width: 88%;

            margin: 0;

            font-size:
                clamp(34px, 4vw, 72px);

            line-height: 1.05;

            font-weight: 750;

            letter-spacing: -1px;

            color: #ffffff;

        }


        .hero-subtitle {

            max-width: 75%;

            margin-top: 14px;

            font-size:
                clamp(14px, 1.15vw, 23px);

            line-height: 1.5;

            color:
                rgba(255,255,255,0.72);

        }


        /* =========================
           HERO INFO
        ========================= */

        .hero-info {

            margin-top: 4vh;

            display: grid;

            grid-template-columns:
                repeat(
                    3,
                    minmax(0, 1fr)
                );

            gap: 2vw;

            max-width: 90%;

        }


        .info-item {

            display: flex;

            flex-direction: column;

            gap: 6px;

        }


        .info-label {

            font-size:
                clamp(11px, 0.75vw, 14px);

            text-transform: uppercase;

            letter-spacing: 1px;

            color:
                rgba(255,255,255,0.52);

        }


        .info-value {

            font-size:
                clamp(15px, 1.2vw, 23px);

            font-weight: 650;

            color: #ffffff;

            overflow: hidden;

            text-overflow: ellipsis;

        }


        .info-value.accent {

            color: #71e5f5;

        }


        /* =========================
           HERO BOTTOM
        ========================= */

        .hero-bottom {

            position: absolute;

            left: 3vw;
            right: 3vw;

            bottom: 1.8vw;

            display: flex;

            align-items: center;

            z-index: 4;

        }


        .carousel-control {

            display: flex;

            align-items: center;

        }


        .pagination {

            display: flex;

            align-items: center;

            gap: 8px;

        }


        .pagination-dot {

            width: 8px;
            height: 8px;

            border-radius: 50%;

            background:
                rgba(255,255,255,0.28);

            transition: 0.3s;

            pointer-events: none;

        }


        .pagination-dot.active {

            width: 11px;
            height: 11px;

            background: #63dff0;

            box-shadow:
                0 0 10px
                rgba(99,223,240,0.7);

        }


        .pagination-number {

            margin-left: 10px;

            font-size: 14px;

            color:
                rgba(255,255,255,0.72);

        }


        /* =========================
           JADWAL TERSEDIA
        ========================= */

        .upcoming {

            min-height: 0;

            background: #ffffff;

            border-radius:
                var(--radius-large);

            border:
                1px solid
                var(--border);

            box-shadow:
                0 8px 18px rgba(0, 41, 79, 0.08),
                0 2px 5px rgba(0, 41, 79, 0.05);

            display: flex;

            flex-direction: column;

            overflow: hidden;

        }


        .upcoming-header {

            padding:
                1.7vw
                1.8vw
                1.2vw;

            flex-shrink: 0;

        }


        .upcoming-title {

            margin: 0;

            font-size:
                clamp(21px, 1.6vw, 31px);

            font-weight: 750;

            color: var(--navy-dark);

        }


        .upcoming-subtitle {

            margin-top: 5px;

            font-size:
                clamp(11px, 0.8vw, 15px);

            color: var(--muted);

        }


        /* =========================
           SCHEDULE VIEWPORT
        ========================= */

        .schedule-list {

            flex: 1;

            min-height: 0;

            overflow: hidden;

            padding:
                0
                1.2vw
                0.8vw;

            position: relative;

        }


        .schedule-track {

            position: relative;

            display: flex;

            flex-direction: column;

            gap: 10px;

            will-change: transform;

            transition:
                transform 0.8s ease-in-out;

        }


        /* =========================
           SCHEDULE CARD
        ========================= */

        .schedule-item {

            flex: 0 0 auto;

            display: grid;

            grid-template-columns:
                90px
                minmax(0, 1fr);

            gap: 16px;

            padding:
                10px
                14px;

            border-radius:
                var(--radius-medium);

            border:
                1px solid
                #dfe8ee;

            background:
                #fbfdfe;

            position: relative;

            min-height: 0;

            overflow: hidden;

            margin: 0;

            box-shadow:
                0 3px 8px rgba(0, 41, 79, 0.06),
                0 1px 2px rgba(0, 41, 79, 0.04);

            transition:
                border-color 0.25s ease,
                background 0.25s ease,
                box-shadow 0.25s ease;

        }


        .schedule-item.current,
        .schedule-item.next {

            background: #fbfdfe;

            border-color: #dfe8ee;

            box-shadow:
                0 3px 8px rgba(0, 41, 79, 0.06),
                0 1px 2px rgba(0, 41, 79, 0.04);

        }


        .schedule-time {

            font-size:
                clamp(16px, 1.05vw, 21px);

            font-weight: 750;

            color: var(--navy);

        }


        .schedule-time-end {

            margin-top: 3px;

            font-size:
                clamp(11px, 0.7vw, 14px);

            color: var(--muted);

        }


        .schedule-room {

            margin-top: 7px;

            font-size:
                clamp(11px, 0.72vw, 14px);

            color: var(--muted);

            font-weight: 600;

        }


        .schedule-name {

            padding-right: 5px;

            font-size:
                clamp(15px, 1vw, 20px);

            font-weight: 700;

            color: var(--text);

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;

        }


        .schedule-instructor {

            margin-top: 6px;

            padding-right: 5px;

            font-size:
                clamp(11px, 0.72vw, 14px);

            color: var(--muted);

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;

        }


        .schedule-status {

            margin-top: 6px;

            font-size: 10px;

            font-weight: 700;

            color: var(--cyan);

            text-transform: uppercase;

            letter-spacing: 0.5px;

        }


        /* =========================
           EMPTY
        ========================= */

        .empty-state {

            max-width: 80%;

        }


        .empty-state h1 {

            margin: 0;

            color: #ffffff;

            font-size:
                clamp(34px, 3.5vw, 62px);

            line-height: 1.1;

        }


        .empty-state p {

            margin-top: 15px;

            color:
                rgba(255,255,255,0.7);

            font-size:
                clamp(14px, 1vw, 20px);

            line-height: 1.5;

        }


        /* =========================
           FOOTER
        ========================= */

        .footer {

            height: 5vh;

            min-height: 38px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 2.5vw;

            color: #668096;

            font-size:
                clamp(10px, 0.7vw, 14px);

        }


        .footer-brand {

            letter-spacing: 2px;

            font-weight: 600;

        }


        .footer-right {

            display: flex;

            gap: 10px;

        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1000px) {

            .main {

                grid-template-columns: 1fr;

            }


            .upcoming {

                display: none;

            }


            .hero-title {

                max-width: 95%;

            }


            .hero-info {

                max-width: 100%;

            }

        }
        @media (max-width: 768px) {
            .main {
                grid-template-columns: 1fr;
            }
        }
    </style>

</head>


<body>


{{-- =========================
     HEADER
========================= --}}

<header class="header">


    <div class="brand">


        <div>

            <div class="brand-title">
                Reservation Display
            </div>

            <div class="brand-subtitle">
                Garuda Training & Classroom System
            </div>

        </div>


        <div class="header-divider"></div>


        <div>

            <div class="building-title">
                Gedung {{ $building->code }}
            </div>

            <div class="building-subtitle">
                Classroom Reservation
            </div>

        </div>


    </div>


    <div class="header-right">


        <div class="datetime">

            <div class="date">
                {{ now()->translatedFormat('l, d F Y') }}
            </div>

            <div class="clock" id="clock">
                00:00:00 WIB
            </div>

        </div>


        <div class="logo-area">

            <img
                src="{{ asset('images/Logo2.png') }}"
                alt="Logo Organisasi"
            >

        </div>


    </div>


</header>



{{-- =========================
     MAIN
========================= --}}

<main class="main">


    {{-- =========================
         HERO
    ========================= --}}

    <section class="hero">


        <div class="classroom-pattern"></div>

        <div class="hero-overlay"></div>


        <div class="hero-content">


            @if($currentReservations->count() > 0)


                <div class="hero-status">

                    <span class="hero-status-dot"></span>

                    <span>
                        SEDANG BERLANGSUNG
                    </span>

                </div>


                <div
                    class="hero-carousel"
                    id="heroCarousel"
                >


                    @foreach($currentReservations as $index => $reservation)


                        <div
                            class="hero-slide {{ $index === 0 ? 'active' : '' }}"
                            data-index="{{ $index }}"
                        >


                            <div class="hero-label">

                                RUANG
                                {{ $reservation->room->name }}

                            </div>


                            <h1 class="hero-title">

                                {{ $reservation->course_name }}

                            </h1>


                            <div class="hero-info">


                                <div class="info-item">

                                    <div class="info-label">
                                        Ruangan
                                    </div>

                                    <div class="info-value">
                                        {{ $reservation->room->name }}
                                    </div>

                                </div>


                                <div class="info-item">

                                    <div class="info-label">
                                        Instruktur
                                    </div>

                                    <div class="info-value">

                                        {{ $reservation->instructor ?: 'Belum tersedia' }}

                                    </div>

                                </div>


                                <div class="info-item">

                                    <div class="info-label">
                                        Jadwal
                                    </div>

                                    <div class="info-value accent">

                                        {{ \Carbon\Carbon::parse($reservation->start_at)->format('H:i') }}

                                        -

                                        {{ \Carbon\Carbon::parse($reservation->end_at)->format('H:i') }}

                                        WIB

                                    </div>

                                </div>


                            </div>


                        </div>


                    @endforeach


                </div>


                @if($currentReservations->count() > 1)


                    <div class="hero-bottom">


                        <div class="carousel-control">


                            <div class="pagination">


                                @foreach($currentReservations as $index => $reservation)


                                    <span
                                        class="pagination-dot {{ $index === 0 ? 'active' : '' }}"
                                        data-pagination="{{ $index }}"
                                    ></span>


                                @endforeach


                                <span
                                    class="pagination-number"
                                    id="paginationNumber"
                                >

                                    01 /
                                    {{ str_pad($currentReservations->count(), 2, '0', STR_PAD_LEFT) }}

                                </span>


                            </div>


                        </div>


                    </div>


                @endif


            @elseif($nextReservation)


                <div class="hero-status upcoming">

                    <span class="hero-status-dot"></span>

                    <span>
                        KELAS YANG AKAN DATANG
                    </span>

                </div>


                <div class="hero-slide active">


                    <div class="hero-label">

                        RUANG
                        {{ $nextReservation->room->name }}

                    </div>


                    <h1 class="hero-title">

                        {{ $nextReservation->course_name }}

                    </h1>


                    <div class="hero-info">


                        <div class="info-item">

                            <div class="info-label">
                                Ruangan
                            </div>

                            <div class="info-value">
                                {{ $nextReservation->room->name }}
                            </div>

                        </div>


                        <div class="info-item">

                            <div class="info-label">
                                Instruktur
                            </div>

                            <div class="info-value">

                                {{ $nextReservation->instructor ?: 'Belum tersedia' }}

                            </div>

                        </div>


                        <div class="info-item">

                            <div class="info-label">
                                Mulai
                            </div>

                            <div class="info-value accent">

                                {{ \Carbon\Carbon::parse($nextReservation->start_at)->format('H:i') }}

                                WIB

                            </div>

                        </div>


                    </div>


                </div>


            @else


                <div class="empty-state">


                    <div class="hero-status">

                        <span class="hero-status-dot"></span>

                        <span>
                            TIDAK ADA JADWAL
                        </span>

                    </div>


                    <h1>
                        Tidak ada kelas hari ini
                    </h1>


                    <p>

                        Belum terdapat jadwal reservasi untuk
                        Gedung {{ $building->code }}.

                    </p>


                </div>


            @endif


        </div>


    </section>



    {{-- =========================
         JADWAL TERSEDIA
    ========================= --}}

    <aside class="upcoming">


        <div class="upcoming-header">

            <h2 class="upcoming-title">
                Jadwal Tersedia
            </h2>

            <div class="upcoming-subtitle">
                Booking kelas hari ini
            </div>

        </div>


        <div
            class="schedule-list"
            id="scheduleList"
        >


            @if($reservations->count() > 0)


                <div
                    class="schedule-track"
                    id="scheduleTrack"
                >


                    @foreach($reservations as $reservation)


                        @php

                            $reservationStart =
                                \Carbon\Carbon::parse($reservation->start_at);

                            $reservationEnd =
                                \Carbon\Carbon::parse($reservation->end_at);

                            $isCurrent =
                                $reservationStart <= now()
                                &&
                                $reservationEnd >= now();

                            $isNext =
                                !$isCurrent
                                &&
                                $reservationStart > now();

                        @endphp


                        <div
                            class="
                                schedule-item
                                {{ $isCurrent ? 'current' : '' }}
                                {{ $isNext && !$loop->first ? 'next' : '' }}
                            "
                        >


                            <div>


                                <div class="schedule-time">

                                    {{ $reservationStart->format('H:i') }}

                                </div>


                                <div class="schedule-time-end">

                                    {{ $reservationEnd->format('H:i') }}

                                </div>


                                <div class="schedule-room">

                                    {{ $reservation->room->name ?? '-' }}

                                </div>


                            </div>


                            <div>


                                <div class="schedule-name">

                                    {{ $reservation->course_name }}

                                </div>


                                <div class="schedule-instructor">

                                    {{ $reservation->instructor ?: 'Instruktur belum tersedia' }}

                                </div>


                                @if($isCurrent)


                                    <div class="schedule-status">

                                        Sedang berlangsung

                                    </div>


                                @elseif($isNext)


                                    <div class="schedule-status">

                                        Akan datang

                                    </div>


                                @endif


                            </div>


                        </div>


                    @endforeach


                </div>


            @else


                <div
                    style="
                        height:100%;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        padding:30px;
                        text-align:center;
                        color:#668096;
                    "
                >

                    Tidak ada jadwal hari ini.

                </div>


            @endif


        </div>


    </aside>


</main>



{{-- =========================
     FOOTER
========================= --}}

<footer class="footer">


    <div class="footer-brand">

        RESERVATION DISPLAY SYSTEM

    </div>


    <div class="footer-right">

        <span>Safety</span>

        <span>•</span>

        <span>Service</span>

        <span>•</span>

        <span>Excellence</span>

    </div>


</footer>



{{-- =========================
     JAVASCRIPT
========================= --}}

<script>


    /* =========================
       CLOCK
    ========================= */

    function updateClock() {

        const now = new Date();

        const hours =
            String(now.getHours()).padStart(2, '0');

        const minutes =
            String(now.getMinutes()).padStart(2, '0');

        const seconds =
            String(now.getSeconds()).padStart(2, '0');

        const clock =
            document.getElementById('clock');

        if (clock) {

            clock.textContent =
                `${hours}:${minutes}:${seconds} WIB`;

        }

    }


    updateClock();

    setInterval(updateClock, 1000);



    /* =========================
       CURRENT CLASS CAROUSEL
    ========================= */

    const slides =
        document.querySelectorAll('.hero-slide');

    const dots =
        document.querySelectorAll('.pagination-dot');

    const paginationNumber =
        document.getElementById('paginationNumber');

    let currentSlide = 0;


    function showSlide(index) {

        if (!slides.length) {
            return;
        }

        if (index < 0) {
            index = slides.length - 1;
        }

        if (index >= slides.length) {
            index = 0;
        }

        currentSlide = index;


        slides.forEach((slide, i) => {

            slide.classList.toggle(
                'active',
                i === currentSlide
            );

        });


        dots.forEach((dot, i) => {

            dot.classList.toggle(
                'active',
                i === currentSlide
            );

        });


        if (paginationNumber) {

            paginationNumber.textContent =
                `${String(currentSlide + 1).padStart(2, '0')} / ${String(slides.length).padStart(2, '0')}`;

        }

    }


    if (slides.length > 1) {

        setInterval(() => {

            showSlide(currentSlide + 1);

        }, 7000);

    }



    /* =========================
       JADWAL TERSEDIA
       4 CARD VISIBLE
       AUTO LOOP
    ========================= */

    const scheduleList =
        document.getElementById('scheduleList');

    const scheduleTrack =
        document.getElementById('scheduleTrack');


    if (scheduleList && scheduleTrack) {


        let scheduleItems =
            Array.from(
                scheduleTrack.querySelectorAll(
                    '.schedule-item'
                )
            );


        const originalCount =
            scheduleItems.length;


        const visibleItems =
            4;


        const itemGap =
            10;


        let itemHeight =
            0;


        let scheduleIndex =
            0;


        /*
         * Hitung tinggi card.
         *
         * scheduleList.clientHeight sudah
         * termasuk padding.
         *
         * Karena kita mempunyai padding-bottom,
         * padding tersebut dikurangi terlebih dahulu.
         */

        function calculateScheduleSize() {

            if (!scheduleItems.length) {
                return;
            }


            const styles =
                getComputedStyle(scheduleList);


            const paddingBottom =
                parseFloat(styles.paddingBottom) || 0;


            const availableHeight =
                scheduleList.clientHeight
                -
                paddingBottom;


            if (originalCount > visibleItems) {

                itemHeight =
                    (
                        availableHeight
                        -
                        (
                            itemGap
                            *
                            (
                                visibleItems - 1
                            )
                        )
                    )
                    /
                    visibleItems;

            } else {

                itemHeight =
                    (
                        availableHeight
                        -
                        (
                            itemGap
                            *
                            (
                                originalCount - 1
                            )
                        )
                    )
                    /
                    originalCount;

            }


            scheduleItems.forEach(item => {

                item.style.height =
                    `${itemHeight}px`;

                item.style.minHeight =
                    `${itemHeight}px`;

                item.style.flex =
                    `0 0 ${itemHeight}px`;

            });


            scheduleTrack.style.gap =
                `${itemGap}px`;


            /*
             * Setelah resize, kembalikan posisi
             * agar tidak berada di tengah card.
             */

            if (originalCount <= visibleItems) {

                scheduleIndex = 0;

                scheduleTrack.style.transition =
                    'none';

                scheduleTrack.style.transform =
                    'translateY(0)';

            }

        }



        /*
         * Jika jadwal lebih dari 4,
         * buat clone dari 4 data pertama.
         *
         * Contoh:
         *
         * 1 2 3 4 5
         *
         * menjadi:
         *
         * 1 2 3 4 5 1 2 3 4
         *
         * Ketika sampai clone 1,
         * posisi akan di-reset secara halus
         * kembali ke data asli nomor 1.
         */

        if (originalCount > visibleItems) {


            const cloneCount =
                Math.min(
                    visibleItems,
                    originalCount
                );


            for (
                let i = 0;
                i < cloneCount;
                i++
            ) {

                const clone =
                    scheduleItems[i].cloneNode(true);

                clone.classList.add(
                    'schedule-clone'
                );

                scheduleTrack.appendChild(clone);

            }


            /*
             * Ambil ulang semua item,
             * termasuk clone.
             */

            scheduleItems =
                Array.from(
                    scheduleTrack.querySelectorAll(
                        '.schedule-item'
                    )
                );


            calculateScheduleSize();


            /*
             * Fungsi geser satu card.
             */

            function moveSchedule() {

                scheduleIndex++;


                const translateY =
                    scheduleIndex
                    *
                    (
                        itemHeight
                        +
                        itemGap
                    );


                scheduleTrack.style.transition =
                    'transform 0.8s ease-in-out';


                scheduleTrack.style.transform =
                    `translateY(-${translateY}px)`;


                /*
                 * Ketika sudah sampai posisi
                 * clone pertama.
                 *
                 * Misalnya data asli:
                 *
                 * 1 2 3 4 5
                 *
                 * clone:
                 *
                 * 1 2 3 4
                 *
                 * Setelah index = 5:
                 *
                 * 1 2 3 4
                 *
                 * yang terlihat adalah clone.
                 *
                 * Setelah animasi selesai,
                 * kita reset ke data asli nomor 1.
                 */

                if (
                    scheduleIndex >=
                    originalCount
                ) {

                    setTimeout(() => {

                        scheduleTrack.style.transition =
                            'none';


                        scheduleIndex =
                            0;


                        scheduleTrack.style.transform =
                            'translateY(0)';


                        /*
                         * Paksa browser membaca posisi baru
                         * sebelum transition diaktifkan lagi.
                         */

                        void scheduleTrack.offsetHeight;


                        scheduleTrack.style.transition =
                            'transform 0.8s ease-in-out';


                    }, 850);

                }

            }


            /*
             * Auto loop setiap 10 detik.
             */

            setInterval(() => {

                moveSchedule();

            }, 7000);


            /*
             * Jika ukuran browser / TV berubah,
             * hitung ulang tinggi card.
             */

            window.addEventListener(
                'resize',
                calculateScheduleSize
            );


        } else {


            /*
             * Jika jumlah data 4 atau kurang,
             * tidak perlu carousel.
             *
             * Card dibagi rata memenuhi area.
             */

            calculateScheduleSize();


            window.addEventListener(
                'resize',
                calculateScheduleSize
            );

        }

    }



    /* =========================
       REFRESH DATA
    ========================= */

    /*
     * Refresh halaman setiap 60 detik.
     *
     * Ini tetap berjalan terpisah dari
     * clock dan carousel.
     */

    setInterval(() => {

        window.location.reload();

    }, 60000);


</script>


</body>

</html>
