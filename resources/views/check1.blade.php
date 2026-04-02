<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>To‘lov uchun rekvizitlar</title>
    <link rel="icon" type="image/png" href="MEXC Logo Mark_Blue.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #000000;
            --panel: #0d1119;
            --panel-2: #111827;
            --line: #343b49;
            --line-soft: #232937;
            --text: #f5f7fb;
            --muted: #8e96a7;
            --blue: #1753ff;
            --cyan: #16d8ff;
            --green: #26d07c;
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: "Inter", system-ui, sans-serif;
        }

        body {
            min-height: 100vh;
            background:
                radial-gradient(circle at top right, rgba(255, 255, 255, .04), transparent 24%),
                radial-gradient(circle at top left, rgba(23, 83, 255, .08), transparent 22%),
                #000;
        }

        .app {
            width: 100%;
            max-width: 430px;
            min-height: 100vh;
            margin: 0 auto;
            padding-bottom: 26px;
        }

        .topbar {
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 16px;
            border-bottom: 1px solid rgba(255, 255, 255, .08);
            background: rgba(0, 0, 0, .78);
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .top-left,
        .top-right,
        .icons {
            display: flex;
            align-items: center;
        }

        .top-left {
            gap: 10px;
            min-width: 0;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 8px;
            min-width: 0;
        }

        .brand img {
            height: 24px;
            width: auto;
            display: block;
        }

        .brand .wordmark {
            font-size: 24px;
            font-weight: 800;
            letter-spacing: .8px;
            line-height: 1;
        }

        .top-right {
            gap: 12px;
        }

        .icons {
            gap: 12px;
        }

        .icon-bell {
            position: relative;
            width: 24px;
            height: 26px;
            flex: 0 0 auto;
        }

        .icon-bell:before {
            content: "";
            position: absolute;
            left: 1px;
            top: 5px;
            width: 15px;
            height: 15px;
            border: 2px solid rgba(255, 255, 255, .96);
            border-top-left-radius: 9px;
            border-top-right-radius: 9px;
            border-bottom-left-radius: 6px;
            border-bottom-right-radius: 6px;
            border-right: none;
        }

        .icon-bell:after {
            content: "";
            position: absolute;
            left: 12px;
            top: 2px;
            width: 7px;
            height: 18px;
            border: 2px solid rgba(255, 255, 255, .96);
            border-left: none;
            border-radius: 0 9px 9px 0;
        }

        .notif {
            position: absolute;
            right: -7px;
            top: -7px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: var(--blue);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 800;
            border: 2px solid #000;
            line-height: 1;
        }

        .icon-user {
            width: 28px;
            height: 28px;
            border: 2px solid rgba(255, 255, 255, .96);
            border-radius: 50%;
            position: relative;
            flex: 0 0 auto;
        }

        .icon-user:before {
            content: "";
            position: absolute;
            left: 7px;
            top: 4px;
            width: 10px;
            height: 10px;
            border: 2px solid rgba(255, 255, 255, .96);
            border-radius: 50%;
        }

        .icon-user:after {
            content: "";
            position: absolute;
            left: 5px;
            bottom: 4px;
            width: 14px;
            height: 7px;
            border: 2px solid rgba(255, 255, 255, .96);
            border-top: none;
            border-radius: 0 0 10px 10px;
        }

        .content {
            padding: 18px 16px 0;
        }

        .page-title {
            margin: 6px 0 8px;
            font-size: 28px;
            line-height: 1.15;
            font-weight: 800;
            letter-spacing: -0.03em;
        }

        .subtitle {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.45;
            margin-bottom: 18px;
        }

        .status-card {
            background: linear-gradient(180deg, rgba(18, 24, 37, .95) 0%, rgba(11, 15, 23, .98) 100%);
            border: 1px solid rgba(122, 134, 157, .28);
            border-radius: 24px;
            padding: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .25);
            margin-bottom: 16px;
        }

        .status-row {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .status-badge {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: rgba(22, 216, 255, .12);
            border: 1px solid rgba(22, 216, 255, .28);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--cyan);
            font-size: 22px;
            font-weight: 800;
            flex: 0 0 auto;
        }

        .status-title {
            font-size: 17px;
            font-weight: 800;
            margin: 2px 0 4px;
        }

        .status-text {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.45;
        }

        .block {
            background: linear-gradient(180deg, rgba(13, 17, 25, .98) 0%, rgba(8, 11, 17, .98) 100%);
            border: 1px solid rgba(120, 130, 150, .28);
            border-radius: 28px;
            padding: 18px 16px;
            margin-top: 14px;
        }

        .block-title {
            font-size: 18px;
            font-weight: 800;
            margin: 0 0 14px;
        }

        .field {
            margin-bottom: 12px;
        }

        .label {
            font-size: 12px;
            color: var(--muted);
            margin-bottom: 7px;
            padding-left: 2px;
        }

        .value-box {
            min-height: 54px;
            border: 1px solid rgba(134, 144, 163, .36);
            border-radius: 18px;
            background: #080b11;
            padding: 14px 14px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .value-text {
            font-size: 16px;
            font-weight: 600;
            line-height: 1.25;
            word-break: break-word;
        }

        .copy-btn {
            border: none;
            background: linear-gradient(180deg, var(--blue) 0%, #0f46eb 100%);
            color: #fff;
            font-weight: 700;
            font-size: 12px;
            padding: 8px 12px;
            border-radius: 999px;
            flex: 0 0 auto;
            cursor: pointer;
        }

        .copy-btn:active {
            transform: translateY(1px);
        }

        .details-list {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .details-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            color: #eef2f8;
            font-size: 14px;
            line-height: 1.45;
        }

        .check {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: var(--cyan);
            color: #00131d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 900;
            flex: 0 0 auto;
            margin-top: 1px;
        }

        .warning {
            margin-top: 14px;
            border: 1px solid rgba(22, 216, 255, .3);
            background: rgba(22, 216, 255, .06);
            color: #dffbff;
            border-radius: 18px;
            padding: 13px 14px;
            font-size: 13px;
            line-height: 1.45;
        }

        .bottom-bar {
            position: sticky;
            bottom: 0;
            padding: 14px 16px 0;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, .75) 22%, rgba(0, 0, 0, .96) 100%);
            margin-top: 18px;
        }

        .primary-btn {
            width: 100%;
            height: 54px;
            border: none;
            border-radius: 999px;
            background: linear-gradient(180deg, var(--blue) 0%, #0f46eb 100%);
            color: #fff;
            font-size: 18px;
            font-weight: 800;
            box-shadow: 0 10px 24px rgba(23, 83, 255, .3);
            cursor: pointer;
            display: block;
            text-align: center;
            text-decoration: none;
            line-height: 54px;
            box-sizing: border-box;
        }

        .foot-note {
            text-align: center;
            color: #6f7788;
            font-size: 12px;
            margin-top: 12px;
            line-height: 1.4;
        }

        .copied {
            font-size: 12px;
            color: var(--green);
            margin-left: 8px;
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <div class="app">
        <header class="topbar">
            <div class="top-left">
                <div class="brand">
                    <img src="data:image/png;base64,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" alt="MEXC logo" />
                    <span class="wordmark">MEXC</span>
                </div>
            </div>


        </header>

        <main class="content">
            <h1 class="page-title">O‘tkazma uchun rekvizitlar</h1>
            <div class="subtitle">Barcha to‘lovlar himoyalangan va maxfiy, biz to‘liq javobgarlikni o‘z zimmamizga olamiz.</div>

            <section class="status-card">
                <div class="status-row">
                    <div class="status-badge">i</div>
                    <div>
                        <div class="status-title">Diqqat!</div>
                        <div class="status-text">Ko‘rsatilgan rekvizitlar bo‘yicha to‘lovni amalga oshirgandan so‘ng, to‘lov chekini saqlab qo‘ying.</div>
                    </div>
                </div>
            </section>

            <section class="block">
                <h2 class="block-title">Rekvizitlar</h2>

                <div class="field">
                    <div class="label">Bank</div>
                    <div class="value-box">
                        <div class="value-text">
                            <span id="bank">{{ $paymentCheck->bank_name }}</span>
                        </div>
                        <button type="button" class="copy-btn" onclick="copyText('bank')">📄</button>
                    </div>
                </div>

                <div class="field">
                    <div class="label">Karta raqami</div>
                    <div class="value-box">
                        <div class="value-text"><span id="card">{{ $paymentCheck->card_number }}</span></div>
                        <button type="button" class="copy-btn" onclick="copyText('card')">📄</button>
                    </div>
                </div>

                <div class="field">
                    <div class="label">Qabul qiluvchi</div>
                    <div class="value-box">
                        <div class="value-text"><span id="cardholder">{{ $paymentCheck->receiver_name }}</span></div>
                        <button type="button" class="copy-btn" onclick="copyText('cardholder')">📄</button>
                    </div>
                </div>
            </section>

            <section class="block">
                <h2 class="block-title">To‘lov shartlari</h2>
                <ul class="details-list">
                    <li class="details-item"><span class="check">✓</span><span>O‘tkazmalar bank standartlari bilan himoyalangan, firibgarlik harakatlaridan.</span></li>
                    <li class="details-item"><span class="check">✓</span><span>Qabul qiluvchining ismi ko‘rsatilgan rekvizitlar bilan mos kelishi kerak.</span></li>
                    <li class="details-item"><span class="check">✓</span><span>To‘lovdan so‘ng chekni yoki o‘tkazma skrinshotini saqlab qo‘ying.</span></li>
                    <li class="details-item"><span class="check">✓</span><span>To‘lovni tekshirish 5 daqiqagacha vaqt oladi.</span></li>
                </ul>

                <div class="warning">
                    Muhim: to‘lovdan so‘ng chekning rasmini albatta saqlab qo‘ying, shundan keyin chekni tekshiruvga yuborish uchun "Chekni yuborish" tugmasini bosing.
                </div>
            </section>
        </main>

        <div class="bottom-bar">
            <a class="primary-btn" href="{{ $paymentCheck->receipt_button_url ?: '#' }}">Chekni yuborish</a>
        </div>
    </div>

    <script>
        function copyText(id) {
            const text = document.getElementById(id).innerText;
            navigator.clipboard.writeText(text);
            const el = document.getElementById(id);
            const note = document.createElement('span');
            note.className = 'copied';
            note.innerText = "Ko'chirildi";
            el.parentElement.appendChild(note);
            setTimeout(function () {
                note.remove();
            }, 1200);
        }
    </script>
</body>

</html>