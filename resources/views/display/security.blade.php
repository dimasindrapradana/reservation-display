<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Security Monitoring</title>


    <style>

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
            font-family: Arial, Helvetica, sans-serif;
            background: #f3f7f9;
            color: #092b4c;
        }


        body {
            min-height: 100vh;
        }

        /* =========================
        HEADER
        ========================= */
        :root {

            --navy: #003b6f;
            --navy-dark: #00294f;

        }

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

            background:
                rgba(0, 168, 200, 0.08);

            transform: rotate(-15deg);

        }


        .brand {

            display: flex;

            align-items: center;

            gap: 1.2vw;

            position: relative;

            z-index: 2;

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

            color:
                #69e5f5;

        }
        /* =========================
           MAIN
        ========================= */

        .page-wrapper {

            width: 100%;

           height: 100vh;

            padding:
                18px
                36px
                0;

            display: flex;

            flex-direction: column;

            overflow: hidden;
        }


        .monitor-header {

            flex: 0 0 auto;

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 14px;
        }


        .monitor-heading small {

            display: block;

            color: #6a8aa4;

            font-size: 12px;

            letter-spacing: 2px;

            font-weight: 800;

            margin-bottom: 5px;
        }


        .monitor-heading h1 {

            margin: 0;

            font-size: 30px;

            color: #092b4c;
        }


        .live-indicator {

            display: flex;

            align-items: center;

            gap: 9px;

            font-size: 13px;

            font-weight: 800;

            color: #16728c;
        }


        .live-dot {

            width: 10px;
            height: 10px;

            border-radius: 50%;

            background: #37c6df;

            box-shadow:
                0 0 10px rgba(55,198,223,.6);
        }


        /* =========================
           SUMMARY
        ========================= */

        .summary-grid {

            flex: 0 0 auto;

            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 14px;

            margin-bottom: 14px;
        }


        .summary-card {

            background: white;

            border:
                1px solid #dce7ed;

            border-radius: 13px;

            padding:
                15px
                22px;

            box-shadow:
                0 5px 16px
                rgba(25,66,91,.07);

            min-height: 96px;
        }


        .summary-label {

            color: #6e8aa0;

            font-size: 12px;

            font-weight: 800;

            letter-spacing: 1.1px;
        }


        .summary-number {

            margin-top: 5px;

            font-size: 32px;

            font-weight: 900;

            color: #073a67;
        }


        .summary-note {

            margin-top: 2px;

            font-size: 11px;

            color: #8aa0b1;
        }


        /* =========================
           FILTER
        ========================= */

        .building-filter {

            flex: 0 0 auto;

            background: white;

            border:
                1px solid #dce7ed;

            border-radius: 12px;

            padding: 9px;

            display: flex;

            gap: 8px;

            margin-bottom: 14px;

            box-shadow:
                0 4px 14px
                rgba(25,66,91,.05);
        }


        .building-filter button {

            min-width: 60px;

            height: 38px;

            border: none;

            border-radius: 7px;

            background: #edf3f6;

            color: #46677f;

            font-size: 13px;

            font-weight: 800;

            cursor: pointer;

            transition: .2s ease;
        }


        .building-filter button:hover {

            background: #dfeaf0;
        }


        .building-filter button.active {

            background: #073f6b;

            color: white;
        }

        /* =========================
        BUILDING FILTER + SEARCH
        ========================= */

        .building-filter {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .building-filter-buttons {
            display: flex;
            align-items: center;
            gap: 8px;
        }


        /* =========================
        SECURITY SEARCH
        ========================= */

        .security-search {
            position: relative;
            flex: 0 0 260px;
        }

        .security-search-icon {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 13px;
            opacity: 0.55;
            pointer-events: none;
        }

        .security-search input {
            width: 100%;
            box-sizing: border-box;

            padding:
                8px
                14px
                8px
                36px;

            border:
                1px solid
                rgba(0, 59, 111, 0.14);

            border-radius: 20px;

            background:
                rgba(255, 255, 255, 0.65);

            color: var(--text);

            font-size: 11px;

            outline: none;

            transition:
                border-color .2s ease,
                background .2s ease,
                box-shadow .2s ease;
        }

        .security-search input::placeholder {
            color: #9aa9b5;
        }

        .security-search input:focus {
            background: #fff;

            border-color:
                rgba(0, 59, 111, .30);

            box-shadow:
                0 2px 8px
                rgba(0, 41, 79, .06);
        }


        /* =========================
           CONTENT
        ========================= */

        .content-grid {

            flex: 0 0 auto;

            min-height: 0;

            display: grid;

            grid-template-columns:
                minmax(0, 1fr)
                390px;

            gap: 20px;

            align-items: stretch;

            overflow: hidden;
        }


        /* =========================
           SECURITY TABLE ANIMATION
        ========================= */

       #reservationRows {
            flex: 1;
            min-height: 0;
            height: auto;

            overflow-y: auto;
            overflow-x: hidden;

            padding: 12px 14px 20px;
            box-sizing: border-box;

            scrollbar-width: none;
        }

        #reservationRows::-webkit-scrollbar {
            display: none;
        }
        .table-row > div {
            min-width: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }


        .security-slide-out {

            opacity: 0;

            transform:
                translateX(-25px);
        }


        .security-slide-in {

            animation:
                securitySlideIn
                .45s
                ease;
        }


        @keyframes securitySlideIn {

            from {

                opacity: 0;

                transform:
                    translateX(25px);
            }

            to {

                opacity: 1;

                transform:
                    translateX(0);
            }

        }


        /* =========================
           RESERVATION PANEL
        ========================= */

        .reservation-panel {

            background: white;

            border:
                1px solid #dce7ed;

            border-radius: 15px;

            box-shadow:
                0 6px 18px
                rgba(25,66,91,.07);

            overflow: hidden;

            min-height: 0;

            display: flex;

            flex-direction: column;
            height: 592px;
            min-height: 592px;
            max-height: 592px;
        }


        .panel-header {

            flex: 0 0 auto;

            padding:
                17px
                23px;

            border-bottom:
                1px solid #e5edf1;

            display: flex;

            justify-content: space-between;

            align-items: center;
        }


        .panel-title {

            font-size: 20px;

            font-weight: 800;

            color: #092b4c;
        }


        .panel-subtitle {

            margin-top: 4px;

            font-size: 12px;

            color: #7890a3;
        }


        /* =========================
           TABLE
        ========================= */

        .reservation-table {
            flex: 1;
            min-height: 0;

            display: flex;
            flex-direction: column;

            overflow: hidden;

            background: #ffffff;
        }


        .table-row {

            display: grid;

            grid-template-columns:
                90px
                155px
                180px
                1fr
                125px;

            align-items: center;

            min-height: 68px;

            border-bottom:
                1px solid #edf2f4;

            padding:
                0
                22px;
        }


        .table-row:last-child {

            border-bottom: none;
        }


        .table-row.table-head {

            flex: 0 0 43px;

            min-height: 43px;

            background: #f5f8fa;

            color: #7b91a1;

            font-size: 10px;

            font-weight: 900;

            letter-spacing: 1px;

            text-transform: uppercase;
        }


        .building-code {

            font-size: 18px;

            font-weight: 900;

            color: #073f6b;
        }


        .room-name {

            font-size: 21px;

            font-weight: 900;

            color: #0c6581;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;
        }


        .time-main {

            font-size: 14px;

            font-weight: 800;

            color: #164d70;

            white-space: nowrap;
        }


        .time-date {

            margin-top: 4px;

            font-size: 10px;

            color: #8aa0af;
        }


        .activity-name {

            font-size: 14px;

            font-weight: 800;

            color: #1b3950;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;

            padding-right: 15px;
        }


        .status-badge {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            min-width: 92px;

            padding:
                7px
                10px;

            border-radius: 20px;

            font-size: 10px;

            font-weight: 900;

            letter-spacing: .5px;
        }


        .status-ongoing {

            color: #d84949;

            background: #fff0f0;
        }


        .status-upcoming {

            color: #14758b;

            background: #e9f8fb;
        }


        .status-completed {

            color: #71818b;

            background: #eef1f3;
        }


        /* =========================
           RESERVATION SCROLL
           SCROLLBAR HIDDEN
           MOUSE WHEEL STILL WORKS
        ========================= */

        #reservationRows {

            flex: 1;

            min-height: 0;

            overflow-y: auto;

            overflow-x: hidden;

            scrollbar-width: none;

            -ms-overflow-style: none;
        }


        #reservationRows::-webkit-scrollbar {

            width: 0;

            height: 0;

            display: none;
        }


        .reservation-row-animated {

            animation:
                reservationSlide
                .55s
                ease;
        }


        @keyframes reservationSlide {

            from {

                opacity: 0;

                transform:
                    translateX(35px);
            }

            to {

                opacity: 1;

                transform:
                    translateX(0);
            }

        }


        .empty-row {

            min-height: 120px;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #8aa0af;

            font-size: 13px;
        }


        /* =========================
           RIGHT PANEL
        ========================= */

        .side-panel {

            min-height: 0;

            display: flex;

            flex-direction: column;

            gap: 18px;

            overflow: hidden;
        }


        .building-summary {

            flex: 0 0 auto;

            background: white;

            border:
                1px solid #dce7ed;

            border-radius: 15px;

            padding: 20px;

            box-shadow:
                0 6px 18px
                rgba(25,66,91,.07);
        }


        .building-summary-title {

            font-size: 19px;

            font-weight: 800;

            color: #092b4c;
        }


        .building-summary-subtitle {

            margin-top: 3px;

            font-size: 12px;

            color: #7890a3;
        }


        .building-list {

            margin-top: 15px;

            display: grid;

            grid-template-columns:
                1fr
                1fr;

            gap: 9px;
        }


        .building-item {

            border:
                1px solid #e2ebef;

            border-radius: 9px;

            padding:
                11px
                12px;

            background: #fbfcfd;
        }


        .building-item-code {

            font-size: 17px;

            font-weight: 900;

            color: #073f6b;
        }


        .building-item-count {

            margin-top: 3px;

            font-size: 11px;

            color: #7d93a3;
        }


        /* =========================
           MONITOR NOTE
        ========================= */

        .monitor-note {

            flex: 0 0 auto;

            background:
                linear-gradient(
                    135deg,
                    #073b66,
                    #0b5b78
                );

            border-radius: 15px;

            padding: 22px;

            color: white;

            box-shadow:
                0 7px 20px
                rgba(7,59,102,.18);
        }


        .monitor-note-label {

            font-size: 10px;

            font-weight: 900;

            letter-spacing: 2px;

            opacity: .7;
        }


        .monitor-note h2 {

            margin:
                7px
                0
                6px;

            font-size: 24px;
        }


        .monitor-note p {

            margin: 0;

            font-size: 12px;

            line-height: 1.6;

            color: #d8edf5;
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

        @media (max-width: 1200px) {

            .top-header {

                grid-template-columns:
                    250px
                    1fr
                    340px;

                padding:
                    0
                    30px;
            }


            .header-title-main {

                font-size: 28px;
            }


            .header-time {

                font-size: 28px;
            }


            .content-grid {

                grid-template-columns:
                    1fr
                    320px;
            }


            .table-row {

                grid-template-columns:
                    75px
                    100px
                    135px
                    1fr
                    110px;
            }

        }


        @media (max-width: 950px) {

            html,
            body {

                overflow: auto;
            }


            .top-header {

                grid-template-columns:
                    1fr
                    1fr;

                height: auto;

                min-height: 110px;

                padding:
                    18px
                    25px;
            }


            .header-brand {

                border-right: none;
            }


            .header-title {

                padding-left: 20px;
            }


            .header-right {

                grid-column:
                    1 / -1;

                justify-content:
                    space-between;

                margin-top: 10px;
            }


            .page-wrapper {

                height: auto;

                min-height: calc(100vh - 110px);

                overflow: visible;
            }


            .content-grid {

                grid-template-columns: 1fr;

                overflow: visible;
            }


            .reservation-panel {

                min-height: 500px;
            }


            .summary-grid {

                grid-template-columns:
                    repeat(2, 1fr);
            }

        }


        @media (max-width: 650px) {

            .page-wrapper {

                padding:
                    18px
                    15px
                    0;
            }


            .summary-grid {

                grid-template-columns:
                    1fr
                    1fr;
            }


            .table-row {

                grid-template-columns:
                    55px
                    80px
                    110px
                    1fr;
            }


            .table-row > div:last-child {

                display: none;
            }


            .building-filter {

                overflow-x: auto;
            }

        }
           /* =========================
            RESERVATION CARD
            ========================= */

            #reservationRows .table-row {

                display: grid;

                grid-template-columns:
                    8%
                    14%
                    17%
                    minmax(0, 1fr)
                    12%;

                align-items: center;

                min-height: 64px;

                margin-bottom: 10px;

                padding: 0 24px;

                box-sizing: border-box;

                background: #ffffff;

                border: 1px solid #dce6ed;

                border-radius: 10px;

                box-shadow:
                    0 2px 6px rgba(7, 56, 95, 0.04);

                overflow: hidden;
            }

            /* =========================
            RESERVATION TABLE HEADER
            ========================= */

          

            .table-header {
                flex: 0 0 52px;

                height: 52px;
                min-height: 52px;

                display: grid;

                grid-template-columns:
                    8%
                    14%
                    17%
                    minmax(0, 1fr)
                    12%;

                align-items: center;

                padding: 0 24px;

                background:
                    linear-gradient(
                        90deg,
                        rgba(7, 56, 95, 0.06),
                        rgba(0, 168, 200, 0.04)
                    );

                border-top: 1px solid #dce6ed;
                border-bottom: 1px solid #dce6ed;

                color: #5f7b8f;

                font-size: 11px;

                font-weight: 700;

                letter-spacing: 1.2px;

                text-transform: uppercase;

                overflow: hidden;

                z-index: 10;
            }


            /* =========================
            HEADER COLUMN
            ========================= */

            .table-header > div {

                min-width: 0;

                padding: 0 8px;

                white-space: nowrap;
            }


            /* =========================
            SMALL ACCENT
            ========================= */

            .table-header > div:first-child {
                color: #087a9c;
            }

            /* =========================
            CARD CONTENT
            ========================= */

            #reservationRows .table-row > div {

                min-width: 0;

                padding: 0 8px;

                overflow: hidden;

                text-overflow: ellipsis;

                white-space: nowrap;
            }


            /* =========================
            BUILDING
            ========================= */

            #reservationRows .table-row > div:nth-child(1) {
                font-weight: 700;
            }


            /* =========================
            ROOM
            ========================= */

            #reservationRows .table-row > div:nth-child(2) {
                font-weight: 700;

                color: #087a9c;

                font-size: 1.05em;
            }


            /* =========================
            TIME
            ========================= */

            #reservationRows .table-row > div:nth-child(3) {
                font-weight: 700;
            }


            /* =========================
            ACTIVITY
            ========================= */

            #reservationRows .table-row > div:nth-child(4) {
                font-weight: 600;

                overflow: hidden;

                text-overflow: ellipsis;

                white-space: nowrap;
            }


            /* =========================
            STATUS
            ========================= */

            #reservationRows .table-row > div:nth-child(5) {
                display: flex;

                align-items: center;

                justify-content: flex-start;

                overflow: visible;
            }


            /* =========================
            MOBILE / SMALL SCREEN
            ========================= */

            @media (max-width: 1100px) {

                #reservationRows .table-row {

                    grid-template-columns:
                        9%
                        15%
                        18%
                        minmax(0, 1fr)
                        13%;

                    padding: 12px 14px 20px;
                }

                #reservationRows .table-row > div {
                    padding: 0 5px;
                }
            }
                #reservationRows {
                    max-height: calc(
                        (64px * 6) + (10px * 5) + 20px
                    );
                }

          /* =========================
            SECURITY CAROUSEL TRACK
            ========================= */

            #reservationRows .security-slide-track {
                display: flex;
                flex-direction: column;
                width: 100%;
            }

            #reservationRows .security-slide-track .table-row {
                flex: 0 0 auto;
                margin-bottom: 10px;
            }







    </style>

</head>


<body>


        <!-- =========================
            HEADER
        ========================= -->

        <header class="header">

            <div class="brand">

                <div class="brand-logo">
                    <!-- Logo kecil jika digunakan -->
                </div>

                <div>

                    <div class="brand-title">
                        GITC Info
                    </div>

                    <div class="brand-subtitle">
                        Garuda Training & Information System
                    </div>

                </div>

            </div>


            <div class="header-divider"></div>


            <div class="building-title">

                <div>
                    Security Monitoring
                </div>

                <div class="building-subtitle">
                    GITC Information Monitoring
                </div>

            </div>


            <div class="header-right">

                <div class="datetime">

                    <div
                        class="date"
                        id="headerDate"
                    >
                        Loading...
                    </div>

                    <div
                        class="clock"
                        id="headerTime"
                    >
                        --:--:-- WIB
                    </div>

                </div>


                <div class="logo-area">

                    <img
                        src="{{ asset('images/Logo2.png') }}"
                        alt="Garuda Indonesia"
                    >

                </div>

            </div>

        </header>



        <!-- =========================
            MAIN
        ========================= -->

        <main class="page-wrapper">


            <!-- MONITOR HEADER -->

            <div class="monitor-header">


                <div class="monitor-heading">

                    <small>
                        SECURITY POST
                    </small>

                    <h1>
                        Today's Reservation Monitoring
                    </h1>

                </div>


                <div class="live-indicator">

                    <span class="live-dot"></span>

                    LIVE MONITORING

                </div>


            </div>


           <!-- =========================
                BUILDING FILTER
            ========================= -->

            <div class="building-filter">

                <div class="building-filter-buttons">

                    <button
                        class="active"
                        data-building="ALL"
                    >
                        ALL
                    </button>

                    <button data-building="A">
                        A
                    </button>

                    <button data-building="B">
                        B
                    </button>

                    <button data-building="C">
                        C
                    </button>

                    <button data-building="D">
                        D
                    </button>

                    <button data-building="F">
                        F
                    </button>

                </div>


                <!-- =========================
                    SECURITY SEARCH
                ========================= -->

                <div class="security-search">

                    <span class="security-search-icon">
                        🔍
                    </span>

                    <input
                        type="text"
                        id="securitySearch"
                        placeholder="Search building, room, activity..."
                        autocomplete="off"
                    >

                </div>

            </div>


            <!-- =========================
                CONTENT
            ========================= -->

            <div class="content-grid">


                <!-- =========================
                    RESERVATION PANEL
                ========================= -->

                <section class="reservation-panel">


                    <div class="panel-header">


                        <div>

                            <div class="panel-title">
                                Today's Classroom Reservations
                            </div>

                            <div class="panel-subtitle">
                                All buildings • Real-time monitoring
                            </div>

                        </div>


                    </div>



                    <div class="reservation-table">


                        <!-- TABLE HEADER -->

                        <div class="table-row table-head table-header">

                            <div>
                                Building
                            </div>

                            <div>
                                Room
                            </div>

                            <div>
                                Time
                            </div>

                            <div>
                                Activity
                            </div>

                            <div>
                                Status
                            </div>

                        </div>



                        <!-- DYNAMIC RESERVATIONS -->

                        <div id="reservationRows">

                            <div class="empty-row">
                                Loading reservation data...
                            </div>

                        </div>


                    </div>


                </section>



                <!-- =========================
                    RIGHT SIDE
                ========================= -->

                <aside class="side-panel">


                    <!-- BUILDING SUMMARY -->

                    <section class="building-summary">


                        <div class="building-summary-title">
                            Building Overview
                        </div>


                        <div class="building-summary-subtitle">
                            Today's reservation activity
                        </div>



                        <div
                            class="building-list"
                            id="buildingList"
                        >


                            <div class="building-item">

                                <div class="building-item-code">
                                    A
                                </div>

                                <div
                                    class="building-item-count"
                                    data-building-count="A"
                                >
                                    0 reservations
                                </div>

                            </div>



                            <div class="building-item">

                                <div class="building-item-code">
                                    B
                                </div>

                                <div
                                    class="building-item-count"
                                    data-building-count="B"
                                >
                                    0 reservations
                                </div>

                            </div>



                            <div class="building-item">

                                <div class="building-item-code">
                                    C
                                </div>

                                <div
                                    class="building-item-count"
                                    data-building-count="C"
                                >
                                    0 reservations
                                </div>

                            </div>



                            <div class="building-item">

                                <div class="building-item-code">
                                    D
                                </div>

                                <div
                                    class="building-item-count"
                                    data-building-count="D"
                                >
                                    0 reservations
                                </div>

                            </div>



                            <div class="building-item">

                                <div class="building-item-code">
                                    F
                                </div>

                                <div
                                    class="building-item-count"
                                    data-building-count="F"
                                >
                                    0 reservations
                                </div>

                            </div>


                        </div>


                    </section>



                    <!-- MONITOR NOTE -->

                    <section class="monitor-note">


                        <div class="monitor-note-label">
                            SECURITY MONITORING
                        </div>


                        <h2>
                            Facility Status
                        </h2>


                        <p>
                            This screen is intended for the security post
                            to monitor classroom activity across all buildings.
                        </p>


                    </section>


                </aside>


            </div>



            {{-- =========================
                FOOTER
            ========================= --}}

            <footer class="footer">


                <div class="footer-brand">

                    GITC INFO

                </div>


                <div class="footer-right">

                    <span>Safety</span>

                    <span>•</span>

                    <span>Service</span>

                    <span>•</span>

                    <span>Excellence</span>

                </div>


            </footer>



        </main>



        <script>

            /* =========================
            CLOCK
            ========================= */

            function updateClock() {

                const now = new Date();

                const dateElement =
                    document.getElementById('headerDate');

                const timeElement =
                    document.getElementById('headerTime');


                if (dateElement) {

                    dateElement.textContent =
                        now.toLocaleDateString('en-GB', {
                            weekday: 'long',
                            day: '2-digit',
                            month: 'long',
                            year: 'numeric'
                        });

                }


                if (timeElement) {

                    timeElement.textContent =
                        now.toLocaleTimeString('en-GB', {
                            hour: '2-digit',
                            minute: '2-digit',
                            second: '2-digit'
                        }) + ' WIB';

                }

            }


            updateClock();

            setInterval(
                updateClock,
                1000
            );



            /* =========================
            SECURITY DATA
            ========================= */

            let securityReservations = [];
            let securitySearchKeyword = '';

            let currentBuildingFilter = 'ALL';

            let allScrollTimer = null;
            let allScrollDirection = 1;
            let allScrollAnimationFrame = null;

            let buildingScrollTimer = null;
            let buildingScrollDirection = 1;
            let buildingScrollAnimationFrame = null;


            /* =========================
            LOAD SECURITY DATA
            ========================= */

            async function loadSecurityData() {

                try {

                    const response =
                        await fetch(
                            '/api/security',
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


                    securityReservations =
                        data.reservations || [];


                    /*
                    * Update summary
                    */

                    updateSecuritySummary();


                    /*
                    * Render sesuai filter aktif
                    */

                    renderSecurityReservations();

                    startSecurityAutoScroll();


                    console.log(
                        'Security data updated:',
                        securityReservations
                    );


                } catch (error) {

                    console.error(
                        'Failed to load security data:',
                        error
                    );

                }

            }



            /* =========================
            UPDATE SECURITY SUMMARY
            ========================= */

            function updateSecuritySummary() {

                const now = new Date();

                let ongoing = 0;

                let upcoming = 0;

                let completed = 0;


                /* =========================
                HITUNG STATUS
                ========================= */

                securityReservations.forEach(
                    reservation => {

                        const start =
                            new Date(
                                reservation.start.replace(
                                    ' ',
                                    'T'
                                )
                            );


                        const end =
                            new Date(
                                reservation.end.replace(
                                    ' ',
                                    'T'
                                )
                            );


                        if (
                            start <= now &&
                            end >= now
                        ) {

                            ongoing++;

                        } else if (
                            start > now
                        ) {

                            upcoming++;

                        } else {

                            completed++;

                        }

                    }
                );


                /* =========================
                SUMMARY ATAS
                ========================= */

                const summaryToday =
                    document.getElementById(
                        'summaryToday'
                    );


                const summaryOngoing =
                    document.getElementById(
                        'summaryOngoing'
                    );


                const summaryUpcoming =
                    document.getElementById(
                        'summaryUpcoming'
                    );


                const summaryCompleted =
                    document.getElementById(
                        'summaryCompleted'
                    );


                if (summaryToday) {

                    summaryToday.textContent =
                        securityReservations.length;

                }


                if (summaryOngoing) {

                    summaryOngoing.textContent =
                        ongoing;

                }


                if (summaryUpcoming) {

                    summaryUpcoming.textContent =
                        upcoming;

                }


                if (summaryCompleted) {

                    summaryCompleted.textContent =
                        completed;

                }


                /* =========================
                BUILDING OVERVIEW
                ========================= */

                const buildings = [
                    'A',
                    'B',
                    'C',
                    'D',
                    'F'
                ];


                buildings.forEach(
                    building => {

                        const count =
                            securityReservations.filter(
                                reservation =>
                                    String(
                                        reservation.building_code
                                    )
                                    .toUpperCase() ===
                                    building
                            ).length;


                        const element =
                            document.querySelector(
                                `[data-building-count="${building}"]`
                            );


                        if (!element) {

                            return;

                        }


                        element.textContent =
                            count === 1
                                ? '1 reservation'
                                : `${count} reservations`;

                    }
                );

            }



            /* =========================
            GET RESERVATION STATUS
            ========================= */

            function getReservationStatus(
                reservation
            ) {

                const now = new Date();


                const start =
                    new Date(
                        reservation.start.replace(
                            ' ',
                            'T'
                        )
                    );


                const end =
                    new Date(
                        reservation.end.replace(
                            ' ',
                            'T'
                        )
                    );


                if (
                    start <= now &&
                    end >= now
                ) {

                    return {

                        text: '● ONGOING',

                        className:
                            'status-ongoing'

                    };

                }


                if (start > now) {

                    return {

                        text: 'UPCOMING',

                        className:
                            'status-upcoming'

                    };

                }


                return {

                    text: 'COMPLETED',

                    className:
                        'status-completed'

                };

            }



            /* =========================
            FORMAT TIME
            ========================= */

            function formatTime(datetime) {

                const date =
                    new Date(
                        datetime.replace(
                            ' ',
                            'T'
                        )
                    );


                return date.toLocaleTimeString(
                    'en-GB',
                    {
                        hour: '2-digit',
                        minute: '2-digit'
                    }
                );

            }



            /* =========================
            CREATE RESERVATION ROW
            ========================= */

            function createReservationRow(
                reservation
            ) {

                const status =
                    getReservationStatus(
                        reservation
                    );


                const startTime =
                    formatTime(
                        reservation.start
                    );


                const endTime =
                    formatTime(
                        reservation.end
                    );


                return `

                    <div class="table-row">

                        <div class="building-code">
                            ${reservation.building_code || '-'}
                        </div>


                        <div class="room-name">
                            ${reservation.room_name || '-'}
                        </div>


                        <div>

                            <div class="time-main">
                                ${startTime} - ${endTime}
                            </div>

                            <div class="time-date">
                                Today
                            </div>

                        </div>


                        <div class="activity-name">
                            ${reservation.nama_event || '-'}
                        </div>


                        <div>

                            <span class="status-badge ${status.className}">
                                ${status.text}
                            </span>

                        </div>

                    </div>

                `;

            }



            /* =========================
        GET ALL DATA
        FOR ALL MODE
        ========================= */

        function getAllBuildingReservations() {

            return securityReservations;

        }


       /* =========================
RENDER SECURITY RESERVATIONS
========================= */

function renderSecurityReservations() {

    const container =
        document.getElementById(
            'reservationRows'
        );

    if (!container) {
        return;
    }


    let reservations = [];


    /* =========================
    FILTER GEDUNG
    ========================= */

    if (currentBuildingFilter === 'ALL') {

        reservations =
            [...securityReservations];

    } else {

        reservations =
            securityReservations.filter(
                reservation =>
                    String(
                        reservation.building_code || ''
                    ).toUpperCase() ===
                    currentBuildingFilter
            );
    }


    /* =========================
    FILTER SEARCH
    ========================= */

    if (securitySearchKeyword !== '') {

        reservations =
            reservations.filter(
                reservation => {

                    const searchText = (

                        String(
                            reservation.building_code || ''
                        ) +

                        ' ' +

                        String(
                            reservation.room_name || ''
                        ) +

                        ' ' +

                        String(
                            reservation.nama_event || ''
                        )

                    ).toLowerCase();

                    return searchText.includes(
                        securitySearchKeyword
                    );

                }
            );

    }


    /* =========================
    URUTKAN GEDUNG
    A → B → C → D → F
    ========================= */

    const buildingOrder = {
        'A': 1,
        'B': 2,
        'C': 3,
        'D': 4,
        'F': 5
    };


    reservations.sort((a, b) => {

        const buildingA =
            String(
                a.building_code || ''
            ).toUpperCase();

        const buildingB =
            String(
                b.building_code || ''
            ).toUpperCase();


        const orderA =
            buildingOrder[buildingA] || 99;

        const orderB =
            buildingOrder[buildingB] || 99;


        if (orderA !== orderB) {
            return orderA - orderB;
        }


        return new Date(
            a.start.replace(' ', 'T')
        ) -
        new Date(
            b.start.replace(' ', 'T')
        );

    });


    /* =========================
    TIDAK ADA DATA
    ========================= */

    if (reservations.length === 0) {

        container.innerHTML = `
            <div class="table-row">

                <div
                    style="
                        grid-column:1/-1;
                        text-align:center;
                        padding:25px;
                    "
                >
                    ${
                        securitySearchKeyword !== ''
                            ? 'No reservations found'
                            : (
                                currentBuildingFilter === 'ALL'
                                    ? 'No classroom reservations today'
                                    : 'No reservations for Building ' +
                                      currentBuildingFilter
                              )
                    }
                </div>

            </div>
        `;

        return;
    }


    /* =========================
    RENDER DATA
    ========================= */

    container.innerHTML =
        reservations
            .map(createReservationRow)
            .join('');

}

                
              /* =========================
            SECURITY AUTO SCROLL
            ========================= */

            function startSecurityAutoScroll() {

                stopAllAutoScroll();
                stopBuildingAutoScroll();

                const container =
                    document.getElementById('reservationRows');

                if (!container) {
                    return;
                }


                /* =========================
                AMBIL DATA
                ========================= */

                let reservations =
                    [...securityReservations];


                /* =========================
                FILTER GEDUNG
                ========================= */

                if (
                    currentBuildingFilter !== 'ALL'
                ) {

                    reservations =
                        reservations.filter(
                            reservation =>
                                String(
                                    reservation.building_code || ''
                                ).toUpperCase() ===
                                currentBuildingFilter
                        );

                }


                /* =========================
                FILTER SEARCH
                ========================= */

                if (
                    securitySearchKeyword !== ''
                ) {

                    reservations =
                        reservations.filter(
                            reservation => {

                                const searchText = (

                                    String(
                                        reservation.building_code || ''
                                    ) +

                                    ' ' +

                                    String(
                                        reservation.room_name || ''
                                    ) +

                                    ' ' +

                                    String(
                                        reservation.nama_event || ''
                                    )

                                ).toLowerCase();


                                return searchText.includes(
                                    securitySearchKeyword
                                );

                            }
                        );

                }


                /* =========================
                URUTAN GEDUNG
                A → B → C → D → F
                ========================= */

                const buildingOrder = {

                    'A': 1,
                    'B': 2,
                    'C': 3,
                    'D': 4,
                    'F': 5

                };


                reservations.sort((a, b) => {

                    const buildingA =
                        String(
                            a.building_code || ''
                        ).toUpperCase();


                    const buildingB =
                        String(
                            b.building_code || ''
                        ).toUpperCase();


                    const orderA =
                        buildingOrder[buildingA] || 99;


                    const orderB =
                        buildingOrder[buildingB] || 99;


                    if (
                        orderA !== orderB
                    ) {

                        return orderA - orderB;

                    }


                    return new Date(
                        a.start.replace(' ', 'T')
                    ) -

                    new Date(
                        b.start.replace(' ', 'T')
                    );

                });


                /* =========================
                TIDAK ADA DATA
                ========================= */

                if (
                    reservations.length === 0
                ) {

                    container.innerHTML = `

                        <div class="table-row">

                            <div
                                style="
                                    grid-column:1/-1;
                                    text-align:center;
                                    padding:25px;
                                "
                            >
                                ${
                                    securitySearchKeyword !== ''
                                        ? 'No reservations found'
                                        : (
                                            currentBuildingFilter === 'ALL'
                                                ? 'No classroom reservations today'
                                                : 'No reservations for Building ' +
                                                currentBuildingFilter
                                        )
                                }
                            </div>

                        </div>

                    `;

                    return;

                }


                /* =========================
                JUMLAH KARTU TERLIHAT
                ========================= */

                const visibleItems = 6;


                /* =========================
                DATA <= 6
                TIDAK PERLU CAROUSEL
                ========================= */

                if (
                    reservations.length <=
                    visibleItems
                ) {

                    container.innerHTML =
                        reservations
                            .map(createReservationRow)
                            .join('');

                    return;

                }


                /* =========================
                BUAT TRACK
                ========================= */

                container.innerHTML = `

                    <div class="security-slide-track"></div>

                `;


                const track =
                    container.querySelector(
                        '.security-slide-track'
                    );


                if (!track) {
                    return;
                }


                /* =========================
                RENDER DATA
                ========================= */

                reservations.forEach(
                    reservation => {

                        track.insertAdjacentHTML(
                            'beforeend',
                            createReservationRow(
                                reservation
                            )
                        );

                    }
                );


                /* =========================
                AMBIL ROW ASLI
                ========================= */

                const originalRows =
                    Array.from(
                        track.querySelectorAll(
                            '.table-row'
                        )
                    );


                /* =========================
                CLONE 6 ROW PERTAMA
                UNTUK LOOP
                ========================= */

                const cloneCount =
                    Math.min(
                        visibleItems,
                        originalRows.length
                    );


                for (
                    let i = 0;
                    i < cloneCount;
                    i++
                ) {

                    const clone =
                        originalRows[i].cloneNode(
                            true
                        );


                    clone.classList.add(
                        'security-clone'
                    );


                    track.appendChild(
                        clone
                    );

                }


                /* =========================
                HITUNG UKURAN KARTU
                ========================= */

                const firstRow =
                    track.querySelector(
                        '.table-row'
                    );


                if (!firstRow) {
                    return;
                }


                const rowHeight =
                    firstRow.offsetHeight;


                const rowStyle =
                    window.getComputedStyle(
                        firstRow
                    );


                const rowMargin =
                    parseFloat(
                        rowStyle.marginBottom
                    ) || 0;


                const moveHeight =
                    rowHeight +
                    rowMargin;


                /* =========================
                POSISI AWAL
                ========================= */

                let currentIndex = 0;


                track.style.transition =
                    'none';


                track.style.transform =
                    'translateY(0)';


                void track.offsetHeight;


                /* =========================
                GERAK SATU KARTU
                ========================= */

                function moveSecuritySlide() {

                    currentIndex++;


                    track.style.transition =
                        'transform 0.8s ease-in-out';


                    track.style.transform =
                        `translateY(-${
                            currentIndex *
                            moveHeight
                        }px)`;


                    /* =========================
                    LOOP KE AWAL
                    ========================= */

                    if (
                        currentIndex >=
                        reservations.length
                    ) {

                        setTimeout(() => {

                            track.style.transition =
                                'none';


                            currentIndex = 0;


                            track.style.transform =
                                'translateY(0)';


                            void track.offsetHeight;

                        }, 850);

                    }

                }


                /* =========================
                JALANKAN SETIAP 7 DETIK
                ========================= */

                if (
                    currentBuildingFilter === 'ALL'
                ) {

                    allScrollTimer =
                        setInterval(
                            moveSecuritySlide,
                            7000
                        );

                } else {

                    buildingScrollTimer =
                        setInterval(
                            moveSecuritySlide,
                            7000
                        );

                }

            }


                /* =========================
                STOP ALL AUTO SCROLL
                ========================= */

                function stopAllAutoScroll() {

                    if (allScrollTimer) {

                        clearInterval(
                            allScrollTimer
                        );

                        allScrollTimer = null;

                    }

                }


                /* =========================
                STOP BUILDING AUTO SCROLL
                ========================= */

                function stopBuildingAutoScroll() {

                    if (buildingScrollTimer) {

                        clearInterval(
                            buildingScrollTimer
                        );

                        buildingScrollTimer = null;

                    }

                }

    /* =========================
       BUILDING FILTER
    ========================= */

    document
        .querySelectorAll(
            '.building-filter button'
        )
        .forEach(
            button => {

                button.addEventListener(
                    'click',
                    function () {


                        /*
                         * Hapus active
                         */

                        document
                            .querySelectorAll(
                                '.building-filter button'
                            )
                            .forEach(
                                btn => {

                                    btn.classList.remove(
                                        'active'
                                    );

                                }
                            );


                        /*
                         * Active button
                         */

                        this.classList.add(
                            'active'
                        );


                        /*
                         * Ambil nama gedung
                         */

                        currentBuildingFilter =
                            this
                                .textContent
                                .trim()
                                .toUpperCase();




                        /*
                         * Render data
                         */

                        renderSecurityReservations();

                                
                        startSecurityAutoScroll();
                       
                    }
                );

            }
        );


        /* =========================
        SECURITY SEARCH
        ========================= */

        const securitySearchInput =
            document.getElementById(
                'securitySearch'
            );

        if (securitySearchInput) {

            securitySearchInput.addEventListener(
                'input',
                function () {

                    securitySearchKeyword =
                        this.value
                            .trim()
                            .toLowerCase();

                    renderSecurityReservations();

                    startSecurityAutoScroll();

                }
            );

        }

    /* =========================
       INITIAL LOAD
    ========================= */

    loadSecurityData();


    /* =========================
       AUTO REFRESH DATABASE
       EVERY 90 SECONDS
    ========================= */

    setInterval(
        loadSecurityData,
        90000
    );

</script>


</body>
</html>