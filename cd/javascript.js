( function( $ ) {

    $( document ).ready( function() {
        // $( '.dates' ).click( function() {
        //     $( this ).children( '.event' ).css( 'display', 'block' );
        //
        //     $( this ).find( '.close' ).on( 'click', function() {
        //         console.log( 'eee-click' );
        //         $( this ).find( '.event' ).css( 'display', 'none' );
        //     } )
        // } );

        $('.noEvent').on('click', function(  ) {
            console.log('eventClick');
        });

        $('input[name="daterange"]').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });


        // $( "#from" ).datepicker( {
        //     changeYear: true,
        //     changeMonth: true,
        //     minDate: 0,
        //     numberOfMonths: 1,
        //     // showOn: "button",
        //     // buttonImage: "assets/img/Calendar-Icon-e1495568287395.png",
        //     // buttonImageOnly: true,
        //     // buttonText: "Select date",
        //     dateFormat: "dd-mm-yy",
        //     onSelect: function () {
        //         $("#to").datepicker("show");
        //     },
        // } );
        //
        // $( "#to" ).datepicker( {
        //     changeYear: true,
        //     changeMonth: true,
        //     minDate: 0,
        //     numberOfMonths: 1,
        //     // showOn: "button",
        //     // buttonImage: "assets/img/Calendar-Icon-e1495568287395.png",
        //     // buttonImageOnly: true,
        //     // buttonText: "Select date",
        //     dateFormat: "dd-mm-yy",
        // } ).on( "change", function() {
        //     to.datepicker( "option", "minDate", getDate( this ) );
        // } );
    } )
} )( jQuery );