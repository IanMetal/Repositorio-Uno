function abrirPDF(event) {
    const archivo = event.target.files[0];

    if (!archivo) return;

    if (archivo.type !== "application/pdf") {
        alert("Solo se permiten archivos PDF");
        event.target.value = "";
        return;
    }

    const url = URL.createObjectURL(archivo);
    window.open(url, "_blank");
}
