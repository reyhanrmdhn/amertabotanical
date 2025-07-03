/*
Template Name: Xoric - Responsive Bootstrap 4 Admin Dashboard
Author: Themesdesign
Version: 1.0.0
Website: https://themesdesign.in/
File: alertify Js File
*/



$(function () {

    $('#alert').click(function () {
        alertify.alert('Alert Title', 'Alert Message!', function () { alertify.success('Ok'); });
    });

    $('#alert-confirm').click(function () {
        alertify.confirm("Batalkan Laporan?",
            function () {
                alertify.success('Laporan dibatalkan');
            },
            function () {
                alertify.error('Cancel');
            });
    });

    $('#logout').click(function () {
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/";
        alertify.confirm("Logout?",
            function () {
                alertify.success('Logout!');
                window.location.href = baseUrl+"/auth/logout";
            },
            function () {
                alertify.error('Canceled!');
            });
    });

    $('#alert-prompt').click(function () {
        alertify.prompt("This is a prompt dialog.", "Default value",
            function (evt, value) {
                alertify.success('Ok: ' + value);
            },
            function () {
                alertify.error('Cancel');
            });

    });


    $('#alert-success').click(function () {
        alertify.success('Success message');
    });

    $('#alert-error').click(function () {
        alertify.error('Error message');
    });

    $('#alert-warning').click(function () {
        alertify.warning('Warning message');
    });

    $('#alert-message').click(function () {
        alertify.message('Normal message');
    });
});