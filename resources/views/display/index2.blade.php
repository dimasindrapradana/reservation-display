<!DOCTYPE html>
<html lang="En">

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
                minmax(330px, 1.15fr);

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

             padding: 2vw 3vw 5vw;

            display: flex;

            flex-direction: column;

            justify-content: center;

              visibility: hidden;
}

            .hero-content.hero-ready {
                visibility: visible;
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
                rgba(255,80,80,0.8);

            background:
                rgba(220,40,40,0.16);

            color: #ff8a8a;

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

            background: #ff4d4d;

            box-shadow:
                0 0 12px
                rgba(255,77,77,0.9);

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
            margin-bottom: 12px;
            font-size: clamp(16px, 1.25vw, 24px);
            font-weight: 800;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            color: #71e5f5;
        }
            /* =========================
            HERO CURRENT RESERVATION
            ========================= */

            .hero-course {
                font-size: clamp(32px, 2.8vw, 56px);
                font-weight: 750;
                color: #ffffff;
                line-height: 1.1;
                max-width: 90%;
            }

            .hero-meta {
                display: grid;
                grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
                gap: 4vw;   
                margin-top: 28px;
                max-width: 75%;
            }

            .hero-meta-item {
                display: flex;
                flex-direction: column;
            }

            .hero-meta-label {
                margin-bottom: 6px;
                font-size: clamp(11px, 0.75vw, 15px);
                font-weight: 700;
                letter-spacing: 1.8px;
                text-transform: uppercase;
                color: rgba(255,255,255,0.55);
            }

            .hero-room {
                font-size: clamp(25px, 2vw, 40px);
                font-weight: 800;
                color: #ffffff;
                letter-spacing: 0.5px;
                line-height: 1.05;
            }

            .hero-time {
                font-size: clamp(25px, 2vw, 40px);
                font-weight: 800;
                color: #71e5f5;
                letter-spacing: 0.5px;
                line-height: 1.05;
            }


        /* =========================
           HERO INFO
        ========================= */

        .hero-info {

            margin-top: 4vh;

            display: grid;

            grid-template-columns:
                repeat(
                    2,
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
                clamp(12px, 0.85vw, 16px);

            text-transform: uppercase;

            letter-spacing: 1px;

            color:
                rgba(255,255,255,0.52);

        }


        .info-value {

            font-size:
              clamp(17px, 1.35vw, 26px);

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
   SCHEDULE PANEL
========================= */

.schedule-panel {

    min-height: 0;

    display: flex;

    flex-direction: column;

    gap: 12px;

    overflow: hidden;

}


/* =========================
   TODAY'S SCHEDULE
========================= */

.today-schedule {

    min-height: 0;

    flex: 1.8;

    display: flex;

    flex-direction: column;

    background: #ffffff;

    border-radius:
        var(--radius-large);

    border:
        1px solid
        var(--border);

    box-shadow:
        0 8px 18px rgba(0, 41, 79, 0.08),
        0 2px 5px rgba(0, 41, 79, 0.05);

    overflow: hidden;

}




/* =========================
   TOMORROW / UPCOMING
========================= */

.tomorrow-schedule {

    min-height: 0;

    flex: 0.7;

    display: flex;

    flex-direction: column;

    background: #ffffff;

    border-radius:
        var(--radius-large);

    border:
        1px solid
        var(--border);

    box-shadow:
        0 8px 18px rgba(0, 41, 79, 0.08),
        0 2px 5px rgba(0, 41, 79, 0.05);

    overflow: hidden;

}


/* =========================
   SECTION HEADER
========================= */

.schedule-section-header {

    padding:
        1.25vw
        1.4vw
        0.8vw;

    flex-shrink: 0;

}
.schedule-header-content {

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 20px;

}


.schedule-search {

    position: relative;

    flex: 0 0 170px;

}


.schedule-search-icon {

    position: absolute;

    left: 12px;
    top: 50%;

    transform:
        translateY(-50%);

    font-size: 13px;

    opacity: 0.55;

    pointer-events: none;

}


.schedule-search input {

    width: 100%;

    box-sizing: border-box;

    padding:
        7px
        12px
        7px
        34px;

    border:
        1px solid
        rgba(0, 59, 111, 0.14);

    border-radius: 20px;

    background:
        rgba(255,255,255,0.65);

    color:
        var(--text);

    font-size: 11px;

    outline: none;

    transition:
        border-color 0.2s ease,
        background 0.2s ease,
        box-shadow 0.2s ease;

}


.schedule-search input::placeholder {

    color:
        #9aa9b5;

}


.schedule-search input:focus {

    background:
        #ffffff;

    border-color:
        rgba(0, 59, 111, 0.3);

    box-shadow:
        0 2px 8px
        rgba(0, 41, 79, 0.06);

}


.upcoming-title {

    margin: 0;

    font-size:
        clamp(19px, 1.45vw, 29px);

    font-weight: 750;

    color:
        var(--navy-dark);

}


.upcoming-subtitle {

    margin-top: 4px;

    font-size:
        clamp(10px, 0.72vw, 14px);

    color:
        var(--muted);

}


/* =========================
   TODAY SCHEDULE LIST
========================= */
.schedule-list {
    flex: 1;
    min-height: 0;
    overflow-y: auto;
    overflow-x: hidden;
    padding:
        0
        1.0vw
        0.8vw;
    position: relative;

    /* scrollbar tetap tersembunyi */
    scrollbar-width: none;
    -ms-overflow-style: none;
}

.schedule-list::-webkit-scrollbar {
    display: none;
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
   TODAY SCHEDULE CARD
========================= */

.schedule-item {
    flex: 0 0 auto;
    display: grid;
    grid-template-columns: 78px minmax(0, 1fr);
    gap: 14px;
    padding: 9px 12px;
    border-radius: var(--radius-medium);
    border: 1px solid #dfe8ee;
    background: #fbfdfe;
    position: relative;
    min-height: 0;
    overflow: hidden;
    margin: 0;
    box-shadow:
        0 3px 8px rgba(0, 41, 79, 0.06),
        0 1px 2px rgba(0, 41, 79, 0.04);
}


.schedule-time {

    margin-top: 4px;

    font-size: 11px;

    line-height: 1.2;

    font-weight: 600;

    color: var(--muted);

    white-space: nowrap;

}


.schedule-room {
    margin-top: 7px;
    font-size: clamp(13px, 1vw, 19px);
    color: var(--muted);
    font-weight: 800;
    letter-spacing: .5px;
}

.schedule-room-label {
    font-size: 10px;
    font-weight: 800;
    color: var(--muted);
    letter-spacing: 1px;
    line-height: 1;
    margin-bottom: 5px;
}

.schedule-room {
    margin-top: 0;
    font-size: clamp(15px, 1vw, 20px);
    color: var(--navy);
    font-weight: 800;
    letter-spacing: .5px;
    line-height: 1.1;
}

.schedule-name {

    padding-right: 5px;

    font-size:
        clamp(14px, 0.95vw, 19px);

    font-weight: 700;

    color:
        var(--text);

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;

}


.schedule-instructor {

    margin-top: 5px;

    padding-right: 5px;

    font-size:
        clamp(10px, 0.7vw, 14px);

    color:
        var(--muted);

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;

}


.schedule-status {

    margin-top: 5px;

    font-size: 10px;

    font-weight: 700;

    color:
        var(--cyan);

    text-transform: uppercase;

    letter-spacing: 0.5px;

}


.schedule-status.in-progress {

    color: #e53935;

}


/* =========================
   EMPTY TODAY
========================= */

.schedule-empty {

    height: 100%;

    display: flex;

    align-items: center;

    justify-content: center;

    padding: 20px;

    text-align: center;

    color:
        var(--muted);

    font-size:
        clamp(12px, 0.8vw, 15px);

}


/* =========================
   TOMORROW HEADER
========================= */

.tomorrow-header {

    padding-bottom: 0.5vw;

}


.tomorrow-title {

    margin: 0;

    font-size:
        clamp(18px, 1.35vw, 27px);

    font-weight: 750;

    color:
        var(--navy-dark);

}


.tomorrow-subtitle {

    margin-top: 4px;

    font-size:
        clamp(10px, 0.72vw, 14px);

    color:
        var(--muted);

}


/* =========================
   TOMORROW LIST
========================= */

.tomorrow-list {

    position: relative;

    flex: 1;

    min-height: 0;

    overflow: hidden;

    margin:
        0
        1vw
        0.9vw;

}


/* =========================
   TOMORROW CARD
========================= */

.tomorrow-card {

    position: absolute;

    inset: 0;

    display: grid;

    grid-template-columns:
        78px
        minmax(0, 1fr);

    gap: 14px;

    padding:
        12px
        14px;

    border-radius:
        var(--radius-medium);

    border:
        1px solid
        #dfe8ee;

    background:
        #fbfdfe;

    box-shadow:
        0 3px 8px rgba(0, 41, 79, 0.06),
        0 1px 2px rgba(0, 41, 79, 0.04);

    opacity: 0;

    visibility: hidden;

    transition:
        opacity 0.8s ease,
        visibility 0.8s ease;

}


.tomorrow-card.active {

    opacity: 1;

    visibility: visible;

}


.tomorrow-time-main {

    font-size:
        clamp(17px, 1.1vw, 22px);

    font-weight: 750;

    color:
        var(--navy);

}


.tomorrow-time-end {

    margin-top: 3px;

    font-size:
        clamp(10px, 0.68vw, 13px);

    color:
        var(--muted);

}


.tomorrow-content {

    min-width: 0;

}


.tomorrow-name {

    font-size:
        clamp(14px, 0.95vw, 19px);

    font-weight: 700;

    line-height: 1.25;

    color:
        var(--text);

}


.tomorrow-room {

    margin-top: 6px;

    font-size:
        clamp(10px, 0.7vw, 14px);

    color:
        var(--muted);

    font-weight: 600;

}


.tomorrow-instructor {

    margin-top: 5px;

    font-size:
        clamp(10px, 0.7vw, 14px);

    color:
        var(--muted);

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;

}


.tomorrow-empty {

    height: 100%;

    display: flex;

    align-items: center;

    justify-content: center;

    padding: 20px;

    text-align: center;

    color:
        var(--muted);

    font-size:
        clamp(11px, 0.75vw, 14px);

}


/* =========================
   RESPONSIVE
========================= */

@media (max-width: 1000px) {

    .schedule-panel {

        display: none;

    }

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
        DETAIL SCHEDULE MODE
        ========================= */

        .detail-schedule-mode {
            display: none;
            grid-column: 1 / -1;
            width: 100%;
            min-height: 100%;
            padding: 30px 35px;
            box-sizing: border-box;
        }

        /* HEADER */

        .detail-schedule-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 25px;
            margin-bottom: 22px;
        }

        .detail-label {
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
            opacity: .55;
        }

        .detail-schedule-header h2 {
            margin: 4px 0 2px;
            font-size: 30px;
            font-weight: 800;
        }

        .detail-schedule-header p {
            margin: 0;
            font-size: 14px;
            opacity: .55;
        }

        /* BACK BUTTON */

        .back-highlight-btn {
            border: none;
            cursor: pointer;
            padding: 13px 20px;
            border-radius: 8px;
            font-weight: 800;
            letter-spacing: .5px;
            white-space: nowrap;
        }

        /* 20 SCHEDULE */

        .detail-schedule-list {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 10px 14px;
            width: 100%;
        }

        /* EACH ROW */

        .detail-schedule-item {
            display: grid;
            grid-template-columns: 48px 145px minmax(0, 1fr);
            align-items: center;
            gap: 12px;

            padding: 12px 16px;

            min-height: 66px;
            box-sizing: border-box;

            border-radius: 9px;

            background: rgba(255, 255, 255, .035);
            border: 1px solid rgba(255, 255, 255, .07);

            transition: .2s ease;
        }

        /* NUMBER */

        .detail-number {
            font-size: 20px;
            font-weight: 900;
            opacity: .3;
        }

        /* TIME */

        .detail-time {
            font-size: 17px;
            font-weight: 800;
            white-space: nowrap;
            margin-top: 5px;
            opacity: .9;
        }

        .detail-room {
            line-height: 1.1;
        }

        .room-label {
            font-size: 14px;
            font-weight: 700;
            letter-spacing: .5px;
        }

        .room-name {
            display: block;
            margin-top: 3px;
            font-size: clamp(22px, 1.6vw, 32px);
            font-weight: 900;
            letter-spacing: 1px;
        }

        .detail-room::first-letter {
        
        }
                /* TITLE */

        .detail-title {
            font-size: 14px;
            font-weight: 700;

            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .detail-status {
            font-size: 10px;
            font-weight: 900;
            letter-spacing: 1px;
            margin-top: 4px;
        }

        /* CURRENT CLASS */

        .detail-current {
            border: 2px solid rgba(0, 200, 255, .8);
            background: rgba(0, 200, 255, .07);
        }

        .detail-current .detail-number {
            opacity: .9;
        }

        .detail-current .detail-status {
            color: #00c8ff;
        }

        /* UPCOMING */

        .detail-schedule-item:not(.detail-current):not(.detail-passed) {
            background: rgba(255, 255, 255, .045);
        }

        /* COMPLETED */

        .detail-passed {
            opacity: .38;
        }

        /* DETAIL BUTTON */

        .detail-schedule-btn {
            position: absolute;
            bottom: 25px;
            right: 25px;
            z-index: 100;
            pointer-events: auto;

            border: none;
            cursor: pointer;

            padding: 13px 22px;
            border-radius: 8px;

            font-weight: 800;
            letter-spacing: .5px;
        }

        /* TOUCHSCREEN */

        .detail-schedule-btn,
        .back-highlight-btn {
            min-height: 48px;
            min-width: 150px;
        }

        /* RESPONSIVE */

        @media (max-width: 1100px) {

            .detail-schedule-item {
                grid-template-columns: 42px 125px minmax(0, 1fr);
                padding: 11px 13px;
            }

            .detail-title {
                font-size: 13px;
            }

        }

        @media (max-width: 900px) {

            .detail-schedule-list {
                grid-template-columns: 1fr;
            }

            .detail-schedule-header {
                flex-direction: column;
                align-items: flex-start;
            }

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
                GITC Info
            </div>

            <div class="brand-subtitle">
                Garuda Training & Classroom System
            </div>

        </div>


        <div class="header-divider"></div>


        <div>

            <div class="building-title">
                Building {{ $building->code }}
            </div>

            <div class="building-subtitle">
                Classroom 
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
                        In Progress
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

                                ROOM
                                {{ $reservation->room->name }}

                            </div>


                            <h1 class="hero-title">

                                {{ $reservation->course_name }}

                            </h1>


                            <div class="hero-info">


                                <div class="info-item">

                                    <div class="info-label">
                                        Room
                                    </div>

                                    <div class="info-value">
                                        {{ $reservation->room->name }}
                                    </div>

                                </div>


                                {{-- <div class="info-item">

                                    <div class="info-label">
                                        Instructor
                                    </div>

                                    <div class="info-value">

                                        {{ $reservation->instructor ?: 'Belum tersedia' }}

                                    </div>

                                </div> --}}


                                <div class="info-item">

                                    <div class="info-label">
                                        Schedule
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
                        UPCOMING
                    </span>

                </div>


                <div class="hero-slide active">


                    <div class="hero-label">

                        ROOM
                        {{ $nextReservation->room->name }}

                    </div>


                    <h1 class="hero-title">

                        {{ $nextReservation->course_name }}

                    </h1>


                    <div class="hero-info">


                        <div class="info-item">

                            <div class="info-label">
                                Room
                            </div>

                            <div class="info-value">
                                {{ $nextReservation->room->name }}
                            </div>

                        </div>


                        {{-- <div class="info-item">

                            <div class="info-label">
                                Instructor
                            </div>

                            <div class="info-value">

                                {{ $nextReservation->instructor ?: 'Belum tersedia' }}

                            </div>

                        </div> --}}


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


                    <div class="hero-status no-schedule">

                        <span class="hero-status-dot"></span>

                        <span>
                            No Schedule
                        </span>

                    </div>


                    <h1>
                        No classes scheduled today
                    </h1>


                    <p>

                        No reservations are currently scheduled for Building {{ $building->code }}.

                    </p>


                </div>


            @endif


        </div>

                <button
                    type="button"
                    class="detail-schedule-btn"
                    id="detailScheduleBtn"
                >
                    DETAIL SCHEDULE
                </button>
            


    </section>



    {{-- =========================
         JADWAL TERSEDIA
    ========================= --}}

   <aside class="schedule-panel">

    {{-- =========================
         TODAY'S SCHEDULE
    ========================= --}}

    <section class="today-schedule">

        <div class="schedule-section-header">

            <div class="schedule-header-content">

                <div>
                    <h2 class="upcoming-title">
                        Today's Schedule
                    </h2>

                    <div class="upcoming-subtitle">
                        Today's Room Bookings
                    </div>
                </div>


                <div class="schedule-search">

                <span class="schedule-search-icon">
                    🔍
                </span>

                <input
                    type="text"
                    id="scheduleSearch"
                    placeholder="Search..."
                    autocomplete="off"
                >

            </div>

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


                        <div class="schedule-item">

                            <div>

                                <div>
                                    <div class="schedule-room-label">
                                        ROOM
                                    </div>

                                    <div class="schedule-room">
                                        {{ $reservation->room->name ?? '-' }}
                                    </div>
                                </div>

                            </div>


                            <div>
                               

                                <div class="schedule-name">
                                    {{ $reservation->course_name }}
                                </div>

                                 <div class="schedule-time">
                                    {{ $reservationStart->format('H:i') }}
                                    -
                                    {{ $reservationEnd->format('H:i') }}
                                </div>

                                {{-- <div class="schedule-instructor">
                                    {{ $reservation->instructor ?: 'Instructor unavailable' }}
                                </div> --}}


                                @if($isCurrent)

                                    <div class="schedule-status in-progress">
                                        In Progress
                                    </div>

                                @elseif($isNext)

                                    <div class="schedule-status">
                                        Upcoming
                                    </div>

                                @endif

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="schedule-empty">
                    There are no events scheduled for today
                </div>

            @endif

        </div>

    </section>



    {{-- =========================
         UPCOMING SCHEDULE
    ========================= --}}

    <section class="tomorrow-schedule">

        <div class="schedule-section-header tomorrow-header">

            <h2 class="tomorrow-title">
                Upcoming Schedule
            </h2>

            <div class="tomorrow-subtitle">
                {{ now()->copy()->addDay()->translatedFormat('l, d F Y') }}
            </div>

        </div>


        <div
            class="tomorrow-list"
            id="tomorrowList"
        >

            @if($tomorrowReservations->count() > 0)

                @foreach($tomorrowReservations as $index => $reservation)

                    @php

                        $tomorrowStart =
                            \Carbon\Carbon::parse($reservation->start_at);

                        $tomorrowEnd =
                            \Carbon\Carbon::parse($reservation->end_at);

                    @endphp


                    <div
                        class="tomorrow-card {{ $index === 0 ? 'active' : '' }}"
                        data-index="{{ $index }}"
                    >

                        <div class="tomorrow-time">

                            <div class="tomorrow-time-main">
                                {{ $tomorrowStart->format('H:i') }}
                            </div>

                            <div class="tomorrow-time-end">
                                {{ $tomorrowEnd->format('H:i') }}
                            </div>

                        </div>


                        <div class="tomorrow-content">

                            <div class="tomorrow-name">
                                {{ $reservation->course_name }}
                            </div>

                            <div class="tomorrow-room">
                                {{ $reservation->room->name ?? '-' }}
                            </div>

                            {{-- <div class="tomorrow-instructor">
                                {{ $reservation->instructor ?: 'Instructor unavailable' }}
                            </div> --}}

                        </div>

                    </div>

                @endforeach

            @else

                <div class="tomorrow-empty">
                    No bookings scheduled for tomorrow
                </div>

            @endif

        </div>

    </section>

</aside>

        <!-- =========================
            DETAIL SCHEDULE MODE
        ========================= -->
        <section class="detail-schedule-mode" id="detailMode">

            <div class="detail-schedule-header">
                <div>
                    <div class="detail-label">CLASSROOM</div>
                    <h2>Detail Schedule</h2>
                    <p id="detailScheduleDate"></p>
                </div>

                <button
                    type="button"
                    class="back-highlight-btn"
                    id="backHighlightBtn"
                >
                    BACK TO HIGHLIGHT
                </button>
            </div>

            <div class="detail-schedule-list" id="detailScheduleList">
                <!-- 20 jadwal akan dimasukkan melalui JavaScript -->
            </div>

        </section>

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
   DISPLAY DATA
========================= */

/*
 * Building code diambil dari URL.
 *
 * Contoh:
 *
 * /display2/C
 *
 * maka buildingCode = C
 */

const buildingCode =
    window.location.pathname
        .split('/')
        .filter(Boolean)
        .pop();


/* =========================
   CAROUSEL TIMER
========================= */

let heroTimer = null;
let scheduleTimer = null;
let tomorrowTimer = null;
let scheduleManualScroll = false;
let scheduleManualScrollTimer = null;
let scheduleSearchKeyword = '';
let lastDisplayReservations = [];

/* =========================
   HELPER
========================= */

/*
 * Ubah format tanggal dari database lama
 *
 * 2026-09-11 08:00:00
 *
 * menjadi object Date.
 */

function parseDate(dateString) {

    if (!dateString) {
        return null;
    }

    return new Date(
        dateString.replace(' ', 'T')
    );

}


/*
 * Format waktu menjadi:
 *
 * 08:00
 */

function formatTime(dateString) {

    const date =
        parseDate(dateString);

    if (!date) {
        return '-';
    }

    return date.toLocaleTimeString(
        'en-GB',
        {
            hour: '2-digit',
            minute: '2-digit',
            hour12: false
        }
    );

}


/* =========================
   HERO
========================= */

function renderHero(reservations) {

    const heroContent =
        document.querySelector('.hero-content');

    if (!heroContent) {
        return;
    }


    const now =
        new Date();


    /*
     * Booking yang sedang berlangsung
     */

    const currentReservations =
        reservations.filter(reservation => {

            const start =
                parseDate(reservation.start);

            const end =
                parseDate(reservation.end);

            return start <= now && end >= now;

        });


    /*
     * Booking yang belum dimulai
     */

    const upcomingReservations =
        reservations
            .filter(reservation => {

                const start =
                    parseDate(reservation.start);

                return start > now;

            })
            .sort((a, b) => {

                return parseDate(a.start)
                    - parseDate(b.start);

            });


    /*
     * =========================
     * SEDANG BERLANGSUNG
     * =========================
     */

    if (currentReservations.length > 0) {

        let slidesHTML = '';
        
        currentReservations.forEach(
        reservation => {

            const start =
                parseDate(reservation.start);

            const end =
                parseDate(reservation.end);

            slidesHTML += `

               <div class="hero-slide">

    <div class="hero-course">
        ${escapeHtml(
            reservation.nama_event
        )}
    </div>


    <div class="hero-meta">

        <div class="hero-meta-item">

            <div class="hero-meta-label">
                ROOM
            </div>

            <div class="hero-room">
                ${escapeHtml(
                    reservation.room_name
                )}
            </div>

        </div>


        <div class="hero-meta-item">

            <div class="hero-meta-label">
                TIME
            </div>

            <div class="hero-time">
                ${formatTime(reservation.start)}
                -
                ${formatTime(reservation.end)}
            </div>

        </div>

    </div>

</div>

            `;

        }
    );


        let paginationHTML = '';


        if (currentReservations.length > 1) {

            currentReservations.forEach(
                (reservation, index) => {

                    paginationHTML += `

                        <span
                            class="pagination-dot ${index === 0 ? 'active' : ''}"
                            data-pagination="${index}"
                        ></span>

                    `;

                }
            );


            paginationHTML += `

                <span
                    class="pagination-number"
                    id="paginationNumber"
                >

                    01 /
                    ${String(
                        currentReservations.length
                    ).padStart(2, '0')}

                </span>

            `;

        }


        heroContent.innerHTML = `

            <div class="hero-status">

                <span class="hero-status-dot"></span>

                <span>
                    In Progress
                </span>

            </div>


            <div
                class="hero-carousel"
                id="heroCarousel"
            >

                ${slidesHTML}

            </div>


            ${
                currentReservations.length > 1
                    ? `
                        <div class="hero-bottom">

                            <div class="carousel-control">

                                <div class="pagination">

                                    ${paginationHTML}

                                </div>

                            </div>

                        </div>
                    `
                    : ''
            }

        `;


        initHeroCarousel();

        return;

    }


    /*
     * =========================
     * UPCOMING
     * =========================
     */

    if (upcomingReservations.length > 0) {

        const next =
            upcomingReservations[0];


        heroContent.innerHTML = `

            <div class="hero-status upcoming">

                <span class="hero-status-dot"></span>

                <span>
                    UPCOMING
                </span>

            </div>


            <div class="hero-slide active">

                <div class="hero-label">

                    ROOM
                    ${escapeHtml(
                        next.room_name
                    )}

                </div>


                <h1 class="hero-title">

                    ${escapeHtml(
                        next.nama_event
                    )}

                </h1>


                <div class="hero-info">


                    <div class="info-item">

                        <div class="info-label">
                            Room
                        </div>

                        <div class="info-value">

                            ${escapeHtml(
                                next.room_name
                            )}

                        </div>

                    </div>


                    {{-- Instructor tetap sengaja tidak digunakan --}}


                    <div class="info-item">

                        <div class="info-label">
                            Start
                        </div>

                        <div class="info-value accent">

                            ${formatTime(
                                next.start
                            )}

                            WIB

                        </div>

                    </div>


                </div>

            </div>

        `;

        return;

    }


    /*
     * =========================
     * TIDAK ADA JADWAL
     * =========================
     */

    heroContent.innerHTML = `

        <div class="empty-state">

            <div class="hero-status no-schedule">

                <span class="hero-status-dot"></span>

                <span>
                    No Schedule
                </span>

            </div>


            <h1>
                No classes scheduled today
            </h1>


            <p>

                No reservations are currently scheduled
                for Building ${escapeHtml(buildingCode)}.

            </p>

        </div>

    `;

}


/* =========================
   HERO CAROUSEL
========================= */

function initHeroCarousel() {

    if (heroTimer) {

        clearInterval(heroTimer);

        heroTimer = null;

    }


    const slides =
        document.querySelectorAll(
            '.hero-slide'
        );

    const dots =
        document.querySelectorAll(
            '.pagination-dot'
        );

    const paginationNumber =
        document.getElementById(
            'paginationNumber'
        );


    let currentSlide = 0;


    function showSlide(index) {

        if (!slides.length) {
            return;
        }


        if (index >= slides.length) {
            index = 0;
        }


        currentSlide = index;


        slides.forEach(
            (slide, i) => {

                slide.classList.toggle(
                    'active',
                    i === currentSlide
                );

            }
        );


        dots.forEach(
            (dot, i) => {

                dot.classList.toggle(
                    'active',
                    i === currentSlide
                );

            }
        );


        if (paginationNumber) {

            paginationNumber.textContent =
                `${String(
                    currentSlide + 1
                ).padStart(2, '0')} / ${String(
                    slides.length
                ).padStart(2, '0')}`;

        }

    }

    showSlide(0);

    if (slides.length > 1) {

        heroTimer =
            setInterval(() => {

                showSlide(
                    currentSlide + 1
                );

            }, 5000);

    }

}



/* =========================
   TODAY'S SCHEDULE
========================= */


function renderTodaySchedule(reservations) {

    const scheduleList =
        document.getElementById(
            'scheduleList'
        );

    if (!scheduleList) {
        return;
    }


    const now =
        new Date();


    let filteredReservations =
        reservations || [];


    /*
     * FILTER SEARCH
     */

    if (scheduleSearchKeyword) {

        filteredReservations =
            filteredReservations.filter(
                reservation => {

                    const room =
                        String(
                            reservation.room_name || ''
                        ).toLowerCase();

                    const activity =
                        String(
                            reservation.nama_event || ''
                        ).toLowerCase();


                    return (
                        room.includes(
                            scheduleSearchKeyword
                        )
                        ||
                        activity.includes(
                            scheduleSearchKeyword
                        )
                    );

                }
            );

    }


    /*
     * TIDAK ADA HASIL
     */

    if (
        !filteredReservations.length
    ) {

        scheduleList.innerHTML = `

            <div class="schedule-empty">

                ${
                    scheduleSearchKeyword
                        ? 'No matching reservations'
                        : 'There are no events scheduled for today'
                }

            </div>

        `;

        return;

    }


    /*
     * RENDER CARD
     */

    let html = `

        <div
            class="schedule-track"
            id="scheduleTrack"
        >

    `;


    filteredReservations.forEach(
        reservation => {

            const start =
                parseDate(
                    reservation.start
                );

            const end =
                parseDate(
                    reservation.end
                );


            const isCurrent =
                start <= now &&
                end >= now;


            const isNext =
                !isCurrent &&
                start > now;


            html += `

                <div class="schedule-item">

                    <!-- ROOM -->

                    <div>

                         <div class="schedule-room-label">
                            ROOM
                        </div>

                        <div class="schedule-room">

                            ${escapeHtml(
                                reservation.room_name
                            )}

                        </div>

                    </div>


                    <!-- ACTIVITY -->

                    <div>

                        <div class="schedule-name">

                            ${escapeHtml(
                                reservation.nama_event
                            )}

                        </div>


                        <!-- TIME -->

                        <div class="schedule-time">

                            ${formatTime(
                                reservation.start
                            )}

                            -

                            ${formatTime(
                                reservation.end
                            )}

                        </div>


                        <!-- STATUS -->

                        ${
                            isCurrent
                                ? `
                                    <div class="schedule-status in-progress">

                                        In Progress

                                    </div>
                                `
                                : ''
                        }


                        ${
                            isNext
                                ? `
                                    <div class="schedule-status">

                                        Upcoming

                                    </div>
                                `
                                : ''
                        }

                    </div>

                </div>

            `;

        }
    );


    html += `

        </div>

    `;


    scheduleList.innerHTML =
        html;


    /*
     * INIT CAROUSEL
     */

    requestAnimationFrame(
        () => {

            if (
                typeof initScheduleCarousel ===
                'function'
            ) {

                initScheduleCarousel();

            }

        }
    );

}


/* =========================
   SCHEDULE SEARCH
========================= */

function initScheduleSearch() {

    const searchInput =
        document.getElementById(
            'scheduleSearch'
        );

    if (!searchInput) {
        return;
    }


    searchInput.addEventListener(
        'input',
        function () {

            scheduleSearchKeyword =
                this.value
                    .trim()
                    .toLowerCase();


            renderTodaySchedule(
                lastDisplayReservations
            );

        }
    );

}

/* =========================
   TODAY CAROUSEL
========================= */

function initScheduleCarousel() {

    if (scheduleTimer) {

        clearInterval(
            scheduleTimer
        );

        scheduleTimer = null;

    }


    const scheduleList =
        document.getElementById(
            'scheduleList'
        );

    const scheduleTrack =
        document.getElementById(
            'scheduleTrack'
        );


    if (
        !scheduleList ||
        !scheduleTrack
    ) {

        return;

    }

    scheduleList.onwheel = function () {
    scheduleManualScroll = true;

    if (scheduleManualScrollTimer) {
        clearTimeout(scheduleManualScrollTimer);
    }

    scheduleManualScrollTimer = setTimeout(() => {
        scheduleManualScroll = false;
    }, 3000);
};


    let scheduleItems =
        Array.from(
            scheduleTrack.querySelectorAll(
                '.schedule-item'
            )
        );


    const originalCount =
        scheduleItems.length;


    /*
     * Jumlah card yang terlihat
     */

    const visibleItems = 4;


    /*
     * Jarak antar card
     */

    const itemGap = 10;


    let itemHeight = 0;

    let scheduleIndex = 0;


    /*
     * =========================
     * HITUNG UKURAN CARD
     * =========================
     */

    function calculateScheduleSize() {

        if (
            originalCount === 0
        ) {

            return;

        }


        const styles =
            window.getComputedStyle(
                scheduleList
            );


        const paddingTop =
            parseFloat(
                styles.paddingTop
            ) || 0;


        const paddingBottom =
            parseFloat(
                styles.paddingBottom
            ) || 0;


        const availableHeight =
            scheduleList.clientHeight
            -
            paddingTop
            -
            paddingBottom;


        const visible =
            Math.min(
                visibleItems,
                originalCount
            );


        itemHeight =
            (
                availableHeight
                -
                (
                    itemGap *
                    (visible - 1)
                )
            )
            /
            visible;


        itemHeight =
            Math.max(
                40,
                Math.floor(
                    itemHeight
                )
            );


        scheduleItems.forEach(
            item => {

                item.style.height =
                    `${itemHeight}px`;

                item.style.minHeight =
                    `${itemHeight}px`;

                item.style.flex =
                    `0 0 ${itemHeight}px`;

                item.style.boxSizing =
                    'border-box';

            }
        );


        scheduleTrack.style.gap =
            `${itemGap}px`;


        /*
         * Kalau jumlah data <= 4,
         * tidak perlu carousel.
         */

        if (
            originalCount <=
            visibleItems
        ) {

            scheduleTrack.style.transition =
                'none';

            scheduleTrack.style.transform =
                'translateY(0)';

        }

    }


    /*
     * Hitung ukuran pertama kali
     */

    calculateScheduleSize();


    /*
     * Kalau hanya 4 atau kurang,
     * tampilkan semua dan selesai.
     */

    if (
        originalCount <=
        visibleItems
    ) {

        return;

    }


    /*
     * =========================
     * CLONE 4 CARD PERTAMA
     * =========================
     *
     * Digunakan agar carousel
     * terlihat looping.
     */

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
            scheduleItems[i]
                .cloneNode(true);


        clone.classList.add(
            'schedule-clone'
        );


        scheduleTrack.appendChild(
            clone
        );

    }


    /*
     * Ambil ulang semua card
     */

    scheduleItems =
        Array.from(
            scheduleTrack.querySelectorAll(
                '.schedule-item'
            )
        );


    /*
     * Hitung ukuran setelah clone
     */

    calculateScheduleSize();


    /*
     * =========================
     * GERAKKAN CAROUSEL
     * =========================
     */

    function moveSchedule() {

        if (scheduleManualScroll) {
        return;
    }

        scheduleIndex++;


        const translateY =
            scheduleIndex *
            (
                itemHeight +
                itemGap
            );


        scheduleTrack.style.transition =
            'transform 0.8s ease-in-out';


        scheduleTrack.style.transform =
            `translateY(-${translateY}px)`;


        /*
         * Sampai akhir data asli.
         *
         * Setelah card terakhir,
         * reset ke card pertama
         * tanpa terlihat melompat.
         */

        if (
            scheduleIndex >=
            originalCount
        ) {

            setTimeout(() => {

                scheduleTrack.style.transition =
                    'none';


                scheduleIndex = 0;


                scheduleTrack.style.transform =
                    'translateY(0)';


                void scheduleTrack.offsetHeight;


                scheduleTrack.style.transition =
                    'transform 0.8s ease-in-out';


            }, 850);

        }

    }


    /*
     * =========================
     * MULAI CAROUSEL
     * =========================
     *
     * 1 card bergerak setiap 7 detik.
     */

    scheduleTimer =
        setInterval(
            moveSchedule,
            5000
        );


    /*
     * Resize
     */

    window.addEventListener(
        'resize',
        calculateScheduleSize
    );

}

/* =========================
   TOMORROW SCHEDULE
========================= */

function renderTomorrowSchedule(
    reservations
) {

    const tomorrowList =
        document.getElementById(
            'tomorrowList'
        );


    if (!tomorrowList) {
        return;
    }


    if (!reservations.length) {

        tomorrowList.innerHTML = `

            <div class="tomorrow-empty">

                No bookings scheduled for tomorrow

            </div>

        `;

        return;

    }


    let html = '';


    reservations.forEach(
        (reservation, index) => {

            html += `

                <div
                    class="tomorrow-card ${index === 0 ? 'active' : ''}"
                    data-index="${index}"
                >

                    <div class="tomorrow-time">

                        <div class="tomorrow-time-main">

                            ${formatTime(
                                reservation.start
                            )}

                        </div>

                        <div class="tomorrow-time-end">

                            ${formatTime(
                                reservation.end
                            )}

                        </div>

                    </div>


                    <div class="tomorrow-content">

                        <div class="tomorrow-name">

                            ${escapeHtml(
                                reservation.nama_event
                            )}

                        </div>

                        <div class="tomorrow-room">

                            ${escapeHtml(
                                reservation.room_name
                            )}

                        </div>


                        {{-- Instructor sengaja tetap tidak digunakan --}}

                    </div>

                </div>

            `;

        }
    );


    tomorrowList.innerHTML =
        html;


    initTomorrowCarousel();

}


/* =========================
   TOMORROW CAROUSEL
========================= */

function initTomorrowCarousel() {

    if (tomorrowTimer) {

        clearInterval(
            tomorrowTimer
        );

        tomorrowTimer = null;

    }


    const cards =
        Array.from(
            document.querySelectorAll(
                '.tomorrow-card'
            )
        );


    if (cards.length <= 1) {
        return;
    }


    let index = 0;


    tomorrowTimer =
        setInterval(() => {

            cards[index]
                .classList.remove(
                    'active'
                );


            index =
                (
                    index + 1
                )
                %
                cards.length;


            cards[index]
                .classList.add(
                    'active'
                );

        }, 3000);

}


/* =========================
   ESCAPE HTML
========================= */

/*
 * Mencegah nama event dari database
 * merusak HTML yang kita buat dengan JS.
 */

function escapeHtml(value) {

    if (value === null ||
        value === undefined) {

        return '';

    }


    return String(value)
        .replace(
            /&/g,
            '&amp;'
        )
        .replace(
            /</g,
            '&lt;'
        )
        .replace(
            />/g,
            '&gt;'
        )
        .replace(
            /"/g,
            '&quot;'
        )
        .replace(
            /'/g,
            '&#039;'
        );

}


/* =========================
   LOAD DATA FROM API
========================= */
let detailScheduleActive = false;

function renderDetailSchedule(reservations) {

    const detailList = document.getElementById('detailScheduleList');
    const detailDate = document.getElementById('detailScheduleDate');

    if (!detailList) return;

    const now = new Date();

    detailDate.textContent = now.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: 'long',
        year: 'numeric'
    });

    if (!reservations || reservations.length === 0) {
        detailList.innerHTML = `
            <div style="grid-column:1/-1; text-align:center; padding:50px;">
                No Schedule Today
            </div>
        `;
        return;
    }

    detailList.innerHTML = reservations.map((reservation, index) => {

        const start = new Date(reservation.start.replace(' ', 'T'));
        const end = new Date(reservation.end.replace(' ', 'T'));

        let statusClass = '';
        let statusText = '';

        if (start <= now && end >= now) {
            statusClass = 'detail-current';
            statusText = 'IN PROGRESS';
        } else if (start > now) {
            statusText = 'UPCOMING';
        } else {
            statusClass = 'detail-passed';
            statusText = 'COMPLETED';
        }

        const startTime = start.toLocaleTimeString('en-GB', {
            hour: '2-digit',
            minute: '2-digit'
        });

        const endTime = end.toLocaleTimeString('en-GB', {
            hour: '2-digit',
            minute: '2-digit'
        });

        return `
            <div class="detail-schedule-item ${statusClass}">

                <div class="detail-number">
                    ${(index + 1).toString().padStart(2, '0')}
                </div>

                <div>

                    <div class="detail-room">
                        <span class="room-label">ROOM</span>
                        <span class="room-name">${reservation.room_name || '-'}</span>
                    </div>

                </div>

                <div>
                    <div class="detail-time">
                        ${startTime} - ${endTime}
                    </div>

                    <div class="detail-title">
                        ${reservation.nama_event || '-'}
                    </div>

                    <div class="detail-status">
                        ${statusText}
                    </div>
                </div>

            </div>
        `;

    }).join('');
}

function showDetailSchedule() {

    detailScheduleActive = true;

    const highlightMode = document.querySelector('.hero');
    const schedulePanel = document.querySelector('.schedule-panel');
    const detailMode = document.getElementById('detailMode');

    if (highlightMode) {
        highlightMode.style.display = 'none';
    }

    if (schedulePanel) {
        schedulePanel.style.display = 'none';
    }

    if (detailMode) {
        detailMode.style.display = 'block';
    }
}


function showHighlightMode() {

    detailScheduleActive = false;

    const highlightMode = document.querySelector('.hero');
    const schedulePanel = document.querySelector('.schedule-panel');
    const detailMode = document.getElementById('detailMode');

    if (highlightMode) {
        highlightMode.style.display = '';
    }

    if (schedulePanel) {
        schedulePanel.style.display = '';
    }

    if (detailMode) {
        detailMode.style.display = 'none';
    }
}
document.addEventListener('click', function (event) {

    if (event.target.closest('#detailScheduleBtn')) {
        showDetailSchedule();
    }

    if (event.target.closest('#backHighlightBtn')) {
        showHighlightMode();
    }

});


async function loadDisplayData() {

    try {

        const response =
            await fetch(
                `/api/display2/${encodeURIComponent(buildingCode)}`,
                {
                    cache: 'no-store'
                }
            );


        if (!response.ok) {

            throw new Error(
                `API error: ${response.status}`
            );

        }


        const data =
            await response.json();



            /*
            * Simpan data reservation terakhir
            * untuk kebutuhan search.
            */

            lastDisplayReservations =
                data.reservations || [];

        /*
         * Update tampilan
         */

        renderHero(
            data.reservations || []
        );

        const heroContent =
            document.querySelector('.hero-content');

        if (heroContent) {
            heroContent.classList.add('hero-ready');
        }

        renderTodaySchedule(
            data.reservations || []
        );


        renderTomorrowSchedule(
            data.tomorrowReservations || []
        );

        renderDetailSchedule(
            data.reservations || []
        );


        console.log(
            'Display data updated:',
            new Date().toLocaleTimeString()
        );


    } catch (error) {

        console.error(
            'Failed to update display:',
            error
        );

    }

}


/* =========================
   INITIAL LOAD
========================= */
initScheduleSearch();
loadDisplayData();


/* =========================
   AUTO UPDATE
========================= */

/*
 * Ambil data terbaru dari API
 * setiap 5 detik.
 *
 * Tidak melakukan page reload.
 */

setInterval(
    loadDisplayData,
    90000
);
</script>


</body>

</html>
