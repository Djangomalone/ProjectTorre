$(document).ready(() => {
    $('.AccountUtente').hide();
    $('.AccountAdmin').hide();
    $('.ButtonAdmin').on('click', () => {
        $('.AccountUtente').hide();
        $('.AccountAdmin').show();
    });
    $('.ButtonUtente').on('click', () => {
        $('.AccountUtente').show();
        $('.AccountAdmin').hide();
    });
});