$("#teacher_mobile").inputmask({"mask": "999 999 999"});
$("#student_mobile").inputmask({"mask": "999 999 999"});

if ($('#caso_id').val()) {
    $.ajax({
        type: 'get',
        url: 'casos.getBrand/' + $('#caso_id').val(),
        success: (data) => {
            $('#brand').val(data);
        },
        error: (msg) => {
            alert(JSON.stringify(msg.responseJSON['errors']));
        },
    });
}

const selectCaso = async (e) => {
    const $caseId = $('#caso_id');
    const $brand = $('#brand');
    const $brandTitle = $('#title_brand');
    const $brandTextContent = $('#text_content');
    const $btnImg = $('.btn-img');
    const $paint = $(`#${e.id}`);
    const $challenge = $(`#${e.id.replace('paint', 'challenge')}`);
    const $group = $(`#${e.id.replace('paint', 'group')}`);
    const $textBrand = $('#text_brand');

    $caseId.val(e.name);
    $brand.val(e.value);

    // $brandTitle.text(null);
    // $textBrand.text(null);

    const maxGroups = await getMaxGroups();

    console.log(parseInt($group.val()), parseInt(maxGroups));

    if (parseInt($group.val()) >= parseInt(maxGroups)) {
        $brandTextContent.removeClass('display-none').addClass('display-block');
        $btnImg.css('filter', 'grayscale(1)');
        $paint.css('filter', 'grayscale(0)');
        $caseId.val(null);
        $brand.val(null);
        $brandTitle.text('¡Alerta!');
        $textBrand.text('Sugerimos que escojas otra marca, porque esta ya tiene la cuota de equipos completa.');
    } else {
        $brandTextContent.removeClass('display-block').addClass('display-none');
        $btnImg.css('filter', 'grayscale(1)');
        $paint.css('filter', 'grayscale(0)');
        $brandTitle.text(null);
        $textBrand.text(null);
    }
};

const getMaxGroups = () => {
    return $.ajax({
        type: 'GET',
        url: `api/v1/groups/count`,
        dataType: 'json',
    })
        .then((data) => data.message)
        .fail((error) => {
            console.error(error);
        });
};

const reloadPage = () => {
    location.reload();
};

const timeLimit = 1000 * 60 * 15;

setTimeout(reloadPage, timeLimit);

$('#teacher_document_type_id').change(function () {
    setTeacherDocFormat();
});

if ($('#teacher_document_type_id').val()) {
    setTeacherDocFormat();
}

function setTeacherDocFormat() {
    $.ajax({
        type: 'get',
        url: 'users.getDocumentType/' + $('#teacher_document_type_id').val(),
        success: (data) => {
            var value = $('#teacher_document').val();
            $('#teacher_document')
                .prop('disabled', false)
                .prop('maxlength', data.length)
                .css('background-color', '#fff')
                .attr('onkeypress', 'return check' + (data.is_number ? 'Number' : 'AlNum') + '(event)')
                .val((data.is_number ? getNumbersInString(value) : value).substr(0, data.length));
            $('#teacher_pattern').val(data.is_exact ? '[0-9]{' + data.length + '}' : '[A-Za-z0-9]{1,' + data.length + '}');
        },
        error: (msg) => {
            alert(JSON.stringify(msg.responseJSON['errors']));
        },
    });
}

$('#student_document_type_id').change(function () {
    setStudentDocFormat();
});

if ($('#student_document_type_id').val()) {
    setStudentDocFormat();
}

function setStudentDocFormat() {
    $.ajax({
        type: 'get',
        url: 'users.getDocumentType/' + $('#student_document_type_id').val(),
        success: (data) => {
            var value = $('#student_document').val();
            $('#student_document')
                .prop('disabled', false)
                .prop('maxlength', data.length)
                .css('background-color', '#fff')
                .attr('onkeypress', 'return check' + (data.is_number ? 'Number' : 'AlNum') + '(event)')
                .val((data.is_number ? getNumbersInString(value) : value).substr(0, data.length));
            $('#student_pattern').val(data.is_exact ? '[0-9]{' + data.length + '}' : '[A-Za-z0-9]{1,' + data.length + '}');
        },
        error: (msg) => {
            alert(JSON.stringify(msg.responseJSON['errors']));
        },
    });
}

$('#lnk-terminos').click(function () {
    $('#mdl-terminos').modal('show');
});

$('#lnk-politicas').click(function () {
    $('#mdl-politicas').modal('show');
});

$('#btn-terminos').click(function () {
    $('#mdl-terminos').modal('hide');
    $('#chk-terminos').prop('checked', true);
    $('#btn-submit').attr('disabled', !$('#chk-politicas').prop('checked'));
});

$('#btn-politicas').click(function () {
    $('#mdl-politicas').modal('hide');
    $('#chk-politicas').prop('checked', true);
    $('#btn-submit').attr('disabled', !$('#chk-terminos').prop('checked'));
});
