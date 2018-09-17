/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(function () {
    $('[data-toggle="popover"]').popover({trigger: 'focus'});
    $('.dismiss-warning').click(function() {
        var warning = $(this).parent().parent();
        if (warning.parent().hasClass('card-body') && warning.parent().parent().hasClass('warnings')) {
            warning = warning.parent().parent();
        }
        var warned  = warning.parent().children('.warned');
        warning.slideUp('slow', function() {
            $(this).remove();
        });
        warned.removeClass('warned');
        if (! warned.hasClass('spoiled')) {
            warned.slideUp(0, function() {
                warned.slideDown('slow');
            });
        } else {
            var spoiler = warning.parent().children('.spoiler-warning');
            spoiler.slideDown('slow');
        }
    });
    $('.dismiss-spoiler').click(function() {
        var spoiler = $(this).parent().parent();
        if (spoiler.parent().hasClass('card-body') && spoiler.parent().parent().hasClass('warnings')) {
            spoiler = spoiler.parent().parent();
        }
        var spoiled = spoiler.parent().children('.spoiled');
        spoiler.slideUp('slow', function() {
            $(this).remove();
        });
        spoiled.removeClass('spoiled');
        spoiled.slideUp(0, function() {
            spoiled.slideDown('slow');
        });
    });
});

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#vueapp'
});

$(function() {
    if (document.getElementById('logout-link') == null) return;

    document.getElementById('logout-link').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('logout-form').submit();
    });
})
