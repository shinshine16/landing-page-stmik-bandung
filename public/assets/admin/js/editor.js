$(function () {
    ClassicEditor
        .create(document.querySelector('#content_id'), {
            toolbar: ["alignment:left", "alignment:right", "alignment:center", "alignment:justify", "alignment", "undo", "redo", "blockQuote", "bold", "imageTextAlternative", "link", "ckfinder", "code", "selectAll", "fontColor", "heading", "htmlEmbed", "imageStyle:full", "imageStyle:side", "imageUpload", "indent", "outdent", "italic", "numberedList", "bulletedList", "mediaEmbed", "insertTable", "tableColumn", "tableRow", "mergeTableCells"]
        })
        .then(editor => {
            console.log(Array.from(editor.ui.componentFactory.names()));
        })
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#content_en'), {
            toolbar: ["alignment:left", "alignment:right", "alignment:center", "alignment:justify", "alignment", "undo", "redo", "blockQuote", "bold", "imageTextAlternative", "link", "ckfinder", "code", "selectAll", "fontColor", "heading", "htmlEmbed", "imageStyle:full", "imageStyle:side", "imageUpload", "indent", "outdent", "italic", "numberedList", "bulletedList", "mediaEmbed", "insertTable", "tableColumn", "tableRow", "mergeTableCells"]
        })
        .then(editor => {
            console.log(Array.from(editor.ui.componentFactory.names()));
        })
        .catch(error => {
            console.error(error);
        });
});
