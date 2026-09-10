<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reservation Display - Gedung {{ $building->code }}</title>

    <style>
        :root {
            --primary: #06377C;
            --secondary: #2F6FAE;
            --light-blue: #EAF2FA;
            --text: #172033;
            --muted: #667085;
            --border: #D9E1EA;
            --background: #F7F9FC;
            --white: #FFFFFF;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background: var(--background);
            color: var(--text);
        }

        .display-container {
            width: 100%;
            min-height: 100vh;
            padding: 2.5vh 3vw 1.5vh;
            display: flex;
            flex-direction: column;
        }

        /* =========================
           HEADER
        ========================= */

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 2vh;
        }

        .header-left {
            display: flex;
            flex-direction: column;
            gap: 0.5vh;
        }

        .title {
            font-size: clamp(24px, 2.1vw, 40px);
            font-weight: 700;
            color: var(--primary);
            letter-spacing: 0.5px;
        }

        .building {
            font-size: clamp(28px, 2.6vw, 48px);
            font-weight: 700;
            color: var(--text);
        }

        .header-right {
            text-align: right;
        }

        .logo-placeholder {
            width: clamp(100px, 9vw, 180px);
            height: clamp(45px, 5vh, 75px);

            border: 2px dashed var(--border);
            border-radius: 8px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: var(--muted);
            font-size: clamp(12px, 0.8vw, 16px);
            margin-bottom: 1vh;
        }

        .date {
            font-size: clamp(18px, 1.4vw, 28px);
            font-weight: 600;
            color: var(--muted);
        }
        .clock {
            font-size: clamp(22px, 1.8vw, 34px);
            font-weight: 700;
            color: var(--primary);
            margin-top: 0.5vh;
        }

        /* =========================
           ACCENT LINE
        ========================= */

        .accent-line {
            height: 5px;
            width: 100%;
            background: var(--primary);
            border-radius: 5px;
            margin-bottom: 2vh;
        }

        /* =========================
           TABLE
        ========================= */

        .table-wrapper {
            flex: 1;
            width: 100%;
            overflow: hidden;
            background: var(--white);
            border-radius: 10px;
            border: 1px solid var(--border);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        thead {
            background: var(--primary);
            color: var(--white);
        }

        th {
            padding: 1.5vh 0.8vw;
            font-size: clamp(16px, 1.25vw, 25px);
            font-weight: 700;
            text-align: left;
            white-space: nowrap;
        }

        td {
            padding: 1.45vh 0.8vw;
            border-bottom: 1px solid var(--border);
            font-size: clamp(16px, 1.15vw, 23px);
            line-height: 1.25;
            vertical-align: middle;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        tbody tr:nth-child(even) {
            background: #F9FBFD;
        }

        tbody tr:hover {
            background: var(--light-blue);
        }

        /* Lebar kolom */

        th:nth-child(1),
        td:nth-child(1) {
            width: 4%;
            text-align: center;
        }

        th:nth-child(2),
        td:nth-child(2) {
            width: 23%;
        }

        th:nth-child(3),
        td:nth-child(3) {
            width: 17%;
        }

        th:nth-child(4),
        td:nth-child(4) {
            width: 9%;
        }

        th:nth-child(5),
        td:nth-child(5) {
            width: 15%;
        }

        th:nth-child(6),
        td:nth-child(6) {
            width: 10%;
            text-align: center;
        }

        th:nth-child(7),
        td:nth-child(7),
        th:nth-child(8),
        td:nth-child(8) {
            width: 11%;
            text-align: center;
        }

        .room {
            font-weight: 700;
            color: var(--primary);
        }

        .participant {
            font-weight: 700;
        }

        .time {
            white-space: nowrap;
            font-weight: 600;
        }

        .empty {
            text-align: center;
            padding: 6vh 2vw;
            font-size: clamp(20px, 1.5vw, 30px);
            color: var(--muted);
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1.2vh;
            color: var(--muted);
            font-size: clamp(13px, 0.85vw, 17px);
        }

        /* =========================
           SMALL SCREEN
        ========================= */

        @media (max-width: 1000px) {
            .display-container {
                padding: 20px;
            }

            .table-wrapper {
                overflow-x: auto;
            }

            table {
                min-width: 1100px;
            }
        }
    </style>
</head>

<body>

<div class="display-container">

    {{-- =========================
         HEADER
    ========================== --}}

    <header class="header">

        <div class="header-left">

            <div class="title">
                RESERVATION DISPLAY
            </div>

            <div class="building">
                GEDUNG {{ $building->code }}
            </div>

        </div>

        <div class="header-right">

            {{-- Logo sementara --}}
            <div class="logo-placeholder">
                LOGO
            </div>

            <div class="date">
                {{ now()->format('d F Y') }}
            </div>
            <div class="clock" id="clock">
                00:00:00 WIB
            </div>

        </div>

    </header>


    {{-- Garis aksen corporate --}}
    <div class="accent-line"></div>


    {{-- =========================
         RESERVATION TABLE
    ========================== --}}

    <div class="table-wrapper">

        <table>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Course Name</th>
                    <th>Subject</th>
                    <th>Class</th>
                    <th>Instructor</th>
                    <th>Participant</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($reservations as $index => $reservation)

                    <tr>

                        <td>
                            {{ $index + 1 }}
                        </td>

                        <td>
                            {{ $reservation->course_name }}
                        </td>

                        <td>
                            {{ $reservation->subject ?? '-' }}
                        </td>

                        <td class="room">
                            {{ $reservation->room->name }}
                        </td>

                        <td>
                            {{ $reservation->instructor ?? '-' }}
                        </td>

                        <td class="participant">
                            {{ $reservation->expected_participants }}
                        </td>

                        <td class="time">
                            {{ \Carbon\Carbon::parse($reservation->start_at)->format('H:i') }} WIB
                        </td>

                        <td class="time">
                            {{ \Carbon\Carbon::parse($reservation->end_at)->format('H:i') }} WIB
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="8" class="empty">
                            Tidak ada reservation untuk hari ini.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    {{-- =========================
         FOOTER
    ========================== --}}

    <footer class="footer">

        <div>
            Reservation Display System
        </div>

        <div>
            Last updated: {{ now()->format('H:i') }} WIB
        </div>

    </footer>

</div>

        <script>
            function updateClock() {
                const now = new Date();

                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                const seconds = String(now.getSeconds()).padStart(2, '0');

                document.getElementById('clock').textContent =
                    `${hours}:${minutes}:${seconds} WIB`;
            }

            updateClock();

            setInterval(updateClock, 1000);

            setInterval(() => {
                window.location.reload();
            }, 60000);
        </script>


        {{-- Auto refresh setiap 1 menit --}}
        <script>
            setInterval(() => {
                window.location.reload();
            }, 60000);
        </script>

</body>
</html>