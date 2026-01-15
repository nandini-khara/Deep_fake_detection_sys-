<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Detection | DeepFakeAI</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
body {
  margin: 0;
  background: radial-gradient(circle at top, #1b3b44, #0b1c22 70%);
  color: #fff;
  font-family: Inter, sans-serif;
}

.container {
  max-width: 900px;
  margin: 120px auto;
  padding: 40px;
  background: rgba(0,0,0,0.35);
  border-radius: 16px;
}

h1 {
  margin-bottom: 10px;
}

.detectors {
  display: flex;
  gap: 15px;
  margin: 30px 0;
}

.detector {
  flex: 1;
  padding: 20px;
  background: rgba(255,255,255,0.05);
  border-radius: 12px;
  text-align: center;
  cursor: pointer;
  border: 1px solid transparent;
}

.detector.active {
  border-color: #00d4ff;
  background: rgba(0,212,255,0.15);
}

.upload-box {
  display: none;
  margin-top: 25px;
  padding: 30px;
  border: 2px dashed #00d4ff;
  border-radius: 12px;
  text-align: center;
}

button {
  margin-top: 25px;
  padding: 12px 26px;
  border-radius: 8px;
  border: none;
  cursor: pointer;
  background: #00d4ff;
  color: #000;
  font-weight: 600;
}

button:disabled {
  opacity: 0.4;
  cursor: not-allowed;
}
</style>
</head>

<body>

<div class="container">
  <h1>Deepfake Detection</h1>
  <p>Select content type and upload media for analysis.</p>

  <!-- TYPE SELECTION -->
  <div class="detectors">
    <div class="detector" onclick="selectType('image')">📷 Image</div>
    <div class="detector" onclick="selectType('video')">🎥 Video</div>
    <div class="detector" onclick="selectType('audio')">🎙 Audio</div>
    <div class="detector" onclick="selectType('url')">🌐 URL</div>
  </div>

  <!-- UPLOAD -->
  <div class="upload-box" id="uploadBox">
    <input type="file" id="fileInput">
    <input type="text" id="urlInput" placeholder="Paste URL here" style="display:none;width:100%;padding:10px;">
    <p style="font-size:13px;opacity:0.8;">Max 100MB • JPG, PNG, MP4, WAV</p>
  </div>

  <button id="analyzeBtn" disabled onclick="startAnalysis()">Analyze</button>
</div>

<script>
let selectedType = null;

function selectType(type) {
  selectedType = type;
  document.querySelectorAll('.detector').forEach(d => d.classList.remove('active'));
  event.target.classList.add('active');

  document.getElementById("uploadBox").style.display = "block";
  document.getElementById("analyzeBtn").disabled = false;

  document.getElementById("fileInput").style.display = type === 'url' ? 'none' : 'block';
  document.getElementById("urlInput").style.display = type === 'url' ? 'block' : 'none';
}

function startAnalysis() {
  // later: submit to backend
  window.location.href = "result.php";
}
</script>

</body>
</html>
