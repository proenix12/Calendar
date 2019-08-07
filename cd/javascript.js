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

        $( '.onEvent-blue, .onEvent-red, .onEvent-silver, .noEvent-red, .noEvent-blue' ).on( 'click', function() {
            $( this ).attr( 'data-day' );
            let fullDate = $( this ).attr( 'data-full-day' );

            console.log( $( this ).attr( "data-day" ) );
            $.ajax( {
                url: "./events.php",
                type: "POST",
                data: {
                    getDay: $( this ).attr( "data-day" )
                },
                success: function( result ) {
                    $( '#mySidenav' ).html( result );
                },
                complete: function() {
                    $( '.sidenav' ).width( '100%' );
                    $( '.fullDate' ).html( 'Date: ' + fullDate );
                    $( '.dat-post' ).val( fullDate );
                }
            } );
        } );

        $( "body" ).on( 'click', '.closebtn', function( e ) {
            e.preventDefault();
            $( '.sidenav' ).width( 0 );
        } );

        $( 'input[name="daterange"]' ).daterangepicker( {
            opens: 'left'
        }, function( start, end, label ) {
            console.log( "A new date selection was made: " + start.format( 'YYYY-MM-DD' ) + ' to ' + end.format( 'YYYY-MM-DD' ) );
        } );

        $( "body" ).on( 'click', ".makeEvent", function() {
            $( '#myModal' ).toggleClass( 'hide' );
            let dataHour = $( this ).attr( 'data-hour' );

            $( '.getHour select option' ).on( function() {
                console.log( $( this ).val() );
                if( $( this ).val() === dataHour ) {
                    $( this ).attr( 'selected', 'selected' );
                }
            } )
        } );

        $( '.close' ).on( 'click', function() {
            $( '#myModal' ).toggleClass( 'hide' );
        } );

        $( '.set-event-form' ).submit( function( e ) {
            e.preventDefault();
            $.ajax( {
                url: "./test.php",
                type: "POST",
                data: {
                    getHour: $( '.getHour' ).val(),
                    getDate: $( '.dat-post' ).val(),
                    getTitle: $( '.event-title' ).val()
                },
                success: function( result ) {
                    console.log( result );
                }
            } );
        } );

        $( "#from" ).datepicker( {
            changeYear: true,
            changeMonth: true,
            minDate: 0,
            numberOfMonths: 1,
            // showOn: "button",
            // buttonImage: "assets/img/Calendar-Icon-e1495568287395.png",
            // buttonImageOnly: true,
            // buttonText: "Select date",
            dateFormat: "dd-mm-yy",
            onSelect: function() {
                $( "#to" ).datepicker( "show" );
            },
        } );
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