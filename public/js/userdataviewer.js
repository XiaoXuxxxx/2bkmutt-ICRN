$(function(){
    $("#userdata-viewer-search-form").on("submit", function(e){
        e.preventDefault();
        search();
    });
    $("#search-box").on('change keyup paste', function(){
        search();
    });
});

function search(){
    var search = $("#search-box").val();
    $(".user-card").css("display", "none");
    var found = $(".user-card:containsIN('" + search + "')");
    found.css("display","block");
    if(search == ""){
        $("#search-status").html("Start typing in the search box to search.");
    }else{
        $("#search-status").html( "Searched: '" + search + "'. Found " + found.length + " occurrences." );
    }
}
