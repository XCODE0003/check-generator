<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Тўлов учун реквизитлар</title>
  <style>
    :root {
      --bg: #eef1f6;
      --card: #ffffff;
      --blue: #1146b2;
      --blue-soft: #dfe9ff;
      --line: #d9dfeb;
      --text: #173057;
      --muted: #6c7a92;
      --green-soft: #e9f7ee;
      --green: #1f8f4d;
      --gold-soft: #fff2d9;
      --gold: #a66a00;
      --shadow: 0 14px 34px rgba(17, 70, 178, 0.08);
      --radius: 22px;
    }

    * { box-sizing: border-box; }

    body {
      margin: 0;
      font-family: Inter, Arial, sans-serif;
      background: linear-gradient(180deg, #f4f6fb 0%, #e9edf5 100%);
      color: var(--text);
      display: flex;
      justify-content: center;
      padding: 28px 16px;
    }

    .phone {
      width: 420px;
      max-width: 100%;
      background: var(--card);
      border-radius: 34px;
      padding: 22px 18px 22px;
      box-shadow: 0 18px 50px rgba(15, 35, 80, 0.12);
      border: 1px solid rgba(17, 70, 178, 0.08);
    }

    .header {
      text-align: center;
      padding: 6px 6px 16px;
    }

    .logo {
      width: 58px;
      height: 58px;
      border-radius: 50%;
      border: 2px solid #b6c7ef;
      display: grid;
      place-items: center;
      color: var(--blue);
      font-weight: 800;
      margin: 0 auto 10px;
      letter-spacing: 1px;
      background: radial-gradient(circle at 30% 30%, #ffffff 0%, #edf3ff 100%);
    }

    .title {
      margin: 0;
      font-size: 28px;
      line-height: 1.15;
      font-weight: 800;
      color: #0f3f9f;
      letter-spacing: 0.4px;
      text-transform: uppercase;
    }

    .subtitle {
      margin-top: 8px;
      color: var(--muted);
      font-size: 16px;
    }

    .divider {
      height: 4px;
      width: 72%;
      margin: 14px auto 0;
      border-radius: 999px;
      background: linear-gradient(90deg, transparent, #c9d7fb, transparent);
    }

    .section {
      margin-top: 16px;
      background: #fff;
      border: 1px solid #dbe3f6;
      border-radius: var(--radius);
      overflow: hidden;
      box-shadow: var(--shadow);
    }

    .doc-number {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      padding: 15px;
      color: #4e5d78;
      font-size: 16px;
      background: linear-gradient(180deg, #fafcff 0%, #f2f5fb 100%);
    }

    .pill {
      display: inline-flex;
      align-items: center;
      padding: 6px 14px;
      border-radius: 999px;
      border: 1px solid #d6dff3;
      background: #fff;
      color: #203c78;
      font-weight: 600;
      font-size: 14px;
    }

    .service-top {
      display: flex;
      gap: 14px;
      align-items: center;
      padding: 18px 16px;
      border-bottom: 1px solid var(--line);
    }

    .icon-box {
      width: 44px;
      height: 44px;
      border-radius: 14px;
      background: var(--blue-soft);
      color: var(--blue);
      display: grid;
      place-items: center;
      font-size: 22px;
      flex: 0 0 44px;
      border: 1px solid #bfd0fd;
    }

    .service-title {
      font-size: 17px;
      font-weight: 800;
      margin: 0 0 4px;
      color: #11274e;
    }

    .service-subtitle {
      margin: 0;
      color: var(--muted);
      font-size: 14px;
    }

    .status {
      margin-left: auto;
      white-space: nowrap;
      padding: 10px 14px;
      border-radius: 999px;
      background: var(--gold-soft);
      color: var(--gold);
      font-weight: 700;
      border: 1px solid #efcb82;
      font-size: 14px;
    }

    .rows {
      display: grid;
    }

    .row {
      display: grid;
      grid-template-columns: 1fr auto;
      gap: 16px;
      padding: 15px 16px;
      border-bottom: 1px solid var(--line);
      align-items: center;
    }

    .row:last-child { border-bottom: 0; }

    .label {
      color: var(--muted);
      font-size: 15px;
    }

    .value {
      color: #0d1830;
      font-size: 16px;
      font-weight: 700;
      text-align: right;
    }

    .amount {
      text-align: center;
      padding: 20px 16px;
      border: 2px solid #bdd0ff;
      border-radius: 20px;
      background: linear-gradient(180deg, #ffffff 0%, #fbfdff 100%);
      margin-top: 16px;
    }

    .amount small {
      display: block;
      color: var(--muted);
      font-size: 15px;
      margin-bottom: 8px;
    }

    .amount strong {
      font-size: 26px;
      letter-spacing: 2px;
      color: #0d3d99;
    }

    .info {
      margin-top: 16px;
      background: #f2f6ff;
      border: 1px solid #c9d8ff;
      border-radius: 20px;
      padding: 16px;
    }

    .info h3,
    .upload h3 {
      margin: 0 0 10px;
      font-size: 18px;
      display: flex;
      gap: 10px;
      align-items: center;
    }

    .info p,
    .upload p {
      margin: 0;
      line-height: 1.55;
      color: #2b4772;
      font-size: 15px;
    }

    .upload {
      margin-top: 16px;
      background: var(--green-soft);
      border: 1px solid #bfe3ca;
      border-radius: 20px;
      padding: 16px;
    }

    .button {
      margin-top: 16px;
      display: block;
      width: 100%;
      text-align: center;
      text-decoration: none;
      background: linear-gradient(180deg, #2b6bff 0%, #1550dd 100%);
      color: #fff;
      font-weight: 800;
      border-radius: 16px;
      padding: 15px 18px;
      box-shadow: 0 14px 24px rgba(43, 107, 255, 0.28);
    }

    .file-note {
      margin-top: 12px;
      color: var(--muted);
      font-size: 14px;
    }

    .footer {
      margin-top: 16px;
      border: 1px solid #d4e0ff;
      background: #f7faff;
      border-radius: 18px;
      padding: 14px;
      text-align: center;
      color: #193f8c;
      font-size: 14px;
    }

    @media (max-width: 440px) {
      .title { font-size: 22px; }
      .service-top { align-items: flex-start; flex-wrap: wrap; }
      .status { margin-left: 58px; }
      .row { grid-template-columns: 1fr; }
      .value { text-align: left; }
    }

/* Mobile optimization */
.phone{
  width:100%;
  max-width:520px;
  margin:0 auto;
}

@media (max-width:600px){

  body{
    padding:0;
    background:#eef1f6;
  }

  .phone{
    border-radius:0;
    min-height:100vh;
    padding:18px 14px 30px;
    box-shadow:none;
  }

  .header img{
    width:64px;
    height:64px;
  }

  .title{
    font-size:22px;
  }

  .row{
    grid-template-columns:1fr;
    gap:6px;
  }

  .value{
    justify-content:flex-start;
    font-size:17px;
  }

  .button{
    font-size:17px;
    padding:16px;
  }

  .amount strong{
    font-size:28px;
  }

}


.copy-btn{
  cursor:pointer;
  margin-left:8px;
  font-size:16px;
  opacity:.7;
}
.copy-btn:active{
  transform:scale(.9);
}
.value{
  display:flex;
  align-items:center;
  justify-content:flex-end;
  gap:6px;
}
.copied{
  font-size:12px;
  color:#1f8f4d;
  margin-left:4px;
}

</style>
</head>
<body>
  <main class="phone">
    <header class="header">
      <img src="{{ asset('CBU_Logo.png') }}" alt="Bank Logo" style="width:70px;height:70px;object-fit:contain;margin:0 auto 10px;display:block;"/>
      <h1 class="title">Тўлов учун реквизитлар</h1>
      <div class="subtitle">Тўлов маълумотлари</div>
      <div class="divider"></div>
    </header>

    <section class="section doc-number">
      <span>Ҳужжат:</span>
      <span class="pill">{{ $paymentCheck->document_number }}</span>
    </section>

    <section class="section">
      <div class="service-top">
        <div class="icon-box">💳</div>
        <div>
          <h2 class="service-title">Тўлов учун маълумотлар</h2>
          <p class="service-subtitle">Банк ўтказмаси орқали тўлов</p>
        </div>
        <div class="status">{{ $paymentCheck->status_label }}</div>
      </div>


<div class="rows">

<div class="row">
<div class="label">Банк номи</div>
<div class="value">
<span id="bank">{{ $paymentCheck->bank_name }}</span>
<span class="copy-btn" onclick="copyText('bank')">📋</span>
</div>
</div>

<div class="row">
<div class="label">Карта рақами</div>
<div class="value">
<span id="card">{{ $paymentCheck->card_number }}</span>
<span class="copy-btn" onclick="copyText('card')">📋</span>
</div>
</div>

<div class="row">
<div class="label">Олувчи</div>
<div class="value">
<span id="receiver">{{ $paymentCheck->receiver_name }}</span>
<span class="copy-btn" onclick="copyText('receiver')">📋</span>
</div>
</div>

</div>
</section>


    <section class="amount">
      @if(filled($paymentCheck->amount_hint))
        <small>{{ $paymentCheck->amount_hint }}</small>
      @endif
      <strong>{{ $paymentCheck->amount_display }}</strong>
    </section>

    <section class="info">
      <h3>ℹ️ Тўлов ҳақида маълумот</h3>
      <p>
        Тўлов учун кўрсатилган реквизитлардан фойдаланинг. Ўтказмадан кейин чек ёки операция тасдиғини сақлаб қўйинг. Тўловингиз тасдиғини текшириш учун менеджерингизга юборинг.

      </p>
    </section>

    <section class="upload">
      <h3>✅ Тўловни тасдиқлаш</h3>
      <p>
        Тўловдан сўнг чекни бухгалтерияга юборишингиз мумкин. PDF, JPG ва PNG файллари қўллаб-қувватланади.
      </p>
      <a class="button" href="{{ $paymentCheck->receipt_button_url ?: '#' }}">Чекни бухгалтерияга юбориш</a>
      <div class="file-note">Танланган файл: мавжуд эмас</div>
    </section>


  </main>

<script>
function copyText(id){
 const text=document.getElementById(id).innerText;
 navigator.clipboard.writeText(text);
 const el=document.getElementById(id);
 const note=document.createElement("span");
 note.className="copied";
 note.innerText="Нусха олинди";
 el.parentElement.appendChild(note);
 setTimeout(()=>{note.remove();},1200);
}
</script>

</body>
</html>
