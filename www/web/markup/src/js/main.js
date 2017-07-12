$(function(){
    $("#searchProduct").autocomplete({
        source: '/site/list-products',
        select: function( event, ui ) {
            searchProducts(ui.item.value);
        }
    });
    $('#btn_search').on('click',function (e) {
        var query = $('#searchProduct').val();
        searchProducts(query);
    })
});

searchProducts = function ($query) {
    $.ajax({
        type: "GET",
        url: "/site/search-products",
        data: {"queryName": $query},
        success: function(response){
            $("#block_list_prods").html(response);
        }
    });
};

