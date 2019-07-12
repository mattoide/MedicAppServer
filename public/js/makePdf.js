function makePdf(paziente){

    console.log(paziente)

    var doc = new jsPDF({orientation: "p", lineHeight: 3})

    doc.setFontType('bold');

    let horizontalTitle = 20;
    let verticalTitle = 10;
    
    doc.text('Scheda paziente', horizontalTitle, verticalTitle)

    let horizontal = 30;
    let vertical = 25;
    doc.lineHeight = 10;


    // doc.setFont("times");
    
    let fileds = [
        'Nome', 'Cognome', 'Sesso', 'Data di nascita', 'Indirizzo', 'Città', 'Paese',
        'Cap', 'Tel1', 'Tel2', 'Email', 'Centro visita','Tipo documento', 'Id documento',
        // 'Medico curante', 'Recapito medico', 'Contatto medico'
    ]
    let values = [
        paziente.nome.toString(), paziente.cognome.toString(), paziente.sesso.toString(), paziente.datadinascita.toString(), 
        paziente.recapiti_paziente.indirizzo.toString(), paziente.recapiti_paziente.citta.toString(), 
        paziente.recapiti_paziente.paese.toString(),
        paziente.recapiti_paziente.cap.toString(),
        paziente.recapiti_paziente.tel1.toString(),
        paziente.recapiti_paziente.tel2.toString(),
        paziente.recapiti_paziente.email.toString(),
        paziente.recapiti_paziente.centrovisita.toString(),
        paziente.recapiti_paziente.tipodocumento.toString(),
        paziente.recapiti_paziente.iddocumento.toString(),
        // paziente.medico.nome.toString(),
        // paziente.medico.recapito.toString(),
        // paziente.medico.contatto.toString(),
    ]

    doc.text(fileds, horizontal, vertical)

    horizontal = horizontal + 50;
    doc.setFontType('normal');

    doc.text(values, horizontal, vertical)





    doc.save(paziente.cognome + "_" + paziente.nome + "_" + paziente.id + '.pdf')
}
