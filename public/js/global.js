/**
 * Created by root on 22/2/16.
 */

var LOGINURL = "login";
var DASHBOARD = "dashboard";
var FEEDBACK_SUBMIT = "savefeedback";


var app = angular.module("globalapp", ['ngMaterial', 'lumx'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});
app.controller("globalcontroller", function ($scope) {


});
app.controller("AppCtrl", function ($scope) {


});
app.controller("feedbackcontroller", function ($scope, $http) {

    $scope.feedbackSubmit = function () {

        var data = $.param({
            title: $scope.feedback.title,
            description: $('#feedback-description').redactor('code.get')
        });


        $http({
            method: 'POST',
            url: FEEDBACK_SUBMIT,
            data: data, //forms user object
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (data) {
            if (data.result) {
                var html = "<center><i class='mdi teal mdi-checkbox-marked-circle size-big'></i>";
                html = html + "<h1>Your feedback Posted Succesfully...</h1>";
                html = html + "<h3>Thanks for your feedback ,This helps us to improve our application and system to make this project alive...</h3>";

                $('#feedback-layout').html(html);
            } else {
                alert("failed")
            }
        });
    };

});


app.controller('logincontroller', function ($scope, $http, $window) {

    $scope.submit = function () {

        $http
            .get(LOGINURL + $scope.input.username + "/" + $scope.input.password)
            .success(function (data) {
                if (data.result == true) {
                    $window.location.href = DASHBOARD;
                } else {
                    $scope.message = "Invalid Username or Password...";
                }
            });
    };
});

$(function () {
    $('#feedback-description').redactor({
        buttons: ['format', 'bold', 'italic', 'deleted', 'lists',
            'image', 'file', 'link', 'horizontalrule'],
        imageUpload: "feed-image-upload",
        imageManagerJson: 'image-manager.json',
        focus: true,
        minHeight: 300,
        plugins: ['alignment', 'inlinestyle', 'imagemanager', 'table']
    });
});