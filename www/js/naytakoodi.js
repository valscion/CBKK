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
    if( $.browser.msie ) {
        jQobjLn.width( startWidth + 20 );
    } else {
        jQobjLn.width( jQobjLn.textWidth() + startWidth - 10 );
    }
    $('#codeblock').scroll(function(event){
        event.preventDefault();
        var scrollAmount = $('#codeblock').scrollLeft();
        jQobjLn.animate( { left:scrollAmount }, { queue:false, duration:400 } );
    });
});