$.fn.textWidth = function(){
  var html_org = $(this).html();
  var html_calc = '<span>' + html_org + '</span>'
  $(this).html(html_calc);
  var width = $(this).find('span:first').width();
  $(this).html(html_org);
  return width;
};


$(document).ready(function(){
    var jQobjLn   = $('#codeblock > table.coolbasic > tbody > tr.li1 > td.ln > pre.de1')
    var startWidth = jQobjLn.width();
    var disableAnimation = false;

    if( $.browser.msie ) {
        $('#codeblock').css('max-height', 'none');
        if( $.browser.version < 8.0 ) {
            $('#codeblock').css('margin', '0 -1px');
            $('#codeblock').css('overflow', 'hidden');
            jQobjLn.width( 30 );
            disableAnimation = true;
        } else {
            jQobjLn.css( 'margin-left', -20000 );
            jQobjLn.width( 20000 + startWidth );
            $('#codeblock').css('max-height', 'none');
            if( $('#codeblock').height() > 560 ) {
                $('#codeblock').height(560);
            }
        }
    } else {
        jQobjLn.css( 'margin-left', -20000 );
        jQobjLn.width( jQobjLn.textWidth() + 20000 );
    }
    if( disableAnimation == false ) {
        $('#codeblock').scroll(function(){
            var scrollAmount = $('#codeblock').scrollLeft();
            jQobjLn.animate( { left:scrollAmount }, { queue:false, duration:200 } );
        });
    }
    
    $('#codeblock a').colorbox({width:'800px', height:'80%', iframe:true});
});