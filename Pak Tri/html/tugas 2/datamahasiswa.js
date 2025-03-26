//Input

function kirim() {
  var nama = document.getElementById("nama").value;
  var jk = document.getElementById("jk").value;
  var agama = document.getElementById("agama").value;

  var status = document.querySelector("input[name='status']:checked");
  var statusResult = status ? status.value : "";

  var jurusan = document.querySelector("select[name='jurusan']");
  var jurusanResult = jurusan ? jurusan.value : "";

  var komentar = document.getElementById("komentar").value;

  //Output

  document.getElementById("r_nama").value = nama;
  if (jk === "Pria") {
    document.getElementById("r_jk").checked = true;
  } else if (jk === "Wanita") {
    document.getElementById("r_jk").checked = true;
  }
  document.getElementById("r_agama").value = agama;

  if (statusResult === "Lajang") {
    document.getElementById("r_lajang").checked = true;
    document.getElementById("r_menikah").checked = false;
  } else if (statusResult === "Menikah") {
    document.getElementById("r_lajang").checked = false;
    document.getElementById("r_menikah").checked = true;
  } else {
    document.getElementById("r_lajang").checked = false;
    document.getElementById("r_menikah").checked = false;
  }

  document.getElementById("r_jurusan").value = jurusanResult;
  document.getElementById("r_komentar").value = komentar;
}
