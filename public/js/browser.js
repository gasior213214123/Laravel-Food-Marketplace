$(document).ready(function () {
  $('.leftmenutrigger').on('click', function (e) {
    $('.side-nav').toggleClass("open");
    $('#wrapper').toggleClass("open");
    e.preventDefault();
  });
});

$(document).ready(function(){
    // get the tab from url
    var hash = window.location.hash;
    // if a hash is present (when you come to this page)
    if (hash != '') {
        // show the tab
        $('.nav-tabs a[href="' + hash + '"]').tab('show');
    }
});
$('#select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
});