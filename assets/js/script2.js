document.addEventListener("DOMContentLoaded", () => {

    const $boton = document.querySelector("#btnCrearPdf");
    $boton.addEventListener("click", () => {
        const $elementoParaConvertir = document.body; 
        html2pdf()
            .set({
                margin: 1,
                filename: 'documento.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.1
                },
                html2canvas: {
                    scale: 5, 
                    letterRendering: true,
                },
                jsPDF: {
                    unit: "in",
                    format: "a1",
                    orientation: 'portrait' 
                }
            })
            .from($elementoParaConvertir)
            .save()
            .catch(err => console.log(err))
            .finally()
            .then(() =>{
                console.log("Guardado!")
            })
    });
});

