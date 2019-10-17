;(() => {
    'use strict';
    $('.download_btn').click(to_pdf);
    function to_pdf() {
         html2canvas(document.getElementById('convert_to_pdf'), {
             onrendered: function (canvas) {
                 var data = canvas.toDataURL();
                 var docDefinition = {
                     content: [{
                         image: data,
                         width: 500
                     }]
                 };
                 pdfMake.createPdf(docDefinition).download("vehicle_details.pdf");
             }
         });
    }
})();