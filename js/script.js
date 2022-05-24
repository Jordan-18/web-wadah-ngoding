function addtags() {
    var data = $('#tags').val();
    var textarea = document.getElementById('tagsarea')

    if (textarea.value == "") {
        console.log('ini kosong')
        textarea.value += `${data}`;
    } else {
        console.log('ini berisi')
        textarea.value += `,${data}`;
    }
    $('#tags').val("");
}

function onCancel() {
    $('#app').val("");
    $('#author').val("");
    $('#link').val("");
    $('#tagsarea').val("");
    $('#inputState').val("");
    $('#GAMBAR').val("");
}