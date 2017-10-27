var spinnerImg = 'https://media.tenor.com/images/85d269dc9595a7bcf87fd0fa4039dd9f/tenor.gif';
$(document).ready(function () {
    loadDashboard();
});


function loadDashboard() {
    placeSpinner();
    url = '/ajax/dashboard'
    $.ajax({
        url: url,
        cache: false,
        success: function (content) {
            $('#mainContent').html(content);
        }
    });
}

function editProfile() {
    placeSpinner();
    url = '/ajax/profile'
    $.ajax({
        url: url,
        cache: false,
        success: function (content) {
            $('#mainContent').html(content);
        }, error: function (content) {
            $('#errorContent').html("<pre>" + content.responseText + "</pre>");
            $('#errorContent').show();
        }
    });
}

function placeSpinner() {
    spinnerHTML = "<div style='text-align: center'><img src=\"" + spinnerImg + "\"/><BR/>Loading...</div>";
    $('#mainContent').html(spinnerHTML);
}

function validateSaveProfile() {

    var errs = [];
    if ($("#profileForm input[name='name']").val() == "") {
        errs.push('Name is required');
    }
    if ($("#profileForm input[name='email']").val() == "") {
        errs.push('Email is required');
    }
    if ($("#profileForm input[name='birthdate']").val() == "") {
        errs.push('DOB is required');
    }
    if ($("#profileForm input[name='phone_number']").val() == "") {
        errs.push('Phone is required');
    }
    if ($("#profileForm input[name='address']").val() == "") {
        errs.push('Address is required');
    }
    if ($("#profileForm input[name='city']").val() == "") {
        errs.push('City is required');
    }
    if ($("#profileForm input[name='state']").val() == "") {
        errs.push('State is required');
    }
    if ($("#profileForm input[name='zip']").val() == "") {
        errs.push('Zipcode is required');
    }

    if (errs.length > 0) {
        alert(errs.join('\n'));
        return false;
    }
    return true;
}

function saveProfile() {
    if (!validateSaveProfile()) {
        return false;
    }
    formData = $('#profileForm').serialize();
    url = '/ajax/profile';
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        cache: false,
        success: function (content) {
            $('#mainContent').html(content);
        }, error: function (content) {
            $('#errorContent').html("<pre>" + content.responseText + "</pre>");
            $('#errorContent').show();
        }
    });

}