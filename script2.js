function noPuntoComa( event ) {

    var e = event || window.event;
    var key = e.keyCode || e.which;

    if ( key === 110 || key === 190 || key === 188 ) {     
        e.preventDefault();     
    }
}