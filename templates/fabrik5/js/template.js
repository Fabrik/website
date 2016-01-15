/**
 * Created by rob on 12/01/2016.
 */
jQuery('.modal-trigger').leanModal();
// Select - Single
jQuery('select:not([multiple])').material_select();
jQuery('.button-collapse').sideNav();

var options = [ {
    selector: '#content-bottom',
    offset  : 0,
    callback: 'Materialize.showStaggeredCards("#content-bottom")'
},{
    selector: '#content-bottom-2',
    offset  : 0,
    callback: 'Materialize.showStaggeredImgs("#content-bottom-2")'
}];
Materialize.scrollFire(options);

jQuery('#content-bottom').find('.card').velocity(
    { translateY: "100px", opacity: "0"},
    { duration: 0 });

jQuery('#content-bottom-2').find('img').velocity(
    { translateY: "100px", opacity: "0"},
    { duration: 0 });


Materialize.showStaggeredImgs = function(selector) {
    var time = 0;
    jQuery(selector).find('img').velocity(
        { translateY: "100px", opacity: "0"},
        { duration: 0 });

    jQuery(selector).find('img').each(function() {
        jQuery(this).velocity(
            { opacity: "1", translateY: "0"},
            { duration: 800, delay: time, easing: [60, 10] });
        time += 120;
    });
};

Materialize.showStaggeredCards = function(selector) {
    var time = 0;
    jQuery(selector).find('.card').velocity(
        { translateY: "100px", opacity: "0"},
        { duration: 0 });

    jQuery(selector).find('.card').each(function() {
        jQuery(this).velocity(
            { opacity: "1", translateY: "0"},
            { duration: 800, delay: time, easing: [60, 10] });
        time += 120;
    });
};
