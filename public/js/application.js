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

function saveProfile() {
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