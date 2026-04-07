function togglePassword() {
  const pw = document.getElementById("password");
  const btn = document.getElementById("togglePasswordButton");
  if (pw.type === "password") {
    pw.type = "text";
    btn.innerText = "hidden";
  } else {
    pw.type = "password";
    btn.innerText = "show";
  }
}

function konfirmasiKirim() {
  return confirm("Apakah anda yakin ingin mengirim data?");
}

function konfirmasiHapus() {
  return confirm("Yakin ingin menghapus data ini?");
}

function konfirmasiEdit() {
  return confirm("Yakin ingin mengedit data ini?");
}
