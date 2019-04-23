$(document).ready(function(){
    $('select').awselect({
        background: "white", //the dark blue background
        active_background:"white", // the light blue background
        placeholder_color: "black", // the light blue placeholder color
        placeholder_active_color: "black", // the dark blue placeholder color
        option_color:"black", // the option colors
        immersive: false // immersive option, demonstrated at the next example
    });
    $('#myTab a').click( function (e) {
        e.preventDefault()
        $(this).tab('show')

    });
    // $('#myTab a').hover(function (e) {
    //     if($(this).parent('li').hasClass('active')){
    //         var target_pane=$(this).attr('href');
    //         $( target_pane ).toggle( !$( target_pane ).is(":visible") );
    //     }
    // });

    // $('#myTab a[href="#profile"]').tab('show') // Select tab by name
    // $('#myTab li:first-child a').tab('show') // Select first tab
    // $('#myTab li:last-child a').tab('show') // Select last tab
    // $('#myTab li:nth-child(3) a').tab('show') // Select third tab
});