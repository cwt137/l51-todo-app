//renders item's new state to the page
function addItem( id, isCompleted ) {
    $.get( "/items/" + id, function( data ) {
        if ( isCompleted ) {
            $( "#completedItemsList" ).append( data );
        } else {
            $( "#uncompletedItemsList" ).append( data );
        }
    });
}

//removes item's old state from the page
function removeItem( id ) {
    $( 'li[data-id="' + id + '"' ).remove();
}

(function($, addItem, removeItem) {

    $.get( "/items", function( data ) {
        $( "#itemsList" ).html( data );
    });


    $( "#addFrm" ).submit(function() {
        $.post( "/items", $( this ).serialize(), function( data ) {

            addItem( data.id, false );

            $( "#title" ).val( '' );
        });
        
        return false;
    });

    $( document ).on( "change", ".isCompleted", function() {
        var id = $( this ).closest( 'li' ).data( 'id' );
        var isCompleted = $( this ).prop( "checked" ) ? 1 : 0;

        $.ajax( '/items/' + id, {
            data: { "isCompleted": isCompleted },
            method: 'PATCH',
            success: function() {

                removeItem( id );
                addItem( id, isCompleted );

            }
        });
    });

    $( document ).on( "click", ".deleteItem", function() {
        var id = $( this ).closest( 'li' ).data( 'id' );

        $.ajax( '/items/' + id, {
            method: 'DELETE',
            success: function() {

                removeItem( id );

            }
        });
    });

} )( jQuery, addItem, removeItem);
