<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<title>حاسبة مصنع الزبادي</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;900&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<style>
:root {
  --cream: #faf7f2;
  --ivory: #f2ede4;
  --teal: #0d6e6e;
  --teal-light: #1a8f8f;
  --teal-dark: #084f4f;
  --gold: #c8952a;
  --gold-light: #e8b84b;
  --milk: #ffffff;
  --text: #1a1a2e;
  --text-muted: #6b7280;
  --border: rgba(13,110,110,0.15);
  --shadow: 0 8px 32px rgba(13,110,110,0.12);
  --card-bg: rgba(255,255,255,0.85);
  --radius: 16px;
}

* { margin:0; padding:0; box-sizing:border-box; }

body {
  font-family: 'Cairo', sans-serif;
  background: var(--cream);
  color: var(--text);
  min-height: 100vh;
  overflow-x: hidden;
}

/* ─── Animated background ─── */
body::before {
  content: '';
  position: fixed;
  inset: 0;
  background:
    radial-gradient(ellipse 60% 50% at 20% 20%, rgba(13,110,110,0.08) 0%, transparent 60%),
    radial-gradient(ellipse 50% 60% at 80% 80%, rgba(200,149,42,0.07) 0%, transparent 60%),
    radial-gradient(ellipse 40% 40% at 50% 50%, rgba(13,110,110,0.04) 0%, transparent 70%);
  pointer-events: none;
  z-index: 0;
}

/* ─── Floating drops ─── */
.drops {
  position: fixed;
  inset: 0;
  pointer-events: none;
  z-index: 0;
  overflow: hidden;
}
.drop {
  position: absolute;
  border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
  background: linear-gradient(135deg, rgba(255,255,255,0.6), rgba(13,110,110,0.1));
  animation: floatDrop linear infinite;
  opacity: 0;
}
.drop:nth-child(1) { width:8px; height:10px; left:10%; animation-duration:12s; animation-delay:0s; }
.drop:nth-child(2) { width:5px; height:7px; left:25%; animation-duration:15s; animation-delay:3s; }
.drop:nth-child(3) { width:10px; height:13px; left:50%; animation-duration:10s; animation-delay:1s; }
.drop:nth-child(4) { width:6px; height:8px; left:70%; animation-duration:14s; animation-delay:5s; }
.drop:nth-child(5) { width:7px; height:9px; left:85%; animation-duration:11s; animation-delay:2s; }
.drop:nth-child(6) { width:4px; height:6px; left:40%; animation-duration:16s; animation-delay:7s; }

@keyframes floatDrop {
  0%   { transform: translateY(110vh) rotate(0deg); opacity:0; }
  5%   { opacity:0.4; }
  90%  { opacity:0.3; }
  100% { transform: translateY(-10vh) rotate(20deg); opacity:0; }
}

/* ─── Main layout ─── */
.app {
  position: relative;
  z-index: 1;
  max-width: 960px;
  margin: 0 auto;
  padding: 16px;
}

/* ─── Header ─── */
.header {
  text-align: center;
  padding: 20px 0 16px;
  animation: slideDown 0.6s ease;
}
@keyframes slideDown {
  from { opacity:0; transform:translateY(-20px); }
  to   { opacity:1; transform:translateY(0); }
}
.header-icon {
  font-size: 2.8rem;
  line-height: 1;
  margin-bottom: 4px;
  filter: drop-shadow(0 4px 12px rgba(13,110,110,0.3));
  animation: pulse 3s ease-in-out infinite;
}
@keyframes pulse {
  0%,100% { transform: scale(1); }
  50%      { transform: scale(1.05); }
}
.header h1 {
  font-size: clamp(1.4rem, 4vw, 2rem);
  font-weight: 900;
  background: linear-gradient(135deg, var(--teal-dark), var(--teal-light), var(--gold));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  letter-spacing: -0.5px;
}
.header p {
  font-size: 0.8rem;
  color: var(--text-muted);
  margin-top: 2px;
}

/* ─── Grid layout ─── */
.grid-2 {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 14px;
  margin-bottom: 14px;
}
@media (max-width: 640px) {
  .grid-2 { grid-template-columns: 1fr; }
}

/* ─── Cards ─── */
.card {
  background: var(--card-bg);
  backdrop-filter: blur(20px);
  border: 1px solid var(--border);
  border-radius: var(--radius);
  padding: 16px;
  box-shadow: var(--shadow);
  animation: fadeUp 0.5s ease both;
  transition: transform 0.2s, box-shadow 0.2s;
}
.card:hover { transform: translateY(-2px); box-shadow: 0 12px 40px rgba(13,110,110,0.16); }

@keyframes fadeUp {
  from { opacity:0; transform:translateY(16px); }
  to   { opacity:1; transform:translateY(0); }
}
.card:nth-child(1) { animation-delay:0.1s; }
.card:nth-child(2) { animation-delay:0.2s; }
.card:nth-child(3) { animation-delay:0.15s; }
.card:nth-child(4) { animation-delay:0.25s; }

.card-title {
  font-size: 0.75rem;
  font-weight: 700;
  color: var(--teal);
  text-transform: uppercase;
  letter-spacing: 1px;
  margin-bottom: 12px;
  display: flex;
  align-items: center;
  gap: 6px;
}
.card-title span { font-size: 1rem; }

/* ─── Input groups ─── */
.input-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 8px;
  margin-bottom: 8px;
}
.input-row.full { grid-template-columns: 1fr; }

.field {
  display: flex;
  flex-direction: column;
  gap: 3px;
}
.field label {
  font-size: 0.68rem;
  font-weight: 600;
  color: var(--text-muted);
}
.field input {
  font-family: 'Cairo', sans-serif;
  font-size: 0.85rem;
  font-weight: 600;
  color: var(--text);
  background: var(--ivory);
  border: 1.5px solid var(--border);
  border-radius: 10px;
  padding: 7px 10px;
  text-align: center;
  transition: all 0.2s;
  direction: ltr;
}
.field input:focus {
  outline: none;
  border-color: var(--teal);
  background: #fff;
  box-shadow: 0 0 0 3px rgba(13,110,110,0.1);
}
.field input.highlight {
  background: rgba(13,110,110,0.06);
  border-color: rgba(13,110,110,0.3);
}

/* ─── Buttons ─── */
.btn-row {
  display: flex;
  gap: 8px;
  margin-top: 12px;
}
.btn {
  flex: 1;
  padding: 10px 14px;
  font-family: 'Cairo', sans-serif;
  font-size: 0.85rem;
  font-weight: 700;
  border: none;
  border-radius: 12px;
  cursor: pointer;
  transition: all 0.2s;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 5px;
}
.btn-primary {
  background: linear-gradient(135deg, var(--teal), var(--teal-light));
  color: #fff;
  box-shadow: 0 4px 16px rgba(13,110,110,0.3);
}
.btn-primary:hover { transform:translateY(-1px); box-shadow: 0 6px 24px rgba(13,110,110,0.4); }
.btn-primary:active { transform:translateY(0); }
.btn-gold {
  background: linear-gradient(135deg, var(--gold), var(--gold-light));
  color: #fff;
  box-shadow: 0 4px 16px rgba(200,149,42,0.3);
}
.btn-gold:hover { transform:translateY(-1px); }

/* ─── Results ─── */
.results-section {
  animation: fadeUp 0.5s ease both;
  animation-delay: 0.1s;
}
.results-hidden { display:none; }

/* Big summary row */
.summary-row {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 10px;
  margin-bottom: 14px;
}
@media (max-width: 480px) {
  .summary-row { grid-template-columns: repeat(2, 1fr); }
  .summary-row .span-full { grid-column: 1 / -1; }
}

.stat-card {
  background: var(--card-bg);
  backdrop-filter: blur(20px);
  border: 1px solid var(--border);
  border-radius: var(--radius);
  padding: 14px 10px;
  text-align: center;
  box-shadow: var(--shadow);
  transition: transform 0.2s;
}
.stat-card:hover { transform: scale(1.02); }
.stat-card.accent {
  background: linear-gradient(135deg, var(--teal), var(--teal-light));
  border-color: var(--teal);
  color: #fff;
}
.stat-card.gold-accent {
  background: linear-gradient(135deg, var(--gold-dark, #9a6f1a), var(--gold));
  border-color: var(--gold);
  color: #fff;
}
.stat-label {
  font-size: 0.65rem;
  font-weight: 600;
  opacity: 0.7;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  margin-bottom: 4px;
}
.stat-value {
  font-size: clamp(1.1rem, 3vw, 1.5rem);
  font-weight: 900;
  line-height: 1;
}
.stat-unit {
  font-size: 0.65rem;
  opacity: 0.7;
  margin-top: 2px;
}

/* Results detail grid */
.result-detail-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 10px;
}
@media (max-width: 480px) {
  .result-detail-grid { grid-template-columns: 1fr; }
}

.result-item {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 7px 0;
  border-bottom: 1px solid rgba(13,110,110,0.08);
  font-size: 0.82rem;
}
.result-item:last-child { border-bottom: none; }
.result-item .ri-label { color: var(--text-muted); font-weight: 600; }
.result-item .ri-value { font-weight: 700; color: var(--text); }
.result-item .ri-value.green { color: var(--teal); }
.result-item .ri-value.gold { color: var(--gold); }

/* ─── Save button area ─── */
.save-area {
  text-align: center;
  margin-top: 14px;
  padding-bottom: 20px;
}

/* ─── Snapshot overlay ─── */
.snapshot-card {
  display: none;
  position: fixed;
  inset: 0;
  z-index: 999;
  background: rgba(0,0,0,0.7);
  backdrop-filter: blur(4px);
  align-items: center;
  justify-content: center;
  padding: 16px;
}
.snapshot-card.open { display:flex; }
.snapshot-inner {
  background: #fff;
  border-radius: 20px;
  padding: 20px;
  max-width: 420px;
  width: 100%;
  max-height: 90vh;
  overflow-y: auto;
}
.snapshot-inner img { width:100%; border-radius:12px; }
.snapshot-btns { display:flex; gap:8px; margin-top:12px; }
.btn-close {
  flex:1; padding:10px; font-family:'Cairo',sans-serif; font-size:0.85rem;
  font-weight:700; border:2px solid var(--teal); background:transparent;
  color:var(--teal); border-radius:12px; cursor:pointer;
}

/* ─── Loading spinner ─── */
.spinner {
  display:none;
  width:20px; height:20px;
  border:2px solid rgba(255,255,255,0.3);
  border-top-color:#fff;
  border-radius:50%;
  animation: spin 0.8s linear infinite;
}
@keyframes spin { to { transform:rotate(360deg); } }

/* ─── Number animation ─── */
@keyframes countUp {
  from { opacity:0; transform:scale(0.8); }
  to   { opacity:1; transform:scale(1); }
}
.animate-val { animation: countUp 0.4s ease; }

/* ─── Divider ─── */
.divider {
  height: 1px;
  background: linear-gradient(90deg, transparent, var(--teal-light), transparent);
  margin: 14px 0;
  opacity: 0.3;
}

/* ─── mode toggle ─── */
.mode-toggle {
  display: flex;
  background: var(--ivory);
  border-radius: 10px;
  padding: 3px;
  gap: 3px;
  margin-bottom: 12px;
}
.mode-btn {
  flex:1; padding:7px; font-family:'Cairo',sans-serif; font-size:0.75rem;
  font-weight:700; border:none; border-radius:8px; cursor:pointer;
  transition:all 0.2s; background:transparent; color:var(--text-muted);
}
.mode-btn.active { background:#fff; color:var(--teal); box-shadow:0 2px 8px rgba(0,0,0,0.08); }

/* ─── Capture area ─── */
#capture-area {
  background: linear-gradient(135deg, #0d6e6e 0%, #084f4f 100%);
  border-radius: 20px;
  padding: 24px;
  color: #fff;
  min-width: 320px;
}
#capture-area .cap-header { text-align:center; margin-bottom:16px; }
#capture-area .cap-logo { font-size:2rem; margin-bottom:4px; }
#capture-area .cap-title { font-size:1.1rem; font-weight:900; }
#capture-area .cap-date { font-size:0.7rem; opacity:0.6; margin-top:2px; }
#capture-area .cap-row {
  display:flex; justify-content:space-between; align-items:center;
  padding:7px 0; border-bottom:1px solid rgba(255,255,255,0.1);
  font-size:0.82rem;
}
#capture-area .cap-row:last-child { border-bottom:none; }
#capture-area .cap-label { opacity:0.7; }
#capture-area .cap-val { font-weight:700; }
#capture-area .cap-section { margin-bottom:14px; }
#capture-area .cap-section-title {
  font-size:0.65rem; font-weight:700; text-transform:uppercase;
  letter-spacing:1px; opacity:0.5; margin-bottom:8px;
}
#capture-area .cap-big {
  background:rgba(255,255,255,0.1); border-radius:12px;
  padding:14px; text-align:center; margin-bottom:10px;
}
#capture-area .cap-big-label { font-size:0.7rem; opacity:0.6; margin-bottom:4px; }
#capture-area .cap-big-val { font-size:1.8rem; font-weight:900; }
#capture-area .cap-footer { text-align:center; margin-top:14px; font-size:0.65rem; opacity:0.4; }
</style>
</head>
<body>

<div class="drops">
  <div class="drop"></div><div class="drop"></div><div class="drop"></div>
  <div class="drop"></div><div class="drop"></div><div class="drop"></div>
</div>

<div class="app">

  <!-- Header -->
  <div class="header">
    <div class="header-icon">🥛</div>
    <h1>حاسبة مصنع الزبادي</h1>
    <p>إدارة الإنتاج والتكاليف بدقة احترافية</p>
  </div>

  <!-- Top grid: Cups + Prices -->
  <div class="grid-2">

    <!-- Cups card -->
    <div class="card">
      <div class="card-title"><span>📦</span> عدد العلب</div>
      <div class="input-row">
        <div class="field">
          <label>صغير 100 جم</label>
          <input type="number" id="small" placeholder="0" value="0" min="0">
        </div>
        <div class="field">
          <label>وسط 150 جم</label>
          <input type="number" id="medium" placeholder="0" value="0" min="0">
        </div>
      </div>
      <div class="input-row">
        <div class="field">
          <label>كبير 300 جم</label>
          <input type="number" id="large" placeholder="0" value="0" min="0">
        </div>
        <div class="field">
          <label>برام 1 (250 جم)</label>
          <input type="number" id="bram1" placeholder="0" value="0" min="0">
        </div>
      </div>
      <div class="input-row full">
        <div class="field">
          <label>برام 2 (150 جم)</label>
          <input type="number" id="bram2" placeholder="0" value="0" min="0">
        </div>
      </div>
    </div>

    <!-- Prices card -->
    <div class="card">
      <div class="card-title"><span>💰</span> الأسعار الأساسية</div>
      <div class="input-row full">
        <div class="field">
          <label>سعر لتر الحليب (جنيه)</label>
          <input type="number" id="milk_price" step="0.01" value="31">
        </div>
      </div>
      <div class="input-row full">
        <div class="field">
          <label>سعر كيلو البودر (جنيه)</label>
          <input type="number" id="powder_price" step="0.01" value="160">
        </div>
      </div>
      <div class="divider"></div>
      <div class="card-title" style="margin-bottom:8px;"><span>🧪</span> أسعار المواد الخام</div>
      <div class="input-row">
        <div class="field">
          <label>الخميرة (جنيه/كجم)</label>
          <input type="number" id="yeast_price" step="0.01" value="24">
        </div>
        <div class="field">
          <label>الكوكتيل (جنيه/كجم)</label>
          <input type="number" id="cocktail_price" step="0.01" value="87.5">
        </div>
      </div>
      <div class="input-row">
        <div class="field">
          <label>المادة (جنيه/كجم)</label>
          <input type="number" id="material_price" step="0.01" value="6400">
        </div>
        <div class="field">
          <label>الحبوب (جنيه/كجم)</label>
          <input type="number" id="grains_price" step="0.01" value="220">
        </div>
      </div>
    </div>

  </div>

  <!-- Manual override card -->
  <div class="card" style="margin-bottom:14px;">
    <div class="mode-toggle">
      <button class="mode-btn active" id="modeAuto" onclick="setMode('auto')">⚡ حساب تلقائي من العلب</button>
      <button class="mode-btn" id="modeManual" onclick="setMode('manual')">✏️ تعديل يدوي مباشر</button>
    </div>

    <div id="manualSection" style="display:none;">
      <div class="card-title"><span>⚙️</span> قيم يدوية</div>
      <div class="input-row">
        <div class="field">
          <label>إجمالي الإنتاج (لتر)</label>
          <input type="number" id="m_total" step="0.01" placeholder="0" class="highlight">
        </div>
        <div class="field">
          <label>الحليب (لتر)</label>
          <input type="number" id="m_milk" step="0.01" placeholder="0" class="highlight">
        </div>
      </div>
      <div class="input-row">
        <div class="field">
          <label>المستخلص (لتر)</label>
          <input type="number" id="m_extract" step="0.01" placeholder="0" class="highlight">
        </div>
        <div class="field">
          <label>البودر (كجم)</label>
          <input type="number" id="m_powder" step="0.01" placeholder="0" class="highlight">
        </div>
      </div>
      <div class="input-row full">
        <div class="field">
          <label>المياه (لتر)</label>
          <input type="number" id="m_water" step="0.01" placeholder="0" class="highlight">
        </div>
      </div>
    </div>

    <div class="btn-row">
      <button class="btn btn-primary" onclick="calculate()">
        <span>🧮</span> احسب الآن
        <div class="spinner" id="calcSpinner"></div>
      </button>
    </div>
  </div>

  <!-- Results -->
  <div class="results-section results-hidden" id="resultsSection">

    <!-- Summary stats -->
    <div class="summary-row">
      <div class="stat-card">
        <div class="stat-label">إجمالي الإنتاج</div>
        <div class="stat-value animate-val" id="r_total">—</div>
        <div class="stat-unit">لتر</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">الحليب</div>
        <div class="stat-value animate-val" id="r_milk_l">—</div>
        <div class="stat-unit">لتر</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">البودر</div>
        <div class="stat-value animate-val" id="r_powder_kg">—</div>
        <div class="stat-unit">كجم</div>
      </div>
      <div class="stat-card accent span-full">
        <div class="stat-label">الإجمالي الكلي للتكاليف</div>
        <div class="stat-value animate-val" id="r_final_total">—</div>
        <div class="stat-unit">جنيه</div>
      </div>
      <div class="stat-card gold-accent" style="grid-column: span 2;">
        <div class="stat-label">السعر النهائي للتر</div>
        <div class="stat-value animate-val" id="r_per_liter">—</div>
        <div class="stat-unit">جنيه / لتر</div>
      </div>
    </div>

    <!-- Detail cards -->
    <div class="result-detail-grid">

      <div class="card">
        <div class="card-title"><span>🥛</span> تكاليف اللبن</div>
        <div class="result-item">
          <span class="ri-label">تكلفة الحليب</span>
          <span class="ri-value green" id="r_milk_cost">—</span>
        </div>
        <div class="result-item">
          <span class="ri-label">تكلفة البودر</span>
          <span class="ri-value green" id="r_powder_cost">—</span>
        </div>
        <div class="result-item">
          <span class="ri-label">إجمالي اللبن</span>
          <span class="ri-value" id="r_milk_total">—</span>
        </div>
        <div class="result-item">
          <span class="ri-label">سعر لتر اللبن</span>
          <span class="ri-value" id="r_liter_price">—</span>
        </div>
      </div>

      <div class="card">
        <div class="card-title"><span>🧪</span> المواد الخام</div>
        <div class="result-item">
          <span class="ri-label">الخميرة</span>
          <span class="ri-value gold" id="r_yeast_cost">—</span>
        </div>
        <div class="result-item">
          <span class="ri-label">الكوكتيل</span>
          <span class="ri-value gold" id="r_cocktail_cost">—</span>
        </div>
        <div class="result-item">
          <span class="ri-label">المادة</span>
          <span class="ri-value gold" id="r_material_cost">—</span>
        </div>
        <div class="result-item">
          <span class="ri-label">الحبوب</span>
          <span class="ri-value gold" id="r_grains_cost">—</span>
        </div>
        <div class="result-item">
          <span class="ri-label">إجمالي الخام</span>
          <span class="ri-value" id="r_raw_total">—</span>
        </div>
      </div>

    </div>

    <!-- Save button -->
    <div class="save-area">
      <button class="btn btn-gold" style="max-width:260px; margin:0 auto;" onclick="saveAsImage()">
        <span>📸</span> حفظ النتائج كصورة
      </button>
    </div>

  </div>

</div>

<!-- Snapshot modal -->
<div class="snapshot-card" id="snapshotModal">
  <div class="snapshot-inner">
    <img id="snapshotImg" src="" alt="النتائج">
    <div class="snapshot-btns">
      <a id="snapshotDownload" download="نتائج-الزبادي.png" class="btn btn-primary" style="text-decoration:none; flex:1; display:flex; align-items:center; justify-content:center; gap:5px; border-radius:12px; font-size:0.85rem; font-weight:700; color:#fff;">
        <span>⬇️</span> تحميل الصورة
      </a>
      <button class="btn-close" onclick="closeSnapshot()">إغلاق</button>
    </div>
  </div>
</div>

<!-- Hidden capture area -->
<div id="capture-area" style="position:fixed; top:-9999px; left:-9999px; width:380px; direction:rtl;">
  <div class="cap-header">
    <div class="cap-logo">🥛</div>
    <div class="cap-title">حاسبة مصنع الزبادي</div>
    <div class="cap-date" id="cap_date"></div>
  </div>
  <div class="cap-big" id="cap_final_box">
    <div class="cap-big-label">الإجمالي الكلي للتكاليف</div>
    <div class="cap-big-val" id="cap_final"></div>
  </div>
  <div style="display:grid; grid-template-columns:1fr 1fr; gap:8px; margin-bottom:14px;">
    <div style="background:rgba(255,255,255,0.1);border-radius:10px;padding:10px;text-align:center;">
      <div style="font-size:0.65rem;opacity:0.6;margin-bottom:4px;">إجمالي الإنتاج</div>
      <div style="font-size:1.2rem;font-weight:900;" id="cap_total"></div>
      <div style="font-size:0.6rem;opacity:0.5;">لتر</div>
    </div>
    <div style="background:rgba(200,149,42,0.3);border-radius:10px;padding:10px;text-align:center;">
      <div style="font-size:0.65rem;opacity:0.6;margin-bottom:4px;">سعر اللتر</div>
      <div style="font-size:1.2rem;font-weight:900;" id="cap_per_liter"></div>
      <div style="font-size:0.6rem;opacity:0.5;">جنيه / لتر</div>
    </div>
  </div>
  <div class="cap-section">
    <div class="cap-section-title">تكاليف اللبن</div>
    <div class="cap-row"><span class="cap-label">تكلفة الحليب</span><span class="cap-val" id="cap_milk_cost"></span></div>
    <div class="cap-row"><span class="cap-label">تكلفة البودر</span><span class="cap-val" id="cap_powder_cost"></span></div>
    <div class="cap-row"><span class="cap-label">إجمالي اللبن</span><span class="cap-val" id="cap_milk_total"></span></div>
  </div>
  <div class="cap-section">
    <div class="cap-section-title">المواد الخام</div>
    <div class="cap-row"><span class="cap-label">الخميرة</span><span class="cap-val" id="cap_yeast"></span></div>
    <div class="cap-row"><span class="cap-label">الكوكتيل</span><span class="cap-val" id="cap_cocktail"></span></div>
    <div class="cap-row"><span class="cap-label">المادة</span><span class="cap-val" id="cap_material"></span></div>
    <div class="cap-row"><span class="cap-label">الحبوب</span><span class="cap-val" id="cap_grains"></span></div>
    <div class="cap-row"><span class="cap-label">إجمالي الخام</span><span class="cap-val" id="cap_raw_total"></span></div>
  </div>
  <div class="cap-footer">تم الحساب بواسطة حاسبة مصنع الزبادي</div>
</div>

<script>
let currentMode = 'auto';
let lastResults = null;

function setMode(m) {
  currentMode = m;
  document.getElementById('modeAuto').classList.toggle('active', m === 'auto');
  document.getElementById('modeManual').classList.toggle('active', m === 'manual');
  document.getElementById('manualSection').style.display = m === 'manual' ? 'block' : 'none';
}

function fmt(n, dec=2) {
  return parseFloat(n.toFixed(dec)).toLocaleString('ar-EG');
}

function setVal(id, v, unit='') {
  const el = document.getElementById(id);
  el.textContent = fmt(v) + (unit ? ' ' + unit : '');
  el.classList.remove('animate-val');
  void el.offsetWidth;
  el.classList.add('animate-val');
}

function calculate() {
  const spinner = document.getElementById('calcSpinner');
  spinner.style.display = 'block';

  setTimeout(() => {
    spinner.style.display = 'none';
    _doCalc();
  }, 300);
}

function _doCalc() {
  const milk_price     = parseFloat(document.getElementById('milk_price').value) || 31;
  const powder_price   = parseFloat(document.getElementById('powder_price').value) || 160;
  const yeast_price    = parseFloat(document.getElementById('yeast_price').value) || 24;
  const cocktail_price = parseFloat(document.getElementById('cocktail_price').value) || 87.5;
  const material_price = parseFloat(document.getElementById('material_price').value) || 6400;
  const grains_price   = parseFloat(document.getElementById('grains_price').value) || 220;

  let total_liters, milk_liters, extract_liters, powder_kg, water_liters;

  if (currentMode === 'auto') {
    const small  = parseFloat(document.getElementById('small').value) || 0;
    const medium = parseFloat(document.getElementById('medium').value) || 0;
    const large  = parseFloat(document.getElementById('large').value) || 0;
    const bram1  = parseFloat(document.getElementById('bram1').value) || 0;
    const bram2  = parseFloat(document.getElementById('bram2').value) || 0;

    total_liters  = (small*100 + medium*150 + large*300 + bram1*250 + bram2*150) / 1000;
    milk_liters   = total_liters / 2;
    extract_liters = total_liters / 2;
    powder_kg     = extract_liters * 0.08;
    water_liters  = extract_liters - powder_kg;

    // populate manual fields
    document.getElementById('m_total').value   = total_liters.toFixed(2);
    document.getElementById('m_milk').value    = milk_liters.toFixed(2);
    document.getElementById('m_extract').value = extract_liters.toFixed(2);
    document.getElementById('m_powder').value  = powder_kg.toFixed(2);
    document.getElementById('m_water').value   = water_liters.toFixed(2);
  } else {
    total_liters   = parseFloat(document.getElementById('m_total').value) || 0;
    milk_liters    = parseFloat(document.getElementById('m_milk').value) || 0;
    extract_liters = parseFloat(document.getElementById('m_extract').value) || 0;
    powder_kg      = parseFloat(document.getElementById('m_powder').value) || 0;
    water_liters   = parseFloat(document.getElementById('m_water').value) || 0;
  }

  const milk_cost   = milk_liters * milk_price;
  const powder_cost = powder_kg * powder_price;
  const total_cost  = milk_cost + powder_cost;
  const liter_price = total_liters > 0 ? total_cost / total_liters : 0;

  const grains   = total_liters * 0.001;
  const cocktail = total_liters * 0.015;
  const material = total_liters * 0.0001;
  const yeast    = total_liters * 0.001;

  const yeast_cost    = yeast * yeast_price;
  const cocktail_cost = cocktail * cocktail_price;
  const material_cost = material * material_price;
  const grains_cost   = grains * grains_price;
  const total_raw     = yeast_cost + cocktail_cost + material_cost + grains_cost;

  const final_total = total_cost + total_raw;
  const per_liter   = total_liters > 0 ? final_total / total_liters : 0;

  lastResults = { total_liters, milk_liters, powder_kg, milk_cost, powder_cost,
    total_cost, liter_price, yeast_cost, cocktail_cost, material_cost, grains_cost,
    total_raw, final_total, per_liter };

  // Update summary
  setVal('r_total', total_liters);
  setVal('r_milk_l', milk_liters);
  setVal('r_powder_kg', powder_kg);
  setVal('r_final_total', final_total);
  setVal('r_per_liter', per_liter);

  // Update details
  document.getElementById('r_milk_cost').textContent    = fmt(milk_cost) + ' جنيه';
  document.getElementById('r_powder_cost').textContent  = fmt(powder_cost) + ' جنيه';
  document.getElementById('r_milk_total').textContent   = fmt(total_cost) + ' جنيه';
  document.getElementById('r_liter_price').textContent  = fmt(liter_price) + ' جنيه';
  document.getElementById('r_yeast_cost').textContent   = fmt(yeast_cost) + ' جنيه';
  document.getElementById('r_cocktail_cost').textContent= fmt(cocktail_cost) + ' جنيه';
  document.getElementById('r_material_cost').textContent= fmt(material_cost) + ' جنيه';
  document.getElementById('r_grains_cost').textContent  = fmt(grains_cost) + ' جنيه';
  document.getElementById('r_raw_total').textContent    = fmt(total_raw) + ' جنيه';

  document.getElementById('resultsSection').classList.remove('results-hidden');
  document.getElementById('resultsSection').scrollIntoView({ behavior:'smooth', block:'start' });
}

function saveAsImage() {
  if (!lastResults) return;

  const now = new Date();
  const opts = { year:'numeric', month:'long', day:'numeric', calendar:'gregory' };
  document.getElementById('cap_date').textContent = now.toLocaleDateString('ar-EG', opts);

  const r = lastResults;
  document.getElementById('cap_final').textContent    = fmt(r.final_total) + ' جنيه';
  document.getElementById('cap_total').textContent    = fmt(r.total_liters);
  document.getElementById('cap_per_liter').textContent= fmt(r.per_liter) + ' ج';
  document.getElementById('cap_milk_cost').textContent= fmt(r.milk_cost) + ' جنيه';
  document.getElementById('cap_powder_cost').textContent= fmt(r.powder_cost) + ' جنيه';
  document.getElementById('cap_milk_total').textContent= fmt(r.total_cost) + ' جنيه';
  document.getElementById('cap_yeast').textContent    = fmt(r.yeast_cost) + ' جنيه';
  document.getElementById('cap_cocktail').textContent = fmt(r.cocktail_cost) + ' جنيه';
  document.getElementById('cap_material').textContent = fmt(r.material_cost) + ' جنيه';
  document.getElementById('cap_grains').textContent   = fmt(r.grains_cost) + ' جنيه';
  document.getElementById('cap_raw_total').textContent= fmt(r.total_raw) + ' جنيه';

  const el = document.getElementById('capture-area');
  el.style.position = 'static';
  el.style.top = 'auto';
  el.style.left = 'auto';
  el.style.visibility = 'hidden';
  document.body.appendChild(el);

  html2canvas(el, {
    scale: 3,
    useCORS: true,
    backgroundColor: null,
    logging: false
  }).then(canvas => {
    const imgData = canvas.toDataURL('image/png');
    document.getElementById('snapshotImg').src = imgData;
    document.getElementById('snapshotDownload').href = imgData;

    el.style.position = 'fixed';
    el.style.top = '-9999px';
    el.style.left = '-9999px';
    el.style.visibility = 'visible';

    document.getElementById('snapshotModal').classList.add('open');
  });
}

function closeSnapshot() {
  document.getElementById('snapshotModal').classList.remove('open');
}

// Close modal on backdrop click
document.getElementById('snapshotModal').addEventListener('click', function(e) {
  if (e.target === this) closeSnapshot();
});

// Auto-calculate on Enter
document.addEventListener('keydown', e => {
  if (e.key === 'Enter') calculate();
});
</script>
</body>
</html>